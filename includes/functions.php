<?php 

session_start();
error_reporting(0);

require_once("db.php"); 

if (strlen($_SESSION['alogin']) == "") {
    redirect_To("../index.php");
}

function redirect_To($newLocation){
    header("Location:". $newLocation);
    exit; 
}


function logging_To($name,$password){

    global $con; 
    $query = "SELECT * FROM customer 
    WHERE first_name = '$name' AND password = '$password' ";
    $execute = mysqli_query($con,$query);
    
    if($result = mysqli_fetch_assoc($execute)){
        return $result;
    }else{
        return null;
   }
      
}

function login(){
	if(isset($_SESSION["id"])){
		return true;
    }
}
function Confirm_login(){
    if(!login()){
        redirect_To("admin/login.php");
    }
}
function store_user(){
    
     global $con;

    $query = "INSERT INTO tblteachers()VALUES()";
}