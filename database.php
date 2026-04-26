<?php 
$dbName="school_member";
$dbUserName="root";
$dbPass="";
$conn= mysqli_connect("localhost",$dbUserName,$dbPass,$dbName);
mysqli_query($conn,"SET CHARACTER SET utf8mb4");

?>