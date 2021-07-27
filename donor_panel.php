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
							<li role="presentation"><a href="donor_panel.php" class="active">DASHBOARD</a></li>
							
							<li role="presentation"><a href="certificate.php">CERTIFICATE</a></li>
							
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



 	 <!--center!-->  </div>
 	<div class="col-md-3">
 		
 	</div>
 </div>

 
 
 
 </body>
</html>