<?php

session_start();
error_reporting(0);

include('includes/config.php');
require_once('includes/functions.php');

if (strlen($_SESSION['alogin']) == "") {
    redirect_To("../index.php");
} else {

    if (isset($_POST['submit'])) {
        $teachername = $_POST['name'];
        $id_no = $_POST['id_no'];
        $email = $_POST['email'];
        $cities = $_POST['cities'];
        $password = "teacher";
        $categories_id = $_POST['categories_id'];
        
        $phone = $_POST['phone'];

        $status = 1;
        
        $query = "INSERT INTO tblteachers(`name`, `id_no`,`email`, `phone`, `password`, `categories_id`, `cities`, `photo`, `created_at`) 
            VALUES (:teachername,:id_no,:email,:phone,:password,:categories_id,:cities, '1997-02-01' )";

       
        $query = $dbh->prepare($sql);
        $query->bindParam(':teachename', $teachername, PDO::PARAM_STR);
        $query->bindParam(':id_no', $id_no, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':classid', $classid, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();

        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "Teacher added successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| Teacher Registration< </title> <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
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
                                    <h2 class="title">Add New Teacher</h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                        <li class="active">Teacher Registration</li>
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
                                                <h5>Fill the Teacher info</h5>
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

                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Full Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="fullname" class="form-control" id="fullanme" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Teacher ID</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="id_no" class="form-control" id="rollid" maxlength="5" required="required" autocomplete="off">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Email Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control" id="email" required="required" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Phone Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="phone" name="phone" class="form-control" id="phone" required="required" autocomplete="off">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <input type="radio" name="gender" value="Male" required="required" checked="">Male
                                                        <input type="radio" name="gender" value="Female" required="required">Female
                                                        <input type="radio" name="gender" value="Other" required="required">Other
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Teachers Category</label>
                                                    <div class="col-sm-10">
                                                        <select name="categories_id" class="form-control" id="default" required="required">
                                                            <option value="">Select Category</option>

                                                            <?php $sql = "SELECT * from tblcategories";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($results as $result) {   ?>
                                                                    <option value="<?php echo htmlentities($result->id); ?>">
                                                                        <?php echo htmlentities($result->name); ?>
                                                                    </option>
                                                            <?php }
                                                                } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Physical Address </label>
                                                    <div class="col-sm-10">
                                                        <select name="cities" class="form-control" id="default" required="required">
                                                            <option value="">Select Address</option>

                                                            <?php $sql = "SELECT * from cities";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($results as $result) {   ?>
                                                                    <option value="<?php echo htmlentities($result->id); ?>">
                                                                        <?php echo htmlentities($result->name); ?>
                                                                    </option>
                                                            <?php }
                                                                } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date" class="col-sm-2 control-label">DOB</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="dob" class="form-control" id="date">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
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