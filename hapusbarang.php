<?php
include "function.php";
	$idProduk=$_GET['idProduk'];
	$hapus=mysqli_query($koneksi,"delete from produk
		where ProdukID='$idProduk'");
	if($hapus==true){
		echo "<script>alert('Data berhasil dihapus !!');
		location.href='inputbarang.php';</script>";	
	}
	else{
		echo "<script>alert('Gagal dihapus !!');
		location.href='inputbarang.php';</script>";	
	}
?>