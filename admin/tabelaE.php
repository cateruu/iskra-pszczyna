<?php
session_start();

require 'includes/dbc.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    if (isset($_POST['edytuj'])) {
        $win = $_POST['win'];
        $lose = $_POST['lose'];
        $tie = $_POST['tie'];
        $pkt = $_POST['pkt'];
        $postid = $_GET['id'];

        $sql = mysqli_query($connect, "UPDATE teams SET w='$win', p='$lose', r='$tie', points='$pkt' WHERE id='$postid'");

        if ($sql) {
            header("location: liga");
        }
    }
    if (isset($_POST['tabela'])) {
        $nazwa = $_POST['nazwa'];
        $id = $_GET['n'];

        $sql = mysqli_query($connect, "UPDATE tabela SET nazwa = '$nazwa' WHERE id='$id'");

        if ($sql) {
            header("location: liga");
        }
    }
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
            $id = $_GET['n'];

            $sql = mysqli_query($connect, "SELECT * FROM tabela WHERE id=$id");

            while ($row = mysqli_fetch_array($sql)) {
                $id = $row[0];
                $nazwa = $row[1];

                echo "<form name='editnazwa' method='post' enctype='multipart/form-data' id='editnazwa'>
                <input type='text' name='nazwa' value='$nazwa' class='nazwa'><button type='submit' form='editnazwa' name='tabela' value='tabela' class='accept_edit'><i class='fas fa-check'></i></button>
                ";
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
            @$postid = intval($_GET['id']);
            $result = mysqli_query($connect, "SELECT id, name, w, p, r, points, img FROM teams WHERE id='$postid'");

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
                <form name='editklub' method='post' enctype='multipart/form-data' id='editklub'>
                            <td style='text-align: center;'>$pozycja</td>
                            <td style='width: 100px; text-align: center;'>
                            <img src='../logo_teams/$img'  height='40px'>
                            </td>
                            <td>$nazwa</td>
                            <td style='text-align: center;'><input name='win' type='number' value='$w' class='edit_input'></td>
                            <td style='text-align: center;'><input name='lose' type='number' value='$p' class='edit_input'></td>
                            <td style='text-align: center;'><input name='tie' type='number' value='$r' class='edit_input'></td>
                            <td style='text-align: center;'><input name='pkt' type='number' value='$pkt' class='edit_input'></td>
                            <td style='text-align: center;'><button type='submit' form='editklub' name='edytuj' value='edytuj' class='accept_edit'><i class='fas fa-check'></i></button></td>
                        </tr>";
            }
            ?>
            </form>
        </table>
    </main>

    <script src="../js/menu.js"></script>
</body>

</html>