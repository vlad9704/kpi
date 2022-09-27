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
	"NEWS_TITLE_BLOCK" => Array(
		"NAME" => "Заголовок блока \"Новости и события\"",
		"TYPE" => "STRING",
		"DEFAULT" => "Новости и события",
	),
	"NEWS_LINK_TEXT" => Array(
		"NAME" => "Текст кнопки \"Все новости и события\"",
		"TYPE" => "STRING",
		"DEFAULT" => "Все новости и события",
	),
	"NEWS_LINK" => Array(
		"NAME" => "Ссылка кнопки \"Все новости и события\"",
		"TYPE" => "STRING",
		"DEFAULT" => "/press-center/news-and-events/",
	),
);
?>
