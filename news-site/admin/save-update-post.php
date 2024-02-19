<?php
include "config.php";
include "header.php";

if(empty($_FILES['new-image']['name'])){
    $new_name = $_POST['old_image'];
}else{
    $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];

    $file_ext_arr = explode('.', $file_name);
    $file_ext = end($file_ext_arr);

    $extensions = array("jpeg","jpg","png","JFIF","AVIF");

    if(!in_array($file_ext,$extensions)){
        $errors[] = "This extension file not allowed, Please choose a JPG,PNG,JFIF or jpeg file.";
    }

    if($file_size > 2097152){
        $errors[] = "File size must be 2mb or lower.";
    }

    if(empty($errors)){
        $new_name = time(). "-".basename($file_name);
        $target = "upload/".$new_name;
        $image_name = $new_name;
        move_uploaded_file($file_tmp,$target);
    }else{
        print_r($errors);
        die();
    }
}

$post_title = mysqli_real_escape_string($conn, $_POST["post_title"]);
$post_desc = mysqli_real_escape_string($conn, $_POST["postdesc"]);
$category = (int)$_POST["category"];
$post_id = (int)$_POST["post_id"];
$old_category = (int)$_POST['old_category'];

$sql = "UPDATE post SET title='$post_title', description='$post_desc', category=$category ,post_img='$image_name' WHERE post_id=$post_id";

if($old_category !== $category){
    $sql .= " ; UPDATE category SET post = post - 1 WHERE category_id = $old_category;
              UPDATE category SET post = post + 1 WHERE category_id = $category;";
}

$result = mysqli_multi_query($conn, $sql);

if($result){
    $_SESSION['status_post'] = "Updated Post Successfully";
    $_SESSION['status_code_post'] = "success";
    header("Location: post.php");
    exit();
}else{
    echo "Query Failed: " . mysqli_error($conn);
}
?>
