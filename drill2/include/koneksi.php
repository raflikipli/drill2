<?php
$conn = mysqli_connect("localhost", "root", "", "drill2");
if (!$conn){
    die('koneksi gagal'.mysqli_connect_error());
}
?>