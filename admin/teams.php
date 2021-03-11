<?php
session_start();

require 'includes/dbc.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    if (isset($_POST['dodaj'])) {

        $nazwa = $_POST['nazwa'];
        $image = $_FILES['img']['name'];
        $extension = substr($image, strlen($image) - 4, strlen($image));
        $allowed_extensions = array(".png");

        if (!in_array($extension, $allowed_extensions)) {
            $error = "Nieprawidłowy format danych. Dozwolone formaty: png";
        } else {
            $newimage = md5($image) . $extension;
            move_uploaded_file($_FILES["img"]["tmp_name"], "../logo_teams/" . $newimage);

            $sql = mysqli_query($connect, "insert into teams(name, points, img) values('$nazwa','0','$newimage')");

            if ($sql) {
                $msg = "Pomyślnie dodano post";
            } else {
                $error = "Coś poszło nie tak. Spróbuj ponownie.";
            }
        }
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
    <link rel="stylesheet" href="../css/teams.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <div class="main__dodaj">
            <h1 class="main__dodaj__header">Dodaj drużynę</h1>

            <?php if (@$msg) { ?>
                <div class="info succes noSelect">
                    <?php echo htmlentities($msg); ?>
                </div>
            <?php } ?>

            <?php if (@$error) { ?>
                <div class="info error noSelect">
                    <?php echo htmlentities($error); ?></div>
            <?php } ?>

            <form name="dodajteam" method="post" enctype="multipart/form-data">
                <input type="text" name="nazwa" placeholder="Podaj nazwę drużyny">
                <p class="main__dodaj__imgText">Herb drużyny</p>
                <input type="file" name="img" id="img">
                <input type="submit" name="dodaj" value="Dodaj" class="main__dodaj__submit">
            </form>
        </div>
        <div class="main__edytuj">
            <h1 class="main__edytuj__header">Edytuj drużyny</h1>
            <div class="main__edytuj__container">
                <table cellspacing="0" class="main__edytuj__container__table">
                    <tr>
                        <td>Herb</td>
                        <td>Nazwa klubu</td>
                        <td>Akcje</td>
                    </tr>

                    <?php
                    $result = mysqli_query($connect, "SELECT id, img, name FROM teams");

                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row[0];
                        $img = $row[1];
                        $nazwa = $row[2];

                        echo "<tr>
                            <td style='width: 100px; text-align: center;'>
                            <img src='../logo_teams/$img'  height='40px'>
                            </td>
                            <td>$nazwa</td>
                            <td style='width: 5%;  text-align: center;'><a href='edit-klub?id=$id'><i class='far fa-edit'></i></a><a href=remove2.php?id=$id><i class='far fa-trash-alt'></i></a></td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>

    <script src="../js/menu.js"></script>
</body>

</html>