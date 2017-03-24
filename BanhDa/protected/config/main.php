<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Banh Da',

	// preloading 'log' component
	'preload'=>array('log'),

	// Set default controller
	'defaultController'=>'homes',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.yii-mail.YiiMailMessage',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/**/
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Anhtuan1990',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('banhda.cu5dcsssg6td.ap-northeast-1.rds.amazonaws.com','::1'),
		),
		/**/
	),

	// application components
	//admin/Anhtuan1990
	'components'=>array(
		'user'=>array(
            'loginUrl'=>array('admin/login'),
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		//send mail contact
		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType'=>'smtp',
			'transportOptions'=>array(
				'host'=>'smtp.gmail.com',
				'username'=>'seo.top1.223',
				'password'=>'seotop123',
				'port'=>'465',
				'encryption'=>'ssl',
			),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
     		/*'caseSensitive'=>false,*/
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=banhda.cu5dcsssg6td.ap-northeast-1.rds.amazonaws.com;dbname=banhda',
			'emulatePrepare' => true,
			'username' => 'awsuser_root',
			'password' => '12345678',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'admin/error',
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
		'adminEmail'=>'tuananh105@gmail.com',
	),
);
