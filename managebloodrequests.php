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
      <h1 class="mt-4 mb-3">Manage Blood Requests
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
		
            $username = $_SESSION['username'];
              //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT * FROM bloodrequests WHERE username = '$username' ORDER BY date_published DESC");

echo "<table class='table table-list-search'>
<thead>
<tr>
<th>Request ID</th>
<th>Date (when required)</th>
<th>Condition</th>
<th>Action</th>



</tr>
</thead>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" .  $row['requestID'] . "</td>";
echo "<td>" . date('F d, Y', strtotime($row['blood_datetime']))  . "</td>";
echo "<td>" . $row['patient_condition'] . "</td>";
echo "<td>";
echo managebloodrequests($row['requestID']);
echo "</td>" ;

echo "</tr>";
}
echo "</table>";


mysqli_close($connect); //if block ends */
 ?>

          </div>

         

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php require 'bottom.php'; ?>

