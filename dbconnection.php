<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "onlinevoting";
$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("<script>alert('Database Error');window.location.href='index.php';</script>");
}
?>