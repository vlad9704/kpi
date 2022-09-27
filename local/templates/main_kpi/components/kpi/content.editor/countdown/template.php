<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?/*<div class="clock clock-box"></div>*/?>

<div class="clock-box <?=$arParams["KPI_COUNTDOWN_ID"]?>" id="<?=$arParams["KPI_COUNTDOWN_ID"]?>"></div>
<?if($arParams["KPI_TEXT_".strtoupper(LANGUAGE_ID)]):?>
<p><?=htmlspecialchars_decode($arParams["KPI_TEXT_".strtoupper(LANGUAGE_ID)]);?></p>
<?endif;?>
<?
$arDate = $arParams["SET_DATE"];
$arStart["DAY"] = date("d", strtotime($arDate));
$arStart["MONTH"] = date("m", strtotime($arDate));
$arStart["YEAR"] = date("Y", strtotime($arDate));
?>

<script type="text/javascript">

$(document).ready(function() {
	// Grab the current date
	var currentDate = new Date();

	// Set some date in the past. In this case, it's always been since Jan 1
	var pastDate  = new Date(<?=$arStart["YEAR"]?>, <?=$arStart["MONTH"]-1?>, <?=$arStart["DAY"]?>);
	// Calculate the difference in seconds between the future and current date
	var diff = currentDate.getTime() / 1000 - pastDate.getTime() / 1000;
	var clock;
	// Instantiate a coutdown FlipClock
	clock = $('.<?=$arParams["KPI_COUNTDOWN_ID"]?>').FlipClock(diff, {
		clockFace: 'DailyCounter',
		language: 'ru',
        callbacks: {
            interval: function (thiss) {
				//console.log($(this)[0].getTime());
                //var time = clock.getTime().time;
               // alert(time);
                //if (time % 60 == 0) {
                    //Change element
                //}
            }
        }
	});
	//clock.loadLanguage("ru-ru"); 
	// var clock_day = clock.getTime().getDays();
	// var clock_hour = clock.getTime().getDays();
	// var clock_minute = clock.getTime().getDays();
	// var clock_day = clock.getTime().getDays();

	
	
});

	
</script>