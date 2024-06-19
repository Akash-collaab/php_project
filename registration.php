<?php 

$name=$_POST["name"];
$email=$_POST["email"];
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

$sql = "INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES (NULL, '$name', '$email', '$uname', '$pass');";


if (mysqli_query($conn,$sql)) {
    header("Location:login.html");
} else {
    echo "Something went wrong";
}

mysqli_close($conn);

?>