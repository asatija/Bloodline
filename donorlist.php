<?php 
require_once('top.php');
?>

<!-- Page Content -->
    <div class="container">

      <h1 class="my-4">List of Blood Donors</h1>

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

$result = mysqli_query($connect,"SELECT memberID, fname, lname, bloodgroup, country, state, city, email FROM members ORDER BY memberID DESC");

echo "<table class='table table-list-search'>
<thead>
<tr>
<th>Donor Name</th>
<th>Donor ID</th>
<th>Blood Group</th>
<th>Country</th>
<th>State</th>
<th>City</th>
<th>Contact</th>



</tr>
</thead>";

while($row = mysqli_fetch_array($result))
{ if(!empty($row['fname'])&&!empty($row['bloodgroup'])&&!empty($row['country'])&&!empty($row['state'])&&!empty($row['city'])&&!empty($row['email'])) {
$memberID = $row['memberID'];
$email = $row['email'];
$fname = $row['fname'];
$lname = $row['lname'];
$city = $row['city'];
$country = $row['country'];

echo "<tr>";
echo "<td>" . $row['fname'] . "</td>";
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['bloodgroup'] . "</td>";
echo "<td>" . $row['country'] . "</td>";
echo "<td>" . $row['state'] . "</td>";
echo "<td>" . $row['city'] . "</td>";
echo "<td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#myModal'>Send Message</button></td>"; ?>
<script type="text/javascript">
$('body').on('hidden.bs.mymodal', '.mymodal', function () {
  $(this).removeData('bs.mymodal');
});
</script>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $row['email']; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body"></div>
<?php

echo "</tr>";

}
}
echo "</table>";


mysqli_close($connect); //if block ends */ ?>
</div>
<?php 
echo calltoaction(); ?>
         
         
         </div>
      </div>
      <!-- /.row -->
      </div>
    
    </div>
    <!-- /.container -->


<?php require 'bottom.php'; ?>
