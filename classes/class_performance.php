<?php

session_start();
error_reporting(0);

include('includes/config.php');
include('includes/db.php');

global $con;

$class_exam_id = $_GET['exam_id']; // fetches id from get request.
$class_id      = $_GET['cid'];

if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {

    if (isset($_POST['submit'])) {
        $marks = array();
        $class = $_POST['class'];
        $studentid = $_POST['studentid'];
        $mark = $_POST['marks'];

        $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName,tblsubjects.subject_id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.subject_id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid order by tblsubjects.SubjectName");
        $stmt->execute(array(':cid' => $class));
        $sid1 = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            array_push($sid1, $row['subject_id']);
        }

        for ($i = 0; $i < count($mark); $i++) {
            $mar = $mark[$i];
            $sid = $sid1[$i];
            $sql = "INSERT INTO  result(class_exam_id,students_id,class_id,subject_id,marks) VALUES(:exam_id,:studentid,:class,:sid,:marks)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
            $query->bindParam(':class', $class, PDO::PARAM_STR);
            $query->bindParam(':sid', $sid, PDO::PARAM_STR);
            $query->bindParam(':marks', $mar, PDO::PARAM_STR);
            $query->bindParam(':exam_id', $class_exam_id, PDO::PARAM_STR);

            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "Result info added successfully";
            } else {
                $errors = $query->errorInfo();
                $error = ($errors[2]);
            }
        }
    }

    // ----------------------------------------------- Start of Class QUery -------------------------------------------------------------

    $sql = "SELECT * FROM tblclasses JOIN stream s on tblclasses.stream_id = s.stream_id WHERE id = $class_id";
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
        <title>Admin Manage Terms</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="assets/css/main.css" media="screen" >

        <link rel="stylesheet" href="assets/css/font-awesome.css" media="screen" >
        <link rel="stylesheet" href="assets/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="assets/css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="assets/css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="assets/css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="assets/css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="assets/css/icheck/skins/line/green.css" >


        <script>
            function getStudent(val) {
                $.ajax({
                    type: "POST",
                    url: "get_student.php",
                    data: 'classid=' + val,
                    success: function(data) {
                        $("#studentid").html(data);

                    }
                });
                $.ajax({
                    type: "POST",
                    url: "get_student.php",
                    data: 'classid1=' + val,
                    success: function(data) {
                        $("#subject").html(data);

                    }
                });
            }
        </script>

        <script>
            function getresult(val, clid) {

                var clid = $(".clid").val();
                var val = $(".stid").val();;
                var abh = clid + '$' + val;
                //alert(abh);
                $.ajax({
                    type: "POST",
                    url: "get_student.php",
                    data: 'studclass=' + abh,
                    success: function(data) {
                        $("#reslt").html(data);

                    }
                });
            }
        </script>

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
                                    <h2 class="title">
                                        <i class="">Class - </i> <a href="classes/class_subjects.php?cid=<?php echo htmlentities($class_id) ?>"> <?php echo htmlentities($result->ClassName) ?> </a>
                                        // <i class="">Stream - </i> <a href=""> <?php echo htmlentities($result->name)  ?> </a> Performance </h2>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Performance
                                        </li>
                                        <li class="active">View Performance
                                        </li>
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

                                                        <h5> Class Total / Marks Performance

                                                            <a style="float: right" class="btn btn-warning" title="Declare Results" data-toggle="modal" data-target="#exampleModalCenter">
                                                                <i class="fa fa-plus">
                                                                </i>
                                                                <?php echo htmlentities(' Declare Result'); ?>
                                                            </a>

                                                            <a style="float: right;" href="/reports/class_report.php" target="_blank" id="print" class="btn btn-success" title="Print Class Result ">
                                                                <i class="fa fa-print">
                                                                </i>
                                                                <?php echo htmlentities('Print Class Results') ?>
                                                            </a>

                                                        </h5>
                                                    </div>
                                                    <!-- Modal -->
                                                </div>
                                            </div>
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success alert-dismissible left-icon-alert" role="alert">
                                                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true"> &times; </span>
                                                    </button>
                                                </div>
                                            <?php } else if ($error) { ?>
                                                <div class="alert alert-danger alert-dismissible left-icon-alert" role="alert">
                                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
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
                                                            <th>أسم الطالب</th>
                                                            <th>Admission Number</th>
                                                            <th>Total Score</th>

                                                            <th style="text-align: center">Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <?php

                                                        $cid = $_GET['cid'];
                                                        $exam_id = $_GET['exam_id'];
                                                        $exam_period = $_GET['exam_period'];

                                                        $sql = "SELECT r.result_id, s.StudentId, s.StudentName,s.RollId, SUM(marks)as score, class_exam_id
                                                                FROM result r JOIN tblstudents s On students_id = s.StudentId 
                                                                WHERE r.class_exam_id = $exam_id group by r.students_id ORDER BY score desc ";

                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;


                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {   ?>
                                                                <tr>
                                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                                    <td>
                                                                        <a target="blank" href="result.php?rollid=<?php echo htmlentities($result->RollId) ?>&class=<?php echo $cid ?>">
                                                                            <?php
                                                                                echo htmlentities($result->StudentName);
                                                                            ?>
                                                                        </a>
                                                                    </td>

                                                                    <td><?php echo htmlentities($result->RollId); ?></td>

                                                                    <td><?php echo htmlentities($result->score); ?></td>
                                                                    <td style="text-align: center">
                                                                        <a href="edit-result.php?stid=<?php echo htmlentities($result->StudentId); ?>">
                                                                            <i class="btn btn-xs btn-info">Edit</i>
                                                                        </a>
                                                                        <a target="blank" href="result.php?rollid=<?php echo htmlentities($result->RollId) ?>&class=<?php echo $cid ?>">
                                                                            <i class="btn btn-xs btn-success">Print Result</i>
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
        <div class="modal fade" id="exampleModalCenter" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Result</h5>

                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal" method="post">

                            <div class="form-group">
                                <label for="default" for="classid" class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-10">
                                    <select name="class" class="form-control clid" id="classid" onChange="getStudent(this.value);" required="required">
                                        <option value="">Select Class</option>
                                        <?php $sql = "SELECT * from tblclasses JOIN stream s on tblclasses.stream_id = s.stream_id WHERE id = $class_id";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {   ?>
                                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp;
                                                    Stream - <?php echo htmlentities($result->name); ?></option>
                                            <?php }
                                        } ?>
                                    </select>


                                </div>
                            </div>
                            <div class="form-group">
                                <label for="studentid" class="col-sm-2 control-label ">Student Name</label>
                                <div class="col-sm-10">
                                    <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-10">
                                    <div id="reslt">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Subjects</label>
                                <div class="col-sm-10">
                                    <div id="subject">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" id="submit" class="btn btn-success">Declare Result</button>

                                    <a href="class_performance.php?exam_id=<?php echo htmlentities($_GET['exam_id']) ?> &exam_period=<?php echo htmlentities($_GET['exam_period'])?>&cid=<?php echo htmlentities($_GET['cid']) ?>"
                                       class="btn btn-danger">Cancel
                                    </a>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div>

        </div>

        <!-- /.section -->


        <!-- /.main-page -->



        <!-- ========== COMMON JS FILES ========== -->
        <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/pace/pace.min.js"></script>
        <script src="assets/js/lobipanel/lobipanel.min.js"></script>
        <script src="assets/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="assets/js/prism/prism.js"></script>
        <script src="assets/js/DataTables/datatables.min.js"></script>
        <script src="assets/js/waypoint/waypoints.min.js"></script>
        <script src="assets/js/counterUp/jquery.counterup.min.js"></script>
        <script src="assets/js/amcharts/amcharts.js"></script>
        <script src="assets/js/amcharts/serial.js"></script>
        <script src="assets/js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="assets/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="assets/js/amcharts/themes/light.js"></script>
        <script src="assets/js/toastr/toastr.min.js"></script>
        <script src="assets/js/icheck/icheck.min.js"></script>



        <!-- ========== THEME JS ========== -->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/production-chart.js"></script>
        <script src="assets/js/traffic-chart.js"></script>
        <script src="assets/js/task-list.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();
            });

            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }

        </script>
    </body>
    </html>
<?php } }} ?>