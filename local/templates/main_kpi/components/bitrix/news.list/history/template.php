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
<div class="history-box-wrapper">
	<div class="history-box__line"></div>
<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	$key++;
	$medialibID = $arItem["DISPLAY_PROPERTIES"]["MEDIALIB"]["VALUE"];
	$arItem['NEW_ACTIVE_FROM']["DAY"] = date("d", strtotime($arItem['ACTIVE_FROM']));
	$arItem['NEW_ACTIVE_FROM']["MONTH"] = date("m", strtotime($arItem['ACTIVE_FROM']));
	$arItem['NEW_ACTIVE_FROM']["YAER"] = date("Y", strtotime($arItem['ACTIVE_FROM']));
	if($medialibID>0)
	{
		$items = CMedialibItem::GetList(array(
			'arCollections' => array(
				$arItem["DISPLAY_PROPERTIES"]["MEDIALIB"]["VALUE"],
			)
		));
	}
	?>
	<div id="history<?=$key?>" class="history-box__item <?=($key%2==0)?"":"history-box__item--right" ?>">
		<div class="history-box" >
			<div class="history-box__date wow bounceIn" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-wow-offset="200">
				<div class="history-box__year"><?=$arItem['NEW_ACTIVE_FROM']["YAER"]?></div>
				<? /* ?><div class="history-box__month"><?=GetMessage("MONTH_".intval($arItem['NEW_ACTIVE_FROM']["MONTH"]))?></div><? */ ?>
			</div>
			<div class="history-box__content wow <?=($key%2==0)?"bounceInLeft":"bounceInRight" ?>"  data-wow-offset="200">
				<?=$arItem["PREVIEW_TEXT"];?>
				<?
				if($medialibID>0)
				{
				?>
				<div class="history-slider owl-carousel">
					<?foreach($items as $image):?>
					<?
						$resizeImage = CFile::ResizeImageGet($image["SOURCE_ID"], array('width'=>70, 'height'=>50), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$arItem["PREVIEW_PICTURE"]["SRC"] = $resizeImage["src"];
						$arItem["PREVIEW_PICTURE"]["WIDTH"] = $resizeImage["width"];
						$arItem["PREVIEW_PICTURE"]["HEIGHT"] = $resizeImage["height"];
					?>
						<a href="<?=$image["PATH"]?>" class="history-slider__item" data-fancybox="history-slider-<?=$medialibID?>">
							<img
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
								width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
								height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
								alt="<?=$image["FILE_NAME"]?>"
								title="<?=$image["FILE_NAME"]?>"
								/>
						</a>
					<?endforeach;?>
				</div>
				<?}?>
			</div>
		</div>
	</div>
<?endforeach;?>
</div>

<?$this->SetViewTarget('pagination-box');?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?$this->EndViewTarget();?>

