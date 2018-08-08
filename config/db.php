<?php


return [
    // 'class' 	=> 'yii\db\Connection',
	// 'dsn' 		=> 'pgsql:host=192.168.10.7;port=5432;dbname=sga_aprender',
	// 'username' 	=> 'usr_aprender',
	// 'password' 	=> 'A123456a',
	// 'charset' 	=> 'utf8',


	'class' 	=> 'yii\db\Connection',
	'dsn' 		=> 'pgsql:host=localhost;port=5432;dbname=sga_aprender',
	'username' 	=> 'postgres',
	'password' 	=> 'root',
	'charset' 	=> 'utf8',
	// 'schemaMap' => [
					  // 'pgsql'=> [
									// 'class'=>'yii\db\pgsql\Schema',
									// 'defaultSchema' => 'semilleros_tic' //specify your schema here
								  // ]
					// ], // PostgreSQL
	
	
	
	// 'schemaMap' => [
      // 'pgsql'=> [
        // 'class'=>'yii\db\pgsql\Schema',
        // 'defaultSchema' => 'public' //specify your schema here
      // ]
    // ], // PostgreSQL

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];


// return [
    // 'class' => 'yii\db\Connection',
    // 'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    // 'username' => 'root',
    // 'password' => '',
    // 'charset' => 'utf8',

    // // Schema cache options (for production environment)
    // //'enableSchemaCache' => true,
    // //'schemaCacheDuration' => 60,
    // //'schemaCache' => 'cache',
// ];
