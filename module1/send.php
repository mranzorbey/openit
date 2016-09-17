<?php 
require_once('config/app.php');

Guard::protect();

if(isset($_POST) && !empty($_POST)){
	$contacts=stripcslashes($_POST['contacts']);
	$title=stripcslashes($_POST['title']);
	$desc=stripcslashes($_POST['desc']);
	
}

?>

<?php require_once('layouts/header.php');?>
	<form action="send.php" method="POST">
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<div class="contacts">
					<div class="form-group">
						<label for="">Список рассылки</label>
						<input type="text" class="form-control">
					</div>
					<button class="btn btn-default">Добавить</button>
					<ul class="list-group"></ul>
				</div>
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