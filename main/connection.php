<?php
$server="localhost";
$username="user";
$password="root1234";

//establishing connection
$conn = mysqli_connect($server,$username,$password);

//check conn
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}
echo "Connected successfully";
?>
