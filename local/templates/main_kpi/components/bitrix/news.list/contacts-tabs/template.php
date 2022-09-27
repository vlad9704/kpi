<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="row">
	<div class="small-12 medium-6 large-6 column">
		<h3><?=$arParams["TITLE_TAB_BLOCK"]?></h3>
		<ul class="tabs tabs--little" data-tabs id="contact-tabs">
		<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			$isActive = $key==0;
			?>
			<?if($isActive):?>
				<li class="tabs-title is-active" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><a href="#contact-tabs<?=$key?>" aria-selected="true"><?echo $arItem["NAME"]?></a></li>
			<?else:?>
				<li class="tabs-title" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><a data-tabs-target="contact-tabs<?=$key?>" href="#contact-tabs<?=$key?>"><?echo $arItem["NAME"]?></a></li>
			<?endif;?>
		<?endforeach;?>
		</ul>
		<div class="tabs-content" data-tabs-content="contact-tabs">
		<?$stringPoints = "";?>
			<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
				<?
				$isActive = $key==0;
				?>
					<div class="tabs-panel <?=$isActive?"is-active":""?>" id="contact-tabs<?=$key?>">
						<?=$arItem["PREVIEW_TEXT"]?>
						<?foreach($arItem["DISPLAY_PROPERTIES"]["PHONES"]["VALUE"] as $arPhone):?>
							<?$truePhone = (str_replace(array("(",")","-","_"," "),array(""),$arPhone));?>
							<p><a href="tel:<?=$truePhone?>" class="link link--phone"><?=$arPhone?></a></p>
						<?endforeach;?>

						<p><a href="mailto:<?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"]?>" class="link link--mail"><?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"]?></a></p>
						
					</div>
				<?
				$arCustomMap[$key] = "[".$arItem["DISPLAY_PROPERTIES"]["MAP"]["~VALUE"]."]";
				$arCoord[$key] = explode(",",$arItem["DISPLAY_PROPERTIES"]["MAP"]["~VALUE"]);
				
				$stringPoints.= "{";
				$stringPoints.= "center: [".floatval($arCoord[$key][0]).",".floatval($arCoord[$key][1])."],";
				$stringPoints.= "name:'".$arItem["NAME"]."',";
				$stringPoints.= "body:'".$arItem["PREVIEW_TEXT"]."'";
				$stringPoints.= "},";

				$arMap[$key]["LAT"] = $arCoord[$key][0];
				$arMap[$key]["LON"] = $arCoord[$key][1];
				$arMap[$key]["TEXT"] = $arItem["PREVIEW_TEXT"];
				
				?>
			<?endforeach;?>
			
			<?if(count($arMap)>0):?>
				<?
				$this->SetViewTarget('mapContacts');
				?>
				
			
				<?$yandex_map_api_key = COption::GetOptionString("fileman", "yandex_map_api_key","8085965b-8f65-4461-b827-c0362d661ae6");?>
				<script type="text/javascript" src="//api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=<?=$yandex_map_api_key?>"></script>
				<div id="map" style="width:100%;height:500px;"></div>
				<script>
				
					var groupsKrg = [<?=$stringPoints?>];
					ymaps.ready(init);
					function init() {

						var myMap = new ymaps.Map('map', {
								center: [50,50],
								zoom: 5,
								controls: ['zoomControl']
							}, {
								
							});
							
						var placemark=[];
						var collection = new ymaps.GeoObjectCollection(null, { preset: 'islands#blueIcon' });
						for (var i = 0, l = groupsKrg.length; i < l; i++) {
								placemark[i] = new ymaps.Placemark(groupsKrg[i].center, { balloonContentHeader: groupsKrg[i].name,balloonContentBody: groupsKrg[i].body});
								collection.add(placemark[i]);
							}
						myMap.geoObjects.add(collection);
						myMap.setBounds(collection.getBounds());
						//myMap.setBounds(collection.getBounds(), {checkZoomRange:true}).then(function(){ if(myMap.getZoom() > 4) myMap.setZoom(4);});
						myMap.behaviors.disable('drag');
						
					}


				</script>

<?//if($USER->IsAdmin()):?>
			<?
			/* else:?>
				<div class="maps-contact-wrapper">
					<?
					$b = array();
					if(!empty($arParams["MAP_CENTER_COORDINATES"]))
					{
						$arDefaultCoords = explode(",",$arParams["MAP_CENTER_COORDINATES"]);
						$b["yandex_lat"] = $arDefaultCoords[0];
						$b["yandex_lon"] = $arDefaultCoords[1];
					}
						else
						{
							$b["yandex_lat"] = 48.5517362041292;
							$b["yandex_lon"] = 66.9044335;
						}
							if($arParams["MAP_SCALE"]>0)
							{
								$b["yandex_scale"] = $arParams["MAP_SCALE"];
							}
								else
								{
									$b["yandex_scale"] = 5;
								}
					$b["PLACEMARKS"] = $arMap;
					$MAP_DATA = stripcslashes(htmlspecialchars_decode(serialize($b)));
					?>
					
					<?
						$APPLICATION->IncludeComponent(
							"bitrix:map.yandex.view",
							"",
							Array(
								"CONTROLS" => array("ZOOM","SCALELINE"),
								"INIT_MAP_TYPE" => "MAP",
								"MAP_DATA" => $MAP_DATA, "MAP_HEIGHT" => "500",
								"MAP_ID" => "map-contacts",
								"MAP_WIDTH" => "100%",
								"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
							),
							$component,
							array("HIDE_ICONS" => "Y")
						);
					?>
					
				</div>
			<?endif; */?>	
				<?
				$this->EndViewTarget();
				?>
			<?endif;?>
			
		</div>
		<div>
			<p>Email для резюме</p> 
			<p><a href="mailto:cv@kpi.kz" class="link link--mail">cv@kpi.kz</a></p>
			<p>Резюме к рассмотрению принимаются  на русском и государственном языке</p>
		</div>
		<br class="show-for-small-only">
	</div>
	
	<div class="small-12 medium-6 large-6 column">
		<h3><?=$arParams["TITLE_SOCIAL_NETWORK_BLOCK"]?></h3>
		<?if(file_exists($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/page_blocks/social-networks-block.php"))
				require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/page_blocks/social-networks-block.php")?>
	</div>
</div>