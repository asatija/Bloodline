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
      <h1 class="mt-4 mb-3">Deletion confirmation
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
          

<?php 

$requestID = $_GET['requestID'];

    //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
 if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}
    else
    {
        //Do Nothing;
    }

//Execute the query
      
   $sql = "DELETE FROM bloodrequests WHERE bloodrequests.requestID = '$requestID'";

  if (mysqli_query($connect, $sql)) {
    echo "<h3>The entry has been deleted.</h3>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
                echo "";

mysqli_close($connect); //if block ends */
    

?>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php require 'bottom.php'; ?>

