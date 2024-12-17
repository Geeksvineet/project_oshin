<?php
include('server/admin/database/config.php');

// Fetch all images (by default) or filtered by category
$imagesSql = "SELECT * FROM gallery LIMIT 6";
$imagesResult = mysqli_query($conn, $imagesSql);

mysqli_close($conn);
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('server/admin/database/config.php');


$sql = "SELECT *
        FROM teachers 
        LIMIT 3";

$result = mysqli_query($conn, $sql);

$query1 = "SELECT * FROM blog LIMIT 3";
$result1 = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM testimonials LIMIT 2";
$result2 = mysqli_query($conn, $query2);

$sql3 = "SELECT *
        FROM gallery 
        LIMIT 4";

$result3 = mysqli_query($conn, $sql3);

// Check if form is submitted
if (isset($_POST['add'])) {

    $email = $_POST['email']; // Sanitize email input
    $dateCreated = date('Y-m-d H:i:s'); // Current date and time

    // Ensure email field is not empty
    if (!empty($email)) {
        // Insert into database
        $insertSql = "INSERT INTO subscription (email, date_created) 
                      VALUES ('$email', '$dateCreated')";

        if (mysqli_query($conn, $insertSql)) {
            header('Location: index');
            exit();
        } else {
            // Display error if query fails
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Email field cannot be empty.";
    }
}

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from client/index by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:00:47 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Home - Oshin Sports Academy
    </title>
    <!-- favicons Icons -->
    <link
        rel="icon"
        sizes="180x180"
        href="client/assets/images/favicons/apple-touch-icon.png" />
    <!-- <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="client/assets/images/favicons/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="client/assets/images/favicons/favicon-16x16.png"
    /> -->
    <meta
        name="description"
        content="Oshin sports is a well known organization, established in the year 2015 by Ankit Gupta, He is a professional Sports athlete and trainer." />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700&amp;family=Fredoka:wght@700&amp;family=Schoolbell&amp;display=swap"
        rel="stylesheet" />

    <link
        rel="stylesheet"
        href="client/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/animate/animate.min.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/fontawesome/css/all.min.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/jquery-ui/jquery-ui.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/jarallax/jarallax.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/nouislider/nouislider.min.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/nouislider/nouislider.pips.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/tiny-slider/tiny-slider.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/kidearn-icons/style.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link
        rel="stylesheet"
        href="client/assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

    <!-- template styles -->
    <link
        rel="stylesheet"
        href="client/assets/css/kidearn.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">

    <style>
        /* Popup form css */

        .side-text {
            display: flex;
            justify-content: center;
            align-items: center;
            /* flex: 1; */
            color: #fff;
            /* font-size: 70px; */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* font-style: italic; */
        }

        .side-text h3 {
            text-align: center;
            font-size: 70px;
            font-family: "Racing Sans One", sans-serif;
            color: white;
        }

        #popupBackground {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* Popup Background */
        #popupBackgroundUnder {
            position: fixed;
            top: 10%;
            bottom: 10%;
            left: 10%;
            right: 10%;
            width: 80%;
            height: 80%;
            /* background-color: rgba(0, 0, 0, 0.7); */
            background-image: url("client/assets/images/backgrounds/image\ 67.png");
            background-size: cover;
            display: flex;
            /* justify-content: center;
            align-items: center;
            gap: 40px; */
            /* z-index: 1000; */
            border-radius: 40px;
        }

        #popupBackgroundUnder2 {
            width: 100%;
            height: 100%;
            /* background-color: red; */
            background-image: url("client/assets/images/backgrounds/trophy.png");
            background-size: 400px;
            background-repeat: no-repeat;
            background-position: right bottom;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            border-radius: 40px;
        }

        /* Popup Content */
        #popupForm {
            position: relative;
            /* background-color: rgba(255, 255, 255, 0.9); */
            padding: 40px;
            border-radius: 12px;
            max-width: 400px;
            width: 100%;
            /* background-image: url("client/assets/images/backgrounds/image\ 67.png"); */
            backdrop-filter: blur(15px);
            background-color: rgba(255, 255, 255, 0.2);
            /* background-size: cover;
            background-position: center; */
        }

        /* Close Button */
        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            background-color: darkgray;
            padding: 0 10px;
            border-radius: 30px;
            color: white;
        }

        .close-btn:hover {
            background-color: gray;
        }

        h2 {
            margin-bottom: 20px;
            /* text-align: center; */
            color: white
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box input,
        .input-box textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        .input-box2 {
            margin-bottom: 15px;
        }

        .input-box2 input,
        .input-box2 textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        .submit-btn {
            display: block;
            /* width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: black 2px solid;
            border-radius: 8px;
            cursor: pointer;
            text-align: center; */
        }

        .submit-btn:hover {
            background-color: #555;
        }

        @media screen and (max-width: 768px) {
            #popupForm {
                max-width: 300px;
                background-color: transparent;
                backdrop-filter: none;
            }

            #popupBackgroundUnder2 {
                flex-direction: column;
                gap: 0;
            }

            .side-text h3 {
                font-size: 40px;
            }
        }

        /* more css */

        .banner_vs {
            font-size: 70px;
        }

        @media (max-width: 600px) {
            .banner_vs {
                font-size: 40px;
            }
        }
    </style>
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!-- vinusrv -->

    <!-- <div class="preloader">
      <div
        class="preloader__image"
        style="
          background-image: url(client/assets/images/loader.png);
        "
      ></div>
    </div> -->

    <!-- <div class="preloader">
        <div class="box">
            <div class="cat">
                <div class="cat__body"></div>
                <div class="cat__body"></div>
                <div class="cat__tail"></div>
                <div class="cat__head"></div>
            </div>
        </div>
    </div> -->

    <?php
    include './main_preloader.php';
    ?>

    <!-- /.preloader -->
    <div class="page-wrapper">
        <div class="topbar-one">
            <div class="container-fluid">
                <div class="topbar-one__inner">
                    <div class="topbar-one__left">
                        <div class="topbar-one__social">
                            <a href="https://youtube.com/@osho1325?si=bphadi58U87oaFdy" target="_blank">
                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                <span class="sr-only">Youtube</span>
                            </a>
                            <a href="https://www.facebook.com/profile?id=100066267475017&mibextid=ZbWKwL" target="_blank">
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="https://www.linkedin.com/in/ankit-gupta-2a61401a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">
                                <i class="fab fa-linkedin" aria-hidden="true"></i>
                                <span class="sr-only">Linkedin</span>
                            </a>
                            <a href="https://www.instagram.com/oshinsports_by_ankitgupta?igsh=MTc0ZmdmZHI3emV6NQ==" target="_blank">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                        </div>
                        <!-- /.topbar-one__social -->
                        <p class="topbar-one__text">Mon to Sat: 8.00 am - 8.00 pm</p>
                        <!-- /.topbar-one__text -->
                    </div>
                    <!-- /.topbar-one__left -->
                    <ul class="list-unstyled topbar-one__info">
                        <li class="topbar-one__info__item">
                            <i class="fas fa-map-marker topbar-one__info__icon"></i>
                            <a href="#">4th floor Starlit tower,Y.N road Indore</a>
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="fas fa-envelope topbar-one__info__icon"></i>
                            <a href="mailto:ankit19477@gmail.com">ankit19477@gmail.com</a>
                        </li>
                    </ul>
                    <!-- /.list-unstyled topbar-one__info -->
                </div>
                <!-- /.topbar-one__inner -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.topbar-one -->

        <header style="padding: 12px 0 12px;" class="main-header sticky-header sticky-header--normal">
            <div class="container-fluid">
                <div class="main-header__inner">
                    <div class="main-header__logo">
                        <a href="index">
                            <img
                                src="client/assets/images/logo-dark.png"
                                alt="Kidearn HTML"
                                width="160" />
                        </a>
                    </div>
                    <!-- /.main-header__logo -->

                    <nav class="main-header__nav main-menu">
                        <ul class="main-menu__list">
                            <li class="megamenu">
                                <a href="index">Home</a>
                            </li>

                            <li>
                                <a href="client/about">About</a>
                            </li>
                            <li>
                                <a href="client/team">Our teacher</a>
                            </li>
                            <li class="dropdown">
                                <a href="client/programs-grid">Programs</a>
                                <ul>
                                    <li>
                                        <a href="client/gallery-filter">Photo Gallery</a>
                                    </li>
                                    <li>
                                        <a href="client/video_gallery">Video Gallery</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="client/blog-grid">Blogs</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Oshin World</a>
                                <ul>
                                    <li>
                                        <a href="client/about">Oshin Sports Academy</a>
                                    </li>
                                    <li>
                                        <a href="client/school-about">Oshin School</a>
                                    </li>
                                    <li>
                                        <a href="client/event-about">Oshin Events</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="client/contact">Contact</a>
                            </li>
                            <li>
                                <a href="client/career">Career</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.main-header__nav -->
                    <div class="main-header__right">
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- /.mobile-nav__toggler -->
                        <a class="main-header__call" href="tel:916284510187">
                            <i class="icon-call main-header__call__icon"></i>
                            <span class="main-header__call__content">
                                <span class="main-header__call__number">+91 6284510187</span>
                                <!-- /.main-header__call__number -->
                                <span class="main-header__call__text">Call to Questions</span><!-- /.main-header__call__text --> </span><!-- /.main-header__call__content -->
                        </a>
                        <a
                            href="./client/popup_page"
                            class="kidearn-btn main-header__btn">
                            <span>Enquiry Now</span> </a><!-- /.thm-btn main-header__btn -->
                    </div>
                    <!-- /.main-header__right -->
                </div>
                <!-- /.main-header__inner -->
            </div>
            <!-- /.container-fluid -->
        </header>
        <!-- /.main-header -->
        <!--Hero Banner Start-->
        <section class="banner-one">
            <div
                class="banner-one__carousel kidearn-owl__carousel owl-carousel kidearn-owl__carousel--with-shadow"
                data-owl-options='{
		"loop": true,
		"animateOut": "fadeOut",
		"animateIn": "fadeInUp",
		"items": 1,
		"autoplay": true,
		"autoplayTimeout": 7000,
		"smartSpeed": 1000,
		"nav": false,
        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
		"dots": true,
		"margin": 0
	    }'>
                <div class="item">
                    <div class="banner-one__item">
                        <div
                            class="banner-one__bg"
                            style="
                  background-image: url(client/assets/images/slider/2.jpg);
                  background-size: cover;
                "></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="banner-one__content">
                                        <div class="banner-one__shape2"></div>
                                        <div class="banner-one__shape3"></div>
                                        <div class="banner-one__shape4">
                                            <img
                                                src="client/assets/images/shapes/banner-1-shape-2.png"
                                                alt="kidearn" />
                                        </div>
                                        <div class="banner-one__shape5">
                                            <div class="banner-one__shape5-inner"></div>
                                        </div>
                                        <div class="banner-one__shape6">
                                            <div class="banner-one__shape6-inner"></div>
                                        </div>
                                        <div class="banner-one__content__bg"></div>
                                        <h2 class="banner-one__content__title banner_vs">
                                            Principles <br>for Oshin
                                            <br>Sports Success
                                        </h2>
                                        <a
                                            href="./client/popup_page"
                                            class="kidearn-btn">
                                            <span>Enquiry Now</span>
                                        </a>
                                        <div
                                            class="banner-one__shape1 kidearn-splax"
                                            style="
                          background-image: url(client/assets/images/shapes/banner-1-shape-1.png);
                        "
                                            data-para-options='{
									"orientation": "down",
									"scale": 1.9,
									"overflow": true
									}'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-item -->
                <div class="item">
                    <div class="banner-one__item">
                        <div
                            class="banner-one__bg"
                            style="
                  background-image: url(client/assets/images/slider/3.jpg);
                  background-size: cover;
                "></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="banner-one__content">
                                        <div class="banner-one__shape2"></div>
                                        <div class="banner-one__shape3"></div>
                                        <div class="banner-one__shape4">
                                            <img
                                                src="client/assets/images/shapes/banner-1-shape-2.png"
                                                alt="kidearn" />
                                        </div>
                                        <div class="banner-one__shape5">
                                            <div class="banner-one__shape5-inner"></div>
                                        </div>
                                        <div class="banner-one__shape6">
                                            <div class="banner-one__shape6-inner"></div>
                                        </div>
                                        <div class="banner-one__content__bg"></div>
                                        <h2 class="banner-one__content__title">
                                            Principles <br>for Oshin
                                            <br>Sports Success
                                        </h2>
                                        <a
                                            href="./client/popup_page"
                                            class="kidearn-btn">
                                            <span>Enquiry Now</span>
                                        </a>
                                        <div
                                            class="banner-one__shape1 kidearn-splax"
                                            style="
                          background-image: url(client/assets/images/shapes/banner-1-shape-1.png);
                        "
                                            data-para-options='{
									"orientation": "down",
									"scale": 1.9,
									"overflow": true
									}'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-item -->
                <div class="item">
                    <div class="banner-one__item">
                        <div
                            class="banner-one__bg"
                            style="
                  background-image: url(client/assets/images/slider/1.jpg);
                  background-size: cover;
                "></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="banner-one__content">
                                        <div class="banner-one__shape2"></div>
                                        <div class="banner-one__shape3"></div>
                                        <div class="banner-one__shape4">
                                            <img
                                                src="client/assets/images/shapes/banner-1-shape-2.png"
                                                alt="kidearn" />
                                        </div>
                                        <div class="banner-one__shape5">
                                            <div class="banner-one__shape5-inner"></div>
                                        </div>
                                        <div class="banner-one__shape6">
                                            <div class="banner-one__shape6-inner"></div>
                                        </div>
                                        <div class="banner-one__content__bg"></div>
                                        <h2 class="banner-one__content__title">
                                            Principles <br>for Oshin
                                            <br>Sports Success
                                        </h2>
                                        <a
                                            href="./client/popup_page"
                                            class="kidearn-btn">
                                            <span>Enquiry Now</span>
                                        </a>
                                        <div
                                            class="banner-one__shape1 kidearn-splax"
                                            style="
                          background-image: url(client/assets/images/shapes/banner-1-shape-1.png);
                        "
                                            data-para-options='{
									"orientation": "down",
									"scale": 1.9,
									"overflow": true
									}'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-item -->
            </div>
        </section>
        <section class="service-one">
            <div
                class="service-one__bg kidearn-splax"
                data-para-options='{
		"orientation": "up",
		"scale": 1.5,
		"overflow": true
		}'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 907 1117">
                    <path
                        d="M439.501 191.327C423.886 151.14 410.535 109.849 382.57 77.9193C364.573 57.2762 341.374 41.7837 316.691 29.9082C236.778 -8.54921 138.559 -8.863 55.8975 29.1363C-51.0518 78.3338 -92.2344 163.545 -124.062 267.647C-143.11 329.787 -172.464 389.023 -210.558 442.132C-241.37 485.071 -277.675 523.792 -309.262 566.153C-385.567 668.623 -459.365 778.565 -447.139 909.755C-441 975.319 -411.153 1039.68 -358.421 1077.45C-302.12 1117.73 -226.363 1123.79 -157.143 1109.58C-80.7379 1093.81 -14.8795 1049.94 58.6369 1028.82C138.638 1005.83 219.542 986.431 302.449 984.77C375.471 983.366 447.609 995.327 520.506 996.491C607.015 997.912 707.478 996.781 778.299 938.335C866.23 865.769 917.15 748.337 904.558 637.081C892.88 533.28 826.934 445.335 735.138 400.543C640.645 354.434 520.235 343.915 463.394 243.984C453.944 227.261 446.473 209.395 439.501 191.327Z" />
                </svg>
            </div>
            <div
                class="service-one__shape kidearn-splax"
                style="
            background-image: url(client/assets/images/shapes/about-bg-shape-1.png);
          "
                data-para-options='{
		"orientation": "left",
		"scale": 1.5,
		"overflow": true
		}'></div>
            <div class="container">
                <div style="justify-content: center;" class="row gutter-y-30">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="service-one__item" style="--accent-color: #75c137">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/seven.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Cricket</h4>
                        </div>
                    </div>
                    <!-- /.service-item -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div
                            class="service-one__item service-one__item--order"
                            style="--accent-color: #26a6a1">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/11.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Football</h4>
                        </div>
                    </div>
                    <!-- /.service-item -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="service-one__item" style="--accent-color: #f25334">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        style="object-fit: cover;"
                                        width="200px"
                                        height="200px"
                                        src="client/assets/images/sports/nine_tall.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Basketball</h4>
                        </div>
                    </div>
                    <!-- /.service-item -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div
                            class="service-one__item service-one__item--order"
                            style="--accent-color: #ffaa23">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/five.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Gymnastics</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="service-one__item" style="--accent-color: #75c137">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/eight.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Hockey</h4>
                        </div>
                    </div>
                    <!-- /.service-item -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div
                            class="service-one__item service-one__item--order"
                            style="--accent-color: #26a6a1">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/six.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Martial Arts</h4>
                        </div>
                    </div>
                    <!-- /.service-item -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="service-one__item" style="--accent-color: #f25334">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/one.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Archery</h4>
                        </div>
                    </div>
                    <!-- /.service-item -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div
                            class="service-one__item service-one__item--order"
                            style="--accent-color: #ffaa23">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/13.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Boxing</h4>
                        </div>
                    </div>
                    <!-- /.service-item -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div
                            class="service-one__item service-one__item--order"
                            style="--accent-color: skyblue">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/two.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Yoga <br> Meditation</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="service-one__item" style="--accent-color: pink">
                            <div class="service-one__item__image-wrapper">
                                <div
                                    class="service-one__item__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 7, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="client/assets/images/sports/four.jpg"
                                        alt="img" />
                                </div>
                                <div class="service-one__item__ball"></div>
                            </div>
                            <h4 class="service-one__item__title">Kick <br> Boxing</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-one__image">
                            <div
                                class="about-one__image__one kidearn-tilt"
                                data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 5, "speed": 700, "scale": 1 }'>
                                <img
                                    src="client/assets/images/resources/WhatsApp Image 2024-10-04 at 12.15.26_824f890b.jpg"
                                    alt="about" />
                            </div>
                            <div
                                class="about-one__image__border wow fadeInUp"
                                data-wow-delay="200ms">
                                <img
                                    src="client/assets/images/shapes/about-1-border.jpg"
                                    alt="border" />
                            </div>
                            <!-- <div
                                class="about-one__image__leaf kidearn-splax"
                                data-para-options='{
						"orientation": "left",
						"scale": 1.5,
						"overflow": true
						}'>
                                <img
                                    src="client/assets/images/shapes/about-1-leaf.png"
                                    alt="kidearn" />
                            </div> -->
                            <!-- <div
                                class="about-one__image__ball wow fadeInUp"
                                data-wow-delay="100ms"></div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="about-one__content">
                            <div class="sec-title text-left">
                                <h6 class="sec-title__tagline" style="font-size: 3rem;">Master's Voice</h6>
                                <!-- /.sec-title__tagline -->

                                <!-- <h3 class="sec-title__title">
                                    Lessons from Guruji <br> Mastering the Art of Life.
                                </h3> -->
                                <!-- /.sec-title__title -->
                            </div>
                            <!-- /.sec-title -->
                            <p class="about-one__content__text">
                                <span style="font-weight: 800;">Spiritual awareness:</span> Sports can increase spiritual awareness when athletes embrace the tension between failure and renewal. <br>
                                <span style="font-weight: 800;">Acceptance:</span> Physical play can help people accept concepts like discipline, hard work, winning, and losing.
                            </p>
                            <p class="about-one__content__text" style="font-style: italic;">
                                — Founder Director, Genius Temple
                            </p>
                            <!-- <a
                                href="client/about"
                                class="kidearn-btn">
                                <span>Learn More</span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="about-one__content">
                            <div class="sec-title text-left">
                                <h6 class="sec-title__tagline">About Us</h6>
                                <!-- /.sec-title__tagline -->

                                <h3 class="sec-title__title">
                                    Our passion towards teaching <br> sports to the
                                    young champs
                                </h3>
                                <!-- /.sec-title__title -->
                            </div>
                            <!-- /.sec-title -->
                            <p class="about-one__content__text">
                                We are experts in early childhood education.
                                We help preschool children learn and grow
                                through age-appropriate activities that let them
                                move, balance, and coordinate their bodies. Our
                                focus on these skills supports their overall
                                development through fun and exploration.
                            </p>
                            <a
                                href="client/about"
                                class="kidearn-btn">
                                <span>Learn More</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-one__image">
                            <div
                                class="about-one__image__one kidearn-tilt"
                                data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 5, "speed": 700, "scale": 1 }'>
                                <img
                                    src="client/assets/images/resources/about.jpg"
                                    alt="about" />
                            </div>
                            <div
                                class="about-one__image__border wow fadeInUp"
                                data-wow-delay="200ms">
                                <img
                                    src="client/assets/images/shapes/about-1-border.jpg"
                                    alt="kidearn" />
                            </div>
                            <div
                                class="about-one__image__leaf kidearn-splax"
                                data-para-options='{
						"orientation": "left",
						"scale": 1.5,
						"overflow": true
						}'>
                                <img
                                    src="client/assets/images/shapes/about-1-leaf.png"
                                    alt="kidearn" />
                            </div>
                            <div
                                class="about-one__image__ball wow fadeInUp"
                                data-wow-delay="100ms"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonial-one">
            <div
                class="testimonial-one__pen kidearn-splax"
                data-para-options='{
		"orientation": "left",
		"scale": 2.5,
		"overflow": true
		}'>
                <img
                    src="client/assets/images/shapes/pen.png"
                    alt="kidearn" />
            </div>
            <div class="container">
                <div class="testimonial-one__area">
                    <div class="testimonial-one__bg"></div>
                    <div
                        class="testimonial-one__bg-shape kidearn-splax"
                        style="
                background-image: url(client/assets/images/shapes/testimonial-shape-1.png);
              "
                        data-para-options='{
				"orientation": "down",
				"scale": 1.5,
				"delay": ".3",
				"transition": "cubic-bezier(0,0,0,1)",
				"overflow": true
				}'></div>
                    <div class="testimonial-one__star-left">
                        <img
                            src="client/assets/images/shapes/star1.png"
                            alt="kidearn" />
                    </div>
                    <div class="testimonial-one__star-right">
                        <img
                            src="client/assets/images/shapes/star2.png"
                            alt="kidearn" />
                    </div>
                    <div class="sec-title text-center">
                        <h6 class="sec-title__tagline">Testimonial</h6>
                        <!-- /.sec-title__tagline -->

                        <h3 class="sec-title__title">
                            Parent's words are the key<br />
                            to happy children
                        </h3>
                        <!-- /.sec-title__title -->
                    </div>
                    <!-- /.sec-title -->
                    <div
                        class="testimonial-one__carousel kidearn-owl__carousel owl-carousel owl-theme"
                        data-owl-options='{
				"items": 1,
				"margin": 0,
				"loop": true,
				"smartSpeed": 700,
				"nav": true,
				"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
				"dots": false,
				"autoplay": false
				}'>
                        <?php while ($post = mysqli_fetch_assoc($result2)) : ?>
                            <div class="item">
                                <div class="testimonial-one__item">
                                    <div class="testimonial-one__item__quote">
                                        <?= $post['description'] ?>
                                    </div>
                                    <div class="testimonial-one__item__author">
                                        <img
                                            style="object-fit: cover; object-position: top;"
                                            src="server/admin/pages/testimonials/<?= $post['image'] ?>"
                                            alt="image" />
                                        <h5 class="testimonial-one__item__author__name">
                                            <?= $post['name'] ?>
                                        </h5>
                                        <p class="testimonial-one__item__author__designation">
                                            <?= $post['relation'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>

                    </div>
                </div>
            </div>
        </section>
        <section class="video-one">
            <div class="video-one__bg"></div>
            <div
                class="video-one__bg-shape1 kidearn-splax"
                data-para-options='{"orientation": "down", "scale": 1.9, "delay": ".6", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'>
                <img
                    src="client/assets/images/shapes/video-shape-1.png"
                    alt="kidearn" />
            </div>
            <div
                class="video-one__bg-shape2 kidearn-splax"
                data-para-options='{"orientation": "up", "scale": 1.7, "delay": ".6", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'>
                <img
                    src="client/assets/images/shapes/video-shape-2.png"
                    alt="kidearn" />
            </div>
            <div
                class="video-one__bg-shape3 kidearn-splax"
                data-para-options='{"orientation": "right", "scale": 1.8, "delay": ".6", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'>
                <img
                    src="client/assets/images/shapes/video-shape-3.png"
                    alt="kidearn" />
            </div>
            <div
                class="video-one__bg-shape4 kidearn-splax"
                data-para-options='{"orientation": "right", "scale": 1.6, "delay": ".6", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'>
                <img
                    src="client/assets/images/shapes/video-shape-4.png"
                    alt="kidearn" />
            </div>
            <div
                class="video-one__bg-shape5 kidearn-splax"
                data-para-options='{"orientation": "left", "scale": 1.6, "delay": ".6", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'>
                <img
                    src="client/assets/images/shapes/video-shape-5.png"
                    alt="kidearn" />
            </div>
            <div
                class="video-one__bg-shape6 kidearn-splax"
                data-para-options='{"orientation": "right", "scale": 1.7, "delay": ".6", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'>
                <img
                    src="client/assets/images/shapes/video-shape-6.png"
                    alt="kidearn" />
            </div>
            <div
                class="video-one__bg-shape7 kidearn-splax"
                data-para-options='{"orientation": "left", "scale": 1.3, "delay": ".6", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
	}'>
                <img
                    src="client/assets/images/shapes/video-shape-7.png"
                    alt="kidearn" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 d-flex align-items-center">
                        <div class="video-one__content">
                            <h3 class="video-one__content__title">
                                Let’s discover the best campus through a video tour
                            </h3>
                            <a
                                href="client/contact"
                                class="kidearn-btn">
                                <span>Visit Now</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="video-one__btn-shape">
                            <div class="video-one__btn">
                                <img
                                    src="client/assets/images/backgrounds/video-bg-main.jpg"
                                    alt="video" />
                                <a
                                    href="https://www.youtube.com/watch?v=qH3ddiF150s"
                                    class="video-popup">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="program-one">
            <div
                class="program-one__bg kidearn-splax"
                data-para-options='{
		"orientation": "up",
		"scale": 2.5,
		"overflow": true
		}'>
                <img
                    src="client/assets/images/shapes/program-bg-shape.png"
                    alt="kidearn" />
            </div>
            <div class="container">
                <div class="sec-title text-center">
                    <h6 class="sec-title__tagline">Our Programs</h6>
                    <!-- /.sec-title__tagline -->

                    <h3 class="sec-title__title">
                        We are experts in early childhood <br> sports and education.
                    </h3>
                    <!-- /.sec-title__title -->
                </div>
                <!-- /.sec-title -->
                <div class="row" style="justify-content: center; gap: 40px;">
                    <div class="col-lg-3 col-md-6">
                        <div
                            class="program-one__item wow fadeInUp"
                            data-wow-duration="1500ms"
                            data-wow-delay="00ms"
                            style="--accent-color: #f25334">
                            <div class="program-one__item__shape">
                                <svg
                                    class="program-one__item__shape-one"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32 43">
                                    <path
                                        d="M11.0817 6.98831C-9.7901 23.3302 2.35379 52.1177 18.5511 39.5735C34.7647 27.0458 39.1287 -14.9434 11.0817 6.98831Z" />
                                </svg>
                                <svg
                                    class="program-one__item__shape-two"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 15 21">
                                    <path
                                        d="M5.28824 3.20713C-4.67276 11.0063 1.12287 24.745 8.85298 18.7583C16.5909 12.7795 18.6736 -7.25972 5.28824 3.20713Z" />
                                </svg>
                            </div>
                            <div class="program-one__item__bg"></div>
                            <div class="program-one__item__image" style="margin-top: 20px;">
                                <img
                                    src="client/assets/images/program/5year.jpg"
                                    alt="img" />
                            </div>
                            <!-- /.program-one__item__image -->
                            <div class="program-one__item__content">
                                <h3 class="program-one__item__title">
                                    <a href="client/program-1">Early Birds</a>
                                </h3>
                                <!-- /.program-one__item__title -->
                                <div class="program-one__item__age">(2.5-5 years)</div>
                                <!-- /.program-one__item__age -->
                                <p style="margin-top: 20px; display: flex; flex-direction: column;">
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Wonder-filled Exploration
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Learning Through Play
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Age-Appropriate Program
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Key Physical Principles
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Encouraging Programs
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Focus on Fundamentals
                                </div>
                                </p>
                                <!-- /.program-one__item__text -->
                                <a
                                    class="program-one__item__rm"
                                    href="client/program-1"><span class="icon-right-arrow"></span></a><!-- /.program-one__item__text -->
                            </div>
                            <!-- /.program-one__item__content -->
                        </div>
                        <!-- /.program-one__item__one -->
                    </div>
                    <!-- /.program-item -->
                    <div class="col-lg-3 col-md-6">
                        <div
                            class="program-one__item program-one__item--order wow fadeInUp"
                            data-wow-duration="1500ms"
                            data-wow-delay="100ms"
                            style="--accent-color: #75c137">
                            <div class="program-one__item__shape">
                                <svg
                                    class="program-one__item__shape-one"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32 43">
                                    <path
                                        d="M11.0817 6.98831C-9.7901 23.3302 2.35379 52.1177 18.5511 39.5735C34.7647 27.0458 39.1287 -14.9434 11.0817 6.98831Z" />
                                </svg>
                                <svg
                                    class="program-one__item__shape-two"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 15 21">
                                    <path
                                        d="M5.28824 3.20713C-4.67276 11.0063 1.12287 24.745 8.85298 18.7583C16.5909 12.7795 18.6736 -7.25972 5.28824 3.20713Z" />
                                </svg>
                            </div>
                            <div class="program-one__item__bg"></div>
                            <div class="program-one__item__image" style="margin-top: 20px;">
                                <img
                                    src="client/assets/images/program/8year.jpg"
                                    alt="img" />
                            </div>
                            <!-- /.program-one__item__image -->
                            <div class="program-one__item__content">
                                <h3 class="program-one__item__title">
                                    <a href="client/program-2">Grown - up program</a>
                                </h3>
                                <!-- /.program-one__item__title -->
                                <div class="program-one__item__age">(5.5-8 years)</div>
                                <!-- /.program-one__item__age -->
                                <p style="margin-top: 20px; display: flex; flex-direction: column;">
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Physical Development
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Focus on Individual Skills
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Social Skill Development
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span>Physical Education
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span>Students Self-focused
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Growth in life
                                </div>
                                </p>
                                <!-- /.program-one__item__text -->
                                <a
                                    class="program-one__item__rm"
                                    href="client/program-2"><span class="icon-right-arrow"></span></a><!-- /.program-one__item__text -->
                            </div>
                            <!-- /.program-one__item__content -->
                        </div>
                        <!-- /.program-one__item__one -->
                    </div>
                    <!-- /.program-item -->
                    <div class="col-lg-3 col-md-6">
                        <div
                            class="program-one__item wow fadeInUp"
                            data-wow-duration="1500ms"
                            data-wow-delay="200ms"
                            style="--accent-color: #2390ff">
                            <div class="program-one__item__shape">
                                <svg
                                    class="program-one__item__shape-one"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 32 43">
                                    <path
                                        d="M11.0817 6.98831C-9.7901 23.3302 2.35379 52.1177 18.5511 39.5735C34.7647 27.0458 39.1287 -14.9434 11.0817 6.98831Z" />
                                </svg>
                                <svg
                                    class="program-one__item__shape-two"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 15 21">
                                    <path
                                        d="M5.28824 3.20713C-4.67276 11.0063 1.12287 24.745 8.85298 18.7583C16.5909 12.7795 18.6736 -7.25972 5.28824 3.20713Z" />
                                </svg>
                            </div>
                            <div class="program-one__item__bg"></div>
                            <div class="program-one__item__image" style="margin-top: 20px;">
                                <img
                                    src="client/assets/images/program/15year.jpg"
                                    alt="img" />
                            </div>
                            <!-- /.program-one__item__image -->
                            <div class="program-one__item__content">
                                <h3 class="program-one__item__title">
                                    <a href="client/program-3">Advance learning</a>
                                </h3>
                                <!-- /.program-one__item__title -->
                                <div class="program-one__item__age">(8.5-15 years)</div>
                                <!-- /.program-one__item__age -->
                                <p style="margin-top: 20px; display: flex; flex-direction: column;">
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Professional Training
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Cricket
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Football
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Basketball
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> Gymnastics
                                </div>
                                <div class="program-one__item__text" style="display: flex; align-items: center; gap: 10px;">
                                    <span style="font-size: 30px;">•</span> And, Many more
                                </div>
                                </p>
                                <!-- /.program-one__item__text -->
                                <a
                                    class="program-one__item__rm"
                                    href="client/program-3"><span class="icon-right-arrow"></span></a><!-- /.program-one__item__text -->
                            </div>
                            <!-- /.program-one__item__content -->
                        </div>
                        <!-- /.program-one__item__one -->
                    </div>
                    <!-- /.program-item -->
                    <!-- <div class="col-lg-3 col-md-6">
            <div
              class="program-one__item program-one__item--order wow fadeInUp"
              data-wow-duration="1500ms"
              data-wow-delay="300ms"
              style="--accent-color: #ffaa23">
              <div class="program-one__item__shape">
                <svg
                  class="program-one__item__shape-one"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 32 43">
                  <path
                    d="M11.0817 6.98831C-9.7901 23.3302 2.35379 52.1177 18.5511 39.5735C34.7647 27.0458 39.1287 -14.9434 11.0817 6.98831Z" />
                </svg>
                <svg
                  class="program-one__item__shape-two"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 15 21">
                  <path
                    d="M5.28824 3.20713C-4.67276 11.0063 1.12287 24.745 8.85298 18.7583C16.5909 12.7795 18.6736 -7.25972 5.28824 3.20713Z" />
                </svg>
              </div>
              <div class="program-one__item__bg"></div>
              <div class="program-one__item__image" style="margin-top: 20px;">
                <img
                  src="client/assets/images/program/program-1-4.jpg"
                  alt="Flex-care" />
              </div>
              <div class="program-one__item__content">
                <h3 class="program-one__item__title">
                  <a href="programs-d-flex-care">Flex-care</a>
                </h3>
                
                <div class="program-one__item__age">(5-12 years)</div>
                
                <p class="program-one__item__text">
                  Lorem ipsum dolor sit amet consectetur. Convallis
                </p>
                
                <a
                  class="program-one__item__rm"
                  href="programs-d-flex-care"><span class="icon-right-arrow"></span></a>
              </div>
              
            </div>
            
          </div> -->
                    <!-- /.program-item -->
                </div>
            </div>
        </section>
        <section class="team-one">
            <div
                class="team-one__bg kidearn-splax"
                data-para-options='{
		"orientation": "up",
		"scale": 1.5,
		"overflow": true
		}'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1195 1252">
                    <path
                        d="M211.29 830.798C-198.76 707.556 65.7912 34.8903 361.688 40.6371C657.585 46.3839 708.035 114.612 848.844 103.059C989.653 91.5051 1158.39 -92.3898 1316.24 63.0933C1474.09 218.592 1356.45 408.609 1425.45 592.889C1478.72 735.167 1718.31 1057.1 1492.55 1209.42C1209.75 1400.22 1025.31 885.993 761.277 816.097C497.243 746.202 515.507 922.251 211.29 830.798Z" />
                </svg>
            </div>
            <div class="container">
                <div class="sec-title text-center">
                    <h6 class="sec-title__tagline">Our Teacher</h6>
                    <!-- /.sec-title__tagline -->

                    <h3 class="sec-title__title">
                        Meet our expert & smart<br />
                        superheroes!
                    </h3>
                    <!-- /.sec-title__title -->
                </div>
                <!-- /.sec-title -->
                <div
                    class="team-one__carousel kidearn-owl__carousel kidearn-owl__carousel--basic-nav kidearn-owl__carousel--with-shadow owl-carousel owl-theme"
                    data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
			"dots": true,
			"autoplay": false,
			"responsive": {
				"0": {
					"items": 1
				},
				"576": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
			}'>

                    <?php while ($post = mysqli_fetch_assoc($result)) : ?>
                        <div class="item">
                            <div
                                class="team-card wow fadeInUp"
                                data-wow-duration="1500ms"
                                data-wow-delay="00ms"
                                style="--accent-color: #26a6a1">
                                <div class="team-card__svg-top">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 207 157"
                                        fill="currentColor">
                                        <path
                                            d="M0.255249 1.69657C0.907365 0.855618 12.3312 0.403216 29.5368 0.426383C46.7158 0.513133 69.6055 1.28915 92.43 3.86789C115.129 6.52265 136.887 11.9096 152.332 18.8871C156.063 20.7291 160.018 22.2178 163.085 24.0834C166.027 26.0249 168.807 27.8183 171.326 29.4759C172.586 30.3047 173.783 31.1053 174.907 31.8548C175.906 32.6803 176.753 33.513 177.573 34.2768C179.212 35.8045 180.617 37.1329 181.716 38.2108C182.815 39.2886 184.157 40.5888 185.634 42.1007C187.067 43.6303 188.151 45.5893 189.621 47.6079C191.002 49.662 192.509 51.9048 194.115 54.2677C195.766 56.6128 196.54 59.4901 197.896 62.2698C199.074 65.1203 200.421 68.0095 201.537 71.0967C202.284 74.3024 203.059 77.5769 203.852 80.8974C205.752 87.4145 205.994 94.5861 206.495 101.496C207.754 129.351 201.165 155.955 198.932 156.465C195.811 157.22 197.496 131.837 192.769 105.828C191.373 99.4039 190.414 92.6477 187.897 86.6661C186.845 83.6072 185.802 80.5712 184.786 77.6041C183.331 74.8368 181.903 72.1384 180.52 69.5546C179.048 67.0063 178.105 64.3551 176.347 62.2643C174.679 60.1381 173.145 58.0913 171.694 56.2509C170.197 54.4283 169.113 52.6017 167.699 51.2504C166.276 49.8762 164.988 48.7137 163.971 47.7099C162.953 46.7061 161.692 45.48 160.232 44.014C159.485 43.3013 158.755 42.5021 157.872 41.71C156.864 40.994 155.794 40.2498 154.696 39.4367C152.464 37.8513 150.061 36.0947 147.461 34.2305C144.815 32.3841 141.282 30.9144 138.018 29.0738C124.431 22.0789 105.04 16.1286 84.1235 12.4784C63.162 8.84582 41.6318 6.79042 25.7309 5.21776C9.8033 3.70869 -0.387809 2.56047 0.255249 1.69657Z" />
                                    </svg>
                                </div>
                                <!-- /.top__shape -->
                                <div class="team-card__svg-middle">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 217 98"
                                        fill="currentColor">
                                        <path
                                            d="M203.517 22.6552C120.489 128.266 3.54803 91.1587 2.29153 90.7596C0.667608 90.2287 -0.200435 88.4866 0.330195 86.8628C0.860825 85.2391 2.60286 84.3715 4.22678 84.9025C5.48328 85.3016 130.102 124.677 210.694 2.04102C211.597 0.592506 213.532 0.229286 214.961 1.15706C216.391 2.08483 216.774 3.99488 215.846 5.42433C211.856 11.5493 207.731 17.2946 203.517 22.6552Z" />
                                    </svg>
                                </div>
                                <!-- /.middle__shape -->
                                <div
                                    class="team-card__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 5, "speed": 700, "scale": 1 }'>
                                    <img
                                        src="server/admin/pages/teachers/<?= $post['image'] ?>"
                                        alt="image" />
                                </div>
                                <!-- /.team-card__image -->
                                <div class="team-card__content">
                                    <h3 class="team-card__title">
                                        <a href="client/team-details?id=<?= $post['id'] ?>"><?= $post['name'] ?></a>
                                    </h3>
                                    <!-- /.team-card__title -->
                                    <p class="team-card__designation"><?= $post['designation'] ?></p>
                                    <!-- /.team-card__designation -->
                                    <div class="list-unstyled team-card__social__list">
                                        <a class="fb" href="<?= $post['social_media_link'] ?>">
                                            <span class="social-bg">
                                                <svg
                                                    viewBox="0 0 32 33"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    stroke="currentColor">
                                                    <path
                                                        d="M31.5 16.3589C31.5 20.5911 29.4895 24.2963 26.5247 27.0295C23.5615 29.7612 19.6738 31.4931 15.9801 31.7919C7.53366 31.7812 0.499996 24.8704 0.499997 16.3588C0.499998 12.0164 1.39914 8.15083 4.00159 5.36741C6.5968 2.59173 10.9785 0.794576 18.1657 0.791876C22.7642 1.09086 26.0753 2.85269 28.2459 5.56601C30.428 8.29363 31.5 12.0368 31.5 16.3589Z" />
                                                </svg>
                                            </span>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            <span class="sr-only">Social Media Link</span>
                                        </a>
                                    </div>
                                    <!-- /.list-unstyled team-card__social__list -->
                                </div>
                                <!-- /.team-card__content -->
                            </div>
                            <!-- /.team-card -->
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <section class="mail-one">
            <div
                class="mail-one__bg-shape"
                style="
            background-image: url(client/assets/images/shapes/mail-shape-1.png);
          "></div>
            <div
                class="mail-one__border-shape kidearn-splax"
                style="
            background-image: url(client/assets/images/shapes/mail-shape-2.png);
          "
                data-para-options='{
        "orientation": "down",
        "scale": 1.2,
        "delay": ".6",
        "transition": "cubic-bezier(0,0,0,1)",
        "overflow": true
        }'></div>
            <div class="container">
                <div class="mail-one__area">
                    <div class="mail-one__bg"></div>
                    <div class="mail-one__content">
                        <h3 class="mail-one__title">
                            Subscribe to our Blogsletter<br />
                            for daily updates
                        </h3>
                        <form action="" method="POST" class="mail-one__form">
                            <input type="text" name="email" placeholder="Email Address" required />
                            <button name="add" type="submit" class="kidearn-btn">
                                <span>Subscribe</span>
                            </button>
                        </form>


                        <div class="mc-form__response"></div>
                    </div>
                    <div
                        class="mail-one__shape kidearn-splax"
                        data-para-options='{
                "orientation": "up",
                "scale": 1.5,
                "delay": ".6",
                "transition": "cubic-bezier(0,0,0,1)",
                "overflow": true
                }'>
                        <img
                            src="client/assets/images/shapes/mail-shape-3.png"
                            alt="kidearn" />
                    </div>
                </div>
            </div>

        </section>
        <!-- /.mail-one -->

        <section class="team-one">
            <!-- <div
                class="team-one__bg kidearn-splax"
                data-para-options='{
		"orientation": "up",
		"scale": 1.5,
		"overflow": true
		}'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1195 1252">
                    <path
                        d="M211.29 830.798C-198.76 707.556 65.7912 34.8903 361.688 40.6371C657.585 46.3839 708.035 114.612 848.844 103.059C989.653 91.5051 1158.39 -92.3898 1316.24 63.0933C1474.09 218.592 1356.45 408.609 1425.45 592.889C1478.72 735.167 1718.31 1057.1 1492.55 1209.42C1209.75 1400.22 1025.31 885.993 761.277 816.097C497.243 746.202 515.507 922.251 211.29 830.798Z" />
                </svg>
            </div> -->
            <div class="container">
                <div class="sec-title text-center">
                    <h6 class="sec-title__tagline">Our Gallery</h6>
                    <!-- /.sec-title__tagline -->

                    <h3 class="sec-title__title">
                        Precious Memory
                    </h3>
                    <!-- /.sec-title__title -->
                </div>
                <!-- /.sec-title -->
                <div
                    class="team-one__carousel kidearn-owl__carousel kidearn-owl__carousel--basic-nav kidearn-owl__carousel--with-shadow owl-carousel owl-theme"
                    data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
			"dots": true,
			"autoplay": false,
			"responsive": {
				"0": {
					"items": 1
				},
				"576": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
			}'>

                    <?php while ($post = mysqli_fetch_assoc($result3)) : ?>
                        <div class="item">
                            <div
                                class="team-card wow fadeInUp"
                                data-wow-duration="1500ms"
                                data-wow-delay="00ms"
                                style="--accent-color: #26a6a1">
                                <div class="team-card__svg-top">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 207 157"
                                        fill="currentColor">
                                        <path
                                            d="M0.255249 1.69657C0.907365 0.855618 12.3312 0.403216 29.5368 0.426383C46.7158 0.513133 69.6055 1.28915 92.43 3.86789C115.129 6.52265 136.887 11.9096 152.332 18.8871C156.063 20.7291 160.018 22.2178 163.085 24.0834C166.027 26.0249 168.807 27.8183 171.326 29.4759C172.586 30.3047 173.783 31.1053 174.907 31.8548C175.906 32.6803 176.753 33.513 177.573 34.2768C179.212 35.8045 180.617 37.1329 181.716 38.2108C182.815 39.2886 184.157 40.5888 185.634 42.1007C187.067 43.6303 188.151 45.5893 189.621 47.6079C191.002 49.662 192.509 51.9048 194.115 54.2677C195.766 56.6128 196.54 59.4901 197.896 62.2698C199.074 65.1203 200.421 68.0095 201.537 71.0967C202.284 74.3024 203.059 77.5769 203.852 80.8974C205.752 87.4145 205.994 94.5861 206.495 101.496C207.754 129.351 201.165 155.955 198.932 156.465C195.811 157.22 197.496 131.837 192.769 105.828C191.373 99.4039 190.414 92.6477 187.897 86.6661C186.845 83.6072 185.802 80.5712 184.786 77.6041C183.331 74.8368 181.903 72.1384 180.52 69.5546C179.048 67.0063 178.105 64.3551 176.347 62.2643C174.679 60.1381 173.145 58.0913 171.694 56.2509C170.197 54.4283 169.113 52.6017 167.699 51.2504C166.276 49.8762 164.988 48.7137 163.971 47.7099C162.953 46.7061 161.692 45.48 160.232 44.014C159.485 43.3013 158.755 42.5021 157.872 41.71C156.864 40.994 155.794 40.2498 154.696 39.4367C152.464 37.8513 150.061 36.0947 147.461 34.2305C144.815 32.3841 141.282 30.9144 138.018 29.0738C124.431 22.0789 105.04 16.1286 84.1235 12.4784C63.162 8.84582 41.6318 6.79042 25.7309 5.21776C9.8033 3.70869 -0.387809 2.56047 0.255249 1.69657Z" />
                                    </svg>
                                </div>
                                <!-- /.top__shape -->
                                <div class="team-card__svg-middle">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 217 98"
                                        fill="currentColor">
                                        <path
                                            d="M203.517 22.6552C120.489 128.266 3.54803 91.1587 2.29153 90.7596C0.667608 90.2287 -0.200435 88.4866 0.330195 86.8628C0.860825 85.2391 2.60286 84.3715 4.22678 84.9025C5.48328 85.3016 130.102 124.677 210.694 2.04102C211.597 0.592506 213.532 0.229286 214.961 1.15706C216.391 2.08483 216.774 3.99488 215.846 5.42433C211.856 11.5493 207.731 17.2946 203.517 22.6552Z" />
                                    </svg>
                                </div>
                                <!-- /.middle__shape -->
                                <div
                                    class="team-card__image kidearn-tilt"
                                    data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 5, "speed": 700, "scale": 1 }'>
                                    <a href="./client/gallery-filter">
                                        <img
                                            src="server/admin/pages/gallery/<?= $post['image'] ?>"
                                            alt="image" />
                                    </a>

                                    <!-- <div class="gallery-one__card__hover">
                                        <a href="server/admin/pages/gallery/<?= $post['image'] ?>" class="img-popup">
                                            <span class="gallery-one__card__icon"></span>
                                        </a>
                                    </div> -->
                                </div>
                                <!-- /.team-card__image -->

                                <!-- <div class="team-card__content">
                                    <h3 class="team-card__title">
                                        <a href="client/team-details?id=<?= $post['id'] ?>"><?= $post['name'] ?></a>
                                    </h3>
                                    <p class="team-card__designation"><?= $post['designation'] ?></p>
                                    <div class="list-unstyled team-card__social__list">
                                        <a class="fb" href="<?= $post['social_media_link'] ?>">
                                            <span class="social-bg">
                                                <svg
                                                    viewBox="0 0 32 33"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    stroke="currentColor">
                                                    <path
                                                        d="M31.5 16.3589C31.5 20.5911 29.4895 24.2963 26.5247 27.0295C23.5615 29.7612 19.6738 31.4931 15.9801 31.7919C7.53366 31.7812 0.499996 24.8704 0.499997 16.3588C0.499998 12.0164 1.39914 8.15083 4.00159 5.36741C6.5968 2.59173 10.9785 0.794576 18.1657 0.791876C22.7642 1.09086 26.0753 2.85269 28.2459 5.56601C30.428 8.29363 31.5 12.0368 31.5 16.3589Z" />
                                                </svg>
                                            </span>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            <span class="sr-only">Social Media Link</span>
                                        </a>
                                    </div>
                                </div> -->

                                <!-- /.team-card__content -->
                            </div>
                            <!-- /.team-card -->
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>

        <section class="blog-three">
            <div
                class="blog-three__shape-right kidearn-splax"
                data-para-options='{
		"orientation": "right",
		"scale": 3.5,
		"overflow": true
		}'>
                <img
                    src="client/assets/images/shapes/blog-3-shape-1.png"
                    alt="kidearn" />
            </div>
            <div
                class="blog-three__shape-left kidearn-splax"
                data-para-options='{
		"orientation": "left",
		"scale": 3.5,
		"overflow": true
		}'>
                <img
                    src="client/assets/images/shapes/blog-3-shape-2.png"
                    alt="kidearn" />
            </div>
            <div class="container">
                <div class="sec-title text-center">
                    <h6 class="sec-title__tagline">Latest Blog</h6>
                    <!-- /.sec-title__tagline -->

                    <h3 class="sec-title__title">
                        Checkout our latest Blogs<br />
                        updates & articles
                    </h3>
                    <!-- /.sec-title__title -->
                </div>
                <!-- /.sec-title -->
                <div
                    class="blog-three__carousel kidearn-owl__carousel kidearn-owl__carousel--basic-nav owl-carousel owl-theme"
                    data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
			"dots": true,
			"autoplay": false,
			"responsive": {
				"0": {
					"items": 1
				},
				"576": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
			}'>

                    <?php while ($post = mysqli_fetch_assoc($result1)) : ?>

                        <?php

                        include('server/admin/database/config.php');

                        $post_id = $post['category'];

                        $result2 = "SELECT * FROM blog_category WHERE id = $post_id";
                        $result3 = mysqli_query($conn, $result2);
                        $result4 = mysqli_fetch_assoc($result3);

                        mysqli_close($conn);

                        ?>

                        <div class="item">
                            <div
                                class="blog-card-three wow fadeInUp"
                                data-wow-duration="1500ms"
                                data-wow-delay="00ms"
                                style="--accent-color: #f25334">
                                <div class="blog-card-three__bg"></div>
                                <div class="blog-card-three__image">
                                    <img
                                        src="server/admin/pages/blog/<?= $post['image'] ?>"
                                        alt="10 easy steps to more learn about play" />
                                    <div class="blog-card-three__image__layer-wrapper">
                                        <div
                                            class="blog-card-three__image__layer"
                                            style="
                        background-image: url(server/admin/pages/blog/<?= $post['image'] ?>);
                      "></div>
                                        <div
                                            class="blog-card-three__image__layer"
                                            style="
                        background-image: url(server/admin/pages/blog/<?= $post['image'] ?>);
                      "></div>
                                        <div
                                            class="blog-card-three__image__layer"
                                            style="
                        background-image: url(server/admin/pages/blog/<?= $post['image'] ?>);
                      "></div>
                                        <div
                                            class="blog-card-three__image__layer"
                                            style="
                        background-image: url(server/admin/pages/blog/<?= $post['image'] ?>);
                      "></div>
                                    </div>
                                    <a
                                        href="client/blog-details?id=<?= $post['id'] ?>"
                                        class="blog-card-three__image__link"><span class="sr-only"><?= $post['title'] ?></span><!-- /.sr-only --></a>
                                </div>
                                <!-- /.blog-card-three__image -->
                                <div class="blog-card-three__content">
                                    <div class="blog-card-three__content__top">
                                        <a
                                            href="#"
                                            class="blog-card-three__category"><?= $result4['category'] ?></a>
                                        <div class="blog-card-three__date"><?= date("M d, Y", strtotime($post['date_updated'])) ?></div>
                                        <!-- /.blog-card-three__date -->
                                    </div>
                                    <!-- /.blog-card-three__content__top -->
                                    <h3 class="blog-card-three__title">
                                        <a href="client/blog-details?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                                    </h3>
                                    <!-- /.blog-card-three__title -->

                                    <!-- /.blog-card-three__content__bottom -->
                                </div>
                                <!-- /.blog-card-three__content -->
                            </div>
                            <!-- /.blog-card-three -->
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.blog-three -->
        <footer class="main-footer">
            <div class="main-footer__bg"></div>
            <!-- /.main-footer__bg -->
            <img
                src="client/assets/images/shapes/footer-s-1-1.png"
                class="main-footer__shape-1"
                alt="kidearn" />
            <img
                src="client/assets/images/shapes/footer-s-1-2.png"
                class="main-footer__shape-2"
                alt="kidearn" />
            <img
                src="client/assets/images/shapes/footer-s-1-3.png"
                class="main-footer__shape-3"
                alt="kidearn" />
            <img
                src="client/assets/images/shapes/footer-s-1-4.png"
                class="main-footer__shape-4"
                alt="kidearn" />
            <div class="main-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="footer-widget footer-widget--about">
                                <a href="index" class="footer-widget__logo">
                                    <img
                                        src="client/assets/images/logo-light.png"
                                        width="60%"
                                        alt="Kidearn HTML Template" />
                                </a>
                                <ul class="list-unstyled footer-widget__info">
                                    <li>
                                        <i class="icon-location2 footer-widget__info__icon"></i>
                                        <a href="#">4th floor Starlit tower,Y.N road Indore</a>
                                    </li>
                                    <li>
                                        <i class="icon-call footer-widget__info__icon"></i>
                                        <a href="tel:916284510187">+91 6284510187</a>
                                    </li>
                                    <li>
                                        <i class="icon-email1 footer-widget__info__icon"></i>
                                        <a href="mailto:ankit19477@gmail.com">ankit19477@gmail.com</a>
                                    </li>
                                </ul>
                                <!-- /.list-unstyled -->
                                <div class="footer-widget__social">
                                    <a href="https://youtube.com/@osho1325?si=bphadi58U87oaFdy" target="_blank">
                                        <i class="fab fa-youtube" aria-hidden="true"></i>
                                        <span class="sr-only">Youtube</span>
                                    </a>
                                    <a href="https://www.facebook.com/profile?id=100066267475017&mibextid=ZbWKwL" target="_blank">
                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                        <span class="sr-only">Facebook</span>
                                    </a>
                                    <a href="https://www.linkedin.com/in/ankit-gupta-2a61401a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">
                                        <i class="fab fa-linkedin" aria-hidden="true"></i>
                                        <span class="sr-only">Linkedin</span>
                                    </a>
                                    <a href="https://www.instagram.com/oshinsports_by_ankitgupta?igsh=MTc0ZmdmZHI3emV6NQ==" target="_blank">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                        <span class="sr-only">Instagram</span>
                                    </a>
                                </div>
                                <!-- /.footer-widget__social -->
                            </div>
                            <!-- /.footer-widget -->
                        </div>
                        <div class="col-md-6 col-xl-2">
                            <div class="footer-widget footer-widget--links">
                                <h2 class="footer-widget__title">Links</h2>
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="index">Home</a></li>
                                    <li><a href="client/about">About</a></li>
                                    <li><a href="client/programs-grid">Programs</a></li>
                                    <li><a href="client/team">Our teacher</a></li>
                                    <li><a href="client/gallery-filter">Gallery Filter</a></li>
                                    <li><a href="client/blog-grid">Blogs</a></li>
                                    <li><a href="client/contact">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-2">
                            <div class="footer-widget footer-widget--links-two">
                                <h2 class="footer-widget__title">Oshin World</h2>
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="client/about">Oshin Sports Academy</a></li>
                                    <li><a href="client/school-about">Oshin School</a></li>
                                    <li><a href="client/event-about">Oshin Events</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-md-6 col-xl-4">
                            <div class="footer-widget footer-widget--gallery">
                                <h2 class="footer-widget__title">Enquiry Now</h2>
                                <form action="client/submit_inquiry" method="POST" onsubmit="submitFooterForm(event)">
                                    <div class="input-box2">
                                        <input type="text" name="name" placeholder="Name" required />
                                    </div>
                                    <div class="input-box2">
                                        <input type="tel" name="email" placeholder="Mobile" pattern="\d{10}" maxlength="10" minlength="10" required />
                                    </div>
                                    <div class="input-box2">
                                        <textarea name="message" rows="2" placeholder="Message" required></textarea>
                                    </div>
                                    <button style="width: 100%;" type="submit" class="submit-btn kidearn-btn main-header__btn"><span style="width: 100%; text-align: center;">Submit</span></button>
                                    <div class="input-box2" style="margin-top: 12px; width: 90%; text-align: center;"><span id="you_are_submitted" style="color: white;">You have submitted.</span></div>
                                </form>
                            </div>
                        </div>

                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.main-footer__top -->
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <p class="main-footer__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> by Oshin Sport Academy.
                        </p>
                    </div>
                    <!-- /.main-footer__inner -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.main-footer__bottom -->
        </footer>
        <!-- /.main-footer -->
    </div>
    <!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index" aria-label="logo image"><img
                        src="client/assets/images/logo-light.png"
                        width="155"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:ankit19477@gmail.com">ankit19477@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:916284510187">+91 6284510187</a>
                </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="https://youtube.com/@osho1325?si=bphadi58U87oaFdy" target="_blank">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <span class="sr-only">Youtube</span>
                </a>
                <a href="https://www.facebook.com/profile?id=100066267475017&mibextid=ZbWKwL" target="_blank">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://www.linkedin.com/in/ankit-gupta-2a61401a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">
                    <i class="fab fa-linkedin" aria-hidden="true"></i>
                    <span class="sr-only">Linkedin</span>
                </a>
                <a href="https://www.instagram.com/oshinsports_by_ankitgupta?igsh=MTc0ZmdmZHI3emV6NQ==" target="_blank">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
            </div>
            <!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button
                    type="submit"
                    aria-label="search submit"
                    class="kidearn-btn kidearn-btn--base">
                    <span><i class="icon-search"></i></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" class="scroll-top">
        <svg
            class="scroll-top__circle"
            width="100%"
            height="100%"
            viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </a>

    <div id="popupBackground">
        <div id="popupBackgroundUnder">
            <div id="popupBackgroundUnder2">
                <span class="close-btn">&times;</span>
                <div id="popupForm">
                    <h2>Enquiry Form</h2>
                    <form id="inquiryForm" action="client/submit_inquiry" method="POST" onsubmit="submitForm(event)">
                        <div class="input-box">
                            <input type="text" name="name" placeholder="Name" required />
                        </div>
                        <div class="input-box">
                            <input type="tel" name="email" placeholder="Mobile" pattern="\d{10}" maxlength="10" minlength="10" required />
                        </div>
                        <div class="input-box">
                            <textarea name="message" rows="3" placeholder="Message" style="resize: none;" required></textarea>
                        </div>
                        <button style="width: 100%;" type="submit" class="submit-btn kidearn-btn main-header__btn"><span style="width: 100%; text-align: center;">Submit</span></button>
                    </form>
                </div>
                <div class="side-text">
                    <h3>
                        Any Query <br />
                        Champ?
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to set a cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Function to get a cookie
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        // Close popup when clicking the close button or outside the form
        document.querySelector('.close-btn').addEventListener('click', function() {
            document.getElementById('popupBackground').style.display = 'none';
        });

        document.getElementById('popupBackground').addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });

        // Prevent closing when clicking inside the form
        document.getElementById('popupForm').addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Submit form logic
        function submitForm(event) {
            event.preventDefault(); // Prevent default form submission

            // Hide the popup
            document.getElementById('popupBackground').style.display = 'none';

            // Set a cookie to prevent popup from appearing again
            setCookie("formSubmitted", "true", 7); // Cookie expires in 7 days

            // Submit the form via AJAX or regular POST (depending on your backend setup)
            // You can replace this with an actual AJAX call if needed.
            event.target.submit();
        }

        // Check if the form has already been submitted by checking the cookie
        window.onload = function() {
            var formSubmitted = getCookie("formSubmitted");
            if (formSubmitted) {
                // Hide the popup if the form was already submitted
                document.getElementById('popupBackground').style.display = 'none';
                document.getElementById('you_are_submitted').style.display = 'block';
            } else {
                // Show the popup if the form has not been submitted yet
                document.getElementById('popupBackground').style.display = 'flex';
                document.getElementById('you_are_submitted').style.display = 'none';
            }
        };
    </script>

    <script>
        // Function to set a cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Submit form logic
        function submitFooterForm(event) {
            event.preventDefault();

            // Set a cookie to prevent popup from appearing again
            setCookie("formSubmitted", "true", 7); // Cookie expires in 7 days

            event.target.submit();
        }
    </script>


    <script src="client/assets/vendors/jquery/jquery-3.7.0.min.js"></script>
    <script src="client/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="client/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="client/assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="client/assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="client/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="client/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="client/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="client/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="client/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="client/assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="client/assets/vendors/tiny-slider/tiny-slider.js"></script>
    <script src="client/assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="client/assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="client/assets/vendors/wow/wow.js"></script>
    <script src="client/assets/vendors/tilt/tilt.jquery.js"></script>
    <script src="client/assets/vendors/simpleParallax/simpleParallax.min.js"></script>
    <script src="client/assets/vendors/imagesloaded/imagesloaded.min.js"></script>
    <script src="client/assets/vendors/isotope/isotope.js"></script>
    <script src="client/assets/vendors/countdown/countdown.min.js"></script>
    <script src="client/assets/vendors/jquery-circleType/jquery.circleType.js"></script>
    <script src="client/assets/vendors/jquery-lettering/jquery.lettering.min.js"></script>
    <!-- template js -->
    <script src="client/assets/js/kidearn.js"></script>

</body>

<!-- Mirrored from client/index by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:01:41 GMT -->

</html>