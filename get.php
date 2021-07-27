<?php

include('connect.php');

$id=$_GET['id'];

$get=mysqli_query($con,"SELECT * FROM donations INNER JOIN hospitals ON hospitals.hospital_id=donations.hospital_id where donations.donor_id='$id' ");


?>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
<table class="table table-hover table-condensed ">
	<thead style="color: blue;">
		<td>Hospital</td>
		<td>Date</td>
	</thead>	
	<tbody><?php
		while($row=mysqli_fetch_assoc($get)){ ?>
			
		<td> <?php echo $row['hospital_name']; ?> </td>
		<td> <?php echo $row['date']; ?> </td></tbody><?php
}
?>
</table>
</div>
<div class="col-sm-1"></div></div>
