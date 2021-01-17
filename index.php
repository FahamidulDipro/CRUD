<?php

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$insert = false;
$update = false;
$delete = false;



// Create a connection Die if connection was not successful
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry we failed to connect:" . mysqli_connect_error());
}


// Inserting Notes

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['serial_edit'])) {
        // Updating Notes
        $tit = $_POST['title_edit'];
        $desc = $_POST['desc_edit'];
        $serialNumber = $_POST['serial_edit'];

        // Sql querry to be executed
        $sql = "UPDATE `notes_table` SET `title` = '$tit' , `desc` = '$desc' WHERE `notes_table`.`Serial No.` = $serialNumber ";

        // Add a new trip to the Trip table in the database
        $result = mysqli_query($conn, $sql);


        if ($result) {
            $update = true;
        } else {
            echo "Notes can not be updatedd  because of this error --->" . mysqli_error($conn);
        }
    } else {
        // Variables to be inserted to the table
        $tit = $_POST['note_title'];
        $desc = $_POST['note_desc'];

        // Sql querry to be executed
        $sql = "INSERT INTO `notes_table` ( `title`, `desc`) VALUES ( '$tit', '$desc');";

        // Add a new trip to the Trip table in the database
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        } else {
            echo "Record was not inserted successfully because of this error --->" . mysqli_error($conn);
        }
    }
}
?>

<?php
// Deleting Notes
// if ($_SERVER['REQUEST_METHOD'] == "GET") {
//     $sno = $_GET['delete'];
//     $sql = "DELETE FROM `notes_table` WHERE `Serial No.` = '$sno' LIMIT 1";
//     $result = mysqli_query($conn, $sql);
//     $delete = true;
// }
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `notes_table` WHERE `Serial No.` = '$sno' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $delete = true;
}

?>

<?php

if ($update) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0 text-center" role="alert">
        <strong>Note Updated Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

?>
<?php

if ($insert) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0 text-center" role="alert">
        <strong>Note Inserted Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

?>
<?php

if ($delete) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0 text-center" role="alert">
        <strong>Note Deleted Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <title>My Notes</title>
</head>

<body onload="checkRefresh();">
    <!-- CSS Codes -->
    <style>
        button {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        @media only screen and (max-width:720px) {
            .table button {
                width: 100%;
            }

            table {
                /* width:90% !important; */
            }
        }
    </style>
    <!-- Edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
        Launch demo modal
    </button> -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit This Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/CRUD/index.php" method="post">
                        <input type="hidden" name="serial_edit" id="serial_edit">
                        <div class="mb-3">
                            <label for="note_title" class="form-label">Note Title</label>
                            <input type="text" name="title_edit" class="form-control" id="title_edit">

                        </div>
                        <div class="mb-3">
                            <label for="note_desc" class="form-label">Note Description</label>
                            <textarea class="form-control " name="desc_edit" id="desc_edit" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Update Note</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Navbar Starts-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info py-0 my-0">
        <div class="container-fluid">
            <a class="navbar-brand py-0 my-0" href="#"><img src="logo.png" height="100px;" width="100px;" alt="Note Icon" class="py-0 my-0"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../CRUD/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../CRUD/About.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../CRUD/contact.php">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Ends-->
    <!-- Form  Starts-->
    <div class="container my-5">
        <h1 class="text-center">Add Your Notes</h1>
        <form action="/CRUD/index.php" method="post">
            <div class="mb-3">
                <label for="note_title" class="form-label">Note Title</label>
                <input type="text" name="note_title" class="form-control" id="note_title">

            </div>
            <div class="mb-3">
                <label for="note_desc" class="form-label">Note Description</label>
                <textarea class="form-control " name="note_desc" id="note_desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-info">Add Note</button>
        </form>
    </div>
    <!-- Form  Endss-->
    <?php


    ?>
    <!-- Form Data Starts -->
    <div class="container">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `notes_table`";
                $result = mysqli_query($conn, $sql);


                for ($sl = 1; $row = mysqli_fetch_assoc($result); $sl++) {
                    // echo var_dump($row);
                    echo "    <tr>
                    <th scope='row'>$sl</th>
                    <td class='t'>" . $row["title"] . "</td>
                    <td class='d'>" . $row["desc"] . "</td>
                    <td>   <button class='btn btn-info read'>Read More</button> <button class ='btn btn-info edit' id=" . $row['Serial No.'] . ">Edit</button> 
                     <button class='btn btn-info delete' id=d" . $row['Serial No.'] . "> Delete</button></td>
                </tr>";
                }


                ?>


            </tbody>
        </table>
    </div>
    <!-- Form Data Ends -->

    <form name="refreshForm">
        <input type="hidden" name="visited" value="" />
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script>
        function checkRefresh() {

            // You may want to add code here special for
            // fresh page loads
            if (document.refreshForm.visited.value == "") {
                // This is a fresh page load
                document.refreshForm.visited.value = "1";

                // You may want to add code here special for
                // fresh page loads
            } else {
                // This is a page refresh
                window.location = '../CRUD';
                // Insert code here representing what to do on
                // a refresh
            }

            // This is a page refresh
           
            // Insert code here representing what to do on
            // a refresh

        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        var edits = document.querySelectorAll('.edit');
        var editModal = new bootstrap.Modal(document.getElementById('editModal'), {
            keyboard: false
        })
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                var title = e.target.parentNode.parentNode.getElementsByTagName('td')[0].innerText;
                var description = e.target.parentNode.parentNode.getElementsByTagName('td')[1].innerText;
                // console.log(title, description);
                document.querySelector('#title_edit').value = title;
                document.querySelector('#desc_edit').value = description;
                document.querySelector('#serial_edit').value = e.target.id;
                console.log(e.target.id);
                // $('#editModal').modal('toggle')

                editModal.toggle();


            })
        })
        var read = document.querySelectorAll('.read');
        Array.from(read).forEach((element) => {
            element.addEventListener("click", (e) => {

                var title = e.target.parentNode.parentNode.getElementsByTagName('td')[0].innerText;
                var description = e.target.parentNode.parentNode.getElementsByTagName('td')[1].innerText;
                window.location.href = '../CRUD/read_page.php?<div class="my-4"></div>' + title + '<br><hr><div class="my-4"></div>' + description;
                // alert(title); 
                localStorage.setItem('title', title);
                // e.target.h1.value = "Hi";
            })
        })


        var deletes = document.querySelectorAll('.delete');

        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                // var title = e.target.parentNode.parentNode.getElementsByTagName('td')[0].innerText;
                // var description = e.target.parentNode.parentNode.getElementsByTagName('td')[1].innerText;
                var sno = e.target.id.substr(1, );
                if (confirm("Are you sure you want to delete?")) {
                    window.location = `../CRUD/index.php?delete=${sno}`;
                    // Create a form and use Post request to submit the form
                } else {
                    // alert("Not deleted");
                }


            })
        })




        // var t = "Hey whats'up? Polapaan";
        // var t =  document.querySelector('.t').innerText;
        // localStorage.setItem('t', t);
        // // console.log(t);
        // sessionStorage.setItem("t", t);
    </script>




</body>

</html>