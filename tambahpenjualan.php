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


<center>
<br>
<h1>Data Pesanan</h1>
<hr>
<br>
    <form method="post">
        Pilih Pelanggan<br>
        <select name="idPelanggan">
        <?php
        $pelanggan="select*from pelanggan inner join penjualan on
        pelanggan.PelangganID=penjualan.PelangganID and
        PenjualanID='$idPenjualan'";
        $pelanggan="select*from pelanggan";
        $hasil=mysqli_query($koneksi,$pelanggan);
        while ($p=mysqli_fetch_array($hasil)) {
            $a=$p['PelangganID'] ;     
            $b=$p['NamaPelanggan'] ;     
            $c=$p['Alamat'] ;     
            $d=$p['PenjualanID'];                                     
        ?>
        <option value="<?=$a;?>">
        <?=$b?> - <?=$c?>
        </option>
        <?php
           }
        ?>                        
        </select>
        <br><br>
        <button type="submit" name="tambahpenjualan">Pilih</button>
        <input type="button" onclick="history.back()" value="Kembali">
        
    </form>
</center>

</body>
</html>