<?php

if(!isset($_SESSION)){
	session_start();
}

define('BASE_URL','http://localhost/openit/module1/');

define('SUB_URL','/openit/module1/index.php/');

$middlewares=[
	'index'    => 'guest',
	'contacts' => 'guest',
	'contact'  => 'guest',
	'login'    => 'logged',
	'logout'   => 'guest',
	'register' => 'logged',
	'send'     => 'guest',
	'profile'  => 'guest',
	'home'     => 'guest'
];

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


$db=DB::getInstance();

/*function autoload($path){
	$files=array_diff(scandir($path), array('.', '..'));
	foreach($files as $file){
		include($path.$file);
	}
}

autoload('classes/');*/