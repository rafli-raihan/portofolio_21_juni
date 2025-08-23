<?php
include './libs/handleUserUpdate.php';
?>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 order-last order-lg-first">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admin Dashboard Settings</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control" id="siteTitle" name="name" value="<?php echo (isset($row['name'])) ? $row['name'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" id="siteEmail" name="email" value="<?php echo (isset($row['email'])) ? $row['email'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input type="text" class="form-control" id="siteEmail" name="password" value="<?php echo (isset($row['password'])) ? $row['password'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="fb" class="form-label fw-bold">Facebook</label>
                                <input type="url" name="fb" id="" class="form-control" value="<?php echo (isset($row['fb'])) ? $row['fb'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="github" class="form-label fw-bold">Github</label>
                                <input type="url" name="github" id="" class="form-control" value="<?php echo (isset($row['github'])) ? $row['github'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="linkedin" class="form-label fw-bold">Likedin</label>
                                <input type="url" name="linkedin" id="" class="form-control" value="<?php echo (isset($row['linkedin'])) ? $row['linkedin'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="ig" class="form-label fw-bold">Instagram</label>
                                <input type="url" name="ig" id="" class="form-control" value="<?php echo (isset($row['ig'])) ? $row['ig'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="summary" class="form-label fw-bold">Summary</label>
                                <textarea class="form-control" id="siteDescription" name="summary" rows="7"><?php echo (isset($row['summary'])) ? $row['summary'] : '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <button name="simpan" class="btn btn-primary">Submit Change</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-first order-lg-last">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex align-items-center gap-2">Pick your profile picture<span><iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" data-bs-title="Locations"></iconify-icon></span>
                        </h5>
                        <div class="mb-3">
                            <label for="profile_pics" class="form-label">Site Logo</label>
                            <input type="file" class="form-control" id="siteLogo" name="profile_picture" accept="image/*">
                            <div class="my-2">
                                <span>Current Picture:</span>
                                <img src="uploads/profile-pic/<?php echo $row['profile_pic'] ?? '' ?>" alt='' class="img-fluid rounded-3" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>