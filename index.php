<?php
include './atmin/libs/connection.php';

$queryMe = mysqli_query($connection, "SELECT * FROM me LIMIT 1");
$rowMe = mysqli_fetch_assoc($queryMe);
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

        <div class="unslate_co--site-inner" style="min-height: 100vh;">

            <div class="lines-wrap">
                <div class="lines-inner">
                    <div class="lines"></div>
                </div>
            </div>
            <!-- END lines -->

            <?php include 'inc/header.php' ?>
            <!-- END nav -->

            <?php include 'atmin/inc/routerview.php' ?>

        </div> <!-- END .unslate_co-site-inner -->

        <?php include 'inc/footer.php' ?>


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