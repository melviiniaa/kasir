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
<h3 align="center">DATA PENJUALAN</h3>
<hr>
<br>
<center>
<a href="tambahpenjualan.php">[ Tambah Penjualan ]</a>
<br><br>
<table border="1" align="center">
    <tr>
        <th>No</th>
        <th>ID Penjualan</th>
        <th>Tanggal</th>
        <th>Nama Pelanggan</th>
        <th>Total Harga</th>
        <th>Aksi</th>
    </tr>
    <?php
    $i=1;
	$tampil="select*from penjualan inner join pelanggan 
    on penjualan.PelangganID=pelanggan.PelangganID";
	$hasil=mysqli_query($koneksi,$tampil);
    while ($data=mysqli_fetch_array($hasil))
	{
		$idPenjualan=$data['PenjualanID'];
		$tanggal=$data['TanggalPenjualan'];
		$nmp=$data['NamaPelanggan'];
		$alamat=$data['Alamat'];
		$total=$data['TotalHarga'];
		$hitung="select*from detailpenjualan where
		PenjualanID='$idPenjualan'";
     ?>
	<tr>
		<td align="center"><?=$i++;?></td>
		<td><?=$idPenjualan;?></td>
		<td><?=$tanggal;?></td>
		<td><?=$nmp?> - <?=$alamat?></td>
		<td>Rp <?=number_format($total);?></td>
		<td>
			<a href="keranjang.php?idPenjualan=<?=$idPenjualan;?>">[Lihat Keranjang]</a>
            <a href="hapuspenjualan.php?idPenjualan=<?=$idPenjualan;?>">[Hapus]</a>
		</td>
	</tr>
	<?php
	}
	?>

</table>
</center>

</body>
</html>