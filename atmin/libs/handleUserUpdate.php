<?php
# $querySettings sm $row ini buat narik database
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

    if (!empty($_FILES['profile_picture']['name'])) {      #$_FILE ini buat ngolah file dari form type file, dan ini buat cek file foto nya udah ke up apa blom ()
        $profile_pic = $_FILES['profile_picture']['name'];
        $tmp_name = $_FILES['profile_picture']['tmp_name'];

        # FIle type checking
        $type = mime_content_type($tmp_name);
        $allowed_filetype = ['image/jpg', 'image/png', 'image/jpeg'];

        if (in_array($type, $allowed_filetype)) {
            #boleh upload
            $path = "./uploads/profile-pic/";     # ini buat nyimpen file gambar ke folder mana (di db)
            if (!is_dir($path)) {   # kalo folder uploads blom ada (di db), dia buat foldernya
                mkdir($path);
            }

            $profile_pic_name = time() . "-" . basename($profile_pic);   #ini buat hashing (enkripsi) gambar pake waktu
            $target_file = $path . $profile_pic_name;

            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
                # Jika gambarnya ada, maka gambar sebelumnya di replace sm yg baru (logo lama diapus ditimpa yg baru)
                if (!empty($row['profile_pic'])) {
                    # ini buat cek file logo di uploads udah ada isinya blom, klo udah ada dihapus ditimpa pake yg baru
                    unlink($path . $row['profile_pic']);
                }
            }
        } else {
            echo "tidak boleh upload";
            die;
        }
        // ini buat edit portofolio klo ada gambar
        $update_image = "UPDATE me SET name='$name', email='$email', 
        password='$password', profile_pic='$profile_pic_name', fb='$fb', 
        ig='$ig', github='$github', linkedin='$linkedin', summary='$summary' WHERE 
        id='$myId'";
    } else {
        // ini buat edit portofolio klo gak ada gambar
        $update_image = "UPDATE me SET name='$name', email='$email', 
        password='$password', fb='$fb', ig='$ig', github='$github', linkedin='$linkedin', summary='$summary' WHERE 
        id='$myId'";
    }

    if ($row) {
        # update
        $myId = $row['id']; // $row['name_kolom_yg_mw_diambil'] ini buat ambil value dari satu kolom dari row, nahh biasanya ini buat ngambil id
        $update = mysqli_query($connection, $update_image);

        if ($update) {
            header("location:?page=home&ubah=berhasil");
        } else {
            header("location:?page=home&ubah=gagal");
        }
    }
}
