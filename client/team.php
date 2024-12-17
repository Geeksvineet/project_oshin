<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('../server/admin/database/config.php');


$sql = "SELECT *
        FROM teachers 
        LIMIT 6";

$result = mysqli_query($conn, $sql);

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/kidearn-html/team by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:43 GMT -->

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Our Teachers</title>
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
				<h2 class="page-header__title">Our teachers</h2>
				<ul class="kidearn-breadcrumb list-unstyled">
					<li><a href="../index">Home</a></li>
					<li><span>Teachers</span></li>
				</ul><!-- /.thm-breadcrumb list-unstyled -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->
		<section class="team-one">
			<div class="container">
				<div class="row">
				<?php while ($post = mysqli_fetch_assoc($result)) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms' style='--accent-color: #26A6A1;'>
							<div class="team-card__svg-top">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 207 157" fill="currentColor">
									<path d="M0.255249 1.69657C0.907365 0.855618 12.3312 0.403216 29.5368 0.426383C46.7158 0.513133 69.6055 1.28915 92.43 3.86789C115.129 6.52265 136.887 11.9096 152.332 18.8871C156.063 20.7291 160.018 22.2178 163.085 24.0834C166.027 26.0249 168.807 27.8183 171.326 29.4759C172.586 30.3047 173.783 31.1053 174.907 31.8548C175.906 32.6803 176.753 33.513 177.573 34.2768C179.212 35.8045 180.617 37.1329 181.716 38.2108C182.815 39.2886 184.157 40.5888 185.634 42.1007C187.067 43.6303 188.151 45.5893 189.621 47.6079C191.002 49.662 192.509 51.9048 194.115 54.2677C195.766 56.6128 196.54 59.4901 197.896 62.2698C199.074 65.1203 200.421 68.0095 201.537 71.0967C202.284 74.3024 203.059 77.5769 203.852 80.8974C205.752 87.4145 205.994 94.5861 206.495 101.496C207.754 129.351 201.165 155.955 198.932 156.465C195.811 157.22 197.496 131.837 192.769 105.828C191.373 99.4039 190.414 92.6477 187.897 86.6661C186.845 83.6072 185.802 80.5712 184.786 77.6041C183.331 74.8368 181.903 72.1384 180.52 69.5546C179.048 67.0063 178.105 64.3551 176.347 62.2643C174.679 60.1381 173.145 58.0913 171.694 56.2509C170.197 54.4283 169.113 52.6017 167.699 51.2504C166.276 49.8762 164.988 48.7137 163.971 47.7099C162.953 46.7061 161.692 45.48 160.232 44.014C159.485 43.3013 158.755 42.5021 157.872 41.71C156.864 40.994 155.794 40.2498 154.696 39.4367C152.464 37.8513 150.061 36.0947 147.461 34.2305C144.815 32.3841 141.282 30.9144 138.018 29.0738C124.431 22.0789 105.04 16.1286 84.1235 12.4784C63.162 8.84582 41.6318 6.79042 25.7309 5.21776C9.8033 3.70869 -0.387809 2.56047 0.255249 1.69657Z" />
								</svg>
							</div><!-- /.top__shape -->
							<div class="team-card__svg-middle">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 217 98" fill="currentColor">
									<path d="M203.517 22.6552C120.489 128.266 3.54803 91.1587 2.29153 90.7596C0.667608 90.2287 -0.200435 88.4866 0.330195 86.8628C0.860825 85.2391 2.60286 84.3715 4.22678 84.9025C5.48328 85.3016 130.102 124.677 210.694 2.04102C211.597 0.592506 213.532 0.229286 214.961 1.15706C216.391 2.08483 216.774 3.99488 215.846 5.42433C211.856 11.5493 207.731 17.2946 203.517 22.6552Z" />
								</svg>
							</div><!-- /.middle__shape -->
							<div class="team-card__image kidearn-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 5, "speed": 700, "scale": 1 }'>
								<img src="../server/admin/pages/teachers/<?= $post['image'] ?>" alt="Jane cooper">
							</div><!-- /.team-card__image -->
							<div class="team-card__content">
								<h3 class="team-card__title">
									<a href="team-details?id=<?= $post['id'] ?>"><?= $post['name'] ?></a>
								</h3><!-- /.team-card__title -->
								<p class="team-card__designation"><?= $post['designation'] ?></p><!-- /.team-card__designation -->
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
								</div><!-- /.list-unstyled team-card__social__list -->
							</div><!-- /.team-card__content -->
						</div><!-- /.team-card -->
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
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


<!-- Mirrored from bracketweb.com/kidearn-html/team by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:45 GMT -->

</html>