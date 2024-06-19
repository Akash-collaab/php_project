<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $ph = mysqli_real_escape_string($conn, $_POST['ph']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // SQL query to insert data into the contact table
    $sql = "INSERT INTO contact (name, email, ph, message) VALUES ('$name', '$email', '$ph', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
