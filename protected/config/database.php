<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=10.0.1.152;dbname=rabbits',
	'emulatePrepare' => true,
	'username' => 'kroliki',
	'password' => 'krol',
	'charset' => 'utf8',

	'enableProfiling'=>true, // включаем профайлинг
	'enableParamLogging'=>true, // показываем значения параметров
);