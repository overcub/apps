<?php

require_once(dirname(__FILE__).'/init.php');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'theme'=>'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	'sourceLanguage'    =>'en-us',
	'language'          =>'pt-br',
    
	'preload'=>array(
		'log',
		php_sapi_name() !== 'cli' ?'bootstrap': '',
	    php_sapi_name() !== 'cli' ?'yii-sharre': ''
	),

	'onBeginRequest' => create_function('$event', 'return ob_start("ob_gzhandler");'),
	'onEndRequest' => create_function('$event', 'return ob_end_flush();'),


	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			'generatorPaths'=>array(
					'bootstrap.gii',
			),
			'ipFilters'=>array('*','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			//'allowAutoLogin'=>true,
			//'loginUrl'=>array('loginYii'),
		),
		'clientScript' => array (
			'packages' => array (
				'jquery' => array (
					'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/',
					'js' => array (
						'jquery.min.js'
					)
				)
			)
		),
		/*'session'=>array(
				'class'=>'CDbHttpSession',
				'autoStart'=>true,
				'connectionID'=>'db',
				'sessionTableName'=>'Yii_Session',
				'useTransparentSessionID'=>true,
				'cookieMode'=>'only'
		),
        'fileCache' => array(
                'class' => 'CFileCache',
        ),
        'apcCache' => array(
                'class' => 'CApcCache',
        ),
        'memCache' => array(
            'class'=>'system.caching.CMemCache',
			'servers'=>array(
					array('host'=>$CONFIG['cache'][1]['host'], 'port'=>11211),
			),
        ),
        */
		'cache' => array(
				'class'=>'system.caching.CMemCache',
				'servers'=>array(
						array('host'=>$CONFIG['cache'][1]['host'], 'port'=>11211),
				),
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
	        'showScriptName' => false, // do not show "index.php" in URLs
	        'appendParams' => false,

			'rules' => array(

				'gii'=>'gii',
				'gii/<controller:\w+>'=>'gii/<controller>',
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

				'sobre'=>'Site/about',
				'streamer/'=>'Streamers/streamer',
				'streamer/<nickname>'=>'Streamers/streaming',
				
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
        'db'=>array(
                'connectionString' => $CONFIG['database'][1]['connectionString'],
                'emulatePrepare' => true,
                'username' =>  $CONFIG['database'][1]['username'],
                'password' =>  $CONFIG['database'][1]['password'],
                'charset' => 'utf8',
                'schemaCachingDuration' => 3600,
                'schemaCacheID' => 'cache',
        ),
        'db2'=>array(
                'connectionString' => $CONFIG['database'][2]['connectionString'],
                'emulatePrepare' => true,
                'username' =>  $CONFIG['database'][2]['username'],
                'password' =>  $CONFIG['database'][2]['password'],
                'charset' => 'utf8',
                'schemaCachingDuration' => 3600,
                'schemaCacheID' => 'cache',
                'class' => 'CDbConnection'
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	   'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		'yii-sharre'=>array(
				'class'=>'ext.yii-sharrre.components.Sharrre',
				'coreCss'=>true,
		),
		'assetManager' => $CONFIG['params']['assetManager'],
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'googleAnalyticsId'=>$CONFIG['params']['googleAnalyticsId'],
		'googleAnalyticsDomain'=>$CONFIG['params']['googleAnalyticsDomain'],
		'contactEmail'=>'atendimento@geeklifeclub.com.br',
		'adminEmail'=>'atendimento@geeklifeclub.com.br',
		'defaultUrl'=>$CONFIG['params']['defaultUrl'],
        'cdnUrl'=>$CONFIG['params']['cdnUrl'],
	    'legacyUrl'=>'',
        'defaultIeVersion'=> 1,
        'customScriptDir'=>'tools',
	    'encryptionKey'=>'997GLC97',
	    'mashapeKey'=> array('LOL' =>'MWDMOJlVh625v8o0365WsPn9A3rVmf7J'),
	    'version'=>'1',
	),
);