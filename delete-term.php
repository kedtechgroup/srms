<?php

require_once("includes/db.php");

include('includes/functions.php');

$delete = $_GET['term_id'];

global $con;

$query = "DELETE FROM `term` WHERE id = $delete ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

if ($result) {
    header("Location: manage_term.php");
}else{
    
}
