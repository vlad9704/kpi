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
	<div class="short-news" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="short-news__date">
			<span><?=intval($arItem['NEW_ACTIVE_FROM']["DAY"])?></span>
			<?=GetMessage("MONTH_".intval($arItem['NEW_ACTIVE_FROM']["MONTH"])."_S")?> <br class="show-for-large"><?=$arItem['NEW_ACTIVE_FROM']["YAER"]?>
		</div>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="short-news__img">
				<img
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					/>
			</div>
		<?endif;?>
		<div class="short-news__content">
			<p><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></p>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<p><?echo $arItem["PREVIEW_TEXT"];?></p>
			<?endif;?>
		</div>
	</div>

<?endforeach;?>
<?$this->SetViewTarget('pagination-box');?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?$this->EndViewTarget();?> 
