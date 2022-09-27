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

CModule::IncludeModule("fileman");
CMedialib::Init();

$resSectionData = CIBlockSection::GetByID($arResult["ITEMS"][0]['IBLOCK_SECTION_ID']);
$arSectionData = $resSectionData->GetNext();
?>
<div class="row">

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
		$resizeImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>370, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	}
	elseif(!empty($items[0]["PATH"]))
	{
		$arCover["SRC"] = $items[0]["PATH"];
		$resizeImage = CFile::ResizeImageGet($items[0]["SOURCE_ID"], array('width'=>370, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	}
	?>

	<div class="small-12 medium-12 large-6 column">
	<?if($arItem["PROPERTIES"]["PHOTOS"]["VALUE"]>0):?>
		<div class="media-box-overflow"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="media-box__meta">
				<span><?=$arSectionData["NAME"]?></span> <i class="icon-photo"></i>
			</div>
			<a data-fancybox="gallery_<?=$arItem["ID"]?>" data-element-id="<?=$arItem["ID"]?>" href="<?=$arCover["SRC"]?>" class="media-box media-box--short">
				
				<span class="media-box__img">
					<img
						src="<?=$resizeImage["src"]?>"
						width="<?=$resizeImage["width"]?>"
						height="<?=$resizeImage["height"]?>"+
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
				</span>
				
				<span class="media-box__content">
					<p><?=$arItem["NAME"]?></p>
					<span class="media-box__info">
						<span><?=GetMessage("KPI_MEDIALIB_ITEM_PUBLISH_DATE")?><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
						<span><?=count($items)?> <?=GetMessage("KPI_MEDIALIB_ITEM_PHOTO")?></span>
					</span>
				</span>
				
			</a>
			
		</div>
		
	<?elseif(count($arItem["PROPERTIES"]["VIDEO"]["VALUE"])>0):?>
		
		
			<div class="media-box-overflow" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="media-box__meta">
					<span><?=$arSectionData["NAME"]?></span> <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/svg/youtube-white.svg" alt="<?=$arSectionData["NAME"]?>">
				</div>
				<a data-fancybox="video_<?=$arItem["ID"]?>" data-element-id="<?=$arItem["ID"]?>" href="<?=$arItem["PROPERTIES"]["VIDEO"]["VALUE"][0]?>" class="media-box media-box--short">
					<span class="media-box__img">
						<img
							src="<?=$resizeImage["src"]?>"
							width="<?=$resizeImage["width"]?>"
							height="<?=$resizeImage["height"]?>"+
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/>
					</span>
					<span class="media-box__content">
						<p><?=$arItem["NAME"]?></p>
						<span class="media-box__info">
							<span><?=GetMessage("KPI_MEDIALIB_ITEM_PUBLISH_DATE")?><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
							<span><?=count($arItem["PROPERTIES"]["VIDEO"]["VALUE"])?> <?=GetMessage("KPI_MEDIALIB_ITEM_VIDEO")?></span>
						</span>
					</span>
				</a>
				<?foreach($arItem["PROPERTIES"]["VIDEO"]["VALUE"] as $key=>$videoLink):?>
					<?
					if($key>0)
					{
					?>
					<a data-fancybox="video_<?=$arItem["ID"]?>" data-element-id="<?=$arItem["ID"]?>" href="<?=$videoLink?>"></a>
					<?
					}
					?>
				<?endforeach;?>
			</div>
		
	<?else:?>
	<?endif;?>
	</div>

<?endforeach;?>

</div>

<?$this->SetViewTarget('pagination-box');?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?$this->EndViewTarget();?> 