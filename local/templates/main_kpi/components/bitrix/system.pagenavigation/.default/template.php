<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<div class="row align-center">
	<div class="small-12 medium-10 large-6 column">
		<div class="pagination-box">
			

<?

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
	
<?
if($arResult["bDescPageNumbering"] === true):
	$bFirst = true;
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if($arResult["bSavePage"]):
?>
			
			<div class="pagination-box__item pagination-box__item--prev">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
				<span class="hide-for-small-only"><?=GetMessage("nav_prev")?></span></a>
			</div>

<?
		else:
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
?>
			<div class="pagination-box__item pagination-box__item--prev">
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
					<span class="hide-for-small-only"><?=GetMessage("nav_prev")?></span>
				</a>
			</div>
<?
			else:
?>
			<div class="pagination-box__item pagination-box__item--prev">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
					<span class="hide-for-small-only"><?=GetMessage("nav_prev")?></span>
				</a>
			</div>
<?
			endif;
		endif;
		
		if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
			$bFirst = false;
			if($arResult["bSavePage"]):
?>
			<div class="pagination-box__item">
				<a class="active 10" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a>
			</div>
<?
			else:
?>
			<div class="pagination-box__item">
				<a class="active 11" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
			</div>
<?
			endif;
			if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
/*?>
			<span class="modern-page-dots">...</span>
<?*/
?>	
			<div class="pagination-box__item">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=intVal($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2)?>">...</a>
			</div>
<?
			endif;
		endif;
	endif;
	do
	{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
		
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
		<div class="pagination-box__item"><a class="<?=($bFirst ? "active 0 " : "")?>active 00"><?=$NavRecordGroupPrint?></a></div>
<?
		elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
?>
		<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "active 1" : "")?>"><?=$NavRecordGroupPrint?></a>
		</div>
<?
		else:
?>
		<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
			?> class="<?=($bFirst ? "active 3" : "")?>"><?=$NavRecordGroupPrint?></a>
		</div>
<?
		endif;
		
		$arResult["nStartPage"]--;
		$bFirst = false;
	} while($arResult["nStartPage"] >= $arResult["nEndPage"]);
	
	if ($arResult["NavPageNomer"] > 1):
		if ($arResult["nEndPage"] > 1):
			if ($arResult["nEndPage"] > 2):
/*?>
		<span class="modern-page-dots">...</span>
<?*/
?>
		<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] / 2)?>">...</a>
		</div>
<?
			endif;
?>
		<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
		</div>
<?
		endif;
	
?>
			<div class="pagination-box__item pagination-box__item--next">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
				<span class="hide-for-small-only"><?=GetMessage("nav_next")?></span></a>
			</div>
		
<?
	endif; 

else:
	$bFirst = true;

	if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
?>
			<div class="pagination-box__item pagination-box__item--prev">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
				<span class="hide-for-small-only"><?=GetMessage("nav_prev")?></span></a>
			</div>
			
<?
		else:
			if ($arResult["NavPageNomer"] > 2):
?>
			<div class="pagination-box__item pagination-box__item--prev">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
				<span class="hide-for-small-only"><?=GetMessage("nav_prev")?></span></a>
			</div>
			
<?
			else:
?>
			<div class="pagination-box__item pagination-box__item--prev">
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
				<span class="hide-for-small-only"><?=GetMessage("nav_prev")?></span></a>
			</div>
			
<?
			endif;
		
		endif;
		
		if ($arResult["nStartPage"] > 1):
			$bFirst = false;
			if($arResult["bSavePage"]):
?>
			<div class="pagination-box__item"><a class="active 13" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
			</div>
<?
			else:
?>
			<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a></div>
<?
			endif;
			if ($arResult["nStartPage"] > 2):
/*?>
			<span class="modern-page-dots">...</span>
<?*/
?>
			<div class="pagination-box__item"><a class="modern-page-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a></div>
<?
			endif;
		endif;
	endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
		?>
		<div class="pagination-box__item"><a class="<?=($bFirst ? "active 5 " : "")?>active 20"><?=$arResult["nStartPage"]?></a></div>
<?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
?>
		<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "active6 6" : "")?>"><?=$arResult["nStartPage"]?></a></div>
<?
		else:
?>
		<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
			?> class="<?=($bFirst ? "active 7" : "")?>"><?=$arResult["nStartPage"]?></a>
		</div>
<?
		endif;
		$arResult["nStartPage"]++;
		$bFirst = false;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
	
	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
/*?>
		<span class="modern-page-dots">...</span>
<?*/
?>
		<div class="pagination-box__item"><a class="modern-page-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a></div>
<?
			endif;
?>
		<div class="pagination-box__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a></div>
<?
		endif;
?>
		<div class="pagination-box__item pagination-box__item--next">
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
			<span class="hide-for-small-only"><?=GetMessage("nav_next")?></span></a>
		</div>
<?
	endif;
endif;

/*if ($arResult["bShowAll"]):
	if ($arResult["NavShowAll"]):
?>
		<div class="pagination-box__item"><a class="modern-page-pagen" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("nav_paged")?></a></div>
<?
	else:
?>
		<div class="pagination-box__item"><a class="modern-page-all" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_all")?></a></div>
<?
	endif;
endif*/
?>
		</div>
	</div>
</div>

<?
/*
 * delete items from pagination for
 */
?>
