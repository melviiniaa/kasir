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
<h3 align="center">UBAH DATA BARANG</h3>
<hr>
<br>
<?php
    $idProduk=$_GET['idProduk'];
    $sql=mysqli_query($koneksi,"select * from produk where ProdukID='$idProduk'");
    while ($data = mysqli_fetch_array($sql)){
?>
<center>
    <form method="post">
        <input name="idProduk" type="hidden" value="<?=$data['ProdukID']?>"><br>
        <input name="nmp" type="text" value="<?=$data['NamaProduk']?>" required>
        <br><br>
        <input name="harga" type="text" value="<?=$data['Harga']?>" required>
        <br><br>
        <input name="stok" type="number" min="1" value="<?=$data['Stok']?>" required>
        <br><br>
        <button type="submit" name="ubahbarang">Simpan</button>
        <input type="button" onclick="history.back()" value="Kembali">
        
    </form>
</center>
<?php
}
?>
</body>
</html>