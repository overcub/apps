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
};