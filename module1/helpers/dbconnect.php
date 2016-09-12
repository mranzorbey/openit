<?php
	try {
		$db = new PDO('mysql:host=localhost;dbname=openit', 'root', '');
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>