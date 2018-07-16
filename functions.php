  <?php 
   
    function getUsername() {
	    $username = $_SESSION['username'];
	 
   //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
   if(mysqli_connect_errno($connect))
  {
		  echo 'Failed to connect';
  }
	  else
	  {
		  
  
  //Execute the query
		
	  
	 $sql = "SELECT fname FROM members WHERE members.username = '$username'";
  $result = mysqli_query($connect, $sql);
  
  if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		  $fname = $row["fname"];
		  echo $fname;
	  }
	  
  
  
  mysqli_close($connect); //if block ends 
  } //if block ends
   }} //function getUsername Ends */
   
    
   function calltoaction() {
//if logged in redirect to members page
if (isset($_SESSION['username'])) { /*Do Nothing*/ } 
else {?>
<!-- Call to Action Section -->
<div class = "container calltoaction">
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Blood cannot be created in laboratories and blood banks alone cannot support the ever-growing requirement, especially in case of emergencies!</p><p> Be a ray of light to someone by donating blood to the one in need.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block red" href="http://gator3254.temp.domains/~govindd/bloodline/register.php">Register As a Donor Today</a>
        </div>
      </div>
      </div> <?php }}      
            
  
   
  function membergreeting() {
	  $connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

$result1 = mysqli_query($connect, "SELECT * FROM members");
$total_donors = mysqli_num_rows($result1);


$result2 = mysqli_query($connect, "SELECT * FROM bloodrequests");
$total_requests = mysqli_num_rows($result2);


$result3 = mysqli_query($connect, "SELECT * FROM donationcampaigns");
$total_campaigns = mysqli_num_rows($result3);

echo "<p>Our online system has so far facilitated <br></p>";

echo "<p>- <strong>$total_donors</strong> registered Blood Donors, <strong>$total_requests</strong> Blood Donation Requests and <strong>$total_campaigns</strong> Blood Donation campaigns<br><br></p>";
            
echo "<p>We urge you to please complete the rest of your profile and register as donor, if you haven't done it till now.";
	  
  }



function managebloodrequests($requestID) {
	echo "<button type='button' class='btn btn-link' id='$requestID' data-toggle='modal' data-target='#myModal'>Quick View</button> &nbsp <a href='editbloodrequest.php?requestID=$requestID'>Edit</a> &nbsp <a href='deletebloodrequest.php?requestID=$requestID'>Delete</a>"; ?>
	
	<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog stretched">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php
            
              //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT * FROM bloodrequests ORDER BY blood_datetime");

echo "<table class='table table-list-search'>
<thead>
<tr>
<th>Patient Name</th>
<th>Blood Group</th>
<th>Issue</th>
<th>Condition</th>
<th>Date (when required)</th>
<th>Country</th>
<th>State</th>
<th>City</th>
<th>Attendant Name</th>
<th>Attendant Telephone</th>
<th>Remarks (if any)</th>



</tr>
</thead>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['patient_name'] . "</td>";
echo "<td>" . $row['bloodgroup'] . "</td>";
echo "<td>" . $row['issue'] . "</td>";
echo "<td>" . $row['patient_condition'] . "</td>";
echo "<td>" . date('F d, Y', strtotime($row['blood_datetime']))  . "</td>";
echo "<td>" . $row['country'] . "</td>";
echo "<td>" . $row['state'] . "</td>";
echo "<td>" . $row['city'] . "</td>";
echo "<td>" . $row['attendant_name'] . "</td>";
echo "<td>" . $row['attendant_contact'] . "</td>";
echo "<td>" . $row['comments'] . "</td>";

echo "</tr>";
}
echo "</table>";


mysqli_close($connect); //if block ends */
 ?>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
 
    </div>
  </div>
</div>
<?php } ?>


<?php function managecampaigns($campaignID) {
	echo "<button type='button' class='btn btn-link' id='$campaignID' data-toggle='modal' data-target='#myModal'>Quick View</button> &nbsp <a href='editcampaign.php?campaignID=$campaignID'>Edit</a> &nbsp <a href='deletecampaign.php?campaignID=$campaignID'>Delete</a>"; ?>
	
	<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog stretched">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
         <?php
            
              //connect to database
$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT * FROM donationcampaigns ORDER BY campaign_datetime DESC");

echo "<table class='table table-list-search'>
<thead>
<tr>
<th>Campaign Title</th>
<th>Date</th>
<th>Country</th>
<th>State</th>
<th>City</th>
<th>Organizer Name</th>
<th>Organizer Contact</th>
<th>Remarks (if any)</th>



</tr>
</thead>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['campaign_title'] . "</td>";
echo "<td>" . date('F d, Y', strtotime($row['campaign_datetime']))  . "</td>";
echo "<td>" . $row['country'] . "</td>";
echo "<td>" . $row['state'] . "</td>";
echo "<td>" . $row['city'] . "</td>";
echo "<td>" . $row['organizer_name'] . "</td>";
echo "<td>" . $row['organizer_contact'] . "</td>";
echo "<td>" . $row['comments'] . "</td>";

echo "</tr>";
}
echo "</table>";


mysqli_close($connect); //if block ends */
?>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
 
    </div>
  </div>
</div>
<?php } ?>


