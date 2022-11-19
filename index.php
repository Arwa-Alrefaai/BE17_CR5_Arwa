<?php
session_start();
require_once 'components/db_connect.php';

// if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
//     header("Location: .php");
//     exit;
// }
// if (isset($_SESSION['user'])) {
//     header("Location: index.php");
//     exit;
// }

$sql = "SELECT * FROM `animals`";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='pictures/" . $row['photo'] . "'</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['vaccinated'] . "</td>
            <td><a href='details.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Show details</button></a>

            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals Adoption</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 400px !important;
            height: 150px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
            margin-left: 50px !important;
            margin-right: 100px;
        }

        .hero {
            margin-left: 15%;
        }

        .h1 {
            color: #5e6e5e;
            text-align: center;
            font-family: 'Lobster', cursive;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>
    <img class="hero" src="pictures/hero.jpg">
    <p class='h1'>Find your new best friend </p><br><br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">All</a>
                    <a class="nav-link" href="junior.php">Junior Pets</a>
                    <a class="nav-link" href="senior.php">Senior Pets</a>
                </div>
            </div>
        </div>
    </nav>
    <table class='table table-striped'>
        <thead class='table-success'>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Age</th>
                <th>vaccinated</th>
                <th>More About</th>
            </tr>
        </thead>
        <tbody>
            <?= $tbody; ?>
        </tbody>
    </table>
    </div>
    <footer class=" p-5 bg-dark">
        <p class="h6 text-center text-white">Made by <a href="#">&#x24B8 Arwa Alrefaai</a></p>
    </footer>
</body>

</html>