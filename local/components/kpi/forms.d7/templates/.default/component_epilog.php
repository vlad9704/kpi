<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<?//$APPLICATION->AddHeadString('<link href="'.$templateFolder.'/style.css"  type="text/css" rel="stylesheet" />',true)?>
<script>
    $(document).ready(function(){
        $('.js-botcheck').val('pass');
		  /*var tel = $('.tel-site-input').each(function () {
			$(this).inputmask({
			  "mask": "+7(999) 999 - 9999",
			  showMaskOnHover: false,
			  "clearIncomplete": true
			});
			});*/
        <? if ($arResult['SUCCESS']) { ?>
			console.log("SUCCESS");
				/*$.magnificPopup.open({
					items: {
						src: '#<?=$arParams["FORM_ID"]?>',
					  },		
					type: 'inline',
					midClick: true,
					mainClass: 'mfp-fade',
					removalDelay: 350
				});*/
        <? } ?>

        <? /*if ($arResult['REQUEST'] || $arResult['SUCCESS']) { ?>
            var fileInput = $('input[type="file"]');
            fileInput.each(function () {
                // get label text
                var label = $(this).parents('.file-upload').find('label').text();
                label = (label) ? label : label;

                // wrap the file input
                $(this).wrap('<div class="input-file"></div>');

                // display error label, icon, btn

                $(this).before('<label class="site-label-form-error"></label>');
                $(this).before('<div class="icon-clip"></div>');
                $(this).before('<span class="btn">' + label + '</span>');

                // file input change listener
                $(this).change(function (e) {
                    var val = $(this).val(),
                        filename = val.replace(/^.*[\\\/]/, '');
                    var btn = $(this).siblings('.btn');
                    btn = (filename) ? btn.text(filename).siblings('.icon-clip').addClass('active') : btn.text(label).siblings('.icon-clip').removeClass('active');

                });

            });

            // Open the file browser when our custom button is clicked.
            $('.input-file .btn').click(function () {
                $(this).siblings('input[type="file"]').trigger('click');
            });
        <? } */?>
    });
</script>
<?/*
<div class="site-popup site-popup-small mfp-hide white-popup information-popup" id="<?=$arParams["FORM_ID"]?>">
    <div class="site-popup-content">
        <div class="popup-icon sucsess"> </div>
        <div class="popup-title center-align"><?=$arParams["OK_TEXT_TITLE"]?></div>
        <div class="popup-description center-align"><span><?=$arParams["OK_TEXT"]?></span></div>
    </div>
</div>
*/?>
