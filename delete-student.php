<?php

require_once("includes/db.php");

$delete = $_GET['stid'];

global $con;

$query = "DELETE FROM `tblstudents` WHERE StudentId = '$delete'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

if ($result) {
    header("Location: manage-students.php");
}
