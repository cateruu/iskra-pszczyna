<?php
require 'admin/includes/dbc.php';

if (isset($_POST['rok'])) {
    $rok = $_POST['rok'];
} else {
    $rok = date("Y");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MKS Iskra Pszczyna | Seniorzy</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="dist/css/glide.core.css">
    <link rel="stylesheet" href="dist/css/glideStyle.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/junior.css">
    <link rel="stylesheet" href="css/team.css">
    <link rel="stylesheet" href="css/termin.css">

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
                <p class="main__header__text__header">TERMINARZ</p>
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
        <div class="main__terminarz">
            <div class="main__terminarz__header">
                <form name="rokwybor" method="post">
                    <select name="rok" id="" class="main__terminarz__header__wybor" onchange="this.form.submit();">
                        <option value="<?php echo date("Y"); ?>" hidden selected><?php echo $rok; ?></option>
                        <?php
                        $pierwszy = 0;

                        $sql = mysqli_query($connect, "SELECT year(data) AS date FROM mecze GROUP BY year(data) DESC");

                        while ($row = mysqli_fetch_array($sql)) {
                            $data = $row['date'];
                            $pierwszy++;
                            echo "<option value='$data'>$data</option>";
                        }
                        ?>
                    </select>
                </form>
                <p class="main__terminarz__header__text">Terminarz</p>
            </div>
            <?php
            $pierwszy = 0;

            $sql = mysqli_query($connect, "SELECT mecze.*, DATE_FORMAT(data, '%Y/%m/%d %H:%i') AS formated_data, teams.img FROM mecze INNER JOIN teams ON mecze.przeciwnik = teams.name WHERE year(data)=$rok ORDER BY formated_data DESC");

            while ($row = mysqli_fetch_array($sql)) {
                $id = $row['id'];
                $przeciwnik = $row['przeciwnik'];
                $data = $row['formated_data'];
                $wynik = $row['wynik'];
                $img = $row['img'];
                $pierwszy++;

                if ($pierwszy % 2 == 1) {
                    echo "
                <div class='main__terminarz__mecz r'>
                    <p class='main__terminarz__mecz__iskra'>MKS <br />ISKRA PSZCZYNA</p>
                    <img src='content_img/logoBez.png' class='main__terminarz__mecz__iskraL'>
                    <p class='main__terminarz__mecz__wynik'>$wynik</p>
                    <img src='logo_teams/$img' class='main__terminarz__mecz__logo'>
                    <p class='main__terminarz__mecz__przeciwnik'> $przeciwnik</p>
                    <p class='main__terminarz__mecz__data'>$data</p>
                </div>
                ";
                } else {
                    echo "
                <div class='main__terminarz__mecz'>
                    <p class='main__terminarz__mecz__iskra'>MKS <br />ISKRA PSZCZYNA</p>
                    <img src='content_img/logoBez.png' class='main__terminarz__mecz__iskraL'>
                    <p class='main__terminarz__mecz__wynik'>$wynik</p>
                    <img src='logo_teams/$img' class='main__terminarz__mecz__logo'>
                    <p class='main__terminarz__mecz__przeciwnik'> $przeciwnik</p>
                    <p class='main__terminarz__mecz__data'>$data</p>
                </div>
                ";
                }
            }
            ?>
        </div>
        <div class="main__terminarzPC">
            <div class="main__terminarzPC__header">
                <form name="rokwybor" method="post">
                    <select name="rok" id="" class="main__terminarzPC__header__wybor" onchange="this.form.submit();">
                        <option value="<?php echo date("Y"); ?>" hidden selected><?php echo $rok; ?></option>
                        <?php
                        $pierwszy = 0;

                        $sql = mysqli_query($connect, "SELECT year(data) AS date FROM mecze GROUP BY year(data) DESC");

                        while ($row = mysqli_fetch_array($sql)) {
                            $data = $row['date'];
                            $pierwszy++;
                            echo "<option value='$data'>$data</option>";
                        }
                        ?>
                    </select>
                </form>
                <p class="main__terminarzPC__header__text">Terminarz</p>
            </div>
            <?php
            $pierwszy = 0;

            $sql = mysqli_query($connect, "SELECT mecze.id, mecze.przeciwnik, mecze.wynik, mecze.data, month(data) as miesiac, DATE_FORMAT(data, '%d') as dzienmsc,weekday(data) as dzien, DATE_FORMAT(data, '%H:%i') as godzina, teams.img FROM mecze INNER JOIN teams ON mecze.przeciwnik = teams.name WHERE year(data)=$rok ORDER BY data DESC");

            while ($row = mysqli_fetch_array($sql)) {
                $id = $row['id'];
                $przeciwnik = $row['przeciwnik'];
                $miesiac = $row['miesiac'];
                $dzienmsc = $row['dzienmsc'];
                $dzien = $row['dzien'];
                $godzina = $row['godzina'];
                $wynik = $row['wynik'];
                $img = $row['img'];
                $pierwszy++;

                if ($dzien == 1) {
                    $dzien = "PON";
                } elseif ($dzien == 2) {
                    $dzien = "WT";
                } elseif ($dzien == 3) {
                    $dzien = "ŚR";
                } elseif ($dzien == 4) {
                    $dzien = "CZW";
                } elseif ($dzien == 5) {
                    $dzien = "PT";
                } elseif ($dzien == 6) {
                    $dzien = "SO";
                } elseif ($dzien == 7) {
                    $dzien = "ND";
                }

                if ($miesiac == 1) {
                    $miesiac = "STY";
                } elseif ($miesiac == 2) {
                    $miesiac = "LUT";
                } elseif ($miesiac == 3) {
                    $miesiac = "MAR";
                } elseif ($miesiac == 4) {
                    $miesiac = "KWI";
                } elseif ($miesiac == 5) {
                    $miesiac = "MAJ";
                } elseif ($miesiac == 6) {
                    $miesiac = "CZE";
                } elseif ($miesiac == 7) {
                    $miesiac = "LIP";
                } elseif ($miesiac == 8) {
                    $miesiac = "SIE";
                } elseif ($miesiac == 9) {
                    $miesiac = "WRZ";
                } elseif ($miesiac == 10) {
                    $miesiac = "PAŹ";
                } elseif ($miesiac == 11) {
                    $miesiac = "LIS";
                } elseif ($miesiac == 12) {
                    $miesiac = "GRU";
                }

                if ($pierwszy % 2 == 1) {
                    echo "
                    <div class='main__terminarzPC__mecz r'>
                        <div class='main__terminarzPC__mecz__msc'>
                            <p class='main__terminarzPC__mecz__msc__day'>$dzienmsc</p>
                            <p class='main__terminarzPC__mecz__msc__msc'>$miesiac</p>
                        </div>
                        <div class='main__terminarzPC__mecz__dzien'>
                            <p class='main__terminarzPC__mecz__dzien__day'>$dzien</p>
                            <p class='main__terminarzPC__mecz__dzien__godzina'>$godzina</p>
                        </div>
                        <div class='main__terminarzPC__mecz__content'>
                            <p class='main__terminarzPC__mecz__content__iskra'>MKS IKSRA PSZCZYNA</p>
                            <img src='content_img/logoBez.png'class='main__terminarzPC__mecz__content__iskraL'>
                            <p class='main__terminarzPC__mecz__content__wynik'>$wynik</p>
                            <img src='logo_teams/$img' class='main__terminarzPC__mecz__content__logo'>
                            <p class='main__terminarzPC__mecz__content__przeciwnik'>$przeciwnik</p>
                        </div>
                    </div>
                ";
                } else {
                    echo "
                    <div class='main__terminarzPC__mecz'>
                    <div class='main__terminarzPC__mecz__msc'>
                        <p class='main__terminarzPC__mecz__msc__day'>$dzienmsc</p>
                        <p class='main__terminarzPC__mecz__msc__msc'>$miesiac</p>
                    </div>
                    <div class='main__terminarzPC__mecz__dzien'>
                        <p class='main__terminarzPC__mecz__dzien__day'>$dzien</p>
                        <p class='main__terminarzPC__mecz__dzien__godzina'>$godzina</p>
                    </div>
                    <div class='main__terminarzPC__mecz__content'>
                        <p class='main__terminarzPC__mecz__content__iskra'>MKS IKSRA PSZCZYNA</p>
                        <img src='content_img/logoBez.png'class='main__terminarzPC__mecz__content__iskraL'>
                        <p class='main__terminarzPC__mecz__content__wynik'>$wynik</p>
                        <img src='logo_teams/$img' class='main__terminarzPC__mecz__content__logo'>
                        <p class='main__terminarzPC__mecz__content__przeciwnik'>$przeciwnik</p>
                    </div>
                </div>
                ";
                }
            }
            ?>
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
                                <img src="content_img/s1.png" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <img src="content_img/strategiczny.png" id="glide__img">
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.dokawa.com.pl/" target="_blank">
                                <img src="content_img/s3.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.drogrod.pl/" target="_blank">
                                <img src="content_img/s4.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.dzwigamy.pl/" target="_blank">
                                <img src="content_img/s5.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.facebook.com/SportlandPszczyna" target="_blank">
                                <img src="content_img/s6.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.k2-pszczyna.pl/" target="_blank">
                                <img src="content_img/s7.png" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://osmpszczyna.pl/" target="_blank">
                                <img src="content_img/s8.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.patentus.eu/" target="_blank">
                                <img src="content_img/s9.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.piekarniajasiek.pl/" target="_blank">
                                <img src="content_img/s10.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.pszczyna.info.pl/" target="_blank">
                                <img src="content_img/s11.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.ziobro.com.pl/" target="_blank">
                                <img src="content_img/s12.png" alt="" id="glide__img">
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
                                <img src="content_img/p1.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://centrumar.pl/" target="_blank">
                                <img src="content_img/p2.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://efce.com.pl/" target="_blank">
                                <img src="content_img/p3.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.moris.pszczyna.pl/" target="_blank">
                                <img src="content_img/p4.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.pless.pl/" target="_blank">
                                <img src="content_img/p5.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.msit.gov.pl/" target="_blank">
                                <img src="content_img/p6.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://posir.pszczyna.pl/" target="_blank">
                                <img src="content_img/p7.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="https://www.powiat.pszczyna.pl/" target="_blank">
                                <img src="content_img/powiat.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://www.pszczyna.pl/" target="_blank">
                                <img src="content_img/p9.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://razemdlapilki.com/" target="_blank">
                                <img src="content_img/p10.png" alt="" id="glide__img">
                            </a>
                        </li>
                        <li class="glide__slide">
                            <a href="http://sportowafundacja.pl/" target="_blank">
                                <img src="content_img/p11.png" alt="" id="glide__img">
                            </a>
                        </li>
                    </ul>
                </div>
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

    <script src="dist/glide.min.js" type="text/JavaScript"></script>
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
    <script src="js/click.js" type="text/JavaScript"></script>
</body>

</html>