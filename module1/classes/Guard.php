<?php

class Guard{
	public static function protect($protect){
		if($protect){
			if($protect=='guest'){
				if(!isset($_SESSION['user_id'])){
					header('Location: login');
					exit();
				}
			}else{
				if(isset($_SESSION['user_id'])){
					header('Location: home');
					exit();
				}
			}
		}
	}
}