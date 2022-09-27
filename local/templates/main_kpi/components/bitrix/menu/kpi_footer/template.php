<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="footer-menu">
<?foreach($arResult as $arItem):?>

	<?if ($arItem["PERMISSION"] > "D"):?>
		<li><a href="<?=$arItem["LINK"]?>" class="footer-menu__item <?=$arItem["SELECTED"]?"active":""?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>

<?endforeach?>
</ul>
<?endif?>
