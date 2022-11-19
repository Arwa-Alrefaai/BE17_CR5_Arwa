<?php
session_start();

// if (isset($_SESSION['user'])) {
//     header("Location: index.php");
//     exit;
// }

// if (isset($_SESSION['adm'])) {
//     header("Location: a-index.php");
//     exit;
// }
require_once 'components/db_connect.php';

$error = false;
$email = $pass = $emailError = $passError = "";

if (isset($_POST['btn-login'])) {
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }

    if (!$error) {
        $password = hash('sha256', $pass);
        $sql = "SELECT * FROM `users` WHERE email= '$email' AND password = '$password'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            if ($row['status'] == "adm") {
                $_SESSION['adm'] = $row['id'];
                header("Location: a-index.php");
                exit;
            } else {
                $_SESSION['user'] = $row['id'];
                header("Location: index.php");
                exit;
            }
        } 
        else {
            $errMSG = "Incorrect Credentials, Try again...";
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
    <title>Login</title>
    <?php require_once "components/boot.php" ?>
    <link rel="stylesheet" type='text/css' href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
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
    <img src="pictures/hero.jpg" class="hero">
    <p class='h1'>Find your new best friend </p><br><br>
    <main class="p-5">
        <div class="login">
            <form class="w-50 m-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
                <h2 class="text-center" style="color: #5e6e6e;">Login</h2><br>
                <?php
                if (isset($errMSG)) {
                    echo $errMSG;
                }
                ?>
                <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email ?>" maxlength="40" />
                <span class="text-danger"><?php echo $emailError ?></span><br>

                <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                <span class="text-danger"><?php echo $passError ?></span>
                <button class="btn btn-block btn-primary m-3" type="submit" name="btn-login">Sign In</button>
                <hr />
                <span> Dont have an account? </span> <a href="register.php"> Click here to register</a>
            </form>
        </div>
    </main>
    <footer class="p-5 bg-dark ">
        <p class="h6 text-center text-white">Made by <a href="#">&#x24B8 Arwa Alrefaai</a></p>
    </footer>
</body>

</html>