<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ctf_challenge";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>