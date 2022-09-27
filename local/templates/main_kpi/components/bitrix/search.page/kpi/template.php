<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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

<form action="" method="get">

	<div class="page-search">
		<div class="page-search__input">
			<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />
		</div>
		<div class="page-search__button">
			<input type="submit" class="button button--red" value="<?=GetMessage("SEARCH_GO")?>" />
		</div>
	</div>

</form>
<?if(!empty($arParams["SUBTITLE_PAGE"]) && count($arResult["SEARCH"])>0):?>
<h2><?=htmlspecialchars_decode($arParams["SUBTITLE_PAGE"]);?></h2>
<?endif?>

<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):?>

	<div class="search-language-guess">
		<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
	</div><br />
	
<?endif;?>

<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>
	<p><?=GetMessage("SEARCH_ERROR")?></p>
	<?ShowError($arResult["ERROR_TEXT"]);?>
	<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
	<br /><br />
	<p><?=GetMessage("SEARCH_SINTAX")?><br /><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
	<table border="0" cellpadding="5">
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
			<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
			<td><?=GetMessage("SEARCH_AND_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
			<td><?=GetMessage("SEARCH_OR_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
			<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top">( )</td>
			<td valign="top">&nbsp;</td>
			<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
		</tr>
	</table>
<?elseif(count($arResult["SEARCH"])>0):?>
	<?
	$iNavPageNomer = $arResult["NAV_RESULT"]->NavPageNomer;
	$iiStart = ($iNavPageNomer>1) ? $arParams["PAGE_RESULT_COUNT"] * ($iNavPageNomer-1) +1 : 1;
	?>	
	<?foreach($arResult["SEARCH"] as $arItem):?>

			<div class="result-box">
				<div class="result-box__title">
					<?=$iiStart?>. 
					<?if($arItem["CHAIN_PATH"]):?>
						<?=$arItem["CHAIN_PATH"]?>:
					<?endif;?>
					 <a href="<?echo $arItem["URL"]?>"><?echo $arItem["TITLE_FORMATED"]?></a>
				</div>
				<p><?echo $arItem["BODY_FORMATED"]?></p>
			</div>
		<?$iiStart++;?>
	<?endforeach;?>
	
	<?$this->SetViewTarget('pagination-box');?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
	<?$this->EndViewTarget();?> 
	

<?else:?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>
