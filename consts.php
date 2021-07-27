<?php
$constituency=$_POST['constituency'];
 include('connect.php');
            $sql = mysqli_query($con,"SELECT DISTINCT ward FROM counties WHERE constituency='$constituency'");

            $count = mysqli_num_rows($sql);
echo"<select name='ward' class='form-control ward'  required>
<option value=''>Select ward</option>";
           while( $result = mysqli_fetch_assoc($sql))
           {

echo"<option value='".$result['ward']."'>".$result['ward']."</option>";
           }
           echo"</select>";
     
           ?>