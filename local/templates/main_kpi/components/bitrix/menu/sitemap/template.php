<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?		
$cur_page = $APPLICATION->GetCurPage(true);
$cur_page_no_index = $APPLICATION->GetCurPage(false);
?>
<?if (!empty($arResult)):?>
	<div class="row">
		<div class="small-12 medium-6 large-6 column">
			<?foreach($arResult as $key=>$arItem):?>
				<div class="site-map-wrapper">
					<div class="site-map__title">
						<a href="<?=$arItem["LINK"]?>" <?=($arItem["SELECTED"]?'active="active"':'');?>><?=$arItem["TEXT"]?></a>
					</div>
					<?
					$menu = new CMenu($arParams["CHILD_MENU_TYPE"]);
					$menu->Init($arItem["LINK"], $arParams["USE_EXT"]);
						if($menu->arMenu)
						{
					?>
							<ul class="site-map">
								<?
								foreach($menu->arMenu as $subItem)
								{
									$isItemSelected = CMenu::IsItemSelected($subItem[1], $cur_page, $cur_page_no_index);
								?>
									<li><a href="<?=$subItem[1]?>" class="menu-box__item <?=$isItemSelected?"active":""?>"><?=$subItem[0]?></a></li>
								<?
								}
								?>
							</ul>
					<?
						}
					?>
				</div>
				<?=(($key+1)%2==0)?'</div><div class="small-12 medium-6 large-6 column">':'';?>
			<?endforeach?>
		</div>
	</div>
<?endif?>
