<?php
if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION['user_id'])){
	header('Location: index.php');
	exit();
}

if(isset($_POST) && !empty($_POST)){
	$username=stripcslashes($_POST['name']);
	$password=stripcslashes(sha1($_POST['password']));

	require_once('helpers/dbconnect.php');

	$stmt = $db->prepare("SELECT id FROM users WHERE name=? AND password=?");

	$stmt->execute([
		$username, $password
	]);

	if($res=$stmt->fetch(PDO::FETCH_OBJ)){
		$_SESSION['user_id']=$res->id;
		header('Location: index.php');
		exit();
	}else{
		$errors='Invalid login or password!';
	}
}
?>

<?php 
	require_once('layouts/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
        	<?php include_once('layouts/errors.php');?>
            <form class="form-login" action="login.php" method="POST">
	            <h4>Login form</h4>
	            <input type="text" id="userName" name="name" class="form-control input-sm chat-input" placeholder="username" />
	            </br>
	            <input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="password" />
	            </br>
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