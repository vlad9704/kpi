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

<div class="staff-company-wrapper">
	<div class="row">
		<div class="small-12 medium-12 large-12 column">
			<div class="staff-company-slider owl-carousel">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
					<div class="staff-company__item">
						<div class="staff-company" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
							<div class="staff-company__img">
								<img
									src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
									height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
									/>
							</div>
						<?endif;?>
							<div class="staff-company__content">
								<div class="staff-company__text"><?=$arItem["PREVIEW_TEXT"]?></div>
								<?if(strlen($arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"])):?>
								<?$arItem["DISPLAY_PROPERTIES"]["LINK_TEXT"]["VALUE"] = !empty($arItem["DISPLAY_PROPERTIES"]["LINK_TEXT"]["VALUE"])? $arItem["DISPLAY_PROPERTIES"]["LINK_TEXT"]["VALUE"]:$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"];?>
									<div class="staff-company__link">
										<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" target="_blank"><?=$arItem["DISPLAY_PROPERTIES"]["LINK_TEXT"]["VALUE"]?></a>
									</div>
								<?endif;?>
							</div>
						</div>
					</div>
			<?endforeach;?>
			</div>
			<div class="owl-dots customDots customDots--staff"></div>
		</div>
	</div>
</div>

<?/* $this->SetViewTarget('pagination-box');?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?$this->EndViewTarget(); */?> 


