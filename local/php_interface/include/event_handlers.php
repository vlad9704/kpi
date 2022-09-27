<?

/*
 * изменить символьный код элемента для уникализации
 */
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("CHosterKZ", "OnBeforeIBlockElementAddHandler"));
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("CHosterKZ", "OnBeforeIBlockElementUpdateHandler"));
define('UNIQUE_ELEMNENT_CODE_IBLOCK_ID' , array(18));
define('SET_UNIQUE_CODE_PROPERTY' , array(27));
class CHosterKZ
{
	function OnBeforeIBlockElementUpdateHandler(&$arFields)
	{
		$IBLOCK_SECTION = current($arFields["IBLOCK_SECTION"]);
		if( $IBLOCK_SECTION>0 && in_array($arFields["IBLOCK_ID"],UNIQUE_ELEMNENT_CODE_IBLOCK_ID) )
		{
			$arFields["CODE"] = str_replace("-".$IBLOCK_SECTION, "",$arFields["CODE"]);
			$arFields["CODE"] = $arFields["CODE"]."-".$IBLOCK_SECTION;
		}
		
	}

	function OnBeforeIBlockElementAddHandler(&$arFields)
	{
		$IBLOCK_SECTION = current($arFields["IBLOCK_SECTION"]);
		if( $IBLOCK_SECTION>0 && in_array($arFields["IBLOCK_ID"],UNIQUE_ELEMNENT_CODE_IBLOCK_ID) )
		{
			$arFields["CODE"] = str_replace("-".$IBLOCK_SECTION, "",$arFields["CODE"]);
			$arFields["CODE"] = $arFields["CODE"]."-".$IBLOCK_SECTION;
			//log_array($arFields);
		}
		
		if( in_array($arFields["IBLOCK_ID"],SET_UNIQUE_CODE_PROPERTY) )
		{
			$arCutilParams = array("replace_space"=>"_","replace_other"=>"_");
			$prop = strtolower(current($arFields["PROPERTY_VALUES"][59])["VALUE"]);
			$propTranslit = Cutil::translit($prop,"ru",$arCutilParams);
			CIBlockElement::SetPropertyValueCode($arFields["ID"], "CODE", $propTranslit);
			
		}
	}
}


/*
 * добавить значение года и месяца в свойство для фильтра
 */
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("CKpi", "OnAfterIBlockElementAddHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("CKpi", "OnAfterIBlockElementUpdateHandler"));

define('YEAR_AND_MONTH_IBLOCK_ID' , array(2,12,21,22));


class CKpi
{
	protected function setYearAndMonth($arFields) 
	{
		$arDate["MONTH"] = date("m", strtotime($arFields["ACTIVE_FROM"]));
		$arDate["YEAR"] = date("Y", strtotime($arFields["ACTIVE_FROM"]));
		CIBlockElement::SetPropertyValuesEx($arFields["ID"], false, array("YEAR"=> intval($arDate["YEAR"])));
		CIBlockElement::SetPropertyValuesEx($arFields["ID"], false, array("MONTH"=> intval($arDate["MONTH"])));
	}
	
	protected function setExternalCode($arFields) 
	{
		$arCutilParams = array("replace_space"=>"_","replace_other"=>"_");
		$prop = strtolower(current($arFields["PROPERTY_VALUES"][59])["VALUE"]);
		$propTranslit = Cutil::translit($prop,"ru",$arCutilParams);
		CIBlockElement::SetPropertyValuesEx($arFields["ID"], false, array("EXTERNAL_CODE"=> $propTranslit));
	}

	public function OnAfterIBlockElementAddHandler($arFields) 
	{
		if(in_array($arFields["IBLOCK_ID"],YEAR_AND_MONTH_IBLOCK_ID))
		{
			self::setYearAndMonth($arFields) ;
			
		}
		
		if( in_array($arFields["IBLOCK_ID"],SET_UNIQUE_CODE_PROPERTY) )
		{
			self::setExternalCode($arFields) ;
		}
	}

	public function OnAfterIBlockElementUpdateHandler($arFields) 
	{
		if(in_array($arFields["IBLOCK_ID"],YEAR_AND_MONTH_IBLOCK_ID))
		{
			self::setYearAndMonth($arFields) ;
		}
		
		if( in_array($arFields["IBLOCK_ID"],SET_UNIQUE_CODE_PROPERTY) )
		{
			self::setExternalCode($arFields) ;
		}
	}
}

?>