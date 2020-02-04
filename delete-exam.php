<?php

require_once("includes/db.php");

include('includes/functions.php');

$delete = $_GET['exam_id'];

global $con;

$query = "DELETE FROM `exam` WHERE  exam_id = $delete ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

if ($result) {
    header("Location: manage-exam.php");
}else{
    
}
