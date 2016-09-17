<?php
require_once('config/app.php');

if(Session::guest()){
	require_once 'login.php';
}

if(file_exists($requested_file=str_replace(SUB_URL,'',strtok($_SERVER['REQUEST_URI'],'?').'.php'))) {
	require_once $requested_file;
}else{
	require_once '404.php';
}