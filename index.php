<?php

$webRoot = dirname( __FILE__ );

if( getenv( 'AppMode' ) ) {

    defined( 'YII_DEBUG' ) || define( 'YII_DEBUG', true );
    defined( 'YII_TRACE_LEVEL' ) || define( 'YII_TRACE_LEVEL', 3 );

    require_once( $webRoot . '/../framework/yii.php' );
    Yii::createWebApplication( $webRoot . '/protected/config/development.php' )->run();

} else {

    defined( 'YII_DEBUG' ) || define( 'YII_DEBUG', false );

    require_once( $webRoot . '/../framework/yii.php' );
    Yii::createWebApplication( $webRoot . '/protected/config/production.php' )->run();

}
