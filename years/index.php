<?php

session_start();
error_reporting(0);

include('../includes/config.php');
include('../includes/db.php');
include('../includes/functions.php');

if (strlen($_SESSION['alogin']) == "") {

    redirect_To('index.php');

} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Exam Periods</title>

        <?php include "css/css_file.php"; ?>

    </head>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('../includes/topbar.php'); ?>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
                    <?php include('../includes/leftbar.php'); ?>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Academic Periods

                                    </h2>


                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="../dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Academic Years</li>
                                        <li class="active">Manage year</li>
                                    </ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->




                            <section id="active_section" class="section">
                                <div class="container-fluid">

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title">

                                                        <div class="container-fluid">

                                                            <h4 class="title">
                                                                Manage Years
                                                                <a id="add_new_year" style="float: right" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                                    <i class="fa fa-plus"></i>Add Year</a>

                                                            </h4>
                                                        </div>
                                                        <!-- Modal -->

                                                    </div>
                                                </div>


                                                <div class="panel-body p-20">

                                                    <table id="example" cellspacing="0" class="table table-hover table-striped table-bordered"  width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Exam Periods (Year) </th>
                                                                <th>Creation Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>


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
                            </section>

                            <section id="hide_section" class="section">
                                <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">

                                                    <div class="container-fluid">

                                                        <h4 class="title">
                                                            Add Exam Period

                                                        </h4>
                                                    </div>
                                                    <!-- Modal -->

                                                </div>
                                            </div>


                                            <div class="panel-body p-20">

                                                <form id="form" method="post">
                                                    <div class="form-group">
                                                        <label for="success" class="control-label">Year</label>
                                                        <div class="">
                                                            <input type="text" class="form-control"  placeholder="Eg- 2020, 2019 etc" required="required" id="year_name">

                                                        </div>
                                                    </div>

                                                    <div class="form-group ">

                                                        <div class="">
                                                            <a id="back" class="btn btn-default btn-md">  Back  </a>

                                                            <button type="submit" id="add_year" class="btn btn-success btn-labeled">Submit
                                                                <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>
                                                            </button>
                                                        </div>



                                                </form>


                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->


                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            </section>
                    </div>
                </div>
            </div>
        </div>


        <?php include "js/js_files.php"; ?>
        <script src="js/custom.js"> </script>
    </body>
    </html>
<?php } ?>