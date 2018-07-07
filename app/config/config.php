<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'     => 'phpMS\Db\Adapter\Pdo\Mssql',
		'host'		=> 'MK-TRINH',                         
		'username'	=> 'sa',                                 
		'password'	=> 'mmttmhh',               
		'dbname'	=> 'phpMS',
		'pdoType'       => 'sqlsrv',
		'dialectClass'	=> 'phpMS\Db\Dialect\Mssql'
	),
	'application' => array(
		'controllersDir'    => __DIR__ . '/../../app/controllers/',
		'modelsDir'         => __DIR__ . '/../../app/models/',
        'formsDir'          => __DIR__ . '/../../app/forms/',
        'viewsDir'          => __DIR__ . '/../../app/views/',
		'pluginsDir'        => __DIR__ . '/../../app/plugins/',
		'libraryDir'        => __DIR__ . '/../../app/lib/',
		'cacheDir'          => __DIR__ . '/../../app/cache/',
		'baseUri'           => '/phpms/',
	)
));
