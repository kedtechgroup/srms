<?php

session_start();
error_reporting(0);

include('includes/config.php');

$cid =  $_GET['cid'];

$sql = "SELECT * FROM tblclasses WHERE id = $cid";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin Manage Classes</title>
            <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
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
                                    <div class="col-md-12">
                                        <h2 class="title"><i class="lead">Class:</i><?php echo htmlentities($result->ClassName) ?>
                                            . <i class="lead">Stream:</i> <?php echo htmlentities($result->Section)  ?></h2>


                                    </div>

                                    <!-- /.col-md-6 text-right -->
                                </div>
                                <!-- /.row -->
                                <div class="row breadcrumb-div">
                                    <div class="col-md-6">
                                        <ul class="breadcrumb">
                                            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                            <li> Classes</li>
                                            <li class="active">Manage Classes</li>
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


                                                        <h6>Total number of students taught in <?php echo htmlentities($result->ClassName) ?>
                                                            and their names and gender</h6>




                                                        <!-- Modal -->

                                                    </div>
                                                </div>

                                                <div class="panel-body p-20">

                                                    <table id="example3" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Student Name</th>
                                                                <th>Roll ID</th>
                                                                <th>Status</th>
                                                                <th>Date of Birth</th>
                                                                <th>Gender</th>
                                                                <th>Admit Date</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php $sql = "SELECT * FROM ssrms.tblstudents WHERE ClassId = $cid;";

                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt = 1;
                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) {   ?>
                                                                    <tr>
                                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                                        <td>
                                                                            <a href="student_reports.php?rollid=<?php echo htmlentities($result->RollId) ?>&classid=<?php echo htmlentities($result->ClassId) ?>">
                                                                                <?php echo htmlentities($result->StudentName); ?>
                                                                            </a>
                                                                        </td>
                                                                        <td>

                                                                            <?php echo htmlentities($result->RollId); ?>

                                                                        </td>
                                                                        <td><?php if ($result->Status == 1) { ?>
                                                                                <i class="btn-xs btn-success"><?php echo htmlentities('Active'); ?></i>
                                                                            <?php } else { ?>
                                                                                <i class="btn-xs btn-danger"><?php echo htmlentities('Inactive'); ?></i>
                                                                            <?php  } ?>
                                                                        </td>
                                                                        <td>

                                                                            <?php echo htmlentities($result->DOB); ?>

                                                                        </td>
                                                                        <td>

                                                                            <?php echo htmlentities($result->Gender); ?>

                                                                        </td>
                                                                        <td>

                                                                            <?php echo htmlentities($result->RegDate); ?>

                                                                        </td>
                                                                        <td>
                                                                            <a href="edit-student.php?stid=<?php echo htmlentities($result->StudentId); ?>">
                                                                                <i class="btn-sm btn-info">Edit</i>
                                                                            </a>
                                                                            <a href="delete-student.php?delete=<?php echo htmlentities($result->StudentId); ?>">
                                                                                <i class="btn-sm btn-danger">Delete</i>
                                                                            </a>

                                                                        </td>
                                                                    </tr>

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
                            </section>

                            <section class="section">
                                <div class="container-fluid">



                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title">

                                                        <div class="panel-title">


                                                            <h6>Total number of subjects taught in <?php echo htmlentities($result->ClassName) ?>
                                                            </h6>




                                                            <!-- Modal -->

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-body p-20">

                                                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Subjects</th>
                                                                <th>Subject Code</th>
                                                                <th>Date Entered</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php

                                                            $sql = "SELECT * from tblsubjectcombination JOIN tblsubjects on tblsubjectcombination.SubjectId = tblsubjects.id
                                                            WHERE ClassId = $cid";

                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt = 1;

                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) {   ?>
                                                                    <tr>
                                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                                        <td>
                                                                            <a href="class_subjects.php?cid=<?php echo htmlentities($result->id) ?>">
                                                                                <?php echo htmlentities($result->SubjectName); ?>
                                                                            </a>
                                                                        </td>
                                                                        <td>

                                                                            <?php echo htmlentities($result->SubjectCode); ?>

                                                                        </td>
                                                                        <td>

                                                                            <?php echo htmlentities($result->Creationdate); ?>

                                                                        </td>
                                                                        <td>
                                                                            <a href="edit-subject.php?stid=<?php echo htmlentities($result->SubjectId); ?>">
                                                                                <i class="btn-sm btn-info">Edit</i>
                                                                            </a>
                                                                            <a href="delete-subject.php?delete=<?php echo htmlentities($result->SubjectId); ?>">
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
                            </section>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-md-6 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

            <!-- /.section -->

            </div>
            <!-- /.main-page -->
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
                    $('#example').DataTable({
                        "paging": true
                    });

                    $('#example2').DataTable({
                        "scrollY": "300px",
                        "scrollCollapse": true,
                        "paging": false
                    });

                    $('#example3').DataTable();
                });
            </script>

        </body>

        </html>

<?php
    }
}

?>