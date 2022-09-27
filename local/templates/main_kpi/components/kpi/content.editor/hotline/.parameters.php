<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


$arTemplateParameters['KPI_TEXT'] = array(
      "PARENT"   => "CUSTOM_EDIT_CONTENT",
      "NAME"      => "Текст",
      "TYPE"      => "CUSTOM",
      "JS_FILE"   => "/local/components/kpi/content.editor/settings.js",
      "JS_EVENT"   => "OnTextAreaConstruct",
      "DEFAULT"   => null,
);
$arTemplateParameters['KPI_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Заголовок",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['KPI_PHONES'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Укажите телефон(-ы)",
	'TYPE' => 'STRING',
	'DEFAULT' => array('8 (701) 777-00-00'),
	"MULTIPLE"  =>  "Y",
	"ADDITIONAL_VALUES" => "Y"
);
$arTemplateParameters['KPI_EMAILS'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Укажите E-mail(-ы)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
	"MULTIPLE"  =>  "Y",
	"ADDITIONAL_VALUES" => "Y"
);

$arTemplateParameters['KPI_BACK_BTN_TEXT'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Текст кнопки \"Назад\"",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['KPI_BACK_BTN_LINK'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Ссылка кнопки \"Назад\"",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

?>