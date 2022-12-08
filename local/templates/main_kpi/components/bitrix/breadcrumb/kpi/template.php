<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION,$USER;

//delayed function must return a string
if(empty($arResult))
	return "";

if($USER->IsAdmin())
{
	// $this->__template->SetViewTarget('breadcrumb_back_btn');
	//add html/text area under tag <h1>
$breadcrumb_back_btn = '';
ob_start();

$cntBreadCrumbs = count($arResult);
if($cntBreadCrumbs>2)
{
	
	/*
	 * функционал кнопки НАЗАД
	 */
?>
	<div class="row align-center"><div class="small-12 medium-10 large-11 column">
		<div class="link-back breadcrumb--link-back"><a href="<?=$arResult[$cntBreadCrumbs-2]["LINK"]?>"><?=GetMessage("KPI_BACK_BUTTON_TEXT")?></a></div>			
	</div></div>
	
	<?
	/*
	 * скрыть эту НАЗАД если уже есть другая на странице
	 */
	?>
	
	<script>$(document).ready(function(){ if($("div.link-back").length>1){ $("div.breadcrumb--link-back").hide(); }});</script>
<?
}
$breadcrumb_back_btn = ob_get_contents();
ob_end_clean();
$APPLICATION->AddViewContent('breadcrumb_back_btn',$breadcrumb_back_btn);
	
} 

$strReturn = '';

$strReturn .= '<ul class="crumbs-box" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	//$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	// if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	// {
		$strReturn .= '
			<li id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">
					<span itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</li>';
	// }
	// else
	// {
		// $strReturn .= '
			// <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				// '.$arrow.'
				// <span itemprop="name">'.$title.'</span>
				// <meta itemprop="position" content="'.($index + 1).'" />
			// </li>';
	// }
}

$strReturn .= '</ul>';

return $strReturn;


