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
<h3 align="center">DATA PELANGGAN</h3>
<hr>
<br>

<center>
<a href="tambahpelanggan.php">[ Tambah Data Pelanggan ]</a>
<br><br>
<table border="1" align="center">
   
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    
    <?php
    $i=1;
    $sql=mysqli_query($koneksi,'select * from pelanggan');
    
    while ($data=mysqli_fetch_array($sql)){
        $idPelanggan=$data['PelangganID'];
        $nmp=$data['NamaPelanggan'];
        $alamat=$data['Alamat'];
        $telp=$data['NomorTelepon'];
    ?>
     <tr>
        <td align="center"><?=$i++;?></td>
        <td><?=$nmp;?></td>
        <td><?=$alamat;?></td>
        <td><?=$telp;?></td>
        <td>
            <a href="ubahpelanggan.php?idPelanggan=<?=$idPelanggan;?>">[Ubah]</a>
            <a href="hapuspelanggan.php?idPelanggan=<?=$idPelanggan;?>">[Hapus]</a>
        </td>
        
    </tr>
    <?php
        }
    ?>
</table>
</center>

</body>
</html>