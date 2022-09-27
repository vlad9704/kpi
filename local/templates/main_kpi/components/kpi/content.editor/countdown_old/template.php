<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="clock-box" id="<?=$arParams["KPI_COUNTDOWN_ID"]?>"></div>
<?if(!empty($arParams["KPI_TEXT"])):?>
	<p><?=htmlspecialchars_decode($arParams["KPI_TEXT"])?></p>
<?endif;?>

<?

$COUNTDOWN_1_DAY = GetMessageJS("COUNTDOWN_1_DAY");
$COUNTDOWN_2_DAYS = GetMessageJS("COUNTDOWN_2_DAYS");
$COUNTDOWN_MANY_DAYS = GetMessageJS("COUNTDOWN_MANY_DAYS");

$COUNTDOWN_1_HOUR = GetMessageJS("COUNTDOWN_1_HOUR");
$COUNTDOWN_2_HOURS = GetMessageJS("COUNTDOWN_2_HOURS");
$COUNTDOWN_MANY_HOURS = GetMessageJS("COUNTDOWN_MANY_HOURS");

$COUNTDOWN_1_MINUTE = GetMessageJS("COUNTDOWN_1_MINUTE");
$COUNTDOWN_2_MINUTES = GetMessageJS("COUNTDOWN_2_MINUTES");
$COUNTDOWN_MANY_MINUTES = GetMessageJS("COUNTDOWN_MANY_MINUTES");

$COUNTDOWN_1_SECOND = GetMessageJS("COUNTDOWN_1_SECOND");
$COUNTDOWN_2_SECONDS = GetMessageJS("COUNTDOWN_2_SECONDS");
$COUNTDOWN_MANY_SECONDS = GetMessageJS("COUNTDOWN_MANY_SECONDS");


$arDate = $arParams["SET_DATE"];
$arStart["DAY"] = date("d", strtotime($arDate));
$arStart["MONTH"] = date("m", strtotime($arDate));
$arStart["YAER"] = date("Y", strtotime($arDate));
?>
<script>

	var clockBox = $('#<?=$arParams["KPI_COUNTDOWN_ID"]?>');
	if (clockBox.length > 0) {
		
		/*TIMER*/
		var days, hours, minutes, seconds; // переменные для единиц времени

		var countdown = document.getElementById('<?=$arParams["KPI_COUNTDOWN_ID"]?>'); // получить элемент тега

		getCountdown();

		setInterval(function () { getCountdown(); }, 1000);

		function getCountdown(){

			
			//var myDate = '2011-07-29T08:18:39'; 
			dateStart= new Date('<?=$arStart["YAER"]?>-<?=$arStart["MONTH"]?>-<?=$arStart["DAY"]?>T00:00:00').toString();
			dateToday=new Date();
			
			if (dateToday.getTimezoneOffset() == 0) 
				(a=dateToday.getTime() + (4*60*60*1000))
			else 
				(a=dateToday.getTime());
			
			dateToday.setTime(a);
			//console.log(parseDate(dateStart));
			dateStartConvert = parseInt(parseDate(dateStart));
			
			
			//console.log(dateToday2);
			/*dr = (dateToday.getTime() - dateStartConvert.getTime());*/
			dr = (dateToday.getTime() - dateStartConvert);
			days = Math.floor(dr / (1000*60*60*24));
			dateToday.setTime(dr);
			hours = dateToday.getUTCHours();
			minutes = dateToday.getUTCMinutes();
			seconds = dateToday.getSeconds();
			// строка обратного отсчета  + значение тега
			countdown.innerHTML = htmlTimerBlock(days,"days") 
								+ htmlTimerBlock(hours,"hours") 
								+ htmlTimerBlock(minutes,"minutes") 
								+ htmlTimerBlock(seconds,"seconds") ; 
		}

		function pad(n) {
			return (n < 10 ? '0' : '') + n;
		}
		//declensionOfNouns( number, one, two, five )
    }
	
function parseDate(dateString){
    var time = Date.parse(dateString);
    if(!time){
        time = Date.parse(dateString.replace("T"," "));
        if(!time){
            bound = dateString.indexOf('T');
            var dateData = dateString.slice(0, bound).split('-');
            var timeData = dateString.slice(bound+1, -1).split(':');

            time = Date.UTC(dateData[0],dateData[1]-1,dateData[2],timeData[0],timeData[1],timeData[2]);
        }
    }
    return time;
}
	
	function declensionOfNouns( number, one, two, five ) 
	{
		number = Math.abs(number);
		number %= 100;
		if (number >= 5 && number <= 20) {
			return five;
		}
		number %= 10;
		if (number == 1) {
			return one;
		}
		if (number >= 2 && number <= 4) {
			return two;
		}
		return five;
	}
	
 	function htmlTimerBlock(num,type) 
	{
		if(type == "days")
		{	
			return 	'<div class="clock-box__item">'+ 
						'<div class="clock-box__count">'+
							num + 
						'</div>'+
					'<div class="clock-box__text">'+
						declensionOfNouns( num, '<?=$COUNTDOWN_1_DAY?>', '<?=$COUNTDOWN_2_DAYS?>', '<?=$COUNTDOWN_MANY_DAYS?>' )+
					'</div></div>';
		}
		else if(type == "hours")
		{
			return 	'<div class="clock-box__item">'+ 
						'<div class="clock-box__count">'+
							num + 
						'</div>'+
					'<div class="clock-box__text">'+
						declensionOfNouns( num, '<?=$COUNTDOWN_1_HOUR?>', '<?=$COUNTDOWN_2_HOURS?>', '<?=$COUNTDOWN_MANY_HOURS?>' )+
					'</div></div>';
		}		
		else if(type == "minutes")
		{
			return 	'<div class="clock-box__item">'+ 
						'<div class="clock-box__count">'+
							num + 
						'</div>'+
					'<div class="clock-box__text">'+
						declensionOfNouns( num, '<?=$COUNTDOWN_1_MINUTE?>', '<?=$COUNTDOWN_2_MINUTES?>', '<?=$COUNTDOWN_MANY_MINUTES?>' )+
					'</div></div>';
		}		
		else if(type == "seconds")
		{
			return 	'<div class="clock-box__item">'+ 
						'<div class="clock-box__count">'+
							num + 
						'</div>'+
					'<div class="clock-box__text">'+
						declensionOfNouns( num, '<?=$COUNTDOWN_1_SECOND?>', '<?=$COUNTDOWN_2_SECONDS?>', '<?=$COUNTDOWN_MANY_SECONDS?>' )+
					'</div></div>';
		}
		else
		{		
			return 	'<div class="clock-box__item">'+ 
						'<div class="clock-box__count">'+
							num + 
						'</div></div>';
		}
	} 

<?
	/* 	
		if (clockBox.length > 0) 
		{
			var target_date00 = new Date().getTime() + (10000*3600*48); // установить дату обратного отсчета
			var target_date = <?=date("U", strtotime("01.12.2019 00:00:00"))*1000?>; // установить дату обратного отсчета
			console.log(target_date);
			
			console.log(target_date00);
			var days, hours, minutes, seconds; // переменные для единиц времени

			var countdown = document.getElementById('<?=$arParams["KPI_COUNTDOWN_ID"]?>'); // получить элемент тега

			getCountdown();

			setInterval(function () { getCountdown(); }, 1000);

			function getCountdown(){

				var current_date = new Date().getTime();
				var seconds_left = (target_date - current_date) / 1000;

				days = pad( parseInt(seconds_left / 86400) );
				seconds_left = seconds_left % 86400;

				hours = pad( parseInt(seconds_left / 3600) );
				seconds_left = seconds_left % 3600;

				minutes = pad( parseInt(seconds_left / 60) );
				seconds = pad( parseInt( seconds_left % 60 ) );

				// строка обратного отсчета  + значение тега
				countdown.innerHTML = "<div class='clock-box__item'><div class='clock-box__count'>" + days + "</div><div class='clock-box__text'>дня</div></div><div class='clock-box__item'><div class='clock-box__count'>" + hours + "</div><div class='clock-box__text'>часа</div></div><div class='clock-box__item'><div class='clock-box__count'>" + minutes + "</div><div class='clock-box__text'>минут</div></div><div class='clock-box__item'><div class='clock-box__count'>" + seconds + "</div><div class='clock-box__text'>секунд</div></div>"; 
			}

			function pad(n) {
				return (n < 10 ? '0' : '') + n;
			}
		} 
	*/
?>
</script>

