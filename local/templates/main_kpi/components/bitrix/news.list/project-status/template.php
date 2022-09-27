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

<div class="status-project-wrapper">
	<div class="row align-center">
		<div class="small-12 medium-11 large-10 column">
			<?if(!empty($arParams["BLOCK_TITLE"])):?>
				<h3><?=$arParams["BLOCK_TITLE"]?></h3>
			<?endif;?>
			<div class="status-project owl-carousel">
						
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				$arTizers = $arItem["DISPLAY_PROPERTIES"]["TIZERS"]["VALUE"];
				?>
				<div class="status-project__item">
					<?
					/*
					 * Tizers Block
					 */
					if(count($arTizers)>0)
					{
					?>
					<div class="status-project__elements">
						<?
						foreach($arTizers as $tizerID)
						{
						?>
							<div class="status-project__element">
								<div class="status-project__title"><?=$arResult["TIZERS"][$tizerID]["TITLE"]?></div>
								<div class="status-project__subtitle"><?=$arResult["TIZERS"][$tizerID]["TEXT"]?></div>
							</div>
						<?
						}
						?>
					</div>
					<?
					}
					?>
					<div class="status-project__subscribe" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<?=$arItem["NAME"]?><?if(!empty($arItem["PREVIEW_TEXT"])):?>: <span><?=$arItem["PREVIEW_TEXT"]?></span></div>
					<?endif;?>
				</div>
			<?endforeach;?>


			</div>
			<div class="owl-dots customDots customDots--status"></div>
		</div>
	</div>
</div>

