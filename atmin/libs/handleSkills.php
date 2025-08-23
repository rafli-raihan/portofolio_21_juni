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
    $percentage = intval($_POST['percentage']);
    $description = "";

    switch (true) {
        case ($percentage >= 90 && $percentage <= 100):
            $description = "Advanced";
            break;

        case ($percentage >= 60):
            $description = "Intermediate";
            break;

        case ($percentage <= 59):
            $description = "Beginner";
            break;

        default:
            $description = "Invalid";
            break;
    }

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
