<?php

	require_once('config/app.php');

	Guard::protect(false);

	if(isset($_POST) && !empty($_POST)){
		$name=stripcslashes($_POST['name']);
		$password=stripcslashes(sha1($_POST['password']));
		$email=stripcslashes($_POST['email']);

		$db->query("INSERT INTO users(name, password, email) VALUES(?,?,?)",[
				$name,
				$password,
				$email
			]);
		Redirect::to('index');
	}

?>

<?php 
	require_once('layouts/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <form class="form-login" action="register.php" method="POST">
	            <h4>Register form</h4>
	            <input type="text" id="userName" name="name" class="form-control input-sm chat-input" placeholder="username" />
	            </br>
	            <input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="password" />
	            </br>
	             <input type="text" id="userEmail" name="email" class="form-control input-sm chat-input" placeholder="email" />
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