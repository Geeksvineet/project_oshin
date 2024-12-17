<?php
include('../server/admin/database/config.php');

// Fetch all images (by default) or filtered by category
$imagesSql = "SELECT * FROM gallery LIMIT 6";
$imagesResult = mysqli_query($conn, $imagesSql);
?>

<head>
    <style>
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
    </style>
</head>

<footer class="main-footer">
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
                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--links">
                        <h2 class="footer-widget__title">Links</h2>
                        <ul class="list-unstyled footer-widget__links">
                            <li><a href="../index">Home</a></li>
                            <li><a href="about">About</a></li>
                            <li><a href="programs-grid">Programs</a></li>
                            <li><a href="team">Our teacher</a></li>
                            <li><a href="gallery-filter">Gallery Filter</a></li>
                            <li><a href="blog-grid">Blogs</a></li>
                            <li><a href="contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--links-two">
                        <h2 class="footer-widget__title">Oshin World</h2>
                        <ul class="list-unstyled footer-widget__links">
                            <li><a href="about">Oshin Sports Academy</a></li>
                            <li><a href="school-about">Oshin School</a></li>
                            <li><a href="event-about">Oshin Events</a></li>
                        </ul>
                    </div>
                </div>


                <!-- <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--gallery">
                        <h2 class="footer-widget__title">Gallery</h2>
                        <ul class="list-unstyled footer-widget__gallery">
                            <?php while ($image = mysqli_fetch_assoc($imagesResult)): ?>
                                <li style="width: 80px;">
                                    <a class="img-popup" href="../server/admin/pages/gallery/<?= htmlspecialchars($image['image']); ?>">
                                        <img src="../server/admin/pages/gallery/<?= htmlspecialchars($image['image']); ?>" alt="footer gallery">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>

                    </div>
                </div> -->


                <div class="col-md-6 col-xl-4">
                    <div class="footer-widget footer-widget--gallery">
                        <h2 class="footer-widget__title">Enquiry Now</h2>
                        <form action="submit_inquiry" method="POST" onsubmit="submitFooterForm(event)">
                            <div class="input-box">
                                <input type="text" name="name" placeholder="Name" required />
                            </div>
                            <div class="input-box">
                                <input type="tel" name="email" placeholder="Mobile" pattern="\d{10}" maxlength="10" minlength="10" required />
                            </div>
                            <div class="input-box">
                                <textarea name="message" rows="2" placeholder="Message" required></textarea>
                            </div>
                            <button style="width: 100%;" type="submit" class="submit-btn kidearn-btn main-header__btn"><span style="width: 100%; text-align: center;">Submit</span></button>
                            <div class="input-box" style="margin-top: 12px; width: 90%; text-align: center;"><span id="you_are_submitted" style="color: white;">You have submitted.</span></div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="main-footer__bottom">
        <div class="container">
            <div class="main-footer__bottom__inner">
                <p class="main-footer__copyright">
                    &copy; Copyright <span class="dynamic-year"></span> by Oshin Sport Academy.
                </p>
            </div>
        </div>
    </div>
</footer>

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
    function submitFooterForm(event) {
        event.preventDefault();

        // Set a cookie to prevent popup from appearing again
        setCookie("formSubmitted", "true", 7); // Cookie expires in 7 days

        event.target.submit();
    }

    window.onload = function() {
        var formSubmitted = getCookie("formSubmitted");
        if (formSubmitted) {
            document.getElementById('you_are_submitted').style.display = 'block';
        } else {
            document.getElementById('you_are_submitted').style.display = 'none';
        }
    };
</script>