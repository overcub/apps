var glcLOLNexus = {
	resultPlayers : null, 
	playerChampionSelections : [], 
	inGame : function(name,platform){
		$.ajax({
		    url: 'http://local.stream.geeklifeclub.com.br/players/findPlayeirsNexus', // The URL to the API. You can get this by clicking on "Show CURL example" from an API profile
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
		    	glcLOLNexus.showResultPlayersInGame(data);
		    }
		});
	},
	loadPlayerChampionSelectionsInGame : function(playerName){
		var championId = 0;
		for(var i=0; i < this.playerChampionSelections.length; i++ ){
			if(this.playerChampionSelections[i].summonerInternalName == playerName){
				championId = this.playerChampionSelections[i].championId;
				break;
			}
		}
		return championId;
	},
	loadChampionByCode : function(code){
		var champion = null;
		for(var i=1; i < 116; i++ ){
			if(dataList[dataListByCode[i]].code == code){
				champion = dataList[dataListByCode[i]];
				break;
			}
		}
		return (typeof(champion)=='object')? champion : null;
	},
	viewPlayerChampionSelectionsInGame : function(champion){
		var conteudo = "";
		if(typeof(champion) =='object' && champion != null){
			conteudo+='<img class="media-object pull-left" alt="'+champion.name+'" title="'+champion.name+'" style="width: 64px; height: 64px;" src="images/icons/'+champion.code+'.jpg"/>';
			conteudo+=' <span class="label">'+champion.name+'</span>';
		}
		return conteudo;
	},
	viewPlayersInGame : function(players){
		var conteudo = "",
		champion = null
		championCode = 0;
		conteudo+='<div class="glc-champions-stats">';
			conteudo+='<table class="table table-striped table-bordered">';
				conteudo+='<thead><tr><th>Campeão</th><th>Invocador</th></tr></thead>';
				for(var i=0; i < players.length; i++ ){
					championCode = this.loadPlayerChampionSelectionsInGame(players[i].summonerInternalName);
					champion = this.loadChampionByCode(championCode);
					conteudo+='<tr><td class="span2">'+this.viewPlayerChampionSelectionsInGame(champion)+'</td><td class="span2">'+players[i].summonerName+'</td></tr>';
				}
			conteudo+='</table>';
		conteudo+='</div>';
		return conteudo;
	},
	resultPlayersInGame : function(value){
		var conteudo = "";
		this.playerChampionSelections = value.data.game.playerChampionSelections.array;
		conteudo+='<div class="row-fluid glc-champions">';
		conteudo+='<div class="span6">';
			conteudo+='<h2>Time 1</h2>';
			conteudo+=this.viewPlayersInGame(value.data.game.teamOne.array);
		conteudo+='</div>';
		conteudo+='<div class="span6">';
			conteudo+='<h2>Time 2</h2>';
	    	conteudo+=this.viewPlayersInGame(value.data.game.teamTwo.array);
	    conteudo+='</div>';
	    conteudo+='<hr>';
		conteudo+='</div>';
		return conteudo;
	},
	showResultPlayersInGame : function(value){
		if(value.success == true){
		 	var conteudo = this.resultPlayersInGame(value);
			$('#parte-resultado').removeClass('hide');
			$('#exibe-resultado').html(conteudo);
			$('html, body').animate({scrollTop: $("#exibe-resultado").offset().top}, 1000);   
		}else{
			alert("Ops! Verifique se o invocador em uma partida e faça uma nova busca.");
		}
	}	
};