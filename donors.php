<?php
session_start();
include('connect.php');
$user=$_SESSION['admin'];
$d=mysqli_query($con,"SELECT * FROM hospital_admins WHERE username='$user'");
while($row=mysqli_fetch_assoc($d)){
	$hospital_id=$row['hospital_id'];
}
if(!isset($_SESSION['admin'])){
	header('location:index.php');
}
?>
<?php
if(isset($_POST['sub'])){
	$name=$_POST['name'];
	$fname=$_POST['fname'];
	$phone=$_POST['phone'];
	$lname=$_POST['lname'];
	$bgroup=$_POST['bgroup'];
	$age=$_POST['age'];
	$county=$_POST['county'];
	$constituency=$_POST['constituency'];
	$ward=$_POST['ward'];
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	

	$in=mysqli_query($con,"INSERT INTO donors VALUES('','$hospital_id','$fname','$lname','$age','$phone','$county','$constituency','$ward','$bgroup','$uname','$pass') ");
	if($in){
	header('location:donors.php');
}
else{
	echo mysqli_error($con);
}
}
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Welcome</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/style.css" rel="stylesheet" />
		<script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<style type="text/css">
	p{color: black;
		font-style: verdana;}
</style>

 </head>
 <body>	
 	<script>
function getData(val) {

  $('#consts').html('<div style="border-radius:3px;border:solid 1px;padding:3px;">Please wait...</div>');
$.ajax({
type: "POST",
url: "ajax.php",
data:'county='+val,
dataType:'html',
success: function(data){
//alert(data);

$('#consts').html(data);
}
});

}

function getWard(val) {

  $('#ward').html('<div style="border-radius:3px;border:solid 1px;padding:3px; color:#272727;">Please wait...</div>');
  
$.ajax({
type: "POST",
url: "consts.php",
data:'constituency='+val,
dataType:'html',
success: function(data){
//alert(data);

$('#ward').html(data);
}
});

}   
</script>   
 <header id="header">
        <nav class="navbar navbar-default navbar-static-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <div class="navbar-brand">
						<a href="#"><h1>PATIENT DONOR INTERGRATION</h1></a>
					</div>
                </div>				
                <div class="navbar-collapse collapse">							
					<div class="menu">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="admin_panel.php">DASHBOARD</a></li>
							
							<li role="presentation"><a href="donors.php" class="active">DONORS</a></li>
							<li role="presentation"><a href="patients.php" >PATIENTS</a></li>
							<li role="presentation"><a href="logout.php" >LOGOUT</a></li>	
						</ul>
					</div>
				</div>		
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	




 <div class="row">

 	<div class="col-md-3"></div>
 	<div class="col-md-6"><!--center!-->

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#popup">add</button>
<div class="modal fade" id="popup">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">REGISTER DONOR</h3>
			</div>

			<div class="modal-body">

				<form role="form" method="post">

 					              <div class="form-group">
                    <label for="Firstname" style="color:#272727;">First Name</label>
                    <input class="form-control" type="text" name="fname" required>
                </div>

                 <div class="form-group">
                    <label for="Surname" style="color:#272727;">Last Name</label>
                    <input class="form-control" type="text" name="lname" required>
                </div>

                 <div class="form-group">
                    <label for="Surname" style="color:#272727;">Age</label>
                    <input class="form-control" type="number" name="age" required>
                </div>

                    <div class="form-group">
                    <label for="Surname" style="color:#272727;">Phone</label>
                    <input class="form-control" type="number" name="phone" required>
                </div>

                <div class="form-group">
					                <label class="form-label" style="color:#272727;">Blood Group</label>
					<Select type="text" class="form-control" name= "bgroup">
                        <option value="">-Choose group-</option>
<?php
 include('connect.php');
            $sql = mysqli_query($con,"SELECT * FROM blood_group");

            $count = mysqli_num_rows($sql);

           while( $result = mysqli_fetch_assoc($sql))
           {
                  echo"    <option value='".$result['blood_group']."'>".$result['blood_group']."</option>";
                  }
                      ?>
                         </Select>
</div>

 <label class="form-label" style="color:#272727;">County</label>
          <Select type="text" class="form-control" 
          onChange="getData(this.value)" name= "county"
          >
                        <option value="">-Choose County-</option>
<?php
 include('connect.php');
            $sql = mysqli_query($con,"SELECT DISTINCT county FROM counties");

            $count = mysqli_num_rows($sql);

           while( $result = mysqli_fetch_assoc($sql))
           {
                  echo"    <option value='".$result['county']."'>".$result['county']."</option>";
                  }
                      ?>
                         </Select>
                     
<label style="color:#272727;">Constituency</label>

<div id="consts">
  <i>Select county first...</i>
  </div>

<div>
<label>Wards</label>
<div id="ward">
  <i>Select constituency first...</i>
  </div>

                

                 <div class="form-group">
                    <label for="Surname" style="color:#272727;">Username</label>
                    <input class="form-control" type="text" name="uname" required>
                </div>   
                    
                <div class="form-group">
                    <label for="Email" style="color:#272727;">Password</label>
                    <input class="form-control" type="Password" name="pass" required>
                </div>
            </div>
                <!--end -->

					               
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-block" name="sub">Register</button>
				
			</div>
				</form>
		</div>		
	</div>
</div>
</div>
<?php
include('connect.php');
$f=mysqli_query($con,"SELECT * FROM donors where hospital_id='$hospital_id' ");


echo '<div class="table">';
echo '<table class="table table-stripped"><thead style="color:blue;">

<td>Hospital Name</td>
<td>Firstname</td>
<td>Lastname</td>
<td>Blood Group</td>	
</thead>';
while($row=mysqli_fetch_assoc($f)){
	$hospital_id=$row['hospital_id'];
		$fname=$row['firstname'];
	$blood_group=$row['blood_group'];
	$lname=$row['lastname'];
$r=mysqli_query($con,"SELECT * FROM hospitals INNER JOIN hospital_admins ON hospitals.hospital_id=hospital_admins.hospital_id ");
while($row=mysqli_fetch_assoc($r)){
	$name=$row['hospital_name'];
}	
		echo '<tbody>';
		echo '<td>'.$name.'</td>';
		echo '<td>'.$fname.'</td>';
		echo '<td>'.$lname.'</td>';
		echo '<td>'.$blood_group.'</td>'.'</tbody>';
}
echo'</table>';
echo '</div>';

?>

 

 	 <!--center!-->  </div>
 	<div class="col-md-3"></div>
 </div>

 
 
 
 </body>
</html>