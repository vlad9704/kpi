<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Online reception");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "top",
		"EDIT_TEMPLATE" => ""
	)
);?> <br>
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
		"EMAIL_TO" => "reception@kpi.kz",
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
		"FORM_SUBMIT" => "Send",
		"FORM_SUBTITLE" => "",
		"FORM_TITLE" => "Online Reception Form",
		"FORM_TITLE_FOR_EMAIL" => "",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "forms",
		"KPI_BACK_BTN_LINK" => "",
		"KPI_BACK_BTN_TEXT" => "",
		"NEW_NAME_COMPANY" => "Company",
		"NEW_NAME_EMAIL" => "E-mail",
		"NEW_NAME_NAME" => "Name",
		"NEW_NAME_PHONE" => "Phone",
		"NEW_NAME_PREVIEW_TEXT" => "Message",
		"OK_TEXT" => "<p>We will contact you within 24 hours.<br>If you do not want to wait, then you can write to us by mail or call the hotline.</p>",
		"OK_TEXT_TITLE" => "<h2>Thank you!</h2><h3>Your message has been sent.</h3>",
		"PLACEHOLDER_COMPANY" => "Company",
		"PLACEHOLDER_EMAIL" => "E-mail",
		"PLACEHOLDER_NAME" => "Ivanov Petr Sergeevich",
		"PLACEHOLDER_PHONE" => "+7 (___) ___ - __ - __",
		"PLACEHOLDER_PREVIEW_TEXT" => "Message Text...",
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
		"PLACEHOLDER_SMS_CONFIRM_CODE" => "Confirmation code",
		"NEW_NAME_SMS_CONFIRM_CODE" => "Confirmation code",
		"SORT_SMS_CONFIRM_CODE" => "40",
		"SMS_FORM_SUBMI" => "Confirm",
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
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>