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
<?if(strlen($arParams["NEWS_TITLE_BLOCK"])):?>					
	<div class="title-box">
		<?=$arParams["NEWS_TITLE_BLOCK"]?>
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
		<div class="default-slider__item">
			<div class="anons-news" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<a class="anons-news__img" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<img
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/>
					</a>
				<?endif;?>
				<div class="anons-news__date">
				<?=intval($arItem['NEW_ACTIVE_FROM']["DAY"])?> 
				<?=GetMessage("MONTH_".intval($arItem['NEW_ACTIVE_FROM']["MONTH"])."_S")?> 
				<?=$arItem['NEW_ACTIVE_FROM']["YAER"]?></div>
				<div class="anons-news__title">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
				</div>
			</div>
		</div>
	<?endforeach;?>
</div>

<div class="owl-dots customDots customDots--default"></div>

<?if(strlen($arParams["NEWS_LINK_TEXT"])):?>
	<div class="link-more">
		<a href="<?=$arParams["NEWS_LINK"]?>" class="button button--red button--inline button--icon"><?=$arParams["NEWS_LINK_TEXT"]?></a>
	</div>
<?endif;?>








