<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>


<?
	$arResult["ITEMS"] = array();

	$COMPLEX_IBLOCK_ID = 27;
	/* 
	 * get section id by LANGUAGE_ID
	 */
	$arFilterSectionComplex = Array('IBLOCK_ID'=>$COMPLEX_IBLOCK_ID, 'CODE'=>LANGUAGE_ID);
	$arSelectSectionComplex = Array('ID');
	$dbListComplex = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilterSectionComplex, false,$arSelectSectionComplex);
	if($arSectionComplex = $dbListComplex->GetNext())
	{
		$CURRENT_SECTION_ID = $arSectionComplex["ID"];
	}
	unset($arFilterSectionComplex,$arSelectSectionComplex,$dbListComplex,$arSectionComplex);

	/* 
	 * get complex data  
	 */
	CModule::IncludeModule("fileman");
	CMedialib::Init();
	$arSelectComplex = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT");
	$arFilterComplex = Array(
		"IBLOCK_ID"=>$COMPLEX_IBLOCK_ID, 
		"IBLOCK_SECTION_ID"=>$CURRENT_SECTION_ID, 
		 "ACTIVE"=>"Y");
	$resComplex = CIBlockElement::GetList(Array(), $arFilterComplex, false, false, /* Array("nPageSize"=>count($arTizers)), */ $arSelectComplex);
	while($obComplex = $resComplex->GetNextElement())
	{ 
		$arComplexFields = $obComplex->GetFields();  
		$arComplexMediaLib = $obComplex->GetProperty('MEDIALIB');
		$arComplexSubname = $obComplex->GetProperty('SUBNAME');
		$arComplexCodeBlock = $obComplex->GetProperty('EXTERNAL_CODE');
		
		$arResult["ITEMS"][$arComplexCodeBlock["VALUE"]]["ID"] = $arComplexFields["ID"];
		$arResult["ITEMS"][$arComplexCodeBlock["VALUE"]]["NAME"] = $arComplexFields["NAME"];
		$arResult["ITEMS"][$arComplexCodeBlock["VALUE"]]["TEXT"] = $arComplexFields["PREVIEW_TEXT"];
		$arResult["ITEMS"][$arComplexCodeBlock["VALUE"]]["TITLE"] = $arComplexSubname["VALUE"];
		$arResult["ITEMS"][$arComplexCodeBlock["VALUE"]]["MEDIALIB_ID"] = $arComplexMediaLib["VALUE"];
		
		if($arComplexMediaLib["VALUE"]>0)
		{
			$items = CMedialibItem::GetList(array(
				'arCollections' => array(
					$arComplexMediaLib["VALUE"],
				)
			));
			$arResult["ITEMS"][$arComplexCodeBlock["VALUE"]]["MEDIALIB"] = $items;
		}
		
	}
	
	//pre($arResult["ITEMS"]);
?>


<?
function kpiMarkInfoBlock($array,$position="")
{
	//pre($array);
?>
	<div class="mark-info <?=$position == "right" ? "mark-info--right":""?>">
		
		<a href="javascript:;" class="mark-icon-close"><i class="icon-close"></i></a>
		
		<div class="mark-info__title"><?=$array["TITLE"]?></div>
		<div class="mark-info__content">
			<?if($array["PROP_ITEM"]):?>
				<span><?=$array["PROP_ITEM"]?></span>
			<?endif?>
			<?if($array["TEXT"]):?>
				<?=$array["TEXT"]?>
			<?endif?>
		</div>
		<?if($array["MEDIALIB_ID"]>0):?>
			<div class="mark-info__slide">
				<div class="mark-slider owl-carousel">
				<?foreach($array["MEDIALIB"] as $arImage):?>
					<?$arResizeImage = CFile::ResizeImageGet($arImage["SOURCE_ID"], array('width'=>30, 'height'=>30), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
						<a href="<?=$arImage["PATH"]?>" class="mark-slider__item" data-fancybox="mark-slider-<?=$array["MEDIALIB_ID"]?>">
							<img src="<?=$arResizeImage["src"]?>" alt="<?=$arImage["FILE_NAME"]?>">
						</a>
				<?endforeach;?>
				</div>
			</div>
		<?endif;?>
	</div>
<?	
}
?>

<?

?>