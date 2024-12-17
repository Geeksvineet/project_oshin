<?php
include('../server/admin/database/config.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM blog WHERE id=$id";
	$result = mysqli_query($conn, $query);
	$post = mysqli_fetch_assoc($result);
	$author_id = $post['category'];
	$author_query = "SELECT * FROM blog_category WHERE id=$author_id";
	$author_result = mysqli_query($conn, $author_query);
	$author = mysqli_fetch_assoc($author_result);
} else {
	header(("location: blog-grid"));
	die();
}

if (isset($_POST['add'])) {

	$name = $_POST['name'];
    $email = $_POST['email'];
	$message = $_POST['message']; // Sanitize email input
    $dateCreated = date('Y-m-d H:i:s'); // Current date and time

    // Ensure email field is not empty
    if (!empty($email)) {
        // Insert into database
        $insertSql = "INSERT INTO comments_of_blog (name, email, message, blog_id, date_created) 
                      VALUES ('$name', '$email','$message','$id', '$dateCreated')";

        if (mysqli_query($conn, $insertSql)) {
            header('Location: blog-grid');
            exit();
        } else {
            // Display error if query fails
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Email field cannot be empty.";
    }
}


$result2 = "SELECT * FROM comments_of_blog WHERE blog_id = $id";
$result3 = mysqli_query($conn, $result2);
$row_cnt = mysqli_num_rows($result3);

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/kidearn-html/blog-details by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:03:04 GMT -->

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Blog Details</title>
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
				<h2 class="page-header__title">Our Blogs</h2>
				<ul class="kidearn-breadcrumb list-unstyled">
					<li><a href="../index">Home</a></li>
					<li><span>Blogs details</span></li>
				</ul><!-- /.thm-breadcrumb list-unstyled -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->

		<section class="blog-one blog-one--page">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="blog-details">
							<div class="blog-card blog-card-two @@extraClassName">
								<div class="blog-card__image">
									<img src="../server/admin/pages/blog/<?= $post['image'] ?>" alt="The Complete Web Developer Guideline 2023">
								</div><!-- /.blog-card__image -->
								<div class="blog-card__content">
									<div class="blog-card__content__top">
										<a href="#" class="blog-card__category"><?= $author['category'] ?></a>
										<div class="blog-card__date">
											<i class="icon-clock"></i>
											<?= date("M d, Y", strtotime($post['date_updated'])) ?>
										</div><!-- /.blog-card__date -->
									</div><!-- /.blog-card__content__top -->
									<h3 class="blog-card__title"><?= $post['title'] ?></h3><!-- /.blog-card__title -->
									<p class="blog-card-two__text"><?= $post['description'] ?></p><!-- /.blog-card-two__text -->
								</div><!-- /.blog-card__content -->
							</div><!-- /.blog-card -->
							<div class="blog-details__meta">
								<div class="blog-details__tags">
									<h4 class="blog-details__tags__title">Tags</h4><!-- /.blog-details__tags__title -->
									<div class="sidebar__tags">
										<a href="#"><?= $author['category'] ?></a>
									</div><!-- /.sidebar__projects -->
								</div><!-- /.blog-details__tags -->
							</div><!-- /.blog-details__meta -->
						</div><!-- /.blog-details -->

						<div class="comments-one">
							<h3 class="comments-one__title"><?= $row_cnt ?> Comments</h3><!-- /.comments-one__title -->
							<ul class="list-unstyled comments-one__list">


								<?php if ($row_cnt > 0): ?>

									<?php while ($com = mysqli_fetch_assoc($result3)): ?>

										<li class="comments-one__card">
											<div class="comments-one__card__content">
												<h3 class="comments-one__card__title"><?= $com['name'] ?></h3><!-- /.comments-one__card__title -->
												<p class="comments-one__card__text"><?= $com['message'] ?></p>
											</div><!-- /.comments-one__card__content -->
										</li><!-- /.comments-one__card -->

									<?php endwhile; ?>

								<?php else: ?>

									<li class="comments-one__card">
										<div class="comments-one__card__content">
											No comments yet.
										</div>
									</li>

								<?php endif; ?>

							</ul><!-- /.list-unstyled comments-one__list -->
						</div><!-- /.comments-one -->

						<div class="comments-form">
							<h3 class="comments-form__title">Leave a comment</h3><!-- /.comments-form__title -->
							<form class="comments-form__form form-one" action="" method="POST">
								<div class="form-one__group">
									<div class="form-one__control">
										<input type="text" name="name" placeholder="Your name">
									</div><!-- /.form-one__control -->
									<div class="form-one__control">
										<input type="email" name="email" placeholder="Email address">
									</div><!-- /.form-one__control -->
									<div class="form-one__control form-one__control--full">
										<textarea name="message" placeholder="Write  a message"></textarea><!-- /# -->
									</div><!-- /.form-one__control -->
									<div class="form-one__control form-one__control--full">
										<button type="submit" name="add" class="kidearn-btn kidearn-btn--xl"><span>Submit comment</span></button>
									</div><!-- /.form-one__control -->
								</div><!-- /.form-one__group -->
							</form>
							<div class="result"></div>
						</div><!-- /.comments-form -->
					</div><!-- /.col-lg-8 -->
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


<!-- Mirrored from bracketweb.com/kidearn-html/blog-details by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:03:04 GMT -->

</html>