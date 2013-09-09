<?php

DEFINE('AMBIENT_AIR',1);
DEFINE('AMBIENT_LOCAL',2);
$CONFIG = array();
$ambient = AMBIENT_LOCAL;

switch($ambient){
    case AMBIENT_LOCAL:
        $CONFIG['database'][1]['connectionString'] = 'mysql:host=mysql.localhost;dbname=apps.geeklifeclub';
        $CONFIG['database'][1]['username'] = 'geek';
        $CONFIG['database'][1]['password'] = 'geeklifeclubaabc33163356';
        $CONFIG['database'][2]['connectionString'] = 'mysql:host=mysql.localhost;dbname=apps.geeklifeclub';
        $CONFIG['database'][2]['username'] = 'geek';
        $CONFIG['database'][2]['password'] = 'geeklifeclubaabc33163356';
        
        $CONFIG['cache'][1]['host'] = 'localhost';
        
        $CONFIG['params']['googleAnalyticsId'] = '';
        $CONFIG['params']['googleAnalyticsDomain'] = '';
        $CONFIG['params']['cdnUrl'] = 'http://local.stream.geeklifeclub.com.br';
        $CONFIG['params']['defaultUrl'] = 'http://local.stream.geeklifeclub.com.br';

        $CONFIG['params']['assetManager'] = array(
        		'class' => 'ext.version-asset-manager.VersionAssetManager',
        		'baseUrl' => $CONFIG['params']['cdnUrl'] . '/assets'
        );

    break;

    case AMBIENT_AIR:
        $CONFIG['database'][1]['connectionString'] = 'mysql:host=localhost;dbname=apps.geeklifeclub';
        $CONFIG['database'][1]['username'] = 'geek';
        $CONFIG['database'][1]['password'] = 'p3rs0n4xky';
        $CONFIG['database'][2]['connectionString'] = 'mysql:host=localhost;dbname=apps.geeklifeclub';
        $CONFIG['database'][2]['username'] = 'geek';
        $CONFIG['database'][2]['password'] = 'p3rs0n4xky';
        
        $CONFIG['cache'][1]['host'] = 'localhost';
        
        $CONFIG['params']['googleAnalyticsId'] = '';
        $CONFIG['params']['googleAnalyticsDomain'] = '';
        $CONFIG['params']['cdnUrl'] = 'http://local.stream.geeklifeclub.com.br';
        $CONFIG['params']['defaultUrl'] = 'http://local.stream.geeklifeclub.com.br';

        $CONFIG['params']['assetManager'] = array(
                'class' => 'ext.version-asset-manager.VersionAssetManager',
                'baseUrl' => $CONFIG['params']['cdnUrl'] . '/assets'
        );
        
	break;
}