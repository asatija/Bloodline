<?php
//include config
require('includes/config.php'); 
require('top.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Members Page';

?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
        <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Edit Donation Campaign
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
  <p>Please note that you're required to enter the <b>Date-Time</b> and <b>Location</b> values again.</p>        
   <?php
            $campaignID = $_GET['campaignID'];	
              //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT * FROM donationcampaigns where campaignID = '$campaignID'");


while($row = mysqli_fetch_array($result))
{

$campaign_title = $row['campaign_title'];
$campaign_datetime = $row['campaign_datetime'];
$country = $row['country'];
$state = $row['state'];
$city = $row['city'];
$organizer_name = $row['organizer_name'];
$organizer_contact = $row['organizer_contact'];
$comments = $row['comments'];
}


mysqli_close($connect); //if block ends */
?>

<form action="update.php" method="post">
          
          
           <div class="form-group row">
			  
  <label for="campaign_title" class="col-2 col-form-label">Campaign Title</label>
  <div class="col-10">
    <input class="form-control" name="campaign_title" type="text" value="<?php echo $campaign_title; ?>" id="campaign_title">
  </div>
</div>

			<div class="form-group row">
  <label for="campaign_datetime" class="col-2 col-form-label">Campaign Date and time</label>
  <div class="col-10">
    <input class="form-control" name="campaign_datetime" type="datetime-local" value="<?php echo $campaign_datetime; ?>" id="campaign_datetime">
  </div>
</div>
			  
			 
 <div class="form-group row">
   <label for="country" class="col-2 col-form-label">Location</label>
    <div class="form-group col-md-4">
    <select name="country" class="form-control countries order-alpha presel-NZ group-continents group-order-oc continent-include-OC" id="countryId">
    <option value="">Select Country</option>
</select>
    </div>
    <div class="form-group col-md-3">
     <select name="state" class="form-control states order-alpha" id="stateId">
    <option value="">Select State</option>
</select>
    </div>
    <div class="form-group col-md-2">
    <select name="city" class="form-control cities order-alpha" id="cityId">
    <option value="">Select City</option>
</select>
    </div>
  </div> 
  
<div class="form-group row">
 
  <div class="col-10"></div>
</div>
<div class="form-group row"><label for="example-search-input" class="col-2 col-form-label">Organizer's Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $organizer_name; ?>" id="organizer_name" name="organizer_name">
</div>
</div>

<div class="form-group row">
  <label for="organizer_contact" class="col-2 col-form-label">Organizer's Contact No.</label>
  <div class="col-10">
    <input class="form-control" name="organizer_contact" type="tel" value="<?php echo $organizer_contact; ?>" id="organizer_contact">
  </div>
</div>

<div class="form-group row">
    <label for="comments" class="col-2 col-form-label">Any Additional Comments</label>
   	<div class="col-10">
   <textarea class="form-control" name="comments" id="comments" rows="3"><?php echo $comments; ?>"</textarea>
  </div></div>
  
  <div class="col-10">
   <input class="form-control" name="campaignID" type="hidden" value="<?php echo $campaignID; ?>" id="campaignID">
	<input type="submit" value="Add Donation Campaign" name="updatecampaign" id="updatecampaign" class="btn btn-primary">
	</div>



			</form>