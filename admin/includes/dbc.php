<?php

$servername = "localhost";
$user = "root";
$password = "";
$database = "iskra";

$connect = mysqli_connect($servername, $user, $password, $database);
mysqli_set_charset($connect, "utf8");

if ($connect === false) {
     die("Błąd bazy danych: " . mysqli_connect_error());
}
