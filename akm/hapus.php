<?php
session_start();
include 'koneksi.php';

$no = $_GET['no'];

mysqli_query($conn,"DELETE FROM `formulir` WHERE `no` = '$no' ");

$_SESSION['hapus'] = 'Data berhasil di hapus';
header("location:tes.php");
?>