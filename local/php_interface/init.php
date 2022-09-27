<?
if (file_exists($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/include/function.php'))
	require_once($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/include/function.php');


if (file_exists($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/include/event_handlers.php'))
	require_once($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/include/event_handlers.php');

// if (file_exists($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/include/Mobile_Detect.php'))
	// require_once($_SERVER["DOCUMENT_ROOT"].'/local/php_interface/include/Mobile_Detect.php');



$bIs1CExchange = strpos($_SERVER['REQUEST_URI'], "/bitrix/admin/1c_exchange.php") !== false;
if($_SERVER['SERVER_PORT'] == 80 && !$bIs1CExchange)
	LocalRedirect( 'https://' . $_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'], false, "301 Moved permanently" ); 

//https://kpi.siter.org.kz/bitrix/admin/translate_list.php?lang=ru&path=/local/templates/main_kpi/lang/
