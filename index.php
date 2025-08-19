<?php
include './atmin/libs/connection.php';

$queryMe = mysqli_query($connection, "SELECT * FROM me LIMIT 1");
$rowMe = mysqli_fetch_assoc($queryMe);

$queryPorto = mysqli_query($connection, "SELECT * FROM portofolio ORDER BY id DESC");
$rowPorto = mysqli_fetch_all($queryPorto, MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Rafli Raihan &mdash; Portofolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="keywords" content="html, css, javascript, jquery">
    <meta name="author" content="">

    <link rel="stylesheet" href="css/vendor/icomoon/style.css">
    <link rel="stylesheet" href="css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="css/vendor/animate.min.css">
    <link rel="stylesheet" href="css/vendor/aos.css">
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="css/vendor/jquery.fancybox.min.css">


    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-nav-target" data-offset="200">

    <nav class="unslate_co--site-mobile-menu">
        <div class="close-wrap d-flex">
            <a href="#" class="d-flex ml-auto js-menu-toggle">
                <span class="close-label">Close</span>
                <div class="close-times">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                </div>
            </a>
        </div>
        <div class="site-mobile-inner"></div>
    </nav>


    <div class="unslate_co--site-wrap">

        <div class="unslate_co--site-inner">

            <div class="lines-wrap">
                <div class="lines-inner">
                    <div class="lines"></div>
                </div>
            </div>
            <!-- END lines -->

            <nav class="unslate_co--site-nav site-nav-target">

                <div class="container">

                    <div class="row align-items-center justify-content-between text-left">
                        <div class="col-md-5 text-right">
                            <ul class="site-nav-ul js-clone-nav text-left d-none d-lg-inline-block">
                                <li class="has-children">
                                    <a href="#home-section" class="nav-link">Home</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="index.html">Hero Image BG</a>
                                        </li>
                                        <li>
                                            <a href="index-video.html">Video BG</a>
                                        </li>
                                        <li>
                                            <a href="index-hero-slider.html">Hero Slider</a>
                                        </li>
                                        <li>
                                            <a href="index-sidebar-menu.html">Sidebar Menu</a>
                                        </li>
                                        <li>
                                            <a href="index-right-menu.html">Right Menu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#about-section" class="nav-link">About</a></li>
                                <li><a href="#services-section" class="nav-link">Services</a></li>
                                <li><a href="#skills-section" class="nav-link">Skills</a></li>
                                <li><a href="#portfolio-section" class="nav-link">Portfolio</a></li>
                            </ul>
                        </div>
                        <div class="site-logo pos-absolute">
                        </div>
                        <div class="col-md-5 text-right text-lg-right">
                            <a href="index.html" class="unslate_co--site-logo"><?php echo isset($rowMe['name']) ? $rowMe['name'] : '' ?><span>.</span></a>
                        </div>
                    </div>
                </div>

            </nav>
            <!-- END nav -->

            <div class="cover-v1 jarallax" style="background-image: url('images/cover_bg_2.jpg');" id="home-section">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-md-7 mx-auto text-center">
                            <h1 class="heading gsap-reveal-hero"><?php echo isset($rowMe['name']) ? $rowMe['name'] : '' ?></h1>
                            <h2 class="subheading gsap-reveal-hero">Web and Flutter Developer from Jakarta, Indonesia</h2>
                        </div>

                    </div>
                </div>


                <a href="#portfolio-section" class="mouse-wrap smoothscroll">
                    <span class="mouse">
                        <span class="scroll"></span>
                    </span>
                    <span class="mouse-label">Scroll</span>
                </a>

            </div>
            <!-- END .cover-v1 -->

            <!-- <div class="unslate_co--section">
                <div class="container">
                    <div class="owl-carousel logo-slider">
                        <div class="logo-v1 gsap-reveal">
                            <img src="images/logo-google.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="logo-v1 gsap-reveal">
                            <img src="images/logo-puma.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="logo-v1 gsap-reveal">
                            <img src="images/logo-paypal.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="logo-v1 gsap-reveal">
                            <img src="images/logo-adobe.png" alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="unslate_co--section" id="about-section">
                <div class="container">

                    <div class="section-heading-wrap text-center mb-5">
                        <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">About Me</span></h2>
                        <span class="gsap-reveal">
                            <img src="images/divider.png" alt="divider" width="76">
                        </span>
                    </div>


                    <div class="row mt-5 justify-content-between">
                        <div class="col-lg-7 mb-5 mb-lg-0">
                            <figure class="dotted-bg gsap-reveal-img ">
                                <img src="images/about_me_pic2.jpg" alt="Image" class="img-fluid">
                            </figure>
                        </div>
                        <div class="col-lg-4 pr-lg-5">
                            <p class="mb-4 lead gsap-reveal"><?php echo (isset($rowMe['summary'])) ? $rowMe['summary'] : '' ?></p>
                            <p class="gsap-reveal"><a href="#" class="btn btn-outline-pill btn-custom-light">Download my CV</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="unslate_co--section" id="services-section">
                <div class="container">

                    <div class="section-heading-wrap text-center mb-5">
                        <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Services</span></h2>
                        <span class="gsap-reveal"><img src="images/divider.png" alt="divider" width="76"></span>
                    </div>

                    <div class="row gutter-v3">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="feature-v1" data-aos="fade-up" data-aos-delay="0">
                                <div class="wrap-icon mb-3">
                                    <img src="images/svg/001-options.svg" alt="Image" width="45">
                                </div>
                                <h3>Digital <br> Strategy</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="feature-v1" data-aos="fade-up" data-aos-delay="100">
                                <div class="wrap-icon mb-3">
                                    <img src="images/svg/002-chat.svg" alt="Icon" width="45">
                                </div>
                                <h3>Web <br> Design</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="feature-v1" data-aos="fade-up" data-aos-delay="200">
                                <div class="wrap-icon mb-3">
                                    <img src="images/svg/003-contact-book.svg" alt="Image" class="img-fluid" width="45">
                                </div>
                                <h3>User <br> Experience</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="feature-v1" data-aos="fade-up" data-aos-delay="0">
                                <div class="wrap-icon mb-3">
                                    <img src="images/svg/004-percentage.svg" alt="Image" width="45">
                                </div>
                                <h3>Web <br> Development</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="feature-v1" data-aos="fade-up" data-aos-delay="100">
                                <div class="wrap-icon mb-3">
                                    <img src="images/svg/006-goal.svg" alt="Image" width="45">
                                </div>
                                <h3>WordPress <br> Solutions</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="feature-v1" data-aos="fade-up" data-aos-delay="200">
                                <div class="wrap-icon mb-3">
                                    <img src="images/svg/005-line-chart.svg" alt="Image" width="45">
                                </div>
                                <h3>Mobile <br> Applications</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="unslate_co--section section-counter" id="skills-section">
                <div class="container">
                    <div class="section-heading-wrap text-center mb-5">
                        <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Skills</span></h2>
                        <span class="gsap-reveal"><img src="images/divider.png" alt="divider" width="76"></span>
                    </div>


                    <div class="row pt-5">
                        <div class="col-6 col-sm-6 mb-5 mb-lg-0 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                            <div class="counter-v1 text-center">
                                <span class="number-wrap">
                                    <span class="number number-counter" data-number="90">0</span>
                                    <span class="append-text">%</span>
                                </span>
                                <span class="counter-label">WordPress</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 mb-5 mb-lg-0 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="counter-v1 text-center">
                                <span class="number-wrap">
                                    <span class="number number-counter" data-number="99">0</span>
                                    <span class="append-text">%</span>
                                </span>
                                <span class="counter-label">HTML/CSS</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 mb-5 mb-lg-0 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="counter-v1 text-center">
                                <span class="number-wrap">
                                    <span class="number number-counter" data-number="95">0</span>
                                    <span class="append-text">%</span>
                                </span>
                                <span class="counter-label">jQuery</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 mb-5 mb-lg-0 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="counter-v1 text-center">
                                <span class="number-wrap">
                                    <span class="number number-counter" data-number="100">0</span>
                                    <span class="append-text">%</span>
                                </span>
                                <span class="counter-label">Design</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END .counter -->

            <div class="unslate_co--section" id="portfolio-section">
                <div class="container">


                    <div class="relative">
                        <div class="loader-portfolio-wrap">
                            <div class="loader-portfolio"></div>
                        </div>
                    </div>
                    <div id="portfolio-single-holder"></div>

                    <div class="portfolio-wrapper">

                        <div class="d-flex align-items-center mb-4 gsap-reveal gsap-reveal-filter">
                            <h2 class="mx-auto heading-h2"><span class="gsap-reveal">Portfolio</span></h2>
                        </div>

                        <div id="posts" class="row gutter-isotope-item">
                            <?php foreach ($rowPorto as $porto): ?>
                                <div class="item web branding col-sm-6 col-md-6 col-lg-4 isotope-mb-2">
                                    <a href="<?php echo $porto['project_link'] ?>" class="portfolio-item ajax-load-page isotope-item gsap-reveal-img" data-id="1">
                                        <div class="overlay">
                                            <span class="wrap-icon icon-link2"></span>
                                            <div class="portfolio-item-content">
                                                <h3><?php echo (isset($porto['title'])) ? $porto['title'] : '' ?></h3>
                                                <p><?php echo (isset($porto['content'])) ? $porto['content'] : '' ?></p>
                                            </div>
                                        </div>
                                        <img src="./atmin/uploads/portofolio/<?php echo $porto['image'] ?>" class="lazyload  img-fluid" alt="Images" />
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>

                    </div>


                </div>
            </div>

        </div> <!-- END .unslate_co-site-inner -->

        <footer class="unslate_co--footer unslate_co--section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">

                        <div class="footer-site-logo"><a href="#">Unfold<span>.</span></a></div>

                        <ul class="footer-site-social">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Dribbble</a></li>
                            <li><a href="#">Behance</a></li>
                        </ul>

                        <p class="site-copyright">

                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="icon-heart"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                        </p>

                    </div>
                </div>
            </div>
        </footer>


    </div>


    <!-- Loader -->
    <div id="unslate_co--overlayer"></div>
    <div class="site-loader-wrap">
        <div class="site-loader"></div>
    </div>

    <script src="js/scripts-dist.js"></script>
    <script src="js/main.js"></script>

</body>

</html>