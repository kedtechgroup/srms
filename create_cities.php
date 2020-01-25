<?php

session_start();
error_reporting(0);

include('includes/config.php');
include('includes/db.php');

if(strlen($_SESSION['alogin'])=="")
{
    header("Location: index.php");
}
else{
    if(isset($_POST['submit']))
    {

        $name=$_POST['name'];
        global $con;

        $query="INSERT INTO `cities`(`name`, `created_at`) 
        VALUES ('$name', CURRENT_TIMESTAMP())";

        $execute = mysqli_query($con,$query);

        if ($execute){
            $msg="City Added successfully";
        }
        else{
            $error="Something went wrong. Please try again";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create City</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap{
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
    </head>
    <body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-----End Top bar -->
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <?php include('includes/leftbar.php');?>
                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="page-title">
                                <h1 ><img src="images/tile.png" alt="" width="60" height="50">
                                    <span class="text-bold d-flex justify-content-center">Al Munawarah Student Examination Portal. </span>
                                </h1>
                            </div>
                            <!-- /.col-sm-6 -->
                        </div>
                        <!-- /.row -->
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><a href="#">Cities</a></li>

                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Add Address</h5>
                                            </div>
                                        </div>

                                        <?php if($msg){?>
                                            <div class="alert alert-success alert-dismissible left-icon-alert" role="alert">
                                            <strong>Well done! </strong><?php echo htmlentities($msg); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true"> &times; </span>
                                                </button>

                                            </div><?php }
                                        else if($error){?>
                                            <div class="alert alert-danger alert-dismissible left-icon-alert" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true"> &times; </span>
                                                </button>
                                            </div>
                                        <?php } ?>

                                        <div class="panel-body">

                                            <form method="post">
                                                <div class="form-group has-success">
                                                    <label for="success" class="control-label">Address Name</label>
                                                    <div class="">
                                                        <input type="text" name="name" class="form-control" required="required" id="success" autocomplete="off">
                                                        <span class="help-block">Eg- Majengo, Qubaa, Sega, Sparki etc</span>
                                                    </div>
                                                </div>

                                                <div class="form-group has-success">

                                                    <div class="">
                                                        <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit
                                                            <span class="btn-label btn-label-right"><i class="fa fa-check"></i>
                                                            </span>
                                                        </button>
                                                    </div>

                                            </form>


                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-8 col-md-offset-2 -->
                            </div>
                            <!-- /.row -->




                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

                </div>
                <!-- /.main-page -->

            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>



    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
    </html>
<?php  } ?>
<?php
