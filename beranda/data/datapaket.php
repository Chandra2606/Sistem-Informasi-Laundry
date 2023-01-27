<script>
    $(document).ready( function () {
    $('#datapaket').DataTable();
    } );
</script>

<script>
    $(function () {
    $('#datapaket').DataTable()
    $('#datapaket').DataTable({
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
    <h3 class="box-title">Data Paket Laundry</h3>
 </div>
 <!-- /.box-header -->
    <div class="box-body">
        <table id="judul" class="table table-bordered table-striped">
        <thead>
 <?php
    include '../koneksi.php';
    $sql_view = mysql_query("SELECT * FROM paket ORDER BY kdpaket ASC");
    $total = mysql_num_rows($sql_view);
 ?>
 <a href="beranda.php?p=formtambahpaket" class="btn btn-success btn-sm btnTambah"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
    <br /><br />
    <table id="datapaket" name="datapaket" class="table table-bordered table-hover">
 <thead>
    <tr class="bg-warning">
        <th>No</th>
        <th>Kode paket</th>
        <th>Nama paket</th>
        <th>Lama Laundry</th>
        <th>Harga/Kg</th>
        <th>Aksi</th>
    </tr>
 </thead>
 <tbody>

    <?php
        $nomor = 1;
        while ($data = mysql_fetch_array($sql_view)) {
    ?>
 <tr>
    <td><?php echo $nomor ?></td>
    <td><?php echo $data['kdpaket'] ?></td>
    <td><?php echo $data['namapaket'] ?></td>
    <td><?php echo $data['lama'] ?></td>
    <td><?php echo $data['harga'] ?></td>
    <td>

    <a href="beranda.php?p=formeditpaket&kdpaket=<?php echo $data['kdpaket'] ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
    <a href="beranda.php?p=proseshapuspaket&kdpaket=<?php echo $data['kdpaket'] ?>" onclick="pesan = confirm('Yakin data di hapus?');

    if (pesan) return true; else return false;" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    </td>
 </tr>
 <?php
 $nomor++;
    }
 ?>
 </tbody>
 </table>
 </div>
 </div>
</div>