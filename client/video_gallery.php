<?php
include('../server/admin/database/config.php');

// Fetch categories for the filter buttons
$categorySql = "SELECT * FROM video_gallery_category";
$categoriesResult = mysqli_query($conn, $categorySql);

// Fetch all images (by default) or filtered by category
$imagesSql = "SELECT * FROM video_gallery";
$imagesResult = mysqli_query($conn, $imagesSql);
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/kidearn-html/gallery-filter by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:47 GMT -->

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Video Gallery</title>
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

	<style>
		.video-one__btn_vs {
			position: relative;
			z-index: 2;
			width: 100%;
		}

		.video-one__btn_vs img {
			width: 100%;
			height: 250px;
		}

		.video-one__btn_vs .video-popup {
			width: 83px;
			height: 83px;
			background-color: rgba(var(--kidearn-black-rgb, 11, 32, 56), 0.53);
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			position: absolute;
			left: 0;
			right: 0;
			bottom: 0;
			top: 0;
			margin: auto;
			text-align: center;
			font-size: 30px;
			letter-spacing: -6px;
			color: var(--kidearn-white, #fff);
			transform: scale(1);
			transition: 400ms ease;
		}

		.video-one__btn_vs .video-popup:hover {
			transform: scale(1.1);
		}

		@media (max-width: 767px) {
			.video-one__btn_vs .video-popup {
				width: 50px;
				height: 50px;
				font-size: 15px;
			}
		}
	</style>
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
				<h2 class="page-header__title">Video Gallery</h2>
				<ul class="kidearn-breadcrumb list-unstyled">
					<li><a href="../index">Home</a></li>
					<li><span>Video Gallery</span></li>
				</ul><!-- /.thm-breadcrumb list-unstyled -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->


		<section class="gallery-one gallery-one--page">
			<div class="container">
				<div class="text-center">
					<ul class="list-unstyled post-filter gallery-one__filter__list">
						<li class="active" data-filter=".filter-item"><span>All</span></li>


						<?php while ($category = mysqli_fetch_assoc($categoriesResult)): ?>
							<li data-filter=".<?= $category['id']; ?>"><span><?= $category['category']; ?></span></li>
						<?php endwhile; ?>

					</ul><!-- /.list-unstyledf -->
				</div><!-- /.text-center -->
				<div class="row masonry-layout filter-layout">


					<?php while ($image = mysqli_fetch_assoc($imagesResult)): ?>
						<div class="col-md-6 col-lg-4 filter-item <?= $image['category_id']; ?>">
							<!-- <div class="gallery-one__card">
								<img src="../server/admin/pages/gallery/<?= htmlspecialchars($image['image']); ?>" alt="Img">
								<div class="gallery-one__card__hover">
									<a href="../server/admin/pages/gallery/<?= htmlspecialchars($image['image']); ?>" class="img-popup">
										<span class="gallery-one__card__icon"></span>
									</a>
								</div>
							</div> -->

							<div class="">
								<div class="">
									<div class="video-one__btn_vs">
										<img
											src="../server/admin/pages/video_gallery/<?= htmlspecialchars($image['image']); ?>"
											alt="video" />
										<a
											href="<?= $image['video_url']; ?>"
											class="video-popup">
											<i class="fa fa-play"></i>
										</a>
									</div>
								</div>
							</div>

						</div>
					<?php endwhile; ?>

				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</section><!-- /.gallery-one -->

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


<!-- Mirrored from bracketweb.com/kidearn-html/gallery-filter by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:02:47 GMT -->

</html>