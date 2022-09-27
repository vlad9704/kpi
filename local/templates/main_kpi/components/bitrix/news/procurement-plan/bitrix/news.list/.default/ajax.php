<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?
if (!CModule::IncludeModule("fileman"))
	return;

CMedialib::Init();

use Bitrix\Main\Application; 
$request = Application::getInstance()->getContext()->getRequest();
$element_id = $request->get("id");

$arSelect = Array("ID", "IBLOCK_ID", "NAME");
$arFilter = Array("ID"=>$element_id, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
if($ob = $res->GetNextElement())
{
 	$arFields = $ob->GetFields(); 

	$arPropertyPhotos = $ob->GetProperty('PHOTOS');
	$arPropertyVideo = $ob->GetProperty('VIDEO');
}

//pre($arPropertyPhotos);
//pre($arPropertyVideo);

$output = array();

if($arPropertyPhotos["VALUE"]>0)
{	
	$items = CMedialibItem::GetList(array(
		'arCollections' => array(
			$arPropertyPhotos["VALUE"],
		)
	));

	
	foreach ($items as $k=>$image) {
		if($k>0)
		{
			$output[] = array('src' => $image['PATH'],'type' => 'image');
		}
	}
}
/*
if(count($arPropertyVideo["VALUE"])>0)
{	
	foreach ($arPropertyVideo["VALUE"] as $k=>$videoPath) {
		if($k>0)
		{
			$output[] = array('href' => $videoPath,'type' => 'video');
		}
	}
}*/

echo json_encode($output);


?>



