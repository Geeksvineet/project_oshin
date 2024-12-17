<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('../server/admin/database/config.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM teachers WHERE id=$id";
	$result = mysqli_query($conn, $query);
	$post = mysqli_fetch_assoc($result);
  } else {
	header(("location: team"));
	die();
  }

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/kidearn-html/team-details by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:45 GMT -->

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Our Teacher Details</title>
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
				<h2 class="page-header__title">Teacher details</h2>
				<ul class="kidearn-breadcrumb list-unstyled">
					<li><a href="../index">Home</a></li>
					<li><span>Our Teachers</span></li>
				</ul><!-- /.thm-breadcrumb list-unstyled -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->

		<section class="team-details">
			<div class="container">
				<div class="team-details__inner">
					<div class="row gutter-y-60">
						<div class="col-lg-5">
							<div class="team-details__image">
								<img src="../server/admin/pages/teachers/<?= $post['image'] ?>" alt="image">
							</div><!-- /.team-details__image -->
						</div><!-- /.col-lg-5 -->
						<div class="col-lg-7">
							<div class="team-details__content">
								<div class="sec-title text-left">

									<h6 class="sec-title__tagline"><?= $post['designation'] ?></h6><!-- /.sec-title__tagline -->

									<h3 class="sec-title__title">Hello, i’m <?= $post['name'] ?></h3><!-- /.sec-title__title -->
								</div><!-- /.sec-title -->
								<div class="team-details__text"><?= $post['description'] ?></div>
								<!-- /.team-details__text -->
								<div class="team-details__highlight"><?= $post['perspective'] ?></div>
								<!-- /.team-details__highlight -->

								<ul class="list-unstyled team-details__list">
									<li>
										Experience: <span><?= $post['experience'] ?> Years</span>
									</li>
									<li>
										Email: <a href="mailto:<?= $post['email'] ?>"><?= $post['email'] ?></a>
									</li>
									<li>
										Phone: <a href="tel:91<?= $post['phone'] ?>">+91 <?= $post['phone'] ?></a>
									</li>
								</ul><!-- /.list-unstyled team-details__list -->
								<div class="team-certificates-one__progress">
								<div class="team-details__social">
									<a href="<?= $post['social_media_link'] ?>">
										<i class="fa fa-globe" aria-hidden="true"></i>
										<span class="sr-only">Social Media</span>
									</a>
								</div><!-- /.team-details__social -->
							</div><!-- /.team-details__content -->
						</div><!-- /.col-lg-7 -->
					</div><!-- /.row -->
				</div><!-- /.team-details__inner -->
			</div><!-- /.container -->
		</section><!-- /.team-details -->

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


<!-- Mirrored from bracketweb.com/kidearn-html/team-details by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:47 GMT -->

</html>