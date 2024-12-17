<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('../server/admin/database/config.php');

$query1 = "SELECT * FROM blog LIMIT 6";
$result1 = mysqli_query($conn, $query1);

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/kidearn-html/blog-grid by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:03:01 GMT -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blogs Grid</title>
  <!-- favicons Icons -->
  <link rel="icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
  <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
  <meta name="description" content="Kidearn is a modern HTML Template for kindergarten, preschool, nursery and primary schools. The template perfectly fits for child care, babysitting, education and children related schools, websites and businesses." />

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700&amp;family=Fredoka:wght@700&amp;family=Schoolbell&amp;display=swap"
    rel="stylesheet">

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
</head>

<body class="custom-cursor">

  <div class="custom-cursor__cursor"></div>
  <div class="custom-cursor__cursor-two"></div>

  <?php
  include './utils/preloader.php';
  ?>

  <div class="page-wrapper">

    <?php
    include './utils/navbar.php';
    ?>

    <section class="page-header">
      <div class="page-header__bg"></div>
      <!-- /.page-header__bg -->
      <div class="container">
        <h2 class="page-header__title">Blogs grid</h2>
        <ul class="kidearn-breadcrumb list-unstyled">
          <li><a href="../index">Home</a></li>
          <li><span>Our Blogs</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
      </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="blog-one blog-one--page">
      <div class="container">
        <div class="row gutter-y-30">

          <?php while ($post = mysqli_fetch_assoc($result1)) : ?>

            <?php

            include('../server/admin/database/config.php');

            $post_id = $post['category'];

            $result2 = "SELECT * FROM blog_category WHERE id = $post_id";
            $result3 = mysqli_query($conn, $result2);
            $result4 = mysqli_fetch_assoc($result3);

            mysqli_close($conn);

            ?>

            <div class="col-md-6 col-lg-4">
              <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                <div class="blog-card__image">
                  <img src="../server/admin/pages/blog/<?= $post['image'] ?>" alt="10 Easy steps to more learn about play">
                  <div class="blog-card__image__layer" style="background-image: url(../server/admin/pages/blog/<?= $post['image'] ?>);"></div>
                  <div class="blog-card__image__layer" style="background-image: url(../server/admin/pages/blog/<?= $post['image'] ?>);"></div>
                  <div class="blog-card__image__layer" style="background-image: url(../server/admin/pages/blog/<?= $post['image'] ?>);"></div>
                  <div class="blog-card__image__layer" style="background-image: url(../server/admin/pages/blog/<?= $post['image'] ?>);"></div>
                  <a href="blog-details?id=<?= $post['id'] ?>" class="blog-card__image__link"><span class="sr-only"><?= $post['title'] ?></span>
                    <!-- /.sr-only --></a>
                </div><!-- /.blog-card__image -->
                <div class="blog-card__content">
                  <div class="blog-card__content__top">
                    <a href="#" class="blog-card__category"><?= $result4['category'] ?></a>
                    <div class="blog-card__date"><?= date("M d, Y", strtotime($post['date_updated'])) ?></div><!-- /.blog-card__date -->
                  </div><!-- /.blog-card__content__top -->
                  <h3 class="blog-card__title"><a href="blog-details?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3><!-- /.blog-card__title -->
                </div><!-- /.blog-card__content -->
              </div><!-- /.blog-card -->
            </div><!-- /.col-md-6 col-lg-4 -->

          <?php endwhile; ?>

        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.blog-one blog-one--page -->

    <?php
    include './utils/footer.php';
    ?>

  </div><!-- /.page-wrapper -->



  <!-- /.mobile-nav__wrapper -->
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


<!-- Mirrored from bracketweb.com/kidearn-html/blog-grid by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:03:02 GMT -->

</html>