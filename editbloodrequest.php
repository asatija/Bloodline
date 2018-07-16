<?php
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
      <h1 class="mt-4 mb-3">Edit Blood Request
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
            $requestID = $_GET['requestID'];			
              //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT * FROM bloodrequests where requestID = '$requestID'");


while($row = mysqli_fetch_array($result))
{
$patient_name = $row['patient_name'];
$bloodgroup = $row['bloodgroup'];
$issue = $row['issue'];
$patient_condition = $row['patient_condition'];
$blood_datetime = $row['blood_datetime'];
$country = $row['country'];
$state = $row['state'];
$city = $row['city'];
$attendant_name = $row['attendant_name'];
$attendant_contact = $row['attendant_contact'];
$comments = $row['comments'];

}


mysqli_close($connect); //if block ends 
 ?>

          <form action="update.php" method="post">
          
          
           <div class="form-group row">
			  
  <label for="patient_name" class="col-2 col-form-label">Patient Name</label>
  <div class="col-10">
    <input class="form-control" name="patient_name" type="text" value="<?php echo $patient_name?>" id="patient_name">
  </div>
</div>

<div class="form-group row">
    <label for="bloodgroup" class="col-2 col-form-label">Blood Group</label>
   <div class="col-10"> 
   <select class="form-control" id="bloodgroup" name="bloodgroup">
      <option><?php echo $bloodgroup?></option>
       <option disabled>Select from below list</option>
      <option>A+</option>
      <option>B+</option>
      <option>AB+</option>
      <option>O+</option>
      <option>O-</option>
    </select>
  </div>	
  </div>
  
  <div class="form-group row">
    <label for="patient_condition" class="col-2 col-form-label">Condition of patient</label>
   <div class="col-10"> 
   <select name="patient_condition" size="1" class="form-control" id="patient_condition">
       <option><?php echo $patient_condition?></option>
       <option disabled>Select from below list</option>
      <option>Stable</option>
      <option>Serious</option>
      <option>Critical</option>
    </select>
  </div>	
  </div>
  
			<div class="form-group row">
  <label for="blood_datetime" class="col-2 col-form-label">Date and time (when required)</label> 
<div class="col-10">
    <input class="form-control" name="blood_datetime" type="datetime-local" value="<?php echo $blood_datetime ?>" id="blood_datetime">
  </div>
</div>
			  
			 
 <div class="form-group row">
   <label for="country" class="col-2 col-form-label">Location</label>
    <div class="form-group col-md-4">
    <select name="country" class="form-control countries order-alpha presel-NZ group-continents group-order-oc continent-include-OC" id="countryId">
    <option value="<?php echo $country; ?>"></option>
    <option value="">Select Country</option>
</select>
    </div>
    <div class="form-group col-md-3">
     <select name="state" class="form-control states order-alpha" id="stateId">
    <option value="<?php echo $state; ?>"></option>
    <option value="">Select State</option>
</select>
    </div>
    <div class="form-group col-md-2">
    <select name="city" class="form-control cities order-alpha" id="cityId">
      <option value="<?php echo $city; ?>"></option>
    <option value="">Select City</option>
</select>
    </div>
  </div> 

<div class="form-group row">
  <label for="issue" class="col-2 col-form-label">Issue</label>
  <div class="col-10">
    <input class="form-control" name="issue" value="<?php echo $issue; ?>" type="text" id="issue">
  </div>
</div>


<div class="form-group row">
 
  <div class="col-10"></div>
</div>
<div class="form-group row">
  <label for="attendant_name" class="col-2 col-form-label">Attendant Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $attendant_name; ?>" id="attendant_name" name="attendant_name">
</div>
</div>

<div class="form-group row">
  <label for="attendant_contact" class="col-2 col-form-label">Attendant's Contact No.</label>
  <div class="col-10">
    <input class="form-control" name="attendant_contact" type="tel" value="<?php echo $attendant_contact; ?>" id="attendant_contact">
  </div>
</div>

<div class="form-group row">
    <label for="comments" class="col-2 col-form-label">Any Additional Comments</label>
   	<div class="col-10">
   <textarea class="form-control" name="comments" value="" id="comments" rows="3"><?php echo $comments; ?></textarea>
  </div></div>
  <input class="form-control" name="requestID" type="hidden" value="<?php echo $requestID; ?>" id="requestID">
  
  <div class="col-10">
	<input type="submit" id="updatebloodrequest" name="updatebloodrequest" value="Update Blood Request" class="btn btn-primary" onclick="">
	</div>



			</form>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php require 'bottom.php'; ?>

