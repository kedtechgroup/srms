<?php

require_once("includes/db.php");

$delete = $_GET['classid'];

global $con;

$query = "DELETE FROM `tblclasses` WHERE id = '$delete'";
$result = mysqli_query($con, $query);

if ($result) {
    header("Location: manage-classes.php");
} else {
}
