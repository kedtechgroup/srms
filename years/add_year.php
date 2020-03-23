<?php

include "../includes/db.php";

global $con;

$name = $_POST['year_name']; // name of the value from the form post.


// Inser the values to the db
$query = "INSERT INTO `year`(`year_name`, `created_at`)
                     VALUES ('$name',CURRENT_TIMESTAMP())";

$execute = mysqli_query($con, $query);

$data = array();

if (empty($name)) {

    $data = [
        "success" => false,
        "message" => "Value Cannot be Empty"
    ];
    echo json_encode($data);
} elseif ($execute){
    $data = [
        "success" => true,
        "message" => "Data Inserted Successfully"

    ];
    echo json_encode($data);
}else{
    $data = [
        "success" => false,
        "message" => "Data Already Exists!! Check It and Try Again."
    ];
    echo json_encode($data);
}