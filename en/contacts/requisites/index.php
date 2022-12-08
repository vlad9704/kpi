<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Company details");
?>

<?$APPLICATION->IncludeComponent(
	"kpi:content.editor", 
	"requisites", 
	array(
		"COMPONENT_TEMPLATE" => "requisites",
		"KPI_BACK_BTN_TEXT" => "Back",
		"KPI_BACK_BTN_LINK" => SITE_DIR."contacts/",
		"LEGAL_ADDRESS_TITLE" => "Legal address",
		"LEGAL_ADDRESS_TEXT" => "Republic of Kazakhstan, Atyrau region, Atyrau city, Atyrau-Dossor highway, building 295",
		"ACTUAL_ADDRESS_TITLE" => "Actual address (for sending mail):",
		"ACTUAL_ADDRESS_TEXT" => "Republic of Kazakhstan, 060000, Atyrau region, Atyrau, st. Admiral L. Vladimirsky, 26B",
		"RNN_ADDRESS_TITLE" => "TIN",
		"RNN_ADDRESS_TEXT" => "600500572663",
		"BIN_ADDRESS_TITLE" => "BIN",
		"BIN_ADDRESS_TEXT" => "080340021186",
		"OKPO_ADDRESS_TITLE" => "OKPO",
		"OKPO_ADDRESS_TEXT" => "50391885",
		"OKED_ADDRESS_TITLE" => "CCЕA",
		"OKED_ADDRESS_TEXT" => "20161",
		"KPI_TEXT" => "ТОО \"Kazakhstan Petrochemical Industries Inc.\"",
		"KPI_TEXT_IIK" => "IIC ",
		"IIK_KZT_1_TITLE" => "",
		//"IIK_KZT_1" => "KZ849300001000011402 in JSC “Commercial and Industrial Bank of China” in Almaty BIC ICBKKZKX",
		"IIK_KZT_1" => "KZ849300001000011402 in АО “Торгово-промышленный Банк Китая” в городе Алматы BIC ICBKKZKX",
		"IIK_KZT_2_TITLE" => "KZT",
		"IIK_KZT_2" => "KZ189300001000011232",
		"IIK_USD_1_TITLE" => "USD",
		"IIK_USD_1" => "KZ889300001000011233",
		"IIK_USD_2_TITLE" => "USD",
		"IIK_USD_2" => "KZ309300001000011404",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>