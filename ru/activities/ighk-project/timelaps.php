<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("h1", "Строй плащадка в данный момент");
$APPLICATION->SetPageProperty("title", "Фото строительной площадки в реальном времени");
$APPLICATION->SetPageProperty("keywords", "Стройка, Стройплощадка, Таймлапс, TimeLaps, Фото, Online");
$APPLICATION->SetPageProperty("description", "Фото строительной площадки в реальном времени");
$APPLICATION->SetTitle("Новая страница");
?>

<?php
// вывод актуальной фотографии для проекта с идентификатором

//ID проекта 1551 (Казахстан. Завод "KPI". Камера 1)
$proj_id = 1551;

//ID проекта 1533 (Казахстан. Завод "KPI". Камера 2)
//$proj_id = 1533;


// приватный ключ в личном кабинете
define('API_PRIVATE_KEY', '%vyi&GnL&&Cg6p%xUz6SeWHz.VVH/nD}');
// идентификатор пользователя
define('API_UID', '4464');


// Расчёт публичного ключа
// текущая дата в utc
$date = new DateTime('NOW', new DateTimeZone('UTC'));
// строка для генерации токена
$source = API_UID . API_PRIVATE_KEY . $date->format('Ymd');
// публичный токен
$token = hash('sha256', $source, FALSE);


// метод получения списка проектов пользователя
$ch = curl_init("https://monitoring.timetechnology.ru/api/v1/projects");
// в заголовках отправляем UID и TOKEN
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-UID: '. API_UID,
    'X-Token: '. $token,
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// запрос
$json = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);


// Обработка ошибок
if ($status != 200){
	print 'Ошибка.';
	exit;
}


$data = json_decode($json, TRUE);
// Обход проектов и поиск нужного
foreach($data AS $item){
	if ($item['id'] == $proj_id){
		$project = $item;
		break;
	}
}

if (empty($project)){
	print 'Проект не найден.';
	exit;
}

// Вывод данных
print <<<HTML
<img src="{$project['recent_photo']['thumb']}"   alt="Thumb">
<img src="{$project['recent_photo']['preview']}" alt="Preview">
<br>
<a href="{$project['recent_photo']['url']}">Download fullsize</a>
HTML;


// всё?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>