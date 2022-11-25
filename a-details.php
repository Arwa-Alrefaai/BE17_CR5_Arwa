<?php
require_once "components/db_connect.php";

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $size = $data['size'];
        $photo = $data['photo'];
        $age = $data['age'];
        $live = $data['live'];
        $description = $data['description'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <link rel="stylesheet" type='text/css' href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Great+Vibes&display=swap" rel="stylesheet">
    <?php require_once "components/boot.php" ?>
    <style>
        .hero {
            margin-left: 15%;
        }
    </style>
</head>

<body>
    <img class="hero" src="pictures/hero.jpg">
    <header>
        <h1 class="text-center">

        </h1>
    </header>
    <main class="p-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="pictures/<?= $photo; ?>" class="img-fluid rounded-start" style="height:21rem;width:100%;object-fit:cover;" alt="Kitty">
                </div>
                <div class="col-md-8">
                    <h4 class='card-header text-center' name="name"><?= $name; ?></h4>
                    <div class='card-body p-2'>
                        <p class='card-text' name="name"><b> Name : </b><?= $name; ?></p>
                        <p class='card-text'><b> Age : </b> <?= $age; ?> </p>
                        <p class='card-text'><b> Size : </b> <?= $size; ?> </p>
                        <p class='card-text'><b> Adress : </b> <?= $live; ?></p>
                        <p class='card-text'><b> About This animal : </b> <?= $description; ?> </p>
                        <p class='card-text'></p>
                    </div>
                    <div class='card-footer text-center'>
                        <a class='btn btn-primary' href='action/a-index.php'>Go Back</a>
                        <a class='btn btn-success' href='adopt.php?id=$id'>Take me Home</a>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer class=" p-5 bg-dark">
        <p class="h6 text-center text-white">Made by <a href="#">&#x24B8 Arwa Alrefaai</a></p>
    </footer>
</body>

</html>