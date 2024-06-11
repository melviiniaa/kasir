<?php
include "function.php";
include "ceksession.php";
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
<h3 align="center">DATA BARANG</h3>
<hr>
<br>

<center>
<a href="tambahbarang.php">[ Tambah Data Barang ]</a>
<br><br>
<table border="1" align="center">
   
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    
    <?php
    $i=1;
    $sql=mysqli_query($koneksi,'select * from produk');
    
    while ($data=mysqli_fetch_array($sql)){
        $idProduk=$data['ProdukID'];
        $nmp=$data['NamaProduk'];
        $harga=$data['Harga'];
        $stok=$data['Stok'];
    ?>
     <tr>
        <td align="center"><?=$i++;?></td>
        <td><?=$nmp;?></td>
        <td>Rp <?=number_format($harga);?></td>
        <td><?=$stok;?></td>
        <td>
            <a href="ubahbarang.php?idProduk=<?=$idProduk;?>">[Ubah]</a>
            <a href="hapusbarang.php?idProduk=<?=$idProduk;?>">[Hapus]</a>
        </td>
        
    </tr>
    <?php
        }
    ?>
</table>
</center>

</body>
</html>