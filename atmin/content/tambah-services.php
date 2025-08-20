    <?php
    $id = isset($_GET['edit']) ? $_GET['edit'] : '';

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = mysqli_query($connection, "SELECT * FROM services WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($query);

        $title = "Edit Services";
    } else {
        $title = "Tambah Services";
    }

    if (isset($_POST['simpan'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $is_active = $_POST['is_active'];



        // buat narik gambar dari upload file
        if (!empty($_FILES['logo']['name'])) {      #$_FILE ini buat ngolah file dari form type file, dan ini buat cek file foto nya udah ke up apa blom ()
            $logo = $_FILES['logo']['name'];
            $tmp_name = $_FILES['logo']['tmp_name'];

            # FIle type checking
            $type = mime_content_type($tmp_name);
            $allowed_filetype = ['image/jpg', 'image/png', 'image/jpeg'];

            if (in_array($type, $allowed_filetype)) {
                #boleh upload
                $path = "./uploads/services/";     # ini buat nyimpen file gambar ke folder mana (di db)
                if (!is_dir($path)) {   # kalo folder uploads blom ada (di db), dia buat foldernya
                    mkdir($path);
                }

                $image_name = time() . "-" . basename($logo);   #ini buat hashing (enkripsi) gambar pake waktu
                $target_file = $path . $image_name;

                if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
                    # Jika gambarnya ada, maka gambar sebelumnya di replace sm yg baru (logo lama diapus ditimpa yg baru)
                    if (!empty($row['logo'])) {
                        # ini buat cek file logo di uploads udah ada isinya blom, klo udah ada dihapus ditimpa pake yg baru
                        unlink($path . $row['logo']);
                    }
                }
            } else {
                echo "tidak boleh upload";
                die;
            }
            // ini buat edit services klo ada gambar
            $update_image = "UPDATE services SET title='$title', description='$description', logo='$image_name', is_active='$is_active', WHERE id='$id'";
        } else {
            // ini buat edit services klo gak ada gambar
            $update_image = "UPDATE services SET title='$title', description='$description', is_active='$is_active', WHERE id='$id'";
        }


        if ($id) {
            // disini edit services
            $insert = mysqli_query($connection, $update_image);
            if ($insert) {
                header("location:?page=services&ubah=berhasil");
            }
        } else {
            // disini tambah services
            $insert = mysqli_query($connection, "INSERT INTO services (title, description, logo, is_active) VALUES ('$title','$description','$image_name','$is_active')");
            if ($insert) {
                header("location:?page=services&tambah=berhasil");
            }
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $queryGambar = mysqli_query($connection, "SELECT id, logo FROM services WHERE id='$id'");
        $rowGambar = mysqli_fetch_assoc($queryGambar);

        $image_name = $rowGambar['logo'];
        unlink("uploads/services/" . $image_name);

        $delete = mysqli_query($connection, "DELETE FROM services WHERE id='$id'");
        if ($delete) {
            header("location:?page=services&hapus=berhasil");
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
                                <label for="" class="form-label">Sevices Name</label>
                                <input type="text" name="title" class="form-control" required value="<?php echo ($id) ? $rowEdit['title'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control" required><?php echo ($id) ? $rowEdit['description'] : '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control">
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
                                <button class="btn btn-outline-success" href="?page=services">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>