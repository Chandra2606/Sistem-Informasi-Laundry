<script>
 $(function () {
 $('#databarang').DataTable()
 $('#databarang').DataTable({
 'paging' : true,
 'lengthChange': false,
 'searching' : false,
 'ordering' : true,
 'info' : true,
 'autoWidth' : false
 })
 })
</script>
<div class="col-xs-12">
<div class="box">
 <div class="box-header">
 <center> <h3 class="box-title">Laporan Data Paket Pewangi</h3></center>
 </div>
 <!-- /.box-header -->
 <div class="box-body">
 <table id="judul" class="table table-bordered table-striped">
 <thead>
 <?php
 include '../koneksi.php';
 $sql_view = mysql_query("SELECT * FROM pewangi ORDER BY kdpewangi ASC");
 $total = mysql_num_rows($sql_view);
 ?>
 <button style="margin-left:5%" onClick="print_d()" class="btn btn-success btn-sm btnTambah">Cetak Laporan</button>
 <script>
function print_d(){
 window.open("data/cetaklappewangi.php","_blank");
 }
 </script>
 <br /><br />
 <table id="databarang" name="databarang" class="table table-bordered table-hover">
 <thead>
<tr>
 <th>No</th>
 <th>Kode Pewangi</th>
 <th>Nama Pewangi</th>
 <th>Stok</th>
 </tr>
 </thead>
 <tbody>
<?php
 $nomor = 1;
 while ($data = mysql_fetch_array($sql_view)) {
 ?>
 <tr>
 <td><?php echo $nomor ?></td>
 <td><?php echo $data['kdpewangi'] ?></td>
 <td><?php echo $data['namapewangi'] ?></td>
 <td><?php echo $data['stok'] ?></td>


 </tr>
 <?php
 $nomor++;}
 ?>
 </tbody>
 </table>
 </div>
 </div>
</div>
