<?php
session_start();

require 'includes/dbc.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    if (isset($_POST['start'])) {
        $przeciwnik = $_POST['przeciwnik'];

        $sql = mysqli_query($connect, "UPDATE liveInfo SET content='$przeciwnik' WHERE sekcja='Przeciwnik'");

        mysqli_query($connect, "UPDATE liveInfo SET content=1 WHERE sekcja='isLive'");
    }

    if (isset($_POST['wynikDodaj'])) {
        $n = $_POST['n'];
        $p = $_POST['p'];

        $sql = mysqli_query($connect, "UPDATE liveInfo l1 JOIN liveInfo l2
        ON l1.sekcja = 'n' AND l2.sekcja = 'p'
       SET l1.content = $n,
           l2.content = $p;");
    }

    if (isset($_POST['wydarzenieDodaj'])) {
        $text = $_POST['wydarzenieInput'];
        $czas = date("H:i");

        $sql = mysqli_query($connect, "INSERT INTO `liveChat` (`id`, `czas`, `tekst`) VALUES (NULL, '$czas', '$text')");
    }
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iskra Pszczyna | Dashboard - drużyny</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/transmisja.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <h1 class="main__header">Transmisja na żywo</h1>
        <hr />

        <div class="main__live">
            <form name="stream" method="post" enctype="multipart/form-data" class="main__live__form">
                <select name="przeciwnik" class="main__live__info" required>
                    <option value="" selected hidden>Wybierz Przeciwnika</option>
                    <?php

                    $query = mysqli_query($connect, "select id,name from teams");
                    while ($result = mysqli_fetch_array($query)) {
                    ?>

                        <option value="<?php echo htmlentities($result['name']); ?>"><?php echo htmlentities($result['name']); ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Rozpocznij live" class="main__live__start" name="start">
            </form>
        </div>

        <?php
        $sql = mysqli_query($connect, "SELECT content FROM liveInfo WHERE sekcja='Przeciwnik'");

        while ($row = mysqli_fetch_array($sql)) {
            $przeciwnik = $row[0];
        }

        if ($przeciwnik == "") {
        } else {
        ?>
            <div class="main__content">
                <a href="includes/endLive.php?x=1" class="main__content__end">Zakończ live</a>


                <?php
                $sql = mysqli_query($connect, "SELECT * FROM liveInfo WHERE sekcja='n'");

                while ($row = mysqli_fetch_array($sql)) {
                    $nasze = $row['content'];
                }

                $query = mysqli_query($connect, "SELECT * FROM liveInfo WHERE sekcja='p'");

                while ($row = mysqli_fetch_array($query)) {
                    $ich = $row['content'];
                }
                ?>

                <h1 class="main__content__wynikH">Wynik</h1>
                <form name="wynik" method="post" enctype="multipart/form-data" class="main__content__wynik">
                    <input type='number' name='n' value="<?php echo $nasze; ?>" class="main__content__wynik__input">:<input type='number' name='p' value="<?php echo $ich; ?>" class="main__content__wynik__input"><input type='submit' name='wynikDodaj' value='+' class="main__content__wynik__submit">
                </form>
                <h1 class="main__content__wynikH">Wydarzenie</h1>
                <form name="wydarzenie" method="post" enctype="multipart/form-data" class="main__content__wydarzenie">
                    <input type='text' name='wydarzenieInput' class="main__content__wydarzenie__input">
                    <input type='submit' name='wydarzenieDodaj' value='+' class="main__content__wynik__submit">
                </form>
            </div>
        <?php } ?>
        <hr />

        <h1 class="main__header">Live wydarzenia</h1>
        <div class="main__wydarzenia">
            <?php
            $sql = mysqli_query($connect, "SELECT DATE_FORMAT(czas, '%H:%i') AS formated_czas, tekst FROM liveChat");

            while ($row = mysqli_fetch_array($sql)) {
                $czas = $row['formated_czas'];
                $text = $row['tekst'];

                echo "
                    <p class='main__wydarzenia__text'>
                    <b>$czas</b>
                    $text
                    </p>
                ";
            }
            ?>
        </div>
    </main>

    <script src="../js/menu.js"></script>
</body>

</html>