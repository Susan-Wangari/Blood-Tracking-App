<?php
session_start();
if(!isset($_SESSION['admin'])){
  header('location:index.php');
}

include('connect.php');
$user=$_SESSION['admin'];
$d=mysqli_query($con,"SELECT * FROM hospital_admins WHERE username='$user'");
while($row=mysqli_fetch_assoc($d)){
	$hospital_id=$row['hospital_id'];
}

?>
<?php
if(isset($_POST['sub'])){
	
	$fname=$_POST['fname'];
	
	$lname=$_POST['lname'];
	$bgroup=$_POST['bgroup'];
	$age=$_POST['age'];
	
	

	$in=mysqli_query($con,"INSERT INTO patients VALUES('','$hospital_id','$fname','$lname','$age','$bgroup') ");
	if($in){
	header('location:patients.php');
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
							
							<li role="presentation"><a href="donors.php">DONORS</a></li>
							<li role="presentation"><a href="patients.php">PATIENTS</a></li>
							<li role="presentation"><a href="donations.php" class="active">DONATIONS</a></li>
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

<form method="post">
	<div class="form-group">
 					<label for="username" style="color:#272727;">PHONE</label>
 					<input class="form-control" type="number" name="phone" placeholder="7123456789" >
 	</div>
 	<button type="submit" class="btn btn-primary btn-block" name="sub">SEARCH</button>
</form>

 

 	 <!--center!-->  </div>
 	<div class="col-md-3"></div>
 </div>

 
 
 
 </body>
</html>