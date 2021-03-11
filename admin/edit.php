<?php
    session_start();

    require 'includes/dbc.php';
 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login");
        exit;
    }
    else{
        if(isset($_POST['edytuj'])){

            $title = $_POST['title'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $text = $_POST['textEditor'];
            $postid = $_GET['id'];

                $sql=mysqli_query($connect,"update posty set title='$title',category='$category',description='$description',content='$text' where id='$postid'");

                if($sql){
                    $msg = "Pomyślnie zedytowano artykuł";
                }
                else{
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
            <p class="main__header">Edycja postu</p>

            <hr />

            <div class="main__formContainer">
            <?php if(@$msg){ ?>
                <div class="info succes noSelect">
                <?php echo htmlentities($msg);?>
                </div>
            <?php } ?>

            <?php if(@$error){ ?>
                <div class="info error noSelect">
                <?php echo htmlentities($error);?></div>
            <?php } ?>

            <?php
                $postid=$_GET['id'];
                $result=mysqli_query($connect,"SELECT * FROM posty WHERE id=$postid");
                while(@$row=mysqli_fetch_array($result))
                {
            ?>

            <form name="dodajpost" method="post" id="form" enctype="multipart/form-data">
                <h4 class="main__formContainer__label">Tytuł</h4>
                <input type="text" placeholder="Wprowadź tytuł" name="title" class="main__formContainer__input" value="<?php echo htmlentities($row['title']);?>" required>

                <h4 class="main__formContainer__label">Kategoria</h4>
                <select name="category" id="" class="main__formContainer__input" required>
                    <option selected hidden><?php echo htmlentities($row['category']);?></option>
                    <?php

                    $query=mysqli_query($connect,"select id,categoryName from  category");
                    while($result=mysqli_fetch_array($query))
                    {           
                    ?>

                    <option value="<?php echo htmlentities($result['categoryName']);?>"><?php echo htmlentities($result['categoryName']);?></option>
                    <?php } ?>
                </select>
                
                <h4 class="main__formContainer__label">Krótki opis artykułu</h4>
                <textarea name="description" class="main__formContainer__textarea" required><?php echo htmlentities($row['description']);?></textarea>

                <h4 class="main__formContainer__label">Tekst artykułu</h4>
                <textarea name="textEditor" required><?php echo htmlentities($row['content']);?></textarea>
            
            <div class="main__formContainer__img">
                <h4 class="main__formContainer__label" style="margin: 20px 0;">Zdjęcie artykułu</h4>
                <img src="../img_posty/<?php echo htmlentities($row['img']);?>" alt="<?php echo htmlentities($row['title']);?>" width="300">
                <a href="edytuj_zdjecie.php?id=<?php echo htmlentities($row['id']);?>" class="main__formContainer__img__a">Edytuj zdjęcie</a>
            </div>

            <hr style="width: 100%;margin-top: 20px;"/>

            <input type="submit" value="Aktualizuj" name="edytuj" class="main__formContainer__submit"></input>
            <?php } ?>
            </div>
            </form>
        </main>

<script src="../js/menu.js"></script>
<script>
    CKEDITOR.replace('textEditor');
</script>
</body>
</html>