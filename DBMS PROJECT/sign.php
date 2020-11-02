<?php

$server="localhost";
$username="root";
$password="";
$database="kartikey";
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Error".$conn.mysqli_error());
    
}

?>