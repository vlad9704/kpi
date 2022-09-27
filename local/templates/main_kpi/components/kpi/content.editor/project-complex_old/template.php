<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="row align-center">
	<div class="small-12 medium-12 large-12 column">
		
		<?if(!empty($arParams["BLOCK_TITLE"])):?>
			<div class="title-box"><?=htmlspecialchars_decode($arParams["BLOCK_TITLE"])?></div>
		<?endif;?>
		
		<div class="shema-box">
			
			<?if(!empty($arParams["BLOCK_SUBTITLE"])):?>
				<div class="shema-box__title"><?=htmlspecialchars_decode($arParams["BLOCK_SUBTITLE"])?></div>
			<?endif;?>
			<?
			
			/*
			 * 1 postavshchik_propana
			 * 2 ustanovka_degidrirovaniya_propana
			 * 3 ustanovka_polimerizatsii_propilena
			 * 3.1 ustanovka_proizvodstva_tekhnicheskikh_gazov
			 * 3.2 gtes
			 */
			
			?>
			<div class="shema-box__elements">
				<?
				/*
				 * 1
				 */
				?>
				<div class="shema-box__item wow fadeInLeft" data-wow-delay=".5s" >
					<div class="shema-box__stage" id="<?=GetEditArea($arResult["ITEMS"]["postavshchik_propana"]);?>"><?=$arResult["ITEMS"]["postavshchik_propana"]["NAME"]?></div>
					<div class="shema-box__img">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["postavshchik_propana"])?>
						</div>
						<img src="/local/templates/main_kpi/assets/img/gif-11-min.gif" alt="<?=$arResult["ITEMS"]["postavshchik_propana"]["NAME"]?>">
						<img src="/local/templates/main_kpi/assets/img/stage-11.gif" alt="<?=$arResult["ITEMS"]["postavshchik_propana"]["NAME"]?>" class="shema-box__img--stage">
					</div>
				</div>
				<?
				/*
				 * 2
				 */
				?>
				<div class="shema-box__item wow fadeInLeft" data-wow-delay="1.25s" >
					<div class="shema-box__stage" id="<?=GetEditArea($arResult["ITEMS"]["ustanovka_degidrirovaniya_propana"]);?>"><?=$arResult["ITEMS"]["ustanovka_degidrirovaniya_propana"]["NAME"]?></div>
					<div class="shema-box__img">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["ustanovka_degidrirovaniya_propana"],"right")?>
						</div>
						<img src="/local/templates/main_kpi/assets/img/gif-3-min.gif" alt="<?=$arResult["ITEMS"]["ustanovka_degidrirovaniya_propana"]["NAME"]?>">
						<img src="/local/templates/main_kpi/assets/img/stage-22.png" alt="<?=$arResult["ITEMS"]["ustanovka_degidrirovaniya_propana"]["NAME"]?>" class="shema-box__img--stage">
					</div>
				</div>
				<?
				/*
				 * 3
				 */
				?>
				<div class="shema-box__item wow fadeInLeft" data-wow-delay="2s">
				
					<div class="shema-box__stage" id="<?=GetEditArea($arResult["ITEMS"]["ustanovka_polimerizatsii_propilena"]);?>">
						<?=$arResult["ITEMS"]["ustanovka_polimerizatsii_propilena"]["NAME"]?>
					</div>
					<div class="shema-box__img">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["ustanovka_polimerizatsii_propilena"],"right");?>
						</div>
						<img src="/local/templates/main_kpi/assets/img/stage-3.png" alt="<?=$arResult["ITEMS"]["ustanovka_polimerizatsii_propilena"]["NAME"]?>">
						<img src="/local/templates/main_kpi/assets/img/stage-33.png" alt="<?=$arResult["ITEMS"]["ustanovka_polimerizatsii_propilena"]["NAME"]?>" class="shema-box__img--stage">
					</div>
					
					<?
					/*
					 * for mobile
					 */
					?>
					<div id="shema-device" class="hide-for-large">
						<div class="shema-box__more">
							
							<div class="shema-box__more-item">
								<img src="/local/templates/main_kpi/assets/img/arrow-stage-up.png" alt="<?=$arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]["NAME"]?>" class="shema-box__more-arrow">
								<div class="mark-wrapper">
									<div class="mark-item"></div>
									<?=kpiMarkInfoBlock($arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]);?>
									<img src="/local/templates/main_kpi/assets/img/gif-5-min.gif" alt="<?=$arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]["NAME"]?>" class="shema-box__more-img">
								</div>
								<span><?=$arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]["NAME"]?></span>
							</div>
							
							<div class="shema-box__more-item">
								<img src="/local/templates/main_kpi/assets/img/arrow-stage-up.png" alt="<?=$arResult["ITEMS"]["gtes"]["NAME"]?>" class="shema-box__more-arrow">
								<div class="mark-wrapper">
									<div class="mark-item"></div>
									<?=kpiMarkInfoBlock($arResult["ITEMS"]["gtes"]);?>
									<img src="/local/templates/main_kpi/assets/img/gif-6-min.gif" alt="<?=$arResult["ITEMS"]["gtes"]["NAME"]?>" class="shema-box__more-img">
								</div>
								<span><?=$arResult["ITEMS"]["gtes"]["NAME"]?></span>
							</div>
							
							<div class="shema-box__more-item">
								<img src="/local/templates/main_kpi/assets/img/arrow-stage-up.png" alt="<?=$arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]["NAME"]?>" class="shema-box__more-arrow">
								<div class="mark-wrapper">
									<div class="mark-item"></div>
										<?=kpiMarkInfoBlock($arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]);?>
									<img src="/local/templates/main_kpi/assets/img/gif-7-min.gif" alt="<?=$arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]["NAME"]?>" class="shema-box__more-img">
								</div>
								<span><?=$arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]["NAME"]?></span>
							</div>
						</div>
					</div>
				</div>
				<?
				/*
				 * 4
				 */
				?>
				<div class="shema-box__item wow fadeInLeft" data-wow-delay="2.75s">
					<div class="shema-box__stage" id="<?=GetEditArea($arResult["ITEMS"]["sklad_gotovoy_produktsii"]);?>"><?=$arResult["ITEMS"]["sklad_gotovoy_produktsii"]["NAME"]?></div>
					<div class="shema-box__img">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["sklad_gotovoy_produktsii"],"right");?>
						</div>
						<img src="/local/templates/main_kpi/assets/img/stage-4.png" alt="<?=$arResult["ITEMS"]["sklad_gotovoy_produktsii"]["NAME"]?>">
					</div>
				</div>
				<?
				/*
				 * 5
				 */
				?>
				<div class="shema-box__item wow fadeInLeft" data-wow-delay="3.5s">
					<div class="shema-box__stage" id="<?=GetEditArea($arResult["ITEMS"]["sbyt_gotovoy_produktsii"]);?>"><?=$arResult["ITEMS"]["sbyt_gotovoy_produktsii"]["NAME"]?></div>
					<div class="shema-box__img">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
							<?=kpiMarkInfoBlock($arResult["ITEMS"]["sbyt_gotovoy_produktsii"],"right");?>
						</div>
						<img src="/local/templates/main_kpi/assets/img/gif-4-min.gif" alt="<?=$arResult["ITEMS"]["sbyt_gotovoy_produktsii"]["NAME"]?>">
					</div>
				</div>
				
			</div>
			
			<?
			/*
			 * for desktop
			 */
			?>
			<div id="shema-desktop" class="show-for-large">
				<div class="shema-box__more">
					
					<div class="shema-box__more-item wow fadeInUp" data-wow-delay="5.75s" id="<?=GetEditArea($arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]);?>">
						<img src="/local/templates/main_kpi/assets/img/arrow-stage-up.png" alt="<?=$arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]["NAME"]?>" class="shema-box__more-arrow">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
								<?=kpiMarkInfoBlock($arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]);?>
							<img src="/local/templates/main_kpi/assets/img/gif-5-min.gif" alt="<?=$arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]["NAME"]?>" class="shema-box__more-img">
						</div>
						<span><?=$arResult["ITEMS"]["ustanovka_proizvodstva_tekhnicheskikh_gazov"]["NAME"]?></span>
					</div>
					
					<div class="shema-box__more-item wow fadeInUp" data-wow-delay="5s" id="<?=GetEditArea($arResult["ITEMS"]["gtes"]);?>">
						<img src="/local/templates/main_kpi/assets/img/arrow-stage-up.png" alt="" class="shema-box__more-arrow">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
								<?=kpiMarkInfoBlock($arResult["ITEMS"]["gtes"]);?>
							<img src="/local/templates/main_kpi/assets/img/gif-6-min.gif" alt="<?=$arResult["ITEMS"]["gtes"]["NAME"]?>" class="shema-box__more-img">
						</div>
						<span><?=$arResult["ITEMS"]["gtes"]["NAME"]?></span>
					</div>
					
					<div class="shema-box__more-item wow fadeInUp" data-wow-delay="4.25s" id="<?=GetEditArea($arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]);?>">
						<img src="/local/templates/main_kpi/assets/img/arrow-stage-up.png" alt="<?=$arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]["NAME"]?>" class="shema-box__more-arrow">
						<div class="mark-wrapper">
							<div class="mark-item"></div>
								<?=kpiMarkInfoBlock($arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]);?>
							<img src="/local/templates/main_kpi/assets/img/gif-7-min.gif" alt="<?=$arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]["NAME"]?>" class="shema-box__more-img">
						</div>
						<span><?=$arResult["ITEMS"]["blok_vodopodgotovki_i_vodoochistki"]["NAME"]?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

