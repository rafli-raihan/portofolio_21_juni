<?php
$queryPorto = mysqli_query($connection, "SELECT * FROM portofolio WHERE is_active=1 ORDER BY id DESC");
$rowPorto = mysqli_fetch_all($queryPorto, MYSQLI_ASSOC);
?>

<div class="unslate_co--section" id="portfolio-section" style="padding-top: 100px;">
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