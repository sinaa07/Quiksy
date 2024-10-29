<?php
$server="localhost";
$username="root";
$password="";

//establishing connection
$conn = mysqli_connect($server,$username,$password);

//check conn
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}
echo "Connected successfully";
$db_query = "use quiksy;";
$res = mysqli_query($conn,$db_query);
if (!$res) {
    die("Query execution failed: " . mysqli_error($conn));
}
?>
