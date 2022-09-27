<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="row">
	<div class="small-12 medium-8 large-6 column">
		
		<?if(!empty($arParams["KPI_TEXT"])):?>
			<p><?=htmlspecialchars_decode($arParams["KPI_TEXT"])?></p>
		<?endif;?>
		
		<?if(!empty($arParams["LEGAL_ADDRESS_TITLE"])):?>
			<h3><?=htmlspecialchars_decode($arParams["LEGAL_ADDRESS_TITLE"])?></h3>
		<?endif;?>
		
		<?if(!empty($arParams["LEGAL_ADDRESS_TEXT"])):?>
			<p><?=htmlspecialchars_decode($arParams["LEGAL_ADDRESS_TEXT"])?></p>
		<?endif;?>
		
		<?if(!empty($arParams["ACTUAL_ADDRESS_TITLE"])):?>
			<h3><?=htmlspecialchars_decode($arParams["ACTUAL_ADDRESS_TITLE"])?></h3>
		<?endif;?>
		<?if(!empty($arParams["ACTUAL_ADDRESS_TEXT"])):?>
			<p><?=htmlspecialchars_decode($arParams["ACTUAL_ADDRESS_TEXT"])?></p>
		<?endif;?>
		
		<?/* if(!empty($arParams["KPI_TEXT"])):?>
			<p><?=htmlspecialchars_decode($arParams["KPI_TEXT"])?></p>
		<?endif; */?>
		
		<br class="show-for-small-only">
	</div>
	<div class="small-12 medium-4 large-6 column">
	
		<div class="requisites-item">
			<?if(!empty($arParams["RNN_ADDRESS_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["RNN_ADDRESS_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["RNN_ADDRESS_TEXT"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["RNN_ADDRESS_TEXT"])?></div>			
			<?endif;?>
		</div>
		
		<div class="requisites-item">
			<?if(!empty($arParams["BIN_ADDRESS_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["BIN_ADDRESS_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["BIN_ADDRESS_TEXT"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["BIN_ADDRESS_TEXT"])?></div>			
			<?endif;?>
		</div>
		
		<div class="requisites-item">
			<?if(!empty($arParams["OKPO_ADDRESS_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["OKPO_ADDRESS_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["OKPO_ADDRESS_TEXT"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["OKPO_ADDRESS_TEXT"])?></div>			
			<?endif;?>
		</div>
		
		<div class="requisites-item">
			<?if(!empty($arParams["OKED_ADDRESS_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["OKED_ADDRESS_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["OKED_ADDRESS_TEXT"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["OKED_ADDRESS_TEXT"])?></div>			
			<?endif;?>
		</div>

	</div>
</div>

<div class="row">
	<div class="small-12 medium-12 large-12 column">
		<?if(!empty($arParams["KPI_TEXT_IIK"])):?>
			<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["KPI_TEXT_IIK"])?></div>
		<?endif;?>
	</div>
	<div class="small-12 medium-8 large-6 column">
		<div class="requisites-item">
			<?if(!empty($arParams["IIK_KZT_1_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["IIK_KZT_1_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["IIK_KZT_1"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["IIK_KZT_1"])?></div>			
			<?endif;?>
		</div>
		
		<div class="requisites-item">
			<?if(!empty($arParams["IIK_KZT_2_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["IIK_KZT_2_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["IIK_KZT_2"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["IIK_KZT_2"])?></div>			
			<?endif;?>
		</div>
	</div>
	<div class="small-12 medium-4 large-6 column">

		
		<div class="requisites-item">
			<?if(!empty($arParams["IIK_USD_1_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["IIK_USD_1_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["IIK_USD_1"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["IIK_USD_1"])?></div>			
			<?endif;?>
		</div>
		
		<div class="requisites-item">
			<?if(!empty($arParams["IIK_USD_2_TITLE"])):?>
				<div class="requisites-item__title"><?=htmlspecialchars_decode($arParams["IIK_USD_2_TITLE"])?></div>
			<?endif;?>
			<?if(!empty($arParams["IIK_USD_2"])):?>
				<div class="requisites-item__text"><?=htmlspecialchars_decode($arParams["IIK_USD_2"])?></div>			
			<?endif;?>
		</div>
		
	</div>
</div>

<?if(!empty($arParams["KPI_BACK_BTN_LINK"]) && !empty($arParams["KPI_BACK_BTN_TEXT"])):?>
	<div class="link-back">
		<a href="<?=$arParams["KPI_BACK_BTN_LINK"]?>"><?=$arParams["KPI_BACK_BTN_TEXT"]?></a>
	</div>
<?endif?>