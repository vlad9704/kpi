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
<div style="padding: 0 15px 15px;">
	<p><?=GetMessage('CT_BNL_RESUME_EMAIL')?> - <a href="mailto:cv@kpi.kz" class="link link--mail">cv@kpi.kz</a></p>
	<p><?=GetMessage('CT_BNL_RESUME_TEXT')?></p>
</div>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
	<div class="vacancy-box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="vacancy-box__anons">
			<i class="icon-arrow-left"></i>
			<p><b><?=$arItem["NAME"]?></b></p>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<p><?echo $arItem["PREVIEW_TEXT"];?></p>
			<?endif;?>
		</div>
		<div class="vacancy-box__body">
			<?echo $arItem["FIELDS"]["DETAIL_TEXT"];?>
		</div>
		
		<div class="vacancy-box__bottom">
			<?if(strlen($arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"])):?>
				<?
				$link = (strripos($arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"], 'https://') === false) ? sprintf('https://%s', $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]) : $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"];
				?>
				<a href="<?=$link?>" class="vacancy-box__link" target="_blank"><?=GetMessage("KPI_JOBS_LINK_HH")?></a>
			<?endif;?>
			<span class="vacancy-box__date"><?=GetMessage("KPI_JOBS_ITEM_PUBLISH_DATE")?> <?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
		</div>
	</div>
	

<?endforeach;?>
<?$this->SetViewTarget('pagination-box');?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?$this->EndViewTarget();?> 

