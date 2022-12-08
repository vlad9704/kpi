<?
use Bitrix\Main;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

// echo Loc::getMessage("INTERVOLGA_TIPS.TITLE");
?>
<!doctype html>
<html class="no-js" lang="ru">
<head>



<!-- Google Tag Manager -->
<script data-skip-moving=true>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5VHHL37');</script>
<!-- End Google Tag Manager -->



    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?
		Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap&subset=cyrillic" rel="stylesheet">');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/jquery.fancybox.min.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/owl.carousel.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/datepicker.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/icon.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/animate.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/slick.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/flipclock.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/app.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/custom.css");
		Asset::getInstance()->addString('<link rel="icon" type="/image/png" href="/favicon.ico">');
	?>
	<title><?$APPLICATION->ShowTitle('title')?> - <?=SITE_SERVER_NAME?></title>

	<?$APPLICATION->ShowHead();?>

</head>
<body>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VHHL37"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<?if($USER->IsAuthorized()):?><div id="bitrix-panel" style="clear:both;"><? $APPLICATION->ShowPanel() ?></div> <?endif;?>
<div class="page-wrapper <?=($USER->IsAdmin())?"from-bx-panel-top-margin":""?>" >

<?
	 global $APPLICATION, $USER;
	 $bIs404Page =  (!defined("ERROR_404") && ERROR_404 != "Y");
	 $bIsMainPage = $APPLICATION->GetCurPage(false) == SITE_DIR;
	 $headerStaticClass = !$bIsMainPage ? 'header-wrapper--static':'';
	 $headerStaticImage = $APPLICATION->GetDirProperty("header-static-image");
	 $headerStaticStyle = (!$bIsMainPage && $headerStaticImage)? 'style="background-image: url('.$APPLICATION->GetDirProperty("header-static-image").'"':'';

	 $bIsHistoryPage = strpos($APPLICATION->GetCurDir(), SITE_DIR . "about-company/history/") !== false;
	 $bIsSearchPage = strpos($APPLICATION->GetCurDir(), SITE_DIR . "search/") !== false;
	 $bIsContactPage = $APPLICATION->GetCurDir() == SITE_DIR . "contacts/";
	 $bIsProjectPage = strpos($APPLICATION->GetCurDir(), SITE_DIR . "activities/ighk-project/") !== false;
	 $bIsHtmlPage = strpos($APPLICATION->GetCurUri(), ".html") !== false;
	// $bIsPartnershipPage = strpos($APPLICATION->GetCurDir(), SITE_DIR . "partnership/") !== false;
	// $bIsContactsPage = $APPLICATION->GetCurDir() == SITE_DIR . "contacts/";

?>
<?//$APPLICATION->IncludeFile(SITE_DIR."/page_blocks/social-networks-block.php");?>


<div class="search-fixed-wrapper">
	<div class="row medium-align-center large-align-center">
		<div class="small-10 medium-10 large-8 column">
			<?$APPLICATION->IncludeComponent(
	"bitrix:search.title",
	"search-fixed-wrapper",
	array(
		"CATEGORY_0" => array(
			0 => "no",
		),
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0_iblock_content" => array(
			0 => "all",
		),
		"CATEGORY_0_main" => array(
		),
		"CHECK_DATES" => "N",
		"CONTAINER_ID" => "",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "date",
		"PAGE" => SITE_DIR."search/index.php",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "N",
		"TOP_COUNT" => "5",
		"USE_LANGUAGE_GUESS" => "Y",
		"COMPONENT_TEMPLATE" => "search-fixed-wrapper",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
		</div>
	</div>
</div>


<header class="header-wrapper <?=$headerStaticClass?>" <?=$headerStaticStyle?>>

	<?
	//Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("dynamic-header-bg");
		// /local/templates/main_kpi/components/bitrix/news.list/main-slaider
		$APPLICATION->ShowViewContent('header-bg');
	//Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("dynamic-header-bg", "");
	?>

	<div class="header_bg_gradient"></div>

	<div class="header-wrapper__top">
		<div class="header-box">
			<div class="row align-middle align-justify">
				<div class="shrink column">
					<div class="row align-middle collapse">
						<div class="shrink column">
							<a href="<?=SITE_DIR?>" class="logo-box">
								<?$APPLICATION->IncludeComponent(
									"kpi:content.editor",
									"kpi-header-logo",
									array(
										"COMPONENT_TEMPLATE" => "kpi-header-logo",
										"KPI_LOGO_1" => "/local/templates/main_kpi/assets/img/svg/logo_1.svg",
										"KPI_LOGO_2" => "/local/templates/main_kpi/assets/img/svg/logo_2.svg",
										"KPI_LOGO_3" => "/local/templates/main_kpi/assets/img/svg/logo_3.svg"
									),
									false
								);?>
							</a>
						</div>
						<div class="hide-for-small-only shrink column">
							<div class="slogan-box">
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => SITE_TEMPLATE_PATH."/include".SITE_DIR."kpi_slogan.php"
									)
								);?>
							</div>
						</div>
					</div>
				</div>
				<div class="shrink column">
					<div class="row align-middle collapse">
						<div class="show-for-large shrink column">
							<a href="<?=SITE_DIR?>contacts/online-reception/" class="header-reception"><?=Loc::getMessage("KPI_HEADER_BTN_ONLAYN_PRIYEMNAYA")?></a>
						</div>
						<div class="show-for-large shrink column">
							<?$APPLICATION->IncludeComponent(
	"kpi:content.editor",
	"kpi-header-phones",
	array(
		"COMPONENT_TEMPLATE" => "kpi-header-phones",
		"KPI_PHONES" => array(
			0 => "8 (7122) 306-500",
			1 => "",
		)
	),
	false
);?>
						</div>
						<div class="hide-for-small-only shrink column">
							<?$APPLICATION->IncludeComponent("bitrix:main.site.selector", "kpi", Array(
								"CACHE_TIME" => "3600",
									"CACHE_TYPE" => "A",
									"SITE_LIST" => array(
										0 => "*all*",
									)
								),
								false
							);?>
						</div>
						<div class="shrink column">
							<a href="javascript:;" class="search-call"><i class="icon-search"></i></a>
						</div>
						<div class="shrink column">
							<div class="icon_auth">
								<a href="<?=SITE_DIR.'auth/'?>">
									<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 86.4 86.4" style="enable-background:new 0 0 86.4 86.4;" xml:space="preserve">
<path d="M50.97,31.17c0,0.86-0.02,1.73,0,2.59c0.02,0.89-0.08,1.77-0.31,2.63c-0.1,0.37-0.18,0.74-0.3,1.11
	c-0.21,0.65-0.54,1.24-0.95,1.79c-0.1,0.13-0.14,0.26-0.14,0.42c0.01,0.48,0.01,0.96,0,1.44c0,0.18,0.05,0.3,0.18,0.42
	c0.33,0.31,0.69,0.57,1.07,0.81c1.21,0.76,2.48,1.43,3.73,2.11c1.34,0.72,2.7,1.43,3.99,2.25c0.84,0.53,1.65,1.1,2.4,1.75
	c0.55,0.48,0.96,1.07,1.34,1.68c0.1,0.16,0.15,0.35,0.21,0.53c0.06,0.22,0.1,0.45,0.16,0.68c0.09,0.29,0.09,0.58,0.09,0.88
	c0.03,1.21-0.24,2.38-0.52,3.55c-0.27,1.13-0.7,2.19-1.34,3.16c-0.51,0.78-1.05,1.55-1.71,2.22c-1.15,1.17-2.48,2.11-3.92,2.9
	c-1.6,0.89-3.32,1.49-5.09,1.92c-1.06,0.26-2.13,0.49-3.2,0.7c-0.62,0.12-1.25,0.2-1.87,0.26c-0.71,0.08-1.43,0.14-2.15,0.18
	c-0.39,0.02-0.78,0-1.17-0.01c-0.31-0.01-0.62-0.04-0.93-0.06c-0.92-0.06-1.83-0.18-2.73-0.33c-1.5-0.25-2.99-0.6-4.45-1.02
	c-1.78-0.51-3.48-1.21-5.05-2.22c-1.07-0.69-2.11-1.43-2.98-2.37c-1.35-1.48-2.46-3.11-2.94-5.09c-0.18-0.74-0.34-1.48-0.48-2.22
	c-0.11-0.61-0.16-1.24-0.12-1.86c0.02-0.32,0.13-0.64,0.19-0.96c0.09-0.49,0.32-0.91,0.6-1.32c0.51-0.75,1.16-1.33,1.88-1.87
	c1.47-1.1,3.07-1.99,4.68-2.86c1.44-0.78,2.9-1.52,4.3-2.38c0.48-0.3,0.96-0.61,1.38-1c0.11-0.1,0.17-0.21,0.17-0.37
	c-0.01-0.5-0.01-1.01,0-1.51c0-0.11-0.01-0.22-0.09-0.31c-0.68-0.88-1.09-1.89-1.31-2.98c-0.09-0.44-0.19-0.87-0.26-1.32
	c-0.04-0.26-0.05-0.53-0.05-0.79c0-2.06,0.01-4.13-0.01-6.19c0-0.9,0.23-1.75,0.43-2.62c0.17-0.7,0.45-1.34,0.82-1.96
	c0.85-1.4,2-2.48,3.42-3.29c0.67-0.38,1.39-0.59,2.14-0.75c0.43-0.09,0.86-0.18,1.29-0.25c0.8-0.13,1.59-0.08,2.37,0.12
	c0.37,0.09,0.74,0.18,1.12,0.27c0.55,0.14,1.08,0.35,1.56,0.65c0.86,0.54,1.71,1.11,2.35,1.91c0.59,0.73,1.14,1.48,1.49,2.37
	c0.21,0.53,0.32,1.09,0.46,1.64c0.19,0.72,0.26,1.46,0.25,2.21C50.96,29.33,50.97,30.25,50.97,31.17L50.97,31.17z M46.24,31.19
	L46.24,31.19c0-1.05,0-2.1,0-3.14c0-0.29,0-0.6-0.07-0.88c-0.15-0.61-0.42-1.18-0.81-1.67c-0.47-0.6-1.07-1.05-1.79-1.32
	c-0.19-0.07-0.39-0.15-0.59-0.19c-0.41-0.09-0.83-0.05-1.24-0.02c-0.21,0.02-0.44,0.02-0.64,0.09c-0.66,0.23-1.29,0.52-1.79,1.02
	c-0.81,0.81-1.29,1.75-1.29,2.92c0,2.14,0,4.29,0,6.43c0,0.26,0,0.54,0.07,0.79c0.16,0.62,0.43,1.2,0.84,1.71
	c0.33,0.4,0.64,0.8,0.69,1.34c0.01,0.05,0.02,0.11,0.04,0.16c0.07,0.22,0.08,0.45,0.08,0.69c0,0.84,0.02,1.68-0.01,2.52
	c-0.02,0.61-0.2,1.19-0.39,1.77c-0.02,0.05-0.05,0.1-0.08,0.15c-0.4,0.59-0.8,1.18-1.36,1.63c-0.73,0.59-1.49,1.13-2.29,1.62
	c-1.39,0.86-2.84,1.6-4.27,2.37c-1.24,0.67-2.48,1.33-3.64,2.12c-0.37,0.25-0.69,0.57-1.03,0.85c-0.11,0.09-0.15,0.21-0.14,0.36
	c0.02,0.18,0.01,0.37,0.03,0.55c0.05,0.43,0.08,0.87,0.19,1.28c0.58,2.11,1.86,3.72,3.67,4.92c0.91,0.6,1.89,1.08,2.9,1.48
	c1.23,0.49,2.49,0.91,3.8,1.14c0.74,0.13,1.48,0.24,2.22,0.33c0.69,0.08,1.38,0.15,2.07,0.18c1.31,0.06,2.62-0.04,3.92-0.23
	c0.83-0.12,1.66-0.24,2.48-0.42c1.38-0.31,2.72-0.78,4-1.38c1.13-0.53,2.23-1.12,3.15-1.98c0.58-0.54,1.14-1.1,1.55-1.79
	c0.75-1.25,1.21-2.58,1.21-4.06c0-0.18-0.05-0.31-0.18-0.44c-0.54-0.55-1.18-0.98-1.85-1.36c-1.44-0.81-2.89-1.61-4.34-2.41
	c-1.51-0.82-3.01-1.65-4.39-2.69c-0.64-0.48-1.22-1-1.67-1.67c-0.26-0.38-0.46-0.77-0.57-1.23c-0.13-0.57-0.22-1.14-0.2-1.73
	c0.02-0.63,0.02-1.26,0-1.89c-0.01-0.5,0.16-0.96,0.25-1.43c0.01-0.04,0.03-0.07,0.05-0.1c0.15-0.21,0.29-0.42,0.46-0.62
	c0.41-0.49,0.65-1.06,0.86-1.65c0.03-0.07,0.04-0.16,0.05-0.23c0.02-0.32,0.05-0.64,0.05-0.96C46.24,33.14,46.24,32.17,46.24,31.19
	L46.24,31.19z"/>
</svg>

								</a>
							</div>
						</div>
						<div class="shrink column">
							<a href="javascript:;" class="menu-call"><i class="icon-burger"></i></a>
							<a href="javascript:;" class="menu-call menu-call--close"><i class="icon-close"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-menu-wrapper">
		<div class="row align-middle align-justify show-for-small-only">
			<div class="shrink column">
				<?$APPLICATION->IncludeComponent("bitrix:main.site.selector", "kpi", Array(
					"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "A",
						"SITE_LIST" => array(
							0 => "*all*",
						)
					),
					false
				);?>
			</div>
		</div>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "kpi-main", Array(
			"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
				"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
				"DELAY" => "N",	// Откладывать выполнение шаблона меню
				"MAX_LEVEL" => "1",	// Уровень вложенности меню
				"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
				"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
				"MENU_CACHE_TYPE" => "A",	// Тип кеширования
				"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
				"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
				"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
				"COMPONENT_TEMPLATE" => "kpi-main"
			),
			false
		);?>

		<div class="row align-middle align-justify">
			<div class="shrink column">
				<div class="footer-box__copyright">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "kpi_copyright", Array(
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"CHILD_MENU_TYPE" => "copyright",	// Тип меню для остальных уровней
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"MAX_LEVEL" => "1",	// Уровень вложенности меню
							"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
								0 => "",
							),
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_TYPE" => "A",	// Тип кеширования
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"ROOT_MENU_TYPE" => "copyright",	// Тип меню для первого уровня
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						),
						false
					);?>
				</div>
			</div>
			<div class="shrink column">
				<div class="developer-box">
					<?=Loc::getMessage("KPI_FOOTER_DEVELOPERS_INFO")?>
				</div>
			</div>
		</div>
	</div>

<?
if($bIsMainPage)
{

?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main-slaider",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => LANGUAGE_ID,
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "RIGHT_BTN_SHOW",
			1 => "RIGHT_BTN_TEXT",
			2 => "RIGHT_BTN_LINK",
			3 => "LEFT_BTN_SHOW",
			4 => "LEFT_BTN_TEXT",
			5 => "LEFT_BTN_LINK",
			6 => "VIDEO",
			7 => "BG_IMAGE",
			8 => "TIZERS",
			9 => "BG_IMAGE_SMALL",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main-slaider",
		"LEFT_BTN_TEXT" => "Компания туралы",
		"LEFT_BTN_LINK" => "about-company/",
		"RIGHT_BTN_TEXT" => "Жоба туралы",
		"RIGHT_BTN_LINK" => "activities/ighk-project/",
		"CUSTOM_ITEMS" => ""
	),
	false
);?>


<?
}
else
{
?>
	<div class="header-wrapper__crumbs">
		<div class="row">
			<div class="small-12 column">
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "kpi", Array(
					"PATH" => "","SITE_ID" => SITE_ID,"START_FROM" => "0",),
					false
				);?>
			</div>
		</div>
	</div>
	<div class="header-wrapper__title">
		<div class="row align-center">
			<div class="small-12 medium-11 large-10 column">
				<h1><?=$APPLICATION->ShowTitle('h1');?> </h1>
				<?$APPLICATION->ShowViewContent('header-wrapper__title');?>
				<?$APPLICATION->ShowViewContent('header-countdown');?>
			</div>
		</div>
	</div>
<?
}
?>
</header>

<div class="content-box <?=$bIsContactPage?"content-box--contact":"";?><?=$bIsProjectPage?"content-box--project":"";?>">
<?
// if npt main page
if(!$bIsMainPage && !$bIsProjectPage && !$bIsHistoryPage)
{
?>
	<div class="row align-center">
		<div class="small-12 medium-10 large-<?=$bIsSearchPage?"8":"11"?> column<?if(CSite::InDir('/'.LANGUAGE_ID.'/activities/')) echo ' internal_container'?>">
		<?if(!$bIsHtmlPage):?>
			<?$APPLICATION->ShowViewContent('html_top_menu_on_page');?>
		<?endif;?>
<?
}

// if main page
if($bIsMainPage)
{
	require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/page_blocks/index-blocks_".LANGUAGE_ID.".php");
}
?>


<?// if project page
if($bIsProjectPage)
{
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/page_blocks/project-page_".LANGUAGE_ID.".php");
?>

<?
}
?>


