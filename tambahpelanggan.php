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
<h3 align="center">INPUT DATA PELANGGAN</h3>
<hr>
<br>

<center>
    <form method="post">
        <input name="nmp" type="text" placeholder="Nama Pelanggan" required>
        <br><br>
        <input name="alamat" type="text" placeholder="Alamat" required>
        <br><br>
        <input name="telp" type="text" min="1" placeholder="Telepon" required>
        <br><br>
        <button type="submit" name="tambahpelanggan">Simpan</button>
        <input type="button" onclick="history.back()" value="Kembali">
        
    </form>
</center>

</body>
</html>