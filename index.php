<?php

include('connect.php');
if(isset($_POST['sub'])){
	$uname=$_POST['user'];
	$pass=$_POST['password'];
include('connect.php');
	$c=mysqli_query($con,"SELECT * FROM hospital_admins WHERE username='$uname' AND password='$pass' " );
	if(mysqli_num_rows($c)>0){
		session_start();
		$_SESSION['admin']=$uname;
		header('location:admin_panel.php');
	}
	else{
echo '<script language="javascript">';
echo 'alert("Incorrect login details, Please try again")';
echo '</script>';
	}
}
?>
<?php
if(isset($_POST['sub2'])){
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];

	$c=mysqli_query($con,"SELECT * FROM donors WHERE username='$uname' AND password='$pass' " );
	if(mysqli_num_rows($c)>0){
		$_SESSION['donor']=$uname;
		header('location:donor_panel.php');
	}
	else{
echo '<script language="javascript">';
echo 'alert("Incorrect login details, Please try again")';
echo '</script>';
	}
}

?>
<!DOCTYPE html>
<html>
 <head>
 <title>Damu Safe</title>
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
						<a href="index.php"><h1>Welcome to Damu Safe</h1></a>
					</div>
                </div>				
                <div class="navbar-collapse collapse">							
					<div class="menu">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="index.php" class="active">HOME</a></li>
							
							<li role="presentation"><a data-toggle="modal" data-target="#popup">HOSPITAL ADMIN</a></li>
							<li role="presentation"><a data-toggle="modal" data-target="#popup1">Donor</a></li>
													
						</ul>
					</div>
				</div>		
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	

	<div class="card w-75">
  <div class="card-body">
  <h3 class="card-title">About Us</h3>
    <p class="card-text"><p>Damu Safe is an electronic system that performs the following functions;
<ul>
<li>Safely store and allocate blood products at the point-of-care</li>
<li>Provide closed-loop transfusion safety, from the blood bank to the bedside</li>
<li>Manage donors and blood at various blood banks</li>
<li>Track the location of donated blood</li>
</ul>
</p></p>
  </div>
</div>

<div class="card w-75">
  <div class="card-body">
    <h3 class="card-title">Contact Us</h3>
    <p class="card-text">
	<ul>
	<li>Website: www.DamuSafe.com</li>
	<li>Email:info@nbtskenya.or.ke</li>
	<li>P.O. Box 29804-00202 – Nairobi</li>
	</ul>
	</p>
  </div>
</div>


 <div class="row">

 	<div class="col-md-3">
 		
 	</div>
 	<div class="col-md-6"><!--center!-->

<div class="modal fade" id="popup">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">ADMIN LOGIN</h3>
			</div>

			<div class="modal-body">

				<form role="form" method="post">
					<div class="form-group">
 					<label for="username" style="color:#272727;">Username</label>
 					<input class="form-control" type="text" name="user" >
 					</div>
 					<div class="form-group">
 					<label for="Password" style="color:#272727;">Password</label>
 					<input class="form-control" type="Password" name="password">
 				    </div>			
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-block" name="sub">LOGIN</button>
				
			</div>
				</form>
		</div>		
	</div>
	</div>
</div>


<div class="modal fade" id="popup1">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Donor Login</h3>
			</div>

			<div class="modal-body">

				<form role="form" method="post">

                 <div class="form-group">
                    <label for="Surname" style="color:#272727;">Username</label>
                    <input class="form-control" type="text" name="uname" required>
                </div>   
                    
                <div class="form-group">
                    <label for="Email" style="color:#272727;">Password</label>
                    <input class="form-control" type="Password" name="pass" required>
                </div>
                <!--end -->

					               
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-block" name="sub2">Login</button>
				
				
			</div>
				</form>
		</div>		
	</div>
</div>
</div>

 	 <!--center!-->  </div>
 	<div class="col-md-3">
 		
 	</div>
 </div>

 
 
 
 </body>
</html>