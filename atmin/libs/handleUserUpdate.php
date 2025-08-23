<?php
$queryMe = mysqli_query($connection, "SELECT * FROM me LIMIT 1"); // LIMIT buat ngebatasin berapa banyak data yg di query / fetch dari db, misal LIMIT 3 ya dia fetch 3 data aj dari keseluruhan tabel gak kya sebelumnya yg tanpa limit    
$row = mysqli_fetch_assoc($queryMe);

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $summary = $_POST['summary'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];
    $myId = $row['id'];

    if (!empty($_FILES['profile_picture']['name'])) {
        if (isset($row["profile_pic"])) {
            unlink('./uploads/profile-pic/' . $row['profile_pic']);
        }

        $profile_pic = $_FILES['profile_picture']['name'];
        $tmp_name = $_FILES['profile_picture']['tmp_name'];

        $type = mime_content_type($tmp_name);
        $allowed_filetype = ['image/jpg', 'image/png', 'image/jpeg'];

        if (in_array($type, $allowed_filetype)) {
            $path = "./uploads/profile-pic/";
            if (!is_dir($path)) {
                mkdir($path);
            }

            $profile_pic_name = time() . "-" . basename($profile_pic);
            $target_file = $path . $profile_pic_name;

            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {

                if (!empty($row['profile_pic'])) {
                    unlink($path . $row['profile_pic']);
                }
            }
        } else {
            echo "tidak boleh upload";
            die;
        }

        $update_image = "UPDATE me SET name='$name', email='$email', 
        password='$password', profile_pic='$profile_pic_name', fb='$fb', 
        ig='$ig', github='$github', linkedin='$linkedin', summary='$summary' WHERE 
        id='$myId'";
    } else {
        $update_image = "UPDATE me SET name='$name', email='$email', 
        password='$password', fb='$fb', ig='$ig', github='$github', linkedin='$linkedin', summary='$summary' WHERE 
        id='$myId'";
    }

    if ($row) {
        $update = mysqli_query($connection, $update_image);

        if ($update) {
            header("location:?page=home&ubah=berhasil");
        } else {
            header("location:?page=home&ubah=gagal");
        }
    }
}
