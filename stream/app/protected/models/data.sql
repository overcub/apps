https://prod.api.pvp.net/api/lol/br/v1.3/stats/by-summoner/2876377/ranked?api_key=26f09884-ebe5-426d-ace2-da3543099bab


https://prod.api.pvp.net/api/lol/br/v1.3/summoner/by-name/RiotSchmick?api_key=26f09884-ebe5-426d-ace2-da3543099bab


 /api/lol/{region}/v1.3/game/by-summoner/{summonerId}/recent

    Get recent games by summoner ID (REST)

 https://prod.api.pvp.net/api/lol/br/v1.2/stats/by-summoner/2876377/ranked?api_key=26f09884-ebe5-426d-ace2-da3543099bab
 https://prod.api.pvp.net/api/lol/br/v2.3/league/by-summoner/2876377?api_key=26f09884-ebe5-426d-ace2-da3543099bab



 /api/lol/{region}/v2.3/league/by-summoner/{summonerId}

    Retrieves leagues data for summoner, including summoner's teams. (REST)


    Get ranked stats by summoner ID. Includes statistics for Twisted Treeline and Summoner's Rift. (REST)




ALTER TABLE `apps.geeklifeclub`.`lol_player` 
ADD UNIQUE INDEX `lol_player_id_players_UNIQUE` (`id_players` ASC);

ALTER TABLE `apps.geeklifeclub`.`lol_player` 
ADD COLUMN `honorData` TEXT NULL DEFAULT NULL AFTER `mixData`;


ALTER TABLE `apps.geeklifeclub`.`lol_player` 
ADD COLUMN `rankedData` TEXT NULL DEFAULT NULL AFTER `honorData`;


JSON.parse('{"data":{"totals":[0,51,66,249,80]}}')


{     "_": {         "APP_ID": "server_tracked"     },     "success": true,     "requestTime": "2014-03-28T17:27:20-07:00",     "shard": "Brasil:N2M3Y2IwNzA4YmYzODQ0Nzc3N2VmZDE4NjAwMTI1MTlhZTg1YWVkMA",     "player": {         "accountId": 201003886,         "summonerId": 2876377,         "name": "rtancman",         "icon": 12,         "internalName": "rtancman",         "level": 30     },     "data": {         "totals": [             0,             35,             27,             175,             94         ]     } }