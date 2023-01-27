<?php
 include '../../koneksi.php';
 $data = mysql_query("select * from paket");
?>
<html>
<head>
 <title>Print Document</title>
</head>
<body>
<div class="box-header">
 <center> <h3 class="box-title">Laporan Paket Laundry</h3></center>
 </div>
 <table border="1" width="90%" style="border-collapse:collapse;" align="center">
 <tr class="tableheader">
 <th rowspan="1">Kode Paket</th>
 <th>Nama Paket</th>
 <th>Lama Laundry</th>
 <th>Harga</th>
 </tr>

 <?php while($hasil = mysql_fetch_array($data)){ ?>
 <tr id="rowHover">
 <td width="10%" align="center"><?php echo $hasil['kdpaket']; ?></td>
 <td width="25%" id="column_padding"><?php echo $hasil['namapaket']; ?></td>
 <td width="10%" id="column_padding"><?php echo $hasil['lama']; ?></td>
 <td width="10%" id="column_padding"><?php echo $hasil['harga']; ?></td>
 </tr>
 <?php } ?>
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
</body>
</html>