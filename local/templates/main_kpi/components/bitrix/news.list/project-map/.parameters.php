<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$ext = 'svg,jpg,jpeg,gif,png';
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
	"BLOCK_TITLE" => Array(
		"PARENT"=>"BASE",
		"NAME" => "Заголовок блока",
		"TYPE" => "STRING",
		"DEFAULT" => "География поставок<br>оборудования",
	),
	"MAP_IMAGE" => Array(
		"PARENT" => "BASE",
		"NAME" => "Изображение карты",
		"TYPE" => "FILE",
		"FD_TARGET" => "F",
		"FD_EXT" => $ext,
		"FD_UPLOAD" => true,
		"FD_USE_MEDIALIB" => true,
		"FD_MEDIALIB_TYPES" => Array("svg", "jpg", "jpeg", "gif", "png"),
	),
);
?>
