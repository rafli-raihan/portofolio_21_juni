    <?php
    $id = isset($_GET['edit']) ? $_GET['edit'] : '';

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = mysqli_query($connection, "SELECT * FROM portofolio WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($query);

        $title = "Edit Portofolio";
    } else {
        $title = "Tambah Portofolio";
    }

    if (isset($_POST['simpan'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $is_active = $_POST['is_active'];
        $project_link = $_POST['project_link'];



        // buat narik gambar dari upload file
        if (!empty($_FILES['image']['name'])) {      #$_FILE ini buat ngolah file dari form type file, dan ini buat cek file foto nya udah ke up apa blom ()
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];

            # FIle type checking
            $type = mime_content_type($tmp_name);
            $allowed_filetype = ['image/jpg', 'image/png', 'image/jpeg'];

            if (in_array($type, $allowed_filetype)) {
                #boleh upload
                $path = "./uploads/portofolio/";     # ini buat nyimpen file gambar ke folder mana (di db)
                if (!is_dir($path)) {   # kalo folder uploads blom ada (di db), dia buat foldernya
                    mkdir($path);
                }

                $image_name = time() . "-" . basename($image);   #ini buat hashing (enkripsi) gambar pake waktu
                $target_file = $path . $image_name;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    # Jika gambarnya ada, maka gambar sebelumnya di replace sm yg baru (logo lama diapus ditimpa yg baru)
                    if (!empty($row['image'])) {
                        # ini buat cek file logo di uploads udah ada isinya blom, klo udah ada dihapus ditimpa pake yg baru
                        unlink($path . $row['image']);
                    }
                }
            } else {
                echo "tidak boleh upload";
                die;
            }
            // ini buat edit portofolio klo ada gambar
            $update_image = "UPDATE portofolio SET title='$title', content='$content', image='$image_name', is_active='$is_active', project_link='$project_link' WHERE id='$id'";
        } else {
            // ini buat edit portofolio klo gak ada gambar
            $update_image = "UPDATE portofolio SET title='$title', content='$content', is_active='$is_active', project_link='$project_link' WHERE id='$id'";
        }


        if ($id) {
            // disini edit portofolio
            $insert = mysqli_query($connection, $update_image);
            if ($insert) {
                header("location:?page=porto&ubah=berhasil");
            }
        } else {
            // disini tambah portofolio
            $insert = mysqli_query($connection, "INSERT INTO portofolio (title, content, image, is_active, project_link) VALUES ('$title','$content','$image_name','$is_active','$project_link')");
            if ($insert) {
                header("location:?page=porto&tambah=berhasil");
            }
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $queryGambar = mysqli_query($connection, "SELECT id, image FROM portofolio WHERE id='$id'");
        $rowGambar = mysqli_fetch_assoc($queryGambar);

        $image_name = $rowGambar['image'];
        unlink("uploads/portofolio/" . $image_name);

        $delete = mysqli_query($connection, "DELETE FROM portofolio WHERE id='$id'");
        if ($delete) {
            header("location:?page=portofolio&hapus=berhasil");
        }
    }
    ?>

    <div class="pagetitle">
        <h1><?php echo $title; ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <!-- kalo mau ada inputan file tambahin enctype="multipart/form-data" -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <div class="mb-3">
                                <label for="" class="form-label">Project Name</label>
                                <input type="text" name="title" class="form-control" required value="<?php echo ($id) ? $rowEdit['title'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Project Link</label>
                                <input type="url" name="project_link" class="form-control" required value="<?php echo ($id) ? $rowEdit['project_link'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Content</label>
                                <textarea name="content" class="form-control" required><?php echo ($id) ? $rowEdit['content'] : '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-3">
                        <div class="card-body">
                            <label for="">Publish / Draft</label>
                            <select name="is_active" id="" class="form-control">
                                <option <?php echo ($id) ? $rowEdit['is_active'] == 1 ? 'selected' : '' : '' ?> value="1">Publish</option>
                                <option <?php echo ($id) ? $rowEdit['is_active'] == 0 ? 'selected' : '' : '' ?> value="0">Draft</option>
                            </select>
                            <div class="my-3 d-flex gap-2">
                                <button class="btn btn-outline-primary" type="submit" name="simpan">Simpan</button>
                                <button class="btn btn-outline-success" href="?page=portofolio">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>