<?php
require_once('config/app.php');



if(file_exists($requested_file=str_replace(SUB_URL,'',strtok($_SERVER['REQUEST_URI'],'?').'.php'))) {
	$protect=isset($middlewares[str_replace('.php','',$requested_file)]) ? $middlewares[str_replace('.php','',$requested_file)] : null;
	Guard::protect($protect);
	require_once $requested_file;
}else{
	require_once '404.php';
}