<!doctype html>
<html>
	<head>
		<title>
			Chimpkiller
		</title>
		<link rel="stylesheet" href="public/css/bootstrap.min.css"/>

		  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
	</head>
	<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Logo</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home</a></li>
	        <li><a href="#">About</a></li>
	        <li><a href="#">Projects</a></li>
	        <li><a href="#">Contact</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php if(isset($_SESSION['user_id'])){?>
	        	<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	        <?php } else { ?>
	        	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	        	<li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
	        <?php } ?>
	      </ul>
	    </div>
	  </div>
	</nav>

	<?php if(isset($_SESSION['user_id'])){?>
		<div class="container-fluid text-center">
		  <div class="row content">
		    <div class="col-sm-2 sidenav">
		      <p><a href="profile.php">Profile</a></p>
		      <p><a href="#">Link</a></p>
		      <p><a href="#">Link</a></p>
		    </div>
		    <div class="col-sm-8 text-left">
	<?php } ?>