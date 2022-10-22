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
<div class="participants-title"><?=$arParams["PARTICIPANTS_TITLE_BLOCK"]?></div>
<div class="participants-slider owl-carousel">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$aLink = $arItem["PROPERTIES"]["LINK"]["VALUE"];
	?>
	<div class="participants-slider__item">
		<?if(strlen($aLink)):?>
			<a href="<?=$aLink?>" target="_blank" class="participants-box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?else:?>
			<div class="participants-box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="participants-box__img">
					<img
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
				</div>
			<?endif;?>
			<div class="participants-box__title"><?=$arItem["NAME"]?></div>
			<div class="participants-box__text"><?=$arItem["PREVIEW_TEXT"]?></div>
		<?if(strlen($aLink)):?>
			</a>
		<?else:?>
			</div>
		<?endif;?>
	</div>
	<?endforeach;?>
</div>



