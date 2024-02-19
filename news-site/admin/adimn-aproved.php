<?php
include "config.php";
include "header.php";
$appraved_id = $_GET['id'];
$sql = "UPDATE post SET isApproved = 1 WHERE post_id = '{$appraved_id}'";

$result = mysqli_query($conn,$sql);
if($result){
    $_SESSION['status_approvel'] = "Approvel  Post Sucsessfully";
    $_SESSION['status_code_approvel'] = "success";
   
    header("location: post.php");
}else{
    echo "QueryFaild.";
}

?>