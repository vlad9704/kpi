<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
?><?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	"callback", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "callback",
		"EDIT_URL" => "result_edit.php",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "result_list.php",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "success.php",
		"USE_EXTENDED_ERRORS" => "Y",
		"WEB_FORM_ID" => "5",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?> <br>
 <br>
 Телефон: <a href="tel:8 7122 315222">8 7122 315222</a><br>
 Почта отдела маркетинга <a href="mailto:ml@kpi.kz">ml@kpi.kz</a><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>