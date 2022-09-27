<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>

<?
function inputFieldHtmlTemplate($arResult,$CODE)
{
	$reqSign = $arResult["INPUT_LIST"][$CODE]["REQUIRED"];
	$checkError = !empty($arResult["ERROR"][$CODE]) ? '<span style="color:red;">'.$arResult["ERROR"][$CODE].'</span>':$arResult["INPUT_LIST"][$CODE]["NAME"].' '.$reqSign;
?>
	<div class="feedback-box__item">
		<div class="feedback-box__subtitle">
			<?=$checkError?>
		</div>
		<div class="feedback-box__field">
			<input 
				type="text" 
				placeholder="<?=$arResult["INPUT_LIST"][$CODE]["PLACEHOLDER"]?>" 
				value="<?=$arResult['REQUEST']["FIELD"][$CODE]?>"
				name="<?=$arResult["INPUT_LIST"][$CODE]["INPUT_NAME"]?>" >
		</div>
	</div>
	<?unset($checkError,$reqSign);?>
<?	
}
?>

<?
function inputPropertyHtmlTemplate($arResult,$CODE)
{
	$reqSign = $arResult["INPUT_LIST"][$CODE]["REQUIRED"];
	$checkError = !empty($arResult["ERROR"][$CODE]) ? '<span style="color:red;">'.$arResult["ERROR"][$CODE].'</span>':$arResult["INPUT_LIST"][$CODE]["NAME"].' '.$reqSign;
?>
	<div class="feedback-box__item">
		<div class="feedback-box__subtitle">
			<?=$checkError?>
		</div>
		<div class="feedback-box__field">
			<input 
				type="text" 
				placeholder="<?=$arResult["INPUT_LIST"][$CODE]["PLACEHOLDER"]?>" 
				value="<?=$arResult['REQUEST']["PROPERTY"][$CODE]?>"
				name="<?=$arResult["INPUT_LIST"][$CODE]["INPUT_NAME"]?>" >
		</div>
	</div>
	<?unset($checkError,$reqSign);?>
<?	
}
?>

<?
function smsInputHtmlTemplate($arResult,$CODE)
{
	$reqSign = $arResult["INPUT_LIST"][$CODE]["REQUIRED"];
	$checkError = !empty($arResult["ERROR"][$CODE]) ? '<span style="color:red;">'.$arResult["ERROR"][$CODE].'</span>':$arResult["INPUT_LIST"][$CODE]["NAME"].' '.$reqSign;
?>
	<div class="feedback-box__item">
		<div class="feedback-box__subtitle">
			<?=$checkError?>
		</div>
		<div class="feedback-box__field feedback-box__field--code">
			<input 
				type="text" 
				placeholder="<?=$arResult["INPUT_LIST"][$CODE]["PLACEHOLDER"]?>" 
				value="<?=$arResult['REQUEST']["PROPERTY"][$CODE]?>"
				name="<?=$arResult["INPUT_LIST"][$CODE]["INPUT_NAME"]?>" >
			<a href="javascript:;" class="link link--reload"><?=GetMessage("KPI_FORM_BTN_SEND_AGAIN")?></a>
		</div>
	</div>
	<?unset($checkError,$reqSign);?>
<?	
}
?>

<?/*
<div class="feedback-box__item">
	<div class="feedback-box__subtitle"><?=$arResult["INPUT_LIST"]["FILE"]["NAME"]?><?=$arResult["INPUT_LIST"]["FILE"]["REQUIRED"]?></div>
	<div class="feedback-box__field">
		<input type="file" name="<?=$arResult["INPUT_LIST"]["FILE"]["INPUT_NAME"]?>" id="<?=$arResult["INPUT_LIST"]["FILE"]["CODE"]?>">
	</div>
</div>
*/?>
