<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=10.80.7.130;dbname=rabbits',
	'emulatePrepare' => true,
	'username' => 'kroliki',
	'password' => 'krol',
	'charset' => 'utf8',

	'enableProfiling'=>true, // �������� ����������
	'enableParamLogging'=>true, // ���������� �������� ����������
);