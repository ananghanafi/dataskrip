<?php
include "connection.php";
$id = $_GET["id"];
$action = $_POST["submit"];
if ($action=="valid") {
	$query = "UPDATE tb_ujian_skripsi SET status_data='VALID' where npm='".$id."'";
	mysqli_query($conn, $query);
	mysqli_close($conn);
	echo '<script> alert("Data berhasil divalidasi");
	window.location = "cek_data_skripsi.php";
	</script>';
} else {
	$query = "UPDATE tb_ujian_skripsi SET status_data='BELUM VALID' where npm='".$id."'";
	mysqli_query($conn, $query);
	mysqli_close($conn);
	echo '<script> alert("Validasi data dibatalkan");
	window.location = "cek_data_skripsi.php";
	</script>';
}

// header("location:input_form.php");
?>