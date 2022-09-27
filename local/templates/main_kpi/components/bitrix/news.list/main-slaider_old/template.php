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

<div class="header-wrapper__middle">
	<div class="row collapse">
		<div class="column">
			<div class="header-slider owl-carousel">
				
				<?foreach($arResult["ITEMS"] as $key=> $arItem):?>
					<?
					$key++;
					$arTizers = $arItem["DISPLAY_PROPERTIES"]["TIZERS"]["VALUE"];
					
					/*
					 * Right Button
					 */
					$arRightButtonShow = $arItem["DISPLAY_PROPERTIES"]["RIGHT_BTN_SHOW"]["VALUE"]!=1;
					$arRightButtonText = $arItem["DISPLAY_PROPERTIES"]["RIGHT_BTN_TEXT"]["VALUE"];
					if(empty($arRightButtonText)){
						$arRightButtonText = GetMessage("KPI_MAIN_PAGE_SLAIDER_RIGHT_BTN_TEXT");
					}
					$arRightButtonLink = $arItem["DISPLAY_PROPERTIES"]["RIGHT_BTN_LINK"]["VALUE"];
					if(empty($arRightButtonLink)){
						$arRightButtonLink = $arParams["RIGHT_BTN_LINK"];
					}
					
					/*
					 * Left Button
					 */
					$arLeftButtonShow = $arItem["DISPLAY_PROPERTIES"]["LEFT_BTN_SHOW"]["VALUE"]!=1;
					$arLeftButtonText = $arItem["DISPLAY_PROPERTIES"]["LEFT_BTN_TEXT"]["VALUE"];
					if(empty($arLeftButtonText)){
						$arLeftButtonText = GetMessage("KPI_MAIN_PAGE_SLAIDER_LEFT_BTN_TEXT");
					}
					$arLeftButtonLink = $arItem["DISPLAY_PROPERTIES"]["LEFT_BTN_LINK"]["VALUE"];
					if(empty($arLeftButtonLink)){
						$arLeftButtonLink = $arParams["LEFT_BTN_LINK"]; 
					}	
					/*
					 * Left Button
					 */
					$bButtonBlockShow = $arRightButtonShow || $arLeftButtonShow;
					?>
					
					<div class="header-slider__item" data-slidercount="<?=$key?>">
					<?if($arItem["PREVIEW_TEXT"]):?>
						<div class="header-slider__subtitle"><?=$arItem["PREVIEW_TEXT"]?></div>
					<?endif;?>
						<div class="header-slider__title"><?=$arItem["NAME"]?></div>
						<?
						/*
						 * Tizers Block
						 */
						if(count($arTizers)>0)
						{
						?>
						<div class="header-slider__advantages">
							<?
							foreach($arTizers as $tizerID)
							{
							?>
								<div class="advantages-item wow zoomIn">
									<div class="advantages-item__count"><?=$arResult["TIZERS"][$tizerID]["TITLE"]?></div>
									<div class="advantages-item__text"><?=$arResult["TIZERS"][$tizerID]["TEXT"]?></div>
									<?
									if(!empty($arResult["TIZERS"][$tizerID]["IMAGE"]["SRC"]))
									{
									?>
									<div class="advantages-item__icon">
										<span>
											<img src="<?=$arResult["TIZERS"][$tizerID]["IMAGE"]["SRC"]?>" alt="<?=$arResult["TIZERS"][$tizerID]["TITLE"]?>">
										</span>
									</div>
									<?
									}
									?>
								</div>
							<?
							}
							?>
						</div>
						<?
						}
						?>
						
						<?
						/*
						 * Button Block
						 */
						if($bButtonBlockShow){?>
							<div class="header-slider__button">
								<?if($arRightButtonShow){?>
									<a href="<?=$arRightButtonLink?>" 
									   class="button button--inline button--icon">
									   <?=$arRightButtonText?>
									</a>
								<?}?>
								
								<?if($arLeftButtonShow){?>
									<a href="<?=$arLeftButtonLink?>" 
									   class="button button--inline button--icon button--red">
									   <?=$arLeftButtonText?>
									</a>
								<?}?>
							</div>
						<?}?>
						
					</div>
				<?endforeach;?>
			</div>
			<?
			if(count($arResult["ITEMS"])>0)
			{
			?>
			<div class="owl-nav customNav customNav--header"></div>
			<div class="owl-dots customDots customDots--header"></div>
			<?
			}
			?>
		</div>
	</div>
</div>
<div class="header-wrapper__bottom">
	<a href="javascript:;" class="header-scroll"><i class="icon-mouse"></i></a>
</div>

<?
//add html/text area under tag <h1>
$header_bg = '';
ob_start();
?>
	<div class="header-bg">
	
		<?foreach($arResult["ITEMS"] as $key=> $arItem):?>
			<?
			$key++;
			$arPoster = $arItem["DISPLAY_PROPERTIES"]["BG_IMAGE"]["FILE_VALUE"];
			$arVideo = $arItem["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"];
			?>
		
			<div class="header-bg__item <?=($key%2==0)?"header-bg__item--canvas":"";?>" data-bgcount="<?=$key?>">
				<video width="100%" height="100%" poster="<?=$arPoster["SRC"]?>" muted="muted">
					<?
					if(!empty($arVideo["SRC"]))
					{
					?>
						<source src="<?=$arVideo["SRC"]?>" type='<?=$arVideo["CONTENT_TYPE"]?>; codecs="avc1.42E01E, mp4a.40.2"'>
					<?
					}
					?>
				</video>
			</div>
			
		<?endforeach;?>

	</div>
<?
$header_bg = ob_get_contents();
ob_end_clean();
$APPLICATION->AddViewContent('header-bg',$header_bg);
?>


