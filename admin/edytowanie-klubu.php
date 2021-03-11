<?php
session_start();

require 'includes/dbc.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    if (isset($_POST['edytuj'])) {

        $nazwa = $_POST['nazwa'];
        $postid = $_GET['id'];

        $sql = mysqli_query($connect, "update teams set name='$nazwa' where id='$postid'");

        if ($sql) {
            $msg = "Pomyślnie zedytowano artykuł";
        } else {
            $error = "Coś poszło nie tak. Spróbuj ponownie.";
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

            <?php
            $postid = $_GET['id'];
            $result = mysqli_query($connect, "SELECT * FROM teams WHERE id=$postid");
            while (@$row = mysqli_fetch_array($result)) {
            ?>

                <form name="dodajteam" method="post" enctype="multipart/form-data">
                    <input type="text" name="nazwa" placeholder="Podaj nazwę drużyny" value="<?php echo htmlentities($row['name']); ?>">
                    <p class="main__dodaj__imgText">Zdjęcie drużyny</p>
                    <a href="edytuj_zdjecie2.php?id=<?php echo htmlentities($row['id']); ?>" class="main__dodaj__edit">Edytuj zdjęcie</a>
                    <input type="submit" name="edytuj" value="Edytuj" class="main__dodaj__submit">
                </form>

            <?php } ?>
        </div>
    </main>

    <script src="../js/menu.js"></script>
</body>

</html>