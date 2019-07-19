<?php
// include'../koneksi.php';
include'../fpdf181/fpdf.php';

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
$pdf->Image('../dist/img/upgris-logo.png',15,8,20,24);
$pdf->setFont('arial','B',16);
$pdf->Cell(147,6,'UNIVERSITAS PGRI SEMARANG',0,1,'C');
$pdf->setFont('arial','',16);
$pdf->Cell(163,6,'FAKULTAS TEKNIK DAN INFORMATIKA',0,1,'C');

$pdf->setFont('arial','B',10);
$pdf->Cell(28,6,'',0,0,'L');
$pdf->Cell(17,6,'Kampus:',0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(2,6,'Jalan Sidodadi Timur No. 24 Semarang - Indonesia',0,1,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(28,6,'',0,0,'L');
$pdf->Cell(10,6,'Telp.',0,0,'L');
$pdf->setFont('arial','',10);
$pdf->Cell(2,6,'(024) 8316377. Faks. (024) 8448217. Email: fti@upgris.ac.id. Homepage: https://fti.upgris.ac.id',0,1,'L');
// $pdf->Cell(217,6,'Telp. (024) 8316377. Faks. (024) 8448217. Email: fti@upgris.ac.id. Homepage: https://fti.upgris.ac.id',0,1,'C');
$pdf->SetLineWidth(1);
$pdf->Line(10,36,200,36);
$pdf->Ln(6);
$pdf->setFont('Arial','B',16);
$pdf->Cell(187,6,'HASIL UJIAN SKRIPSI/TUGAS AKHIR',0,1,'C');
$pdf->Ln(2);	
// $pdf->setFont('Arial','B',8);
// $pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,1,'C');

$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'Setelah di selenggarakannya ujian Skripsi / Tugas Akhir bagi mahasiswa yang dilaksanakan pada :',0,1,'L');
$pdf->Ln(2);
$pdf->SetFont('arial','B',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'A. WAKTU, TEMPAT DAN STATUS UJIAN ',0,1,'L');

$pdf->Ln(2);
$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'Hari, Tanggal',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');

//$pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'Waktu',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');
//$pdf->Ln(2);
//$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'Tempat/Ruang',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'Status Ujian',0,0,'L');
$pdf->Cell(2,6,': Ke - 1 / ke-2 /',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');


$pdf->Ln(2);
$pdf->SetFont('arial','B',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'B. SUSUNAN TIM PENGUJI : ',0,1,'L');
$pdf->SetLineWidth(0.2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->SetFillColor(192,192,192);
$pdf->Cell(8,6,'NO',1,0,'C',1);
$pdf->Cell(40,6,'JABATAN',1,0,'C',1);
$pdf->Cell(60,6,'NAMA',1,0,'C',1);
$pdf->Cell(40,6,'NIP/NPP/NIDK',1,0,'C',1);
$pdf->Cell(30,6,'TANDA TANGAN',1,1,'C',1);

$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(256,256,256);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'1',1,0,'C',1);
$pdf->Cell(40,6,'Ketua Sidang',1,0,'L',1);
$pdf->Cell(60,6,'',1,0,'L',1);
$pdf->Cell(40,6,'',1,0,'L',1);
$pdf->Cell(30,6,'',1,1,'L',1);

$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'2',1,0,'C',1);
$pdf->Cell(40,6,'Sekretaris',1,0,'L',1);
$pdf->Cell(60,6,'',1,0,'L',1);
$pdf->Cell(40,6,'',1,0,'L',1);
$pdf->Cell(30,6,'',1,1,'L',1);

$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'3',1,0,'C',1);
$pdf->Cell(40,6,'Penguji I',1,0,'L',1);
$pdf->Cell(60,6,'',1,0,'L',1);
$pdf->Cell(40,6,'',1,0,'L',1);
$pdf->Cell(30,6,'',1,1,'L',1);

$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'4',1,0,'C',1);
$pdf->Cell(40,6,'Penguji II',1,0,'L',1);
$pdf->Cell(60,6,'',1,0,'L',1);
$pdf->Cell(40,6,'',1,0,'L',1);
$pdf->Cell(30,6,'',1,1,'L',1);

$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'5',1,0,'C',1);
$pdf->Cell(40,6,'Penguji III',1,0,'L',1);
$pdf->Cell(60,6,'',1,0,'L',1);
$pdf->Cell(40,6,'',1,0,'L',1);
$pdf->Cell(30,6,'',1,1,'L',1);

$pdf->Ln(2);
$pdf->SetFont('arial','B',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'C. IDENTITAS MAHASISWA YANG DIUJI : ',0,1,'L');
$pdf->Ln(2);

$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'Nama Mahasiswa',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'N P M',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');
//$pdf->Ln(2);
//$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'Program Studi',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');

$pdf->Ln(2);
$pdf->SetFont('arial','B',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'D. JUDUL SKRIPSI / TUGAS AKHIR : ',0,1,'L');
$pdf->Ln(4);

$pdf->SetFont('arial','B',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(70,6,'JUDUS SAYA ',0,1,'L');

$pdf->Ln(2);
$pdf->SetFont('arial','B',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(10,6,'',0,0,'L');
$pdf->Cell(70,6,'E. KEPUTUSAN SIDANG: ',0,1,'L');
$pdf->Ln(2);

$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(60,6,'Keputusan',0,0,'L');
$pdf->Cell(20,6,':1. Lulus ',0,0,'L');
$pdf->Cell(70,6,'2. Tidak Lulus',0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(60,6,'Nilai Ujian',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');
//$pdf->Ln(2);
//$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(60,6,'Perbaikan',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,'',0,1,'L');


$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(110,6,'',0,0,'L',1);
$pdf->Cell(40,6,'Semarang',0,1,'L',1);
//$pdf->SetFont('Arial','U',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(110,6,'',0,0,'L',1);
$pdf->Cell(40,6,'Ketua Sidang',0,1,'L',1);
$pdf->Ln(10);
$pdf->SetFont('Arial','U',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(110,6,'',0,0,'L',1);
$pdf->Cell(40,6,'Bambang Agus',0,1,'L',1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(110,6,'',0,0,'L',1);
$pdf->Cell(20,6,'NIP/NPP.',0,0,'L',1);
$pdf->Cell(50,6,'',0,1,'L',1);
// $pdf->SetFont('Arial','',12);
// $pdf->Cell(10,6,'',0,0,'C');
// $pdf->Cell(8,6,'',0,0,'C',1);
// $pdf->Cell(110,6,'',0,0,'L',1);
// $pdf->Cell(20,6,'NIP/NPP.',0,0,'L',1);
// $pdf->Cell(50,6,'',0,1,'L',1);



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
$pdf->Output('hasilujian.pdf','I');
?>			