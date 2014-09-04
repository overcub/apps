
// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        $(this).attr('disabled','disabled');
        var anchor = $(this);
        $('html, body').animate({scrollTop: $(anchor.attr('href')).offset().top}, 1000);
        setTimeout(function(){
            $(anchor).removeAttr('disabled');
        }, 2000);
    });
});

$(document).ready(function(){
	var ancora = window.location.href.split("#")[1];
	if( ancora ){
	    $('html, body').animate({scrollTop: $("#"+ancora).offset().top}, 1000);
	}
});

$("#glc-feedback-stream").ready(function() {
    $( "#glc-btn-close-feedback-stream" ).on( "click", function(){
        $('#glc-feedback-stream').removeClass('up');
    });
    setTimeout ( " $('#glc-feedback-stream').addClass('up'); ",3000 );
});