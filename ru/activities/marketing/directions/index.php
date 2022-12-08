<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Направления");
?>

	<div class="title-box">Направления</div>
	<p>С момента запуска завода уже реализованы объемы по следующим направлениям:</p>

	<div class="ul_directions_cont">
		<ul>
			<li><b>Внутренний рынок:</b></li>
			<li>Алматы</li>
			<li>Тараз</li>
			<li>Петропавловск</li>
			<li>Актобе</li>
		</ul>
		<ul>
			<li><b>Экспорт:</b></li>
			<li>Китай</li>
			<li>Польша</li>
			<li>Италия</li>
		</ul>
	</div>

	<br>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>