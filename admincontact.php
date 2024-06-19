<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  $con = mysqli_connect($servername, $username, $password, $dbname);
  if (!$con) {
    echo "connection error";
  }
  $sql = "SELECT * FROM `contact`";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-bordered'>
   <thead>
      <tr>
        <th scope='col'>Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Phone Number</th>
        <th scope='col'>Message</th>
        
        <th scope='col'>Action</th>
      </tr>
    </thead>
    <tbody class='table-group-divider'>";
    while ($rows = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <th scope='row'>{$rows['name']}</th>
        <td>{$rows['email']}</td>
        <td>{$rows['ph']}</td>
        <td>{$rows['message']}</td>
        <td><a name='' id='' class='btn btn-warning' href='contactmail.php?id={$rows['id']}' role='button'>Mail</a>
      
      </tr>";
    }
    echo "</tbody>
    </table>";

    echo "<center><form action='index.html'>
           
          </form></center>";
  } else {
    echo "0 data found";
  }
  ?>
</body>

</html>
