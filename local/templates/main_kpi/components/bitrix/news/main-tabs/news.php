<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="row wow fadeInUp">
	<div class="column">
		<?

		$arSelect = Array("ID");
		$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "GLOBAL_ACTIVE"=>"Y","DEPTH_LEVEL"=>1, "CODE"=>LANGUAGE_ID);
		$dbList = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false,$arSelect);
		if($arSection = $dbList->GetNext())
		{
			$SECTION_ID = $arSection["ID"];
		}
		unset($arSelect,$arFilter,$dbList,$arSection);
		
		/*
		 * get sections
		 */
		$arSelect = Array("ID", "NAME");
		$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "GLOBAL_ACTIVE"=>"Y","DEPTH_LEVEL"=>2, "SECTION_ID"=>$SECTION_ID);
		$dbList = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false,$arSelect);
		while($arSection = $dbList->GetNext())
		{
			$arSections[] = $arSection;
		}
		unset($arSelect,$arFilter,$dbList,$arSection);
		?>
<?if(count($arSections)>0):?>
		<ul class="tabs tabs--medium" data-tabs id="target-tabs">
		<?foreach($arSections as $key=>$arSection): $key++;?>
			<?if($key == 1):?>
				<li class="tabs-title is-active"><a href="#target-tabs<?=$key?>" aria-selected="true"><?=$arSection["NAME"]?></a></li>
			<?else:?>
				<li class="tabs-title"><a data-tabs-target="target-tabs<?=$key?>" href="#target-tabs2"><?=$arSection["NAME"]?></a></li>
			<?endif;?>
		<?endforeach;?>
		</ul>
		<?unset($key);?>
		
	<div class="tabs-content" data-tabs-content="target-tabs">
	<?foreach($arSections as $key=>$arSection): $key++;?>
		<div class="tabs-panel <?if($key == 1):?>is-active<?endif;?>" id="target-tabs<?=$key?>">
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"",
			Array(
				"PARENT_SECTION" => $arSection["ID"],
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"NEWS_COUNT" => $arParams["NEWS_COUNT"],
				"SORT_BY1" => $arParams["SORT_BY1"],
				"SORT_ORDER1" => $arParams["SORT_ORDER1"],
				"SORT_BY2" => $arParams["SORT_BY2"],
				"SORT_ORDER2" => $arParams["SORT_ORDER2"],
				"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
				"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
				"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
				"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
				"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
				"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
				"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
				"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
				"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
				"CHECK_DATES" => $arParams["CHECK_DATES"],
			),
			$component
		);?>
		</div>
	<?endforeach?>
	</div>
<?endif;?>
		
	</div>
</div>
