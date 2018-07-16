<?php 
require_once('top.php');
?>

<!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Upcoming Blood Donation Campaigns</h1>

		<div class="row">
        <div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Search</button>
                    </span>
                </div>
            </form>
        </div>
	<br/><br/>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-12 mb-12">
         
         
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

<!-- Call to Action Section -->
     <?php echo calltoaction(); ?>
         
         
         </div>
      </div>
      <!-- /.row -->
      </div>
    
    </div>
    <!-- /.container -->

<br/><br/><br/>
 <?php require 'bottom.php'; ?>