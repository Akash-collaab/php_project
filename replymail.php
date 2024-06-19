<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'C:\xamp2\htdocs\sdacproject1\foodweb\PHPMailer\src\Exception.php';
require 'C:\xamp2\htdocs\sdacproject1\foodweb\PHPMailer\src\PHPMailer.php';
require 'C:\xamp2\htdocs\sdacproject1\foodweb\PHPMailer\src\SMTP.php';



// Include your database connection file

// ... (Previous code fetching contact information) ...
  // Example: Inserting into a database
    // Replace with your database connection logic
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Process reply to contact inquiries
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reply_message']) && isset($_POST['id'])) {
        // Fetch data from the form
        $id = $_POST['id'];
        $reply_message = $_POST['reply_message'];

        // Fetch user email from the database
        $sql = "SELECT email FROM contact WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_email = $row['email'];

            // Send reply email using PHPMailer
         
            $mail = new PHPMailer(true);

            try {
                // SMTP configuration for sending reply email
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'akashgupta84957@gmail.com'; // Replace with your email address
                $mail->Password = 'wrsb kqxh znox uzir'; // Replace with your email password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Email content
                $mail->setFrom('akashgupta84957@gmail.com', 'Akash Gupta'); // Replace with your email and name
                $mail->addAddress($user_email);
                $mail->Subject = 'Reply to your inquiry';
                $mail->Body = $reply_message;

                $mail->send();
                header("location:admind.php");
            } catch (Exception $e) {
                echo 'Failed to send reply: ', $mail->ErrorInfo;
            }
        } else {
            echo "User email not found.";
        }
    }}
?>