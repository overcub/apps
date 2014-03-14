$(document).ready( function() {
	$(".glc-btn-close-pub").on( "click", function(){
		$(this).parent().parent('.glc-publicidade').addClass('hide');
	});
});