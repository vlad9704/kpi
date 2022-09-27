<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$isHttps = \Bitrix\Main\Context::getCurrent()->getRequest()->isHttps() ? 'https' : 'http';
$firstSite = current($arResult["SITES"]);
if($_SERVER["SCRIPT_NAME"] == "/index.php")
	LocalRedirect( $isHttps.'://' . $_SERVER['SERVER_NAME']  . $firstSite["DIR"], false, "301 Moved permanently" ); 

?>
<ul class="lang-box">
<?foreach ($arResult["SITES"] as $key => $arSite):?>
	<?if ($arSite["CURRENT"] == "Y"):?>
		<li><a href="javascript:;" class="lang-box__item active" title="<?=$arSite["LANG"]?>"><?=$arSite["LANG"]?></a></li>
	<?else:?>
		<li><a class="lang-box__item" href="<?if(is_array($arSite['DOMAINS']) && strlen($arSite['DOMAINS'][0]) > 0 || strlen($arSite['DOMAINS']) > 0):?><?=$isHttps?>://www.<?endif?><?=(is_array($arSite["DOMAINS"]) ? $arSite["DOMAINS"][0] : $arSite["DOMAINS"])?><?=$arSite["DIR"]?>" title="<?=$arSite["LANG"]?>"><?=$arSite["LANG"]?></a></li>
	<?endif?>
<?endforeach;?>
</ul>