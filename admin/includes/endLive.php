<?php

require 'dbc.php';

$x = $_GET['x'];

if ($x == 1) {

    mysqli_query($connect, "UPDATE liveInfo SET content='' WHERE sekcja='Przeciwnik'");

    mysqli_query($connect, "UPDATE liveInfo SET content=0 WHERE sekcja='isLive'");

    mysqli_query($connect, "UPDATE liveInfo SET content=0 WHERE sekcja='n'");

    mysqli_query($connect, "UPDATE liveInfo SET content=0 WHERE sekcja='p'");

    mysqli_query($connect, "DELETE FROM liveChat");

    header("location: ../live");
}
