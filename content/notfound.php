<?php
$queryMe = mysqli_query($connection, "SELECT * FROM me LIMIT 1");
$rowMe = mysqli_fetch_assoc($queryMe);
?>

<div class="cover-v1 jarallax" style="background-image: url('atmin/uploads/profile-pic/<?php echo $rowMe['profile_pic'] ?? '' ?>');" id="home-section">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-7 mx-auto text-center">
                <h1 class="heading gsap-reveal-hero">Not Found :(</h1>
                <h2 class="subheading gsap-reveal-hero">The page that you're looking for is not here</h2>
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