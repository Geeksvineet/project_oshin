<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/kidearn-html/contact by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:03:05 GMT -->

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Contact</title>
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
				<h2 class="page-header__title">Contact</h2>
				<ul class="kidearn-breadcrumb list-unstyled">
					<li><a href="../index">Home</a></li>
					<li><span>Contact</span></li>
				</ul><!-- /.thm-breadcrumb list-unstyled -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->

		<section id="contact_form" class="contact-one">
			<div class="container">
				<div class="sec-title text-center">

					<h6 class="sec-title__tagline">Contact with us</h6><!-- /.sec-title__tagline -->

					<h3 class="sec-title__title">Feel free to write us <br> anytime</h3><!-- /.sec-title__title -->
				</div><!-- /.sec-title -->
				<div id="success_contact_form" style="text-align: center; color: blue; display: none;">
					<p>Contact Form Submitted Successfully!</p>
				</div>
				<form class="contact-one__form form-one" action="contact_form_logic" method="POST" onsubmit="submitForm(event)">
					<div class="form-one__group">
						<div class="form-one__control ">
							<input type="text" name="name" placeholder="Your name" required>
						</div><!-- /.form-one__control  -->
						<div class="form-one__control ">
							<input type="email" name="email" placeholder="Email address" required>
						</div><!-- /.form-one__control  -->
						<div class="form-one__control ">
							<input type="tel" name="phone" placeholder="Your phone" pattern="\d{10}" maxlength="10" minlength="10" required>
						</div><!-- /.form-one__control  -->
						<div class="form-one__control ">
							<div class="form-one__control__select">
								<label class="sr-only" for="language-select">Select program</label>
								<!-- /#language-select.sr-only -->
								<select name="program" class="selectpicker" id="language-select" required>
									<option value="Early Birds program">Early Birds program</option>
									<option value="Grown - up program">Grown - up program</option>
									<option value="Advance learning program">Advance learning program</option>
								</select>
							</div><!-- /.main-menu__language -->

						</div><!-- /.form-one__control  -->
						<div class="form-one__control form-one__control--full">
							<textarea name="message" placeholder="Write  a message" required></textarea><!-- /# -->
						</div><!-- /.form-one__control -->
						<div class="form-one__control form-one__control--full text-center">
							<button type="submit" class="kidearn-btn kidearn-btn--xl"><span>Send a Message</span></button>
						</div><!-- /.form-one__control -->
					</div><!-- /.form-one__group -->
				</form>
			</div><!-- /.container -->
		</section><!-- /.contact-one -->

		<section class="contact-info-one">
			<div class="container">
				<div class="contact-info-one__inner">
					<div class="row">
						<div class="col-md-12 col-lg-4">
							<div class="contact-info-one__item">
								<i class="icon-telephone contact-info-one__icon"></i>
								<p class="contact-info-one__text">Have any question?</p>
								<h3 class="contact-info-one__title">
									<a href="tel:916284510187">+91 6284510187</a>
								</h3><!-- /.contact-info-one__title -->
							</div><!-- /.contact-info-one__item -->
						</div><!-- /.col-md-12 -->
						<div class="col-md-12 col-lg-4">
							<div class="contact-info-one__item" style="--accent-color: #2390FF;">
								<i class="icon-email contact-info-one__icon"></i>
								<p class="contact-info-one__text">Send Email</p>
								<h3 class="contact-info-one__title">
									<a href="mailto:ankit19477@gmail.com">ankit19477@gmail.com</a>
								</h3><!-- /.contact-info-one__title -->
							</div><!-- /.contact-info-one__item -->
						</div><!-- /.col-md-12 -->
						<div class="col-md-12 col-lg-4">
							<div class="contact-info-one__item" style="--accent-color: #75C137;">
								<i class="icon-location-fill contact-info-one__icon"></i>
								<p class="contact-info-one__text">Visit Anytime</p>
								<h3 class="contact-info-one__title">
									<a href="#">4th floor Starlit tower,Y.N road Indore</a>
								</h3><!-- /.contact-info-one__title -->
							</div><!-- /.contact-info-one__item -->
						</div><!-- /.col-md-12 -->
					</div><!-- /.row -->
				</div><!-- /.contact-info-one__inner -->
			</div><!-- /.container -->
		</section><!-- /.contact-info-one -->

		<section class="contact-map">
			<div class="container-fluid">
				<div class="google-map google-map__contact">
					<iframe title="template google map"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5817.289473893556!2d75.87094572422228!3d22.72339378288555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fd5231e4b48f%3A0x7c192c5a37d589d9!2sOshin%20Sports%20Academy!5e1!3m2!1sen!2sin!4v1728368598221!5m2!1sen!2sin"
						class="map__contact" allowfullscreen></iframe>

				</div>
				<!-- /.google-map -->
			</div><!-- /.container-fluid -->
		</section><!-- /.contact-map -->
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

        // Submit form logic
        function submitForm(event) {
            event.preventDefault(); // Prevent default form submission

            // Hide the popup
            // document.getElementById('popupBackground').style.display = 'none';

            // Set a cookie to prevent popup from appearing again
            setCookie("contactFormSubmitted", "true", 1); // Cookie expires in 7 days

            // Submit the form via AJAX or regular POST (depending on your backend setup)
            // You can replace this with an actual AJAX call if needed.
            event.target.submit();
        }

        // Check if the form has already been submitted by checking the cookie
        window.onload = function() {
            var formSubmitted = getCookie("contactFormSubmitted");
            if (formSubmitted) {
                // Hide the popup if the form was already submitted
                // document.getElementById('popupBackground').style.display = 'none';
                document.getElementById('success_contact_form').style.display = 'block';
            } else {
                // Show the popup if the form has not been submitted yet
                // document.getElementById('popupBackground').style.display = 'flex';
                document.getElementById('success_contact_form').style.display = 'none';
            }
        };
    </script>


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


<!-- Mirrored from bracketweb.com/kidearn-html/contact by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 08:03:05 GMT -->

</html>