<?php
$_HOST = "localhost";
$_USERNAME = "root";
$_PASSWORD = "";
$_DATABASE = "db_porto_rafli_raihan";


$koneksi = mysqli_connect($_HOST, $_USERNAME, $_PASSWORD, $_DATABASE);

if (!$koneksi) {
    echo "<h1> koneksi gagal :( </h1>";
}
