var glcMashape = {
	appKey : "MWDMOJlVh625v8o0365WsPn9A3rVmf7J",
	returnData : null,
	auth : function(){
		$.ajax({
		    url: 'https://teemojson.p.mashape.com/player/br/yZero/ingame', // The URL to the API. You can get this by clicking on "Show CURL example" from an API profile
		    type: 'POST', // The HTTP Method
		    data: "rtancman", // Additional parameters here
		    datatype: 'json',
		    success: function(data) { 
		    	console.log(JSON.stringify(data)); 
		    	glcMashape.authData = data;
		    },
		    error: function(err) { 
		    	console.log('erro!!!'); 
		    	console.log(JSON.stringify(err)); 
		    },
		    beforeSend: function(xhr) {
				xhr.setRequestHeader("X-Mashape-Authorization", glcMashape.appKey); // Enter here your Mashape key
		    }
		});
	}
},
glcLolNexus = {};
$(document).ready(function(){
	
	$('#btn-search').on('click', function() {
		var value = $('#search').val();	
	});
	
});
//https://www.mashape.com/meepo/League-of-Legends/misc/summoner-name/na/54353