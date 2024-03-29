<?php
session_start();
    require_once '../components/db_connect.php';
    require_once '../components/file_upload.php';

// if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
//     header("Location: ../login.php");
//     exit;
// }
// if (isset($_SESSION['user'])) {
//     header("Location: ../index.php");
//     exit;
// }

if ($_POST) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $size = $_POST['size'];
    $uploadError = '';
    $picture = file_upload($_FILES['picture'], "animals");

    if ($size == 'none') {
        $sql = "INSERT INTO `animals` (name, age, photo) VALUES ('$name', $age,'$picture->fileName')";
    } else {
        $sql = "INSERT INTO `animals` (name, age, photo, size) VALUES ('$name', $age,'$picture->fileName', '$size')";
    }
    if (mysqli_query($connect, $sql)) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $age </td>
            </tr></table><hr>";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='./a-index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>