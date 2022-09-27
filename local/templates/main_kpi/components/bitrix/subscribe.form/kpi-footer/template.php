<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$frame = $this->createFrame()->begin();?>
<?$id = $this->randString();?>

<div class="footer-subscribe s_<?=$id;?>">
	<div class="row align-middle align-justify">

		<div class="small-12 medium-5 large-7 column">
			<div class="footer-subscribe__title"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/".SITE_DIR."subscribe_title.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("TOP_BLOCK"),));?></div>
			<div class="footer-subscribe__subtitle"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/".SITE_DIR."subscribe_text.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("TEXT_BLOCK"),));?></div>
		</div>
		<div class="small-12 medium-7 large-5 column">
			<form action="<?=$arResult["FORM_ACTION"];?>" method="POST">
				<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
					<label for="sf_RUB_ID_<?=$itemValue["ID"].$id?>" class="hidden">
						<input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"].$id?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> /> <?=$itemValue["NAME"]?>
					</label>
				<?endforeach;?>
				<div class="footer-subscribe__form">
					<div class="footer-subscribe__input">
						<input type="email" name="sf_EMAIL"  placeholder="<?=GetMessage("subscr_form_email_title")?>" maxlength="100" required size="20" value="<?=$arResult["EMAIL"]?>">
					</div>
					<div class="footer-subscribe__button">
						<button type="submit" class="button button--red button--icon button--inline"><?=($arResult["EMAIL"] ? GetMessage("subscr_form_button_change") : GetMessage("subscr_form_button"));?></button>
					</div>
				</div>
			</form>
		</div>
		
	</div>
</div>


<script>
	var obDataSubscribe = <?=CUtil::PhpToJSObject($id)?>
</script>
<?$frame->end();?>
