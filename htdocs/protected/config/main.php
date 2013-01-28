<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'hackits',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*', //user management
        'ext.giix.components.*', //giix code gen
    ),

	'modules'=>array(
        'user' => array(
            'debug' => false,
            'userTable' => 'de9f8caa_user',
            'translationTable' => 'de9f8caa_translation',
        ),
        'usergroup' => array(
            'usergroupTable' => 'de9f8caa_usergroup',
            'usergroupMessageTable' => 'de9f8caa_user_group_message',
        ),
        'membership' => array(
            'membershipTable' => 'de9f8caa_membership',
            'paymentTable' => 'de9f8caa_payment',
        ),
        'friendship' => array(
            'friendshipTable' => 'de9f8caa_friendship',
        ),
        'profile' => array(
            'privacySettingTable' => 'de9f8caa_privacysetting',
            'profileFieldTable' => 'de9f8caa_profile_field',
            'profileTable' => 'de9f8caa_profile',
            'profileCommentTable' => 'de9f8caa_profile_comment',
            'profileVisitTable' => 'de9f8caa_profile_visit',
        ),
        'role' => array(
            'roleTable' => 'de9f8caa_role',
            'userRoleTable' => 'de9f8caa_user_role',
            'actionTable' => 'de9f8caa_action',
            'permissionTable' => 'de9f8caa_permission',
        ),
        'message' => array(
            'messageTable' => 'de9f8caa_message',
        ),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'hackits',/*CHANGEME_IN_PROD*/
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('10.1.1.33','127.0.0.1','::1'),
            'generatorPaths' => array(
                'ext.giix.generators', // giix generators
            ),
        ),
	),

	// application components
	'components'=>array(
        'cache' => array('class' => 'system.caching.CDummyCache'), /*CHANGEME_IN_PROD*/
//        'cache' => array('class' => 'system.caching.CFileCache'),
        'user'=>array(
            'class' => 'application.modules.user.components.YumWebUser',
            'loginUrl' => array('//user/user/login'),
            // enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
            'caseSensitive' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=hackits',
			'emulatePrepare' => true,
			'username' => 'hackits',
			'password' => 'hackits',/*CHANGEME_IN_PROD*/
            'schemaCachingDuration' => 0,/*CHANGEME_IN_PROD*/
			'charset' => 'utf8',
            'tablePrefix' => 'de9f8caa_',
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
        'messages' => array (
            // Pending on core: http://code.google.com/p/yii/issues/detail?id=2624
            'extensionBasePaths' => array(
                'giix' => 'ext.giix.messages', // giix messages directory.
            ),
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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
