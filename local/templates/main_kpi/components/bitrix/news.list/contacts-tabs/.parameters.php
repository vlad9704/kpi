<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"TITLE_TAB_BLOCK" => Array(
		"NAME" => GetMessage("TITLE_TAB_BLOCK"),
		"TYPE" => "STRING",
		"DEFAULT" => "Общая контактная информация",
	),
	"TITLE_SOCIAL_NETWORK_BLOCK" => Array(
		"NAME" => GetMessage("TITLE_SOCIAL_NETWORK_BLOCK"),
		"TYPE" => "STRING",
		"DEFAULT" => "Компания в социальных сетях",
	),
	"MAP_CENTER_COORDINATES" => Array(
		"NAME" => GetMessage("MAP_CENTER_COORDINATES"),
		"TYPE" => "STRING",
		"DEFAULT" => "48.5517362041292,66.9044335",
	),
	"MAP_SCALE" => Array(
		"NAME" => GetMessage("MAP_SCALE"),
		"TYPE" => "STRING",
		"DEFAULT" => "5",
	),
);
?>
