<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";


$DBConnect = mysqli_connect($servername,$username,$password,$database);

if($DBConnect->connect_error){
    die("Error While Connecting with Database".$DBConnect->connect_error);
    echo "<br>";
}



?>