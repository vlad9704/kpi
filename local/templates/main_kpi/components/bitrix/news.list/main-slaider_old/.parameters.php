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
	"LEFT_BTN_LINK" => Array(
		"PARENT"=>"BASE",
		"NAME" => "Ссылка кнопки (красная) в формате 'about-company/' без '/ru/'",
		"TYPE" => "STRING",
		"DEFAULT" => "#",
	),

	"RIGHT_BTN_LINK" => Array(
		"PARENT"=>"BASE",
		"NAME" => "Ссылка кнопки (белая), формате 'activities/ighk-project/' без '/ru/'",
		"TYPE" => "STRING",
		"DEFAULT" => "#",
	),

);
?>
