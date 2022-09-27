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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<ul class="tabs" id="media-tabs">
<?
	foreach ($arResult['SECTIONS'] as $key=>$arSection)
	{
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		$key++;
		//$isActive
		if($key == 1)
		{
		?>
			<li id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>" class="tabs-title is-active"><a href="<?=$arSection["LIST_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></li>
		<?
		}
		else
		{
		?>	
			<li id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>" class="tabs-title"><a href="<?=$arSection["LIST_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></li>
		<?
		}
		?>
	<?
	}
	?>
</ul>
<?
}
?>

<?

/*
<ul class="tabs" data-tabs id="media-tabs">
<?
	foreach ($arResult['SECTIONS'] as $key=>$arSection)
	{
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		$key++;
		//$isActive
		if($key == 1)
		{
		?>
			<li id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>" class="tabs-title is-active"><a href="#media-tabs<?=$key?>" aria-selected="true"><?=$arSection["NAME"]?></a></li>
		<?
		}
		else
		{
		?>	
			<li id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>" class="tabs-title"><a data-tabs-target="media-tabs<?=$key?>" href="#media-tabs<?=$key?>"><?=$arSection["NAME"]?></a></li>
		<?
		}
		?>
	<?
	}
	?>
</ul>
*/?>

