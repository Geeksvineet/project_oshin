<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thankyou Page - Oshin Sports Academy</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html {
            width: 100%;
            height: 100%;
        }

        #loadingSpinner {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>

    <!-- Loading GIF -->
    <div id="loadingSpinner">

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>

    <script>
        // document.getElementById("loadingSpinner").style.display = "flex";

        var animation = lottie.loadAnimation({
            container: document.getElementById('loadingSpinner'), // Lottie animation container
            renderer: 'svg', // Renderer type (svg/canvas/html)
            loop: false, // Should the animation loop
            autoplay: true, // Autoplay the animation
            path: '../client/assets/images/backgrounds/Animation\ -\ 1727432445235.json' // Path to your Lottie JSON file
        });

        // Wait for 2 seconds before submitting the form
        setTimeout(function() {
            window.location.href = "../index";
        }, 3000);
    </script>
</body>

</html>