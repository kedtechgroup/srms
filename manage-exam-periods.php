<?php

session_start();
error_reporting(0);

include('includes/config.php');
include('includes/db.php');
include('includes/functions.php');

if (strlen($_SESSION['alogin']) == "") {

    redirect_To('index.php');
} else {

    if (isset($_POST['submit'])) {

        global $con;

        $name = $_POST['name'];
        $author = $_SESSION['alogin'];

        $query = "INSERT INTO `year`(`year_name`, `created_at` )
                     VALUES ('$name',CURRENT_TIMESTAMP())";

        $execute = mysqli_query($con, $query);


        if ($execute) {
            $msg = " Year added successfully";
        } else {
            $error = mysqli_error($con);
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin | Manage Terms</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
        <!-- <link rel="stylesheet" href="css/prism/prism.css" media="screen">  USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
        <link rel="stylesheet" href="css/main.css" media="screen">

        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }
        </style>

    </head>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php'); ?>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
                    <?php include('includes/leftbar.php'); ?>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Academic Periods</h2>
                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Academic Years</li>
                                        <li class="active">Manage year</li>
                                    </ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">

                                                    <div class="container-fluid">

                                                        <h5>
                                                            Click Add New Year to create new academic year.
                                                            <a style="float: right" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                                <i class="fa fa-plus"></i>Add Year</a>
                                                        </h5>
                                                    </div>
                                                    <!-- Modal -->

                                                </div>
                                            </div>

                                            <?php
                                            if ($msg) { ?>
                                                <div class="alert alert-success alert-dismissible left-icon-alert" role="alert">
                                                    <strong>Well done!</strong>
                                                    <?php
                                                    echo htmlentities($msg);
                                                    ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true"> &times; </span>
                                                    </button>
                                                </div>
                                            <?php
                                            } else if ($error) { ?>
                                                <div class="alert alert-danger alert-dismissible left-icon-alert" role="alert">
                                                    <strong>Oh snap!</strong>
                                                    <?php
                                                    echo htmlentities($error);
                                                    ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true"> &times; </span>
                                                    </button>
                                                </div>
                                            <?php } ?>

                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Exam Periods (Year) </th>
                                                            <th>Creation Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php $sql = "SELECT * from year";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;

                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {   ?>
                                                                <tr>
                                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                                    <td>
                                                                        <a href="class_subjects.php?cid=<?php echo htmlentities($result->year_id) ?>">
                                                                            <?php echo htmlentities($result->year_name); ?>
                                                                        </a>
                                                                    </td>

                                                                    <td><?php echo htmlentities($result->created_at); ?></td>
                                                                    <td>
                                                                        

                                                                            <a href="delete-year.php?year_id=<?php echo htmlentities($result->year_id); ?>">
                                                                                <i class="btn-sm btn-danger">Delete</i>
                                                                            </a>
                                                                   
                                                                    </td>
                                                                </tr>
                                                        <?php $cnt = $cnt + 1;
                                                            }
                                                        } ?>


                                                    </tbody>
                                                </table>


                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->


                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.section -->

        </div>
        <!-- /.main-page -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Year Period</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group has-success">
                                <label for="success" class="control-label">Year</label>
                                <div class="">
                                    <input type="text" name="name" class="form-control" required="required" id="success">
                                    <span class="help-block">Eg- 2020, 2019 etc</span>
                                </div>
                            </div>

                            <div class="form-group has-success">

                                <div class="">
                                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit
                                        <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>
                                    </button>
                                    <button class="btn btn-secondary"> <a href="manage-exam.php"> Back </a> </button>
                                </div>



                        </form>

                    </div>

                </div>
            </div>

        </div>
        <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable({
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "paging": false
                });

                $('#example3').DataTable();
            });
        </script>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

    </body>

    </html>
<?php } ?>