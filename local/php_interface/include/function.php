<?php
if(!CModule::IncludeModule("iblock"))
	return;	

// use Bitrix\Main\Config\Option;
// \Bitrix\Main\Config\Option::get("grain.customsettings","leave_review_summ");

function pre($arr){	echo "<pre>";print_r($arr);echo "</pre>"; }

function log_array() { 
   $arArgs = func_get_args(); 
   $sResult = ''; 
   foreach($arArgs as $arArg) { 
      $sResult .= "\n\n".print_r($arArg, true); 
   } 

   if(!defined('LOG_FILENAME')) { 
      define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'].'/log.txt'); 
   } 
   AddMessage2Log($sResult, 'log_array -> '); 
}

function GetEditArea($array){
	$component = new CBitrixComponent;
	$arButtons = CIBlock::GetPanelButtons(
		$array["IBLOCK_ID"],
		$array["ID"],
		0,
		array("SECTION_BUTTONS"=>false, "SESSID"=>false)
	);
	$array["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
	$array["EDIT_LINK_TEXT"] = $arButtons["edit"]["edit_element"]["TEXT"];
	$component->AddEditAction($array['ID'], $array['EDIT_LINK'], $array["EDIT_LINK_TEXT"]);
	return $component->GetEditAreaId($array['ID']);
}


