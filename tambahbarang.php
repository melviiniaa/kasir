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
<h3 align="center">INPUT DATA BARANG</h3>
<hr>
<br>

<center>
    <form method="post">
        <input name="nmp" type="text" placeholder="Nama Produk" required>
        <br><br>
        <input name="harga" type="text" placeholder="Harga" required>
        <br><br>
        <input name="stok" type="number" min="1" placeholder="Stok" required>
        <br><br>
        <button type="submit" name="tambahbarang">Simpan</button>
        <input type="button" onclick="history.back()" value="Kembali">
        
    </form>
</center>

</body>
</html>