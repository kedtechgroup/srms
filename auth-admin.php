<?php

session_start();
error_reporting(0);


include('includes/db.php');

require_once('includes/functions.php');

if (strlen($_SESSION['alogin']) == "") {
    redirect_To("../index.php");
} else {

    if (isset($_POST['submit'])) {



        global $con;

        $name = $_POST['UserName'];
        $password = md5($_POST['password']);
        $confpassword = md5($_POST['confpassword']);


        if ($password == $confpassword) {
            $query = "INSERT INTO `admin`(`UserName`, `Password`, `updationDate`) 
                VALUES ('$name','$password',CURRENT_TIMESTAMP())";

            $execute = mysqli_query($con, $query) or die(mysqli_error($con));


            if ($execute) {
                $msg = "Admin added successfully";
            } else {
                $error = mysqli_error($con);
            }
        } else {
            $error = "Password dont match";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Admin Registration< </title>
         <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
                <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
                <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
                <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
                <link rel="stylesheet" href="css/prism/prism.css" media="screen">
                <link rel="stylesheet" href="css/select2/select2.min.css">
                <link rel="stylesheet" href="css/main.css" media="screen">
                <script src="js/modernizr/modernizr.min.js"></script>
    </head>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php'); ?>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <?php include('includes/leftbar.php'); ?>
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Add New Administrator</h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                    </ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>

                        <br>

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Administrator</h5>
                                                <!-- <a href="" style=float:right  class="btn btn-xs btn-primary">Manage Users</a> -->
                                            </div>

                                        </div>
                                        <div class="panel-body">

                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Well done! </strong><?php echo htmlentities($msg); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true"> &times; </span>
                                                    </button>
                                                </div><?php } else if ($error) { ?>
                                                <div class="alert alert-danger left-icon-alert" role="alert">
                                                    <strong>Oh snap! </strong> <?php echo htmlentities($error); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true"> &times; </span>
                                                    </button>
                                                </div>
                                            <?php } ?>

                                            <form class="form-horizontal" method="post">

                                                <input id="id" name="id" type="hidden">

                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="UserName" class="form-control" id="UserName" required="required" autocomplete="off">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" class="form-control" id="password" required="required" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="confpassword" class="col-sm-2 control-label">Confirm Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="confpassword" class="form-control" id="confpassword" required="required" autocomplete="off">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="submit" class="btn btn-primary">Create Admin</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                        </div>
                    </div>
                    <!-- /.content-container -->
                </div>
                <!-- /.content-wrapper -->
            </div>
            <!-- /.main-wrapper -->
            <script src="js/jquery/jquery-2.2.4.min.js"></script>
            <script src="js/bootstrap/bootstrap.min.js"></script>
            <script src="js/pace/pace.min.js"></script>
            <script src="js/lobipanel/lobipanel.min.js"></script>
            <script src="js/iscroll/iscroll.js"></script>
            <script src="js/prism/prism.js"></script>
            <script src="js/select2/select2.min.js"></script>
            <script src="js/main.js"></script>
            <script>
                $(function($) {
                    $(".js-states").select2();
                    $(".js-states-limit").select2({
                        maximumSelectionLength: 2
                    });
                    $(".js-states-hide").select2({
                        minimumResultsForSearch: Infinity
                    });
                });
            </script>
    </body>

    </html>
<?PHP } ?>