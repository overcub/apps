<?php

DEFINE('AMBIENT_AIR',1);
DEFINE('AMBIENT_LOCAL',2);
$CONFIG = array();
$ambient = AMBIENT_AIR;

switch($ambient){
    case AMBIENT_AIR:
        $CONFIG['database'][1]['connectionString'] = 'mysql:host=192.241.128.122;dbname=apps.geeklifeclub';
        $CONFIG['database'][1]['username'] = 'geeklifeclub';
        $CONFIG['database'][1]['password'] = 'geeklifeclubaabc33163356';
        $CONFIG['database'][2]['connectionString'] = 'mysql:host=192.241.128.122;dbname=apps.geeklifeclub';
        $CONFIG['database'][2]['username'] = 'geeklifeclub';
        $CONFIG['database'][2]['password'] = 'geeklifeclubaabc33163356';
        
        $CONFIG['cache'][1]['host'] = 'localhost';
        
        $CONFIG['params']['googleAnalyticsGroupId'] = 'UA-41242860-3';
        $CONFIG['params']['googleAnalyticsId'] = 'UA-41242860-2';
        $CONFIG['params']['googleAnalyticsDomain'] = 'manete.tv';
        $CONFIG['params']['cdnUrl'] = 'http://manete.tv';
        $CONFIG['params']['defaultUrl'] = 'http://manete.tv';

        $CONFIG['params']['assetManager'] = array(
        		'class' => 'ext.version-asset-manager.VersionAssetManager',
        		'baseUrl' => $CONFIG['params']['cdnUrl'] . '/assets'
        );

    break;

    case AMBIENT_LOCAL:
        $CONFIG['database'][1]['connectionString'] = 'mysql:host=192.168.1.102;dbname=apps.geeklifeclub';
        $CONFIG['database'][1]['username'] = 'geeklifeclub';
        $CONFIG['database'][1]['password'] = 'geeklifeclubaabc33163356';
        $CONFIG['database'][2]['connectionString'] = 'mysql:host=192.168.1.102;dbname=apps.geeklifeclub';
        $CONFIG['database'][2]['username'] = 'geeklifeclub';
        $CONFIG['database'][2]['password'] = 'geeklifeclubaabc33163356';
        
        $CONFIG['cache'][1]['host'] = 'localhost';
        
        $CONFIG['params']['googleAnalyticsGroupId'] = '';
        $CONFIG['params']['googleAnalyticsId'] = '';
        $CONFIG['params']['googleAnalyticsDomain'] = '';
        $CONFIG['params']['cdnUrl'] = 'http://local.manete.tv';
        $CONFIG['params']['defaultUrl'] = 'http://local.manete.tv';

        $CONFIG['params']['assetManager'] = array(
                'class' => 'ext.version-asset-manager.VersionAssetManager',
                'baseUrl' => $CONFIG['params']['cdnUrl'] . '/assets'
        );
        
	break;
}
