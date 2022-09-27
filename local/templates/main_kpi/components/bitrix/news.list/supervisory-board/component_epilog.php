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

<div class="reveal" id="persnalReveal" data-reveal>
	<a href="javascript:;" class="reveal-close" data-close>
		<i class="icon-close"></i>
	</a>
	<div class="reveal-box">
		<div class="reveal-personal" id="modal-more-block">

		</div>
	</div>
</div>

<script>
function getItemData(id)
{
	var post = {};
	post['id'] = id;
	post['iblock_id'] = '<?=$arParams["IBLOCK_ID"]?>';
	node = BX('modal-more-block'); 
	if (!!node) {
		BX.ajax.post(
			'<?=$templateFolder?>/ajax.php',
			post,
			function (data) {
				node.innerHTML = data;
				$('#persnalReveal').foundation('open');
			}
		);
	}
}
</script>




