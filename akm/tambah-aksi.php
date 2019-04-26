<?php 
session_start();
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$kelamin = $_POST['kelamin'];
$comment = $_POST['comment'];
 

mysqli_query($conn,"INSERT INTO `formulir`(`nama`, `email`, `kelamin`, `comment`) VALUES ('$nama','$email','$kelamin','$comment')");
	$_SESSION['pesan'] = 'Data berhasil di tambahkan';
	header("location:tes.php");
 
?>