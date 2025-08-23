    <?php
    include "./libs/handleSkills.php";
    ?>

    <section class="section">
        <form action="" method="post">
            <div class="row px-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Nama Skill</label>
                                <input type="text" name="title" class="form-control" required value="<?php echo ($id) ? $rowEdit['title'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Persentase Kemahiran</label>
                                <input type="number" name="percentage" min="1" max="100" class="form-control" value="<?php echo $rowEdit['percentage'] ?? '' ?>" required>
                                <div class="my-3 d-flex gap-2">
                                    <button class="btn btn-outline-primary" type="submit" name="simpan">Simpan</button>
                                    <a class="btn btn-outline-success" href="?page=skills">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </section>