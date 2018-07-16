<?php 
require_once('top.php');

?>

<!-- Page Content -->
    <div class="container">

      <h1 class="my-4">List of Pending Blood Requests</h1>

		
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

<?php echo calltoaction(); ?>
         
         
         </div>
      </div>
      <!-- /.row -->
      </div>
    
    </div>
    <!-- /.container -->


<?php require 'bottom.php'; ?>
