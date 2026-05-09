<?php
$host = "db-server";
$user = "root";
$pass = "root_password";
$db   = "ctf_challenge";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>