<?
use Bitrix\Main,
	Bitrix\Main\Loader,
	Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

Loader::includeModule('iblock');
Loc::loadMessages(__FILE__);


$arEvent = array();
$resultMessageByTypeDb = \Bitrix\Main\Mail\Internal\EventMessageTable::getList(array('select' => array('ID', 'EVENT_NAME')));
while($messageByType = $resultMessageByTypeDb->fetch())
{
	$arEvent[$messageByType["ID"]][] = "[".$messageByType["ID"]."] ".$messageByType["EVENT_NAME"];
}
unset($messageByType,$resultMessageByTypeDb);

$arIBlockType = CIBlockParameters::GetIBlockTypes(array("-"));


$arIblockList = array();
$rsIBlock = CIBlock::GetList( array('sort' => 'asc'), array('TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y') );
while($arr = $rsIBlock->Fetch()){
	$arIblockList[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
}
unset($rsIBlock,$arr); 

/* 
$arIblockListCatalog = array();
$rsIBlock = CIBlock::GetList( array('sort' => 'asc'), array('TYPE' => $arCurrentValues['CATALOG_IBLOCK_TYPE'], 'ACTIVE' => 'Y') );
while($arr = $rsIBlock->Fetch()){
	$arIblockListCatalog[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
}
unset($rsIBlock,$arr); 

$arIblockListOffers = array();
$rsIBlock = CIBlock::GetList( array('sort' => 'asc'), array('TYPE' => $arCurrentValues['OFFERS_IBLOCK_TYPE'], 'ACTIVE' => 'Y') );
while($arr = $rsIBlock->Fetch()){
	$arIblockListOffers[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
}
unset($rsIBlock,$arr);  */


$arProperty_LNS = array();
$rsProp = CIBlockProperty::GetList(array("sort"=>"asc", "name"=>"asc"), array("ACTIVE"=>"Y", "IBLOCK_ID"=>(isset($arCurrentValues["IBLOCK_ID"])?$arCurrentValues["IBLOCK_ID"]:$arCurrentValues["ID"])));
while ($arr=$rsProp->Fetch())
{
	$arProperty[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
	if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S"/* ,"F" */)))
	{
		$arProperty_LNS[$arr["CODE"]] = $arr["NAME"];
	}
/* 	if (in_array($arr["PROPERTY_TYPE"], array("F")))
	{
		$arProperty_Files[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
	} */
/* 	if (in_array($arr["PROPERTY_TYPE"], array("E")))
	{
		$arProperty_E[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
	} */
}
unset($rsProp,$arr);

$arFields = array(
	"NAME" => Loc::getMessage("IBLOCK_FIELD_NAME"),
	"PREVIEW_TEXT" => Loc::getMessage("IBLOCK_FIELD_PREVIEW_TEXT"),
	"DETAIL_TEXT" => Loc::getMessage("IBLOCK_FIELD_DETAIL_TEXT"),
);

$arComponentParameters = array(
	"GROUPS" => array(
		"FORM_COMMON_GROUP" => array(
			"NAME" => "Общие настройки формы",
		),
		"FORM_CONTENT_VISUAL" => array(
			"NAME" => "Настройки отображения полей",
		),
		"FORM_CONTENT_PLACEHOLDER" => array(
			"NAME" => "Настройки placeholder полей",
		),
		"FORM_CONTENT_NEW_NAME" => array(
			"NAME" => "Переименовать поля",
		),
		"FORM_CONTENT_SORT" => array(
			"NAME" => "Задать сортировку полей",
		),
		"FORM_SEND_EDIT" => array(
			"NAME" => "Настройки почтовых уведомлений",
		),
	),
	"PARAMETERS" => array(
		"AJAX_MODE" => array(),
		"IBLOCK_TYPE" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => Loc::getMessage("T_IBLOCK_DESC_LIST_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => Loc::getMessage("T_IBLOCK_DESC_LIST_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIblockList,
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
		),
		//"FIELD_CODE" => CIBlockParameters::GetFieldCode(Loc::getMessage("IBLOCK_FIELD"), "BASE"),
		"FIELD_CODE" => array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>10,
			"NAME" => Loc::getMessage("MFP_IBLOCK_FIELD"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"SIZE" => "5",
			"DEFAULT" => array("NAME"),
			"VALUES" => $arFields,
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
		),
		"REQUIRED_FIELDS" => array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>20,
			"NAME" => Loc::getMessage("MFP_REQUIRED_FIELDS"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"SIZE" => "5",
			"VALUES" => "",
			"ADDITIONAL_VALUES" => "Y",
		),
		
		"PROPERTY_CODE" => array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>30,
			"NAME" => Loc::getMessage("MFP_IBLOCK_PROPERTY"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"SIZE" => "5",
			"VALUES" => $arProperty_LNS,
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
		),

		"REQUIRED_PROPERTY_CODE" => Array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>40,
			"NAME" => Loc::getMessage("MFP_REQUIRED_PROPERTY"), 
			"TYPE"=>"LIST", 
			"MULTIPLE"=>"Y", 
			//"VALUES" => $arProperty_LNS,
			"VALUES" => "",
			"DEFAULT"=>"", 
			"SIZE" => "5",
			"ADDITIONAL_VALUES" => "Y",
		),
/* 		"FILES_PROPERTY_CODE" => array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>50,
			"NAME" => Loc::getMessage("MFP_IBLOCK_PROPERTY_FILES"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"SIZE" => "5",
			"VALUES" => $arProperty_Files,
			"ADDITIONAL_VALUES" => "Y",
		), */
		
		"FORM_ID" => Array(
			"SORT"=>10,
			"NAME" => Loc::getMessage("MFP_FORM_ID"), 
			"TYPE" => "STRING",
			"DEFAULT" => strtotime("now"), 
			"PARENT" => "FORM_COMMON_GROUP",
		),
		"FORM_TITLE" => Array(
			"SORT"=>20,
			"NAME" => Loc::getMessage("MFP_FORM_TITLE"), 
			"TYPE" => "STRING",
			"DEFAULT" => "Форма обратной связи", 
			"PARENT" => "FORM_COMMON_GROUP",
		),
		"FORM_SUBTITLE" => Array(
			"SORT"=>30,
			"NAME" => Loc::getMessage("MFP_FORM_SUBTITLE"), 
			"TYPE" => "STRING",
			"DEFAULT" => "Позаголовок", 
			"PARENT" => "FORM_COMMON_GROUP",
		),
		"FORM_SUBMIT" => Array(
			"SORT"=>40,
			"NAME" => Loc::getMessage("MFP_FORM_SUBMIT"), 
			"TYPE" => "STRING",
			"DEFAULT" => "Отправить", 
			"PARENT" => "FORM_COMMON_GROUP",
		),

		"OK_TEXT_TITLE" => Array(
			"SORT"=>50,
			"NAME" => Loc::getMessage("MFP_OK_TEXT_TITLE"), 
			"TYPE" => "STRING",
			"DEFAULT" => Loc::getMessage("MFP_OK_TEXT_TITLE_TEXT"), 
			"PARENT" => "FORM_COMMON_GROUP",
		),
		"OK_TEXT" => Array(
			"SORT"=>60,
			"NAME" => Loc::getMessage("MFP_OK_MESSAGE"), 
			"TYPE" => "STRING",
			"DEFAULT" => Loc::getMessage("MFP_OK_TEXT"), 
			"PARENT" => "FORM_COMMON_GROUP",
		),
		"KPI_BACK_BTN_LINK" => Array(
			"SORT"=>60,
			'NAME' => "Ссылка кнопки \"Назад\"",
			'TYPE' => 'STRING',
			'DEFAULT' => '', 
			"PARENT" => "FORM_COMMON_GROUP",
		),
		"KPI_BACK_BTN_TEXT" => Array(
			"SORT"=>60,
			'NAME' => "Текст кнопки \"Назад\"",
			'TYPE' => 'STRING',
			'DEFAULT' => '',
			"PARENT" => "FORM_COMMON_GROUP",
		),
		"OK_PHONES" => Array(
			"SORT"=>70,
			'PARENT' => 'FORM_COMMON_GROUP',
			'NAME' => "Телефон(-ы) в модальном окне успешной отправки",
			'TYPE' => 'STRING',
			'DEFAULT' => array('+7 (7122) 30 65 00'),
			"MULTIPLE"  =>  "Y",
			"ADDITIONAL_VALUES" => "Y"
		),
		"OK_EMAILS" => Array(
			"SORT"=>80,
			'PARENT' => 'FORM_COMMON_GROUP',
			'NAME' => "E-mail(-ы) в модальном окне успешной отправки",
			'TYPE' => 'STRING',
			'DEFAULT' => '',
			"MULTIPLE"  =>  "Y",
			"ADDITIONAL_VALUES" => "Y"
		),
		"OK_LOGO" => Array(
			"SORT"=>90,
			'PARENT' => 'FORM_COMMON_GROUP',
			"NAME" => "Логотип в модальном окне успешной отправки",
			"TYPE" => "FILE",
			"FD_TARGET" => "F",
			"FD_EXT" => 'svg,png,gif,jpeg,jpg',
			"FD_UPLOAD" => true,
			"FD_USE_MEDIALIB" => true,
			"FD_MEDIALIB_TYPES" => Array("image"),
		),
		"EMAIL_TO" => Array(
			"NAME" => Loc::getMessage("MFP_EMAIL_TO"), 
			"SORT"=>10,
			"TYPE" => "STRING",
			"DEFAULT" => htmlspecialcharsbx(COption::GetOptionString("main", "email_from")), 
			"PARENT" => "FORM_SEND_EDIT",
		),
		"FORM_TITLE_FOR_EMAIL" => Array(
			"NAME" => Loc::getMessage("MFP_FORM_TITLE_FOR_EMAIL"), 
			"SORT"=>20,
			"TYPE" => "STRING",
			"DEFAULT" => "", 
			"PARENT" => "FORM_SEND_EDIT",
		),		

		"SEND_TO_ADMIN" => Array(
			"NAME" => Loc::getMessage("MFP_SEND_TO_ADMIN"), 
			"SORT"=>50,
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y", 
			"PARENT" => "FORM_SEND_EDIT",
		),
		"SEND_TO_USER" => Array(
			"NAME" => Loc::getMessage("MFP_SEND_TO_USER"), 
			"SORT"=>50,
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N", 
			"PARENT" => "FORM_SEND_EDIT",
		),

		"TEXT_APPEAL_TO_USER" => Array(
			"NAME" => Loc::getMessage("MFP_TEXT_APPEAL_TO_USER"), 
			"SORT"=>50,
			"TYPE" => "STRING",
			"DEFAULT" => "", 
			"PARENT" => "FORM_SEND_EDIT",
		),
		"TEXT_MESSAGE_TO_USER" => Array(
			"NAME" => Loc::getMessage("MFP_TEXT_MESSAGE_TO_USER"), 
			"SORT"=>50,
			"TYPE" => "STRING",
			"DEFAULT" => "", 
			"PARENT" => "FORM_SEND_EDIT",
		),

		/*"USE_CAPTCHA" => Array(
			"NAME" => Loc::getMessage("MFP_CAPTCHA"), 
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y", 
			"PARENT" => "BASE",
		),*/
		
		"USE_PLACEHOLDER" => Array(
			"NAME" => Loc::getMessage("MFP_USE_PLACEHOLDER"), 
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y", 
			"PARENT" => "FORM_CONTENT_VISUAL",
			"REFRESH" => "Y",
		),
 		"USE_SMS_CONFIRM" => Array(
			"NAME" => Loc::getMessage("MFP_USE_SMS_CONFIRM"), 
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N", 
			"PARENT" => "FORM_CONTENT_VISUAL",
			"REFRESH" => "Y",
		), 
		
/* 		"USE_PRODUCT_ID" => Array(
			"NAME" => Loc::getMessage("MFP_USE_PRODUCT_ID"), 
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N", 
			"PARENT" => "FORM_CONTENT_VISUAL",
			"REFRESH" => "Y",
		), */

		"EVENT_MESSAGE_ID" => Array(
			"NAME" => Loc::getMessage("MFP_EMAIL_TEMPLATES"), 
			"TYPE"=>"LIST", 
			"VALUES" => $arEvent,
			"DEFAULT"=>"", 
			"SIZE" => "10",
			"MULTIPLE"=>"Y", 
			"PARENT" => "FORM_SEND_EDIT",
			"ADDITIONAL_VALUES" => "Y",
		),

	)
);

$arCurrentValues["FIELD_CODE"] = array_diff($arCurrentValues["FIELD_CODE"], array(''));
if(count($arCurrentValues["FIELD_CODE"])>0)
{
	foreach($arCurrentValues["FIELD_CODE"] as $FIELD_CODE_KEY=>$FIELD_CODE)
	{
		$FIELD_NAME = $arFields[$FIELD_CODE];
		$REQUIRED_FIELDS[$FIELD_CODE] = !empty($FIELD_NAME)?$FIELD_NAME:$FIELD_CODE;
		
		$arComponentParameters['PARAMETERS']["NEW_NAME_".$FIELD_CODE] = Array(
			"NAME" => "Задать другое название поля - ".$FIELD_NAME, 
			"TYPE" => "STRING",
			"DEFAULT" => $FIELD_NAME, 
			"PARENT" => "FORM_CONTENT_NEW_NAME",
		);
		
		$arComponentParameters['PARAMETERS']["SORT_".$FIELD_CODE] = Array(
			"NAME" => "Задать порядок поля - ".$FIELD_NAME, 
			"TYPE" => "STRING",
			"DEFAULT" => ($FIELD_CODE_KEY+1)*10, 
			"PARENT" => "FORM_CONTENT_SORT",
		);
		
		if($arCurrentValues["USE_PLACEHOLDER"] == "Y")
		{
			$arComponentParameters['PARAMETERS']["PLACEHOLDER_".$FIELD_CODE] = Array(
				"NAME" => "Placeholder - ".$FIELD_NAME, 
				"TYPE" => "STRING",
				"DEFAULT" => $FIELD_NAME, 
				"PARENT" => "FORM_CONTENT_PLACEHOLDER",
			);
		}
		
	}
	$arComponentParameters['PARAMETERS']['REQUIRED_FIELDS'] = array(
		"PARENT" => "FORM_CONTENT_VISUAL",
		"SORT"=>20,
		"NAME" => Loc::getMessage("MFP_REQUIRED_FIELDS"),
		"TYPE" => "LIST",
		"MULTIPLE" => "Y",
		"SIZE" => "5",
		"VALUES" => $REQUIRED_FIELDS,
		"ADDITIONAL_VALUES" => "Y",
		
	);
	unset($REQUIRED_FIELDS);
}

$arCurrentValues["PROPERTY_CODE"] = array_diff($arCurrentValues["PROPERTY_CODE"], array(''));
if(count($arCurrentValues["PROPERTY_CODE"])>0)
{
	foreach($arCurrentValues["PROPERTY_CODE"] as $PROPERTY_CODE_KEY=>$PROPERTY_CODE)
	{
		$PROPERTY_NAME = $arProperty_LNS[$PROPERTY_CODE];
		$REQUIRED_PROPERTIES[$PROPERTY_CODE] = !empty($PROPERTY_NAME)?$PROPERTY_NAME:$PROPERTY_CODE;
		
		$arComponentParameters['PARAMETERS']["NEW_NAME_".$PROPERTY_CODE] = array(
			"NAME" => "Задать другое название поля - ".$PROPERTY_NAME, 
			"TYPE" => "STRING",
			"DEFAULT" => $PROPERTY_NAME, 
			"PARENT" => "FORM_CONTENT_NEW_NAME",
		);
		
		$arComponentParameters['PARAMETERS']["SORT_".$PROPERTY_CODE] = array(
			"NAME" => "Задать порядок поля - ".$PROPERTY_NAME, 
			"TYPE" => "STRING",
			"DEFAULT" => ($PROPERTY_CODE_KEY+1)*10, 
			"PARENT" => "FORM_CONTENT_SORT",
		);
		
		if($arCurrentValues["USE_PLACEHOLDER"] == "Y")
		{
			$arComponentParameters['PARAMETERS']["PLACEHOLDER_".$PROPERTY_CODE] = Array(
				"NAME" => "Placeholder - ".$PROPERTY_NAME, 
				"TYPE" => "STRING",
				"DEFAULT" => $PROPERTY_NAME, 
				"PARENT" => "FORM_CONTENT_PLACEHOLDER",
			);
		}
	}
	
	$arComponentParameters['PARAMETERS']['REQUIRED_PROPERTY_CODE'] = array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>40,
			"NAME" => Loc::getMessage("MFP_REQUIRED_PROPERTY"), 
			"TYPE"=>"LIST", 
			"MULTIPLE"=>"Y", 
			//"VALUES" => $arProperty_LNS,
			"VALUES" => $REQUIRED_PROPERTIES,
			"DEFAULT"=>"", 
			"SIZE" => count($REQUIRED_PROPERTIES)+1,
			"ADDITIONAL_VALUES" => "Y",
	);
	unset($REQUIRED_PROPERTIES);
		
 	if($arCurrentValues["USE_SMS_CONFIRM"] == "Y")
	{
		$arComponentParameters['PARAMETERS']["SMS_FORM_SUBMI"] = Array(
			"NAME" => Loc::getMessage("MFP_SMS_FORM_SUBMIT"), 
			"TYPE" => "STRING",
			"DEFAULT" => "Подтвердить", 
			"PARENT" => "FORM_CONTENT_VISUAL",
		);
	}
/* 	if($arCurrentValues["USE_PRODUCT_ID"] == "Y")
	{
		
		$arComponentParameters['PARAMETERS']["SHOW_TOTAL_SECTIONS_AND_ELEMENTS"] = Array(
			"NAME" => Loc::getMessage("MFP_SHOW_TOTAL_SECTIONS_AND_ELEMENTS"), 
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N", 
			"PARENT" => "FORM_CONTENT_VISUAL",
		);
		$arComponentParameters['PARAMETERS']["USE_TOTAL_COST"] = Array(
			"NAME" => Loc::getMessage("MFP_USE_TOTAL_COST"), 
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N", 
			"PARENT" => "FORM_CONTENT_VISUAL",
			"REFRESH" => "Y",
		);
		if($arCurrentValues["USE_TOTAL_COST"] == "Y")
		{
			$arComponentParameters['PARAMETERS']["IS_BASKET"] = Array(
				"NAME" => Loc::getMessage("MFP_IS_BASKET"), 
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "N", 
				"PARENT" => "FORM_CONTENT_VISUAL",
				
			);
		}
		$arComponentParameters['PARAMETERS']["CATALOG_IBLOCK_TYPE"] = array(
			"SORT"=>600,
			"PARENT" => "FORM_CONTENT_VISUAL",
			"NAME" => Loc::getMessage("CATALOG_IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		);
		$arComponentParameters['PARAMETERS']["CATALOG_IBLOCK_ID"] = array(
			"SORT"=>610,		
			"PARENT" => "FORM_CONTENT_VISUAL",
			"NAME" => Loc::getMessage("CATALOG_IBLOCK_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIblockListCatalog,
			"ADDITIONAL_VALUES" => "Y",
			// "REFRESH" => "Y",
		);
		$arComponentParameters['PARAMETERS']["OFFERS_IBLOCK_TYPE"] = array(
			"SORT"=>620,
			"PARENT" => "FORM_CONTENT_VISUAL",
			"NAME" => Loc::getMessage("OFFERS_IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		);
		$arComponentParameters['PARAMETERS']["OFFERS_IBLOCK_ID"] = array(
			"SORT"=>630,
			"PARENT" => "FORM_CONTENT_VISUAL",
			"NAME" => Loc::getMessage("OFFERS_IBLOCK_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIblockListOffers,
			"ADDITIONAL_VALUES" => "Y",
			// "REFRESH" => "Y",
		);
		
		$arComponentParameters['PARAMETERS']['PRODUCT_PROPERTY_CODE'] = array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>500,
			"NAME" => Loc::getMessage("MFP_PRODUCT_PROPERTY_CODE"), 
			"TYPE"=>"LIST", 
			"MULTIPLE"=>"Y", 
			"VALUES" => $arProperty_E,
			"DEFAULT"=>"", 
		);
		
		
		$arComponentParameters['PARAMETERS']['PRODUCT_ID'] = array(
			"PARENT" => "FORM_CONTENT_VISUAL",
			"SORT"=>510,
			"NAME" => Loc::getMessage("MFP_PRODUCT_ID"), 
			"TYPE"=>"STRING", 
			"DEFAULT"=>"", 
		);
		

	} */

}
?>