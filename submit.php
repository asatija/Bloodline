<?php
//include config
require('includes/config.php'); 
require('top.php');
$username = $_SESSION['username'];

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Members Page';

?>

        <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Request for Blood
        
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

if (!empty($_POST['addcampaign'])) { //This if block will process the form submission of "Add Blood Request page only.
   //create 'Blood Request' variables

$campaign_title = $_POST['campaign_title'];
$campaign_datetime=  $_POST['campaign_datetime'];
$organizer_name = $_POST['organizer_name'];
$organizer_contact = $_POST['organizer_contact'];
$comments = $_POST['comments'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];

echo 'Campaign block working';

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
      
   $sql = "INSERT INTO donationcampaigns(campaignID, username, campaign_title, campaign_datetime, country, state, city, organizer_name, organizer_contact, comments) VALUES ('NULL', '$username', '$campaign_title', '$campaign_datetime', '$country', '$state', '$city', '$organizer_name', '$organizer_contact', '$comments')";

  if (mysqli_query($connect, $sql)) {
    echo "<h3>Blood Donation Campaign has been added.</h3>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
                echo "";

mysqli_close($connect);
    
} //if block ends
            

            
 if (!empty($_POST['addbloodrequest'])) { //This if block will process the form submission of "Add Blood Request page only.
   //create 'Blood Request' variables

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

echo $patient_name;
echo "<br>";
echo $bloodgroup;
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
      
   $sql = "INSERT INTO bloodrequests(requestID, username, patient_name, bloodgroup, patient_condition, blood_datetime, country, state, city, issue, attendant_name, attendant_contact, comments) VALUES ('NULL', '$username', '$patient_name', '$bloodgroup', '$patient_condition', '$blood_datetime', '$country', '$state', '$city', '$issue', '$attendant_name', '$attendant_contact', '$comments')";

  if (mysqli_query($connect, $sql)) {
    echo "<h3>Your request for blood has been added.</h3>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
                echo "";

mysqli_close($connect); //if block ends */
    
} //if block ends
            

if (!empty($_POST['manageprofile'])) { 
//create manageprofile variables

$fname = $_POST['fname'];
$lname =  $_POST['lname'];
$dob = $_POST['dob'];
$bloodgroup = $_POST['bloodgroup'];
$gender = $_POST['gender'];
$member_contact = $_POST['member_contact'];
$bio = $_POST['bio'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];


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
      
    
   $sql = "UPDATE members SET fname='$fname', fname='$fname', lname='$lname', dob='$dob', bloodgroup='$bloodgroup', member_contact='$member_contact', bio='$bio', country='$country', state='$state', city='$city' WHERE members.username='$username'";

  if (mysqli_query($connect, $sql)) {
    echo "<h3>Hi $fname! Thanks for updating your information.</h3>"; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
                echo "";
              

mysqli_close($connect); //if block ends */
} //if block ends

?>
        </div> 
        <!-- /.column -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


 <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

