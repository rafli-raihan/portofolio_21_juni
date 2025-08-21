<?php
$querySkills = mysqli_query($connection, "SELECT * FROM skills ORDER BY id DESC");
$rowSkills = mysqli_fetch_all($querySkills, MYSQLI_ASSOC);
?>

<!-- Skills Start -->
<div class="unslate_co--section section-counter" id="skills-section" style="padding-top: 100px;">
    <div class="container">
        <div class="section-heading-wrap text-center mb-5">
            <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">My Skills</span></h2>
            <span class="gsap-reveal"><img src="images/divider.png" alt="divider" width="76"></span>
        </div>


        <div class="row pt-5">
            <?php foreach ($rowSkills as $skill): ?>
                <div class="col-6 col-sm-6 mb-5 mb-lg-0 col-md-6 col-lg-3 p-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="counter-v1 text-center">
                        <span class="number-wrap">
                            <span class="number number-counter" data-number="<?php echo $skill['percentage'] ?? '0' ?>"></span>
                            <span class="append-text">%</span>
                        </span>
                        <h3 class="d-block"><?php echo $skill['title'] ?? '0' ?></h3>
                        <span class="counter-label text-danger"><?php echo $skill['description'] ?? '0' ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Skills End -->