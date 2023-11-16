<?php
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="src/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script src="src/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />


    <!-- Text Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700&family=Poppins:wght@100;400;500;700&family=Roboto+Flex:opsz,wght@8..144,300;8..144,400;8..144,500;8..144,700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://languages.abranhe.com/logos.css" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
    <title>Projet</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="py-3" id="prom">
        <span class="ps-4">More than 98% of our users enjoyed our tutorials and we hope you do too, Happy learning !</span> <i id="x" class="fa-solid pt-1 fa-x float-end opacity-75 pe-4"></i>
    </div>
    <div class="container">
        <div class="row mainRow">
            <div class="col-lg-6 text-center py-5 py-lg-0 text-lg-start px-0">
                <p class="fw-bold lilTxt desc">Get ready to</p>
                <p>Learn something new. Everyday.</p>
                <p class="desc">Web.dev helps you get started in web developpement and reach your potential by learning the basic fundementals in a simple way.</p>
                <a href="courses.php" class=""><button id="start" class="bbtn normalButtons mt-2">Get started now</button></a>
                <!-- i used svg code to edit the color  -->
                <a href="#aboutus" class=""><button id="learn" class="bbtn mt-2 mx-2">Read More <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right dark:text-primary-lightP1 text-primary h-6">
                            <g color="#5553ff">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </g>
                        </svg></button></a>
            </div>
            <div class="col-lg-6 text-center py-5 py-lg-0 text-lg-end px-0">
                <img class="img-fluid" height="288px" width="528px" src="assets/asset 22.svg" alt="">
            </div>
        </div>
        <div class="mt-3 row pb-0 pt-5 p-md-5 justify-content-center">
            <img src="assets/asset 0.svg" class="img-fluid" style="width: 1024px; height: 302px;" alt="">
        </div>
    </div>
    <section id="aboutus" class="aboutus bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid pe-3 py-1" src="assets/about.svg" alt="">
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <div class="py-3 ms-lg-5">
                        <p class="bold titleab mb-2"><i class="fa-solid fa-caret-right me-3"></i>Web.dev</p>
                        <h4 class="bold quote mb-4">Stop scrolling. start learning.</h4>
                        <p class="pg">Web.dev is an online learning platform specialized in web developement. We offer plenty of courses and quizzes that focus on teaching basic fundementals and help beginner developers reach their maximum potential.</p>
                        <div class="row mt-5">
                            <div class="col-4"><img src="assets/course.png" alt="">
                                <div class="d-flex mt-2">
                                    <h1 class="counter mt-3">25</h1><b class="smalltext">+</b>
                                    <span class="smallestText">Courses available</span>
                                </div>
                            </div>
                            <div class="col-4"><img height="50px" width="50px" src="assets/dev.png" alt="">
                                <div class="d-flex mt-2">
                                    <h1 class="counter mt-3">50</h1><b class="smalltext">+</b>
                                    <span class="smallestText">Happy developers</span>
                                </div>
                            </div>
                            <div class="col-4"><img class="" src="assets/quizz.png" alt="">
                                <div class="d-flex mt-2">
                                    <h1 class="counter mt-3">10</h1><b>+</b>
                                    <span class="smallestText">Awesome quizzes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-area">
        <div class="container">
            <div class="container services-list">
                <div class="row">
                    <p class="sectionHeader text-center ">What we teach</p>
                    <p class="card-title text-center">Our platform focuses on the two main sides of web development</p>
                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex text-center justify-content-end">
                        <div class="services">
                            <div class="sevices-img pt-3 pb-2">
                                <img src="assets/frontend.png" alt="Services-1" />
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fw-bold mb-3">
                                    Front end
                                </h3>
                                <p class="card-text text-secondary pg">
                                    Discover how the web design works and understand its architecture, nuances and subtleties.
                                </p>
                                <a href="courses.php" class=""><button id="learn" class="bbtn mt-2 mx-2">Get started <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right dark:text-primary-lightP1 text-primary h-6">
                                            <g color="#5553ff">
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                                <polyline points="12 5 19 12 12 19" />
                                            </g>
                                        </svg></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center d-flex justify-content-start">
                        <div class="services">
                            <div class="sevices-img pt-3 pb-2">
                                <img src="assets/backend.png" alt="Services-2" />
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fw-bold mb-3">
                                    Back end
                                </h3>
                                <p class="card-text text-secondary pg">
                                    Learn and discover how the informations displayed as a web page are organized, sent and received.
                                </p>
                                <a href="courses.php" class=""><button id="learn" class="bbtn mt-2 mx-2">Get started <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right dark:text-primary-lightP1 text-primary h-6">
                                            <g color="#5553ff">
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                                <polyline points="12 5 19 12 12 19" />
                                            </g>
                                        </svg></button></a>
                            </div>
                        </div>
                    </div>
                    <section class="customer-logos py-5 slider">
                        <div class="slide"><img src="assets/html_512x512.png" alt="logo"></div>
                        <div class="slide"><img src="assets/php_512x512.png" alt="logo"></div>
                        <div class="slide"><img src="assets/css_512x512.png" alt="logo"></div>
                        <div class="slide"><img src="assets/javascript_512x512.png" alt="logo"></div>
                        <div class="slide"><img src="assets/python_512x512.png" alt="logo"></div>
                        <div class="slide"><img src="assets/mysql.png" alt="logo"></div>
                        <div class="slide"><img src="assets/java_512x512.png" alt="logo"></div>
                    </section>
                </div>
            </div>
        </div>
    </section>



    <!--  ======================== About Me Area ==============================  -->

    <section id="reviews" class="about-area bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <p class="sectionHeader text-center Lined">What our users say</p>
                </div>
            </div>
        </div>
        <div class="container carousel">
            <div class="owl-carousel owl-theme">
                <div class="client row border border-1">
                    <div class="col-lg-3 client-img">
                        <img src="assets/quote.png" alt="img1" class="img-fluid" />
                    </div>
                    <div class="col-lg-9 about-client">
                        <h4 class="fw-bold">Hamza Mesmas</h4>
                        <p class="text-muted"><i>@HmzOrk_9d</i><i class="fab fa-twitter ms-2"></i></p>
                        <p class="para text-secondary">
                            “They offer some high-quality courses. Trust me. the time was worth it for the content quality. @Web.dev came at the right time in my career. I'm actually understanding topics better than ever. Truly made for developers.<br> Thanks ❤❤ ”
                        </p>
                    </div>
                </div>
                <div class="client row border border-1">
                    <div class="col-lg-3 client-img">
                        <img src="assets/quote.png" alt="img1" class="img-fluid" />
                    </div>
                    <div class="col-lg-9 about-client">
                        <h4 class="fw-bold">Laarbi Bokhbou</h4>
                        <p class="text-muted"><i>@LaarbiBo</i><i class="fab fa-twitter ms-2"></i></p>
                        <p class="para text-secondary">
                            “Just finished my first HTML course from Web.dev and the only thing i can say is... Highly recommend!”
                        </p>
                    </div>
                </div>
                <div class="client row border border-1">
                    <div class="col-lg-3 client-img">
                        <img src="assets/quote.png" alt="img1" class="img-fluid" />
                    </div>
                    <div class="col-lg-9 about-client">
                        <h4 class="fw-bold">Otman Batman</h4>
                        <p class="text-muted"><i>@JTK_o1</i><i class="fab fa-twitter ms-2"></i></p>
                        <p class="para text-secondary">
                            “Your courses are simply awesome, the coverage of fundementals is so good that I don't have to refer to 10 different websites looking for interview topics and content.”
                        </p>
                    </div>
                </div>
                <div class="client row border border-1">
                    <div class="col-lg-3 client-img">
                        <img src="assets/quote.png" alt="img1" class="img-fluid" />
                    </div>
                    <div class="col-lg-9 about-client">
                        <h4 class="fw-bold">Basma rachid</h4>
                        <p class="text-muted"><i>@sq_basma</i><i class="fab fa-twitter ms-2"></i></p>
                        <p class="para text-secondary">
                            “Thank you for finally making such a platform ❤”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  ======================== End About Me Area ==============================  -->

    <?php include "footer/index.html"; ?>

    <script src="js/index.js"></script>
    <script>
        $(document).ready(function() {
            $('#x').click(function() {
                $('#prom').slideUp(400, function() {
                    $(this).css('display', 'none');
                });
            })
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

</body>

</html>