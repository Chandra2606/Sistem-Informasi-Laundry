<html>
<head>
 <title>Print Document</title>
</head>
<body>
<div class="box-header">
 <center> <h3 class="box-title">Laporan Data Barang</h3></center>
 </div>
 <table border="1" width="90%" style="border-collapse:collapse;" align="center">
 <tr class="tableheader">
    <th>No Transaksi</th>
    <th>Tanggal Masuk</th>
    <th>Nama Pemasok</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Satuan</th>
    <th>Harga Barang</th>
    <th>Jumlah</th>
    <th>Sub Total</th>
 </tr>
 <?php

// Load file koneksi.php
include "../../koneksi.php";
if (isset($_POST['cetak'])) {
 $bulan = $_POST['bulan'];
 $tahun=$_POST['tahun'];

//$query = ""; // Tampilkan semua data
$sql = mysql_query("SELECT nofakmasuk,tglmasuk,namapemasok,kdbarang,namabrg,satuan,harga,detailqty,(harga*detailqty)AS subtotal FROM barangmasuk JOIN detailmasuk ON detailnofak=nofakmasuk JOIN barang ON detailkdbrg=kdbarang JOIN pemasok ON masukkdpem=idpemasok WHERE MONTH(tglmasuk)='$bulan' AND YEAR(tglmasuk)='$tahun'"); 
// Eksekusi/Jalankan query dari variabel $query
if($sql > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
 while($data = mysql_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
 echo "<tr>";
 echo "<td>".$data['nofakmasuk']."</td>";
 echo "<td>".$data['tglmasuk']."</td>";
 echo "<td>".$data['namapemasok']."</td>";
 echo "<td>".$data['kdbarang']."</td>";
$row = mysql_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 echo "<td>".$data['namabrg']."</td>";
 echo "<td>".$data['satuan']."</td>";
 echo "<td>".$data['harga']."</td>";
 echo "<td>".$data['detailqty']."</td>";
 echo "<td>".$data['subtotal']."</td>";
 echo "</tr>";
 }
}else{ // Jika data tidak ada
 echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
<?php
}
?>
</table>
<script>
 window.load = print_d();
 function print_d(){
 window.print();
 }
 </script>
 <br />
 <br />
 <div class="box-footer">
 <h5 class="box-title" align="left">Padang,________________________
 <br />
 <br /><br />
 <br /><br />
 <br /><br />
 <br /> Rafi Chandra</h5>
 </div>