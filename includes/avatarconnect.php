<?php

	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "root");
	define("DB_NAME", "avatartrack");
	
	/*define("DB_SERVER", "localhost");
	define("DB_USER", "soarscom_avadb");
	define("DB_PASSWORD", "+%[T~K,UCUfI");
	define("DB_NAME", "soarscom_avatrack");*/
	
	$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	if($db -> connect_errno > 0) {
		die("Unable to connect to database [" . $db -> connect_error . "]");
	}
	
	
	