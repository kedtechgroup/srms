
<?php

// session_start();
error_reporting(0);

include('../includes/config.php');
include('../includes/functions.php');

// if (strlen($_SESSION['alogin']) == "") {
//     redirect_To('../index.php');
// } else {

?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Classes</title>
         <?php include "partials/css_file.php";?>


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
                                    <h2 class="title">Manage All Classes</h2>

                                </div>

                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="../dashboard.php"><i class="fa fa-home"></i> Home</a></li>
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

                                        <div id="panel1" class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">

                                                    <div class="container-fluid">
                                                        <h5>View Classes Info
                                                        <a style="float: right" id="add_class" class="btn btn-success"> <i class="fa fa-plus">
                                                            </i>Add Class
                                                        </a>
                                                        </h5>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Class Name</th>
                                                            <th >Code</th>
                                                            <th >Stream</th>
                                                            <th>Date Created</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-xs-8">


                                        <div id="panel2" class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">

                                                    <div class="container-fluid">
                                                        <h5>Add Class </h5>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="panel-body p-20">

                                                <form id="form" method="post">
                                                    <div class="form-group ">
                                                        <label for="success" class="  control-label">Class Name</label>
                                                        <div class="">
                                                            <input type="text" placeholder="Eg- Rabii Awal etc" class="form-control"
                                                                   required="required" id="classname">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="success" class=" control-label">Class Name in Numeric</label>
                                                        <div >
                                                            <input type="number" placeholder="Eg- 1,2,4,5 etc"  required="required"
                                                                   class="form-control" id="class_name_numeric">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id" class=" control-label">Stream</label>
                                                        <div >
                                                            <select id="stream_id" class="form-control">
                                                                <?php $sql = "SELECT * from stream";
                                                                $query = $dbh->prepare($sql);
                                                                $query->execute();
                                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($results as $result) {   ?>
                                                                        <option value="<?php echo htmlentities($result->stream_id); ?>"><?php echo htmlentities($result->name); ?>&nbsp;</option>
                                                                    <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group has-success">

                                                        <div class="">
                                                            <button type="submit" id="submit" name="submit" class="btn btn-success btn-md">Submit

                                                            </button>
                                                            <button class="btn btn-secondary" id="cancel"> Cancel </button>
                                                        </div>



                                                </form>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.col-md-12 -->
                            </div>

                        </section>
        <!-- /.section -->

                     </div>

        <!-- /.content-wrapper -->

                    </div>
            </div>
        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <?php include "partials/js_file.php" ?>

        <script src="js/custom.js"></script>
        </body>

    </html>