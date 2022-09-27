<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<?//$APPLICATION->AddHeadString('<link href="'.$templateFolder.'/style.css"  type="text/css" rel="stylesheet" />',true)?>
<? if ($arResult['SUCCESS']) { ?>
	<div class="reveal reveal--thanks" id="modal-<?=$arParams["FORM_ID"]?>" data-reveal>
		<a href="javascript:;" class="reveal-close" data-close>
			<i class="icon-close"></i>
		</a>
		<div class="reveal-box">
			
			<?=htmlspecialchars_decode($arParams["OK_TEXT_TITLE"]);?>
			
			<?=htmlspecialchars_decode($arParams["OK_TEXT"]);?>
			
			<div class="reveal-box__contacts">
				<?
				$arParams["OK_PHONES"] = array_diff($arParams["OK_PHONES"], array(''));
				foreach($arParams["OK_PHONES"] as $arPhone)
				{
					$truePhone = (str_replace(array("(",")","-","_"," "),array(""),$arPhone));
				?>
					<a href="tel:<?=$truePhone?>"><i class="icon-phone"></i> <?=$arPhone;?></a>
				<?
				}
				?>
				
				<?
				$arParams["OK_EMAILS"] = array_diff($arParams["OK_EMAILS"], array(''));
				foreach($arParams["OK_EMAILS"] as $arEmail)
				{
				?>
					<a href="emailto:<?=$arEmail?>"><i class="icon-email"></i> <?=$arEmail;?></a>
				<?
				}
				?>

				
			</div>
			
			<?if(!empty($arParams["OK_LOGO"])){?>
				<div class="reveal-box__logo">
					<img src="<?=$arParams["OK_LOGO"]?>" alt="">
				</div>
			<?}?>
			
		</div>
	</div>
	
<?}?>

<script>
    $(document).ready(function(){
        $('.js-botcheck').val('pass');
		$('input[name*="PHONE"]').inputmask({ mask: "+7 999 999 99 99", greedy: false });
		<? if ($arResult['SUCCESS']) { ?>
			$(document).foundation();
			$('#modal-<?=$arParams["FORM_ID"]?>').foundation('open');
        <? } ?>
    });
</script>
