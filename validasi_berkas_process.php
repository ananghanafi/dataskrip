<?php
include "connection.php";
$id = $_GET["id"];

$hardcopy_poster = $_POST['hardcopy_poster'];
$manual_book = $_POST['manual_book'];
$softcopy_skripsi = $_POST['softcopy_skripsi'];
$softcopy_artikel = $_POST['softcopy_artikel'];
$softcopy_poster = $_POST['softcopy_poster'];
$sumbangan_buku = $_POST['sumbangan_buku'];
$sertifikat_toefl = $_POST['sertifikat_toefl'];
$cd_skripsi = $_POST['cd_skripsi'];
$action = $_POST["submit"];

if ($action=="valid") {
	if ($hardcopy_poster==1 && $manual_book==1 && $softcopy_skripsi==1 && $softcopy_artikel==1 && $softcopy_poster==1 && $sumbangan_buku==1 && $sertifikat_toefl==1 && $cd_skripsi==1){
		$query1 = "UPDATE tb_ujian_skripsi SET status_berkas='VALID' where npm='".$id."'";
		$query2 = "UPDATE tb_kelengkapan SET hardcopy_poster = '".$hardcopy_poster."', manual_book = '".$manual_book."', softcopy_skripsi = '".$softcopy_skripsi."', softcopy_artikel = '".$softcopy_artikel."', softcopy_poster = '".$softcopy_poster."', sumbangan_buku = '".$sumbangan_buku."', sertifikat_toefl = '".$sertifikat_toefl."', cd_skripsi = '".$cd_skripsi."' where npm='".$id."'";
		mysqli_query($conn, $query1);
		mysqli_query($conn, $query2);
		mysqli_close($conn);
		echo '<script> alert("Data berhasil divalidasi");
		window.location = "cek_data_skripsi.php";
		</script>';
	} else {
		echo '<script> alert("Berkas tidak lengkap! Tidak dapat divalidasi");
		window.location = "cek_data_skripsi.php";
		</script>';
	}
	
} else {
	$query1 = "UPDATE tb_ujian_skripsi SET status_berkas='BELUM VALID' where npm='".$id."'";
	$query2 = "UPDATE tb_kelengkapan SET hardcopy_poster = '".$hardcopy_poster."', manual_book = '".$manual_book."', softcopy_skripsi = '".$softcopy_skripsi."', softcopy_artikel = '".$softcopy_artikel."', softcopy_poster = '".$softcopy_poster."', sumbangan_buku = '".$sumbangan_buku."', sertifikat_toefl = '".$sertifikat_toefl."', cd_skripsi = '".$cd_skripsi."' where npm='".$id."'";
	mysqli_query($conn, $query1);
	mysqli_query($conn, $query2);
	mysqli_close($conn);
	echo '<script> alert("Validasi data dibatalkan");
	window.location = "cek_data_skripsi.php";
	</script>';
}
// header("location:input_form.php");
?>