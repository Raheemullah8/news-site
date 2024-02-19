<?php 
include "header.php";
include "config.php";

$getId = $_GET['id'];
$sql = "UPDATE post set isApproved = 1 WHERE post_id  = $getId ";
$result = mysqli_query($conn,$sql) or die("query faild");
if($result){


    header("location: post.php");

        $_SESSION['uprove_status'] = "Data Uproved Sucsessfully";
    $_SESSION['uprove_code'] = "success";
   
}

?>