<?php
// session_start();
// require_once '../components/db_connect.php';

// if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
//     header("Location: ../index.php");
//     exit;
// }
// if (isset($_SESSION['user'])) {
//     header("Location: ../home.php");
//     exit;
// }

// $sql = "SELECT * FROM suppliers";
// $result = mysqli_query($connect, $sql);
// $suppliers = "";
// while ($row = mysqli_fetch_assoc($result)) {
//     $suppliers .= "<option value='{$row['supplierId']}'>{$row['sup_name']}</option>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title> Add Pet</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add Pet</legend>
        <form action="action/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Pet Name" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <th>address</th>
                    <td><input class='form-control' type="text" name="adress" placeholder="Adress" step="any" /></td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Description" step="any" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="size" step="any" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" placeholder="age" step="any" /></td>
                </tr>
                <tr>
                    <th>Vaccinated</th>
                    <td><input class='form-control' type="text" name="vaccinated" placeholder="vaccinated" step="any" /></td>
                </tr>

                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                    <td><a href="a-index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>