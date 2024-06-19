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
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <?php

        $conn = mysqli_connect("localhost", "root", "", "test");

        if (!$conn) {
            echo "Database not connected...";
        }


        $sql = "SELECT * FROM `users`";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo " <div class='container '>
    <div class='table-responsive'>
        <table class='table table-primary'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Username</th>
                    <th scope='col'>Password</th>
                    <th scope='col'>Action</th>
                </tr>
            </thead>
            <tbody>";

            while ($rows = mysqli_fetch_assoc($result)) {

                echo "        <tr class=''>
        <td scope='row'>{$rows['id']}</td>
        <td>{$rows['name']}</td>
        <td>{$rows['email']}</td>
        <td>{$rows['username']}</td>
        <td>{$rows['password']}</td>
        <td>
        <a
          name=''
          id=''
          class='btn btn-warning'
          href='edit.php?id={$rows['id']}'
          role='button'
          >Edit</a
        >
 

        <a
          name=''
          id=''
          class='btn btn-danger'
          href='delete.php?id={$rows['id']}'
          role='button'
          >Delete</a
        >
        </td>
        
        </tr>
     ";
            }
            echo "

            </tbody>
            </table>
            </div>
            
            </div>";
        } else {
            echo "0 Records Found ";

        }

        mysqli_close($conn);


        ?>


    </main>
    <footer>
        <!-- place footer here -->

<!-- 
        <div class='container'>
            <div class='row justify-content-center align-items-center g-2'>
                <div class='col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2'>
                    <div class='card'>
                        <img class='card-img-top' src='{$rows[' image']}' alt='Title' />
                        <div class='card-body'>
                            <h4 class='card-title'>{$rows['name']}</h4>
                            <p class='card-text'>{$rows['description']}</p>
                            <p class='card-text'>MRP: {$rows['mrp']} OFfer: {$rows['sp']}</p>
                            <center><a name='' id='' class='btn btn-primary' href='#' role='button'>View</a>
                                <a name='' id='' class='btn btn-primary' href='#' role='button'>Add to card</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">

                    <div class="card text-start">
                      <img class="card-img-top" src="holder.js/100px180/" alt="Title">
                      <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <p class="card-text">Body</p>
                      </div>
                    </div>



                </div>

            </div>
        </div> -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>