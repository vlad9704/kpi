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

<?
$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_RECURSIVE" => "N",	// Рекурсивное подключение включаемых областей разделов
		"AREA_FILE_SHOW" => "sect",	// Показывать включаемую область
		"AREA_FILE_SUFFIX" => "",	// Суффикс имени файла включаемой области
		"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false
);
?>
<?
$obParser = new CTextParser;
$textLength = 120;
?>
<div class="row">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):
		$resizeImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>270, 'height'=>270), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$arItem["PREVIEW_PICTURE"]["SRC"] = $resizeImage["src"];
		$arItem["PREVIEW_PICTURE"]["WIDTH"] = $resizeImage["width"];
		$arItem["PREVIEW_PICTURE"]["HEIGHT"] = $resizeImage["height"];
	endif;
	?>
	<div class="small-12 medium-6 large-4 column">
		<a href="javascript:;" onclick="getItemData(<?=$arItem["ID"]?>)" class="personal-box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="personal-box__img">
				<img
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					/>
			</div>
		<?else:?>
			<div class="personal-box__img">
				<img
					src="<?=SITE_TEMPLATE_PATH?>/assets/img/no_ava_.jpg"
					alt="<?=$arItem["NAME"]?>"
					title="<?=$arItem["NAME"]?>"
					/>
			</div>
		<?endif;?>
			<div class="personal-box__content">
				<div class="personal-box__name">
					<span><?echo $arItem["NAME"]?></span>
				</div>
				<div class="personal-box__position"><?=$obParser->html_cut($arItem["PREVIEW_TEXT"], $textLength);?></div>
			</div>
		</a>
	</div>
<?endforeach;?>
</div>
<?$this->SetViewTarget('pagination-box');?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?$this->EndViewTarget();?> 



