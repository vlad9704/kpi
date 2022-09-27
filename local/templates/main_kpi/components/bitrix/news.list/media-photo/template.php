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
$resSectionData = CIBlockSection::GetByID($arResult["ITEMS"][0]['IBLOCK_SECTION_ID']);
$arSectionData = $resSectionData->GetNext();
?>

<div class="media-box-overflow">

	
	<div class="media-box__meta">
		<span><?=$arSectionData["NAME"]?></span> <i class="icon-photo"></i>
	</div>


	<div class="media-box-slider owl-carousel">
		
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			
			$isPreviewPictire = $arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"]);

			$items = CMedialibItem::GetList(array(
				'arCollections' => array(
					$arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"],
				)
			));
			
			if($isPreviewPictire)
			{
				$arCover["SRC"] = $arItem["PREVIEW_PICTURE"]["SRC"];
				$resizeImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>570, 'height'=>570), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			}
			elseif(!empty($items[0]["PATH"]))
			{
				$arCover["SRC"] = $items[0]["PATH"];
				$resizeImage = CFile::ResizeImageGet($items[0]["SOURCE_ID"], array('width'=>570, 'height'=>570), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			}
			?>	
				<div class="media-box-slider__item">
					<div class="media-box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="media-box__img">
							<img
								src="<?=$resizeImage["src"]?>"
								width="<?=$resizeImage["width"]?>"
								height="<?=$resizeImage["height"]?>"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								/>
						</div>
						<div class="media-box__content">
							<a data-fancybox="gallery_<?=$arItem["ID"]?>" data-element-id="<?=$arItem["ID"]?>" href="<?=$arCover["SRC"]?>"><?=$arItem["NAME"]?></a>
						</div>
					</div>
				</div>
		<?endforeach;?>
		

	</div>
</div>

