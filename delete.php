<?php
use LDAP\Result;
include 'connect.php';
if(isset($_GET['deleteid'])){
    $lonch_id=$_GET['deleteid'];
    $sql="DELETE `lonch`,`data`
    FROM lonch INNER JOIN
    data ON lonch.lonch_id = data.lonch_id 
    AND lonch.lonch_id=$lonch_id;";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:home.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>