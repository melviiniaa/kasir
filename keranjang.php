<?php
include "function.php";
include "ceksession.php";

 if(isset($_GET['idPenjualan'])){
        $idPenjualan=$_GET['idPenjualan'];
        $pelanggan="select*from pelanggan inner join penjualan on
        pelanggan.PelangganID=penjualan.PelangganID and
        PenjualanID='$idPenjualan'";
        $tampil=mysqli_query($koneksi,$pelanggan);
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
<center>
<h1>Data Pesanan  : <?=$idPenjualan;?></h1>
<h3><?=$np;?> - <?=$alamat;?></h3>
</center>
<hr>
<br>
<center>
<a href="tambahkeranjang.php?idPenjualan=<?=$idPenjualan;?>">[ Tambah Barang ]</a>
<br><br>
<table border="1" align="center">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga Satuan</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>
    <?php
        $i=1;
        $total=0;
        $tampil="select*from detailpenjualan inner join produk inner join
        penjualan on detailpenjualan.ProdukID=produk.ProdukID and
        detailpenjualan.PenjualanID=penjualan.PenjualanID and
        detailpenjualan.PenjualanID='$idPenjualan'";
        $hasil=mysqli_query($koneksi,$tampil);
        while ($data=mysqli_fetch_array($hasil))
        {
            $idProduk=$data['ProdukID'];
            $nmp=$data['NamaProduk'];
            $harga=$data['Harga'];
            $jumlah=$data['JumlahProduk'];
            $sub=$data['Subtotal'];
            $subtotal=$harga*$jumlah;
            $total+=$subtotal;        
        ?>
        <tr>
        <td align="center"><?=$i++;?></td>
        <td><?=$nmp;?></td>
        <td>Rp <?=number_format($harga);?></td>
        <td align="center"><?=$jumlah;?></td>
        <td>Rp <?=number_format($sub);?></td>
        <td>
            <form method="post">
            <input type="hidden" name="subtotal" value="<?=$subtotal;?>">
            <input type="hidden" name="idPenjualan" value="<?=$idPenjualan;?>">
            <input type="hidden" name="idProduk" value="<?=$idProduk;?>">
            <button name="hitung">Proses</button>
	   </tr>
	<?php
	}
	?>
</table>
<br><br>
<h3>Total Harga  : <?=number_format($total);?></h3>
<input type="hidden" name="idPenjualan" value="<?=$idPenjualan;?>">
<input type="hidden" name="total" value="<?=$total;?>">
<button type="submit" name="transaksi">Proses Transaksi</button>

</center>

</body>
</html>