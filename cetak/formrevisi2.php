<?php
// include'../koneksi.php';
session_start();
if($_SESSION['status'] !="login"){
header("location:index.php");
}
include "../connection.php";
include'../fpdf181/fpdf.php';

$id = $_GET['id'];
$query ="SELECT u.npm, u.nama, u.judul, u.nip_penguji2, d2.nama as nama_penguji2, u.status_data 
    FROM tb_ujian_skripsi as u
    INNER JOIN tb_dosen as d2 ON d2.nip = u.nip_penguji2
      
    WHERE npm='".$id."'";

$result = mysqli_query($conn,$query);

while($data = mysqli_fetch_array($result)){
$pdf = new FPDF();
$pdf->AddPage('P',array(210,330));
// $pdf = new FPDF('',    // mode - default ''
//  '',    // format - A4, for example, default ''
//  '',     // font size - default 0
//  '',    // default font family
//  '',    // margin_left
//  '',    // margin right
//  '',     // margin top
//  '',    // margin bottom
//  '',     // margin header
//  '',     // margin footer
//  'P');  // L - landscape, P - portrait


$tgl=date('Y/m/d');
// $pdf->Image('../dist/img/upgris-logo.png',15,8,20,24);
// $pdf->setFont('arial','B',16);
// $pdf->Cell(147,6,'UNIVERSITAS PGRI SEMARANG',0,1,'C');
// $pdf->setFont('arial','',16);
// $pdf->Cell(163,6,'FAKULTAS TEKNIK DAN INFORMATIKA',0,1,'C');

// $pdf->setFont('arial','B',10);
// $pdf->Cell(28,6,'',0,0,'L');
// $pdf->Cell(17,6,'Kampus:',0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(2,6,'Jalan Sidodadi Timur No. 24 Semarang - Indonesia',0,1,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(28,6,'',0,0,'L');
// $pdf->Cell(10,6,'Telp.',0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(2,6,'(024) 8316377. Faks. (024) 8448217. Email: fti@upgris.ac.id. Homepage: https://fti.upgris.ac.id',0,1,'L');
// $pdf->Cell(217,6,'Telp. (024) 8316377. Faks. (024) 8448217. Email: fti@upgris.ac.id. Homepage: https://fti.upgris.ac.id',0,1,'C');
// $pdf->SetLineWidth(1);
// $pdf->Line(10,36,200,36);
$pdf->Ln(2);
$pdf->setFont('Arial','B',16);
$pdf->Cell(10,6,'',0,0,'L');

$pdf->Cell(187,6,'LEMBAR REVISI UJIAN SKRIPSI',0,1,'L');
$pdf->Ln(2);
$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(50,6,'Nama Mahasiswa',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['nama'],0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(50,6,'N P M',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['npm'],0,1,'L');
//$pdf->Ln(2);
//$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(50,6,'Judul',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->MultiCell(130,6,$data['judul'],0,'L',false);
// $pdf->Cell(70,6,$data['judul'],0,1,'L');	
// $pdf->setFont('Arial','B',8);
// $pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,1,'C');
// $pdf->SetFont('arial','B',12);
//  //$pdf->SetFillColor(256,256,256);
//  $pdf->Cell(20,6,'',0,0,'L');
// $pdf->Cell(70,6,'JUDUL SAYA ',0,1,'L');
$pdf->Ln(3);
$pdf->SetLineWidth(0.2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->SetFillColor(192,192,192);
$pdf->Cell(8,6,'No',1,0,'C',1);
$pdf->Cell(100,6,'Uraian Revisi',1,0,'C',1);
$pdf->Cell(60,6,'Keterangan',1,1,'C',1);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->SetFillColor(256,256,256);
$pdf->Cell(8,190,'',1,0,'C',1);
$pdf->Cell(100,190,'',1,0,'C',1);
$pdf->Cell(60,190,'',1,0,'C',1);


$pdf->Ln(195);
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(256,256,256);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(100,6,'',0,0,'L',1);
$pdf->Cell(40,6,'Pengesahan Penguji II',0,1,'L',1);
$pdf->Ln(15);
$pdf->SetFont('Arial','U',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(100,6,'',0,0,'L',1);
$pdf->Cell(40,6,$data['nama_penguji2'],0,1,'L',1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(100,6,'',0,0,'L',1);
$pdf->Cell(20,6,'NIP/NPP.',0,0,'L',1);
$pdf->Cell(50,6,$data['nip_penguji2'],0,1,'L',1);


$pdf->SetFont('Arial','',10);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(130,6,'*) Revisi Maksimal 7 Hari Setelah Pelaksanaan Ujian Skripsi',0,0,'L',1);


$pdf->SetAutoPageBreak(false,2);


$nomor=0;
// $sql=mysql_query("SELECT * FROM tbanggota");
// while($data=mysql_fetch_array($sql)){
// 	$nomor++;
// 	$pdf->Ln(0);
// 	$pdf->setFont('Arial','',7);
// 	$pdf->Cell(8,4,$nomor,1,0,'L');
// 	$pdf->Cell(20,4,$data['idanggota'],1,0,'L');
// 	$pdf->Cell(50,4,$data['nama'],1,0,'L');
// 	$pdf->Cell(25,4,$data['jeniskelamin'],1,0,'L');
// 	$pdf->Cell(87,4,$data['alamat'],1,1,'L');
// }
$pdf->Output('formrevisi2.pdf','I');
}
?>			