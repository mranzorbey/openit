<?php 
	require_once('config/app.php');

	Guard::protect();

	session_destroy();

	Redirect::to('index');