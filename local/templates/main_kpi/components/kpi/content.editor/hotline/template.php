<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="hotline-box">

	<?if(!empty($arParams["KPI_TEXT"])):?>
		<p><?=htmlspecialchars_decode($arParams["KPI_TEXT"])?></p>
	<?endif;?>
	
	<br>
	
	<?if(!empty($arParams["KPI_TITLE"])):?>
		<h3><?=htmlspecialchars_decode($arParams["KPI_TITLE"])?></h3>
	<?endif;?>

	<br>
	<?
	$arParams["KPI_PHONES"] = array_diff($arParams["KPI_PHONES"], array(''));
	foreach($arParams["KPI_PHONES"] as $arPhone)
	{
		$truePhone = (str_replace(array("(",")","-","_"," "),array(""),$arPhone));
	?>
	<div class="hotline-box__phone">
		<a href="tel:<?=$truePhone?>"><?=$arPhone;?></a>
	</div>
	<?
	}
	?>

	<br>
	<?
	$arParams["KPI_EMAILS"] = array_diff($arParams["KPI_EMAILS"], array(''));
	foreach($arParams["KPI_EMAILS"] as $arEmail)
	{
	?>
		<div class="hotline-box__email">
			<a href="mailto:<?=$arEmail?>"><?=$arEmail;?></a>
		</div>
	<?
	}
	?>
	<div class="hotline-box__email">
		<a href="http://www.sk-hotline.kz/">www.sk-hotline.kz</a>
	</div>

</div>

<?if(!empty($arParams["KPI_BACK_BTN_LINK"]) && !empty($arParams["KPI_BACK_BTN_TEXT"])):?>
	<div class="link-back">
		<a href="<?=$arParams["KPI_BACK_BTN_LINK"]?>"><?=$arParams["KPI_BACK_BTN_TEXT"]?></a>
	</div>
<?endif?>