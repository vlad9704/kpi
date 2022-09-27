<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?
if (!CModule::IncludeModule("iblock"))
	return;

use Bitrix\Main\Application; 
$request = Application::getInstance()->getContext()->getRequest();
$iblock_id = $request->get("iblock_id");
$id = $request->get("id");
$arRes = array();

if($iblock_id>0 && $id>0)
{
 	$arSelect = Array("ID", "NAME", "PROPERTY_IS_CONFIRMED", "PROPERTY_SMS_CONFIRM_CODE", "PROPERTY_PHONE");
	$arFilter = Array("IBLOCK_ID"=>$iblock_id,"ID"=>$id, "ACTIVE"=>"N");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
	if($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		
		if($arFields["PROPERTY_IS_CONFIRMED_VALUE"] == 1)
		{
			$arRes["answer"]["type"] = "error";
			$arRes["answer"]["code"] = "confirmed";
			//$arRes["answer"]["text"] = "Форма успешно подтверждена ранее. Заполните форму заново.";
		}
		
		if(!$arFields["PROPERTY_SMS_CONFIRM_CODE_VALUE"])
		{
			$arRes["answer"]["type"] = "error";
			$arRes["answer"]["code"] = "sms_code_empty";
			//$arRes["answer"]["text"] = "Код не найден. Заполните форму заново.";
		}
		
		if($arFields["PROPERTY_SMS_CONFIRM_CODE_VALUE"] && $arFields["PROPERTY_IS_CONFIRMED_VALUE"] == 0)
		{
			$new_string = $arFields["PROPERTY_PHONE_VALUE"].rand(0,99999);
			$NEW_SMS_CONFIRM_CODE = hexdec(substr(md5($new_string), 7, 5));
			CIBlockElement::SetPropertyValuesEx($arFields["ID"], $arFields["IBLOCK_ID"], array("SMS_CONFIRM_CODE"=>$NEW_SMS_CONFIRM_CODE));
			unset($new_string);
			$use_sms_confirmation = \Bitrix\Main\Config\Option::get("grain.customsettings","use_sms_confirmation");
			if($use_sms_confirmation == "Y")
			{	
				$phone  = str_replace(array(" ","+7"),array("","7"),$arFields["PROPERTY_PHONE_VALUE"]);
				
				$sms_text = "Подтвердите отправку формы на сайте kpi.kz: ".$NEW_SMS_CONFIRM_CODE;
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
				
				// log_array($url);
				// log_array($NEW_SMS_CONFIRM_CODE);
				// log_array($result);
				
				$arRes["answer"]["type"] = "success";
				$arRes["answer"]["code"] = "sms_code_send";
				$arRes["answer"]["phone"] = $arFields["PROPERTY_PHONE_VALUE"];
				//$arRes["answer"]["text"] = "Код отправлен повторно на номер ".$arFields["PROPERTY_PHONE_VALUE"]."";
			}
			else
			{
				$arRes["answer"]["type"] = "success";
				$arRes["answer"]["code"] = "sms_code_send";
				$arRes["answer"]["phone"] = $arFields["PROPERTY_PHONE_VALUE"];
				//$arRes["answer"]["text"] = "Код отправлен повторно на номер ".$arFields["PROPERTY_PHONE_VALUE"]."";
			}

		}
	}
	else
	{
		$arRes["answer"]["type"] = "error";
		$arRes["answer"]["code"] = "form_not_found";
		//$arRes["answer"]["text"] = "Ваша сессия истекла. Заполните форму заново.";
	}	
		
	print json_encode($arRes);


}
?>



