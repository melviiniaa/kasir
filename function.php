<?php
session_start();
$koneksi=mysqli_connect("localhost","root","","db_ukkrpl");

//login
if(isset($_POST['login'])){
	$user=$_POST['username'];
	$pwd=$_POST['password'];
	$sql=mysqli_query($koneksi,"select * from user where
		username='$user' and password='$pwd'");
	$login=mysqli_num_rows($sql);
	if($login>0){
		$_SESSION['login'] = true;
		echo "<script>alert('Selamat Datang !!');
		location.href='index.php';</script>";	
	}
	else{
	echo "<script>alert('Username atau Password Salah !!');
	location.href='login.php';</script>";
	}
}

if (isset($_POST['tambahbarang'])){
	$nmp=$_POST['nmp'];
	$harga=$_POST['harga'];
	$stok=$_POST['stok'];
	$tambah=mysqli_query($koneksi,"insert into produk
		(NamaProduk,Harga,Stok) values ('$nmp','$harga','$stok')");
	if($tambah){
		echo "<script>alert('Data Tersimpan !!');
		location.href='inputbarang.php';</script>";	
	}
	else{
		echo "<script>alert('Gagal Menyimpan !!');
		location.href='tambahbarang.php';</script>";	
	}
}

if (isset($_POST['ubahbarang'])){
	$idProduk=$_POST['idProduk'];
	$nmp=$_POST['nmp'];
	$harga=$_POST['harga'];
	$stok=$_POST['stok'];
	$ubah=mysqli_query($koneksi,"update produk set
		NamaProduk='$nmp',
		Harga='$harga',
		Stok='$stok' where ProdukID='$idProduk'");
	if($ubah){
		echo "<script>alert('Data berhasil diubah !!');
		location.href='inputbarang.php';</script>";	
	}
	else{
		echo "<script>alert('Gagal diubah !!');
		location.href='inputbarang.php';</script>";	
	}
}

if (isset($_POST['tambahpelanggan'])){
	$nmp=addslashes($_POST['nmp']);
	$alamat=$_POST['alamat'];
	$telp=$_POST['telp'];
	$tambah=mysqli_query($koneksi,"insert into pelanggan
		(NamaPelanggan,Alamat,NomorTelepon) values ('$nmp','$alamat','$telp')");
	if($tambah){
		echo "<script>alert('Data Tersimpan !!');
		location.href='pelanggan.php';</script>";	
	}
	else{
		echo "<script>alert('Gagal Menyimpan !!');
		location.href='tambahpelanggan.php';</script>";	
	}
}

if (isset($_POST['ubahpelanggan'])){
	$idPelanggan=$_POST['idPelanggan'];
	$nmp=$_POST['nmp'];
	$alamat=$_POST['alamat'];
	$telp=$_POST['telp'];
	$ubah=mysqli_query($koneksi,"update pelanggan set
		NamaPelanggan='$nmp',
		Alamat='$alamat',
		NomorTelepon='$telp' where PelangganID='$idPelanggan'");
	if($ubah){
		echo "<script>alert('Data berhasil diubah !!');
		location.href='pelanggan.php';</script>";	
	}
	else{
		echo "<script>alert('Gagal diubah !!');
		location.href='ubahpelanggan.php';</script>";	
	}
}

if(isset($_POST['tambahpenjualan'])){

	$idPelanggan = $_POST['idPelanggan'];
	$penjualan="insert into penjualan (PelangganID) values ('$idPelanggan')";
	$tambah=mysqli_query($koneksi,$penjualan);
	if ($tambah){
		echo "<script>alert('Berhasil Disimpan !!');location.href='index.php';</script>";
	}
	else{
		echo "<script>alert('Gagal Memilih Pelanggan !!');location.href='index.php';</script>";
	}
}


if(isset($_POST['tambahkeranjang'])){
	$idPenjualan = $_POST['idPenjualan'];
	$idProduk = $_POST['idProduk'];
	$jumlah = $_POST['jumlah'];
	
	$produk="Select*from produk where ProdukID='$idProduk'";
	$h1=mysqli_query($koneksi,$produk);
	$h2=mysqli_fetch_array($h1);
	$stokbaru=$h2['Stok'];

	if($stokbaru>=$jumlah){
		$selisih=$stokbaru-$jumlah;

		$keranjang="insert into detailpenjualan (PenjualanID,ProdukID,JumlahProduk) values ('$idPenjualan','$idProduk','$jumlah')";
		$update="update produk set Stok='$selisih' where ProdukID='$idProduk'";

		$tambah=mysqli_query($koneksi,$keranjang);
		$ubah=mysqli_query($koneksi,$update);

		if ($tambah&&$ubah){
		echo "<script>alert('Berhasil menambah barang !!');location.href='keranjang.php?idPenjualan=".$idPenjualan."';</script>";
			//echo "berhasil";
		}
		else{
		echo "<script>alert('Gagal Menambah Pesanan !!');location.href='keranjang.php?idPenjualan=".$idPenjualan."';</script>";
			//echo "gagal";
		}
	}
	else{
		echo '
		<script>alert("Stok tidak cukup !!");
		location.href="keranjang.php?idPenjualan='.$idPenjualan.'"</script>
		';
	}		
}

if(isset($_POST['hitung'])){
	$sub=$_POST['subtotal'];
	$idProduk=$_POST['idProduk'];
	$idPenjualan=$_POST['idPenjualan'];
		$updatesub="update detailpenjualan set Subtotal='$sub' where ProdukID='$idProduk'
		and PenjualanID='$idPenjualan'";
		$subtotal=mysqli_query($koneksi,$updatesub);

		if ($subtotal){
		header('location.href=keranjang.php?idPenjualan='.$idPenjualan);
		}
		else{
		echo "<script>alert('Gagal Menambah Pesanan !!');location.href='keranjang.php?idPenjualan=".$idPenjualan."';</script>";
		}		
}

if(isset($_POST['transaksi'])){	
	$idPenjualan=$_POST['idPenjualan'];
	$total=$_POST['total'];
	$totalharga="update penjualan set TotalHarga='$total' where PenjualanID='$idPenjualan'";
	$update=mysqli_query($koneksi,$totalharga);
	if ($update){
		echo "<script>alert('Transaksi Berhasil !!');location.href='cetak.php?idPenjualan=".$idPenjualan."';</script>";
		}
		else{
		echo "<script>alert('Transaksi Gagal !!');location.href='index.php';</script>";
	}
}


?>

