<?php
include "function.php";
	$idPelanggan=$_GET['idPelanggan'];
	$hapus=mysqli_query($koneksi,"delete from pelanggan
		where PelangganID='$idPelanggan'");
	if($hapus==true){
		echo "<script>alert('Data berhasil dihapus !!');
		location.href='pelanggan.php';</script>";	
	}
	else{
		echo "<script>alert('Gagal dihapus !!');
		location.href='pelanggan.php';</script>";	
	}
?>