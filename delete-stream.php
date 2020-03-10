<?php

require_once("includes/db.php");

include('includes/functions.php');

$delete = $_GET['stream-id'];

global $con;

$query = "DELETE FROM `stream` WHERE id = $delete ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

if ($result) {
    header("Location: manage-stream.php");
}else{
    
}
