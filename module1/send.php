<?php 
	
if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
	exit();
}

if(isset($_POST) && !empty($_POST)){
	$contacts=$_POST['contacts'];
	print_r($contacts);
	die();
}

?>

<?php require_once('layouts/header.php');?>
	<form action="send.php" method="POST">
		<div class="contacts">
			<input type="text" class="form-control">
			<button class="btn btn-default">Добавить</button>
			<ul class="list-group"></ul>
		</div>
		<button class="btn btn-default">Отправить</button>
	</form>

<?php require_once('layouts/footer.php');?>