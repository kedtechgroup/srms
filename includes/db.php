<?php

$con = mysqli_connect('mysql','root','root','ssrms');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//mysqli_close($con);
