<?php
include "connection.php";

$nip = $_POST["nip"];
$nama = $_POST["nama"];

$query = "INSERT INTO tb_dosen (nip, nama) VALUES ('".$nip."','".$nama."')";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil diinputkan");
window.location = "input_dosen_form.php";
</script>';
// header("location:input_form.php");

?>