<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<script>
$(document).ready(function () {
    $("[data-fancybox]").fancybox({
		loop: false,
        onInit: function (instance) {
			let id = $("[data-fancybox]").eq(instance.id-1).data('element-id');
            $.ajax({
                type: 'POST',
                url: '<?=$templateFolder?>/ajax.php',
				data: {id:id},
                dataType: 'json',
               //dataType: 'json',
                success: function (data) {
                    $.each(data, function (index, src) {
						instance.addContent({
                            type: src.type,
                            src: src.src
                        });
                    });
                }
            });
        }
    });
});
</script>




