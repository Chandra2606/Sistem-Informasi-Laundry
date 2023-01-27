<html>
<head>
 <title>Print Document</title>
</head>
<body>
<div class="box-header">
 <center> <h3 class="box-title">FAKTUR LAUNDRY</h3></center>
 </div>
 <table border="1" width="90%" style="border-collapse:collapse;" align="center">
 <tr class="tableheader">
        <th>No Faktur</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Selesai</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Nama Pewangi</th>
        <th>Nama Paket</th>
        <th>Lama</th>
        <th>Harga/Kg</th>
        <th>Berat</th>
        <th>Sub Total</th>
 </tr>
 <?php

// Load file koneksi.php
include "../koneksi.php";
if (isset($_POST['cetak'])) {
 $bulan = $_POST['bulan'];
 $tahun=$_POST['tahun'];

//$query = ""; // Tampilkan semua data
$sql = mysql_query("SELECT detailnofaktur, tglmasuk,tglselesai, namapelanggan, alamat, namapewangi, namapaket, lama, detailharga, detailberat, (detailberat*detailharga) AS subtotal, statuslaundry FROM detailcucianmasuk JOIN paket ON paket.kdpaket=detailcucianmasuk.detailkdpaket JOIN cucianmasuk ON cucianmasuk.nofaktur=detailcucianmasuk.detailnofaktur JOIN pelanggan ON cucianmasuk.kdpelanggan=pelanggan.kdpelanggan JOIN pewangi ON kdpewangi=detailkdpewangi WHERE detailnofaktur='$nofaktur'"); 
// Eksekusi/Jalankan query dari variabel $query
if($sql > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
 while($data = mysql_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
 echo "<tr>";
 echo "<td>".$data['detailnofaktur']."</td>";
 echo "<td>".$data['tglmasuk']."</td>";
 echo "<td>".$data['tglselesai']."</td>";
 echo "<td>".$data['namapelanggan']."</td>";
$row = mysql_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 echo "<td>".$data['alamat']."</td>";
 echo "<td>".$data['namapewangi']."</td>";
 echo "<td>".$data['namapaket']."</td>";
 echo "<td>".$data['lama']."</td>";
 echo "<td>".$data['detailharga']."</td>";
 echo "<td>".$data['detailberat']."</td>";
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