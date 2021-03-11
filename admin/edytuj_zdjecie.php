<?php
    session_start();

    require 'includes/dbc.php';
 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login");
        exit;
    }
    else{
        if(isset($_POST['edytuj'])){

            $img = $_FILES['img']['name'];
            $extension = substr($img,strlen($img)-4,strlen($img));
            $allowed_extensions = array(".jpg","jpeg",".png");

            if(!in_array($extension,$allowed_extensions)){
                $error = "Nieprawidłowy format danych. Dozwolone formaty: jpg, jpeg, png.";
            }
            else{
                $newimg = md5($img).$extension;
                move_uploaded_file($_FILES["img"]["tmp_name"],"../img_posty/".$newimg);

                $id=intval($_GET['id']);
                $sql=mysqli_query($connect,"update posty set img='$newimg' where id='$id'");

                if($sql){
                $msg = "Pomyślnie zedytowano zdjęcie.";
                }
                else{
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
            <p class="main__header">Zmiana zdjęcia postu</p>

            <hr />

            <div class="main__formContainer">
            <?php if(@$msg){ ?>
                <div class="info succes noSelect" style="width: 310px;">
                <?php echo htmlentities($msg);?>
                </div>
            <?php } ?>

            <?php if(@$error){ ?>
                <div class="info error noSelect">
                <?php echo htmlentities($error);?></div>
            <?php } ?>

            <form name="edytujimg" method="post" enctype="multipart/form-data">
            <?php
                $postid=intval($_GET['id']);
                $result=mysqli_query($connect,"SELECT * FROM posty WHERE id=$postid");
                while(@$row=mysqli_fetch_array($result))
                {
            ?>
            
            <div class="main__formContainer__img">
                <h4 class="main__formContainer__label" style="margin: 20px 0;">Zdjęcie artykułu</h4>
                <img src="../img_posty/<?php echo htmlentities($row['img']);?>" alt="<?php echo htmlentities($row['title']);?>" width="300">

            <hr style="width: 100%;margin-top: 20px;"/>

            <h4 class="main__formContainer__label">Nowe zdjęcie artykułu</h4>
            <input type="file" name="img">

            <hr style="width: 100%;margin-top: 20px;"/>

            <input for="form" type="submit" value="Aktualizuj" name="edytuj" class="main__formContainer__submit"></input>
            <a href="edytowanie-postu?id=<?php echo htmlentities($postid);?>">Powrót</a>
            <?php } ?>
            </form>
                
            </div>
        </main>

<script src="../js/menu.js"></script>
<script>
    CKEDITOR.replace('textEditor');
</script>
</body>
</html>