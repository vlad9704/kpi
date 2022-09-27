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
?>

<?
$arResult["ITEMS"] = unserialize($arResult["CUSTOM_ITEMS"]);

//add html/text area under tag <h1>
$header_bg = '';
ob_start();
?>
	<div class="header-bg">
	
		<?foreach($arResult["ITEMS"] as $key=> $arItem):?>
			<?
			$key++;
			$arPoster = $arItem["DISPLAY_PROPERTIES"]["BG_IMAGE"]["FILE_VALUE"];

			if($arItem["DISPLAY_PROPERTIES"]["BG_IMAGE_SMALL"]["FILE_VALUE"])
			{
				$arPosterSmall = $arItem["DISPLAY_PROPERTIES"]["BG_IMAGE_SMALL"]["FILE_VALUE"];
			}
			else
			{
				$arPosterSmall = $arPoster;
			}

			$arVideo = $arItem["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"];
			$arShowCanvas = $arItem["PROPERTIES"]["SHOW_NET"]["VALUE"]==1;
			?>
		
			<div class="header-bg__item <?=($arShowCanvas)?"header-bg__item--canvas":"";?>" data-bgcount="<?=$key?>">
				<video width="100%" height="100%" poster="<?=$arPoster["SRC"]?>" poster-big="<?=$arPoster["SRC"]?>" poster-small="<?=$arPosterSmall["SRC"]?>" muted="muted">
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
		<div id="particles-js" class="header-canvas"></div>

	</div>

<?
$header_bg = ob_get_contents();
ob_end_clean();
$APPLICATION->AddViewContent('header-bg',$header_bg);
?>