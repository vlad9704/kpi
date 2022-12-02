<?
if ( !defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true ) die();

if ( $arResult[ "isFormErrors" ] == "Y" ):?><?= $arResult[ "FORM_ERRORS_TEXT" ]; ?><? endif; ?>
<?= $arResult[ "FORM_NOTE" ] ?>
<? if ( $arResult[ "isFormNote" ] != "Y" ) {
	?>
	<?= $arResult[ "FORM_HEADER" ] ?>
	<div class="resume_form_container">
		<br> <br>

		<div class="resume_title">
			<?=GetMessage('TITLE')?>
		</div>
		<br>
		<p class="resume_description">
			<?=GetMessage('DESCRIPTION')?>
		</p>
		<hr class="resume_title_hr">
		<br>

		<p>
			<?= $arResult[ "REQUIRED_SIGN" ]; ?> - <?= GetMessage("FORM_REQUIRED_FIELDS") ?>
		</p>
		<hr style="border-color: rgba(0, 0, 0, 0.22);">

		<table>
			<?
			if ( $arResult[ "isFormDescription" ] == "Y" || $arResult[ "isFormTitle" ] == "Y" || $arResult[ "isFormImage" ] == "Y" ) {
				?>
				<tr>
					<td><?
						if ( $arResult[ "isFormTitle" ] ) {
							?>


							<?
						} //endif ;

						if ( $arResult[ "isFormImage" ] == "Y" ) {
							?>
							<a href="<?= $arResult[ "FORM_IMAGE" ][ "URL" ] ?>" target="_blank"
							   alt="<?= GetMessage("FORM_ENLARGE") ?>"><img
								src="<?= $arResult[ "FORM_IMAGE" ][ "URL" ] ?>"
								<? if ($arResult[ "FORM_IMAGE" ][ "WIDTH" ] > 300): ?>width="300"
								<? elseif ($arResult[ "FORM_IMAGE" ][ "HEIGHT" ] > 200): ?>height="200"<? else: ?><?= $arResult[ "FORM_IMAGE" ][ "ATTR" ] ?><? endif;
								?> hspace="3" vscape="3" border="0"/></a>
							<? //=$arResult["FORM_IMAGE"]["HTML_CODE"]
							?>
							<?
						} //endif
						?>

						<p><?= $arResult[ "FORM_DESCRIPTION" ] ?></p>
					</td>
				</tr>
				<?
			} // endif
			?>
		</table>
		<table class="form-table data-table">
			<tbody>
			<?
			foreach ( $arResult[ "QUESTIONS" ] as $FIELD_SID => $arQuestion ) {
				if ( $arQuestion[ 'STRUCTURE' ][ 0 ][ 'FIELD_TYPE' ] == 'hidden' ) {
					echo $arQuestion[ "HTML_CODE" ];
				} else {
					?>
					<tr>
						<td>
							<? if ( is_array($arResult[ "FORM_ERRORS" ]) && array_key_exists($FIELD_SID, $arResult[ 'FORM_ERRORS' ]) ): ?>
								<span class="error-fld"
									  title="<?= htmlspecialcharsbx($arResult[ "FORM_ERRORS" ][ $FIELD_SID ]) ?>"></span>
							<? endif; ?>
							<span class="<? if ( is_array($arResult[ "FORM_ERRORS" ]) && array_key_exists($FIELD_SID, $arResult[ 'FORM_ERRORS' ]) ) echo 'error-fld'?>"><?= $arQuestion[ "CAPTION" ] ?><? if ( $arQuestion[ "REQUIRED" ] == "Y" ): ?><?= $arResult[ "REQUIRED_SIGN" ]; ?><? endif; ?></span>
							<?= $arQuestion[ "IS_INPUT_CAPTION_IMAGE" ] == "Y" ? "<br />" . $arQuestion[ "IMAGE" ][ "HTML_CODE" ] : "" ?>
						</td>
						<td>
							<?if($FIELD_SID == 'FILE'):?>
							<?
								if(SITE_ID == 'kz')
									$input_id = 'form_file_13';
								elseif(SITE_ID == 'en')
									$input_id = 'form_file_20';
								else
									$input_id = 'form_file_2';
								?>
								<label class="input-file">
									<input type="file" name="<?=$input_id?>">
									<span><?=GetMessage('DOWNLOAD_FILE')?></span>
								</label>
							<?else:?>
								<?= $arQuestion[ "HTML_CODE" ] ?>
							<?endif;?>
						</td>
					</tr>
					<?
				}
			} //endwhile
			?>
			<?
			if ( $arResult[ "isUseCaptcha" ] == "Y" ) {
				?>
				<tr>
					<th colspan="2"><b><?= GetMessage("FORM_CAPTCHA_TABLE_TITLE") ?></b></th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="hidden" name="captcha_sid"
							   value="<?= htmlspecialcharsbx($arResult[ "CAPTCHACode" ]); ?>"/><img
						src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult[ "CAPTCHACode" ]); ?>"
						width="180" height="40"/></td>
				</tr>
				<tr>
					<td><?= GetMessage("FORM_CAPTCHA_FIELD_TITLE") ?><?= $arResult[ "REQUIRED_SIGN" ]; ?></td>
					<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext"/>
					</td>
				</tr>
				<?
			} // isUseCaptcha
			?>
			</tbody>
			<tfoot>
			<tr>
				<th colspan="2" class="input_submit_container">
					<input <?= (intval($arResult[ "F_RIGHT" ]) < 10 ? "disabled=\"disabled\"" : ""); ?> type="submit"
																										name="web_form_submit"
																										value="<?= htmlspecialcharsbx(trim($arResult[ "arForm" ][ "BUTTON" ]) == '' ? GetMessage("FORM_ADD") : $arResult[ "arForm" ][ "BUTTON" ]); ?>"/>
					<?/* if ( $arResult[ "F_RIGHT" ] >= 15 ): ?>
						&nbsp;<input type="hidden" name="web_form_apply" value="Y"/><input type="submit"
																						   name="web_form_apply"
																						   value="<?= GetMessage("FORM_APPLY") ?>"/>
					<? endif; */?>
					<?/*<input type="reset" value="<?= GetMessage("FORM_RESET"); ?>"/>*/?>
				</th>
			</tr>
			</tfoot>
		</table>
		<?= $arResult[ "FORM_FOOTER" ] ?>
	</div>

	<script>
		$('.input-file input[type=file]').on('change', function(){
			let file = this.files[0];
			$(this).next().html(file.name);
		});
	</script>

	<?
} //endif (isFormNote)