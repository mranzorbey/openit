<?php

require_once('helpers/protect_from_guest.php');

require_once('helpers/dbconnect.php');

if($_SERVER['REQUEST_METHOD']==='DELETE'){
	$id=$_REQUEST['id'];
	$stmt=$db->prepare("DELETE FROM contact_list WHERE id=?");
	$stmt->execute([
		$id
	]);
}else if(isset($_POST) && !empty($_POST)){
	$name=stripcslashes($_POST['name']);

	$stmt=$db->prepare("INSERT INTO contact_list(name,user_id) VALUES(?,?)");

	$stmt->execute([
		$name,
		$_SESSION['user_id']
	]);
}


$stmt=$db->prepare("SELECT c.* FROM contact_list as c INNER JOIN users as u ON u.id=c.user_id AND u.id=?");

$stmt->execute([
	$_SESSION['user_id']
]);

$contact_lists=[];
while($contact_list=$stmt->fetch(PDO::FETCH_OBJ)){
	$contact_lists[]=$contact_list;
}

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
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($contact_lists as $contact_list){ ?>
				<tr>
					<td><?= $contact_list->name?></td>
					<td><a href="contact.php?id=<?= $contact_list->id?>">Перейти</a></td>
					<td>
						<form action="" method="DELETE">
							<input type="hidden" name="_METHOD" value="DELETE" />
							<input type="hidden" name="id" value="<?= $contact_list->id?>" />
							<button class="btn btn-warning">Удалить</button>
						</form>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

<?php require_once('layouts/footer.php');?>