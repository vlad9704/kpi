<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters['KPI_TEXT'] = array(
      "PARENT"   => "CUSTOM_EDIT_CONTENT",
      "NAME"      => "Текст",
      "TYPE"      => "CUSTOM",
      "JS_FILE"   => "/local/components/kpi/content.editor/settings.js",
      "JS_EVENT"   => "OnTextAreaConstruct",
      "DEFAULT"   => null,
);
$arTemplateParameters['LEGAL_ADDRESS_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Юридический адрес (Заголовок)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['LEGAL_ADDRESS_TEXT'] = array(
      "PARENT"   => "CUSTOM_EDIT_CONTENT",
      "NAME"      => "Юридический адрес (Текст)",
      "TYPE"      => "CUSTOM",
      "JS_FILE"   => "/local/components/kpi/content.editor/settings.js",
      "JS_EVENT"   => "OnTextAreaConstruct",
      "DEFAULT"   => null,
	  
);
$arTemplateParameters['ACTUAL_ADDRESS_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Фактический  адрес (Заголовок)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['ACTUAL_ADDRESS_TEXT'] = array(
      "PARENT"   => "CUSTOM_EDIT_CONTENT",
      "NAME"      => "Фактический  адрес (Текст)",
      "TYPE"      => "CUSTOM",
      "JS_FILE"   => "/local/components/kpi/content.editor/settings.js",
      "JS_EVENT"   => "OnTextAreaConstruct",
      "DEFAULT"   => null,
);

$arTemplateParameters['RNN_ADDRESS_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "РНН (Заголовок)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['RNN_ADDRESS_TEXT'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "РНН (Текст)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['BIN_ADDRESS_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "БИН (Заголовок)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['BIN_ADDRESS_TEXT'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "БИН (Текст)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['OKPO_ADDRESS_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "ОКПО (Заголовок)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['OKPO_ADDRESS_TEXT'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "ОКПО (Текст)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['OKED_ADDRESS_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "ОКЭД (Заголовок)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['OKED_ADDRESS_TEXT'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "ОКЭД (Текст)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

/**/
$arTemplateParameters['KPI_TEXT_IIK'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "ИИК (р/с) (Текст)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['IIK_KZT_1_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Заголовок KZT (основной)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['IIK_KZT_1'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "KZT (основной)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['IIK_KZT_2_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Заголовок KZT",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['IIK_KZT_2'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "KZT",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['IIK_USD_1_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Заголовок USD (основной)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

$arTemplateParameters['IIK_USD_1'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "USD (основной)",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['IIK_USD_2_TITLE'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "Заголовок USD",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);
$arTemplateParameters['IIK_USD_2'] = array(
	'PARENT' => 'CUSTOM_EDIT_CONTENT',
	'NAME' => "USD",
	'TYPE' => 'STRING',
	'DEFAULT' => '',
);

/**/
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