<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
	global $arTabs;
	foreach($arResult["ITEMS"] as $arItem)
	{
		if(!in_array($arItem["IBLOCK_SECTION_ID"],$arIblockSectionID))
		{
			$arIblockSectionID[] = $arItem["IBLOCK_SECTION_ID"];
		}
		$arIblockSectionItems[$arItem["IBLOCK_SECTION_ID"]][] = $arItem;
	}
	
	
	if(count($arIblockSectionID)>0)
	{
		$arFilterTabs = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'GLOBAL_ACTIVE'=>'Y', 'ID'=>$arIblockSectionID);
		$arSelectTabs = Array('ID','NAME','UF_PRESENTATION');
		$dbListTabs = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilterTabs, true,$arSelectTabs);
		while($arSection = $dbListTabs->GetNext())
		{
			$arTabs[$arSection['ID']]["ID"] =  $arSection['ID'];
			$arTabs[$arSection['ID']]["NAME"] =  $arSection['NAME'];
			$arTabs[$arSection['ID']]["FILES"] =  $arSection['UF_PRESENTATION'];
			$arTabs[$arSection['ID']]["ITEMS"] =  $arIblockSectionItems[$arSection['ID']];
		}
	}
	unset($arResult,$arFilterTabs,$arSelectTabs,$arSection,$arIblockSectionItems,$arIblockSectionID);
?>
