var glcLOLNexus = {
	inGame : function(name,platform){
		$.ajax({
		    url: 'http://stream.geeklifeclub.com.br/players/findPlayeirsNexus', // The URL to the API. You can get this by clicking on "Show CURL example" from an API profile
		    type: 'POST',
		    crossDomain: true,
		    dataType: 'json',
			data : {
				Players : {
					name : name,
					platform : platform
				}
			},
		    success: function(data) { 
		    	console.log(data);
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