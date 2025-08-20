<?php
$queryServices = mysqli_query($connection, "SELECT * FROM services WHERE is_active=1 ORDER BY id DESC");
$rowServices = mysqli_fetch_all($queryServices, MYSQLI_ASSOC);
?>

<div style="min-width: 80vh;">
    <!-- Services Start -->
    <div class="unslate_co--section" id="services-section">
        <div class="container">

            <div class="section-heading-wrap text-center mb-5">
                <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Services</span></h2>
                <span class="gsap-reveal"><img src="images/divider.png" alt="divider" width="76"></span>
            </div>
            <div class="row gutter-v3">
                <?php foreach ($rowServices as $service): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="feature-v1" data-aos="fade-up" data-aos-delay="0">
                            <div class="wrap-icon mb-3">
                                <img src="atmin/uploads/services/<?php echo $service['logo'] ?? '' ?>" alt="Image" width="45">
                            </div>
                            <h3><?php echo $service['title'] ?? '' ?></h3>
                            <p><?php echo $service['description'] ?? '' ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Skills Start -->
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
            </div>
        </div>
    </div>
    <!-- Skills End -->
</div>