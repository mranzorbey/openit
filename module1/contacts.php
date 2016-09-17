<?php
Guard::protect();

if(isset($_POST) && !empty($_POST)){
	$name=stripcslashes($_POST['name']);
	$db->query("INSERT INTO contact_list(name,user_id) VALUES(?,?)",[
		$name,
		$_SESSION['user_id']
	]);
}

$contact_lists=$db->query("SELECT c.* FROM contact_list as c INNER JOIN users as u ON u.id=c.user_id AND u.id=?",[
		$_SESSION['user_id']
	 ])->get();
?>

<?php require_once('layouts/header.php');?>

	<form action="" method="POST">
		<div class="form-group">
			<label for="">Название</label>
			<input type="text" name="name" class="form-control" />
		</div>
		<div class="form-group">
			<button class="btn btn-default">Добавить</button>
		</div>
	</form>
	<table class="table table-stripped">
		<thead>
			<tr>
				<th>Название</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($contact_lists as $contact_list){ ?>
				<tr>
					<td><?= $contact_list->name?></td>
					<td><a href="contact?id=<?= $contact_list->id?>">Перейти</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

<?php require_once('layouts/footer.php');?>