<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$ext = "svg,jpg,jpeg,gif,png";

$arSocialNetworks = array(
	"Facebook"=>"Facebook",
	"Instagram"=>"Instagram",
	"Youtube"=>"Youtube",
	"Google"=>"Google",
	"Twitter"=>"Twitter",
	"Linkdin"=>"Linkdin"
);
$arTemplateParameters = array(
	"LIST_SOCIAL_NETWORKS" => array(
		"PARENT" => "CUSTOM_EDIT_CONTENT",
		"NAME" => "Выберите соцсети",
		"TYPE" => "LIST",
		"VALUES" => $arSocialNetworks,
		"MULTIPLE" => "Y",
		"DEFAULT" => array(),
		"REFRESH" => "Y",
		"ADDITIONAL_VALUES" =>  "Y",
		"COLS" => "30",
		"SIZE" => count($arSocialNetworks)+1
	),

);

if (count($arCurrentValues["LIST_SOCIAL_NETWORKS"])>0)
{
	foreach($arCurrentValues["LIST_SOCIAL_NETWORKS"] as $socialNetwork)
	{
		$arTemplateParameters[strtoupper($socialNetwork)."_LOGO"] = array(
			"PARENT" => "CUSTOM_EDIT_CONTENT",
			"NAME" => "Иконка {$socialNetwork}",
			"TYPE" => "FILE",
			"FD_TARGET" => "F",
			"FD_EXT" => $ext,
			"FD_UPLOAD" => true,
			"FD_USE_MEDIALIB" => true,
			"FD_MEDIALIB_TYPES" => Array(),
		);
		$arTemplateParameters[strtoupper($socialNetwork)."_LINK"] = array(
			"PARENT" => "CUSTOM_EDIT_CONTENT",
			"NAME" => "Ссылка {$socialNetwork}",
			"TYPE" => "STRING",
			"DEFAULT" => "",
		);
	}
	
}




?>