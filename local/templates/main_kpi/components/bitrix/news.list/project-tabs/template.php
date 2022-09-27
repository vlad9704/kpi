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
global $arTabs;
?>

<div class="row align-center">

	<?if(!empty($arParams["BLOCK_TITLE"])):?>
		<div class="small-12 medium-12 large-12 column">
			<div class="title-box"><?=$arParams["BLOCK_TITLE"]?></div>
		</div>
	<?endif;?>
	<?if(count($arTabs)>0):?>
	<?
	$kTab = 0;
	foreach($arTabs as $arTab)
	{
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class="small-12 medium-6 large-6 column ">
		
			<?if($kTab!=0):?>
			<div class="block-box wow fadeInRight">
			<?endif;?>
		
				<h3 class="text--lilac"><?=$arTab["NAME"]?></h3>
				<?
				foreach($arTab["ITEMS"] as $arItem)
				{
				?>
					<div class="target-box">
						<div class="target-box__icon">
							<i class="icon-check_1"></i>
						</div>
						<div class="target-box__text" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><?=$arItem["NAME"]?></div>
					</div>
				<?
				}
				?>
				
			<?if($kTab!=0):?>
			</div>
			<?endif;?>
			<?if(count($arTab["FILES"])>0):?>
				<?
				foreach($arTab["FILES"] as $fileID):
					$fileInfo = CFile::MakeFileArray($fileID);
					$linkToFile = str_ireplace($_SERVER["DOCUMENT_ROOT"],"",$fileInfo["tmp_name"]);
				?>
					<a href="<?=$linkToFile?>" class="presentation-link wow fadeInUp" download>
						<span class="presentation-link__icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/svg/presentation_pdf.svg" alt="<?=$fileInfo["name"]?>">
						</span>
						<span class="presentation-link__text"><span><?=$fileInfo["name"]?></span> <span class="presentation-link__size"><?=GetMessage("KPI_PROJECT_PAGE_FILE_SIZE")?> <?=CFile::FormatSize($fileInfo["size"])?></span></span>
					</a>
				<?unset($fileInfo,$linkToFile);?>
				<?endforeach;?>
			<?endif;?>

		</div>
	<?
	$kTab++;
	}
	?>
	<?endif;?>

<?

	$TIZERS_IBLOCK_ID = 18;
	/* 
	 * get tizers section id by LANGUAGE_ID
	 */
	$arFilterSectionTizers = Array('IBLOCK_ID'=>$TIZERS_IBLOCK_ID, 'CODE'=>$arParams["PARENT_SECTION_CODE"]);
	$arSelectSectionTizers = Array('ID');
	$dbListTizers = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilterSectionTizers, false,$arSelectSectionTizers);
	if($arSectionTizers = $dbListTizers->GetNext())
	{
		$curentTizersSectionID = $arSectionTizers["ID"];
	}
	unset($arFilterSectionTizers,$arSelectSectionTizers,$dbListTizers,$arSectionTizers);
	/* 
	 * get tizers data  
	 */
	$arSelectTizers = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT");
	$arFilterTizers = Array(
		"IBLOCK_ID"=>$TIZERS_IBLOCK_ID, 
		"IBLOCK_SECTION_ID"=>$curentTizersSectionID, 
		"PROPERTY_SHOW_PROJECT_PAGE"=>1, "ACTIVE"=>"Y");
	$resTizers = CIBlockElement::GetList(Array(), $arFilterTizers, false, Array("nPageSize"=>4), $arSelectTizers);
	while($obTizers = $resTizers->GetNextElement())
	{ 
		$arTizersFields = $obTizers->GetFields();  
		$arTizersFile = $obTizers->GetProperty('FILE');
		if($arTizersFile["VALUE"]>0)
		{	
			$arTizersImage = CFile::ResizeImageGet($arTizersFile["VALUE"], array('width'=>25, 'height'=>25), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$arResult["TIZERS"][$arTizersFields["ID"]]["IMAGE"]["SRC"] = $arTizersImage["src"];
			if($arTizersImage["width"]>0)
			{
				$arResult["TIZERS"][$arTizersFields["ID"]]["IMAGE"]["WIDTH"] = $arTizersImage["width"];
			}
			if($arTizersImage["height"]>0)
			{	
				$arResult["TIZERS"][$arTizersFields["ID"]]["IMAGE"]["HEIGHT"] = $arTizersImage["height"];
			}
		}
		$arResult["TIZERS"][$arTizersFields["ID"]]["TITLE"] = $arTizersFields["NAME"];
		$arResult["TIZERS"][$arTizersFields["ID"]]["TEXT"] = $arTizersFields["PREVIEW_TEXT"];
	}
	unset($resTizers,$obTizers,$arTizersFields,$arTizersFile);
?>
	
	<div class="small-12 column">
		<div class="intelligence-wrapper">
			<?foreach($arResult["TIZERS"] as $arTizer):?>
				<div class="intelligence-element wow zoomIn">
					<div class="intelligence-item">
						<?
						if(!empty($arTizer["IMAGE"]["SRC"]))
						{
						?>
							<div class="intelligence-item__icon">
								<img src="<?=$arTizer["IMAGE"]["SRC"]?>" alt="<?=$arTizer["TITLE"]?>">
							</div>
						<?
						}
						?>
						<div class="intelligence-item__text"><?=$arTizer["TITLE"]?></div>
					</div>
					<?
					if(strlen($arTizer["TEXT"]))
					{
					?>
						<div class="intelligence-item__subscribe"><?=$arTizer["TEXT"]?></div>
					<?
					}
					?>
				</div>
			<?endforeach;?>
		</div>
	</div>
</div>