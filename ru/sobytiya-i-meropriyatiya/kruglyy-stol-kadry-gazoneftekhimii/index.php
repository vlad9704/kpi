<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("show-top-menu-on-page", "Y");
$APPLICATION->SetPageProperty("show-btn-menu", "Y");
$APPLICATION->SetPageProperty("h1", "Круглый стол \"Кадры для ГазоНефтеХимии\"");
$APPLICATION->SetPageProperty("title", "Круглый стол \"Кадры для ГазоНефтеХимии\"");
$APPLICATION->SetPageProperty("description", "Круглый стол \"Кадры для ГазоНефтеХимии\"");
$APPLICATION->SetTitle("Кадры для ГазоНефтеХимии");
?><p>
 <b>Уважаемые коллеги и партнеры!</b>
</p>
<p>
	 Приглашаем Вас <b>28 февраля&nbsp;в 10:00 часов</b>&nbsp;в Центр развития коммуникаций им. Н.Балгимбаева <b>в городе Атырау</b>&nbsp;на встречу представителей ведущих технических ВУЗов Казахстана, России&nbsp;с руководством АО «НК «КазМунайГаз», ТОО «KPI»&nbsp;и другими гигантами ГазоНефтеХимии Республики, а также, областного и городского акиматов,&nbsp;государственных органов и общественных объединений. Организатор встречи – ТОО «Kazakhstan Petrochemical Industries Inc.»
</p>
<p>
	 В рамках встречи будут обсуждаться вопросы подготовки квалифицированных кадров для газонефтехимической промышленности, цифровизации и т.д. Также планируется подписание Меморандума о стратегическом партнерстве между KPI и Шуртанским газохимическом комплексом (Узбекистан), между KPI и Уфимским Государственным нефтяным техническим университетом (Россия), а также Соглашение между Атырауским университетом нефти и газа им. С. Утебаева и KPI о создании учебного центра.&nbsp;
</p>
 <b>М</b><b>есто проведения мероприятия - <a href="https://yandex.ru/maps/-/CKaqeP32">центр развития коммуникаций имени Нурлана Балгимбаева</a></b><br>
 <iframe src="https://yandex.ru/map-widget/v1/-/CKaqeP32" width="770" height="300" frameborder="1" allowfullscreen="true"></iframe><br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	".default",
	Array(
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
		"COMPONENT_TEMPLATE" => ".default",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "28",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "77",
		"PARENT_SECTION_CODE" => "",
		"PARTICIPANTS_TITLE_BLOCK" => "Организационный комитет круглого стола",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>