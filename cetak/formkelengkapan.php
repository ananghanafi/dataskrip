<?php
// include'../koneksi.php';
session_start();
if($_SESSION['status'] !="login"){
header("location:index.php");
}
include "../connection.php";
include'../fpdf181/fpdf.php';

$id = $_GET['id'];
$query ="SELECT u.npm, u.nama, u.judul, u.tanggal,
	k.hardcopy_poster as berkas1, 
	k.manual_book as berkas2, 
	k.softcopy_skripsi as berkas3, 
	k.softcopy_artikel as berkas4, 
	k.softcopy_poster as berkas5, 
	k.sumbangan_buku as berkas6, 
	k.sertifikat_toefl as berkas7, 
	k.cd_skripsi as berkas8 
    FROM tb_ujian_skripsi as u
    INNER JOIN tb_kelengkapan as k ON k.npm = u.npm      
    WHERE u.npm='".$id."'";

$result = mysqli_query($conn,$query);

while($data = mysqli_fetch_array($result)){
$data['berkas1'] = ($data['berkas1']==1) ? chr(52) : chr(32) ;
$data['berkas2'] = ($data['berkas2']==1) ? chr(52) : chr(32) ;
$data['berkas3'] = ($data['berkas3']==1) ? chr(52) : chr(32) ;
$data['berkas4'] = ($data['berkas4']==1) ? chr(52) : chr(32) ;
$data['berkas5'] = ($data['berkas5']==1) ? chr(52) : chr(32) ;
$data['berkas6'] = ($data['berkas6']==1) ? chr(52) : chr(32) ;
$data['berkas7'] = ($data['berkas7']==1) ? chr(52) : chr(32) ;
$data['berkas8'] = ($data['berkas8']==1) ? chr(52) : chr(32) ;

$tgl = explode(", ", $data['tanggal']);
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


// $tgl=date('Y/m/d');
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
$pdf->Ln(10);
$pdf->setFont('Arial','B',16);
$pdf->Cell(8,6,'',0,0,'L');
$pdf->Cell(187,6,'KELENGKAPAN DOKUMENTASI SKRIPSI',0,1,'L');
$pdf->Cell(8,6,'',0,0,'L');
$pdf->Cell(187,6,'PROGRAM STUDI INFORMATIKA',0,1,'L');
$pdf->Cell(8,6,'',0,0,'L');
$pdf->Cell(187,6,'UNIVERSITAS PGRI SEMARANG',0,1,'L');
$pdf->Ln(20);
$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(11,6,'',0,0,'L');
$pdf->Cell(20,6,'Nama',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['nama'],0,1,'L');
// $pdf->Ln(2);
//$pdf->SetFont('arial','',11);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(11,6,'',0,0,'L');
$pdf->Cell(20,6,'NPM',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(70,6,$data['npm'],0,0,'L');
$pdf->Cell(25,6,'TGL UJIAN',0,0,'L');
$pdf->Cell(2,6,':',0,0,'L');
$pdf->Cell(20,6,$tgl[1],0,1,'L');
//$pdf->Ln(2);
//$pdf->SetFont('arial','',12);
 //$pdf->SetFillColor(256,256,256);
 $pdf->Cell(11,6,'',0,0,'L');
$pdf->Cell(20,6,'Judul',0,0,'L');
$pdf->Cell(2,6,':',0,1,'L');
 $pdf->Cell(11,6,'',0,0,'L');
$pdf->MultiCell(160,6,$data['judul'],0,'L',false);
$pdf->Ln(10);

$rowNum = $pdf->NbLines(160,$data['judul']);
$titleHeight = $rowNum*6;
$pdf->Rect(19,56,180,168+$titleHeight,'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(153,7,'Poster Cetak + Frame (Tanpa Kaca) ukuran A3',0,0,'L');
$pdf->SetFont('ZapfDingbats','',13);
$pdf->Cell(2,7,$data['berkas1'],0,1,'L');
$pdf->RoundedRect(185, 98, 7, 6,  2, 'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(153,7,'Manual Book Produk/Software (Jika Skripsi Menghasilkan Produk/Software)',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(2,7,$data['berkas2'],0,1,'L');
$pdf->RoundedRect(185, 105, 7, 6,  2, 'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(153,7,'Upload Soft Copy Skripsi',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(2,7,$data['berkas3'],0,1,'L');
$pdf->RoundedRect(185, 112, 7, 6,  2, 'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(153,7,'Upload Soft Copy Artikel',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(2,7,$data['berkas4'],0,1,'L');
$pdf->RoundedRect(185, 119, 7, 6,  2, 'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(153,7,'Upload Soft Copy Poster',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(2,7,$data['berkas5'],0,1,'L');
$pdf->RoundedRect(185, 126, 7, 6,  2, 'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(153,7,'Sumbangan Buku IT 2 Judul (Terbitan 2012 ke atas dan Minimal 250 Halaman)',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(2,7,$data['berkas6'],0,1,'L');
$pdf->RoundedRect(185, 133, 7, 6,  2, 'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(153,7,'Sertifikat Test TOEFL',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(2,7,$data['berkas7'],0,1,'L');
$pdf->RoundedRect(185, 140, 7, 6,  2, 'D');

$pdf->Cell(16,7,'',0,0,'L');
$pdf->SetFont('ZapfDingbats','',12);
$pdf->Cell(7,7,chr(226),0,0,'L');
$pdf->SetFont('arial','',12);
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->MultiCell(153,7,'CD Dengan Isi Skripsi(.pdf), Artikel(.pdf), Poster(.jpg) dan File Produk/ Software Aplikasi',0,'L',false);
$pdf->SetFont('ZapfDingbats','',12);
$pdf->SetXY($x + 153, $y);
$pdf->Cell(2,7,$data['berkas8'],0,1,'L');
$pdf->RoundedRect(185, 147, 7, 6,  2, 'D');
$pdf->Ln(10);

 $pdf->Cell(11,6,'',0,0,'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(66,6,'Alamat Email Pengiriman/ Upload: ',0,0,'L');
$pdf->SetTextColor(0,0,192);
$pdf->SetFont('Arial','U',12);
$pdf->Cell(50,6,'skripsiinformatikaupgris@gmail.com',0,0,'L');
// $pdf->Cell(70,6,$data['judul'],0,1,'L');	
// $pdf->setFont('Arial','B',8);
// $pdf->Cell(187,4,'Tanggal Cetak '.$tgl,0,1,'C');
// $pdf->SetFont('arial','B',12);
//  //$pdf->SetFillColor(256,256,256);
//  $pdf->Cell(20,6,'',0,0,'L');
// $pdf->Cell(70,6,'JUDUL SAYA ',0,1,'L');


$pdf->Ln(20);
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(256,256,256);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(95,6,'',0,0,'L',1);
$pdf->Cell(40,6,'Mengetahui',0,1,'L',1);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(95,6,'',0,0,'L',1);
$pdf->Cell(40,6,'Ka. Prodi Informatika',0,1,'L',1);
$pdf->Ln(20);
$pdf->Cell(10,6,'',0,0,'C');
$pdf->Cell(8,6,'',0,0,'C',1);
$pdf->Cell(95,6,'',0,0,'L',1);
$pdf->Cell(50,6,'Febrian Murti Dewanto, SE, M. Kom',0,1,'L',1);

$pdf->Output('formkelengkapan.pdf','I');
}
?>			