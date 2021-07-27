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
							<li role="presentation"><a href="find.php" class="active">FIND DONOR</a></li>
							<li role="presentation"><a href="logout.php" >LOGOUT</a></li>	
						</ul>
					</div>
				</div>		
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	




 <div class="row">

 	<div class="col-md-1"></div>
 	<div class="col-md-10"><!--center!-->

<?php
if(!isset($_GET['id'])){
$blood_group=$_SESSION['id'];}
else{
	$blood_group=$_GET['id'];
	$_SESSION['id']=$blood_group;
}
include('connect.php');
$f=mysqli_query($con,"SELECT * FROM donors where blood_group='$blood_group' ");


echo '<div class="table">';
echo '<table class="table table-stripped table-hover"><thead style="color:blue;">

<td>Firstname</td>
<td>Lastname</td>
<td>Blood Group</td>
<td>County</td>	
<td>Constituency</td>
<td>Ward</td>
<td>Previous donations</td>
<td>Send sms</td>
</thead>';
while($row=mysqli_fetch_assoc($f)){
	$county=$row['county'];
	$constituency=$row['constituency'];
	$ward=$row['ward'];
		$fname=$row['firstname'];
	$blood_group=$row['blood_group'];
	$lname=$row['lastname'];
	$id=$row['donor_id'];
	
		echo '<tbody>';
		
		echo '<td>'.$fname.'</td>';
		echo '<td>'.$lname.'</td>';
		echo '<td>'.$blood_group.'</td>';
		echo '<td>'.$county.'</td>';
		echo '<td>'.$constituency.'</td>';
		echo '<td>'.$ward.'</td>'; ?>
		<td><button class="btn btn-primary" data-toggle="modal" data-target="#popup" id="<?php echo $id; ?>" onclick="showdetails(this);">View</button> </td><?php
    echo '<td><a style=color:green; href=sendsms.php?id='.$id.'>Send</a></td>'.'</tbody>';
}
echo'</table>';
echo '</div>';

?>
<div class="modal fade" id="popup">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:blue;">PREVIOUS DONATIONS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  
         <div id="noplate"></div>
    
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location='find.php'">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
	function showdetails(button){
		$('#noplate').html('<div style="border-radius:3px;border:solid 1px;padding:3px;">Please wait...</div>');
		var id=button.id;
		$.ajax({
			url:"get.php",
			method:"GET",
			data:{"id":id},
			dataType:"html",
			success:function(response){
			$('#noplate').html(response);
			
			
			}
		});
	}
</script>

 

 	 <!--center!-->  </div>
 	<div class="col-md-1"></div>
 </div>

 
 
 
 </body>
</html>