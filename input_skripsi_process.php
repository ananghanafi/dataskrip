<?php
session_start();
if($_SESSION['status'] !="login"){
	header("location:index.php");
}
include "connection.php";

if (empty($_POST["npm"]) || empty($_POST["nama"]) || empty($_POST["prodi"]) || empty($_POST["judul"]) || empty($_POST["tanggal"]) || empty($_POST["jam"]) || empty($_POST["ruang"]) || empty($_POST["status"]) ||empty($_POST["ketua"]) ||empty($_POST["sekretaris"]) ||empty($_POST["penguji1"]) ||empty($_POST["penguji2"]) ||empty($_POST["penguji3"])) {
	echo '<script> alert("Data Harus Lengkap!");
	window.location = "input_skripsi_form.php";
	</script>';
} else {
	$npm = $_POST["npm"];
	$nama = $_POST["nama"];
	$prodi = $_POST["prodi"];

	$judul = $_POST["judul"];
	$tanggal = $_POST["tanggal"];
	$jam = $_POST["jam"];
	$ruang = $_POST["ruang"];
	$status = $_POST["status"];

	$ketua = explode(" | ", $_POST["ketua"]);
	$sekretaris = explode(" | ", $_POST["sekretaris"]);
	$penguji1 = explode(" | ", $_POST["penguji1"]);
	$penguji2 = explode(" | ", $_POST["penguji2"]);
	$penguji3 = explode(" | ", $_POST["penguji3"]);

	$nip_ketua = $ketua[0];
	$nip_sekretaris = $sekretaris[0];
	$nip_penguji1 = $penguji1[0];
	$nip_penguji2 = $penguji2[0];
	$nip_penguji3 = $penguji3[0];
	
	if($_FILES['fileUpload']['error']==4){
		echo '<script> alert("Gambar belum diupload");
		window.location = "input_skripsi_form.php";
		</script>';
	} else {
		$target_dir = "upload/".$npm."/";
		$errors= array();
		// $file_name = $_FILES['fileUpload']['name'];
		$file_name = $_FILES['fileUpload']['name'];
		$file_size = $_FILES['fileUpload']['size'];
		$file_tmp = $_FILES['fileUpload']['tmp_name'];
		$file_type= $_FILES['fileUpload']['type'];
		$filename_parts = explode('.',$_FILES['fileUpload']['name']);
		$file_ext=strtolower(end($filename_parts));
		$target_file = $target_dir."foto_usulan_".$npm.".".$file_ext;

		$extensions= array("png","jpg","jpeg");

		if (empty($file_name)) {
			echo '<script> alert("Gambar belum diupload");
			window.location = "input_skripsi_form.php";
			</script>';
		} else {
			if(in_array($file_ext,$extensions) == false){
				$errors[]="Tidak dapat upload gambar berekstensi selain png/jpg/jpeg !";
			}			
			if(empty($errors)){
				if(!is_dir($target_dir)) {
				    mkdir($target_dir);
				}
				move_uploaded_file($file_tmp,$target_file);
				$query = "INSERT INTO tb_ujian_skripsi (npm, nama, prodi, judul, tanggal, jam, ruang, status, nip_ketua, nip_sekretaris, nip_penguji1, nip_penguji2, nip_penguji3, foto_usulan) VALUES ('".$npm."','".$nama."','".$prodi."','".$judul."','".$tanggal."','".$jam."','".$ruang."','".$status."','".$nip_ketua."','".$nip_sekretaris."','".$nip_penguji1."','".$nip_penguji2."','".$nip_penguji3."','".$target_file."')";
				mysqli_query($conn, $query);
				mysqli_close($conn);
				echo '<script> alert("Data berhasil diinputkan");
				window.location = "input_skripsi_form.php";
				</script>';
			}else{
				// print_r($errors);
				echo "<script> alert('".json_encode($errors)."');
				window.location = 'input_skripsi_form.php';
				</script>";
			}
		}		
		
	}
	
}



?>
