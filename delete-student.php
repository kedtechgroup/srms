<?php

require_once("includes/db.php");

$delete = $_GET['subjectid'];

global $con;

$query = "DELETE FROM `tblstudent` WHERE id = '$delete'";
$result = mysqli_query($con, $query);

if ($result) {
    header("Location: manage-subjects.php");
}
