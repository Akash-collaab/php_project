<?php

$id = $_GET["id"];


$conn = mysqli_connect("localhost", "root", "", "test");

if (!$conn) {
    echo "Database not connected" . mysqli_connect_error();
}

 
$sql = "DELETE FROM `users` WHERE `users`.`id` = $id";

if (mysqli_query($conn, $sql)) {
    header("Location:admindashboard.php");
} else {
    echo "something went wrong";
}


mysqli_close($conn);



?>