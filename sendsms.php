<?php
session_start();
$admin=$_SESSION['admin'];
include('connect.php');

$id=$_GET['id'];
$rt=mysqli_query($con,"SELECT * FROM donors WHERE donor_id='$id' ");
while($row=mysqli_fetch_assoc($rt)){
  $fname=$row['firstname'];
  $lname=$row['lastname'];
  $phone=$row['phone'];
}

$tr=mysqli_query($con,"SELECT * FROM hospitals INNER JOIN hospital_admins ON hospitals.hospital_id=hospital_admins.hospital_id WHERE hospital_admins.username='$admin' ");
while($row=mysqli_fetch_assoc($tr)){
  $hname=$row['hospital_name'];
  $con=$row['constituency'];
  $ward=$row['ward'];
}
        // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your authentication credentials
    $username   = "migoricounty";
    $apikey     = "31dec3b025015df3bd818e448d2ee26b7c1a69ac9303a1778ccb564d99351433";
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)

    
    
      $phone='+254'.$phone;
      
      
      $recipients = $phone;
    // And of course we want our recipients to know what we really do
    $message='Hello'.' '.$fname.' '.$lname.'. You are requested by '.$hname.' hospital in '.$con.' constituency '.$ward.' ward, to come and donate blood for a patient';
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    /*************************************************************************************
      NOTE: If connecting to the sandbox:
      1. Use "sandbox" as the username
      2. Use the apiKey generated from your sandbox application
         https://account.africastalking.com/apps/sandbox/settings/key
      3. Add the "sandbox" flag to the constructor
      $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
    **************************************************************************************/
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message"
?><script>
var x=window.onbeforeunload;
// logic to make the confirm and alert boxes
if (confirm("The doner has been notified") == true) {
    window.location.href = "find.php";
}
else{
  window.location.href = "find.php";
}</script><?php
        
      }
  }
    catch (Exception $e )
    {
      echo "Encountered an error while sending:".$e->getMessage()."<br>";
      print_r($e);
    } 
      
  



  


    // DONE!!! 