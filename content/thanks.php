<?php
$queryServices = mysqli_query($connection, "SELECT * FROM services WHERE is_active=1 ORDER BY id DESC");
$rowServices = mysqli_fetch_all($queryServices, MYSQLI_ASSOC);
?>

<!-- Services Start -->
<div class="unslate_co--section" id="services-section" style="padding-top: 150px;">
    <div class="container">
        <div class="section-heading-wrap text-center mb-5">
            <h2 class="heading-h2 text-center divider"><span class="gsap-reveal">Terima Kasih & Sampai Jumpa Lagi</span></h2>
            <span class="gsap-reveal"><img src="images/divider.png" alt="divider" width="76"></span>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="d-block align-items-center justify-content-center text-center">
                <div class="mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                        <path fill="#D63447" fill-rule="evenodd" d="M8.106 18.247C5.298 16.083 2 13.542 2 9.137C2 4.274 7.5.825 12 5.501V20.5c-1 0-2-.77-3.038-1.59q-.417-.326-.856-.663" clip-rule="evenodd" opacity="0.5" />
                        <path fill="#D63447" d="M15.038 18.91C17.981 16.592 22 14 22 9.138S16.5.825 12 5.501V20.5c1 0 2-.77 3.038-1.59" />
                    </svg>
                </div>
                <p>hari ini saya izin untuk pamit dari PPKD Jakarta Pusat <br />
                    terimakasih banyak atas ilmu, bimbingan, arahan, dan kesempatan yang sudah diberikan <br />
                    terimakasih juga kepada teman-teman, mohon maaf bila saya ada salah kata atau perbuatan selama ini<br />
                    Sukses selalu semuanya! semoga dilancarkan pelatihannya hingga selesai Uji Kom</p>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->