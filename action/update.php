<?php
require_once "../components/db_connect.php";

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `animals` WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $address = $data['live'];
        $picture = $data['photo'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $vaccinated = $data['vaccinated'];
        
    }
} else {
    header("location: error.php");
}

$class = 'd-none';
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $id = $_POST['id'];
$uploadError = '';
$pictureArray = file_upload($_FILES['pictures']); 
$picture = $pictureArray->fileName;
if ($pictureArray->error === 0) {
    ($_POST["pictures"] == "avatar.png") ?: unlink("pictures/{$_POST["picture"]}");
    $sql = "UPDATE `animals` SET name = 'name', adress = '$address', email = '$email', description = '$description', picture = '$pictureArray->fileName' WHERE id = {$id}";
} else {
    $sql = "UPDATE `animals` SET name = '$name', address = '$address', email = '$email', description = '$description' WHERE id = {$id}";
}
if (mysqli_query($connect, $sql) === true) {
    $class = "alert alert-success";
    $message = "The record was successfully updated";
$uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
header("refresh:3;url=update.php?id={$id}");
} else {
    $class = "alert alert-danger";
    $message = "Error while updating record : <br>" . $connect->error;
$uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
header("refresh:3;url=update.php?id={$id}");
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
        </div>

        <h2>Update</h2>
        <img class='img-fluid rounded-start' src='../pictures/<?php echo $data['photo'] ?>' alt="<?php echo $name ?>" style="height :200px ;width:375px;object-fit:cover;">
        <form method="post" enctype="multipart/form-data" action= "a_update.php" >
            <table class="table">
                <tr>
                    <th> Name</th>
                    <td><input class="form-control" type="text" name="name" placeholder="First Name" value="<?php echo $name ?>" /></td>
                </tr>

                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="photo" /></td>
                </tr>

                <tr>
                    <th>address</th>
                    <td><input class="form-control" type="text" name="address" placeholder="<adress" value="<?php echo $address ?>" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class="form-control" type="text" name="description" placeholder="description" value="<?php echo $description ?>" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class="form-control" type="text" name="size" placeholder="Size" value="<?php echo $size ?>" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class="form-control" type="number" name="age" placeholder="Age" value="<?php echo $age ?>" /></td>
                </tr>
                <tr>
                    <th>vaccinated</th>
                    <td><input class="form-control" type="text" name="vaccinated" placeholder="vaccinated" value="<?php echo $vaccinated ?>" /></td>
                </tr>

                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="picture" value="<?php echo $photo ?>" />
                    <td><button name="submit" class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href="a-index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>