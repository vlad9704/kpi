<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Онлайн приемная");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "top",
		"EDIT_TEMPLATE" => ""
	)
);?>


<?$APPLICATION->IncludeComponent(
	"kpi:forms.d7", 
	"reception", 
	array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"COMPONENT_TEMPLATE" => "reception",
		"EMAIL_TO" => "info@kpi.kz",
		"EVENT_MESSAGE_ID" => array(
			0 => "30",
			1 => "",
		),
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "",
		),
		"FILES_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FORM_ID" => "reception",
		"FORM_SUBMIT" => "Отправить",
		"FORM_SUBTITLE" => "",
		"FORM_TITLE" => "Форма онлайн приемной",
		"FORM_TITLE_FOR_EMAIL" => "",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "forms",
		"KPI_BACK_BTN_LINK" => "",
		"KPI_BACK_BTN_TEXT" => "",
		"NEW_NAME_COMPANY" => "Компания",
		"NEW_NAME_EMAIL" => "E-mail",
		"NEW_NAME_NAME" => "ФИО",
		"NEW_NAME_PHONE" => "Телефон",
		"NEW_NAME_PREVIEW_TEXT" => "Сообщение",
		"OK_TEXT" => "<p>Обращения поступающие посредством Онлайн-приемной проходят проверку и обработку канцелярией Товарищетсва. <br>По возникшим вопросам просим обращаться по телефону:</p>",
		"OK_TEXT_TITLE" => "<h2>Спасибо!</h2><h3>Ваше обращение принято.</h3>",
		"PLACEHOLDER_COMPANY" => "Компания",
		"PLACEHOLDER_EMAIL" => "E-mail",
		"PLACEHOLDER_NAME" => "Иванов Петр Сергеевич",
		"PLACEHOLDER_PHONE" => "Телефон",
		"PLACEHOLDER_PREVIEW_TEXT" => "Текст сообщений...",
		"PROPERTY_CODE" => array(
			0 => "COMPANY",
			1 => "EMAIL",
			2 => "PHONE",
			3 => "SMS_CONFIRM_CODE",
			4 => "",
		),
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "",
		),
		"REQUIRED_PROPERTY_CODE" => array(
			0 => "PHONE",
			1 => "",
		),
		"SEND_TO_ADMIN" => "Y",
		"SEND_TO_USER" => "N",
		"SORT_COMPANY" => "20",
		"SORT_EMAIL" => "30",
		"SORT_NAME" => "10",
		"SORT_PHONE" => "40",
		"SORT_PREVIEW_TEXT" => "50",
		"TEXT_APPEAL_TO_USER" => "",
		"TEXT_MESSAGE_TO_USER" => "",
		"USE_PLACEHOLDER" => "Y",
		"PLACEHOLDER_MAILING_ADDRESS" => "Почтовый адрес",
		"PLACEHOLDER_REQUEST_PURPOSE" => "Характер обращения",
		"NEW_NAME_MAILING_ADDRESS" => "Почтовый адрес",
		"NEW_NAME_REQUEST_PURPOSE" => "Характер обращения",
		"SORT_MAILING_ADDRESS" => "30",
		"SORT_REQUEST_PURPOSE" => "40",
		"USE_SMS_CONFIRM" => "Y",
		"PLACEHOLDER_SMS_CONFIRM_CODE" => "Код подтверждения",
		"NEW_NAME_SMS_CONFIRM_CODE" => "Код подтверждения",
		"SORT_SMS_CONFIRM_CODE" => "40",
		"SMS_FORM_SUBMI" => "Подтвердить",
		"OK_PHONES" => array(
			0 => "+7 (7122) 30 65 00",
			1 => "",
		),
		"OK_EMAILS" => array(
			0 => "",
			1 => "",
		),
		"OK_LOGO" => "/local/templates/main_kpi/assets/img/svg/logo_3.svg",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>