jQuery(document).ready(function(){


	jQuery('.color').ColorPicker({
		onShow: function (colpkr,el) {
			jQuery(colpkr).fadeIn(500);
			jQuery(this).ColorPickerSetColor(jQuery(el).val());
			return false;
		},
		onHide: function (colpkr) {
			jQuery(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb,el) {
			jQuery(el).val(hex);        
		}
	});
	

	
});