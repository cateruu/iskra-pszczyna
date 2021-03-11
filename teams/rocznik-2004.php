<?php
require '../admin/includes/dbc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MKS Iskra Pszczyna | Rocznik - 2004/2005</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../dist/css/glide.core.css">
    <link rel="stylesheet" href="../dist/css/glideStyle.css">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/junior.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/rocznik.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include '../includes/menuPhone.php' ?>
    <?php include '../includes/menuPCr.php' ?>
    <section class="main">
        <div class="main__header">
            <div class="main__header__img">
                <img src="../content_img/logoBez.png">
            </div>
            <div class="main__header__text">
                <p class="main__header__text__header">AKADEMIA</p>
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
        <div class="main__teamimg">
            <img src="../content_img/druzyna.jpg" class="main__teamimg__img">
        </div>
        <div class="main__contact">
            <p class="main__contact__header">Drużyna 2004/2005</p>
            <p class="main__contact__text">
                Przykładowy opis drużyny.
                Przykładowy opis drużyny.
                Przykładowy opis drużyny.
                Przykładowy opis drużyny.
            </p>
        </div>
        <div class="main__aktualnosci">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php
                        $sql = mysqli_query($connect, "SELECT * FROM posty WHERE category='Lekkoatletyka' ORDER BY data DESC, id DESC LIMIT 3");

                        while ($row = mysqli_fetch_array($sql)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $desc = $row['description'];
                            $category = $row['category'];
                            $img = $row['img'];
                        ?>
                            <li class="glide__slide">
                                <a href="../post?q=<?php echo $category; ?>&&id=<?php echo $id ?>">
                                    <div class="glide__opacity"></div>
                                    <img src="../img_posty/<?php echo $img ?>">
                                    <p class="glide__slide__header"><?php echo $title ?></p>
                                    <p class="glide__slide__desc"><?php echo $desc ?></p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-chevron-left"></i></button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="glide__bullets" data-glide-el="controls[nav]">
                    <button class="glide__bullet" data-glide-dir="=0"></button>
                    <button class="glide__bullet" data-glide-dir="=1"></button>
                    <button class="glide__bullet" data-glide-dir="=2"></button>
                </div>
            </div>
        </div>
        <div class="main__trening">
            <p class="main__trening__header">
                Treningi
            </p>
            <p class="main__trening__text">
                Opis treningów, jak przebiegają ciekawe informacje itp. Opis treningów, jak przebiegają ciekawe informacje itp. Opis treningów, jak przebiegają ciekawe informacje itp. Opis treningów, jak przebiegają ciekawe informacje itp.
            </p>
        </div>
        <div class="main__biuro">
            <div class="main__biuro__header">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="360" height="50" viewBox="0 0 360 50" class="main__biuro__header__svg">
                    <defs>
                        <clipPath id="clip-iPad_11">
                            <rect width="360" height="50" />
                        </clipPath>
                    </defs>
                    <g id="iPad_11" data-name="iPad – 11" clip-path="url(#clip-iPad_11)">
                        <rect width="360" height="50" fill="#fff" />
                        <g id="Group_12" data-name="Group 12" transform="translate(-420)">
                            <rect id="Rectangle_208" data-name="Rectangle 208" width="1200" height="50" fill="#456dc8" />
                            <rect id="Rectangle_213" data-name="Rectangle 213" width="67" height="50" transform="translate(420)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_212" data-name="Rectangle 212" width="26" height="25" transform="translate(487)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_353" data-name="Rectangle 353" width="26" height="25" transform="translate(934)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_211" data-name="Rectangle 211" width="26" height="25" transform="translate(513 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_349" data-name="Rectangle 349" width="26" height="25" transform="translate(791)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_352" data-name="Rectangle 352" width="26" height="25" transform="translate(960 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_354" data-name="Rectangle 354" width="26" height="25" transform="translate(1064)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_355" data-name="Rectangle 355" width="26" height="25" transform="translate(1064 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_356" data-name="Rectangle 356" width="26" height="25" transform="translate(1038)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_358" data-name="Rectangle 358" width="26" height="25" transform="translate(999 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_350" data-name="Rectangle 350" width="13" height="13" transform="translate(817 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_351" data-name="Rectangle 351" width="13" height="13" transform="translate(986 12)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_357" data-name="Rectangle 357" width="13" height="13" transform="translate(1025 25)" fill="#172e6a" opacity="0.18" />
                            <g id="Component_2_44" data-name="Component 2 – 44" transform="translate(661)">
                                <rect id="Rectangle_111" data-name="Rectangle 111" width="67" height="50" transform="translate(52)" fill="#172e6a" opacity="0.18" />
                                <rect id="Rectangle_114" data-name="Rectangle 114" width="26" height="25" transform="translate(26)" fill="#172e6a" opacity="0.18" />
                                <rect id="Rectangle_115" data-name="Rectangle 115" width="26" height="25" transform="translate(0 25)" fill="#172e6a" opacity="0.18" />
                            </g>
                            <g id="Component_2_45" data-name="Component 2 – 45" transform="translate(1090)">
                                <rect id="Rectangle_111-2" data-name="Rectangle 111" width="58" height="50" transform="translate(52)" fill="#172e6a" opacity="0.18" />
                                <rect id="Rectangle_114-2" data-name="Rectangle 114" width="26" height="25" transform="translate(26)" fill="#172e6a" opacity="0.18" />
                                <rect id="Rectangle_115-2" data-name="Rectangle 115" width="26" height="25" transform="translate(0 25)" fill="#172e6a" opacity="0.18" />
                            </g>
                            <g id="Component_2_46" data-name="Component 2 – 46" transform="translate(830)">
                                <rect id="Rectangle_111-3" data-name="Rectangle 111" width="52" height="50" transform="translate(52)" fill="#172e6a" opacity="0.18" />
                                <rect id="Rectangle_114-3" data-name="Rectangle 114" width="26" height="25" transform="translate(26)" fill="#172e6a" opacity="0.18" />
                                <rect id="Rectangle_115-3" data-name="Rectangle 115" width="26" height="25" transform="translate(0 25)" fill="#172e6a" opacity="0.18" />
                            </g>
                            <rect id="Rectangle_362" data-name="Rectangle 362" width="26" height="25" transform="translate(240)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_360" data-name="Rectangle 360" width="26" height="25" transform="translate(383)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_363" data-name="Rectangle 363" width="26" height="25" transform="translate(214 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_368" data-name="Rectangle 368" width="26" height="25" transform="translate(110)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_369" data-name="Rectangle 369" width="26" height="25" transform="translate(110 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_367" data-name="Rectangle 367" width="26" height="25" transform="translate(136)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_365" data-name="Rectangle 365" width="26" height="25" transform="translate(175 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_361" data-name="Rectangle 361" width="13" height="13" transform="translate(370 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_364" data-name="Rectangle 364" width="13" height="13" transform="translate(201 12)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_366" data-name="Rectangle 366" width="13" height="13" transform="translate(162 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_111-4" data-name="Rectangle 111" width="58" height="50" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_114-4" data-name="Rectangle 114" width="26" height="25" transform="translate(58)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_115-4" data-name="Rectangle 115" width="26" height="25" transform="translate(84 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_111-5" data-name="Rectangle 111" width="52" height="50" transform="translate(266)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_114-5" data-name="Rectangle 114" width="26" height="25" transform="translate(318)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_115-5" data-name="Rectangle 115" width="26" height="25" transform="translate(344 25)" fill="#172e6a" opacity="0.18" />
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="50" viewBox="0 0 600 50" class="main__biuro__header__svg2">
                    <defs>
                        <clipPath id="clip-iPad_12">
                            <rect width="600" height="50" />
                        </clipPath>
                    </defs>
                    <g id="iPad_12" data-name="iPad – 12" clip-path="url(#clip-iPad_12)">
                        <rect width="600" height="50" fill="#fff" />
                        <rect id="Rectangle_326" data-name="Rectangle 326" width="1200" height="50" fill="#456dc8" />
                        <rect id="Rectangle_207" data-name="Rectangle 207" width="52" height="50" fill="#172e6a" opacity="0.18" />
                        <rect id="Rectangle_206" data-name="Rectangle 206" width="26" height="25" transform="translate(52)" fill="#172e6a" opacity="0.18" />
                        <rect id="Rectangle_205" data-name="Rectangle 205" width="26" height="25" transform="translate(78 25)" fill="#172e6a" opacity="0.18" />
                        <rect id="Rectangle_204" data-name="Rectangle 204" width="13" height="13" transform="translate(104 12)" fill="#172e6a" opacity="0.18" />
                        <g id="Component_2_49" data-name="Component 2 – 49" transform="translate(483)">
                            <rect id="Rectangle_111" data-name="Rectangle 111" width="52" height="50" transform="translate(65)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_114" data-name="Rectangle 114" width="26" height="25" transform="translate(39)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_115" data-name="Rectangle 115" width="26" height="25" transform="translate(13 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_116" data-name="Rectangle 116" width="13" height="13" transform="translate(0 12)" fill="#172e6a" opacity="0.18" />
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1200" height="50" viewBox="0 0 1200 50" class="main__biuro__header__svg3">
                    <defs>
                        <clipPath id="clip-iPad_12">
                            <rect width="1200" height="50" />
                        </clipPath>
                    </defs>
                    <g id="iPad_12" data-name="iPad – 12" clip-path="url(#clip-iPad_12)">
                        <rect width="1200" height="50" fill="#fff" />
                        <rect id="Rectangle_326" data-name="Rectangle 326" width="1200" height="50" fill="#456dc8" />
                        <rect id="Rectangle_207" data-name="Rectangle 207" width="52" height="50" fill="#172e6a" opacity="0.18" />
                        <rect id="Rectangle_206" data-name="Rectangle 206" width="26" height="25" transform="translate(52)" fill="#172e6a" opacity="0.18" />
                        <rect id="Rectangle_205" data-name="Rectangle 205" width="26" height="25" transform="translate(78 25)" fill="#172e6a" opacity="0.18" />
                        <rect id="Rectangle_204" data-name="Rectangle 204" width="13" height="13" transform="translate(104 12)" fill="#172e6a" opacity="0.18" />
                        <g id="Component_2_49" data-name="Component 2 – 49" transform="translate(1083)">
                            <rect id="Rectangle_111" data-name="Rectangle 111" width="52" height="50" transform="translate(65)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_114" data-name="Rectangle 114" width="26" height="25" transform="translate(39)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_115" data-name="Rectangle 115" width="26" height="25" transform="translate(13 25)" fill="#172e6a" opacity="0.18" />
                            <rect id="Rectangle_116" data-name="Rectangle 116" width="13" height="13" transform="translate(0 12)" fill="#172e6a" opacity="0.18" />
                        </g>
                    </g>
                </svg>


                <p class="main__biuro__header__text">Terminarz</p>
            </div>
            <div class="main__biuro__container">
                <div class="main__biuro__container__stan">
                    <div class="main__biuro__container__stan__osoba">
                        <p class="main__biuro__container__stan__osoba__header">Poniedziałek</p>
                        <p class="main__biuro__container__stan__osoba__text">14:00 - 18:00</p>
                    </div>
                    <div class="main__biuro__container__stan__osoba">
                        <p class="main__biuro__container__stan__osoba__header">Wtorek</p>
                        <p class="main__biuro__container__stan__osoba__text">14:00 - 18:00</p>
                    </div>
                    <div class="main__biuro__container__stan__osoba">
                        <p class="main__biuro__container__stan__osoba__header">Środa</p>
                        <p class="main__biuro__container__stan__osoba__text">14:00 - 18:00</p>
                    </div>
                    <div class="main__biuro__container__stan__osoba">
                        <p class="main__biuro__container__stan__osoba__header">Czwartek</p>
                        <p class="main__biuro__container__stan__osoba__text">14:00 - 18:00</p>
                    </div>
                    <div class="main__biuro__container__stan__osoba" style="border-bottom: none;">
                        <p class="main__biuro__container__stan__osoba__header">Piątek</p>
                        <p class="main__biuro__container__stan__osoba__text">14:00 - 18:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__trener">
            <p class="main__trener__header">
                Nasz trener
            </p>
            <img src="../content_img/trener.jpg">
            <p class="main__trener__text">
                opis trenera opis trenera opis trenera opis treneraopis treneraopis treneraopis treneraopis trenera opis treneraopis treneraopis trenera
            </p>
            <p class="main__trener__telefon">
                Telefon: 123 456 789
            </p>
        </div>
        <div class="main__sponsor">
            <svg data-name="Group 12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 50" class="main__sponsor__svg">
                <rect id="Rectangle_208" data-name="Rectangle 208" width="1200" height="50" fill="#456dc8" />
                <rect id="Rectangle_213" data-name="Rectangle 213" width="52" height="50" transform="translate(435)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_212" data-name="Rectangle 212" width="26" height="25" transform="translate(487)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_348" data-name="Rectangle 348" width="26" height="25" transform="translate(765 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_353" data-name="Rectangle 353" width="26" height="25" transform="translate(934)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_211" data-name="Rectangle 211" width="26" height="25" transform="translate(513 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_349" data-name="Rectangle 349" width="26" height="25" transform="translate(791)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_352" data-name="Rectangle 352" width="26" height="25" transform="translate(960 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_354" data-name="Rectangle 354" width="26" height="25" transform="translate(1064)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_355" data-name="Rectangle 355" width="26" height="25" transform="translate(1064 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_356" data-name="Rectangle 356" width="26" height="25" transform="translate(1038)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_358" data-name="Rectangle 358" width="26" height="25" transform="translate(999 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_350" data-name="Rectangle 350" width="13" height="13" transform="translate(817 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_351" data-name="Rectangle 351" width="13" height="13" transform="translate(986 12)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_357" data-name="Rectangle 357" width="13" height="13" transform="translate(1025 25)" fill="#172e6a" opacity="0.18" />
                <g id="Component_2_39" data-name="Component 2 – 39" transform="translate(648)">
                    <rect id="Rectangle_111" data-name="Rectangle 111" width="52" height="50" transform="translate(65)" fill="#172e6a" opacity="0.18" />
                    <rect id="Rectangle_114" data-name="Rectangle 114" width="26" height="25" transform="translate(39)" fill="#172e6a" opacity="0.18" />
                    <rect id="Rectangle_115" data-name="Rectangle 115" width="26" height="25" transform="translate(13 25)" fill="#172e6a" opacity="0.18" />
                </g>
                <g id="Component_2_43" data-name="Component 2 – 43" transform="translate(1090)">
                    <rect id="Rectangle_111-2" data-name="Rectangle 111" width="58" height="50" transform="translate(52)" fill="#172e6a" opacity="0.18" />
                    <rect id="Rectangle_114-2" data-name="Rectangle 114" width="26" height="25" transform="translate(26)" fill="#172e6a" opacity="0.18" />
                    <rect id="Rectangle_115-2" data-name="Rectangle 115" width="26" height="25" transform="translate(0 25)" fill="#172e6a" opacity="0.18" />
                </g>
                <g id="Component_2_41" data-name="Component 2 – 41" transform="translate(830)">
                    <rect id="Rectangle_111-3" data-name="Rectangle 111" width="52" height="50" transform="translate(52)" fill="#172e6a" opacity="0.18" />
                    <rect id="Rectangle_114-3" data-name="Rectangle 114" width="26" height="25" transform="translate(26)" fill="#172e6a" opacity="0.18" />
                    <rect id="Rectangle_115-3" data-name="Rectangle 115" width="26" height="25" transform="translate(0 25)" fill="#172e6a" opacity="0.18" />
                </g>
                <rect id="Rectangle_359" data-name="Rectangle 359" width="26" height="25" transform="translate(409 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_362" data-name="Rectangle 362" width="26" height="25" transform="translate(240)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_360" data-name="Rectangle 360" width="26" height="25" transform="translate(383)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_363" data-name="Rectangle 363" width="26" height="25" transform="translate(214 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_368" data-name="Rectangle 368" width="26" height="25" transform="translate(110)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_369" data-name="Rectangle 369" width="26" height="25" transform="translate(110 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_367" data-name="Rectangle 367" width="26" height="25" transform="translate(136)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_365" data-name="Rectangle 365" width="26" height="25" transform="translate(175 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_361" data-name="Rectangle 361" width="13" height="13" transform="translate(370 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_364" data-name="Rectangle 364" width="13" height="13" transform="translate(201 12)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_366" data-name="Rectangle 366" width="13" height="13" transform="translate(162 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_111-4" data-name="Rectangle 111" width="58" height="50" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_114-4" data-name="Rectangle 114" width="26" height="25" transform="translate(58)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_115-4" data-name="Rectangle 115" width="26" height="25" transform="translate(84 25)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_111-5" data-name="Rectangle 111" width="52" height="50" transform="translate(266)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_114-5" data-name="Rectangle 114" width="26" height="25" transform="translate(318)" fill="#172e6a" opacity="0.18" />
                <rect id="Rectangle_115-5" data-name="Rectangle 115" width="26" height="25" transform="translate(344 25)" fill="#172e6a" opacity="0.18" />
            </svg>
            <div class="main__sponsor__bg"></div>
            <p class="main__sponsor__header">Sponsorzy</p>
            <div class="main__sponsor__images slajder">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <a href="https://www.facebook.com/Kwiaciarnia-Irys-1392906964328152/" target="_blank">
                                <img src="../content_img/s1.png" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <img src="../content_img/strategiczny.png" id="glide__img">
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.dokawa.com.pl/" target="_blank">
                                <img src="../content_img/s3.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.drogrod.pl/" target="_blank">
                                <img src="../content_img/s4.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.dzwigamy.pl/" target="_blank">
                                <img src="../content_img/s5.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.facebook.com/SportlandPszczyna" target="_blank">
                                <img src="../content_img/s6.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.k2-pszczyna.pl/" target="_blank">
                                <img src="../content_img/s7.png" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://osmpszczyna.pl/" target="_blank">
                                <img src="../content_img/s8.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.patentus.eu/" target="_blank">
                                <img src="../content_img/s9.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.piekarniajasiek.pl/" target="_blank">
                                <img src="../content_img/s10.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.pszczyna.info.pl/" target="_blank">
                                <img src="../content_img/s11.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.ziobro.com.pl/" target="_blank">
                                <img src="../content_img/s12.png" alt="" id="glide__img">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main__partner">
            <div class="main__partner__bg"></div>
            <p class="main__partner__header">Partnerzy</p>
            <div class="main__partner__images slajderPartner">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <a href="http://akademiamp.eu/" target="_blank">
                                <img src="../content_img/p1.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://centrumar.pl/" target="_blank">
                                <img src="../content_img/p2.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://efce.com.pl/" target="_blank">
                                <img src="../content_img/p3.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.moris.pszczyna.pl/" target="_blank">
                                <img src="../content_img/p4.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.pless.pl/" target="_blank">
                                <img src="../content_img/p5.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.msit.gov.pl/" target="_blank">
                                <img src="../content_img/p6.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://posir.pszczyna.pl/" target="_blank">
                                <img src="../content_img/p7.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.powiat.pszczyna.pl/" target="_blank">
                                <img src="../content_img/powiat.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.pszczyna.pl/" target="_blank">
                                <img src="../content_img/p9.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://razemdlapilki.com/" target="_blank">
                                <img src="../content_img/p10.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://sportowafundacja.pl/" target="_blank">
                                <img src="../content_img/p11.png" alt="" id="glide__img">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main__footer">
            <div class="opacity"></div>
            <img src="../content_img/Tlologa.png" alt="" class="main__container__footer__backLogo">
            <img src="../content_img/logoBez.png" alt="" class="main__container__footer__logo">
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

    <script src="../dist/glide.min.js" type="text/JavaScript"></script>
    <script>
        new Glide('.glide', {
            type: 'carousel',
            autoplay: 5000,
            animationDuration: 500
        }).mount();
    </script>
    <script>
        new Glide('.slajder', {
            type: 'carousel',
            autoplay: 1,
            animationDuration: 5000,
            animationTimingFunc: 'linear',
            perView: 6,
            breakpoints: {
                1200: {
                    perView: 3
                },
                750: {
                    perView: 2
                }
            }
        }).mount()
    </script>
    <script>
        new Glide('.slajderPartner', {
            type: 'carousel',
            autoplay: 1,
            animationDuration: 5000,
            animationTimingFunc: 'linear',
            perView: 6,
            direction: 'rtl',
        }).mount()
    </script>
    <script src="../js/click.js" type="text/JavaScript"></script>
</body>

</html>