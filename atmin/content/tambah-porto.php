    <?php
    include "./libs/handlePorto.php";
    ?>

    <section class="section">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row px-3">
                <div class="col-lg-8 order-last order-lg-first">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Project Name</label>
                                <input type="text" name="title" class="form-control" required value="<?php echo ($id) ? $rowEdit['title'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Project Link</label>
                                <input type="url" name="project_link" class="form-control" required value="<?php echo ($id) ? $rowEdit['project_link'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Content</label>
                                <textarea name="content" class="form-control" required><?php echo ($id) ? $rowEdit['content'] : '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="my-3 d-flex gap-2">
                                <button class="btn btn-outline-primary" type="submit" name="simpan">Simpan</button>
                                <a class="btn btn-outline-success" href="?page=porto">Kembali</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-first order-lg-last">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Publish / Draft</label>
                            <select name="is_active" id="" class="form-control">
                                <option <?php echo ($id) ? $rowEdit['is_active'] == 1 ? 'selected' : '' : '' ?> value="1">Publish</option>
                                <option <?php echo ($id) ? $rowEdit['is_active'] == 0 ? 'selected' : '' : '' ?> value="0">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>