<?php
if(isset($_GET) && !empty($_GET['id'])){

	$id=$_GET['id'];

	$contacts=$db->query("SELECT c.* FROM contacts as c INNER JOIN contact_list as c_l ON c.contact_list_id=c_l.id WHERE c_l.id=? AND c_l.user_id=?",[
			$id,
			$_SESSION['user_id']
		])->get();
}else{
	Redirect::to('index');
}

?>

<?php require_once('layouts/header.php');?>

	<table class="table table-stripped">
		<thead>
			<tr>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($contacts as $contact){ ?>
				<tr>
					<td><?= $contact->name?></td>
					<td><?= $contact->surname?></td>
					<td><?= $contact->email?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

<?php require_once('layouts/footer.php');?>

