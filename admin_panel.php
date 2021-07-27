<?php
session_start();
if(!isset($_SESSION['admin'])){
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
	 <link rel="stylesheet" type="text/css" href="proj.css">
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
						<a href="index.php"><h1>Patient Donor Intergration</h1></a>
					</div>
                </div>				
                <div class="navbar-collapse collapse">							
					<div class="menu">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation"><a href="admin_panel.php" class="active">DASHBOARD</a></li>
							
							<li role="presentation"><a href="donors.php">DONORS</a></li>
							<li role="presentation"><a href="patients.php" >PATIENTS</a></li>
							<li role="presentation"><a href="logout.php" >LOGOUT</a></li>						
						</ul>
					</div>
				</div>		
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	



<?php
include('connect.php');
$hs=mysqli_query($con,"SELECT * FROM patients");
$n=mysqli_num_rows($hs);

$ad=mysqli_query($con,"SELECT * FROM donors");
$a=mysqli_num_rows($ad);

$va=mysqli_query($con,"SELECT DISTINCT blood_group FROM donors");
$v=mysqli_num_rows($va);


?>



        <div class="row">
               <div class="col-sm-4">
                 <div class="panel panel-default" id="p_default">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $a; ?></b></h1>
                     <p>DONORS</p>
                   </div>
                   <div class="panel-footer" id="p_footer"><a href="donors.php" style="color: white; text-decoration: none; font-size: 20px;">Full Details<span class="fa fa-long-arrow-right" id="span_arrow"></span></a></div>
                 </div>
               </div>

               <div class="col-sm-4">
                 <div class="panel panel-default" id="p_default1">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $n; ?></b></h1>
                     <p>PATIENTS</p>
                   </div>
                   <div class="panel-footer" id="p_footer1"><a href="patients.php" style="color: white; text-decoration: none; font-size: 20px;">Full Details<span class="fa fa-long-arrow-right" id="span_arrow"></span></a></div>
                 </div>
               </div>

               <div class="col-sm-4">
                 <div class="panel panel-default" id="p_default2">
                   <div class="panel-body" id="p_body">
                     <h1><b><?php echo $v; ?></b></h1>
                     <p>BLOOD GROUPS</p>
                   </div>
                   <div class="panel-footer" id="p_footer2"><a href="#" style="color: white; text-decoration: none; font-size: 20px;">Full Details<span class="fa fa-long-arrow-right" id="span_arrow"></span></a></div>
                 </div>
               </div>

              

             </div>



 
 
 
 </body>
</html>