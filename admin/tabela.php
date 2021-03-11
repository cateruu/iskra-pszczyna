<?php
session_start();

require 'includes/dbc.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iskra Pszczyna | Dashboard - tabela ligi</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/tabela.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <h4 class="main__header">Tabela ligowa</h4>
        <h4 class="main__header">
            <?php
            $sql = mysqli_query($connect, "SELECT * FROM tabela");

            while ($row = mysqli_fetch_array($sql)) {
                $id = $row[0];
                $nazwa = $row[1];

                echo $nazwa . "<a href='tabela-edit?n=$id'><i class='far fa-edit edit'></i></a>";
            }
            ?>
        </h4>

        <hr />

        <table class="main__table" cellspacing="0">
            <tr>
                <td style="width: 50px;text-align: center;">Pozycja</td>
                <td style="width: 100px; text-align: center;">Herb</td>
                <td>Drużyna</td>
                <td style='width: 25px'>W</td>
                <td style='width: 25px'>P</td>
                <td style='width: 25px'>R</td>
                <td style="width: 50px;text-align: center;">Punkty</td>
                <td style="width: 50px;text-align: center;">Akcje</td>
            </tr>
            <?php
            $result = mysqli_query($connect, "SELECT id, name, w, p, r, points, img FROM teams ORDER BY points DESC");

            $pozycja = 0;

            while ($row = mysqli_fetch_array($result)) {
                $id = $row[0];
                $nazwa = $row[1];
                $w = $row[2];
                $p = $row[3];
                $r = $row[4];
                $pkt = $row[5];
                $img = $row[6];
                $pozycja++;

                echo "<tr>
                            <td style='text-align: center;'>$pozycja</td>
                            <td style='width: 100px; text-align: center;'>
                            <img src='../logo_teams/$img'  height='40px'>
                            </td>
                            <td>$nazwa</td>
                            <td style='text-align: center;'>$w</td>
                            <td style='text-align: center;'>$p</td>
                            <td style='text-align: center;'>$r</td>
                            <td style='text-align: center;'>$pkt</td>
                            <td style='text-align: center;'><a href='tabela-edit?id=$id'><i class='far fa-edit'></i></a></td>
                        </tr>";
            }
            ?>

        </table>
    </main>

    <script src="../js/menu.js"></script>
</body>

</html>