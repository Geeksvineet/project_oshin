<?php
// include('server/admin/database/config.php');

// if (isset($_POST['add'])) {
//   $name = $_POST['name'];
//   $email = $_POST['email'];
//   $message = $_POST['message'];
//   $dateCreated = date('Y-m-d H:i:s');

//   $insertSql = "INSERT INTO inquiry (name, email, message, date_created) 
//                           VALUES ('$name', '$email', '$message', '$dateCreated')";
//   mysqli_query($conn, $insertSql);

//   header('Location: index');
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Enquiry Form</title>
  <link
    rel="stylesheet"
    href="assets/css/kidearn.css" />
  <link
    rel="icon"
    sizes="180x180"
    href="assets/images/favicons/apple-touch-icon.png" />

  <link
    rel="stylesheet"
    href="assets/vendors/bootstrap/css/bootstrap.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/bootstrap-select/bootstrap-select.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/animate/animate.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/fontawesome/css/all.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/jquery-ui/jquery-ui.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/jarallax/jarallax.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/nouislider/nouislider.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/nouislider/nouislider.pips.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/tiny-slider/tiny-slider.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/kidearn-icons/style.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/owl-carousel/css/owl.carousel.min.css" />
  <link
    rel="stylesheet"
    href="assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-image: url("assets/images/backgrounds/image\ 67.png");
      background-size: cover;
      background-position: top;
      background-repeat: no-repeat;
      height: 100% !important;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow-y: hidden;
    }

    /* section {
      background-image: url("assets/images/backgrounds/image\ 67.png");
      background-size: cover;
      background-position: top;
      background-repeat: no-repeat;
      height: 100% !important;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow-y: hidden;
    } */

    .trophy {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100%;
      background-image: url("assets/images/backgrounds/trophy.png");
      background-size: 450px;
      background-repeat: no-repeat;
      background-position: right bottom;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      width: 90%;
      max-width: 950px;
      padding: 30px;
      border-radius: 20px;
      font-family: "Poppins", sans-serif;
    }

    .form-box {
      flex: 1;
      padding: 40px;
      backdrop-filter: blur(15px);
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      border: 2px solid #fff;
      margin-right: 30px;
    }

    h2 {
      margin-bottom: 30px;
      text-align: center;
      font-size: 2rem;
      color: #fff;
      font-weight: 600;
      font-family: "Poppins", sans-serif;
    }

    .input-box {
      position: relative;
      margin-bottom: 25px;
    }

    .input-box input,
    .input-box textarea {
      width: 100%;
      padding: 15px;
      font-size: 1rem;
      border: 2px solid #ffffffa4;
      border-radius: 10px;
      background-color: transparent;
      color: #fff;
      outline: none;
      transition: all 0.3s ease;
    }

    .input-box input::placeholder,
    .input-box textarea::placeholder {
      color: transparent;
    }

    .input-box .name,
    .input-box .mobile {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #fff;
      font-size: 1rem;
      pointer-events: none;
      transition: all 0.3s ease;
    }

    .input-box .message {
      position: absolute;
      top: 15%;
      left: 15px;
      transform: translateY(-50%);
      color: #fff;
      font-size: 1rem;
      pointer-events: none;
      transition: all 0.3s ease;
    }

    /* Float the label when input is focused or contains text */
    .input-box input:focus+label,
    .input-box textarea:focus+label,
    .input-box input:not(:placeholder-shown)+label,
    .input-box textarea:not(:placeholder-shown)+label {
      top: 10px;
      left: 15px;
      font-size: 0.85rem;
      color: #ffcc99;
    }

    .side-text {
      display: flex;
      justify-content: center;
      align-items: center;
      flex: 1;
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

    .submit-btn {
      display: block;
    }

    .submit-btn:hover {
      background-color: #0B2038;
      transition-delay: 0.4s;
    }

    @media screen and (max-width: 768px) {
      .container {
        flex-direction: column;
        width: 95%;
      }

      .form-box {
        margin-right: 0;
        margin-bottom: 20px;
      }

      .side-text h3 {
        font-size: 1.8rem;
        text-align: center;
      }

    }
  </style>
</head>

<body class="custom-cursor">


  <div class="trophy">
    <div class="container">
      <div class="form-box">
        <h2>Enquiry Form</h2>
        <form id="inquiryForm" action="submit_inquiry" method="POST" onsubmit="submitForm(event)">
          <div class="input-box">
            <input type="text" name="name" placeholder=" " required />
            <label for="name" class="name">Name</label>
          </div>
          <div class="input-box">
            <input type="tel" name="email" placeholder=" " pattern="\d{10}" maxlength="10" minlength="10" required />
            <label for="mobile" class="mobile">Mobile</label>
          </div>
          <div class="input-box">
            <textarea name="message" rows="3" placeholder=" " required></textarea>
            <label for="message" class="message">Message</label>
          </div>
          <!-- <button value="Submit" type="submit" name="add" class="kidearn-btn main-header__btn"><span >Submit</span></button> -->
          <button style="width: 100%;" type="submit" class="submit-btn kidearn-btn main-header__btn"><span style="width: 100%; text-align: center;">Submit</span></button>
        </form>
        <div style="width: 100%; display: flex; justify-content: center; padding-top: 20px;">
          <a href="../index" style="text-decoration: none;">Back to Home Page</a>
        </div>
      </div>
      <div class="side-text">
        <h3>
          Any Query <br />
          Champ?
        </h3>
      </div>
    </div>
  </div>





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

  <script src="assets/js/kidearn.js"></script>

  <!-- Lottie CDN Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>


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

    function submitForm(event) {
      event.preventDefault(); // Prevent default form submission

      // Hide the popup
      // document.getElementById('popupBackground').style.display = 'none';

      // Set a cookie to prevent popup from appearing again
      setCookie("formSubmitted", "true", 7); // Cookie expires in 7 days

      // Submit the form via AJAX or regular POST (depending on your backend setup)
      // You can replace this with an actual AJAX call if needed.
      event.target.submit();
    }
  </script>


  <!-- <script>
    function submitForm() {

      // Show the loading spinner
      document.getElementById("loadingSpinner").style.display = "flex";

      var animation = lottie.loadAnimation({
        container: document.getElementById('loadingSpinner'), // Lottie animation container
        renderer: 'svg', // Renderer type (svg/canvas/html)
        loop: false, // Should the animation loop
        autoplay: true, // Autoplay the animation
        path: 'assets/images/backgrounds/Animation\ -\ 1727432445235.json' // Path to your Lottie JSON file
      });

      // Wait for 2 seconds before submitting the form
      setTimeout(function() {
        document.getElementById("inquiryForm").submit();
      }, 4000); // 2000 ms = 2 seconds
    }
  </script> -->
</body>

</html>