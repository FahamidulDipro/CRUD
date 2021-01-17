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

<body>


    <!-- Navbar Starts-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
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

    <div class="container">
        <h1 class="read_heading"></h1>
        <p class="read_description"></p>
    </div>


    <script>
        var heading = document.querySelector('.read_heading');
        // var title = localStorage.getItem("title");
        // console.log(title);
        // heading.innerHTML = title;

        // var t = sessionStorage.getItem("t");
        // heading.innerHTML = t;


        // var t = localStorage.getItem('t');
        // console.log(t);



        var queryString = location.search.substring(1);
        var a = decodeURIComponent(queryString);
        // var a = queryString.split("|");
        // console.log(queryString);
        console.log(a);
        heading.innerHTML = a;
    </script>
    <!-- Form Data Ends -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</body>

</html>