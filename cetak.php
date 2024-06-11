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
        $tanggal=$data['TanggalPenjualan'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Kasir UKK 2024</title>
	
</head>

<body>

<br>
<center>
<h2>RekaLuNa Mart</h2>
<hr>
ID Transaksi : <?=$idPenjualan;?>
<br>
<?=$tanggal;?>
<br>
Pelanggan : <?=$np;?> - <?=$alamat;?>
<hr>
</center>
<br>
<center>
<table align="center">
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
        <td><?=$nmp;?></td>
        <td></td>
        <td><?=number_format($harga);?></td>
        <td></td>
        <td>x</td>
        <td></td>
        <td align="center"><?=$jumlah;?></td>
        <td></td>
        <td><?=number_format($sub);?></td>  
	   </tr>
	<?php
	}
	?>
</table>
<h3 class="mt-4">Total : Rp <?=number_format($total);?></h3>
<input type="hidden" name="idPenjualan" value="<?=$idPenjualan;?>">
<input type="hidden" name="total" value="<?=$total;?>">
<a href="index.php">by : rekalunamart</a>
<hr>

</center>

</body>
</html>
<script>window.print();</script>