<?php
    include 'config.php';
    include "header.php";
    if($_SESSION["user_role"] == '0'){
      header("Location: {$hostname}/admin/post.php");
    }
    $cat_id = $_GET["id"];
   
    $select = "SELECT * FROM category WHERE category_id ='{$cat_id}'";
    $result = mysqli_query($conn,$select) or die("SELCT CATEGORY QUERY FALID");
    if(mysqli_num_rows($result)> 0);
    $row = mysqli_fetch_assoc($result);
    if($row['post'] == 0){

    /*sql to delete a record*/
    $sql = "DELETE FROM category WHERE category_id ='{$cat_id}'";

    if (mysqli_query($conn, $sql)) {

      $_SESSION['status-Cat'] = "Deleted category Sucsessfully";
      $_SESSION['status_code_Cat'] = "success";

      header("location: category.php");
    }
  }else{
    $_SESSION['status-Cat'] = "First Delete Post";
    $_SESSION['status_code_Cat'] = "success";
    header("location: category.php");
  }
    mysqli_close($conn);

?>
