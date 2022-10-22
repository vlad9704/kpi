<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>



<div class="row align-center" id="projectBlock">
	<div class="small-12 medium-12 large-12 column">
		
		<?if(!empty($arParams["BLOCK_TITLE"])):?>
			<div class="title-box"><?=htmlspecialchars_decode($arParams["BLOCK_TITLE"])?></div>
		<?endif;?>
		

		<div class="row align-center">
			<div class="small-12 medium-12 large-12 column">
				<div class="block-project start">
					<div class="block-project__top">
						<div class="block-project__item wow fadeInLeft" data-wow-delay=".3s" id="<?=GetEditArea($arResult["ITEMS"]["postavshchik_propana"]);?>">
							<img src="/local/templates/main_kpi/assets/img/svg/kpi_image_1_<?=LANGUAGE_ID?>.svg" alt="" class="block-project__item-stage">
							<span class="block-project__item-line"></span>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["postavshchik_propana"])?>
						</div>
						<div class="block-project__item wow fadeInLeft" data-wow-delay=".9s" id="<?=GetEditArea($arResult["ITEMS"]["ustanovka_degidrirovaniya_propana"]);?>">
							<img src="/local/templates/main_kpi/assets/img/svg/kpi_image_2_<?=LANGUAGE_ID?>.svg" alt="" class="block-project__item-stage">
							<span class="block-project__item-line"></span>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["ustanovka_degidrirovaniya_propana"])?>
						</div>
						<div class="block-project__item wow fadeInLeft" data-wow-delay="1.5s" id="<?=GetEditArea($arResult["ITEMS"]["ustanovka_polimerizatsii_propilena"]);?>">
							<img src="/local/templates/main_kpi/assets/img/svg/kpi_image_3_<?=LANGUAGE_ID?>.svg" alt="" class="block-project__item-stage">
							<span class="block-project__item-line"></span>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["ustanovka_polimerizatsii_propilena"])?>
						</div>
						<div class="block-project__item wow fadeInLeft" data-wow-delay="2.1s" id="<?=GetEditArea($arResult["ITEMS"]["sbyt_gotovoy_produktsii"]);?>">
							<img src="/local/templates/main_kpi/assets/img/svg/kpi_image_4_<?=LANGUAGE_ID?>.svg" alt="" class="block-project__item-stage">
							<span class="block-project__item-line"></span>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["sbyt_gotovoy_produktsii"])?>
						</div>
						<div class="block-project__line"></div>
					</div>
					<div class="block-project__bottom">
						<div class="block-project__item wow fadeInUp" data-wow-delay="3.9s" id="<?=GetEditArea($arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]);?>">
							<img src="/local/templates/main_kpi/assets/img/svg/kpi_image_6_<?=LANGUAGE_ID?>.svg" alt="" class="block-project__item-stage">
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"])?>
						</div>
						<div class="block-project__item wow fadeInUp" data-wow-delay="3.3s" id="<?=GetEditArea($arResult["ITEMS"]["gtes"]);?>">
							<img src="/local/templates/main_kpi/assets/img/svg/kpi_image_7_<?=LANGUAGE_ID?>.svg" alt="" class="block-project__item-stage">
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["gtes"])?>
						</div>
						<div class="block-project__item wow fadeInUp" data-wow-delay="2.7s" id="<?=GetEditArea($arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]);?>">
							<img src="/local/templates/main_kpi/assets/img/svg/kpi_image_5_<?=LANGUAGE_ID?>.svg" alt="" class="block-project__item-stage">
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"])?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

