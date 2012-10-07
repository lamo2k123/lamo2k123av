<?php

return array(
    'basePath'  => dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '..',
    'name'      => 'My Web Application',
    'language'  => 'ru',
    'preload'   => array( 'log' ),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    'modules'=>array(

        // Авторизация через сервисы и соц.сети (HybridAuth)
        'hybridauth' => array(
            'baseUrl'       => 'http://'. $_SERVER['SERVER_NAME'] . '/hybridauth',
            'withYiiUser'   => false,
            "providers"     => array (
                "openid" => array (
                    "enabled" => true
                ),

                "Yahoo" => array (
                    "enabled" => true
                ),

                "Google" => array (
                    "enabled" => true,
                    "keys"    => array ( "id" => "896866043671.apps.googleusercontent.com", "secret" => "IueGA0GtqqC06EJWY5eMTJb5" ),
                    "scope"   => ""
                ),

                "Facebook" => array (
                    "enabled" => true,
                    "keys"    => array ( "id" => "", "secret" => "" ),
                    "scope"   => "email,publish_stream",
                    "display" => ""
                ),

                "Twitter" => array (
                    "enabled" => true,
                    "keys"    => array ( "key" => "gxKeYAyeWJBvgjofxVZCUQ", "secret" => "VXne0lwW1gFJDN0RE23iZfznSMPZXYVKS8rBlwCWiA" )
                )
            )
        ),

                          /*
        'gii' => array(
            'class'     => 'system.gii.GiiModule',
            'password'  => 'lamo2k123',
            'ipFilters' => array( '127.0.0.1', '::1' ),
        ),                  */

    ),

    // application components
    'components'=>array(

        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),

        // Сединение с базой данных MySQL
        'db' => array(
            'connectionString'      => 'mysql:host=localhost;port=3306;dbname=l2k',
            'username'              => 'root',
            'password'              => '',
            'emulatePrepare'        => true,
            'charset'               => 'utf8',
            'schemaCachingDuration' => 108000,
            'tablePrefix'           => 'tbl_',
            'enableProfiling'       => true,
            'enableParamLogging'    => true,
        ),

        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                /*
                    'post/<id:\d+>/<title:.*?>'=>'post/view',
                    'posts/<tag:.*?>'=>'post/index',
                */
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        // uncomment the following to enable URLs in path-format
        /*
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        */


        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),

        'log' => array(
            'class'     => 'CLogRouter',
            'enabled'   => YII_DEBUG,
            'routes'    => array(

                array(
                    'class'     => 'CFileLogRoute',
                    'levels'    => 'error, warning',
                ),

                array(
                    'class'     => 'application.modules.core.extensions.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array( '127.0.0.1' ),
                ),

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