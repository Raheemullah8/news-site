<?php
  include "config.php";
  include "header.php";

  $post_id = $_GET['id'];
  $cat_id = $_GET['catid'];

  $sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
  $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);

  unlink("upload/".$row['post_img']);

  $sql = "DELETE FROM post WHERE post_id = {$post_id};";
  $sql .= "UPDATE category SET post= post - 1 WHERE category_id = {$cat_id}";

  if(mysqli_multi_query($conn, $sql)){
    $_SESSION['status_post'] = "Deleted Post Sucsessfully";
    $_SESSION['status_code_post'] = "success";
    header("location: post.php");
  }else{
    echo "Query Failed";
  }
?>
