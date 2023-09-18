<?php
	require_once 'koneksi.php';
	$no_surat = filter_var($_POST['no_surat'], FILTER_SANITIZE_STRING);
	$jns_surat = filter_var($_POST['jns_surat'], FILTER_SANITIZE_STRING);
	$tujuan_surat = filter_var($_POST['tujuan_surat'], FILTER_SANITIZE_STRING);
	$tgl_kirim = filter_var($_POST['tgl_kirim'], FILTER_SANITIZE_STRING);
	$tgl_surat = filter_var($_POST['tgl_surat'], FILTER_SANITIZE_STRING);
	$perihal = filter_var($_POST['perihal'], FILTER_SANITIZE_STRING);

	$file = $_FILES['file']['name'];
	$tipe_file = $_FILES['file']['type'];
	$tmp_file = $_FILES['file']['tmp_name'];
	$size_file = $_FILES['file']['size'];

	$step1 = strtolower($file);
	$step2 = explode('.', $step1);
	$tipe = end($step2);

		if($tipe != 'pdf') 
		{
			echo "<script>
				alert('Format Tidak didukung');
				window.location.href = 'index.php?page=s_out';
			</script>";
		}
		else if($size_file >= 5000000)
		{
			echo "<script>
				alert('File tidak boleh lebih > 5MB');
				window.location.href = 'index.php?page=s_out';
			</script>";
		}
		else
		{
			$sql = mysqli_query($koneksi, "INSERT INTO s_out VALUES ('$no_surat','$jns_surat','$tujuan_surat','$tgl_surat','$tgl_kirim','$perihal','$file')");

			if ($sql) 
			{
				move_uploaded_file($tmp_file, "pdf/".$file);
				echo "<script>
					alert('Data Berhasil Disimpan');
					window.location.href = 'index.php?page=s_out';
					</script>";
			}
			else
			{
				echo "<script>
					alert('Data Gagal Disimpan');
					window.location.href = 'index.php?page=s_out';
					</script>";
			}
		}	
?>