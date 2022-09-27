function OnTextAreaConstruct(arParams) {
   var iInputID   = arParams.oInput.id;
   var iTextAreaID   = iInputID + '_ta';

   var obLabel   = arParams.oCont.appendChild(BX.create('textarea', {
      props : {
         'cols' : 40,
         'rows' : 5,
         'id' : iTextAreaID
      },
      html: arParams.oInput.value
   }));

   $("#"+iTextAreaID).on('keyup', function() {
      $("#"+iInputID).val($(this).val());
   });
}

function OnMySettingsEdit(arParams) {
	arParams.oInput.type = "text";
	arParams.oInput.onclick = BX.delegate(function() {
		BX.calendar({
			node: arParams.oInput,
			//value: arParams.oInput.value,
			field: arParams.oInput,
			callback_after: function(){
				arParams.oInput.value = arParams.oInput.value;
			}
		});
		return false;
	});
}