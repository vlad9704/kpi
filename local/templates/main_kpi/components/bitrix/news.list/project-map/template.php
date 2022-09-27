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
<div class="maps-box-wrapper">
	<div class="row align-center">
		<?if(!empty($arParams["BLOCK_TITLE"])):?>
			<div class="small-12 column">
				<div class="title-box"><?=htmlspecialchars_decode($arParams["BLOCK_TITLE"])?></div>
			</div>
		<?endif;?>

		<div class="small-12 medium-10 large-8 column">
			<div class="maps-box">
				<img src="<?=$arParams["MAP_IMAGE"]?>" alt="">
				<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$key++;
					
					?>
					
					<div class="maps-box__point maps-box__point--<?=$key?>">
						<div class="mark-item <?=$arItem["DISPLAY_PROPERTIES"]["MARKER_CLASS"]["VALUE"]?>"></div>
						<div class="mark-info"><a href="javascript:;" class="mark-icon-close"><i class="icon-close"></i></a>
							<div class="mark-info__title" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><?=$arItem['NAME']?></div>
							<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
							<div class="mark-info__content">
								<?=$arItem['PREVIEW_TEXT']?>
							</div>
							<?endif;?>
						</div>
					</div>
				<?endforeach;?>
				
			</div>
		</div>
	</div>
</div>


