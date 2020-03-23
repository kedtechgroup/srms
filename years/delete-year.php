<?php

require_once("includes/db.php");

include('includes/functions.php');

$delete = $_GET['year_id'];

global $con;

$query = "DELETE FROM `year` WHERE year_id = $delete ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

if ($result) {
    header("Location: index.php");
}else{
    
}
