<?php
session_start();
if(!isset($_SESSION['donor'])){
	header('location:index.php');
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
	p{color: purple;
		font-size: 40;
		font-style: verdana;}
</style>

 </head>
 <body>
 	<div id="test">
	
</div>
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
						<a href="index.php"><h1>Patient Donor Intergration</h1></a>
					</div>
                </div>				
                <div class="navbar-collapse collapse">							
					<div class="menu">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="donor_panel.php">DASHBOARD</a></li>
							
							<li role="presentation"><a href="certificate.php" class="active">CERTIFICATE</a></li>
							
							<li role="presentation"><a href="logout.php" >LOGOUT</a></li>						
						</ul>
					</div>
				</div>		
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	





 <div class="row">

 	<div class="col-md-3">
 		
 	</div>
 	<div class="col-md-6"><!--center!-->
 		<center><h3>REPUBLIC OF KENYA<img src="img/migorilogo2.png" alt="logo" hspace="10" style="width: 150px;height: 150px;"> MIGORI COUNTY</h3></center> 
<center><h4 style="text-decoration: underline;">DONOR CARD</h4></center>
<?php
$uname=$_SESSION['donor'];
include('connect.php');
$r=mysqli_query($con,"SELECT * FROM donors INNER JOIN hospitals ON hospitals.hospital_id=donors.hospital_id WHERE donors.username='$uname' ");
while($row=mysqli_fetch_assoc($r)){
	$fname=$row['firstname'];
	$lname=$row['lastname'];
	$name=$row['hospital_name'];
}
?><center><?php
echo '<p style=font-size:40; color:purple;>'.'<b>'.$fname.' '.$lname.'</b>'.' is a registered blood donor by '.'<b>'.$name.'</b>'.' hospital'.'</p>';

?>
</center>
<center>
<form>
   
    <button type="submit" class="btn btn-primary" name="submit" onClick="window.print()">Print/Download</button>
</form></center>

 	 <!--center!-->  </div>
 	<div class="col-md-3">
 		
 	</div>
 </div>

 
 
 
 </body>
</html>