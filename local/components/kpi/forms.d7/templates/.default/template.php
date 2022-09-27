<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<?//=$this->__name?>
<?//pre($arParams);?>
<?use Bitrix\Main\Localization\Loc;?>

<div class="feedback-box">
	<?if(!empty($arResult["FORM_TITLE"])):?>
		<div class="feedback-box__title"><?=$arResult["FORM_TITLE"]?></div>
	<?endif;?>
	
	<?if(!empty($arResult["FORM_SUBTITLE"])):?>
		<div class="feedback-box__text"><?=$arResult["FORM_SUBTITLE"]?></div>
	<?endif;?>
	
	<?
	if($arResult["ERROR"])
	{
		print "<p style=\"color:red;font-size:14px;text-align:center;\">".implode("<br>",$arResult["ERROR"])."</p>";
	}
	?>
	<?
	if($arResult["SUCCESS"])
	{
		print "<div style=\"color:green;font-size:14px;text-align:center;\"><h4>".$arParams["OK_TEXT_TITLE"]."</h4>".$arParams["OK_TEXT"]."</div>";
	}
	?>
	
	<form name="form_<?=$arResult["FORM_ID"]?>" action="<?=POST_FORM_ACTION_URI?>" 
		id="form_<?=$arResult["FORM_ID"]?>" method="post" enctype="multipart/form-data">
		
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="action" value="<?=strtotime("now")?>">
		<input type="hidden" name="template" value="<?=$this->__name?>">
		<input type="hidden" name="botcheck" value="">
		<input type="hidden" class="js-botcheck" name="botcheck2" value="<?=$arResult['botcheck2']?>">
	
		<div class="row">
		
			<div class="small-12 medium-6 large-6 column">
				<div class="feedback-box__item">
					<div class="feedback-box__subtitle">
						<?=$arResult["INPUT_LIST"]["NAME"]["NAME"]?><?=$arResult["INPUT_LIST"]["NAME"]["REQUIRED"]?>
					</div>
					<div class="feedback-box__field">
						<input 
							type="text" 
							placeholder="<?=$arResult["INPUT_LIST"]["NAME"]["PLACEHOLDER"]?>" 
							value="<?=$arResult['REQUEST']["FIELD"]["NAME"]?>"
							name="<?=$arResult["INPUT_LIST"]["NAME"]["INPUT_NAME"]?>" >
					</div>
				</div>
				<?unset($error,$valid);?>
			</div>
			
			<div class="small-12 medium-6 large-6 column">
				<div class="feedback-box__item">
					<div class="feedback-box__subtitle">
						<?=$arResult["INPUT_LIST"]["PHONE"]["NAME"]?><?=$arResult["INPUT_LIST"]["PHONE"]["REQUIRED"]?>
					</div>
					<div class="feedback-box__field">
						<input 
							type="tel" 
							placeholder="<?=$arResult["INPUT_LIST"]["PHONE"]["PLACEHOLDER"]?>" 
							value="<?=$arResult['REQUEST']["PROPERTY"]["PHONE"]?>"
							name="<?=$arResult["INPUT_LIST"]["PHONE"]["INPUT_NAME"]?>" >
					</div>
				</div>
				<?unset($error,$valid);?>
			</div>
			<div class="small-12 medium-12 large-12 column">
				<div class="feedback-box__item">
					<div class="feedback-box__subtitle"><?=$arResult["INPUT_LIST"]["PREVIEW_TEXT"]["NAME"]?><?=$arResult["INPUT_LIST"]["PREVIEW_TEXT"]["REQUIRED"]?></div>
					<div class="feedback-box__field">
						<textarea 
							placeholder="<?=$arResult["INPUT_LIST"]["PREVIEW_TEXT"]["PLACEHOLDER"]?>" 
							name="<?=$arResult["INPUT_LIST"]["PREVIEW_TEXT"]["INPUT_NAME"]?>" ><?=$arResult['REQUEST']["FIELD"]["PREVIEW_TEXT"]?></textarea>
					</div>
				</div>
				
				<?/*
				<div class="feedback-box__item">
					<div class="feedback-box__subtitle"><?=$arResult["INPUT_LIST"]["FILE"]["NAME"]?><?=$arResult["INPUT_LIST"]["FILE"]["REQUIRED"]?></div>
					<div class="feedback-box__field">
						<input type="file" name="<?=$arResult["INPUT_LIST"]["FILE"]["INPUT_NAME"]?>" id="<?=$arResult["INPUT_LIST"]["FILE"]["CODE"]?>">
					</div>
				</div>
				*/?>
				
				<div class="feedback-box__subscribe">
					<p><?=Loc::getMessage("KPI_FORM_REQUIRED_FIELD_MESSAGE");?></p>
					<p><?=Loc::getMessage("KPI_FORM_PRIVACY_POLICIES_MESSAGE");?></a></p>
				</div>
				<div class="feedback-box__button">
					<button class="button button--inline button--icon button--red" type="submit" name="<?=$arResult["SUBMIT_BUTTON"]["NAME"]?>"><span><?=$arResult["SUBMIT_BUTTON"]["VALUE"]?></span></button>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="link-back">
	<a href="#"><?=Loc::getMessage("KPI_BACK_BUTTON_TEXT");?></a>
</div>
