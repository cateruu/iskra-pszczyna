<?php
session_start();

require "includes/dbc.php";

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
    <title>Iskra Pszczyna | Dashboard - menadżer</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/menadzer.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <p class="main__header">Menadżer postów</p>
        <hr />
        <form name="kategoria" method="post" enctype="multipart/form-data" class="main__formContainer">
            <h4 class="main__formContainer__label">Kategoria</h4>
            <select name="category" id="" class="main__formContainer__input" required>
                <option value="" selected hidden>Wybierz kategorię</option>
                <?php

                $query = mysqli_query($connect, "select id,categoryName from  category");
                while ($result = mysqli_fetch_array($query)) {
                ?>

                    <option value="<?php echo htmlentities($result['categoryName']); ?>"><?php echo htmlentities($result['categoryName']); ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Wybierz" name="dodaj" class="main__formContainer__submit"></input>
        </form>
        <hr />

        <table class="main__table" cellspacing="0">
            <tr>
                <td>Tytuł</td>
                <td>Kategoria</td>
                <td>Operacje</td>
            </tr>
            <?php
            @$category = $_POST['category'];

            $result = mysqli_query($connect, "SELECT id, title, category FROM posty WHERE category='$category' ORDER BY id DESC");

            while ($row = mysqli_fetch_array($result)) {
                $id = $row[0];
                $title = $row[1];
                $category = $row[2];

                echo "<tr><td style='width: 75%'>$title</td><td style='width: 10%'>$category</td><td style='width: 5%;  text-align: center;'><a href='edytowanie-postu?id=$id'><i class='far fa-edit'></i></a><a href=usuniecie?id=$id><i class='far fa-trash-alt'></i></a></td></tr>";
            }
            ?>
        </table>
    </main>

    <script src="../js/menu.js"></script>
</body>

</html>