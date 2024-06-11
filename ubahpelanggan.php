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
<?php
    $idPelanggan=$_GET['idPelanggan'];
    $sql=mysqli_query($koneksi,"select * from pelanggan where PelangganID='$idPelanggan'");
    while ($data = mysqli_fetch_array($sql)){
?>
<center>
    <form method="post">
        <input name="idPelanggan" type="hidden" value="<?=$data['PelangganID']?>"><br>
        <input name="nmp" type="text" value="<?=$data['NamaPelanggan']?>" required>
        <br><br>
        <input name="alamat" type="text" value="<?=$data['Alamat']?>" required>
        <br><br>
        <input name="telp" type="text" min="1" value="<?=$data['NomorTelepon']?>" required>
        <br><br>
        <button type="submit" name="ubahpelanggan">Simpan</button>
        <input type="button" onclick="history.back()" value="Kembali">
        
    </form>
</center>
<?php
}
?>
</body>
</html>