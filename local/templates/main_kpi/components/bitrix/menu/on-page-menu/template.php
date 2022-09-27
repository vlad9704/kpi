<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>


<ul class="tabs <?=(count($arResult)>2)?"tabs--little":"tabs--medium"?>" id="zakup-tabs">
<?foreach($arResult as $arItem):?>

	<?if ($arItem["PERMISSION"] > "D"):?>
		<li class="tabs-title <?=($arItem["SELECTED"])?"is-active":""?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>

<?endforeach?>

</ul>

<?endif?>