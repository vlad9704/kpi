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
<?
if($arResult["ITEMS"])
{
	if($USER->IsAdmin())
	{
		if($arResult["ITEMS"][0]["IBLOCK_SECTION_ID"]>0)
		{
			$arFilterSectionData = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], "GLOBAL_ACTIVE"=>"Y", "ID"=>$arResult["ITEMS"][0]["IBLOCK_SECTION_ID"]);
			$arSelectSectionData = Array("IBLOCK_ID","ID","CODE","UF_BLOCK_ALL_NEWS_TITLE","UF_BLOCK_ALL_NEWS_TITLE_ALL","UF_BLOCK_ALL_NEWS_LINK");
			$dbSectionData = CIBlockSection::GetList(Array($by=>$order), $arFilterSectionData, false,$arSelectSectionData);
			
			if($arSectionData = $dbSectionData->GetNext())
			{
				//pre($arSectionData);
				$UF_BLOCK_ALL_NEWS_TITLE = $arSectionData["UF_BLOCK_ALL_NEWS_TITLE"];
				$UF_BLOCK_ALL_NEWS_TITLE_ALL = $arSectionData["UF_BLOCK_ALL_NEWS_TITLE_ALL"];
				$UF_BLOCK_ALL_NEWS_LINK = $arSectionData["UF_BLOCK_ALL_NEWS_LINK"];
			}
		}

	}	
?>
<div class="small-12 column">
	<?if(!empty($UF_BLOCK_ALL_NEWS_TITLE)):?>
		<div class="title-box">
			<?=$UF_BLOCK_ALL_NEWS_TITLE?>
		</div>
	<?endif;?>
	<div class="default-slider owl-carousel">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		
		$arItem['NEW_ACTIVE_FROM']["DAY"] = date("d", strtotime($arItem['ACTIVE_FROM']));
		$arItem['NEW_ACTIVE_FROM']["MONTH"] = date("m", strtotime($arItem['ACTIVE_FROM']));
		$arItem['NEW_ACTIVE_FROM']["YAER"] = date("Y", strtotime($arItem['ACTIVE_FROM']));
		
		if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):
			$resizeImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>270, 'height'=>270), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$arItem["PREVIEW_PICTURE"]["SRC"] = $resizeImage["src"];
			$arItem["PREVIEW_PICTURE"]["WIDTH"] = $resizeImage["width"];
			$arItem["PREVIEW_PICTURE"]["HEIGHT"] = $resizeImage["height"];
		endif;
		?>
		<div class="default-slider__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="anons-news">
			
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<div class="anons-news__img">
						<img
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/>
					</div>
				<?endif;?>

				<div class="anons-news__date"><?=intval($arItem['NEW_ACTIVE_FROM']["DAY"])?> <?=GetMessage("MONTH_".intval($arItem['NEW_ACTIVE_FROM']["MONTH"])."_S")?> <?=$arItem['NEW_ACTIVE_FROM']["YAER"]?></div>
				<div class="anons-news__title">
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
				</div>
			</div>
		</div>
	<?endforeach;?>
	</div>
	<div class="owl-dots customDots customDots--default"></div>
	<?if(!empty($UF_BLOCK_ALL_NEWS_TITLE_ALL)):?>
	<div class="link-more">
		<a href="<?=$UF_BLOCK_ALL_NEWS_LINK?>" class="button button--red button--inline button--icon"><?=$UF_BLOCK_ALL_NEWS_TITLE_ALL?></a>
	</div>
	<?endif;?>
</div>
<?
}
?>
