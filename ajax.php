<?php
$county=$_POST['county'];
 include('connect.php');
            $sql = mysqli_query($con,"SELECT DISTINCT constituency FROM counties WHERE county='$county'");

            $count = mysqli_num_rows($sql);
echo"<select name='constituency' class='form-control ward' onChange='getWard(this.value)''  required>
<option value=''>Select constituency</option>";
           while( $result = mysqli_fetch_assoc($sql))
           {

echo"<option value='".$result['constituency']."'>".$result['constituency']."</option>";
           }
           echo"</select>";
     
           ?>