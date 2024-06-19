<?php
// Include your database connection file

$id = $_GET["id"];

// Replace these variables with your actual database credentials
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

// Fetch all contact information from the database
$sql = "SELECT * FROM contact WHERE id = $id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Contact Us Information</h2>

<?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Id</th>
            <th> Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Reply</th>
        </tr>
        
        <?php while ($rows = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['ph']; ?></td>
                <td><?php echo $rows['message']; ?></td>
               

                <td>
                    <form action='replymail.php' method='post'>
                        <input type='hidden' name='id' value='<?php echo $rows['id']; ?>'>
                        <textarea name='reply_message' placeholder='Write your reply here'></textarea><br>
                        <input type='submit' value='Send Reply'>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No contact information found.</p>
<?php endif; ?>

</body>
</html>