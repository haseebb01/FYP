<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Blog Page</title>
        <link rel="stylesheet" href="css/button.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"
            integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <style>
            .blog-banner {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./assets/blog/banner.png);
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                text-align: center;
                padding: 100px 0;
            }
            .blog-banner h2 {
                color: white;
                font-size: 45px;
                text-transform: uppercase;
            }
            .main-title {
                font-size: 30px;
                font-weight: bold;
            }
            p {
                font-size: 17px;
                text-align: justify;
            }
            .search-box input {
                border-radius: 0px;
                border: 0px;
                outline: 1px solid lightslategray;
                padding: 12px 40px;
                /* margin: 47px; */
                text-align: center;
            }
            .faq-item {
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 0px;
                overflow: hidden;
            }
            .faq-question {
                padding: 15px;
                background-color: #f8f9fa;
                cursor: pointer;
                font-weight: bold;
            }
            .faq-answer {
                padding: 15px;
                display: none;
            }
            .footer {
                background-color: #343a40;
                color: #fff;
                padding: 20px 0;
                text-align: center;
                width: 100%;
            }
            .footer p {
                margin: 0;
            }
        </style>
    </head>
    <body>
        <section id="banner">
            <div class="blog-banner">
                <h2>Blog Page</h2>
            </div>
        </section>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <p class="my-5 mx-3">
                            In a world where convenience meets reliability, cylinder services have become a cornerstone for both residential and commercial spaces. Whether it's for cooking, heating, or powering machinery, cylinders are
                            indispensable. Today, we delve into the realm of seamless cylinder services tailored to meet your needs, with options for both residential and commercial spaces.
                        </p>
                        <div style="height: 400px;" class="my-5 mx-3">
                            <img src="assets/images/backcom.webp" alt="" style="height: 100%; width: 100%;" />
                        </div>
                        <h3 class="mx-3">
                            Understanding Your Cylinder Needs
                        </h3>
                        <p class="mx-3">
                            In the realm of cylinder services, one size does not fit all. Residential and commercial spaces have unique requirements, from the frequency of refills to the volume of gas needed. Understanding your specific
                            needs ensures a tailored service that optimizes efficiency and convenience.
                        </p>
                        <h3 class="mx-3">
                            Hassle-Free Delivery at Your Doorstep
                        </h3>
                        <p class="mx-3">
                            Gone are the days of lugging heavy cylinders from the store to your home or business. With our services, enjoy hassle-free delivery right at your doorstep. Our trained professionals handle the transportation,
                            ensuring safety and convenience every step of the way.
                        </p>

                        <h3 class="mx-3">
                            Quality Assurance Every Step of the Way
                        </h3>
                        <p class="mx-3">
                            Quality is non-negotiable when it comes to cylinders. From storage to transportation, we uphold the highest standards to ensure the integrity of your gas supply. Our cylinders undergo rigorous quality checks,
                            giving you peace of mind knowing that you're using a reliable product.
                        </p>
                        <h3 class="mx-3">
                            Flexible Payment Options
                        </h3>
                        <p class="mx-3">
                            Convenience extends beyond just the delivery process. We offer flexible payment options to suit your preferences. Whether you prefer the traditional method of cash-on-delivery or the convenience of card payments,
                            we've got you covered.
                        </p>
                        <h3 class="mx-3">
                            Round-the-Clock Support
                        </h3>
                        <p class="mx-3">
                            Emergencies don't wait for convenient hours, and neither do we. Our round-the-clock support ensures that help is always just a call away. Whether you need assistance with an order or have an urgent refill
                            requirement, our team is here to assist you anytime, anywhere.
                        </p>
                        <div class="container">
                            <h2 class="mb-3">Frequently Asked Questions</h2>

                            <div class="faq-item">
                                <div class="faq-question">Question 1: What types of cylinders do you offer for residential and commercial use?</div>
                                <div class="faq-answer">Answer 1: We offer a wide range of cylinders tailored to meet the diverse needs of both residential and commercial customers.</div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">Question 2: How do I place an order for cylinder delivery?</div>
                                <div class="faq-answer">Answer 2: Placing an order with us is simple and convenient. You can either call our customer service hotline or use our online platform to place your order.</div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">Question 3: What safety measures do you have in place during cylinder delivery?</div>
                                <div class="faq-answer">Answer 3: Safety is our top priority during cylinder delivery. Our trained professionals adhere to strict safety protocols at every step of the process.</div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">Question 4: Can I schedule recurring cylinder deliveries?</div>
                                <div class="faq-answer">
                                    Answer 4: Yes, you can! We understand that regular cylinder refills are essential for uninterrupted operations. You can easily set up a recurring delivery schedule based on your consumption patterns.
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">Question 5: What payment options do you accept for cylinder deliveries?</div>
                                <div class="faq-answer">Answer 5: We offer flexible payment options to suit your preferences. You can choose to pay by cash at the time of delivery or opt for card payments.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search-box m-3 m-lg-5 m-md-5 m-sm-0 m-xs-3">
                            <input type="search" placeholder="Search Blog" />
                        </div>
                        <div class="tags" style="margin: 47px;">
                            <p>Related Tags</p>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Gas</a>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Cylinder</a>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Residence</a>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Commercial</a>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Products</a>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Deliver</a>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Service</a>
                            <a href="#" style="text-decoration: none; color: black; padding: 10px 15px; outline: 1px solid lightgray;" class="mx-1 my-1 d-inline-block">Contact</a>
                        </div>
                        <!--  -->
                        <div class="card m-3 m-lg-5 m-md-5 m-sm-0 m-xs-3" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">For Commercial</li>
                                <li class="list-group-item">For Residence</li>
                                <li class="list-group-item">Other</li>
                            </ul>
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>
        </section>
        <div class="my-5"></div>
        <div class="my-5"></div>
        <footer class="footer">
            <p style="text-align: center;">&copy; 2024 Gas Cylinder Company. All rights reserved.</p>
        </footer>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const faqQuestions = document.querySelectorAll(".faq-question");

                faqQuestions.forEach(function (question) {
                    question.addEventListener("click", function () {
                        const answer = this.nextElementSibling;
                        answer.style.display = answer.style.display === "block" ? "none" : "block";
                    });
                });
            });
        </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
