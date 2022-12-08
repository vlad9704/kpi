<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"",
	Array(
		"FORGOT_PASSWORD_URL" => SITE_DIR."auth/forgot_password.php",
		"PROFILE_URL" => SITE_DIR."auth/profile.php",
		"REGISTER_URL" => SITE_DIR."auth/register.php",
		"SHOW_ERRORS" => "Y"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>