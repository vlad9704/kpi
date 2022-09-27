<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?
//чистим от пустых полей
$arParams["LIST_SOCIAL_NETWORKS"] = array_diff($arParams["LIST_SOCIAL_NETWORKS"], array(''));
?>
	<?
	if(count($arParams["LIST_SOCIAL_NETWORKS"])>0)
	{
	?>
		<ul class="footer-soc">
			<?
			foreach($arParams["LIST_SOCIAL_NETWORKS"] as $socialNetwork)
			{
				$socialNetwork = strtoupper($socialNetwork);
				?>
					<li>
						<a href="<?=$arParams[strtoupper($socialNetwork)."_LINK"]?>" target="_blank" class="footer-soc__item" title="<?=$socialNetwork?>">
						<img src="<?=$arParams[strtoupper($socialNetwork)."_LOGO"]?>" alt="<?=$socialNetwork?>">
						</a>
					</li>
				<?
			}
			?>
		</ul>
	<?
	}
	?>





