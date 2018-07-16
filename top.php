<?php
 ob_start();
 session_start(); 
 require 'includes/config.php';
 $username = $_SESSION['username'];
 require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link href="https://fonts.googleapis.com/css?family=Bitter|Dancing+Script:400,700|Stalemate" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bloodline</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="fonts/font-awesome-animation.css" rel="stylesheet">
  
    
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
       <link href="css/custom.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Bloodline</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item"> <a class="nav-link" href="bloodrequests.php">Blood Requests</a> </li>
			<li class="nav-item">
              <a class="nav-link" href="donorlist.php">Donor List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="donationdrives.php">Donation Drives</a>
            </li>
           			  
			  <?php if(!isset($_SESSION['username'])){ ?>
			  <li>
			   <div class="btn-group" role="group" aria-label="Default button group">
    <a href="login.php" type="button" class="btn btn-secondary">Login</a>
    <a href="register.php" type="button" class="btn btn-secondary">Sign Up</a>
</div>
		    </li> <?php } else {?>
			 <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href ="" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hi <?php getUsername(); ?>
              </a>                            
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="memberpage.php">Dashboard</a>
                <a class="dropdown-item" href="faq.php">FAQ</a>
				<a class="dropdown-item" href="logout.php">Logout</a>
              </div>
			  </li>
			<?php } ?>
					  
          </ul>
        </div>
      </div>
    </nav>