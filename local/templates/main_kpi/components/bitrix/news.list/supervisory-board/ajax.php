<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?
if (!CModule::IncludeModule("iblock"))
	return;

use Bitrix\Main\Application; 
$request = Application::getInstance()->getContext()->getRequest();
$iblock_id = $request->get("iblock_id");
$id = $request->get("id");


if($iblock_id>0 && $id>0)
{
 	$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT");
	$arFilter = Array("IBLOCK_ID"=>$iblock_id,"ID"=>$id, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
	if($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		
		if($arFields["PREVIEW_PICTURE"]>0)
			$arResizeImage = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>240, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	
?>
	<div class="reveal-personal">
		
		<?if($arFields["PREVIEW_PICTURE"]>0):?>
			<div class="reveal-personal__img">
				<img src="<?=$arResizeImage["src"]?>" alt="<?=$arFields["NAME"]?>">
			</div>
		<?endif;?>
		
		<div class="reveal-personal__content">
			<h5><?=$arFields["NAME"]?></h5>
			<?if(strlen($arFields["PREVIEW_TEXT"])):?>
				<p><?=$arFields["PREVIEW_TEXT"]?></p>
			<?endif;?>
			<?if(strlen($arFields["PREVIEW_TEXT"])):?>
				<p><?=$arFields["DETAIL_TEXT"]?></p>
			<?endif;?>
		</div>
	</div>
<?
	}
	unset($arFields,$res,$ob);	
}
?>



