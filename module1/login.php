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
	$password=stripcslashes($_POST['password']);

	try {
		$db = new PDO('mysql:host=localhost;dbname=openit', 'root', '');
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	$res = $db->query("SELECT * FROM users");

	if($username=='azamat' && $password=='asd'){
		$_SESSION['user_id']=1;
		header('Location: index.php');
		exit();
	}else{
		$error='Invalid login or password!';
		require_once('layouts/errors.php');
	}
}
?>

<?php 
	require_once('layouts/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
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