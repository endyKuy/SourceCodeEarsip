<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "arsip";

	$koneksi = mysqli_connect($host,$user,$pass,$db);

	if (mysqli_connect_errno()) {
		echo "Eror :".mysqli_connect_error();
		exit();
	}
	
  ?>  
