<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="feedback-box">

	<div class="feedback-box__title"><?echo GetMessage("CT_BSE_SUBSCRIPTION_FORM_TITLE")?></div>




	<div class="feedback-box__text margin-bottom10">
		<?if($arResult["ID"]==0):?>
			<p><?echo GetMessage("CT_BSE_NEW_NOTE")?></p>
		<?else:?>
			<p><?echo GetMessage("CT_BSE_EXIST_NOTE")?></p>
		<?endif?>
	</div>
	
	<?
	foreach($arResult["MESSAGE"] as $itemID=>$itemValue)
	echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"OK"));
	foreach($arResult["ERROR"] as $itemID=>$itemValue)
	echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"ERROR"));

	if($arResult["ALLOW_ANONYMOUS"]=="N" && !$USER->IsAuthorized()):
	echo ShowMessage(array("MESSAGE"=>GetMessage("CT_BSE_AUTH_ERR"), "TYPE"=>"ERROR"));
	else:
	?>
	
	<form action="<?=$arResult["FORM_ACTION"]?>" method="post">
	
	<?echo bitrix_sessid_post();?>
	<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
	<input type="hidden" name="ID" value="<?echo $arResult["SUBSCRIPTION"]["ID"];?>" />
	<input type="hidden" name="RUB_ID[]" value="0" />
	
	<div class="row">
		<div class="small-12 medium-12 large-12 column">
			<div class="feedback-box__item">
				<div class="feedback-box__subtitle"><?echo GetMessage("CT_BSE_EMAIL_LABEL")?></div>
				<div class="feedback-box__field">
					<input type="text" name="EMAIL" value="<?echo $arResult["SUBSCRIPTION"]["EMAIL"]!=""? $arResult["SUBSCRIPTION"]["EMAIL"]: $arResult["REQUEST"]["EMAIL"];?>" class="subscription-email" />
				</div>
			</div>
		</div>
		<div class="small-12 medium-12 large-12 column">
			<div class="feedback-box__item">
				<div class="feedback-box__subtitle"><?echo GetMessage("CT_BSE_FORMAT_LABEL")?></div>
				<div class="feedback-box__field">
					
					<input type="radio" name="FORMAT" id="MAIL_TYPE_TEXT" value="text" <?if($arResult["SUBSCRIPTION"]["FORMAT"] != "html") echo "checked"?> />
					
					<label for="MAIL_TYPE_TEXT"><?echo GetMessage("CT_BSE_FORMAT_TEXT")?></label>
					&nbsp;
					
					<input type="radio" name="FORMAT" id="MAIL_TYPE_HTML" value="html" <?if($arResult["SUBSCRIPTION"]["FORMAT"] == "html") echo "checked"?> />
					
					<label for="MAIL_TYPE_HTML"><?echo GetMessage("CT_BSE_FORMAT_HTML")?></label>
					
				</div>
			</div>
		</div>
		
		<div class="small-12 medium-12 large-12 column">
			<div class="feedback-box__item">
				<div class="feedback-box__subtitle"><?echo GetMessage("CT_BSE_RUBRIC_LABEL")?></div>
				<div class="feedback-box__field">
					<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
						<div class="subscription-rubric">
							<input type="checkbox" id="RUBRIC_<?echo $itemID?>" name="RUB_ID[]" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> />&nbsp;
							<label for="RUBRIC_<?echo $itemID?>"><?echo $itemValue["NAME"]?><span><?echo $itemValue["DESCRIPTION"]?></span></label>
						</div>
					<?endforeach;?>
				</div>
			</div>
		</div>
		
		<div class="small-12 medium-12 large-12 column">
			<div class="feedback-box__button">
				<input class="button button--inline button--icon button--red" type="submit" name="Save" value="<?echo ($arResult["ID"] > 0? GetMessage("CT_BSE_BTN_EDIT_SUBSCRIPTION"): GetMessage("CT_BSE_BTN_ADD_SUBSCRIPTION"))?>" />
			</div>
		</div>	

		<?if($arResult["ID"]>0 && $arResult["SUBSCRIPTION"]["CONFIRMED"] <> "Y"):?>
			<div class="feedback-box__text margin-bottom10"><p><?echo GetMessage("CT_BSE_CONF_NOTE")?></p></div>
			<div class="small-12 medium-12 large-12 column">
				<div class="feedback-box__item">
					
					<div class="feedback-box__field">
						<input name="CONFIRM_CODE" type="text" class="subscription-textbox" value="<?echo GetMessage("CT_BSE_CONFIRMATION")?>" onblur="if (this.value=='')this.value='<?echo GetMessage("CT_BSE_CONFIRMATION")?>'" onclick="if (this.value=='<?echo GetMessage("CT_BSE_CONFIRMATION")?>')this.value=''" /> 
					</div>
				</div>
			</div>
			<div class="small-12 medium-12 large-12 column">
				<div class="feedback-box__button">
					<input class="button button--inline button--icon button--red" type="submit" name="confirm" value="<?echo GetMessage("CT_BSE_BTN_CONF")?>" />
				</div>
			</div>

		<?endif?>

	</div>

	</form>
	

	
	<?if(!CSubscription::IsAuthorized($arResult["ID"])):?>
		<p></p><p></p>
			
		<div class="feedback-box__text margin-bottom10">
			<p><?echo GetMessage("CT_BSE_SEND_NOTE")?></p>
		</div>
		<form action="<?=$arResult["FORM_ACTION"]?>" method="post">
		<?echo bitrix_sessid_post();?>
		<input type="hidden" name="action" value="sendcode" />
		
		<div class="row">
			
			<div class="small-12 medium-12 large-12 column">
				<div class="feedback-box__item">
					<?/* <div class="feedback-box__subtitle">ФИО *</div> */?>
					<div class="feedback-box__field">
						<input name="sf_EMAIL" type="text" class="subscription-textbox" value="<?echo GetMessage("CT_BSE_EMAIL")?>" onblur="if (this.value=='')this.value='<?echo GetMessage("CT_BSE_EMAIL")?>'" onclick="if (this.value=='<?echo GetMessage("CT_BSE_EMAIL")?>')this.value=''" />
					</div>
				</div>
			</div>
			<div class="small-12 medium-12 large-12 column">
				<div class="feedback-box__button">
					<input type="submit" class="button button--inline button--icon button--red" value="<?echo GetMessage("CT_BSE_BTN_SEND")?>" />
				</div>
			</div>
		</div>

		</form>
	<?endif?>

</div>
<?endif;?>