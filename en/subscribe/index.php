<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Subscription");
?><?$APPLICATION->IncludeComponent("bitrix:subscribe.edit", "kpi", Array(
	"AJAX_MODE" => "N",	// Enable AJAX mode
		"AJAX_OPTION_ADDITIONAL" => "",	// Additional ID
		"AJAX_OPTION_HISTORY" => "N",	// Emulate browser navigation
		"AJAX_OPTION_JUMP" => "N",	// Enable scrolling to component's top
		"AJAX_OPTION_STYLE" => "Y",	// Enable styles loading
		"ALLOW_ANONYMOUS" => "Y",	// Allow anonymous subscription
		"CACHE_TIME" => "3600",	// Cache time (sec.)
		"CACHE_TYPE" => "A",	// Cache type
		"SET_TITLE" => "N",	// Set page title
		"SHOW_AUTH_LINKS" => "N",	// Show authorization links on anonymous mode
		"SHOW_HIDDEN" => "N",	// Show hidden subscription categories
		"COMPONENT_TEMPLATE" => "clear"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>