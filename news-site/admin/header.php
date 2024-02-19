<?php
session_start();
  include "config.php";
  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/admin/");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
        
    </head>
    <body>

      
        <!-- Script Link -->
        <script src="js/sweetalert.js"></script>
        <!-- Script Link close -->
        <!-- ///////////////////////
             /////////////////////// -->
           <!--user data Pop Msg-->
        <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] !='' )
        {
            ?>
            <script>
            swal({
           title: "<?php echo $_SESSION['status'] ?>",
           icon: "<?php echo $_SESSION['status_code'] ?>",
           button: "Click!",

          });</script>
            <?php
         unset($_SESSION['status']);
        }

        ?>
        <!-- User data Pop Msg close -->
        <!-- //////////////////////////////
            /////////////////////////////// -->
        <!-- post  Pop Msg start -->
         <?php
        if(isset($_SESSION['status_post']) && $_SESSION['status_post'] !='' )
        {
            ?>
            <script>
            swal({
           title: "<?php echo $_SESSION['status_post'] ?>",
           icon: "<?php echo $_SESSION['status_code_post'] ?>",
           button: "Click!",

          });</script>
            <?php
         unset($_SESSION['status_post']);
        }
        ?>
        <!--  -->
        <!-- post Pop Msg close -->
        <!-- //////////////////////////////
            /////////////////////////////// -->
        <!-- category  data Popup Msg start -->
        <?php
        if(isset($_SESSION['status-Cat']) && $_SESSION['status-Cat'] !='' )
        {
            ?>
            <script>
            swal({
           title: "<?php echo $_SESSION['status-Cat'] ?>",
           icon: "<?php echo $_SESSION['status_code_Cat'] ?>",
           button: "Click!",

          });</script>
            <?php
         unset($_SESSION['status-Cat']);
        }
        ?>
          <!-- category  data Popup Msg close -->
          <!-- //////////////////////////////
            /////////////////////////////// -->
          <!-- Setting pop msg start -->
          <?php
        if(isset($_SESSION['status-Set']) && $_SESSION['status-Set'] !='' )
        {
            ?>
            <script>
            swal({
           title: "<?php echo $_SESSION['status-Set'] ?>",
           icon: "<?php echo $_SESSION['status-Set-up'] ?>",
           button: "Click!",

          });</script>
            <?php
         unset($_SESSION['status-Set']);
        }
        ?>
         <!-- Setting pop msg close -->
         <!-- //////////////////////////////
            /////////////////////////////// -->
             <!-- Aprove status pop msg start -->
            <?php
        if(isset($_SESSION['uprove_status']) && $_SESSION['uprove_status'] !='' )
        {
            ?>
            <script>
            swal({
           title: "<?php echo $_SESSION['uprove_status'] ?>",
           icon: "<?php echo $_SESSION['uprove_code'] ?>",
           button: "Click!",

          });</script>
            <?php
         unset($_SESSION['uprove_status']);
        }
        ?>
            <!-- Aprove status pop msg close -->
             <!-- login index  Pop Msg start -->
         <?php
        if(isset($_SESSION['status_login']) && $_SESSION['status_login'] !='' )
        {
            ?>
            <script>
            swal({
           title: "<?php echo $_SESSION['status_login'] ?>",
           icon: "<?php echo $_SESSION['status_code_login'] ?>",
           button: "Click!",

          });</script>
            <?php
         unset($_SESSION['status_login']);
        }
        ?>
        <!--  -->
        <!-- login index Pop Msg close -->

         <!-- Aprove post  pop msg start -->
         <?php
        if(isset($_SESSION['status_approvel']) && $_SESSION['status_approvel'] !='' )
        {
            ?>
            <script>
            swal({
           title: "<?php echo $_SESSION['status_approvel'] ?>",
           icon: "<?php echo $_SESSION['status_code_approvel'] ?>",
           button: "Click!",

          });</script>
            <?php
         unset($_SESSION['status_approvel']);
        }
        ?>
            <!-- Aprove post pop msg close -->

                    <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <?php
                              if($_SESSION["user_role"] == '1'){
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>
                            <?php
                              }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->

        <!-- HEADER -->

        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="./images/LOGO.png"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-6  col-md-4">
                        <a href="logout.php" class="admin-logout">Hello <?php echo $_SESSION["username"]; ?>, logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>