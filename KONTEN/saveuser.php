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

		if($tipe != 'png' && $tipe != 'jpg' && $tipe != 'jpeg') 
		{
			echo "<script>
				alert('Format Tidak didukung');
				window.location.href = 'index.php?page=datauser';
			</script>";
		}
		else if($size_foto >= 10000000)
		{
			echo "<script>
				alert('File tidak boleh lebih > 10MB');
				window.location.href = 'index.php?page=datauser';
			</script>";
		}
		else
		{
			$cekuser = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'"));

			if ($cekuser > 0) {
				echo "<script>
				alert('Username sudah di gunakan, Silahkan gunakan username yang lain');
				window.location.href = 'index.php?page=datauser';
				</script>";
			}
			else
			{
			
			$sql = mysqli_query($koneksi, "INSERT INTO login VALUES ('', '$nama','$username','$hash','$level','$tgl_lhr','$no_telp','$foto')");

				if ($sql) 
				{
					move_uploaded_file($tmp_foto, "img/".$foto);
					echo "<script>
							alert('Data Berhasil Disimpan');
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
		}
?>