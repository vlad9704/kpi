<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Компанияның деректемелері");
?>

<?$APPLICATION->IncludeComponent(
	"kpi:content.editor", 
	"requisites", 
	array(
		"COMPONENT_TEMPLATE" => "requisites",
		"KPI_BACK_BTN_TEXT" => "Артқа",
		"KPI_BACK_BTN_LINK" => SITE_DIR."contacts/",
		"LEGAL_ADDRESS_TITLE" => "Заңды мекен-жайы:",
		"LEGAL_ADDRESS_TEXT" => "Қазақстан Республикасы, Атырау облысы, Атырау қаласы, Атырау-Доссор тас жолы, 295 ғимарат",
		"ACTUAL_ADDRESS_TITLE" => "Нақты мекен-жайы (пошта жіберу үшін):",
		"ACTUAL_ADDRESS_TEXT" => "Қазақстан Республикасы, 060000, Атырау облысы, Атырау қ. Адмирал Л.Владимирский, 26Б",
		"RNN_ADDRESS_TITLE" => "РНН",
		"RNN_ADDRESS_TEXT" => "600500572663",
		"BIN_ADDRESS_TITLE" => "БИН",
		"BIN_ADDRESS_TEXT" => "080340021186",
		"OKPO_ADDRESS_TITLE" => "ОКПО",
		"OKPO_ADDRESS_TEXT" => "50391885",
		"OKED_ADDRESS_TITLE" => "ОКЭД",
		"OKED_ADDRESS_TEXT" => "20161",
		"KPI_TEXT" => "ТОО \"Kazakhstan Petrochemical Industries Inc.\" (\"Казахстан Петрокемикал Индастриз Инк.\")",
		"KPI_TEXT_IIK" => "ИИК",
		"IIK_KZT_1_TITLE" => "",
		"IIK_KZT_1" => "KZ849300001000011402  в АО \"Торгово-промышленный Банк Китая\" в городе Алматы БИК ICBKKZKX",
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