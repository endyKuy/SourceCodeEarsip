<?php
	require_once 'koneksi.php';
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$level = filter_var($_POST['level'], FILTER_SANITIZE_STRING);
	$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
	$tgl_lhr = filter_var($_POST['tgl_lhr'], FILTER_SANITIZE_STRING);
	$no_telp = filter_var($_POST['no_telp'], FILTER_SANITIZE_STRING);

	$hash = password_hash($password, PASSWORD_DEFAULT);

	$foto = $_FILES['foto']['name'];
	$tipe_foto = $_FILES['foto']['type'];
	$tmp_foto = $_FILES['foto']['tmp_name'];
	$size_foto = $_FILES['foto']['size'];

	$step1 = strtolower($foto);
	$step2 = explode('.', $step1);
	$tipe = end($step2);

	if(empty($foto))
		{
			mysqli_query($koneksi, "UPDATE login SET nama = '$nama', password = '$hash', level = '$level', tgl_lhr = '$tgl_lhr', no_telp = '$no_telp' WHERE username = '$username'");
			echo "<script>
			alert('Data Sudah Di Update');
			window.location.href = 'index.php?page=datauser';
			</script>";

		}
	else
	{
		$sql = mysqli_query($koneksi, "UPDATE login SET nama = '$nama', password = '$password', level = '$level', tgl_lhr = '$tgl_lhr', no_telp = '$no_telp', foto = '$foto' WHERE username = '$username'");
		if($sql)
		{
			move_uploaded_file($tmp_foto, "pdf/".$foto);
			echo "<script>
			alert('Data Sudah Di Update');
			window.location.href = 'index.php?page=datauser';
			</script>";
		}
		else 
		{
			echo "<script>
			alert('Data Gagal Disimpan');
			window.location.href = 'index.php?page=datauser';
			</script>";
		}
	}
  ?> 
