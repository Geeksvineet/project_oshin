<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('../server/admin/database/config.php');

$query2 = "SELECT * FROM testimonials LIMIT 2";
$result2 = mysqli_query($conn, $query2);

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/kidearn-html/about by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:43 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Page</title>
    <!-- favicons Icons -->
    <link rel="icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Kidearn is a modern HTML Template for kindergarten, preschool, nursery and primary schools. The template perfectly fits for child care, babysitting, education and children related schools, websites and businesses." />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700&amp;family=Fredoka:wght@700&amp;family=Schoolbell&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.css" />
    <link rel="stylesheet" href="assets/vendors/kidearn-icons/style.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/kidearn.css" />

    <style>
        @media (min-width: 600px) {
            .custom_vs {
                position: absolute;
                top: 60px;
                /* margin-left: -45px; */
            }

            .custom_vs img {
                width: 500px;
            }
        }
    </style>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!-- <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div> -->

    <?php
    include './utils/preloader.php';
    ?>


    <div class="page-wrapper">


        <?php
        include './utils/navbar.php';
        ?>


        <!-- <div class="topbar-one">
            <div class="container-fluid">
                <div class="topbar-one__inner">
                    <div class="topbar-one__left">
                        <div class="topbar-one__social">
                            <a href="https://twitter.com/">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                <span class="sr-only">Twitter</span>
                            </a>
                            <a href="https://facebook.com/">
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="https://pinterest.com/">
                                <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                <span class="sr-only">Pinterest</span>
                            </a>
                            <a href="https://instagram.com/">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                        </div>
                        <p class="topbar-one__text">Mon to Sat: 8.00 am - 7.00 pm</p>
                    </div>
                    <ul class="list-unstyled topbar-one__info">
                        <li class="topbar-one__info__item">
                            <i class="fas fa-map-marker topbar-one__info__icon"></i>
                            <a href="#">30 Commercial Road Fratton, Australia </a>
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="fas fa-envelope topbar-one__info__icon"></i>
                            <a href="mailto:kidearn@envato.com">kidearn@envato.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->


        <!-- <header class="main-header sticky-header sticky-header--normal">
            <div class="container-fluid">
                <div class="main-header__inner">
                    <div class="main-header__logo">
                        <a href="../../index">
                            <img
                                src="assets/images/logo-dark.png"
                                alt="Kidearn HTML"
                                width="160" />
                        </a>
                    </div>

                    <nav class="main-header__nav main-menu">
                        <ul class="main-menu__list">
                            <li class="dropdown megamenu">
                                <a href="../../index">Home</a>
                            </li>

                            <li>
                                <a href="about">About</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul>
                                    <li>
                                        <a href="team">Our teacher</a>
                                    </li>
                                    <li>
                                        <a href="team-details">Teacher Details</a>
                                    </li>
                                    <li>
                                        <a href="gallery-filter">Gallery Filter</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Program</a>
                                <ul>
                                    <li>
                                        <a href="programs-grid">Program grid</a>
                                    </li>
                                    <li>
                                        <a href="programs-d-flex-care">Program Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Blogs</a>
                                <ul class="sub-menu">
                                    <li class="dropdown">
                                        <a href="blog-grid">Blogs grid</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="blog-details">Blogs details</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="main-header__right">
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a class="main-header__call" href="tel:303555-0105">
                            <i class="icon-call main-header__call__icon"></i>
                            <span class="main-header__call__content">
                                <span class="main-header__call__number">(303) 555-0105</span>
                                <span class="main-header__call__text">Call to Questions</span></span>
                        </a>
                        <a
                            href="contact"
                            class="kidearn-btn main-header__btn">
                            <span>Book a Visit</span> </a>
                    </div>
                </div>
            </div>
        </header> -->

        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">About us</h2>
                <ul class="kidearn-breadcrumb list-unstyled">
                    <li><a href="../index">Home</a></li>
                    <li><span>About</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->
        <section class="about-four">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="300ms">
                        <div class="about-four__image">
                            <div class="about-four__image__shape1">
                                <!-- <img src="assets/images/shapes/about-4-shape-1.png" alt="kidearn" /> -->
                            </div>
                            <div class="about-four__image__one kidearn-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 3, "speed": 700, "scale": 1 }'>
                                <img src="assets/images/resources/about.jpg" alt="img" />
                                <div class="about-four__image__one-bottom"></div>
                            </div>
                            <div class="about-four__image__two wow fadeInUp" data-wow-delay="500ms">
                                <!-- <img src="assets/images/resources/about22.jpg" alt="img" /> -->
                            </div>
                            <div class="about-four__image__bg-shape">
                                <img src="assets/images/shapes/about-4-shape-2.png" alt="kidearn" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="about-four__content">
                            <div class="sec-title text-left">

                                <h6 class="sec-title__tagline">About Us</h6><!-- /.sec-title__tagline -->

                                <h3 class="sec-title__title">Welcome to best sport academy for your child</h3><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-four__content__text">
                                Oshin sports is a well known organization,
                                established in the year 2015 by Ankit Gupta,
                                He is a professional Sports athlete and trainer,
                                who has the experience of more than 11 years in
                                teaching sports, to more than 5 million kids,
                                His passion towards teaching sports to the
                                young champs is remarkable
                            </p>
                            <div class="about-four__info" style="--accent-color: #F25334;">
                                <div class="about-four__info__icon"><span class="icon-trophy"></span></div>
                                <h3 class="about-four__info__title">Respect the Student</h3>
                                <p class="about-four__info__text">Teachers respect students through their behavior. <br>
                                    Respect is mutual and needs to be earned</p>
                            </div>
                            <div class="about-four__info" style="--accent-color: #2390FF;">
                                <div class="about-four__info__icon"><span class="icon-interest-rate"></span></div>
                                <h3 class="about-four__info__title">High Energy Activity
                                    Involving All</h3>
                                <p class="about-four__info__text">Classes are energetic and engaging. <br>
                                    No student is left behind.</p>
                            </div>
                            <!-- <a href="about" class="kidearn-btn">
                                <span>Learn More</span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta-one cta-one--about-page">
            <div class="container">
                <div class="cta-one__inner">
                    <div class="cta-one__shape1 kidearn-splax" data-para-options='{"orientation": "right", "scale": 1.5, "delay": ".4", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        		}'>
                        <img src="assets/images/shapes/cta-shape-1.png" alt="kidearn" />
                    </div>
                    <div class="cta-one__shape2 kidearn-splax" data-para-options='{"orientation": "down", "scale": 1.5, "delay": ".4", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        		}'>
                        <!-- <img src="assets/images/shapes/cta-shape-2.png" alt="kidearn" /> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                            <div class="cta-one__content">
                                <h3 class="cta-one__title">How to enroll your child to a Academy?</h3><!-- /.cta-one__title -->
                                <a href="contact" class="kidearn-btn"><span>Enquiry Now</span></a>
                            </div><!-- /.cta-one__content -->
                        </div>
                        <div class="col-lg-6">
                            <div class="custom_vs cta-one__one wow fadeInUp" data-wow-delay="300ms">
                                <img src="assets/images/backgrounds/sporty_childs-removebg-preview.png" alt="kidearn" />
                                <div class="cta-one__one__text">Only <br> Sports</div>
                            </div>
                            <div class="cta-one__thumb">
                                <!-- <div class="cta-one__thumb__two"><img src="assets/images/shapes/cta-2.png" alt="kidearn" /></div> -->
                            </div><!-- /.cta-one__thumb -->
                        </div>
                    </div>
                </div><!-- /.cta-one__inner -->
            </div><!-- /.container-fluid -->
        </section><!-- /.cta-one -->
        <section class="funfact-one">
            <div class="funfact-one__shape1 kidearn-splax" data-para-options='{"orientation": "down", "scale": 1.9, "delay": ".3", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'><img src="assets/images/shapes/funfact-shape-1.png" alt="kidearn" />
            </div>
            <div class="funfact-one__shape2 kidearn-splax" data-para-options='{"orientation": "right", "scale": 1.9, "delay": ".4", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'><img src="assets/images/shapes/funfact-shape-2.png" alt="kidearn" />
            </div>
            <div class="funfact-one__shape3 kidearn-splax" data-para-options='{"orientation": "right", "scale": 1.9, "delay": ".3", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'><img src="assets/images/shapes/funfact-shape-3.png" alt="kidearn" />
            </div>
            <div class="funfact-one__shape4 kidearn-splax" data-para-options='{"orientation": "left", "scale": 1.9, "delay": ".4", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'><img src="assets/images/shapes/funfact-shape-4.png" alt="kidearn" />
            </div>
            <div class="funfact-one__shape5 kidearn-splax" data-para-options='{"orientation": "left", "scale": 1.6, "delay": ".5", "transition": "cubic-bezier(0,0,0,1)", "overflow": true
        }'><img src="assets/images/shapes/funfact-shape-5.png" alt="kidearn" />
            </div>
            <div class="container">
                <div class="row gutter-y-30">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="funfact-one__item text-center">
                            <div class="funfact-one__icon"><span class="icon-graduated"></span></div>
                            <div class="funfact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="10000" data-speed="1500"></span>
                                </span>+
                            </div><!-- /.funfact-one__count -->
                            <p class="funfact-one__title">Student Enrolled</p><!-- /.funfact-one__title -->
                        </div><!-- /.fact-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="funfact-one__item funfact-one__item--smnone text-center">
                            <div class="funfact-one__icon"><span class="icon-online-learning"></span></div>
                            <div class="funfact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="11" data-speed="1500"></span>
                                </span>
                            </div><!-- /.funfact-one__count -->
                            <p class="funfact-one__title">Learn Sports</p><!-- /.funfact-one__title -->
                        </div><!-- /.fact-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="funfact-one__item text-center">
                            <div class="funfact-one__icon"><span class="icon-rating"></span></div>
                            <div class="funfact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="99.9" data-speed="1500"></span>
                                </span>%
                            </div><!-- /.funfact-one__count -->
                            <p class="funfact-one__title">satisfaction rate</p><!-- /.funfact-one__title -->
                        </div><!-- /.fact-item -->
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="funfact-one__item funfact-one__item--noborder text-center">
                            <div class="funfact-one__icon"><span class="icon-instructor"></span></div>
                            <div class="funfact-one__count">
                                <span class="count-box">
                                    <span class="count-text" data-stop="30" data-speed="1500"></span>
                                </span>+
                            </div><!-- /.funfact-one__count -->
                            <p class="funfact-one__title">Top Trainers</p><!-- /.funfact-one__title -->
                        </div><!-- /.fact-item -->
                    </div>
                </div>
            </div><!-- /.container -->
        </section><!-- /.funfact-one -->
        <section class="testimonial-one testimonial-one--home-two testimonial-one--about-page">
            <div class="testimonial-one__left-shape kidearn-splax" data-para-options='{
		"orientation": "left",
		"scale": 2.5,
		"overflow": true
		}'>
                <img src="assets/images/shapes/testimonial-shape-2.png" alt="kidearn" />
            </div>
            <div class="testimonial-one__right-shape kidearn-splax" data-para-options='{
		"orientation": "right",
		"scale": 2.5,
		"overflow": true
		}'>
                <img src="assets/images/shapes/testimonial-shape-3.png" alt="kidearn" />
            </div>
            <div class="container">
                <div class="testimonial-one__area">
                    <div class="testimonial-one__bg"></div>
                    <div class="testimonial-one__bg-shape kidearn-splax" style="background-image: url(assets/images/shapes/testimonial-shape-4.png);" data-para-options='{
				"orientation": "right",
				"scale": 1.2,
				"delay": ".3",
				"transition": "cubic-bezier(0,0,0,1)",
				"overflow": true
				}'>
                    </div>
                    <div class="sec-title text-center">

                        <h6 class="sec-title__tagline">Testimonial</h6><!-- /.sec-title__tagline -->

                        <h3 class="sec-title__title">Parents' words are the<br> key to happy kids</h3><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <div class="testimonial-one__carousel kidearn-owl__carousel owl-carousel owl-theme" data-owl-options='{
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
                                            src="../server/admin/pages/testimonials/<?= $post['image'] ?>"
                                            alt="image" />
                                        <h5 class="testimonial-one__item__author__name"><?= $post['name'] ?></h5>
                                        <p class="testimonial-one__item__author__designation"><?= $post['relation'] ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    </div>
                </div>
            </div>
        </section>
        <div class="client-carousel ">
            <div class="container">
                <h5 class="client-carousel__tilte"><span>Our Clients and Partners</span></h5><!-- section-title -->
                <div class="client-carousel__one kidearn-owl__carousel owl-theme owl-carousel" data-owl-options='{
            "items": 5,
            "margin": 65,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": 6000,
            "nav":false,
            "dots":false,
            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
            "responsive":{
                "0":{
                    "items":1,
                    "margin": 0
                },
                "360":{
                    "items":2,
                    "margin": 0
                },
                "575":{
                    "items":3,
                    "margin": 30
                },
                "768":{
                    "items":3,
                    "margin": 40
                },
                "992":{
                    "items": 4,
                    "margin": 40
                },
                "1200":{
                    "items": 5
                }
            }
            }'>
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client1.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client2.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client1.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client2.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client1.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client2.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client1.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client2.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client1.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                    <div class="client-carousel__one__item">
                        <img src="assets/images/brand/client2.png" alt="kidearn">
                    </div><!-- /.owl-slide-item-->
                </div><!-- /.thm-owl__slider -->
            </div><!-- /.container -->
        </div>



        <?php
        include './utils/footer.php';
        ?>

        <!-- <footer class="main-footer">
            <div class="main-footer__bg"></div>
            <img src="assets/images/shapes/footer-s-1-1.png" class="main-footer__shape-1" alt="kidearn">
            <img src="assets/images/shapes/footer-s-1-2.png" class="main-footer__shape-2" alt="kidearn">
            <img src="assets/images/shapes/footer-s-1-3.png" class="main-footer__shape-3" alt="kidearn">
            <img src="assets/images/shapes/footer-s-1-4.png" class="main-footer__shape-4" alt="kidearn">
            <div class="main-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="footer-widget footer-widget--about">
                                <a href="index" class="footer-widget__logo">
                                    <img src="assets/images/logo-light.png" width="160" alt="Kidearn HTML Template">
                                </a>
                                <ul class="list-unstyled footer-widget__info">
                                    <li>
                                        <i class="icon-location2 footer-widget__info__icon"></i>
                                        <a href="#">6391 Elgin St. Celina, Delaware 10299</a>
                                    </li>
                                    <li>
                                        <i class="icon-call footer-widget__info__icon"></i>
                                        <a href="tel:3035550105">(303) 555-0105</a>
                                    </li>
                                    <li>
                                        <i class="icon-email1 footer-widget__info__icon"></i>
                                        <a href="mailto:kidearn@envato.com">kidearn@envato.com</a>
                                    </li>
                                </ul>
                                <div class="footer-widget__social">
                                    <a href="https://twitter.com/">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                        <span class="sr-only">Twitter</span>
                                    </a>
                                    <a href="https://facebook.com/">
                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                        <span class="sr-only">Facebook</span>
                                    </a>
                                    <a href="https://pinterest.com/">
                                        <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                        <span class="sr-only">Pinterest</span>
                                    </a>
                                    <a href="https://instagram.com/">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                        <span class="sr-only">Instagram</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-2">
                            <div class="footer-widget footer-widget--links">
                                <h2 class="footer-widget__title">Links</h2>
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="about">Admissions</a></li>
                                    <li><a href="programs">Programs</a></li>
                                    <li><a href="programs-d-discipline">Outdoor Games</a></li>
                                    <li><a href="programs-d-preschool">Online Classes</a></li>
                                    <li><a href="contact">Appointment</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-2">
                            <div class="footer-widget footer-widget--links-two">
                                <h2 class="footer-widget__title">Explore</h2>
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="about">About</a></li>
                                    <li><a href="blog-grid">Our Blogs</a></li>
                                    <li><a href="contact">Contact</a></li>
                                    <li><a href="faq">Help</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="footer-widget footer-widget--gallery">
                                <h2 class="footer-widget__title">Gallery</h2>
                                <ul class="list-unstyled footer-widget__gallery">
                                    <li>
                                        <a class="img-popup" href="assets/images/resources/footer-gallery-1.png">
                                            <img src="assets/images/resources/footer-gallery-1.png" alt="footer gallery">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="img-popup" href="assets/images/resources/footer-gallery-2.png">
                                            <img src="assets/images/resources/footer-gallery-2.png" alt="footer gallery">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="img-popup" href="assets/images/resources/footer-gallery-3.png">
                                            <img src="assets/images/resources/footer-gallery-3.png" alt="footer gallery">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="img-popup" href="assets/images/resources/footer-gallery-4.png">
                                            <img src="assets/images/resources/footer-gallery-4.png" alt="footer gallery">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="img-popup" href="assets/images/resources/footer-gallery-5.png">
                                            <img src="assets/images/resources/footer-gallery-5.png" alt="footer gallery">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="img-popup" href="assets/images/resources/footer-gallery-6.png">
                                            <img src="assets/images/resources/footer-gallery-6.png" alt="footer gallery">
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <p class="main-footer__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> by Kidearn HTML Template.
                        </p>
                    </div>
                </div>
            </div>
        </footer> -->

    </div>



    <!-- <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index" aria-label="logo image"><img src="assets/images/logo-light.png" width="155" alt="" /></a>
            </div>
            <div class="mobile-nav__container"></div>

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@kidearn.com">needhelp@kidearn.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul>
            <div class="mobile-nav__social">
                <a href="https://twitter.com/">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://facebook.com/">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://pinterest.com/">
                    <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                    <span class="sr-only">Pinterest</span>
                </a>
                <a href="https://instagram.com/">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
            </div>
        </div>
    </div> -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="kidearn-btn kidearn-btn--base">
                    <span><i class="icon-search"></i></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" class="scroll-top">
        <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </a>


    <script src="assets/vendors/jquery/jquery-3.7.0.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/tilt/tilt.jquery.js"></script>
    <script src="assets/vendors/simpleParallax/simpleParallax.min.js"></script>
    <script src="assets/vendors/imagesloaded/imagesloaded.min.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/jquery-circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/jquery-lettering/jquery.lettering.min.js"></script>
    <!-- template js -->
    <script src="assets/js/kidearn.js"></script>
</body>


<!-- Mirrored from bracketweb.com/kidearn-html/about by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:43 GMT -->

</html>