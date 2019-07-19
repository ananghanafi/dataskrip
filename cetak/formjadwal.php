<?php
// include'../koneksi.php';
session_start();
if($_SESSION['status'] !="login"){
header("location:index.php");
}
include "../connection.php";
include'../fpdf181/fpdf.php';

$id = $_GET['id'];
$query ="SELECT u.npm, u.nama, u.prodi, u.judul, u.tanggal, u.jam, u.ruang, u.status, d1.nip as nip_ketua, d1.nama as nama_ketua, d2.nip as nip_sekretaris, d2.nama as nama_sekretaris, d3.nip as nip_penguji1, d3.nama as nama_penguji1, d4.nip as nip_penguji2, d4.nama as nama_penguji2, d5.nip as nip_penguji3, d5.nama as nama_penguji3, u.status_data 
FROM tb_ujian_skripsi as u
INNER JOIN tb_dosen as d1 ON d1.nip = u.nip_ketua
INNER JOIN tb_dosen as d2 ON d2.nip = u.nip_sekretaris
INNER JOIN tb_dosen as d3 ON d3.nip = u.nip_penguji1
INNER JOIN tb_dosen as d4 ON d4.nip = u.nip_penguji2
INNER JOIN tb_dosen as d5 ON d5.nip = u.nip_penguji3   
      
WHERE npm='".$id."'";

$result = mysqli_query($conn,$query);

while($data = mysqli_fetch_array($result)){
$tgl = explode(", ", $data['tanggal']);
$pdf = new FPDF();
$pdf->AddPage('P',array(210,330));
$pdf->SetAutoPageBreak(false);

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


// $tgl=date('Y/m/d');
// $pdf->Image('../dist/img/upgris-logo.png',15,8,20,24);
// $pdf->setFont('arial','B',16);
// $pdf->Cell(147,6,'UNIVERSITAS PGRI SEMARANG',0,1,'C');
// $pdf->setFont('arial','',16);
// $pdf->Cell(163,6,'FAKULTAS TEKNIK DAN INFORMATIKA',0,1,'C');

// $pdf->setFont('arial','B',10);
// $pdf->Cell(27,6,'',0,0,'L');
// $pdf->Cell(17,6,'Kampus:',0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(2,6,'Jalan Sidodadi Timur No. 24 Semarang - Indonesia',0,1,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(27,6,'',0,0,'L');
// $pdf->Cell(10,6,'Telp.',0,0,'L');
// $pdf->setFont('arial','',10);
// $pdf->Cell(2,6,'(024) 8316377. Faks. (024) 8448217. Email: fti@upgris.ac.id. Homepage: https://fti.upgris.ac.id',0,1,'L');
// $pdf->Cell(217,6,'Telp. (024) 8316377. Faks. (024) 8448217. Email: fti@upgris.ac.id. Homepage: https://fti.upgris.ac.id',0,1,'C');
// $pdf->SetLineWidth(1);
// $pdf->Line(10,36,200,36);
$firstLn=5;
$titleMaxWidth=170;

$pdf->Ln($firstLn);
$pdf->setFont('Arial','B',12);
$pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(187,6,'JADWAL PELAKSANAAN UJIAN SKRIPSI',0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Judul',0,0,'L');
$pdf->Cell(2,6,':',0,1,'L');
 $pdf->Cell(7,6,'',0,0,'L');
 $pdf->setFont('Arial','B',12);
$pdf->MultiCell($titleMaxWidth,6,$data['judul'],0,'L',false);
$pdf->Ln(5);

$titleRowNum=0;
// $titleRowNum=1;
$titleRowNum = $pdf->NbLines($titleMaxWidth,$data['judul']);
$titleHeight = $titleRowNum*6;
$boxHeight = 72+$titleHeight;
$interBoxLn=15;
$boxHeightSpace = 17+($interBoxLn-20)+$boxHeight;
$firstCoord = $firstLn+8;

$pdf->Rect(15,$firstCoord+(0*$boxHeightSpace),180,$boxHeight,'D');
$pdf->Rect(15,$firstCoord+(1*$boxHeightSpace),180,$boxHeight,'D');
$pdf->Rect(15,$firstCoord+(2*$boxHeightSpace),180,$boxHeight,'D');

// $pdf->Rect(19,56,180,168+($titleRowNum*6),'D');

 //$pdf->SetFillColor(256,256,256);
$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Nama',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$data['nama'],0,0,'L');
$pdf->Cell(25,6,'NPM',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['npm'],0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Hari',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$tgl[0],0,0,'L');
$pdf->Cell(25,6,'Tanggal',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$tgl[1],0,1,'L');

 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Ruang',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$data['ruang'],0,0,'L');
$pdf->Cell(25,6,'Waktu',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['jam'],0,1,'L');

$pdf->Ln(5);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Tim Penguji',0,0,'L');
$pdf->Cell(2,6,':',0,1,'L');

 $pdf->setFont('Arial','B',12);
 $pdf->Cell(7,6,'',0,0,'L');
 $pdf->Cell(25,6,'Penguji 1',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['nama_penguji1'],0,1,'L');

$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Penguji 2',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['nama_penguji2'],0,1,'L');

 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Penguji 3',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['nama_penguji3'],0,1,'L');
//$pdf->Ln(2);
//$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);

$pdf->Ln($interBoxLn);
$pdf->setFont('Arial','B',12);
$pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(187,6,'JADWAL PELAKSANAAN UJIAN SKRIPSI',0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Judul',0,0,'L');
$pdf->Cell(2,6,':',0,1,'L');
 $pdf->Cell(7,6,'',0,0,'L');
 $pdf->setFont('Arial','B',12);
$pdf->MultiCell($titleMaxWidth,6,$data['judul'],0,'L',false);
$pdf->Ln(5);
 //$pdf->SetFillColor(256,256,256);
$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Nama',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$data['nama'],0,0,'L');
$pdf->Cell(25,6,'NPM',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['npm'],0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Hari',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$tgl[0],0,0,'L');
$pdf->Cell(25,6,'Tanggal',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$tgl[1],0,1,'L');

 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Ruang',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$data['ruang'],0,0,'L');
$pdf->Cell(25,6,'Waktu',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['jam'],0,1,'L');

$pdf->Ln(5);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Tim Penguji',0,0,'L');
$pdf->Cell(2,6,':',0,1,'L');

 $pdf->Cell(7,6,'',0,0,'L');
 $pdf->Cell(25,6,'Penguji 1',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['nama_penguji1'],0,1,'L');

 $pdf->setFont('Arial','B',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Penguji 2',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['nama_penguji2'],0,1,'L');

$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Penguji 3',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['nama_penguji3'],0,1,'L');

$pdf->Ln($interBoxLn);
$pdf->setFont('Arial','B',12);
$pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(187,6,'JADWAL PELAKSANAAN UJIAN SKRIPSI',0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Judul',0,0,'L');
$pdf->Cell(2,6,':',0,1,'L');
 $pdf->Cell(7,6,'',0,0,'L');
 $pdf->setFont('Arial','B',12);
$pdf->MultiCell($titleMaxWidth,6,$data['judul'],0,'L',false);
$pdf->Ln(5);
 //$pdf->SetFillColor(256,256,256);
$pdf->SetFont('arial','',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Nama',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$data['nama'],0,0,'L');
$pdf->Cell(25,6,'NPM',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['npm'],0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Hari',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$tgl[0],0,0,'L');
$pdf->Cell(25,6,'Tanggal',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$tgl[1],0,1,'L');

 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Ruang',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(80,6,$data['ruang'],0,0,'L');
$pdf->Cell(25,6,'Waktu',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['jam'],0,1,'L');

$pdf->Ln(5);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Tim Penguji',0,0,'L');
$pdf->Cell(2,6,':',0,1,'L');

 $pdf->Cell(7,6,'',0,0,'L');
 $pdf->Cell(25,6,'Penguji 1',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['nama_penguji1'],0,1,'L');

 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Penguji 2',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['nama_penguji2'],0,1,'L');

 $pdf->setFont('Arial','B',12);
 $pdf->Cell(7,6,'',0,0,'L');
$pdf->Cell(25,6,'Penguji 3',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(25,6,$data['nama_penguji3'],0,1,'L');


$pdf->Output('formjadwal.pdf','I');
}
?>			