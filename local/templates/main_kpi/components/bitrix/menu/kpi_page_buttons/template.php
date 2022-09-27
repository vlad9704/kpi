<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<div class="razdel-button">
		<?foreach($arResult as $arItem):?>
			<a href="<?=$arItem["LINK"]?>" class="razdel-button__item">
				<?if(!empty($arItem["PARAMS"]["class-icon"])):?>
					<span class="razdel-button__icon">
						<i class="<?=$arItem["PARAMS"]["class-icon"]?>"></i>
					</span>
				<?endif;?>
				<span class="razdel-button__text"><?=$arItem["TEXT"]?></span>
			</a>
		<?endforeach?>
	</div>
<?endif?>