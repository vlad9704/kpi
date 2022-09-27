<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Loader,
	Bitrix\Main\Application,
	Bitrix\Main\Localization\Loc;

use Bitrix\Main\Mail\Event;

class CCustomFormsComponent extends CBitrixComponent
{
	protected $prefixField = 'field';
	protected $prefixProperty = 'prop';
	protected $arLoad = array();
	protected $arEventSend = array();
	protected $maxFileSize = 10 * 1024 * 1024;
	protected $arFileBx = array();
	protected $fileUploadDir = '/upload/tmp/';
	protected $createElementResult;
	
	public function onPrepareComponentParams($arParams)
	{
		$arParams = $this->clearArrayFromEmptyValues($arParams);
		
		$this->arResult = array(
			'FORM_ID'=>$arParams["FORM_ID"],
			'FORM_TITLE'=>$arParams["FORM_TITLE"],
			'FORM_SUBTITLE'=>$arParams["FORM_SUBTITLE"],
			'INPUT_LIST'=>$this->sortFieldsForm($arParams),
			'SUBMIT_BUTTON'=>array(
				'NAME'=> "submit_".$arParams["FORM_ID"],
				'VALUE'=> $arParams["FORM_SUBMIT"],
				'SMS_FORM_VALUE'=> $arParams["SMS_FORM_SUBMI"]
			),
		);
		
		return $arParams;
	}
	
	
    public function executeComponent()
    {
		$this->initComponentTemplate();
		$componentTemplate = $this->getTemplate()->GetName();
		$bx_sessid = bitrix_sessid();
		$context = Application::getInstance()->getContext();
        $request = $context->getRequest();
		$bCheckSubmit = $request->get("template") == $componentTemplate && $request->get("action") < strtotime("now") && check_bitrix_sessid();
		$bRequestFromSmsForm = !empty($request->get("SMS_FORM_ID")) && $request->get("SMS_FORM_ID") == $_SESSION[$bx_sessid]["SMS_FORM_ID"];
		//$this->arResult["SMS_FORM_ID"] = 374;
		$this->arResult["SMS_FORM_TIME"] = !empty($request->get("SMS_FORM_TIME"))?$request->get("SMS_FORM_TIME"):"1:00";
		/*
		 * submit sms form
		 */
        if ($bCheckSubmit &&  $bRequestFromSmsForm)
		{
			$this->arResult["SUCCESS"] = false;
			$this->arResult["SMS_FORM_ID"] = $request->get("SMS_FORM_ID");
			
			$arPostList = $request->getPostList()->toArray();
			$checkSmsCode = $this->checkSmsCode($this->arResult["SMS_FORM_ID"],$this->arParams["IBLOCK_ID"],$arPostList);
			$this->arResult["REQUEST"] = $checkSmsCode["REQUEST"];
			$this->arResult["ERROR"] = $checkSmsCode["ERROR"];
			
			if(!$this->arResult["ERROR"])
			{
				if($this->arParams["EVENT_MESSAGE_ID"]>0)
				{
					$this->sendFormSms($this->arResult["SMS_FORM_ID"],$this->arParams["IBLOCK_ID"]);
				}
				CIBlockElement::SetPropertyValuesEx($this->arResult["SMS_FORM_ID"], $this->arParams["IBLOCK_ID"], array("IS_CONFIRMED"=>1));
				
				$this->arResult["SUCCESS"] = true;
				unset($this->arResult["SMS_FORM_ID"]);
				unset($this->arResult["REQUEST"]);
			}
		}
		elseif ($bCheckSubmit && !$bRequestFromSmsForm) 
		{
			unset($_SESSION[$bx_sessid]);
			$this->arResult["SUCCESS"] = false;
			$arPostList = $request->getPostList()->toArray();
			// if($this->existFileField())	{$arFileList = $request->getFileList()->toArray();} 
			$this->arResult["REQUEST"] = $this->requestForm($arPostList);
			$this->arResult["ERROR"] = $this->checkForm($arPostList,$arFileList);
			
			if(!$this->arResult["ERROR"])
			{
				$this->createElementResult = $this->createElement($arPostList);
				
				if(($this->createElementResult["ID"])<=0)
				{
					$this->arResult["ERROR"][] = $this->createElementResult["ERROR"];
				}
				else
				{
					$ID = $this->createElementResult["ID"];
					$use_sms_confirmation = \Bitrix\Main\Config\Option::get("grain.customsettings","use_sms_confirmation");
					
					if($this->arParams["USE_SMS_CONFIRM"]=="Y" && $use_sms_confirmation == "Y")
					{
						$_SESSION[$bx_sessid]["SMS_FORM_ID"] = $ID;
						$this->arResult["BX_SESSID"] = $bx_sessid;
						$this->arResult["SMS_FORM_ID"] = $ID;
						
						if(!empty($this->arLoad["PROPERTY_VALUES"]["PHONE"]))
						{
							$SMS_CONFIRM_CODE = $this->genSmscode($this->arLoad["PROPERTY_VALUES"]["PHONE"].rand(0,99999));
							
							CIBlockElement::SetPropertyValuesEx($ID, $this->arParams["IBLOCK_ID"], array("SMS_CONFIRM_CODE"=>$SMS_CONFIRM_CODE));
							
							//send sms 
							$sendToPhone  = str_replace(array(" ","+7"),array("","7"),$this->arLoad["PROPERTY_VALUES"]["PHONE"]);
							$msgSms = "Подтвердите отправку формы на сайте kpi.kz: ".$SMS_CONFIRM_CODE;
							//$msgSms = "kpi.kz: ".$SMS_CONFIRM_CODE;
							$this->send_sms_custom($sendToPhone, $msgSms);
						}
					}
					else
					{
						if($this->arParams["EVENT_MESSAGE_ID"]>0)
						{
							$this->sendForm();
						}
						$this->arResult["SUCCESS"] = true;
						unset($this->arResult["REQUEST"]);
					}
					/* $this->uploadFileToElement($ID); if($this->arParams["USE_PRODUCT_ID"] == "Y") { $this->setProductIds($ID);} */
				}
				
			}
		}

        $this->IncludeComponentTemplate();
    }
	

	


	

	

	
    /**
     * проверка расширения файла
     */
	private function checkFileExtension($fileName)
	{
		$fileExts =  array('gif','png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		return in_array($ext, $fileExts);
	}
    /**
     * проверка наличия файла в списке свойств в параметрах компонента
     */
	private function existFileField()
	{
		$arPropertyFiles = $this->arParams["FILES_PROPERTY_CODE"];
		$arProperties = $this->arParams["PROPERTY_CODE"];
		$cntPropertyFiles = 0;
		if(count($arPropertyFiles)>0)
		{
			foreach($arProperties as $property)
			{
				if(in_array($property,$arPropertyFiles))
				{
					$cntPropertyFiles++;
				}
			}
		}
		return ($cntPropertyFiles>0);
		
	}
    /**
     * отправка данных формы
     */
	private function sendFormSms($elementID,$iblockID)
	{
		$this->initComponentTemplate();
		$componentTemplate = $this->getTemplate()->GetName();
		$defaultEmailTo = !empty($this->arParams["EMAIL_TO"]) ? $this->arParams["EMAIL_TO"]  : COption::GetOptionString("main", "email_from", "");
		
		//admin - Y, user - N
		if($this->arParams["SEND_TO_ADMIN"] == "Y" && $this->arParams["SEND_TO_USER"] != "Y")
		{
			$this->arEventSend["EMAIL_TO"] = $defaultEmailTo;
		}

		$this->arEventSend["FORM_NAME"] = htmlspecialchars_decode($this->arParams["FORM_TITLE_FOR_EMAIL"]);
		
		if(!empty($this->arParams["FORM_TITLE_FOR_EMAIL"]))
		{
			$this->arEventSend["THEME_EMAIL"] = htmlspecialchars_decode($this->arParams["FORM_TITLE_FOR_EMAIL"]);
		}
		else
		{
			$this->arEventSend["THEME_EMAIL"] = htmlspecialchars_decode($this->arParams["FORM_TITLE"]);
		}
		
		//get element data
		$arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT","PROPERTY_COMPANY","PROPERTY_EMAIL","PROPERTY_PHONE");
		$arFilter = array("IBLOCK_ID"=>$iblockID,"ID"=>$elementID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"N");
		$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>1), $arSelect);
		if($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();  
			//$arProperty[] = $ob->GetProperty("COMPANY");
		}
		
		$BODY_EVENT_SEND = "";
		foreach($arFields as $CODE=>$VALUE)
		{
			if(strpos($CODE,"~")===false){
				$CODE = str_replace(array("_VALUE","PROPERTY_"),"",$CODE);
				if(!empty($this->arParams["NEW_NAME_".$CODE]))
				{
					$BODY_EVENT_SEND.= $this->arParams["NEW_NAME_".$CODE].":".$VALUE."<br/>";
				}
			}
		}
		//$BODY_EVENT_SEND.= "Источник: ".$this->siteUrl().$this->arLoad['PROPERTY_VALUES']["SUBMIT_PAGE"]."<br>";
		$this->arEventSend["BODY_EVENT_SEND"] = $BODY_EVENT_SEND;
		
		//send
		$resultMessageByTypeDb = \Bitrix\Main\Mail\Internal\EventMessageTable::getList(
			array(
			'select' => array('ID', 'EVENT_NAME'),
			'filter' => array('ID'=>$this->arParams["EVENT_MESSAGE_ID"])
		));
		if($messageByType = $resultMessageByTypeDb->fetch())
		{
			CEvent::SendImmediate($messageByType["EVENT_NAME"], SITE_ID, $this->arEventSend,"Y", $messageByType["ID"]);
		}
		unset($messageByType,$resultMessageByTypeDb);
		
	}
	
    /**
     * отправка данных формы
     */
	private function sendForm()
	{
		$this->initComponentTemplate();
		$componentTemplate = $this->getTemplate()->GetName();
		$defaultEmailTo = !empty($this->arParams["EMAIL_TO"]) ? $this->arParams["EMAIL_TO"]  : COption::GetOptionString("main", "email_from", "");
		
		//admin - Y, user - N
		if($this->arParams["SEND_TO_ADMIN"] == "Y" && $this->arParams["SEND_TO_USER"] != "Y")
		{
			$this->arEventSend["EMAIL_TO"] = $defaultEmailTo;
		}

		//admin - N, user - Y
		if($this->arParams["SEND_TO_USER"] == "Y" && $this->arParams["SEND_TO_ADMIN"] != "Y")
		{
			if(!empty($this->arLoad["PROPERTY_VALUES"]["EMAIL"]))
			{
				$this->arEventSend["EMAIL_TO"] = $this->arLoad["PROPERTY_VALUES"]["EMAIL"];
			}
		}
		//admin - Y, user - Y
		if($this->arParams["SEND_TO_USER"] == "Y" && $this->arParams["SEND_TO_ADMIN"] == "Y")
		{
			if(!empty($this->arLoad["PROPERTY_VALUES"]["EMAIL"]))
			{
				$this->arEventSend["EMAIL_TO"] = $this->arLoad["PROPERTY_VALUES"]["EMAIL"];
				$this->arEventSend["EMAIL_TO_BCC"] = $defaultEmailTo;
			}
			else
			{
				$this->arEventSend["EMAIL_TO"] = $defaultEmailTo;
			}
		}
		
		$this->arEventSend["FORM_NAME"] = htmlspecialchars_decode($this->arParams["FORM_TITLE_FOR_EMAIL"]);
		
		if(!empty($this->arParams["FORM_TITLE_FOR_EMAIL"]))
		{
			$this->arEventSend["THEME_EMAIL"] = htmlspecialchars_decode($this->arParams["FORM_TITLE_FOR_EMAIL"]);
		}
		else
		{
			$this->arEventSend["THEME_EMAIL"] = htmlspecialchars_decode($this->arParams["FORM_TITLE"]);
		}
		
		$BODY_EVENT_SEND = "";
		foreach($this->arResult["INPUT_LIST"] as $CODE=>$VALUE)
		{
			if(!in_array($CODE,$this->arParams["FILES_PROPERTY_CODE"]))
			{
				if(array_key_exists($CODE,$this->arLoad["PROPERTY_VALUES"]))
				{
					$BODY_EVENT_SEND.= $this->arParams["NEW_NAME_".$CODE].":".$this->arResult["REQUEST"]["PROPERTY"][$CODE]."<br>";		
				}
				else
				{
					$BODY_EVENT_SEND.= $this->arParams["NEW_NAME_".$CODE].":".$this->arResult["REQUEST"]["FIELD"][$CODE]."<br>";		
				}
			}
			else
			{
				$linkToFile = $this->getFileLinkFromElement($this->createElementResult["ID"],$CODE);
				$arAddAtEnd_ofBodyEventSend[]= $this->arParams["NEW_NAME_".$CODE].": <a href=\"".$linkToFile."\" >".$linkToFile."</a>";
			}
		}
		$BODY_EVENT_SEND.= implode("<br>",$arAddAtEnd_ofBodyEventSend)."<br>";
		//$BODY_EVENT_SEND.= "Источник: ".$this->siteUrl().$this->arLoad['PROPERTY_VALUES']["SUBMIT_PAGE"]."<br>";
		

		$this->arEventSend["BODY_EVENT_SEND"] = $BODY_EVENT_SEND;
		
		
		if(!empty($this->arParams["TEXT_APPEAL_TO_USER"]))
		{
			if(strpos($this->arParams["TEXT_APPEAL_TO_USER"],'#USER_NAME#')!==false)
			{
				$this->arEventSend["TEXT_APPEAL_TO_USER"] = str_replace("#USER_NAME#",$this->arLoad["NAME"],$this->arParams["TEXT_APPEAL_TO_USER"]);
			}
			$this->arEventSend["TEXT_APPEAL_TO_USER"] = "<h2>".htmlspecialchars_decode($this->arEventSend["TEXT_APPEAL_TO_USER"])."</h2>";
		}			
		
		if(!empty($this->arParams["TEXT_MESSAGE_TO_USER"]))
		{
			$this->arEventSend["TEXT_MESSAGE_TO_USER"] = "<p>".htmlspecialchars_decode($this->arParams["TEXT_MESSAGE_TO_USER"])."</p>";
		}			
		
		//send
		$resultMessageByTypeDb = \Bitrix\Main\Mail\Internal\EventMessageTable::getList(
			array(
			'select' => array('ID', 'EVENT_NAME'),
			'filter' => array('ID'=>$this->arParams["EVENT_MESSAGE_ID"])
		));
		if($messageByType = $resultMessageByTypeDb->fetch())
		{
			CEvent::SendImmediate($messageByType["EVENT_NAME"], SITE_ID, $this->arEventSend,"Y", $messageByType["ID"]);

			// Event::send(array(
			//     "EVENT_NAME" => $messageByType["EVENT_NAME"],
			//     "LID" => "s1",
			//     "C_FIELDS" => array(
			//         $this->arEventSend,
			//     ),
			// ));
			
		}
		unset($messageByType,$resultMessageByTypeDb);
		
	}
	
    /**
     * добавить привязку к товарам в элементе
     */
	private function setProductIds($ELEMENT_ID)
	{
		$PROPERTY_CODE = current($this->arParams["PRODUCT_PROPERTY_CODE"]); 
		$PROPERTY_VALUE = $this->arParams["PRODUCT_ID"];
		if(count($PROPERTY_VALUE)>0)
		{
			CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, $this->arParams["IBLOCK_ID"], array($PROPERTY_CODE=>$PROPERTY_VALUE));
		}
		return false;
	}
 
    /**
     * получить  ссылку на файл в элементе
     */
	private function getFileLinkFromElement($ELEMENT_ID,$PROPERTY_FILES_CODE)
	{
		$resPropertyFile = CIBlockElement::GetProperty($this->arParams["IBLOCK_ID"], $ELEMENT_ID,  array("sort" => "asc"), array("CODE"=>$PROPERTY_FILES_CODE));
		if($arPropertyFile = $resPropertyFile->Fetch())
		{
			return $this->siteUrl().CFile::GetPath($arPropertyFile["VALUE"]);
		}
		return false;
	}
 
    /**
     * добавить файл в элемент
     */
	private function uploadFileToElement($ELEMENT_ID)
	{
		foreach($this->arParams["FILES_PROPERTY_CODE"] as $FILES_PROPERTY_CODE)
		{
			if(count($this->arFileBx[$FILES_PROPERTY_CODE])>0)
			{
				foreach($this->arFileBx[$FILES_PROPERTY_CODE] as $file)
				{
					$arPropertyFile[] = array("VALUE" => CFile::MakeFileArray($file),"DESCRIPTION"=>"");
				}
			
				CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, $this->IBLOCK_ID, array($FILES_PROPERTY_CODE => $arPropertyFile));

				foreach ($this->arFileBx[$FILES_PROPERTY_CODE] as $value) 
				{
					unlink($value);
				}
			}
		}
	}
 
    /**
     * создать элемент из формы
     */
	private function createElement($postList)
	{
		global $APPLICATION;
		$arResult = array();
		$FIELDS_KEY = $this->prefixField."_".$this->arParams["FORM_ID"];
		$PROPERTIES_KEY = $this->prefixProperty."_".$this->arParams["FORM_ID"];
		
		$this->arLoad = array(
			'IBLOCK_ID' 		=> $this->arParams['IBLOCK_ID'],
			'ACTIVE' 			=> "N",
			'DATE_ACTIVE_FROM' 	=> date("d.m.Y H:i:s"),
			'CODE' 				=> strtotime("now").rand(0,999),
			'PROPERTY_VALUES' 	=> array(
				"SUBMIT_PAGE" => $APPLICATION->GetCurUri(),
			),
		);
		
		foreach($this->arParams["FIELD_CODE"] as $FIELD_CODE)
		{
			$this->arLoad[$FIELD_CODE] = $this->htmlspecialcharsValue($postList[$FIELDS_KEY][$FIELD_CODE]);
		}
		
		foreach($this->arParams["PROPERTY_CODE"] as $PROPERTY_CODE)
		{
			$postList[$PROPERTIES_KEY][$PROPERTY_CODE] = $this->htmlspecialcharsValue($postList[$PROPERTIES_KEY][$PROPERTY_CODE]);
			
			if(!in_array($PROPERTY_CODE,$this->arParams["FILES_PROPERTY_CODE"]) && !empty($postList[$PROPERTIES_KEY][$PROPERTY_CODE]))
			{
				$this->arLoad["PROPERTY_VALUES"][$PROPERTY_CODE] = $postList[$PROPERTIES_KEY][$PROPERTY_CODE];
			}
		}
		
		$el = new CIBlockElement;
		if($ID = $el->Add($this->arLoad))
		{
			$arResult["ID"] = $ID;
		}	
		else
			$arResult["ERROR"] = $el->LAST_ERROR;
		
		return $arResult;
	}
	
    /**
     * проверка $_REQUEST полей
     */
	private function checkForm($postList,$arFileList=array())
	{
		$arErrors = array();
		$FIELDS_KEY = $this->prefixField."_".$this->arParams["FORM_ID"];
		$PROPERTIES_KEY = $this->prefixProperty."_".$this->arParams["FORM_ID"];
		
		foreach($this->arParams["FIELD_CODE"] as $FIELD_CODE)
		{
			
			$postList[$FIELDS_KEY][$FIELD_CODE] = $this->htmlspecialcharsValue($postList[$FIELDS_KEY][$FIELD_CODE]);
			if(in_array($FIELD_CODE,$this->arParams["REQUIRED_FIELDS"]) && empty($postList[$FIELDS_KEY][$FIELD_CODE]))
			{
				$arErrors[$FIELD_CODE] = GetMessage("MFP_ERROR_EMPTY_FIELD",array("#FIELD#"=>$this->arParams["NEW_NAME_".$FIELD_CODE]));//'Заполните поле "'.$this->arParams["NEW_NAME_".$FIELD_CODE].'"';
			}
		}
		
		foreach($this->arParams["PROPERTY_CODE"] as $PROPERTY_CODE)
		{
			$postList[$PROPERTIES_KEY][$PROPERTY_CODE] = $this->htmlspecialcharsValue($postList[$PROPERTIES_KEY][$PROPERTY_CODE]);
			
			if(in_array($PROPERTY_CODE,$this->arParams["REQUIRED_PROPERTY_CODE"]) && 
			  !in_array($PROPERTY_CODE,$this->arParams["FILES_PROPERTY_CODE"]) && 
			   empty($postList[$PROPERTIES_KEY][$PROPERTY_CODE]))
			{
				$arErrors[$PROPERTY_CODE] = GetMessage("MFP_ERROR_EMPTY_FIELD",array("#FIELD#"=>$this->arParams["NEW_NAME_".$PROPERTY_CODE]));//'Заполните поле "'.$this->arParams["NEW_NAME_".$PROPERTY_CODE].'"';
			}
			
			$bIsEmail = strpos(strtolower($PROPERTY_CODE), "email") !== false;
			if (!empty($postList[$PROPERTIES_KEY][$PROPERTY_CODE]) && $bIsEmail)
			{
				if (!filter_var($postList[$PROPERTIES_KEY][$PROPERTY_CODE], FILTER_VALIDATE_EMAIL)) 
				{ 
					$arErrors[$PROPERTY_CODE] = GetMessage("MFP_ERROR_INCORRECT_FILL_FIELD",array("#FIELD#"=>$this->arParams["NEW_NAME_".$PROPERTY_CODE]));//'Поле "'.$this->arParams["NEW_NAME_".$PROPERTY_CODE].'" некорректно';
				}
			}
			
			$bIsPhone = strpos(strtolower($PROPERTY_CODE), "phone") !== false;
			if (!empty($postList[$PROPERTIES_KEY][$PROPERTY_CODE]) && $bIsPhone)
			{
				$truePhone = (str_replace(array("(",")","-","_"," "),array(""),$postList[$PROPERTIES_KEY][$PROPERTY_CODE]));
				if (strlen($truePhone)<11) 
				{ 
					$arErrors[$PROPERTY_CODE] = GetMessage("MFP_ERROR_INCORRECT_FILL_FIELD",array("#FIELD#"=>$this->arParams["NEW_NAME_".$PROPERTY_CODE]));
					//'Поле "'.$this->arParams["NEW_NAME_".$PROPERTY_CODE].'" некорректно';
				}
			}
			
			$bIsFile = in_array($PROPERTY_CODE ,$this->arParams["FILES_PROPERTY_CODE"]);
			if($bIsFile && count($arErrors)==0)
			{
				/**
				 * condition1  - свойство обязательное и пустое 
				 * condition2  - размер больше $maxFileSize
				 * condition3  - проверка расширения файла
				 */
				$condition1 = in_array($PROPERTY_CODE,$this->arParams["REQUIRED_PROPERTY_CODE"]) && empty($arFileList[$PROPERTIES_KEY]["name"][$PROPERTY_CODE]);
				$condition2 = !empty($arFileList[$PROPERTIES_KEY]["name"][$PROPERTY_CODE]) && $arFileList[$PROPERTIES_KEY]["size"][$PROPERTY_CODE]> $this->maxFileSize;
				$condition3 = !empty($arFileList[$PROPERTIES_KEY]["name"][$PROPERTY_CODE]) && !$this->checkFileExtension($arFileList[$PROPERTIES_KEY]["name"][$PROPERTY_CODE]);

				if($condition1)
				{
					$arErrors[$PROPERTY_CODE] = 'Добавьте файл в поле"'.$this->arParams["NEW_NAME_".$PROPERTY_CODE].'".';
				}
				elseif($condition2)
				{
					$arErrors[$PROPERTY_CODE] = 'Файл не должен превышать 10 Мб ("'.$this->arParams["NEW_NAME_".$PROPERTY_CODE].'").';
				}
				elseif($condition3)
				{
					$arErrors[$PROPERTY_CODE] = 'Некорректное расширение файла ("'.$this->arParams["NEW_NAME_".$PROPERTY_CODE].'").';
				}
				else
				{
					$arFiles[] = array(
						'name' => $arFileList[$PROPERTIES_KEY]["name"][$PROPERTY_CODE],
						'type' => $arFileList[$PROPERTIES_KEY]["type"][$PROPERTY_CODE],
						'tmp_name' => $arFileList[$PROPERTIES_KEY]["tmp_name"][$PROPERTY_CODE],
						'error' => $arFileList[$PROPERTIES_KEY]["error"][$PROPERTY_CODE],
						'size' => $arFileList[$PROPERTIES_KEY]["size"][$PROPERTY_CODE],
					);
					
					$cnt = count($arFiles);
					for ($i = 0; $i < $cnt; $i++) 
					{
						$arFilesTranslit[$i]['ext']= pathinfo($arFiles[$i]['name'], PATHINFO_EXTENSION);
						$arFilesTranslit[$i]['name']= Cutil::translit($arFiles[$i]['name'],"ru",array("replace_space"=>"_","replace_other"=>"_")).".".$arFilesTranslit[$i]['ext'];
						$tmpDir = Bitrix\Main\Application::getDocumentRoot().$this->fileUploadDir;
						
						$arFiles[$i]['save_to'] = $tmpDir.$PROPERTY_CODE.'_'.$this->arParams["IBLOCK_ID"].'_'.date('Ymd_His_').$arFilesTranslit[$i]['name'];
						if(!move_uploaded_file($arFiles[$i]['tmp_name'], $arFiles[$i]['save_to'])){
							$arResult['ERROR'][$PROPERTY_CODE] = "Ошибка загрузки файла ".$arFiles[$i]['name'];
						}
						
						$this->arFileBx[$PROPERTY_CODE][] = $arFiles[$i]['save_to'];
					}
					unset($arFiles,$cnt,$arFilesTranslit);
				}
				
			}
		}
		
		if (!empty($postList['botcheck']) || $postList['botcheck2'] != 'pass'){
			$arErrors['OTHER'] = GetMessage("MFP_ERROR_ARE_U_ROBOT");
		}
		
		return $arErrors;
	}
	
    /**
     * обработка $_REQUEST полей
     */
	private function requestForm($postList)
	{
		$arRequest = array();
		$FIELDS_KEY = $this->prefixField."_".$this->arParams["FORM_ID"];
		$PROPERTIES_KEY = $this->prefixProperty."_".$this->arParams["FORM_ID"];
		
		foreach($this->arParams["FIELD_CODE"] as $FIELD_CODE)
		{
			$arRequest['FIELD'][$FIELD_CODE] = $this->htmlspecialcharsValue($postList[$FIELDS_KEY][$FIELD_CODE]);
		}
		
		foreach($this->arParams["PROPERTY_CODE"] as $PROPERTY_CODE)
		{
			$arRequest['PROPERTY'][$PROPERTY_CODE] = $this->htmlspecialcharsValue($postList[$PROPERTIES_KEY][$PROPERTY_CODE]);
		}
		
		return $arRequest;
	}
	
    /**
     *  обертка для htmlspecialcharsEx
     */
	private function htmlspecialcharsValue($value)
	{
		if(!is_array($value))
		{
			$value = htmlspecialcharsEx($value);
		}
		return $value;
	}
	
    /**
     * собирает в отсортированный массив полей для формирования input 
     */
	private function sortFieldsForm($arParams,$useSortParams=false)
	{
		foreach($arParams["FIELD_CODE"] as $code)
		{
			$isRequiredField = in_array($code,$arParams["REQUIRED_FIELDS"])? " * " : ""; 
			$sort = ($useSortParams) ? $arParams["SORT_".$code] . "_" . $code : $code;
			$arViewInput[$sort]["CODE"] = $code;
			$arViewInput[$sort]["INPUT_NAME"] = $this->prefixField."_".$arParams["FORM_ID"]."[".$code."]";
			$arViewInput[$sort]["NAME"] = $arParams["NEW_NAME_".$code];
			$arViewInput[$sort]["PLACEHOLDER"] = $arParams["PLACEHOLDER_".$code];
			$arViewInput[$sort]["REQUIRED"] = $isRequiredField;
			
		}
		unset($isRequiredField,$sort);
		
		foreach($arParams["PROPERTY_CODE"] as $prop_code)
		{
			$isRequiredField = in_array($prop_code,$arParams["REQUIRED_PROPERTY_CODE"])? " * " : ""; 
			$sort = ($useSortParams) ? $arParams["SORT_".$prop_code] . "_" . $prop_code : $prop_code;
			$arViewInput[$sort]["CODE"] = $prop_code;
			$arViewInput[$sort]["INPUT_NAME"] = $this->prefixProperty."_".$arParams["FORM_ID"]."[".$prop_code."]";
			$arViewInput[$sort]["NAME"] = $arParams["NEW_NAME_".$prop_code];
			$arViewInput[$sort]["PLACEHOLDER"] = $arParams["PLACEHOLDER_".$prop_code];
			$arViewInput[$sort]["REQUIRED"] = $isRequiredField;
		}
		unset($isRequiredField,$sort);
		ksort($arViewInput);
		
		return $arViewInput;
	}
	
    /**
     * очищаем массив параметров от пустых значений
     */
	private function clearArrayFromEmptyValues($arParams)
	{
		foreach($arParams as $code=>$value)
		{
			if(is_array($value))
			{
				$arParams[$code] = array_diff($value, array(''));
			}
		}
		unset($code,$value);
		return $arParams;
	}
	
    /**
     * получаем url сайта
     */
	private function siteUrl()
	{

		$isHttps = \Bitrix\Main\Context::getCurrent()->getRequest()->isHttps() ? 'https://' : 'http://';
		$server = \Bitrix\Main\Context::getCurrent()->getServer();
		return $isHttps.$server->get('SERVER_NAME');

	}
    /**
     * проверка sms-кода
     */
	private function checkSmsCode($elementID,$iblockID,$arPostList) 
	{
		$SMS_CONFIRM_CODE = 0;
		$arReturn = array();
		
		$arSelect = array("ID", "IBLOCK_ID");
		$arFilter = array("IBLOCK_ID"=>$iblockID,"ID"=>$elementID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"N");
		$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>1), $arSelect);
		if($ob = $res->GetNextElement()){ 
			//$arFields = $ob->GetFields();  
			$PROPERTY_SMS_CONFIRM_CODE = $ob->GetProperty("SMS_CONFIRM_CODE");
			$SMS_CONFIRM_CODE = $PROPERTY_SMS_CONFIRM_CODE["VALUE"];
		}
		
		$REQUEST_SMS_CONFIRM_CODE = $arPostList[$this->prefixProperty."_".$this->arParams["FORM_ID"]]["SMS_CONFIRM_CODE"];
		
		if(empty($REQUEST_SMS_CONFIRM_CODE))
		{
			$arReturn["ERROR"]["SMS_CONFIRM_CODE"] = GetMessage("MFP_ERROR_EMPTY_FIELD",array("#FIELD#"=>$this->arParams["NEW_NAME_SMS_CONFIRM_CODE"]));
		}
		elseif($REQUEST_SMS_CONFIRM_CODE != $SMS_CONFIRM_CODE)
		{
			$arReturn["ERROR"]["SMS_CONFIRM_CODE"] = GetMessage("MFP_ERROR_INCORRECT_FILL_FIELD",array("#FIELD#"=>$this->arParams["NEW_NAME_SMS_CONFIRM_CODE"]));
		}
		
		$arReturn["REQUEST"]['PROPERTY']["SMS_CONFIRM_CODE"] = $REQUEST_SMS_CONFIRM_CODE;
		
		return $arReturn;
		
	}
    /**
     * генерируем sms-код 
     */
	private function genSmscode($s) 
	{
		return hexdec(substr(md5($s), 7, 5));
	}
	
	private function send_sms_custom($phone,$sms_text)
	{
		$use_sms_confirmation = \Bitrix\Main\Config\Option::get("grain.customsettings","use_sms_confirmation");

		if($use_sms_confirmation == "Y")
		{	
			$sms_login = \Bitrix\Main\Config\Option::get("grain.customsettings","sms_login");
			$sms_password = \Bitrix\Main\Config\Option::get("grain.customsettings","sms_password");
			
			$params = array(
					'login'=>$sms_login,
					'psw'=>$sms_password,
					'phones'=>$phone,
					'charset'=>'utf-8',
					//'translit'=>'1',
					'mes'=>$sms_text,
			);
			$url = 'https://smsc.kz/sys/send.php?' . http_build_query($params);
			$result = file_get_contents($url);
		}
		return $result;
	}
}
?>
