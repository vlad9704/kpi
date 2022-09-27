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

<ul class="tabs tabs--footer" data-tabs id="footer-tabs">
<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
	<?
	$isActive = $key==0;
	?>
	<?if($isActive):?>
		<li class="tabs-title is-active"><a href="#panel<?=$key?>" aria-selected="true"><?echo $arItem["NAME"]?></a></li>
	<?else:?>
		<li class="tabs-title"><a data-tabs-target="panel<?=$key?>" href="#panel2"><?echo $arItem["NAME"]?></a></li>
	<?endif;?>
<?endforeach;?>
</ul>

<div class="tabs-content tabs-content--footer" data-tabs-content="footer-tabs">
	<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
		<?
		$isActive = $key==0;
		?>
		<div class="tabs-panel <?=$isActive?"is-active":""?>" id="panel<?=$key?>">
			<div class="footer-info">
				<?=$arItem["PREVIEW_TEXT"]?>
				<div class="footer-info__map">
					<a href="<?=SITE_DIR?>contacts/"><?=GetMessage("KPI_FOOTER_MAP_LINK")?></a>
				</div>
				<div class="footer-info__phone">
				<?foreach($arItem["DISPLAY_PROPERTIES"]["PHONES"]["VALUE"] as $arPhone):?>
					<?$truePhone = (str_replace(array("(",")","-","_"," "),array(""),$arPhone));?>
					<a href="tel:<?=$truePhone?>"><?=$arPhone?></a></br></br>
				<?endforeach;?>
				</div>
			</div>
		</div>

	<?endforeach;?>
</div>



