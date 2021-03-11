<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    require 'dbc.php';

    $id = $_GET['id'];

    $sql = mysqli_query($connect, "DELETE FROM mecze WHERE id=$id");

    if ($sql) {
        header("location: ../nastepny-mecz");
    } else {
        echo "<scritp>alert('Coś poszło nie tak')</script>";
    }
}
