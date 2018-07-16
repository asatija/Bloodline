<?php
require('top.php');



//if not logged in redirect to login page

if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }



//define page title

$title = 'Members Page';



?>



        <!-- Page Content -->

    <div class="container">



      <!-- Page Heading/Breadcrumbs -->

      <h1 class="mt-4 mb-3">Dashboard

        <small></small>

      </h1>



      <ol class="breadcrumb">

        <li class="breadcrumb-item">

          <a href="index.html">Home</a>

        </li>

        <li class="breadcrumb-item active">About</li>

      </ol>



      <!-- Content Row -->

      <div class="row">

        <!-- Sidebar Column -->

        <?php include('sidebar.php'); ?>

        <!-- Content Column -->

        <div class="col-lg-9 mb-4">

          



<h2>Welcome <?php

echo getUsername(); ?></h2>



			

			

       <?php   echo membergreeting(); ?>



        </div>

      </div>

      <!-- /.row -->



    </div>

    <!-- /.container -->





<?php require 'bottom.php'; ?>



