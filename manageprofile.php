<?php
//include config
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
      <h1 class="mt-4 mb-3">Manage Profile</h1>

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
         <?php $username = $_SESSION['username']; 
		   //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
   if(mysqli_connect_errno($connect))
  {
		  echo 'Failed to connect';
  }
	  else
	  {
		  
  
  //Execute the query
		
	  
	 $sql = "SELECT * FROM members WHERE members.username = '$username'";
  $result = mysqli_query($connect, $sql);
  
  if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		  $fname = $row["fname"];
		  $lname = $row["lname"];
  		  $dob = $row["dob"];
   		  $bloodgroup = $row["bloodgroup"];
		  $gender = $row["gender"];
		  $country = $row["country"];
		  $state = $row["state"];
		  $city = $row["city"];
		  $member_contact = $row["member_contact"];
		  $bio = $row["bio"];
		  $email = $row["email"];
		  
	  }
	  
  }
  
  mysqli_close($connect); //if block ends */
  } //if block ends
		 
		  ?>

          <form action="submit.php" method="post">
          
          
           <div class="form-group row">
			  
  <label for="fname" class="col-2 col-form-label">First Name</label>
  <div class="col-10">
    <input class="form-control" name="fname" type="text" value="<?php echo $fname; ?>" id="fname">
  </div>
</div>

   <div class="form-group row"> 
  <label for="lname" class="col-2 col-form-label">Last Name</label>
  <div class="col-10">
    <input class="form-control" name="lname" type="text" value="<?php echo $lname; ?>" id="lname">
  </div>
</div>
			<div class="form-group row">
  <label for="dob" class="col-2 col-form-label">Date of Birth</label>
  <div class="col-10">
    <input class="form-control" name="dob" type="date" <?php echo $dob; ?> id="dob">
  </div>
</div>

<div class="form-group row">
    <label for="bloodgroup" class="col-2 col-form-label">Blood Group</label>
   <div class="col-10"> 
   <select class="form-control" id="bloodgroup" name="bloodgroup">
    <option><?php echo $bloodgroup; ?></option>
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
    <label for="gender" class="col-2 col-form-label">Gender</label>
   <div class="col-10"> 
   <select class="form-control" id="gender" name="gender">
    <option><?php echo $gender; ?></option>
       <option disabled>Select from below list</option>
      <option>Female</option>
      <option>Male</option>
      <option>Prefer not to specify</option>
    </select>
  </div>	
  </div>	  

      
    
   
   <div class="form-group row">
   <label for="country" class="col-2 col-form-label">Location</label>
    <div class="form-group col-md-4">
    <select name="country"  class="form-control countries order-alpha presel-NZ group-continents group-order-oc continent-include-OC" id="countryId">
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
  <label for="member_contact" class="col-2 col-form-label">Contact No.</label>
  <div class="col-10">
    <input class="form-control" name="member_contact" type="tel" value="<?php echo $member_contact; ?>" id="member_contact">
  </div>
</div>
<div class="form-group row">
    <label for="bio" class="col-2 col-form-label">Bio</label>   	<div class="col-10">
   <textarea class="form-control" name="bio" id="comments" rows="3"><?php echo $bio; ?></textarea>
  </div></div>
  
  <div class="col-10">
	<input type="submit" id="manageprofile" name="manageprofile" value="Update Profile" class="btn btn-primary">
	</div>


			</form>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php require 'bottom.php'; ?>