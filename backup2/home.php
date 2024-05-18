<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gas Cylinder Delivery | Home</title>
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="mainpage.css" />
        <link rel="stylesheet" href="css/button.css" />
    <style>
        .navbar a{
            color:white !important;
            opacity: 100%;
        }
        .product-card {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            height: 320px;
        }
        .product-image {
            width: 100%;
            height: 100%;
            filter: blur(5px);
            transition: filter 0.3s ease;
        }
        .product-card:hover .product-image {
            filter: blur(0);
        }
        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
            color: white;
            transition: background 0.3s ease;
        }
        .product-card:hover .product-overlay {
            background: rgba(0, 0, 0, 0.7); /* Adjust the hover opacity as needed */
        }
        .product-overlay h2 {
            margin-bottom: 10px;
        }
        .go-to-btn {
            padding: 10px 20px;
            background-color: #eee;
            color: black !important;
            text-decoration: none;
        }
        html,
        body {
            position: relative;
            height: 100%;
        }
        #topBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #fff;
            color: black;
            cursor: pointer;
            padding: 15px;
            border-radius: 50px;
        }
        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
        }

        /* On hover, add a darker background color */
        #topBtn:hover {
            background-color: darkblue;
            color: #fff;
        }
        .footer-bar li {
            list-style: none;
        }
        .footer-bar {
            height: 100px;
        }
        .footer-bar li a {
            color: whitesmoke;
            display: inline-block;
            text-decoration: none;
            transition: 0.45s ease;
        }
        .footer-bar li a:hover {
            text-decoration: underline dotted;
            color: #eee;
            font-size: 20px;
        }
        #chat {
            position: fixed;
            right: 24px;
            bottom: 100px;
            width: 70px;
            transition: 0.45s ease;
            z-index: 9999;
        }
        #chat:hover {
            position: fixed;
            right: 24px;
            bottom: 100px;
            width: 80px;
            transition: 0.45s ease;
            z-index: 9999;
        }
        #chat img {
            width: 100%;
            height: 100%;
        }

        .swiper {
            width: 100%;
            height: 600px;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* Additional custom styles */
        .navbar-brand img {
            max-height: 40px;
            margin-right: 10px;
        }
        nav a {
            color: white !important;
            opacity: 60%;
        }

        @media (max-width: 768px) {
            .navbar-collapse {
                justify-content: center;
            }
        }
        .divider {
            width: 320px;
            height: 2px;
            background-color: white;
            margin: 50px auto;
        }
    </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"
            integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <style>

        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-custom fixed-top" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo_n.png" alt="Gas on the go" class="img-fluid" />
                        Gas on the go
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login/Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="About.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Products.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- 
        ====================
         -->

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                    for ($i = 1; $i <= 10; $i++) { 
                    ?>
                    <div class="swiper-slide">
                        <img src="assets/slider/<?php echo $i; ?>.jpg" alt="">
                    </div>
                    <?php
                    }
                ?>
                
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- 
            ===============================
          -->

        <section class="services" style="overflow: hidden;">
            <div class="container mt-5">
                <h3 class="mb-5 text-white" data-aos="fade-up">Our Products</h3>
                <div class="divider" data-aos="fade-up"></div>
                <div class="row">
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/1.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Residence</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/2.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Commercial</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/3.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Residence</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/4.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Commercial</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/5.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Residence</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/6.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Commercial</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/7.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Residence</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-4 my-5" data-aos="zoom-in">
                        <div class="product-card">
                            <img src="assets/h-products/8.png" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2>For Commercial</h2>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
            <div class="p-3 text-center mt-5" data-aos="fade-up">
                <a href="Products.php" class="button-17">Go To Product Page</a>
            </div>
        </section>
        <!-- Back to top button -->

        <button onclick="topFunction()" id="topBtn" title="Go to top">Top <i></i></button>
        <a href="https://web.whatsapp.com/" id="chat">
            <img src="assets/icons/whatsapp.png" alt="" />
        </a>

        <footer style="overflow: hidden;">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="assets/images/logo_n.png" data-aos="fade-up" alt="Gas on the go" />
                    <h1 data-aos="fade-up">Gas on the go</h1>
                    <h7 data-aos="fade-up">
                        Got questions or need assistance? Our dedicated customer support team is here to help. <br />
                        <br />
                    </h7>
                    <a href="#" class="button-17" data-aos="fade-up">Quick links</a>
                    <br />
                    <br />
                    <ul class="footer-bar" data-aos="fade-up">
                        <li>
                            <a href="">Products</a>
                        </li>
                        <li>
                            <a href="blog.php">Blogs</a>
                        </li>
                        <li>
                            <a href="">Login</a>
                        </li>
                        <li>
                            <a href="">About</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-info">
                    <img src="assets/images/contac.png" data-aos="fade-up" alt="Gas on the go" /><br />
                    <a href="contact.php" class="button-17" data-aos="fade-up">Contact Us</a>
                    <br />
                    <br />
                    <p data-aos="fade-up">Phone: +923020720919</p>
                    <p>Email: haseebakhter234@gmail.com</p>
                    <p>Social Platform</p>
                    <div class="social-icons">
                        <a href="https://www.instagram.com"><img src="assets/icons/instagram.png" alt="Instagram" /></a>
                        <a href="https://www.facebook.com"><img src="assets/icons/facebook.png" alt="Facebook" /></a>
                        <a href="https://www.twitter.com"><img src="assets/icons/x.png" alt="Twitter" /></a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Get the button
        var mybutton = document.getElementById("topBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                pagination: {
                    el: ".swiper-pagination",
                    dynamicBullets: true,
                },
                autoplay: {
                    delay: 2000, 
                },
            });
        </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
