<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Bitrix\Main\Application; 
use Bitrix\Main\Localization\Loc;

$request = Application::getInstance()->getContext()->getRequest();
$reqYear = $request->get("year");
$reqSection = $request->get("type");

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
if($reqSection>0 && in_array($reqSection,$arSectionsID))
{
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
}


global ${$arParams["FILTER_NAME"]};
if(in_array($reqYear,$arYears))
	${$arParams["FILTER_NAME"]}["PROPERTY_YEAR"] = $reqYear;

if(in_array($reqSection,$arSectionsID))
	${$arParams["FILTER_NAME"]}["SECTION_ID"] = $reqSection;
// else
	// ${$arParams["FILTER_NAME"]}["SECTION_ID"] = current($arSectionsID);

?>

<div class="filter-box">
	<div class="row">
		<div class="small-12 medium-6 large-6 column">
			<div class="filter-box__input">
				<select name="type" onchange="filter_changeType(this.value)">
					<option selected="selected" value=""><?=Loc::getMessage("KPI_FILTER_TYPE_ZAKUP")?></option>
					<?foreach($arSections as $id=>$section):?>
						<option value="<?=$id?>" <?=($reqSection == $id)?"selected":"";?>><?=$section["NAME"]?></option>
					<?endforeach;?>

				</select>
			</div>
		</div>
		<div class="small-12 medium-6 large-6 column">
			<div class="filter-box__input">
				<select name="year" onchange="filter_changeMonth(this.value)">
					<option value=""><?=Loc::getMessage("KPI_MEDIALIB_FILTER_YEAR")?></option>
					<?foreach($arYears as $year):?>
						<option value="<?=$year?>" <?=($reqYear == $year)?"selected":"";?>><?=$year?></option>
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

function filter_changeType(type)
{
	window.location.href = '<?=$APPLICATION->GetCurPageParam("type='+type+'", array("type","year")); ?>'
}
</script>

