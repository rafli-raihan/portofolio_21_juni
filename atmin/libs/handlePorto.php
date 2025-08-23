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



    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $type = mime_content_type($tmp_name);
        $allowed_filetype = ['image/jpg', 'image/png', 'image/jpeg'];

        if (in_array($type, $allowed_filetype)) {
            $path = "./uploads/portofolio/";
            if (!is_dir($path)) {
                mkdir($path);
            }

            $image_name = time() . "-" . basename($image);
            $target_file = $path . $image_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                if (!empty($row['image'])) {
                    unlink($path . $row['image']);
                }
            }
        } else {
            echo "tidak boleh upload";
            die;
        }
        $update_image = "UPDATE portofolio SET title='$title', content='$content', image='$image_name', is_active='$is_active', project_link='$project_link' WHERE id='$id'";
    } else {
        $update_image = "UPDATE portofolio SET title='$title', content='$content', is_active='$is_active', project_link='$project_link' WHERE id='$id'";
    }


    if ($id) {
        $insert = mysqli_query($connection, $update_image);
        if ($insert) {
            header("location:?page=porto&ubah=berhasil");
        }
    } else {
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
    unlink("./uploads/portofolio/" . $image_name);

    $delete = mysqli_query($connection, "DELETE FROM portofolio WHERE id='$id'");
    if ($delete) {
        header("location:?page=porto&hapus=berhasil");
    }
}
