<?php
include "function.php";
include "ceksession.php";
if(isset($_GET['idPenjualan'])){
        $idPenjualan=$_GET['idPenjualan'];
        $namapel="select*from pelanggan inner join penjualan on
        pelanggan.PelangganID=penjualan.PelangganID and
        PenjualanID='$idPenjualan'";
        $tampil=mysqli_query($koneksi,$namapel);
        $data=mysqli_fetch_array($tampil);
        $np=$data['NamaPelanggan'];
        $alamat=$data['Alamat'];
    }
    else{
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Kasir UKK 2024</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<nav>
     <ul>
     	<li><a href="index.php">Penjualan</a></li>
        <li><a href="inputbarang.php">Data Barang</a></li>
        <li><a href="pelanggan.php">Pelanggan</a></li>
        <li><a href="logout.php">Keluar</a></li>
     </ul>
</nav>

<br>
<h3 align="center">INPUT DATA PENJUALAN</h3>
<hr>
<br>

<center>
    <form method="post">
        Pilih Barang<br>
        <select name="idProduk">
        <?php
        $produk="select*from produk where ProdukID not in
        (select ProdukID from detailpenjualan where PenjualanID='$idPenjualan')";
        $hasil=mysqli_query($koneksi,$produk);
        while ($data=mysqli_fetch_array($hasil)) {
        $idProduk=$data['ProdukID'] ;     
        $nmp=$data['NamaProduk'] ;     
        $harga=$data['Harga'] ; 
        $stok=$data['Stok'] ;                                                    
        ?>
        <option value="<?=$idProduk;?>"><?=$nmp;?> - Rp <?=number_format($harga);?> - Stok <?=$stok;?></option>
        <?php
        }
        ?>
        </select>
        <br><br>
        <input type="number" name="jumlah" placeholder="Jumlah" min="1" required>
        <input type="hidden" name="idPenjualan" value="<?=$idPenjualan;?>">
        <br><br>
        <button type="submit" name="tambahkeranjang">Pilih</button>
        <input type="button" onclick="history.back()" value="Kembali">
        
    </form>
</center>

</body>
</html>