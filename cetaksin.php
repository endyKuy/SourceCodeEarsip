<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
include 'koneksi.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Image('fpdf/img/Logo.jpg',20,12,22,22);
$pdf->Cell(275,10,'PEMERINTAH NEGERI SULI',0,0,'C');
$pdf->Cell(12,8,'',0,1);
$pdf->Cell(275,10,'KECAMATAN SALAHUTU',0,0,'C');
$pdf->Cell(12,8,'',0,1);
$pdf->Cell(275,10,'KABUPATEN MALUKU TENGAH',0,0,'C');
$pdf->Cell(12,5,'',0,1);
$pdf->SetLineWidth(1);
$pdf->Line(10,38,287.5,38);
$pdf->SetLineWidth(0);
$pdf->Line(10,39,287,39);

$pdf->Cell(12,12,'',0,1);
if (isset($_POST['cetak'])) {
    $tgl_awl = mysqli_real_escape_string($koneksi, $_POST['tgl_awl']);
    $tgl_akhir = mysqli_real_escape_string($koneksi, $_POST['tgl_akhir']);
$pdf->Cell(146,10,'Agenda Surat Masuk Dari Tanggal : ' ,0,0,'R');
$pdf->Cell(20,10, $tgl_awl,0,0,'C');
$pdf->Cell(13,10,'s/d ' ,0,0,'C');
$pdf->Cell(17,10, $tgl_akhir,0,0,'C');
}

$pdf->Cell(12,12,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(8.5,10,'NO',1,0,'C');
$pdf->Cell(50,10,'NO SURAT' ,1,0,'C');
$pdf->Cell(25,10,'JENIS SURAT',1,0,'C');
$pdf->Cell(60,10,'ASAL SURAT',1,0,'C');
$pdf->Cell(25,10,'TGL. SURAT',1,0,'C');
$pdf->Cell(25,10,'TGL. TERIMA',1,0,'C');
$pdf->Cell(84,10,'PERIHAL',1,0,'C');

$pdf->Cell(10,10.3,'',0,1);
$pdf->SetFont('Times','',10);
if (isset($_POST['cetak'])) {
    $tgl_awl = mysqli_real_escape_string($koneksi, $_POST['tgl_awl']);
    $tgl_akhir = mysqli_real_escape_string($koneksi, $_POST['tgl_akhir']);
    $sql = mysqli_query($koneksi, "SELECT * FROM s_in WHERE tgl_terima BETWEEN '$tgl_awl' AND '$tgl_akhir' ");
	$no=0;
	$no++;
}
else{
    $sql = mysqli_query($koneksi, "SELECT * FROM s_in");
}
    $no = 0;
    while ($d = mysqli_fetch_array($sql)) 
{
    $no++;
  $pdf->Cell(8.5,6, $no,1,0,'C');
  $pdf->Cell(50,6, $d['no_surat'],1,0,'C');
  $pdf->Cell(25,6, $d['jns_surat'],1,0,'C');  
  $pdf->Cell(60,6, $d['asal_surat'],1,0,'C');
  $pdf->Cell(25,6, $d['tgl_surat'],1,0,'C');
  $pdf->Cell(25,6, $d['tgl_terima'],1,0,'C');
    $pdf->Cell(84,6, $d['perihal'],1,1,'C');
}

$pdf->Output();
 
?>