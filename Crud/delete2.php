<?php
$con = new mysqli("localhost","root","","db");

if(isset($_REQUEST['sub']))
{
    $id = $_REQUEST['id'];
    $a = "delete from tab where id = $id";
    $b = mysqli_query($con,$a);

    if($b == true){
    header("Location:delete.php");
    }else{       
         echo "False";
    }
}
?>