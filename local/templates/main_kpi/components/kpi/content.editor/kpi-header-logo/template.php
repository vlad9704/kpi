<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?
if(!empty($arParams["KPI_LOGO_1"]))
{
?>
	<img src="<?=$arParams["KPI_LOGO_1"]?>" alt="" class="logo-box__img logo-box__img--static">
<?
}
?>
	<?
	if(!empty($arParams["KPI_LOGO_2"]))
	{
	?>
		<img src="<?=$arParams["KPI_LOGO_2"]?>" alt="" class="logo-box__img logo-box__img--menu">
	<?
	}
	?>
			<?
			if(!empty($arParams["KPI_LOGO_3"]))
			{
			?>
				<img src="<?=$arParams["KPI_LOGO_3"]?>" alt="" class="logo-box__img logo-box__img--fixed">
			<?
			}
			?>
