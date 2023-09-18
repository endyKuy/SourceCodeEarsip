<?php
	require_once 'koneksi.php';
	$id = $_GET['no'];
	if (isset($_GET['no']))
	{
		$del = mysqli_query($koneksi, "DELETE FROM s_out WHERE no_surat = '$id'");

		if ($del) 
		{
			echo "<script>
			alert('Data Telah Dihapus');
			window.location.href = 'index.php?page=s_out';
		</script>";
		}
		else
		{
			echo "<script>
			alert('Eror');
			window.location.href = 'index.php?page=s_out';
		</script>";
		}
	}
	else
	{
		echo "<script>
			alert('Forbidden1');
			window.location.href = 'index.php?page=s_out';
		</script>";
	}
  ?>