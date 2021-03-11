<?php

require 'admin/includes/dbc.php';

$result = "";
if (isset($_POST['wyslij'])) {

    $imieD = $_POST['imieD'];
    $nazwiskoD = $_POST['nazwiskoD'];
    $peselD = $_POST['peselD'];
    $urodzenieD = $_POST['urodzenieD'];
    $domD = $_POST['domD'];
    $kodD = $_POST['kodD'];
    $miastoD = $_POST['miastoD'];
    $szkolaD =  $_POST['szkolaD'];
    $imieR = $_POST['imieR'];
    $nazwiskoR = $_POST['nazwiskoR'];
    $telefonR = $_POST['telefonR'];
    $emailR = $_POST['emailR'];
    $radio = $_POST['skad'];

    $msg = "
        <h1>Dane dziecka:</h1>
        <strong>Imię:</strong> $imieD <br />
        <strong>Nazwisko:</strong> $nazwiskoD <br />
        <strong>PESEL:</strong> $peselD <br />
        <strong>Miejsce urodzenia:</strong> $urodzenieD <br />
        <strong>Ulica i nr domu:</strong> $domD <br />
        <strong>Kod pocztowy:</strong> $kodD <br />
        <strong>Miasto:</strong> $miastoD <br />
        <strong>Przedszkole/szkoła:</strong> $szkolaD <br />
        <br />
        <h1>Dane rodzica</h1>
        <strong>Imię:</strong> $imieR <br />
        <strong>Nazwisko:</strong> $nazwiskoR <br />
        <strong>Telefon:</strong> $telefonR <br />
        <strong>E-mail:</strong> $emailR <br />
        <br />
        <b>Informacja o naborach:</b> $radio
    ";

    $to = "pawel@spoko.pl";
    $subject = "Formularz zgłoszeniowy dziecka od: $imieR <$emailR>";
    $headers = "From: " . $emailR;

    $headers =  'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: ' . "<kontakt@wepik.pl>" . "\r\n";
    $headers .= "Reply-to:" . $email . "\r\n";

    $mail = mail($to, $subject, $msg, $headers);

    if ($mail) {
        $result = "Pomyślnie wysłano";
    } else {
        $result = "Coś poszło nie tak.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MKS Iskra Pszczyna | Akademia</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="dist/css/slikStyle.css">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/junior.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'includes/menuPhone.php' ?>
    <?php include 'includes/menuPC.php' ?>
    <section class="main">
        <div class="main__header">
            <div class="main__header__imgContainer">
                <div class="opacity"></div>
                <img src="content_img/junior_header.jpg" alt="" class="main__header__imgContainer__img">
            </div>
            <div class="main__header__container">
                <div class="main__header__container__backLogo">
                    <img src="content_img/logoBez.png" alt="">
                </div>
                <div class="main__header__container__text">
                    <p class="main__header__container__text__header">
                        AKADEMIA
                    </p>
                    <p class="main__header__container__text__under">
                        MKS ISKRA PSZCZYNA
                    </p>
                </div>
                <div class="main__header__container__hamburger">
                    <div id="hamburger" onclick="pokazMenu()">
                        <div id="segregacja">
                            <div id="s1" class="s"></div>
                            <div id="s2" class="s"></div>
                            <div id="s3" class="s"></div>
                        </div>
                    </div>
                </div>
                <div class="main__header__container__logo">
                    <img src="content_img/logoBez.png" alt="">
                </div>
            </div>
            <div class="main__header__containerPC">
                <div class="main__header__containerPC__header">
                    <p class="main__header__containerPC__header__h">AKADEMIA</p>
                    <p class="main__header__containerPC__header__t">
                        MKS ISKRA PSZCZYNA
                    </p>
                </div>
                <div class="main__header__containerPC__text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet quia pariatur accusamus commodi quas, aliquid sequi ipsum rerum nesciunt nisi porro perspiciatis quibusdam sunt aspernatur distinctio dolorem fugiat hic est?
                </div>
                <a href="#form" class="main__header__containerPC__link">Zapisy do akademi</a>
            </div>
        </div>
        <div class="main__wybor" onclick="rocznik()">
            <p class="main__wybor__text">Wybór rocznika</p>
            <i class="fas fa-chevron-right arrow"></i>
        </div>
        <div class="main__container">
            <div class="main__container__roczniki">
                <a href="teams/team-04_05" class="main__container__roczniki__date">2004 / 2005</a>
                <a href="teams/team-06" class="main__container__roczniki__date">2006</a>
                <a href="teams/team-07" class="main__container__roczniki__date">2007</a>
                <a href="teams/team-08" class="main__container__roczniki__date">2008</a>
                <a href="teams/team-09" class="main__container__roczniki__date">2009</a>
                <a href="teams/team-10" class="main__container__roczniki__date">2010</a>
                <a href="teams/team-11" class="main__container__roczniki__date">2011</a>
                <a href="teams/team-12" class="main__container__roczniki__date" style="margin-bottom: 20px;">2012</a>
                <div class="main__container__roczniki__zwin" onclick="rocznik()">
                    <p class="main__container__roczniki__zwin__text">Zwiń</p>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
            <div class="main__container__aktualnosci">
                <div class="slick">
                    <?php
                    $sql = mysqli_query($connect, "SELECT * FROM posty WHERE category='Junior' ORDER BY data DESC, id DESC LIMIT 3");

                    while ($row = mysqli_fetch_array($sql)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $desc = $row['description'];
                        $category = $row['category'];
                        $img = $row['img'];
                    ?>
                        <div class="slick__slide">
                            <a href="post?q=<?php echo $category; ?>&&id=<?php echo $id; ?>" style="width: 100%;">
                                <div class="slick__slide__opacity"></div>
                                <img src="img_posty/<?php echo $img ?>">
                                <p class="slick__slide__header"><?php echo $title ?></p>
                                <p class="slick__slide__desc"><?php echo $desc ?></p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="main__container__about">
                <p class="main__container__about__header">O nas</p>
                <p class="main__container__about__text">Jesteśmy akademią działającą nie przerwanie od 2000 roku. Dzieci szkolą się pod okiem profesjonalnych trenerów w oparciu o autorski program szkolenia.</p>
            </div>
            <div class="main__container__info">
                <div class="main__container__info__box player">
                    <p class="main__container__info__box__header">
                        254
                    </p>
                    <p class="main__container__info__box__text">
                        Zawodników
                    </p>
                </div>
                <div class="main__container__info__box succes">
                    <p class="main__container__info__box__header">
                        100
                    </p>
                    <p class="main__container__info__box__text">
                        Sukcesów
                    </p>
                </div>
                <div class="main__container__info__box trener">
                    <p class="main__container__info__box__header">
                        12
                    </p>
                    <p class="main__container__info__box__text">
                        Trenerów
                    </p>
                </div>
                <div class="main__container__info__box lata">
                    <p class="main__container__info__box__header">
                        10
                    </p>
                    <p class="main__container__info__box__text">
                        Lat doświadczenia
                    </p>
                </div>
            </div>
            <div class="main__container__rodzic">
                <p class="main__container__rodzic__header">
                    Drogi rodzicu!
                </p>
                <p class="main__container__rodzic__text">
                    Nasz Klub stara się robić wszystko aby Wasze dziecko a Nasz zawodnik miał dogodne warunki do prawidłowego rozwoju piłkarskiego oraz intelektualnego.
                </p>
                <p class="main__container__rodzic__text text2">
                    Proces szkolenia to długa droga niosąca wiele pozytywnych zmian w rozwoju młodego człowieka, jedyną możliwością przejścia przez nią jest wspólne zaangażowanie.
                </p>
            </div>
            <div class="main__container__form" id="form">
                <p class="main__container__form__header">
                    Nie czekaj!
                </p>
                <p class="main__container__form__underHeader">
                    Zapisz swoje dziecko już dziś!
                </p>
                <p class="main__container__form__text">
                    Wypełnij formularz lub skontaktuj się z nami używając danych poniżej.
                </p>

                <div class="main__container__form__content">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="360" height="50" viewBox="0 0 360 50" class="main__container__form__content__svg">
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
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="50" viewBox="0 0 600 50" class="main__container__form__content__svg2">
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
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1200" height="50" viewBox="0 0 1200 50" class="main__container__form__content__svg3">
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



                    <p class="main__container__form__content__header">
                        Formularz
                    </p>
                    <div class="main__container__form__content__form">
                        <p class="main__container__form__content__form__label">
                            Dane zgłoszeniowe dziecka
                        </p>
                        <form name="zgloszeniedziecka" method="post" enctype="multipart/form-data">
                            <input type="text" name="imieD" placeholder="Imię:" required>
                            <input type="text" name="nazwiskoD" placeholder="Nazwisko:" required>
                            <input type="number" name="peselD" placeholder="PESEL:" required>
                            <input type="text" name="urodzenieD" placeholder="Miejsce urodzenia:" required>
                            <input type="text" name="domD" placeholder="Ulica i nr domu:" required>
                            <input type="text" name="kodD" placeholder="Kod pocztowy:" required>
                            <input type="text" name="miastoD" placeholder="Miasto:" required>
                            <input type="text" name="szkolaD" placeholder="Przedszkole / szkoła:" required>

                            <p class="main__container__form__content__form__label">
                                Dane kontaktowe do Rodzica lub opiekuna
                            </p>

                            <input type="text" name="imieR" placeholder="Imię:" required>
                            <input type="text" name="nazwiskoR" placeholder="Nazwisko:" required>
                            <input type="number" name="telefonR" placeholder="Telefon:" required>
                            <input type="email" name="emailR" placeholder="E-mail:" required>

                            <p class="main__container__form__content__form__label" style="margin-bottom: 15px;">
                                Skąd dowiedział/a się Pan/i o naborach
                            </p>

                            <div class="main__container__form__content__form__checkbox">
                                <input type="radio" name="skad" value="Informacja ze szkoły" required> Informacja ze szkoły
                            </div>
                            <div class="main__container__form__content__form__checkbox">
                                <input type="radio" name="skad" value="Strona internetowa" required> Strona internetowa
                            </div>
                            <div class="main__container__form__content__form__checkbox">
                                <input type="radio" name="skad" value="Znajomi/rodzina" required> Znajomi/rodzina
                            </div>
                            <div class="main__container__form__content__form__checkbox">
                                <input type="radio" name="skad" value="Podczas festynu" required> Podczas festynu
                            </div>
                            <div class="main__container__form__content__form__checkbox">
                                <input type="radio" name="skad" value="Ulotki" required> Ulotki
                            </div>
                            <div class="main__container__form__content__form__checkbox">
                                <input type="radio" name="skad" value="Plakaty" required> Plakaty
                            </div>
                            <div class="main__container__form__content__form__checkbox">
                                <input type="radio" name="skad" value="Inne" required> Inne
                            </div>

                            <p class="main__container__form__content__form__label" style="margin-bottom: 15px;">
                                Zgoda na przetwarzanie danych osobowych
                            </p>
                            <div class="main__container__form__content__form__zgoda">
                                <input type="checkbox" class="zgoda" onclick="wyswietl()"> Wyrażam zgodę na przetwarzanie moich danych osobowych zawartych w niniejszym formularzu w celu przetworzenia zgłoszenia, uzyskania odpowiedzi oraz realizacji działań wynikających z przesłanego przeze mnie zgłoszenia. Informujemy, że administratorem Państwa danych osobowych jest Akademia Piłki Nożnej MKS Iskra Pszczyna ul. ks. bpa Bogedaina 22 Pszczyna. Państwa dane osobowe będą przetwarzane w celu przetworzenia zgłoszenia, udzielenia odpowiedzi oraz realizacji działań wynikających z przesłanego zgłoszenia. Dane te mogą być udostępniane podmiotom upoważnionym na podstawie przepisów prawa oraz na podstawie stosownych umów dostawcom usług IT. Podstawą przetwarzania danych jest udzielona przez Państwa zgoda. Dane osobowe będą przechowywane przez okres 6 miesięcy oraz w określonych przypadkach do czasu realizacji działań wynikających z przesłanego zapytania. Posiadają Państwo prawo do: • żądania dostępu do swoich danych osobowych, ich sprostowania, usunięcia oraz ograniczenia przetwarzania a także prawo do przenoszenia swoich danych osobowych; • wycofania udzielonej zgody w dowolnym momencie. Wycofanie zgody, nie wpływa na zgodność z prawem przetwarzania, którego dokonano na podstawie zgody przed jej wycofaniem. • Wniesienia skargi do organu nadzorczego (GIODO/PUODO) Podanie danych osobowych jest dobrowolne, jednakże niezbędne do przesłania formularza. Dane kontaktowe administratora danych: Akademia Piłki Nożnej MKS Iskra Pszczyna ul. ks. bpa Bogedaina 22 Pszczyna
                                klub@iskra.pszczyna.pl
                            </div>
                            <input type="submit" name="wyslij" value="Wyślij" class="wyslij">
                            <div class="wyslijInvisible">
                                Wyślij
                            </div>

                            <p class="main__container__form__content__form__label" style="margin-bottom: 15px;">
                                <?php echo $result; ?>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="main__container__footer">
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
        </div>
    </section>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/slick.js" type="text/JavaScript"></script>
    <script src="js/click.js" type="text/JavaScript"></script>
</body>

</html>