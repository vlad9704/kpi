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

<?

/* 
 * all tizers id  
 */
$arTizers = array();
foreach($arResult["ITEMS"] as $key=> $arItem)
{
	if(is_array($arItem["DISPLAY_PROPERTIES"]["TIZERS"]["VALUE"]))
	{
		foreach($arItem["DISPLAY_PROPERTIES"]["TIZERS"]["VALUE"] as $tizer_id)
		{
			if(!in_array($tizer_id,$arTizers))
			{
				$arTizers[] = $tizer_id;
				$TIZERS_IBLOCK_ID = current($arItem["DISPLAY_PROPERTIES"]["TIZERS"]["LINK_ELEMENT_VALUE"])["IBLOCK_ID"];
			}
		}
	}
}

?>


<?
if(count($arTizers)>0)
{
	/* 
	 * get tizers data  
	 */
	$arSelectTizers = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT");
	$arFilterTizers = Array("IBLOCK_ID"=>$TIZERS_IBLOCK_ID, "ID"=>$arTizers, "ACTIVE"=>"Y");
	$resTizers = CIBlockElement::GetList(Array(), $arFilterTizers, false, Array("nPageSize"=>count($arTizers)), $arSelectTizers);
	while($obTizers = $resTizers->GetNextElement())
	{ 
		$arTizersFields = $obTizers->GetFields();  
		// $arTizersFile = $obTizers->GetProperty('FILE');
		// if($arTizersFile["VALUE"]>0)
		// {	
			// $arTizersImage = CFile::ResizeImageGet($arTizersFile["VALUE"], array('width'=>25, 'height'=>25), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			// $arResult["TIZERS"][$arTizersFields["ID"]]["IMAGE"]["SRC"] = $arTizersImage["src"];
			// if($arTizersImage["width"]>0)
			// {
				// $arResult["TIZERS"][$arTizersFields["ID"]]["IMAGE"]["WIDTH"] = $arTizersImage["width"];
			// }
			// if($arTizersImage["height"]>0)
			// {	
				// $arResult["TIZERS"][$arTizersFields["ID"]]["IMAGE"]["HEIGHT"] = $arTizersImage["height"];
			// }
		// }
		$arResult["TIZERS"][$arTizersFields["ID"]]["TITLE"] = $arTizersFields["NAME"];
		$arResult["TIZERS"][$arTizersFields["ID"]]["TEXT"] = $arTizersFields["PREVIEW_TEXT"];
		
	
	} 
}


?>