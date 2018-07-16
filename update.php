<?php
//include config
require('includes/config.php'); 
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

if (!empty($_POST['updatebloodrequest'])) { 
//This if block will process the form submission of "Update Blood Request" page only.

$requestID = $_POST['requestID'];

$patient_name = $_POST['patient_name'];
$issue=  $_POST['issue'];
$patient_condition = $_POST['patient_condition'];
$blood_datetime = $_POST['blood_datetime'];
$bloodgroup = $_POST['bloodgroup'];
$attendant_name = $_POST['attendant_name'];
$attendant_contact= $_POST['attendant_contact'];
$comments = $_POST['comments'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$comments = $_POST['comments'];
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
      
   $sql = "UPDATE bloodrequests SET patient_name = '$patient_name', bloodgroup = '$bloodgroup', patient_condition = '$patient_condition', blood_datetime = '$blood_datetime', country = '$country', state = '$state', city = '$city', issue = '$issue', attendant_name = '$attendant_name', attendant_contact = '$attendant_contact', comments = '$comments' WHERE bloodrequests.requestID = '$requestID'";

  if (mysqli_query($connect, $sql)) {
    echo "<h3>Your request has been updated.</h3>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
                echo "";

mysqli_close($connect); //if block ends */
    
} //if block ends



if (!empty($_POST['updatecampaign'])) { 
//This if block will process the form submission of "Update Campaign" page only.
 
$campaignID = $_POST['campaignID'];
echo $campaignID;


$campaign_title = $_POST['campaign_title'];
$campaign_datetime = $_POST['campaign_datetime'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$organizer_name = $_POST['organizer_name'];
$organizer_contact = $_POST['organizer_contact'];
$comments = $_POST['comments'];

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
      
   $sql = "UPDATE donationcampaigns SET campaign_title = '$campaign_title', campaign_datetime = '$campaign_datetime', country = '$country', state = '$state', city = '$city', organizer_name = '$organizer_name', organizer_contact = '$organizer_contact', comments = '$comments' WHERE donationcampaigns.campaignID = '$campaignID'";

  if (mysqli_query($connect, $sql)) {
    echo "<h3>The campaign info has been updated.</h3>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
                echo "";

mysqli_close($connect); //if block ends */
   
} 


?>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php require 'bottom.php'; ?>

