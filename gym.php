<?php
require 'admin/includes/dbc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MKS Iskra Pszczyna | Seniorzy</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap&subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="dist/css/slikStyle.css">

    <link rel="stylesheet" href="dist/css/glide.core.css">
    <link rel="stylesheet" href="dist/css/glideStyle.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/junior.css">
    <link rel="stylesheet" href="css/gym.css">

    <script src="https://kit.fontawesome.com/93ddc095ce.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'includes/menuPhone.php' ?>
    <?php include 'includes/menuPC.php' ?>
    <section class="main">
        <div class="main__header">
            <div class="main__header__imgContainer">
                <div class="opacity"></div>
                <img src="content_img/profesHeader.jpg" alt="" class="main__header__imgContainer__img">
            </div>
            <div class="main__header__container">
                <div class="main__header__container__backLogo">
                    <img src="content_img/logoBez.png" alt="">
                </div>
                <div class="main__header__container__text">
                    <p class="main__header__container__text__header">
                        LEKKOATLETYKA
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
                    <p class="main__header__containerPC__header__h">LEKKOATLETYKA</p>
                    <p class="main__header__containerPC__header__t">
                        MKS ISKRA PSZCZYNA
                    </p>
                </div>
                <div class="main__header__containerPC__text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet quia pariatur accusamus commodi quas, aliquid sequi ipsum rerum nesciunt nisi porro perspiciatis quibusdam sunt aspernatur distinctio dolorem fugiat hic est?
                </div>
            </div>
        </div>
        <a href="aktualnosci?q=Lekkoatletyka">
            <div class="main__wybor">
                <p class="main__wybor__text">Aktualności</p>
                <i class="fas fa-chevron-right arrow"></i>
            </div>
        </a>
        <div class="main__container__aktualnosci">
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
                                <a href="post?q=<?php echo $category; ?>&&id=<?php echo $id; ?>">
                                    <div class="glide__opacity"></div>
                                    <img src="img_posty/<?php echo $img ?>">
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
        <div class="main__container__about">
            <p class="main__container__about__header">Nasza drużyna</p>
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
        <div class="main__container__about">
            <p class="main__container__about__header">Nasz trener</p>
            <p class="main__container__about__text">Krótki opis trenera, można wymienić doświadczenie itp.<br>Telefon: 123 123 123</p>
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
    <script>
        new Glide('.glide', {
            type: 'carousel',
            autoplay: 5000,
            animationDuration: 500
        }).mount();
    </script>
    <script src="js/click.js" type="text/JavaScript"></script>
</body>

</html>