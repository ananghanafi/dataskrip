<?php
	session_start();
	if($_SESSION['status'] !="login"){
		header("location:index.php");
	}
	include "connection.php";
	$npm = $_SESSION['username'];
	if(isset($_FILES['fileUpload'])){
		$target_dir = "upload/".$npm."/";
		$errors= array();
		// $file_name = $_FILES['fileUpload']['name'];
		$file_name = $_FILES['fileUpload']['name'];
		$file_size = $_FILES['fileUpload']['size'];
		$file_tmp = $_FILES['fileUpload']['tmp_name'];
		$file_type= $_FILES['fileUpload']['type'];
		$filename_parts = explode('.',$_FILES['fileUpload']['name']);
		$file_ext=strtolower(end($filename_parts));
		$target_file = $target_dir."berkas_".$npm.".".$file_ext;

		$extensions= array("rar","zip");

		if (empty($file_name)) {
			echo '<script> alert("File belum diupload");
			window.location = "upload_berkas_form.php";
			</script>';
		} else {
			if(in_array($file_ext,$extensions) == false){
				$errors[]="Tidak dapat upload file berekstensi selain .rar/.zip!";
			}

			if($file_size > 20971520){
				$errors[]='File tidak boleh lebih dari 20MB';
			}
			
			if(empty($errors)){
				if(!is_dir($target_dir)) {
				    mkdir($target_dir);
				}
				move_uploaded_file($file_tmp,$target_file);

				$query = "UPDATE tb_ujian_skripsi SET status_berkas='DALAM PEMERIKSAAN', berkas_skripsi='".$target_file."' where npm='".$npm."'";
				mysqli_query($conn, $query);
				mysqli_close($conn);

				echo '<script> alert("File berhasil diupload");
				window.location = "upload_berkas_form.php";
				</script>';
			}else{
				// print_r($errors);
				echo "<script> alert('".json_encode($errors)."');
				window.location = 'upload_berkas_form.php';
				</script>";
			}
		}		
		
	} else {
		echo '<script> alert("File belum diupload");
		window.location = "upload_berkas_form.php";
		</script>';
	}

?>
