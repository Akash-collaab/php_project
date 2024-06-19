<?php

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];



$conn = mysqli_connect("localhost", "root", "", "test");

if (!$conn) {
    echo "Database not connected" . mysqli_connect_error();

}

$sql = "UPDATE `users` SET `name`='$name',`email`='$email',`username`='$username',`password`='$password' WHERE `users`.`id`=$id;";

if (mysqli_query($conn, $sql)) {
    header("Location:admindashboard.php");
} else {
    echo "Something went wrong";
}

mysqli_close($conn);


?>