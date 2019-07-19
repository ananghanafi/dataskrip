<?php
include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
$login = mysqli_query($conn, $query);
$cek = mysqli_num_rows($login);
$row = mysqli_fetch_array($login);
mysqli_close($conn);

if($cek>0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $row['nama'];
	$_SESSION['status'] = "login";
	$_SESSION['profpic'] = $row['profpic'];
	$_SESSION['role'] = $row['role'];
	header("location:home.php");
}else{
	header("location:index.php");
}
?>