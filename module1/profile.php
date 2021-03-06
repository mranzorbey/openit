<?php

if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['user_id'])){
	header('Location: index.php');
	exit();
}

require_once('helpers/dbconnect.php');

if(isset($_POST) && !empty($_POST)){
	$name=stripcslashes($_POST['name']);
	if(!empty($_POST['password'])){
		$password=stripcslashes(sha1($_POST['password']));
	}
	$email=stripcslashes($_POST['email']);

	$sql="UPDATE users SET name=?, email=? ";
	if(isset($password)){
		$sql.=", password=?";
	}

	$stmt=$db->prepare($sql);

	$updateVars=[$name,$email];
	if(isset($password)){
		$updateVars[]=$password;
	}

	$stmt->execute($updateVars);

	header('Location: profile.php');
	exit();
}

$stmt=$db->prepare("SELECT name,password,email FROM users WHERE id=?");
$stmt->execute([
	$_SESSION['user_id']
]);

$user=$stmt->fetch(PDO::FETCH_OBJ);
?>
<?php 
	require_once('layouts/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3 col-sm-5">
            <form class="form-login" action="register.php" method="POST">
	            <h4>Change profile</h4>
	            <div class="form-group">
	            	<label for="userName">Имя</label>
	            	<input type="text" id="userName" name="name" class="form-control input-sm chat-input" placeholder="username" value="<?= $user->name?>"/>
	            </div>
	            <div class="form-group">
	            	<label for="userPassword">Пароль</label>
	            	<input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="new password"/>
	            </div>
	            <div class="form-group">
	            	<label for="userEmail">Email</label>
	             	<input type="text" id="userEmail" name="email" class="form-control input-sm chat-input" placeholder="email" value="<?= $user->email?>" />
	            </div>
	            <div class="wrapper">
		            <span class="group-btn">     
		                <button href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
		            </span>
	            </div>
            </form>
        
        </div>
    </div>
</div>

<?php 
	require_once('layouts/footer.php');
?>

