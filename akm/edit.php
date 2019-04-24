<?php
session_start();
include 'koneksi.php';

$no = $_GET['no'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$kelamin = $_GET['kelamin'];
$comment = $_GET['comment'];

mysqli_query($conn, "UPDATE `formulir` SET `nama` = '$nama', `email` = '$email', `kelamin` = '$kelamin', `comment`= '$comment' WHERE `no` = '$no'");

$_SESSION['pesan'] = 'Data berhasil di edit';
header("location:tes.php");

?>