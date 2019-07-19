<?php
include "connection.php";
$id = $_GET["id"];

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

	$status_data = "DALAM PEMERIKSAAN";

	$query1 = "UPDATE tb_ujian_skripsi SET npm='".$npm."', nama='".$nama."', prodi='".$prodi."', judul='".$judul."', tanggal='".$tanggal."', jam='".$jam."', ruang='".$ruang."', status='".$status."', nip_ketua='".$nip_ketua."', nip_sekretaris='".$nip_sekretaris."', nip_penguji1='".$nip_penguji1."', nip_penguji2='".$nip_penguji2."', nip_penguji3='".$nip_penguji3."', status_data='".$status_data."' WHERE npm='".$id."'";
	$query2 = "UPDATE tb_user SET username='".$npm."', nama='".$nama."', prodi='".$prodi."' WHERE username='".$id."'";
	mysqli_query($conn, $query1);
	mysqli_query($conn, $query2);

	echo '<script> alert("Data berhasil diupdate");
			window.location = "input_skripsi_form.php";
			</script>';
	if($_FILES['fileUpload']['error']==4){
		// echo '<script> alert("Gambar belum diupload");
		// window.location = "input_skripsi_form.php";
		// </script>';
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
				$query = "UPDATE tb_ujian_skripsi SET foto_usulan='".$target_file."' WHERE npm='".$id."'";
				mysqli_query($conn, $query);

				echo '<script> alert("File berhasil diupdate");
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
