<?php
session_start();

// if (isset($_SESSION['user'])) {
//     header("Location: home.php");
//     exit;
// }

// if (isset($_SESSION['adm'])) {
//     header("Location: a-index.php");
//     exit;
// }
require_once 'components/db_connect.php';
require_once 'components/file_upload.php';

$error = false;

$fname = $lname = $address = $email = $pass = $picture = "";
$fnameError = $lnameError = $addressError = $emailError = $passError = $picError = $phoneError = "";


if (isset($_POST['btn-signup'])) {
    $fname = trim($_POST['fname']);
    $fname = strip_tags($fname);
    $fname = htmlspecialchars($fname);

    $lname = trim($_POST['lname']);
    $lname = strip_tags($lname);
    $lname = htmlspecialchars($lname);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $address = trim($_POST['address']);
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $uploadError = "";
    $picture = file_upload($_FILES['picture']);


    if (empty($fname) || empty($lname)) {
        $error = true;
        $fnameError = "Please enter your name and surname";
    } elseif (strlen($fname) < 3 || strlen($lname) < 3) {
        $error = true;
        $fnameError = "Name and surname must have at least 3 characters";
    } elseif (!preg_match("/^[a-zA-z]+$/", $fname) || !preg_match("/^[a-zA-z]+$/", $lname)) {
        $error = true;
        $fnameError = "Name and surname must contain only letters and no spaces";
    }

    if (empty($address)) {
        $error = true;
        $addressError = "Please enter your address";
    }
    if (empty($phone)) {
        $error = true;
        $phoneError = "Please enter your phone";
    }

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address";
    } else {
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided email already exists";
        }
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter the password";
    } elseif (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters";
    }

    $password = hash('sha256', $pass);

    if (!$error) {
        $query = "INSERT INTO `users`( password, address, email , picture) 
        VALUES ('$password','$address', '$email', '$picture->fileName')";

        $res = mysqli_query($connect, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        }
    }
}
mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type='text/css' href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Great+Vibes&display=swap" rel="stylesheet">
    <?php require_once "components/boot.php" ?>
    <style>
        .hero {
            margin-left: 15%;
        }

        .h1 {
            color: #5e6e5e;
            text-align: center;
            font-family: 'Lobster', cursive;
        }
    </style>
</head>

<body>

    <img class="hero" src="pictures/hero.jpg">
    <p class='h1'>Find your new best friend </p><br><br>
    <main class="p-5">
        <div class="container">
            <form class="w-75 m-auto" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
                <?php
                if (isset($errMSG)) {
                ?>
                    <div class="alert alert-<?php echo $errTyp ?>">
                        <p><?php echo $errMSG; ?></p>
                        <p><?php echo $uploadError; ?></p>
                    </div>
                <?php
                }
                ?>
                <h2>Sign Up...</h2>
                <hr />

                <input type="text" name="fname" class="form-control" placeholder="First name" maxlength="50" value="<?php echo $fname ?>" />
                <span class="text-danger"> <?php echo $fnameError; ?></span>
                <br>
                <input type="text" name="lname" class="form-control" placeholder="Last name" maxlength="50" value="<?php echo $lname ?>" />
                <span class="text-danger"> <?php echo $lnameError; ?></span>
                <br>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                <span class="text-danger"> <?php echo $emailError; ?></span>
                <br>
                <input type="text" name="address" class="form-control" placeholder="Enter Your address" maxlength="40" value="<?php echo $address ?>" />
                <span class="text-danger"> <?php echo $addressError; ?> </span>
                <br>
                <input type="text" name="phone" class="form-control" placeholder="Enter Your phone" maxlength="40" value="<?php echo $address ?>" />
                <span class="text-danger"><?php echo $phoneError; ?> </span>
                <br>
                <input class='form-control' type="file" name="picture">
                <span class="text-danger"> <?php echo $picError; ?></span>
                <br>
                <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                <span class="text-danger"><?php echo $passError; ?> </span>
                <hr />
                <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
                <hr />
                <a href="login.php">Sign in Here...</a>
            </form>
    </main>
    <footer class=" p-5 bg-dark">
        <p class="h6 text-center text-white">Made by <a href="#">&#x24B8 Arwa Alrefaai</a></p>
    </footer>
</body>

</html>