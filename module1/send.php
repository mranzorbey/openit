﻿<?php 
require_once('helpers/protect_from_guest.php');

require_once('helpers/setsession.php');

if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
	exit();
}

if(isset($_POST) && !empty($_POST)){
	$contacts=stripcslashes($_POST['contacts']);
	$title=stripcslashes($_POST['title']);
	$desc=stripcslashes($_POST['desc']);
	
}

?>

<?php require_once('layouts/header.php');?>
	<form action="" method="POST">
		<div class="row">
			<div class="col-sm-4 col-md-4">
				
			</div>
			<div class="col-sm-8 col-md-8">
				<div class="form-group">
					<label for="title">Название</label>
					<input type="text" name="title" id="title" class="form-control" />
				</div>
				<div class="form-group">
					<label for="desc">Описание</label>
					<textarea name="desc" id="desc" class="form-control" /></textarea>
				</div>
			</div>
		</div>
		<button class="btn btn-default right">Отправить</button>
	</form>

<?php require_once('layouts/footer.php');?>