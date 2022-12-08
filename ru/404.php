<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка 404");
?>
<div class="block-404">
	<h3>Страница не найдена</h3>
	<p>Уважаемый пользователь, такой страницы не существует.</p>
	<p>Проверьте, пожалуйста, правильность набранного адреса в адресной строке браузера.</p>
	<p>Вы также можете воспользоваться <a href="<?= SITE_DIR;?>search/">поиском</a> или перейти на <a href="<?= SITE_DIR;?>sitemap/">карту сайта</a> и найти там нужный раздел.</p>
	<p></p>
	<p></p>
	<div class="block-404__img">
		<img src="<?= SITE_TEMPLATE_PATH;?>/assets/img/404.png" alt="">
	</div>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>