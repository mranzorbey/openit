<?php 
require_once('helpers/protect_from_guest.php');

require_once('helpers/setsession.php');

require_once('helpers/dbconnect.php');

if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
	exit();
}

if(isset($_POST) && !empty($_POST)){
	$contact_list_id=stripcslashes($_POST['contact_list_id']);
	$title=stripcslashes($_POST['title']);
	$desc=stripcslashes($_POST['desc']);


	$stmt=$db->prepare("SELECT email from contacts WHERE contact_list_id=?");

	$stmt->execute([
		$contact_list_id
	]);

	$contacts=[];
	while($contact=$stmt->fetch(PDO::FETCH_OBJ)){
		$contacts[]=$contact;
	}

	$stmt=$db->prepare("INSERT INTO sent_emails(contact_id,event_date,status) VALUES(?,?,?)");

	foreach($contacts as $contact){
		$values=[
			$contact->id,
			time()
		];
		if(mail($contact->email,$title,$desc)){
			$values[]='S';
		}else{
			$values[]='NS';
		}
		$stmt->execute($values);
	}

	/*$emails=join(",",array_map(function($elem){
		return $elem->email;
	}, $contacts));


 
	if(mail($emails,$title,$desc)){
		die('pk');
	}else{
		die('n ');
	}*/


}

$stmt=$db->prepare("SELECT * from contact_list WHERE user_id=?");
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
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label for="contact_list_id">Список контактов</label>
					<select name="contact_list_id" id="contact_list_id" class="form-control">
						<?php foreach($contact_lists as $contact_list){?>
							<option value="<?= $contact_list->id?>"><?= $contact_list->name?></option>
						<?php } ?>
					</select>
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