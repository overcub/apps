var glcLOLNexus = {
	resultPlayers : null, 
	playerChampionSelections : [], 
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
		debugger;
		if(value.hasOwnProperty(data)){
		 	var conteudo = this.resultPlayersInGame(value);
			$('#parte-resultado').removeClass('hide');
			$('#exibe-resultado').html(conteudo);
			$('html, body').animate({scrollTop: $("#exibe-resultado").offset().top}, 1000);   
		}else{
			alert("Ops! Verifique se o invocador em uma partida e faça uma nova busca.");
		}
	}	
};

var playersInGame = {
    "_": {
        "APP_ID": "server_tracked"
    },
    "success": true,
    "requestTime": "2013-09-16T18:50:50-07:00",
    "shard": "Brasil:N2M3Y2IwNzA4YmYzODQ0Nzc3N2VmZDE4NjAwMTI1MTlhZTg1YWVkMA",
    "player": {
        "accountId": 200044147,
        "summonerId": 1865477,
        "name": "ultrafeeder",
        "icon": 40,
        "internalName": "ultrafeeder",
        "level": 30
    },
    "data": {
        "gameSpecificLoyaltyRewards": null,
        "reconnectDelay": 0,
        "dataVersion": 0,
        "libteemo": "1.0",
        "lastModifiedDate": null,
        "game": {
            "passwordSet": false,
            "spectatorsAllowed": "NONE",
            "gameType": "NORMAL_GAME",
            "practiceGameRewardsDisabledReasons": {
                "array": [

                ]
            },
            "gameTypeConfigId": 2,
            "gameState": "IN_PROGRESS",
            "glmGameId": null,
            "glmHost": null,
            "observers": {
                "array": [

                ]
            },
            "statusOfParticipants": "1111111111",
            "glmSecurePort": 0,
            "id": 140876984,
            "ownerSummary": null,
            "teamTwo": {
                "array": [
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381262075,
                        "accountId": 1039897,
                        "queueRating": 0,
                        "originalAccountNumber": 1039897,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "darkness022",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 5,
                        "profileIconId": 37,
                        "rankedTeamGuest": false,
                        "teamOwner": true,
                        "futureData": null,
                        "summonerId": 1151492,
                        "badges": 0,
                        "pickTurn": 2,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "Darkness022",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": 790196728
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381562187,
                        "accountId": 200604823,
                        "queueRating": 0,
                        "originalAccountNumber": 200604823,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "zetsuchiha",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 0,
                        "profileIconId": 38,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 2424817,
                        "badges": 0,
                        "pickTurn": 2,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "zetsuchiha",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": null
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381262075,
                        "accountId": 731956,
                        "queueRating": 0,
                        "originalAccountNumber": 731956,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "snowstorne",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 0,
                        "profileIconId": 40,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 764416,
                        "badges": 0,
                        "pickTurn": 4,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "SnowStorne",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": 790196728
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381262075,
                        "accountId": 200044147,
                        "queueRating": 0,
                        "originalAccountNumber": 200044147,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "ultrafeeder",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 0,
                        "profileIconId": 40,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 1865477,
                        "badges": 0,
                        "pickTurn": 4,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "ultrafeeder",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": 790196728
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381262075,
                        "accountId": 381949,
                        "queueRating": 0,
                        "originalAccountNumber": 46035634,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "holdona",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 0,
                        "profileIconId": 29,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 417049,
                        "badges": 0,
                        "pickTurn": 6,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "Holdona",
                        "pickMode": 0,
                        "originalPlatformId": "NA1",
                        "selectedPosition": null,
                        "teamParticipantId": 790196728
                    }
                ]
            },
            "bannedChampions": {
                "array": [
                    {
                        "dataVersion": 0,
                        "pickTurn": 1,
                        "championId": 34,
                        "teamId": 100,
                        "futureData": null
                    },
                    {
                        "dataVersion": 0,
                        "pickTurn": 2,
                        "championId": 38,
                        "teamId": 200,
                        "futureData": null
                    },
                    {
                        "dataVersion": 0,
                        "pickTurn": 3,
                        "championId": 120,
                        "teamId": 100,
                        "futureData": null
                    },
                    {
                        "dataVersion": 0,
                        "pickTurn": 4,
                        "championId": 53,
                        "teamId": 200,
                        "futureData": null
                    },
                    {
                        "dataVersion": 0,
                        "pickTurn": 5,
                        "championId": 98,
                        "teamId": 100,
                        "futureData": null
                    },
                    {
                        "dataVersion": 0,
                        "pickTurn": 6,
                        "championId": 59,
                        "teamId": 200,
                        "futureData": null
                    }
                ]
            },
            "dataVersion": 0,
            "roomName": null,
            "name": "Match-140876984",
            "spectatorDelay": 0,
            "teamOne": {
                "array": [
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381577061,
                        "accountId": 514298,
                        "queueRating": 0,
                        "originalAccountNumber": 47614779,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "vsrampage",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 3,
                        "profileIconId": 29,
                        "rankedTeamGuest": false,
                        "teamOwner": true,
                        "futureData": null,
                        "summonerId": 589398,
                        "badges": 0,
                        "pickTurn": 1,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "vs Rampage",
                        "pickMode": 0,
                        "originalPlatformId": "NA1",
                        "selectedPosition": null,
                        "teamParticipantId": 790215745
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381601965,
                        "accountId": 536332,
                        "queueRating": 0,
                        "originalAccountNumber": 536332,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "matheuseita",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 3,
                        "profileIconId": 539,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 516904,
                        "badges": 0,
                        "pickTurn": 3,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "MatheusEita",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": null
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381577061,
                        "accountId": 200831220,
                        "queueRating": 0,
                        "originalAccountNumber": 200831220,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "toner",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 4,
                        "profileIconId": 571,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 2656290,
                        "badges": 0,
                        "pickTurn": 3,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "Toner",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": 790215745
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381606997,
                        "accountId": 200954016,
                        "queueRating": 0,
                        "originalAccountNumber": 200954016,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "yokairayzen",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 0,
                        "profileIconId": 38,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 2878307,
                        "badges": 0,
                        "pickTurn": 5,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "Yokai Rayzen",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": null
                    },
                    {
                        "index": 0,
                        "timeAddedToQueue": 1379381564863,
                        "accountId": 200910999,
                        "queueRating": 0,
                        "originalAccountNumber": 200910999,
                        "botDifficulty": "NONE",
                        "summonerInternalName": "weslack",
                        "minor": false,
                        "locale": null,
                        "partnerId": "",
                        "lastSelectedSkinIndex": 0,
                        "profileIconId": 36,
                        "rankedTeamGuest": false,
                        "teamOwner": false,
                        "futureData": null,
                        "summonerId": 2795249,
                        "badges": 0,
                        "pickTurn": 5,
                        "dataVersion": 1,
                        "clientInSynch": true,
                        "selectedRole": null,
                        "summonerName": "Weslack",
                        "pickMode": 0,
                        "originalPlatformId": "BR1",
                        "selectedPosition": null,
                        "teamParticipantId": null
                    }
                ]
            },
            "terminatedCondition": "NOT_TERMINATED",
            "queueTypeName": "NORMAL",
            "glmPort": 0,
            "passbackUrl": null,
            "optimisticLock": 30,
            "roomPassword": "HgEjN5S7XGyhblgF",
            "maxNumPlayers": 10,
            "queuePosition": 0,
            "futureData": null,
            "expiryTime": 0,
            "gameMode": "CLASSIC",
            "mapId": 1,
            "banOrder": null,
            "gameStateString": "IN_PROGRESS",
            "pickTurn": 8,
            "playerChampionSelections": {
                "array": [
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "snowstorne",
                        "spell2Id": 12,
                        "selectedSkinIndex": 0,
                        "championId": 62,
                        "futureData": null,
                        "spell1Id": 4
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "yokairayzen",
                        "spell2Id": 4,
                        "selectedSkinIndex": 5,
                        "championId": 143,
                        "futureData": null,
                        "spell1Id": 21
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "holdona",
                        "spell2Id": 4,
                        "selectedSkinIndex": 0,
                        "championId": 60,
                        "futureData": null,
                        "spell1Id": 11
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "matheuseita",
                        "spell2Id": 4,
                        "selectedSkinIndex": 0,
                        "championId": 92,
                        "futureData": null,
                        "spell1Id": 14
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "darkness022",
                        "spell2Id": 4,
                        "selectedSkinIndex": 0,
                        "championId": 51,
                        "futureData": null,
                        "spell1Id": 21
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "weslack",
                        "spell2Id": 11,
                        "selectedSkinIndex": 0,
                        "championId": 131,
                        "futureData": null,
                        "spell1Id": 12
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "vsrampage",
                        "spell2Id": 21,
                        "selectedSkinIndex": 0,
                        "championId": 42,
                        "futureData": null,
                        "spell1Id": 4
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "ultrafeeder",
                        "spell2Id": 3,
                        "selectedSkinIndex": 0,
                        "championId": 412,
                        "futureData": null,
                        "spell1Id": 4
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "zetsuchiha",
                        "spell2Id": 4,
                        "selectedSkinIndex": 0,
                        "championId": 61,
                        "futureData": null,
                        "spell1Id": 14
                    },
                    {
                        "dataVersion": 0,
                        "summonerInternalName": "toner",
                        "spell2Id": 4,
                        "selectedSkinIndex": 0,
                        "championId": 89,
                        "futureData": null,
                        "spell1Id": 3
                    }
                ]
            },
            "passbackDataPacket": null,
            "joinTimerDuration": 12
        },
        "connectivityStateEnum": null,
        "gameName": "match-140876984",
        "playerCredentials": {
            "encryptionKey": null,
            "observerServerIp": "66.150.148.234",
            "playerId": 200044147,
            "handshakeToken": null,
            "dataVersion": 0,
            "serverPort": 0,
            "gameId": 140876984,
            "serverIp": null,
            "lastSelectedSkinIndex": 0,
            "observerServerPort": 80,
            "summonerName": null,
            "observerEncryptionKey": "N6JzrYYWlFAk0aQdENSAQWdDSpYVJcn6",
            "championId": 0,
            "observer": true,
            "futureData": null,
            "summonerId": 0
        },
        "_success": 1,
        "futureData": null
    }
};