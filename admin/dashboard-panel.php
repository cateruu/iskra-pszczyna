<?php
session_start();

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
    <title>Iskra Pszczyna | Dashboard</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" href="../css/dashboard.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <div class="main__landing">Panel administracyjny klubu MKS Iskra Pszczyna</div>
    </main>
    </div>

    <script src="../js/menu.js"></script>
</body>

</html>