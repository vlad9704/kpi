<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Bitrix\Main\Application; 
use Bitrix\Main\Localization\Loc;

$request = Application::getInstance()->getContext()->getRequest();
$reqYear = $request->get("year");
$reqMonth = $request->get("month");
$reqSection = $request->get("section");

/*
 * get sections
 */
$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "GLOBAL_ACTIVE"=>"Y");
$dbList = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false,$arSelect);
while($arSection = $dbList->GetNext())
{
	$arSections[$arSection["ID"]] = $arSection;
	$arSectionsID[] = $arSection["ID"];
	
}
unset($arSelect,$arFilter,$dbList,$arSection);

if(in_array($reqSection,$arSectionsID))
	$SECTION_ID = $reqSection;
else
	$SECTION_ID = current($arSectionsID);


/*
 * get years
 */
$arYears = array();
$arSelect = Array("ID", "PROPERTY_YEAR");
$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"],"SECTION_ID"=>$SECTION_ID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM"=>'ASC'), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	if(!in_array($arFields["PROPERTY_YEAR_VALUE"],$arYears))
	{
		$arYears[] = $arFields["PROPERTY_YEAR_VALUE"];
	}
}
unset($arSelect,$arFilter,$res,$ob,$arFields);

/*
 * get months
 */
if($reqYear>0 && in_array($reqYear,$arYears))
{
	$arMonths = array();
	$arSelect = Array("ID", "PROPERTY_MONTH");
	$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "SECTION_ID"=>$SECTION_ID, "PROPERTY_YEAR"=>$reqYear, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM"=>'ASC'), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		if(!in_array($arFields["PROPERTY_MONTH_VALUE"],$arMonths))
		{
			$arMonths[] = $arFields["PROPERTY_MONTH_VALUE"];
		}
	}
	unset($arSelect,$arFilter,$res,$ob,$arFields);
}


global ${$arParams["FILTER_NAME"]};
if(in_array($reqYear,$arYears))
	${$arParams["FILTER_NAME"]}["PROPERTY_YEAR"] = $reqYear;

if(in_array($reqMonth,$arMonths))
	${$arParams["FILTER_NAME"]}["PROPERTY_MONTH"] = $reqMonth;

if(in_array($reqSection,$arSectionsID))
	${$arParams["FILTER_NAME"]}["SECTION_ID"] = $reqSection;
else
	${$arParams["FILTER_NAME"]}["SECTION_ID"] = current($arSectionsID);

?>
<ul class="tabs" id="media-tabs">
	<?
	$с = 0;
	foreach ($arSections as $key=>$arSection)
	{
		if( empty($reqSection)  && $с == 0)
		{
			$isActive =  "is-active";	
		}
		elseif($reqSection == $arSection["ID"])
		{
			$isActive =  "is-active";	
		}
		$с++;
	?>
		<li class="tabs-title <?=$isActive?>">
			<a href="<?=$APPLICATION->GetCurPageParam("section=".$arSection["ID"], array("year", "month", "section")); ?>"><?=$arSection["NAME"]?></a>
		</li>
	<?
		unset($isActive);
	}
	?>
</ul>
<div class="filter-box">
	<div class="row">
		<div class="small-12 medium-6 large-6 column">
			<div class="filter-box__input">
				<select name="year" onchange="filter_changeYear(this.value)">
					<option selected="selected" value=""><?=Loc::getMessage("KPI_MEDIALIB_FILTER_YEAR")?></option>
					<?foreach($arYears as $year):?>
						<option value="<?=$year?>" <?=($reqYear == $year)?"selected":"";?>><?=$year?></option>
					<?endforeach;?>

				</select>
			</div>
		</div>
		<div class="small-12 medium-6 large-6 column">
			<div class="filter-box__input">
				<select name="month" onchange="filter_changeMonth(this.value)">
					<option value=""><?=Loc::getMessage("KPI_MEDIALIB_FILTER_MONTH")?></option>
					<?foreach($arMonths as $month):?>
						<option value="<?=$month?>" <?=($reqMonth == $month)?"selected":"";?>><?=Loc::getMessage("MONTH_".$month)?></option>
					<?endforeach;?>

				</select>
			</div>
		</div>
	</div>
</div>

<script>
function filter_changeYear(year)
{
	window.location.href = '<?=$APPLICATION->GetCurPageParam("year='+year+'", array("year", "month")); ?>'
}

function filter_changeMonth(month)
{
	window.location.href = '<?=$APPLICATION->GetCurPageParam("month='+month+'", array("month")); ?>'
}
</script>

