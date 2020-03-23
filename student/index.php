<?php

 session_start();
error_reporting(0);

include('../includes/config.php');
include('../includes/functions.php');

 if (strlen($_SESSION['alogin']) == "") {
    redirect_To('../index.php');
 } else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin Manage Students</title>
            <?php include "partials/css_file.php";?>

        <style>
            #panel2{
                display: none;
            }
        </style>
    </head>

    <body class="top-navbar-fixed">
        <div class="main-wrapper">

                <?php include('../includes/topbar.php'); ?>

                <div class="content-wrapper">
                <div class="content-container">
                    <?php include('../includes/leftbar.php'); ?>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Students</h2>
                                </div>

                            </div>

                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Students</li>
                                        <li class="active">Manage Students</li>
                                    </ul>
                                </div>

                            </div>


                        </div>
                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                                    <div  id="panel"  class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <div class="container-fluid">
                                                        <h5 class="lead"> View All Students
                                                            <a style="float: right" id="toogle" class="btn btn-success add">
<!--                                                               data-toggle="modal" data-target="#exampleModalCenter">-->
                                                                <i class="fa fa-plus"></i>Add Student
                                                            </a>
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered table-condensed table-hover" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>

                                                            <th>Student Name</th>
                                                            <th width="10">Adm#</th>

                                                            <th>Admission Date</th>
                                                            <th width="13">Status</th>
                                                            <th>Class</th>
                                                            <th>Stream</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                    <div  id="panel2"  class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <div class="container-fluid">
                                                        <h5 class="lead"> Add Student

                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="panel-body p-20">
                                                <form id="form" class="form-horizontal" method="post">

                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Full Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="fullanme" class="form-control" id="fullanme"  autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Rool Id</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="rollid" class="form-control" id="rollid" maxlength="5" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Email id)</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" name="emailid" class="form-control" id="email"  autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Gender</label>
                                                        <div class="col-sm-10">
                                                            <input type="radio"  name="gender" id="gender" value="Male" required="required" checked="">Male
                                                            <!--                                            <input type="radio" name="gender" id="gender" value="Female" >Female-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="id" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
                                                            <select name="id" id="classid" class="form-control">
                                                                <?php $sql = "SELECT id, ClassName from tblclasses";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($results as $result) {   ?>
                                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp;</option>
                                                                    <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dob" class="col-sm-2 control-label">DOB</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" name="dob" id="date" class="form-control"  >
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">

                                                       <a type="button" id="back" class="btn btn-md btn-secondary">Back

                                                       </a>

                                                        <button type="submit" id="submit" class="btn btn-success btn-md">Submit

                                                        </button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                        </section>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-md-6 -->

            </div>

        </div>

            <?php include "partials/js_file.php" ?>

        <script src="js/main.js"></script>
    </body>

    </html>
<?php }?>