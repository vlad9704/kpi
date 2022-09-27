<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?
//исключаем пустые значения массива
$arParams["KPI_PHONES"] = array_diff($arParams["KPI_PHONES"], array(''));
	foreach($arParams["KPI_PHONES"] as $arPhone)
	{
		$truePhone = (str_replace(array("(",")","-","_"," "),array(""),$arPhone));
	?>
	<a href="tel:<?=$truePhone?>" class="header-phone"><i class="icon-phone"></i> <span><?=$arPhone;?></span></a>
	<?
	}
?>