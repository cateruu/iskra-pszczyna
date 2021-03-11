<?php
session_start();

require "includes/dbc.php";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    if (isset($_POST['usun'])) {
        $id = $_GET['id'];

        $sql = mysqli_query($connect, "DELETE FROM teams WHERE id='$id'");

        if ($sql) {
            $msg = "Pomyślnie usunięto artykuł.";
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
    <title>Iskra Pszczyna | Dashboard - menadżer</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/menadzer.css">
    <link rel="stylesheet" href="../css/remove.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>

</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <p class="main__header">Czy na pewno chcesz usunąć ten artykuł?</p>
        <?php if (@$msg) { ?>
            <div class="info succes noSelect" style="width: 300px;">
                <?php echo htmlentities($msg); ?>
            </div>
        <?php } ?>

        <?php if (@$error) { ?>
            <div class="info error noSelect">
                <?php echo htmlentities($error); ?></div>
        <?php } ?>
        <div class="main__btnContainer">
            <form name="usunpost" method="post" id="form" enctype="multipart/form-data">
                <input type="submit" name="usun" value="Tak" id="usun">
            </form>
            <a href="druzyny" id="anuluj">Nie</a>
        </div>
        <a href="druzyny" class="main__a">Powrót</a>

    </main>

    <script src="../js/menu.js"></script>
</body>

</html>