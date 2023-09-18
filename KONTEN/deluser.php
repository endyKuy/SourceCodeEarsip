<?php
	require_once 'koneksi.php';
	$id = $_GET['id'];
	if (isset($_GET['id']))
	{
		$del = mysqli_query($koneksi, "DELETE FROM login WHERE id = '$id'");

		if ($del) 
		{
			echo "<script>
			alert('Data Telah Dihapus');
			window.location.href = 'index.php?page=datauser';
		</script>";
		}
		else
		{
			echo "<script>
			alert('Eror');
			window.location.href = 'index.php?page=datauser';
		</script>";
		}
	}
	else
	{
		echo "<script>
			alert('Forbidden1');
			window.location.href = 'index.php?page=datauser';
		</script>";
	}
  ?>