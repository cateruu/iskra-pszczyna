<?php
require 'admin/includes/dbc.php';

$who = $_GET['q'];
$id = $_GET['id'];

if ($who == "Senior") {
    $header = "Seniorzy";
} elseif ($who == "Lekkoatletyka") {
    $header = "Lekkoatletyka";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MKS Iskra Pszczyna | Post</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="dist/css/slikStyle.css">
    <link href="dist/css/lightbox.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/junior.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/article.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'includes/menuPhone.php' ?>
    <?php include 'includes/menuPC.php' ?>
    <section class="main">
        <div class="main__header">
            <div class="main__header__img">
                <img src="content_img/logoBez.png">
            </div>
            <div class="main__header__text">
                <p class="main__header__text__header"><?php echo $header; ?></p>
                <p class="main__header__text__under">MKS Iskra Pszczyna</p>
            </div>
            <div class="main__header__hamburger">
                <div id="hamburger" onclick="pokazMenu()">
                    <div id="segregacja">
                        <div id="s1" class="s"></div>
                        <div id="s2" class="s"></div>
                        <div id="s3" class="s"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__content">
            <?php
            $sql = mysqli_query($connect, "SELECT * FROM posty WHERE  category='$who' AND id=$id");

            while ($row = mysqli_fetch_array($sql)) {
                $id = $row['id'];
                $title = $row['title'];
                $category = $row['category'];
                $desc = $row['description'];
                $content = $row['content'];
                $data = $row['data'];
                $img = $row['img'];
            ?>
                <div class="main__content__img">
                    <img src="img_posty/<?php echo $img ?>">
                </div>
                <div class="main__content__container">
                    <p class="main__content__container__header">
                        <?php echo $title ?>
                    </p>
                    <p class="main__content__container__text">
                        <?php echo $content; ?>
                    </p>
                </div>
                <div class="main__content__pokaz">
                    <div class="slick_galeria">
                    <?php } ?>

                    <?php
                    $query = mysqli_query($connect, "SELECT galeria.*, posty.id FROM galeria INNER JOIN posty ON galeria.post_id = posty.id WHERE galeria.post_id = $id");

                    while ($row = mysqli_fetch_array($query)) {
                        $id = $row['id'];
                        $img = $row['img'];
                    ?>
                        <div class="slick__slide">
                            <a href="img_posty/galeria/<?php echo $img; ?>" data-lightbox="galeria">
                                <img src="img_posty/galeria/<?php echo $img; ?>">
                            </a>
                        </div>
                    <?php }  ?>
                    </div>
                </div>
                <div class="main__footer">
                    <div class="opacity"></div>
                    <img src="content_img/Tlologa.png" alt="" class="main__container__footer__backLogo">
                    <img src="content_img/logoBez.png" alt="" class="main__container__footer__logo">
                    <div class="main__container__footer__upperText">
                        <p class="main__container__footer__upperText__text">
                            Prezes klubu <br />@mks.pl <br />123 123 123
                        </p>
                        <p class="main__container__footer__upperText__text2">
                            Menadżer akademi <br />email@mks.pl <br />123 123 123
                        </p>
                    </div>
                    <div class="main__container__footer__bottomText">
                        Adres biura <br /> Stadion Miejski Pszczyna <br /> ul. ks. Bogedaina 22
                    </div>
                    <footer>
                        &copy; 2020 Wszelkie prawa zastrzeżone
                    </footer>
                </div>
    </section>

    <script src="dist/lightbox-plus-jquery.min.js"></script>
    <script src="js/click.js" type="text/JavaScript"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/slick.js" type="text/JavaScript"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': "Zdjęcie %1 z %2",
            'alwaysShowNavOnTouchDevices': true
        })
    </script>
</body>

</html>