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
		<div class="small-12 medium-10 large-<?=$bIsSearchPage?"8":"8"?> column">
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


