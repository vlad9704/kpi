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
	
	"PARTICIPANTS_TITLE_BLOCK" => Array(
		"NAME" => "Заголовок блока \"О компании\"",
		"TYPE" => "STRING",
		"DEFAULT" => "О компании",
	),

	"PARTICIPANTS_SUBTITLE" => Array(
      "NAME"      => "Подзаголовок блока \"О компании\"",
      "TYPE"      => "CUSTOM",
      "JS_FILE"   => "/local/templates/main_kpi/components/bitrix/news.list/main-about/settings.js",
      "JS_EVENT"   => "OnTextAreaConstruct",
      "DEFAULT"   => "ТОО Kazakhstan Petrochemical Industries Inc.<br>(Казахстан Петрокемикал Индастриз Инк.)",
	),
	"PARTICIPANTS_TEXT" => Array(
      "NAME"      => "Текст блока \"О компании\"",
      "TYPE"      => "CUSTOM",
      "JS_FILE"   => "/local/templates/main_kpi/components/bitrix/news.list/main-about/settings.js",
      "JS_EVENT"   => "OnTextAreaConstruct",
      "DEFAULT"   => "",
	),
	"PARTICIPANTS_LOGO_BLOCK" => Array(
		"NAME" => "Картинка блока \"О компании\"",
		"TYPE" => "FILE",
		"FD_TARGET" => "F",
		"FD_EXT" => $ext,
		"FD_UPLOAD" => true,
		"FD_USE_MEDIALIB" => true,
		"FD_MEDIALIB_TYPES" => Array("svg", "jpg", "jpeg", "gif", "png"),
	),
	"PARTICIPANTS_LINK_TEXT" => Array(
		"NAME" => "Текст кнопки \"Подробнее\"",
		"TYPE" => "STRING",
		"DEFAULT" => "Подробнее",
	),
	"PARTICIPANTS_LINK" => Array(
		"NAME" => "Ссылка кнопки \"Подробнее\"",
		"TYPE" => "STRING",
		"DEFAULT" => "/about-company/",
	),


);
?>
