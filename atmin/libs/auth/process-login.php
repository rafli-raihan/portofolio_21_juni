<?php
include './libs/connection.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryUser = mysqli_query($connection, "SELECT * FROM admin WHERE email='$email'");
    if (!$queryUser) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Cek apakah ada hasil dari query
    if (mysqli_num_rows($queryUser) == 1) {
        $row = mysqli_fetch_assoc($queryUser);
        if ($password == $row['password']) {
            $_SESSION['ID_USER'] = $row['id'];
            $_SESSION['NAME'] = $row['name'];
            header('location:home.php');
        } else {
            header('location:index.php?error=password');
        }
    } else {
        header('location:index.php?error=email');
    }
}
