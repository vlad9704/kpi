<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"kpi:content.editor", 
	"kpi-footer-soc", 
	array(
		"COMPONENT_TEMPLATE" => "kpi-footer-soc",
		"LIST_SOCIAL_NETWORKS" => array(
			0 => "Facebook",
			1 => "Instagram",
			2 => "Youtube",
			3 => "Linkdin",
			4 => "",
		),
		"FACEBOOK_LOGO" => "/local/templates/main_kpi/assets/img/svg/facebook.svg",
		"FACEBOOK_LINK" => "https://www.facebook.com/profile.php?id=100071386480040",
		"INSTAGRAM_LOGO" => "/local/templates/main_kpi/assets/img/svg/insta.svg",
		"INSTAGRAM_LINK" => "https://www.instagram.com/kpi_inc/",
		"YOUTUBE_LOGO" => "/local/templates/main_kpi/assets/img/svg/youtube.svg",
		"YOUTUBE_LINK" => "https://www.youtube.com/channel/UC5tLdk81ZB3EXFkPssmQ43Q",
		"GOOGLE_LOGO" => "/local/templates/main_kpi/assets/img/svg/google+.svg",
		"GOOGLE_LINK" => "https://www.google.ru/",
		"TWITTER_LOGO" => "/local/templates/main_kpi/assets/img/svg/twitter.svg",
		"TWITTER_LINK" => "https://twitter.com/?lang=ru",
		"LINKDIN_LOGO" => "/local/templates/main_kpi/assets/img/svg/linkdin.svg",
		"LINKDIN_LINK" => "https://www.linkedin.com/company/тоо-«kazakhstan-petrochemical-industries-inc-»",
		"_LOGO" => "",
		"_LINK" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>