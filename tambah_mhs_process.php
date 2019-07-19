<?php
include "connection.php";

$username = $_POST["npm"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$prodi = $_POST["prodi"];

$query1 = "INSERT INTO tb_user (username, password, nama, prodi) VALUES ('".$username."','".$password."','".$nama."','".$prodi."')";
// $query2 = "INSERT INTO tb_ujian_skripsi (npm, nama, prodi) VALUES ('".$username."','".$nama."','".$prodi."')";
$query2 = "INSERT INTO tb_ujian_skripsi (npm, nama, prodi) VALUES ('".$username."','".$nama."','".$prodi."')";
$query3 = "INSERT INTO tb_kelengkapan (npm) VALUES ('".$username."')";
mysqli_query($conn, $query1);
mysqli_query($conn, $query2);
mysqli_query($conn, $query3);
mysqli_close($conn);
echo '<script> alert("Data berhasil diinputkan");
window.location = "tambah_mhs_form.php";
</script>';
// header("location:input_form.php");

?>