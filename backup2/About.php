<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Gas on the Go</title>
    <style>
        /* CSS styles remain the same */
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #528aaf;
            color: #fff;
            text-align: center;
            padding: 30px 0;
        }

        header h1 {
            margin: 0;
        }

        main {
            padding: 20px;
        }

        section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 30px;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        footer {
            background-color: #528aaf;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        section {
            animation: fadeIn 0.5s ease;
        }
        
    </style>
    <style>
        #button {
        display: inline-block;
        background-color: #FF9800;
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s, 
        opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
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
        #button:hover {
        cursor: pointer;
        background-color: #333;
        }
        #button:active {
        background-color: #555;
        }
        #button.show {
        opacity: 1;
        visibility: visible;
        }
        #about-banner{
            background: linear-gradient(rgba(0,0,0,0.50),rgba(0,0,0,0.50)),url(./assets/blog/banner.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
            padding: 100px 0;
            border-radius: 0;
        }
        #about-banner h2{
            color: white;
            font-size: 45px;
            text-transform: uppercase;
        }        
    </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<body>
    <!-- Back to top button -->
    <a id="button"></a>
    <section id="about-banner">
        <h2>About Page</h3>
    </section>
    <section class="section_all bg-light" id="about">
            <div class="container">
            
                </div>

                <div class="row vertical_content_manage mt-5">
                    <div class="col-lg-6">
                        <div class="about_header_main mt-3">
                            <div class="about_icon_box">
                            </div>
                            <h4 class="about_heading text-capitalize font-weight-bold mt-4">Professional Level Experience With Us</h4>
                            <p class="text-muted mt-3">We are passionate about delivering convenience, reliability, and safety to our customers when it comes to LPG gas cylinder delivery. With years of industry experience and a commitment to excellence, we have established ourselves as a trusted name in the online gas delivery market.</p>

                            <p class="text-muted mt-3"> Here is our commitment to our customer satisfaction:</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img_about mt-3">
                            <img src="https://i.ibb.co/qpz1hvM/About-us.jpg" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-4">
                        <div class="about_content_box_all mt-3">
                            <div class="about_detail text-center">
                                <div class="about_icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                                <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Safety First</h5>
                                <p class="edu_desc mt-3 mb-0 text-muted">Our top priority is ensuring the safe handling and delivery of LPG gas cylinders to your doorstep</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="about_content_box_all mt-3">
                            <div class="about_detail text-center">
                                <div class="about_icon">
                                    <i class="fab fa-angellist"></i>
                                </div>
                                <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Quality Assurance</h5>
                                <p class="edu_desc mb-0 mt-3 text-muted">Rigorous quality checks and adherence to industry standards guarantee that you receive the best service</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="about_content_box_all mt-3">
                            <div class="about_detail text-center">
                                <div class="about_icon">
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                                <h5 class="text-dark text-capitalize mt-3 font-weight-bold">24/7 Support </h5>
                                <p class="edu_desc mb-0 mt-3 text-muted">Our dedicated customer support team is available round the clock to address any queries or concerns</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Gas on the Go. All rights reserved.</p>
    </footer>
    <script>
        var btn = $('#button');
        $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
        });a

        btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
        });

    </script>
</body>
</html>
