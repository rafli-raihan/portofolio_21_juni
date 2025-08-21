    <?php
    $id = isset($_GET['edit']) ? $_GET['edit'] : '';

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = mysqli_query($connection, "SELECT * FROM skills WHERE id = '$id'");
        $rowEdit = mysqli_fetch_assoc($query);

        $title = "Edit Skills";
    } else {
        $title = "Tambah Skills";
    }

    if (isset($_POST['simpan'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $percentage = $_POST['percentage'];


        if ($id) {
            // disini edit skills
            $insert = mysqli_query($connection, "UPDATE skills SET title='$title', description='$description', percentage='$percentage' WHERE id='$id'");
            if ($insert) {
                header("location:?page=skills&ubah=berhasil");
            }
        } else {
            // disini tambah skills
            $insert = mysqli_query($connection, "INSERT INTO skills (title, description, percentage) VALUES ('$title','$description','$percentage')");
            if ($insert) {
                header("location:?page=skills&tambah=berhasil");
            }
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete = mysqli_query($connection, "DELETE FROM skills WHERE id='$id'");
        if ($delete) {
            header("location:?page=skills&hapus=berhasil");
        }
    }
    ?>

    <div class="pagetitle">
        <h1><?php echo $title; ?></h1>
    </div>

    <section class="section">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Skill</label>
                                <input type="text" name="title" class="form-control" required value="<?php echo ($id) ? $rowEdit['title'] : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control" required><?php echo ($id) ? $rowEdit['description'] : '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Persentase Kemahiran</label>
                                <input type="number" name="percentage" class="form-control" required><?php echo ($id) ? $rowEdit['percentage'] : '' ?>
                            </div>
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