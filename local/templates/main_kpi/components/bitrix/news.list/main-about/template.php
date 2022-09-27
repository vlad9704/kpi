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

$cntItems = count($arResult["ITEMS"]);
$largeIndex = ($cntItems>0) ? "6": "12";
?>

<div class="row">

	<div class="small-12 medium-<?=$largeIndex?> large-<?=$largeIndex?> column">
		<div class="about-info">
			
			<?if(strlen($arParams["PARTICIPANTS_TITLE_BLOCK"])):?>
				<div class="title-box"><?=htmlspecialchars_decode($arParams["PARTICIPANTS_TITLE_BLOCK"])?></div>
			<?endif;?>
			
			<?if(strlen($arParams["PARTICIPANTS_SUBTITLE"])):?>
				<h5><?=htmlspecialchars_decode($arParams["PARTICIPANTS_SUBTITLE"])?></h5>
			<?endif;?>	
			
			<?if(strlen($arParams["PARTICIPANTS_TEXT"])):?>
				<h5><?=htmlspecialchars_decode($arParams["PARTICIPANTS_TEXT"])?></h5>
			<?endif;?>	
			
			<?if(strlen($arParams["PARTICIPANTS_LINK_TEXT"])):?>
				<br>
				<a href="<?=$arParams["PARTICIPANTS_LINK"]?>" class="button button--red button--inline button--icon"><?=$arParams["PARTICIPANTS_LINK_TEXT"]?></a>
			<?endif;?>
			
		</div>
	</div>
	
	<div class="small-12 medium-<?=$largeIndex?> large-<?=$largeIndex?> column">
		<div class="about-slider-wrapper">
			
			<div class="about-slider owl-carousel">
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

					?>
						<div class="about-slider__item">
							<?if(!empty($arItem["DISPLAY_PROPERTIES"]["SVG"]["FILE_VALUE"]["SRC"])):?>
								<div class="about-slider__img">
									<img
										src="<?=$arItem["DISPLAY_PROPERTIES"]["SVG"]["FILE_VALUE"]["SRC"]?>"
										width="<?=$arItem["DISPLAY_PROPERTIES"]["SVG"]["FILE_VALUE"]["WIDTH"]?>"
										height="<?=$arItem["DISPLAY_PROPERTIES"]["SVG"]["FILE_VALUE"]["HEIGHT"]?>"
										alt="<?=$arItem["DISPLAY_PROPERTIES"]["SVG"]["FILE_VALUE"]["ORIGINAL_NAME"]?>"
										title="<?=$arItem["DISPLAY_PROPERTIES"]["SVG"]["FILE_VALUE"]["ORIGINAL_NAME"]?>"
										/>
								</div>
							
							<?elseif($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
								<div class="about-slider__img">
										<img
											src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
											width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
											height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
											alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
											title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
											/>
									</div>
							<?endif;?>
							<div class="about-slider__text" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><?=$arItem["NAME"]?></div>
						</div>
				<?endforeach;?>
			</div>
		</div>
	</div>
	
</div>





