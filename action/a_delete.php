<?php
require_once "../components/db_connect.php";

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture = "default.jpg" ?: unlink("../pictures/$picture"));
    $sql = "DELETE from `animals` WHERE id = $id";
    if (mysqli_query($connect, $sql)) {
        $class = "success";
        $message = "Record deleted";
    } else {
        $class = "danger";
        $message = "Record not deleted" . $conn->error;
    }
} else {
    header("location: ../error.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete pet</title>
    <?php require_once "../components/boot.php"; ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Delete request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
            <a href='a-index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>