<?php 

$uname=$_POST["uname"];
$pass=$_POST["pass"];


$servername ="localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
    echo "database not connected". mysqli_connect_error();
}

$sql = "SELECT * FROM `users` WHERE `username` = '$uname' AND `password` = '$pass';";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0) {
    header("Location:index.html");
    
} else {
    header("Location:404.html");
}

mysqli_close($conn);

?>