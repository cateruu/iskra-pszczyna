<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    require 'dbc.php';

    $id = $_GET['id'];
    $co = $_GET['c'];
    $reset = $_GET['r'];

    if ($co == 1) {
        $sql = mysqli_query($connect, "UPDATE mecze SET w=1 WHERE id=$id");

        if ($sql) {
            header("location: ../nastepny-mecz");
        }
    } elseif ($co == 2) {
        $sql = mysqli_query($connect, "UPDATE mecze SET p=1 WHERE id=$id");

        if ($sql) {
            header("location: ../nastepny-mecz");
        }
    } elseif ($co == 3) {
        $sql = mysqli_query($connect, "UPDATE mecze SET r=1 WHERE id=$id");

        if ($sql) {
            header("location: ../nastepny-mecz");
        }
    }

    if ($reset == true) {
        $sql = mysqli_query($connect, "UPDATE mecze SET w=0, p=0, r=0, wynik='-:-' WHERE id=$id");

        if ($sql) {
            header("location: ../nastepny-mecz");
        }
    }
}
