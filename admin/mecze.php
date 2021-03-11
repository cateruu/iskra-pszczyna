<?php
session_start();

require 'includes/dbc.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    if (isset($_POST['dodaj'])) {
        $przeciwnik = $_POST['przeciwnik'];
        $data = $_POST['data'];
        $wynik = "-:-";

        $newdata = date("Y-m-d H:i", strtotime($data));

        $sql = mysqli_query($connect, "INSERT INTO mecze( przeciwnik, data, wynik) VALUES('$przeciwnik', '$newdata', '$wynik')");

        if ($sql) {
            $msg = "Pomyślnie dodano mecz";
        } else {
            $error = "Coś poszło nie tak. Spróbuj ponownie.";
        }
    }

    if (isset($_POST['acceptw'])) {
        $id = $_POST['id'];
        $n = $_POST['n'];
        $p = $_POST['p'];
        $text = $n . " : " . $p;

        $sql = mysqli_query($connect, "UPDATE mecze SET wynik='$text' WHERE id=$id ");
    }
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iskra Pszczyna | Dashboard - mecze</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/mecze.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <div class="main__dodaj">
            <h1 class="main__dodaj__header">Dodaj mecz</h1>
            <div class="main__dodaj__content">
                <?php if (@$msg) { ?>
                    <div class="info succes noSelect">
                        <?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>

                <?php if (@$error) { ?>
                    <div class="info error noSelect">
                        <?php echo htmlentities($error); ?></div>
                <?php } ?>

                <form name="dodajmecz" method="post" enctype="multipart/form-data">
                    <select name="przeciwnik" class="main__dodaj__content__select" required>
                        <option value="" selected hidden>Wybierz Przeciwnika</option>
                        <?php

                        $query = mysqli_query($connect, "select id,name from teams");
                        while ($result = mysqli_fetch_array($query)) {
                        ?>

                            <option value="<?php echo htmlentities($result['name']); ?>"><?php echo htmlentities($result['name']); ?></option>
                        <?php } ?>
                    </select>
                    <input type="datetime-local" name="data" class="main__dodaj__content__date" required>
                    <input type="submit" name="dodaj" value="Dodaj" class="main__dodaj__content__submit">
                </form>
            </div>
        </div>

        <div class="main__container">
            <table cellspacing="0" class="main__container__coming">
                <tr>
                    <th colspan="4" style="font-size: 22px;">Nadchodzące mecze</th>
                </tr>
                <tr>
                    <td style="font-weight: 700;" colspan="2">Przeciwnik</td>
                    <td style="font-weight: 700; text-align: center;">Data</td>
                    <td style="font-weight: 700; text-align: center;">Akcje</td>
                </tr>
                <?php
                $sql = mysqli_query($connect, "SELECT mecze.*, teams.img FROM mecze INNER JOIN teams ON mecze.przeciwnik = teams.name WHERE data > now() ORDER BY data");

                while ($row = mysqli_fetch_array($sql)) {
                    $id = $row['id'];
                    $przeciwnik = $row['przeciwnik'];
                    $data = $row['data'];
                    $img = $row['img'];

                    $usun = "<a href='includes/remove.php?id=$id'><i class='far fa-trash-alt reset'></i></a>";

                    echo "
                    <tr>
                        <td style='text-align: center;'>
                        <img src='../logo_teams/$img'  height='30px'>
                        </td>
                        <td>$przeciwnik</td>
                        <td style='text-align: center;'>$data</td>
                        <td style='text-align: center;'>$usun</td>
                    </tr>
                    ";
                }
                ?>
            </table>

            <table cellspacing="0" class="main__container__past">
                <tr>
                    <th colspan="8" style="font-size: 22px;">Odbyte mecze</th>
                </tr>
                <tr>
                    <td style="font-weight: 700;" colspan="2">Przeciwnik</td>
                    <td style="font-weight: 700;text-align: center;">Data</td>
                    <td style="font-weight: 700;text-align: center;">W</td>
                    <td style="font-weight: 700;text-align: center;">P</td>
                    <td style="font-weight: 700;text-align: center;">R</td>
                    <td style="font-weight: 700;text-align: center;">Wynik</td>
                    <td style="font-weight: 700;text-align: center;">Akcja</td>
                </tr>
                <form name='wynikmeczu' method='post' enctype='multipart/form-data' id='wynikmeczu'>
                    <?php
                    $sql = mysqli_query($connect, "SELECT mecze.*, teams.img FROM mecze INNER JOIN teams ON mecze.przeciwnik = teams.name WHERE data < now()");

                    $optionW = "";
                    $optionP = "";
                    $optionR = "";

                    while ($row = mysqli_fetch_array($sql)) {
                        $id = $row['id'];
                        $przeciwnik = $row['przeciwnik'];
                        $data = $row['data'];
                        $w = $row['w'];
                        $p = $row['p'];
                        $r = $row['r'];
                        $wynik = $row['wynik'];
                        $img = $row['img'];

                        $reset = "<a href='includes/mecze.php?id=$id&&r=true'><i class='fas fa-undo-alt reset'></i></a>";
                        $usun = "<a href='includes/remove.php?id=$id'><i class='far fa-trash-alt reset'></i></a>";

                        if ($wynik == "-:-") {
                            $wynik = "
                            <form name='wynik' method='post' enctype='multipart/form-data' id='wynik'>
                            <input type='hidden' value='$id' name='id'>
                            <input type='number' name='n' style='width: 19px;'>:<input type='number' name='p' style='width: 19px;'><input type='submit' name='acceptw' value='+' class='accept'></form>";
                        } else {
                            $wynik = $row['wynik'];
                        }

                        if ($w == 0 && $p == 0 && $r == 0) {
                            $optionW =  "<a href='includes/mecze.php?id=$id&&c=1' class='aOption'><i class='fas fa-times' option></i></a>";
                            $optionP = "<a href='includes/mecze.php?id=$id&&c=2' class='aOption'><i class='fas fa-times' option></i></a>";
                            $optionR = "<a href='includes/mecze.php?id=$id&&c=3' class='aOption'><i class='fas fa-times' option></i></a>";
                        } elseif ($w == 1 && $p == 0 && $r == 0) {
                            $optionW = "<i class='fas fa-times'>";
                            $optionP = "";
                            $optionR = "";
                        } elseif ($w == 0 && $p == 1 && $r == 0) {
                            $optionW = "";
                            $optionP = "<i class='fas fa-times'>";
                            $optionR = "";
                        } elseif ($w == 0 && $p == 0 && $r == 1) {
                            $optionW = "";
                            $optionP = "";
                            $optionR = "<i class='fas fa-times'>";
                        } else {
                            $optionW = "";
                            $optionP = "";
                            $optionR = "";
                        }

                        echo "
                    <tr>
                        <td style='text-align: center;'>
                        <img src='../logo_teams/$img'  height='30px'>
                        </td>
                        <td>
                        $przeciwnik
                        </td>
                        <td style='text-align: center;'>$data</td>
                        <td style='text-align: center;'>$optionW</td>
                        <td style='text-align: center;'>$optionP</td>
                        <td style='text-align: center;'>$optionR</td>
                        <td style='text-align: center;'>$wynik</td>
                        <td style='text-align: center;'>$reset $usun</td>
                    </tr>
                    ";
                    }
                    ?>
                </form>
            </table>
        </div>
    </main>

    <script src="../js/menu.js"></script>
</body>

</html>