<?php

session_start();

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
} elseif (isset($_SESSION['user'])) {
    header("Location: home.php");
} elseif (isset($_SESSION['adm'])) {
    header("Location: home.php");
}

if (isset($_GET['logout'])) {

    unset($_SESSION['user']);
    unset($_SESSION['adm']);


    session_unset();

    session_destroy();

    header('Location: home.php');
    exit;
}
