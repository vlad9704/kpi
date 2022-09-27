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


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	
	$ext = pathinfo($arItem["DISPLAY_PROPERTIES"]["DOP_FILES"]["FILE_VALUE"]["FILE_NAME"], PATHINFO_EXTENSION); //DOP_FILES
	
	$dopFiles = [];
	if(count($arItem["PROPERTIES"]["DOP_FILES"]["VALUE"])==1)
	{
		$dopFiles[] = $arItem["DISPLAY_PROPERTIES"]["DOP_FILES"]["FILE_VALUE"];
	}
	elseif(count($arItem["PROPERTIES"]["DOP_FILES"]["VALUE"])>1)
	{
		$dopFiles = $arItem["DISPLAY_PROPERTIES"]["DOP_FILES"]["FILE_VALUE"];
	}
	else
	{
		$dopFiles = [];
	}
	
	?>

	<div class="zakup-info" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="zakup-info__title">
			<?echo $arItem["NAME"]?> <?=$arItem["ACTIVE_FROM"]?> 
		</div>
		<div class="zakup-info__download">
			<a href="<?=$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>" download ><?=GetMessage("KPI_PROCUREMEN_PAGE_BTN_DOWNLOAD")?> <?//echo strtolower($arItem["NAME"])?></a>

		</div>

		<?foreach($dopFiles as $dopFile):?>
			<?$ext = pathinfo($dopFile["FILE_NAME"], PATHINFO_EXTENSION);?>
			<a href="<?=$dopFile["SRC"]?>" target="_blank" class="document-box">
				<span class="document-box__icon">
					<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/docs.png" alt="">
				</span>
				<span class="document-box__text"><?echo $dopFile["FILE_NAME"]?></span>
			</a>
		<?endforeach;?>
	</div>

<?endforeach;?>

<?$this->SetViewTarget('pagination-box');?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?$this->EndViewTarget();?>

