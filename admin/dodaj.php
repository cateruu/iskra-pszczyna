<?php
session_start();

require 'includes/dbc.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login");
    exit;
} else {
    $queryID = mysqli_query($connect, "SELECT id FROM posty ORDER BY id DESC LIMIT 1");

    while ($row = mysqli_fetch_array($queryID)) {
        $id = $row['id'];

        $post_id = ($id + 1);
    }

    if (isset($_POST['dodaj'])) {

        $title = $_POST['title'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $text = $_POST['textEditor'];
        $image = $_FILES['img']['name'];
        $extension = substr($image, strlen($image) - 4, strlen($image));
        $allowed_extensions = array(".jpg", "jpeg", ".png");

        for ($i = 0; $i < count($_FILES["galeria"]["name"]); $i++) {

            $galeriaName = $_FILES["galeria"]["name"][$i];
            $galeriaTmp = $_FILES["galeria"]["tmp_name"][$i];

            $extensionG = substr($galeriaName, strlen($galeriaName) - 4, strlen($galeriaName));
            $allowed_extensionsG = array(".jpg", "jpeg", ".png");

            if (!in_array($extensionG, $allowed_extensionsG)) {
                $error = "Nieprawidłowy format zdjęcia nr $i z galerii. Dozwolone formaty: jpg, jpeg, png.";
            } else {
                $newimageG = md5($galeriaName) . $extensionG;
                move_uploaded_file($galeriaTmp, "../img_posty/galeria/" . $newimageG);

                $sqlG = mysqli_query($connect, "insert into galeria(post_id,img) values('$post_id','$newimageG')");

                if ($sqlG) {
                    $msgG = "Pomyślnie dodano galerie";
                } else {
                    $errorG = "Coś poszło nie tak. Spróbuj ponownie. galeria";
                }
            }
        }

        if (!in_array($extension, $allowed_extensions)) {
            $error = "Nieprawidłowy format danych. Dozwolone formaty: jpg, jpeg, png.";
        } else {
            $newimage = md5($image) . $extension;
            move_uploaded_file($_FILES["img"]["tmp_name"], "../img_posty/" . $newimage);

            $sql = mysqli_query($connect, "insert into posty(title,category,description,content,data,img) values('$title','$category','$description','$text',now(),'$newimage')");

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
    <title>Iskra Pszczyna | Dashboard - dodanie</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/dodaj.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
</head>

<body>
    <section class="logo noSelect">Panel administratora</section>

    <?php include 'includes/navbar.php' ?>
    <?php include 'includes/aside.php' ?>

    <main class="main">
        <p class="main__header">Dodaj nowy post</p>

        <hr />

        <div class="main__formContainer">
            <?php if (@$msg) { ?>
                <div class="info succes noSelect">
                    <?php echo htmlentities($msg); ?>
                </div>
            <?php } ?>

            <?php if (@$error) { ?>
                <div class="info error noSelect">
                    <?php echo htmlentities($error); ?></div>
            <?php } ?>
            <?php if (@$errorG) { ?>
                <div class="info error noSelect">
                    <?php echo htmlentities($errorG); ?></div>
            <?php } ?>

            <form name="dodajpost" method="post" enctype="multipart/form-data">
                <h4 class="main__formContainer__label">Tytuł</h4>
                <input type="text" placeholder="Wprowadź tytuł" name="title" class="main__formContainer__input" required>

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

                <h4 class="main__formContainer__label">Krótki opis artykułu</h4>
                <textarea name="description" class="main__formContainer__textarea" required></textarea>

                <h4 class="main__formContainer__label">Tekst artykułu</h4>
                <textarea name="textEditor" required></textarea>

                <h4 class="main__formContainer__label">Zdjęcie artykułu</h4>
                <input type="file" name="img">

                <h4 class="main__formContainer__label">Galeria zdjęć (opcjonalnie)</h4>
                <input type="file" name="galeria[]" multiple>

                <input type="submit" value="Dodaj" name="dodaj" class="main__formContainer__submit"></input>

                <?php echo $post_id; ?>
            </form>
        </div>
    </main>

    <script src="../js/menu.js"></script>
    <script>
        CKEDITOR.replace('textEditor');
    </script>
</body>

</html>