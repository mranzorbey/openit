<?php
if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION['user_id'])){
	header("Location: login.php");
	exit();
}

require_once('helpers/dbconnect.php');

$stmt=$db->prepare("SELECT name, email FROM users WHERE id= ? ");

$stmt->execute([
	$_SESSION['user_id']
]);

$user=$stmt->fetch(PDO::FETCH_OBJ);

?>

<?php require_once('layouts/header.php');?>
      <h1>Welcome <?= $user->name; ?></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      <h3>Test</h3>
      <p>Lorem ipsum...</p>
<?php require_once('layouts/footer.php');?>

