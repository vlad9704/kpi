<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Горячая линия Самрук-Казына");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "top",
		"EDIT_TEMPLATE" => ""
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"kpi:content.editor", 
	"hotline", 
	array(
		"COMPONENT_TEMPLATE" => "hotline",
		"KPI_BACK_BTN_LINK" => "",
		"KPI_BACK_BTN_TEXT" => "",
		"KPI_EMAILS" => array(
			0 => "mail@sk-hotline.kz",
			1 => "",
		),
		"KPI_PHONES" => array(
			0 => "8 800 080 4747",
			1 => "+7 771 191 8816",
			2 => "",
		),
		"KPI_TEXT" => "",
		"KPI_TITLE" => "Телефон горячей линии",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?><br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "botton",
		"EDIT_TEMPLATE" => ""
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>