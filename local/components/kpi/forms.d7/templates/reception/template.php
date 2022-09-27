<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>

<?
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;
?>

<div class="feedback-box">
	
	<?if(!empty($arResult["FORM_TITLE"])):?>
		<div class="feedback-box__title"><?=$arResult["FORM_TITLE"]?></div>
	<?endif;?>
	
	<?if(!empty($arResult["FORM_SUBTITLE"])):?>
		<div class="feedback-box__text"><?=$arResult["FORM_SUBTITLE"]?></div>
	<?endif;?>
	
	<?
	// if($arResult["ERROR"])
	// {
		// pre($arResult["ERROR"]);
	// }
	?>
	<?
	if($arResult["ERROR"]["OTHER"])
	{
		print "<p style=\"color:red;font-size:14px;text-align:center;\">".$arResult["ERROR"]["OTHER"]."</p>";
	}
	?>
	<?
/* 	if($arResult["SUCCESS"])
	{
		print "<div style=\"color:green;font-size:14px;text-align:center;\"><h4>".$arParams["OK_TEXT_TITLE"]."</h4>".$arParams["OK_TEXT"]."</div>";
	} */
	?>
	<script>
		var TIMER_START = "1:00"; 
		var TIMER_END = 60; 
	</script>
	<form name="form_<?=$arResult["FORM_ID"]?>" action="<?=POST_FORM_ACTION_URI?>" 
		id="form_<?=$arResult["FORM_ID"]?>" method="post" enctype="multipart/form-data">
		
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="action" value="<?=strtotime("now")?>">
		<input type="hidden" name="template" value="<?=$this->__name?>">
		<input type="hidden" name="botcheck" value="">
		<input type="hidden" class="js-botcheck" name="botcheck2" value="<?=$arResult['botcheck2']?>">
	<?
	/*
	 * sms confirmation form
	 */
	if($arResult["SMS_FORM_ID"]>0)
	{
		
		if(!isset($_REQUEST["SMS_FORM_TIME"]))
		{
		?>
			<script>var timer2 = TIMER_START;</script>
		<?	
		}
		else
		{
		?>
			<script>var timer2 = '<?=htmlspecialchars($_REQUEST["SMS_FORM_TIME"]);?>';</script>
		<?
		} 
	?>


		<div class="row">
			<div class="small-12 medium-12 large-12 column">
				<input type="hidden" name="SMS_FORM_ID" value="<?=$arResult["SMS_FORM_ID"]?>">
				<input type="hidden" name="SMS_FORM_TIME" value="<?=$arResult["SMS_FORM_TIME"]?>">
				<?=smsInputHtmlTemplate($arResult,$arParams,"SMS_CONFIRM_CODE");?>
				<div class="feedback-box__subscribe">
					<p><?=GetMessage("KPI_FORM_SMS_SUBTEXT")?></p>
				</div>
				<div class="feedback-box__button">
					<button class="button button--inline button--icon button--red" type="submit" name="<?=$arResult["SUBMIT_BUTTON"]["NAME"]?>"><span><?=$arResult["SUBMIT_BUTTON"]["SMS_FORM_VALUE"]?></span></button>
				</div>
			</div>
		</div>
		
	<?
	}
	else
	{
	?>
		<div class="row">
		
			<div class="small-12 medium-6 large-6 column">
				<?=inputFieldHtmlTemplate($arResult,"NAME");?>
			</div>
			
			<div class="small-12 medium-6 large-6 column">
				<?=inputPropertyHtmlTemplate($arResult,"COMPANY");?>
			</div>
			
			<div class="small-12 medium-6 large-6 column">
				<?=inputPropertyHtmlTemplate($arResult,"EMAIL");?>
			</div>
			
			<div class="small-12 medium-6 large-6 column">
				<?=inputPropertyHtmlTemplate($arResult,"PHONE");?>
			</div>
<?/*			
			<div class="small-12 medium-12 large-12 column">
				<?=smsInputHtmlTemplate($arResult,$arParams,"SMS_CONFIRM_CODE");?>
			</div>
*/?>
			
			<div class="small-12 medium-12 large-12 column">
				<div class="feedback-box__item">
					<div class="feedback-box__subtitle">
					<?
					$reqSign = $arResult["INPUT_LIST"]["PREVIEW_TEXT"]["REQUIRED"];
					$checkError = !empty($arResult["ERROR"]["PREVIEW_TEXT"]) ? '<span style="color:red;">'.$arResult["ERROR"]["PREVIEW_TEXT"].'</span>':$arResult["INPUT_LIST"]["PREVIEW_TEXT"]["NAME"].' '.$reqSign;
					?>
					<?=$checkError?></div>
					<div class="feedback-box__field">
						<textarea 
							placeholder="<?=$arResult["INPUT_LIST"]["PREVIEW_TEXT"]["PLACEHOLDER"]?>" 
							name="<?=$arResult["INPUT_LIST"]["PREVIEW_TEXT"]["INPUT_NAME"]?>" ><?=$arResult['REQUEST']["FIELD"]["PREVIEW_TEXT"]?></textarea>
					</div>
					<?unset($checkError,$reqSign);?>
				</div>
				
				<div class="feedback-box__subscribe">
					<p><?=Loc::getMessage("KPI_FORM_REQUIRED_FIELD_MESSAGE");?></p>
					<p><?=Loc::getMessage("KPI_FORM_PRIVACY_POLICIES_MESSAGE");?></a></p>
				</div>
				
				<div class="feedback-box__button">
					<button class="button button--inline button--icon button--red" type="submit" name="<?=$arResult["SUBMIT_BUTTON"]["NAME"]?>"><span><?=$arResult["SUBMIT_BUTTON"]["VALUE"]?></span></button>
				</div>
				
			</div>
		</div>
	<?
	}
	?>

		
		
	</form>
</div>
<?if(!empty($arParams["KPI_BACK_BTN_LINK"]) && !empty($arParams["KPI_BACK_BTN_TEXT"])):?>
	<div class="link-back">
		<a href="<?=$arParams["KPI_BACK_BTN_LINK"]?>"><?=$arParams["KPI_BACK_BTN_TEXT"]?></a>
	</div>
<?endif?>
