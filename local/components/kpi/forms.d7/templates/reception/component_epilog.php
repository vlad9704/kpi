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
var SMS_FORM_ID = '<?=$arResult["SMS_FORM_ID"]?>'; 
var KPI_FORM_BTN_SEND_AGAIN = '<?=GetMessage("KPI_FORM_BTN_SEND_AGAIN")?>'; 
var KPI_PHONE = '<?=GetMessage("KPI_FORM_BTN_SEND_AGAIN")?>'; 
var getMessage = [];
getMessage['confirmed'] = '<?=GetMessage("KPI_FORM_ERR_CONFIRMED")?>'; 
getMessage["sms_code_empty"] = '<?=GetMessage("KPI_FORM_ERR_SMS_CODE_EMPTY")?>'; 
getMessage["sms_code_send"] = '<?=GetMessage("KPI_FORM_ERR_SMS_CODE_SEND",array("#PHONE_NUMBER#"=>$arResult["REQUEST"]["PROPERTY"]["PHONE"]))?>'; 
getMessage["form_not_found"] = '<?=GetMessage("KPI_FORM_ERR_FORM_NOT_FOUND")?>'; 

$(document).ready(function(){
	$('.js-botcheck').val('pass');
	$('input[name*="PHONE"]').inputmask({ mask: "+7 999 999 99 99", greedy: false });
	<? if ($arResult['SUCCESS']) { ?>
		$(document).foundation();
		$('#modal-<?=$arParams["FORM_ID"]?>').foundation('open');
	<? } ?>
	
});
	
function sendSmsAgain(id)
{
	if(confirm("<?=GetMessage('KPI_FORM_BTN_SEND_AGAIN_2')?>"))
	{	
		node = BX('btn-send-again'); 
		
		if (!!node) {
			$.ajax({ 
				type: 'POST', 
				url:'<?=$templateFolder?>/ajax.php',
				data:{id:id,iblock_id:'<?=$arParams["IBLOCK_ID"]?>'},
				dataType: 'json',
				success: function (data) 
				{
					if(data.answer.type == "success")
					{
						
						var label = $('#btn-send-again').closest('.feedback-box__item').find('.feedback-box__subtitle');
						var interval = setInterval(countdownForm, 1000);
						
						<?if(LANGUAGE_ID=="kz"):?>
							label.css('color','green').text('Код ' + data.answer.phone + ' нөміріне қайта жіберілді');
						<?else:?>
							label.css('color','green').text(getMessage[data.answer.code]);
						<?endif;?>
						
						
						$('#btn-send-again').replaceWith('<div class="countdown"></div>');
						
						setTimeout(function(){
							label.text('');
							clearInterval(interval);
								
						},(TIMER_END*1000));
						
					}
					if(data.answer.type == "error")
					{
						$('#btn-send-again').closest('.feedback-box__item').find('.feedback-box__subtitle').css('color','red').text(getMessage[data.answer.code]);
					}
				}
			});
		} 
	}
}

<?if(count($arResult["ERROR"])==0):?>
	if($('.countdown').length>0)
	{
		function countdownForm() 
		{
				
			var timer = timer2.split(':');
			//by parsing integer, I avoid all extra string processing
			var minutes = parseInt(timer[0], 10);
			var seconds = parseInt(timer[1], 10);
			--seconds;
			minutes = (seconds < 0) ? --minutes : minutes;
			if (minutes < 0) clearInterval(interval);
			seconds = (seconds < 0) ? 59 : seconds;
			seconds = (seconds < 10) ? '0' + seconds : seconds;
			//minutes = (minutes < 10) ?  minutes : minutes;

			
			timer2 = minutes + ':' + seconds;
			
			$('input[name="SMS_FORM_TIME"').val(timer2);

			
			$('.countdown').html(minutes + ':' + seconds);
			
			if(timer2 == "0:00" || timer2.indexOf('-') == 0)
			{
				clearInterval(interval);
				$('.countdown').replaceWith('<a id="btn-send-again" href="javascript:;" onclick="sendSmsAgain('+SMS_FORM_ID+')" class="link link--reload">'+KPI_FORM_BTN_SEND_AGAIN+'</a>');
				timer2 = TIMER_START;
			}
		}
		
		var interval = setInterval(countdownForm, 1000);
	}
<?endif?>

</script>


