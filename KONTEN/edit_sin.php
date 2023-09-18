<?php
	require_once 'koneksi.php';
	$no_surat = filter_var($_POST['no_surat'], FILTER_SANITIZE_STRING);
	$jns_surat = filter_var($_POST['jns_surat'], FILTER_SANITIZE_STRING);
	$asl_surat = filter_var($_POST['asal_surat'], FILTER_SANITIZE_STRING);
	$tgl_terima = filter_var($_POST['tgl_terima'], FILTER_SANITIZE_STRING);
	$tgl_surat = filter_var($_POST['tgl_surat'], FILTER_SANITIZE_STRING);
	$perihal = filter_var($_POST['perihal'], FILTER_SANITIZE_STRING);

	$file = $_FILES['file']['name'];
	$tipe_file = $_FILES['file']['type'];
	$tmp_file = $_FILES['file']['tmp_name'];
	$size_file = $_FILES['file']['size'];

	$step1 = strtolower($file);
	$step2 = explode('.', $step1);
	$tipe = end($step2);

	if(empty($file))
		{
			mysqli_query($koneksi, "UPDATE s_in SET jns_surat = '$jns_surat', asal_surat = '$asl_surat', tgl_surat = '$tgl_surat', tgl_terima = '$tgl_terima', perihal = '$perihal' WHERE no_surat= '$no_surat'");
			echo "<script>
			alert('Data Sudah Di Update');
			window.location.href = 'index.php?page=s_in';
			</script>";

		}
	else
	{
		$sql = mysqli_query($koneksi, "UPDATE s_in SET jns_surat = '$jns_surat', asal_surat = '$asl_surat', tgl_terima = '$tgl_terima', tgl_surat = '$tgl_surat', perihal = '$perihal', file = '$file' WHERE no_surat = '$no_surat'");
		if($sql)
		{
			move_uploaded_file($tmp_file, "pdf/".$file);
			echo "<script>
			alert('Data Sudah Di Update');
			window.location.href = 'index.php?page=s_in';
			</script>";
		}
		else 
		{
			echo "<script>
			alert('Data Gagal Disimpan');
			window.location.href = 'index.php?page=s_in';
			</script>";
		}
	}
  ?> 
