<?php
/ Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
 $loader->registerNamespaces(
		array(
            "phpMS\Controllers"     => $config->application->controllersDir,
            "phpMS\Models"          => $config->application->modelsDir,
			"phpMS\Db\Adapter\Pdo"  => APP_PATH."/lib/db/adapter/",
			"phpMS\Db\Dialect"      => APP_PATH."/lib/db/dialect/"
			)
    	)->register();