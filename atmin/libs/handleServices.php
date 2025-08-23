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


    if (!empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $tmp_name = $_FILES['logo']['tmp_name'];

        $type = mime_content_type($tmp_name);
        $allowed_filetype = ['image/jpg', 'image/png', 'image/jpeg'];

        if (in_array($type, $allowed_filetype)) {
            $path = "./uploads/services/";
            if (!is_dir($path)) {
                mkdir($path);
            }

            $image_name = time() . "-" . basename($logo);
            $target_file = $path . $image_name;

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {

                if (!empty($row['logo'])) {
                    unlink($path . $row['logo']);
                }
            }
        } else {
            echo "tidak boleh upload";
            die;
        }
        $update_image = "UPDATE services SET title='$title', description='$description', logo='$image_name', is_active='$is_active' WHERE id='$id'";
    } else {
        $update_image = "UPDATE services SET title='$title', description='$description', is_active='$is_active' WHERE id='$id'";
    }


    if ($id) {
        $insert = mysqli_query($connection, $update_image);
        if ($insert) {
            header("location:?page=services&ubah=berhasil");
        }
    } else {
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
    unlink("./uploads/services/" . $image_name);

    $delete = mysqli_query($connection, "DELETE FROM services WHERE id='$id'");
    if ($delete) {
        header("location:?page=services&hapus=berhasil");
    }
}
