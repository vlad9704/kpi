<?
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;
Loc::loadMessages(__FILE__);
?>
			
			<?
			if(!$bIsMainPage && !$bIsProjectPage && !$bIsHistoryPage)
			{
			?>
					<?$show_top_menu_on_page = $APPLICATION->GetProperty("show-top-menu-on-page");?>
					<?if($show_top_menu_on_page == "Y"):?>
						<?
						//add html/text area under tag <h1>
						$html_menu_on_page = '';
						ob_start();
						$APPLICATION->IncludeComponent("bitrix:menu", "on-page-menu", Array(
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
									0 => "",
								),
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_TYPE" => "A",	// Тип кеширования
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							),
							false
						);
						$html_menu_on_page = ob_get_contents();
						ob_end_clean();
						$APPLICATION->AddViewContent('html_top_menu_on_page',$html_menu_on_page);
						?>
						<??>
					<?endif;?>
					
					<?$show_btn_menu = $APPLICATION->GetProperty("show-btn-menu");?>
					<?if($show_btn_menu == "Y"):?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"kpi_page_buttons",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "left",
								"USE_EXT" => "N"
							)
						);?>
					<?endif;?>
					
					</div> <?// class="small-12 medium-10 large-8 column"?>
					<?$APPLICATION->ShowViewContent('blockAllNews');?>
				</div><?//class="row align-center">?>
				
				<?$APPLICATION->ShowViewContent('pagination-box');?>
				
				<?$APPLICATION->ShowViewContent('mapContacts');?>
			<?
			}
			?>
			
			<?$APPLICATION->ShowViewContent('breadcrumb_back_btn'); // edit -> /local/templates/main_kpi/components/bitrix/breadcrumb/kpi/template.php?>
			
	</div><?// <div class="content-box">?>
	<footer class="footer-box">
		<div class="footer-box__top">

			<?$APPLICATION->IncludeComponent(
				"bitrix:subscribe.form", 
				"kpi-footer", 
				array(
					"AJAX_MODE" => "N",
					"SHOW_HIDDEN" => "N",
					"ALLOW_ANONYMOUS" => "Y",
					"SHOW_AUTH_LINKS" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600000",
					"CACHE_NOTES" => "",
					"SET_TITLE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"LK" => "Y",
					"COMPONENT_TEMPLATE" => "kpi-footer",
					"USE_PERSONALIZATION" => "Y",
					"PAGE" => SITE_DIR."subscribe/",
					"URL_SUBSCRIBE" => SITE_DIR."subscribe/"
				),
				false
			);?>


			<div class="footer-content">
				<div class="row align-justify">
					<div class="small-12 medium-3 large-3 column">
						<div class="footer-about">
							<a href="<?=SITE_DIR?>" class="footer-about__logo">
								<img src="/local/templates/main_kpi/assets/img/svg/logo_footer.svg" alt="logo">
							</a>
							<div class="footer-about__text">
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => SITE_TEMPLATE_PATH."/include".SITE_DIR."kpi_slogan_footer.php"
									)
								);?>
							</div>
						</div>
					</div>
						<div class="small-12 medium-4 large-3 column">
							<?$APPLICATION->IncludeComponent(
							"bitrix:news.list", 
							"footer-tabs", 
							array(
								"ACTIVE_DATE_FORMAT" => "d.m.Y",
								"ADD_SECTIONS_CHAIN" => "N",
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
								"DISPLAY_PICTURE" => "N",
								"DISPLAY_PREVIEW_TEXT" => "Y",
								"DISPLAY_TOP_PAGER" => "N",
								"FIELD_CODE" => array(
									0 => "",
									1 => "",
								),
								"FILTER_NAME" => "",
								"HIDE_LINK_WHEN_NO_DETAIL" => "N",
								"IBLOCK_ID" => "5",
								"IBLOCK_TYPE" => "content",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"INCLUDE_SUBSECTIONS" => "Y",
								"MESSAGE_404" => "",
								"NEWS_COUNT" => "5",
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
									0 => "PHONES",
									1 => "MAP",
									2 => "",
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
								"COMPONENT_TEMPLATE" => "contacts-tabs",
								"TITLE_TAB_BLOCK" => "Общая контактная информация",
								"TITLE_SOCIAL_NETWORK_BLOCK" => "Компания в социальных сетях"
							),
							false,
							array("HIDE_ICONS"=>"Y")
							);?>

						</div>
					<div class="small-12 medium-2 large-2 column">
						<?if(file_exists(__DIR__."/page_blocks/social-networks-block.php"))
								require_once(__DIR__."/page_blocks/social-networks-block.php");?>
					</div>
					<div class="small-12 medium-3 large-4 column">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "kpi_footer", Array(
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
									0 => "",
								),
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_TYPE" => "A",	// Тип кеширования
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							),
							false
						);?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-box__bottom">
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
	</footer>

</div><?// <div class="page-wrapper">?>
<?
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/foundation.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/owl.carousel.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/owl.navigation.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/owl.autoplay.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/owl.autoheight.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery.fancybox.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/datepicker.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/dist/jquery.inputmask.bundle.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/slick.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/wow.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/particles.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/flipclock.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/app.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/custom.js");
?>
<script>$(document).foundation();</script>


<?
$isSafetyLaborAndEnvironmentalProtectionPage = strpos($APPLICATION->GetCurDir(), SITE_DIR . "activities/safety-labor-and-environmental-protection/") !== false;
$show_countdown = $APPLICATION->GetProperty("show-countdown");
?>
<?if($show_countdown == "Y" && $isSafetyLaborAndEnvironmentalProtectionPage):?>
	<?
	//add html/text area under tag <h1>
	$header_countdown = '';
	ob_start();
	$APPLICATION->IncludeComponent(
	"kpi:content.editor", 
	"countdown", 
	array(
		"COMPONENT_TEMPLATE" => "countdown",
		"KPI_COUNTDOWN_ID" => "clock-safety-labor-and-environmental-protection",
		"SET_DATE" => "25.07.2018",
		"KPI_TYPE" => "COUNTUP",
		"KPI_TEXT" => "Қауіпсіз еңбек сағаттарының есептегіші",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"KPI_TEXT_RU" => "Безопасность, охрана труда и окружающей среды",
		"KPI_TEXT_KZ" => "Қауіпсіздік, еңбекті және қоршаған ортаны қорға",
		"KPI_TEXT_EN" => "Safety, labor and environmental protection"
	),
	false
);
	$header_countdown = ob_get_contents();
	ob_end_clean();
	$APPLICATION->AddViewContent('header-countdown',$header_countdown);
	?>
<?endif;?>

<?
//add html/text area under tag <h1>
$header_wrapper__title = '';
ob_start();
$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_RECURSIVE" => "N",	// Рекурсивное подключение включаемых областей разделов
		"AREA_FILE_SHOW" => "sect",	// Показывать включаемую область
		"AREA_FILE_SUFFIX" => "h1_subtitle",	// Суффикс имени файла включаемой области
		"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);
$header_wrapper__title = ob_get_contents();
ob_end_clean();
$APPLICATION->AddViewContent('header-wrapper__title',$header_wrapper__title);
?>


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(71276380, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/71276380" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>