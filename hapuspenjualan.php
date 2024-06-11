<?php
include "function.php";
	$idPenjualan=$_GET['idPenjualan'];
	$hapus=mysqli_query($koneksi,"delete from penjualan
		where PenjualanID='$idPenjualan'");
	if($hapus==true){
		echo "<script>alert('Data berhasil dihapus !!');
		location.href='index.php';</script>";	
	}
	else{
		echo "<script>alert('Gagal dihapus !!');
		location.href='index.php';</script>";	
	}
?>