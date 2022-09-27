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

$arResult['NEW_ACTIVE_FROM']["DAY"] = date("d", strtotime($arResult['ACTIVE_FROM']));
$arResult['NEW_ACTIVE_FROM']["MONTH"] = date("m", strtotime($arResult['ACTIVE_FROM']));
$arResult['NEW_ACTIVE_FROM']["YAER"] = date("Y", strtotime($arResult['ACTIVE_FROM']));

if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):
	$resizeImage = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>670, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	$arResult["PREVIEW_PICTURE"]["SRC"] = $resizeImage["src"];
	$arResult["PREVIEW_PICTURE"]["WIDTH"] = $resizeImage["width"];
	$arResult["PREVIEW_PICTURE"]["HEIGHT"] = $resizeImage["height"];
endif;

?>
<div class="more-news-img">
	<div class="more-news-img__date">
		<span><?=intval($arResult['NEW_ACTIVE_FROM']["DAY"])?></span>
		<?=GetMessage("MONTH_".intval($arResult['NEW_ACTIVE_FROM']["MONTH"])."_S")?> <br class="show-for-large"><?=$arResult['NEW_ACTIVE_FROM']["YAER"]?>
	</div>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div class="more-news-img__picture">
			<img
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				/>
		</div>
	<?endif?>
</div>

<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
	<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
<?endif;?>
<?if($arResult["NAV_RESULT"]):?>
	<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
	<?echo $arResult["NAV_TEXT"];?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
	<?echo $arResult["DETAIL_TEXT"];?>
<?else:?>
	<?echo $arResult["PREVIEW_TEXT"];?>
<?endif?>

<br class="hide-for-small-only">

<?if($arResult["DISPLAY_PROPERTIES"]["MEDIALIB"]["VALUE"]>0):?>
<?
	CModule::IncludeModule("fileman");
	CMedialib::Init();
	$items = CMedialibItem::GetList(array(
		'arCollections' => array(
			$arResult["DISPLAY_PROPERTIES"]["MEDIALIB"]["VALUE"],
		)
	));
?>
	<div class="img-slider-wrapper">
		<div class="img-slider owl-carousel">
		<?foreach($items as $arImage):?>
		<?$arResizeImage = CFile::ResizeImageGet($arImage["SOURCE_ID"], array('width'=>570, 'height'=>570), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
			<div class="img-slider__item">
				<img src="<?=$arResizeImage["src"]?>" alt="<?=$arImage["FILE_NAME"]?>">
			</div>
		<?endforeach;?>
		</div>
		<?if(count($items)>1):?>
			<div class="owl-nav customNav customNav--img"></div>
			<div class="owl-dots customDots customDots--img"></div>
		<?endif;?>
	</div>
<?endif;?>





