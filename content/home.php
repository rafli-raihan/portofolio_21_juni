<?php
$queryMe = mysqli_query($connection, "SELECT * FROM me LIMIT 1");
$rowMe = mysqli_fetch_assoc($queryMe);
?>

<div class="cover-v1 jarallax" style="background-image: url('atmin/uploads/profile-pic/<?php echo $rowMe['profile_pic'] ?? '' ?>');" id="home-section">
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
                    <img src="atmin/uploads/profile-pic/<?php echo $rowMe['profile_pic'] ?? '' ?>" alt="Image" class="img-fluid">
                </figure>
            </div>
            <div class="col-lg-4 pr-lg-5">
                <p class="mb-4 lead gsap-reveal"><?php echo (isset($rowMe['summary'])) ? $rowMe['summary'] : '' ?></p>
                <p class="gsap-reveal"><a href="#" class="btn btn-outline-pill btn-custom-light">Download my CV</a></p>
            </div>
        </div>
    </div>
</div>