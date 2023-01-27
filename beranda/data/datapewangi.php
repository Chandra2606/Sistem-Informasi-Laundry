<script>
    $(document).ready( function () {
    $('#datapewangi').DataTable();
    } );
</script>

<script>
    $(function () {
    $('#datapewangi').DataTable()
    $('#datapewangi').DataTable({
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
    <h3 class="box-title">Data Pewangi</h3>
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
 <a href="beranda.php?p=formtambahpewangi" class="btn btn-success btn-sm btnTambah"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
    <br /><br />
    <table id="datapewangi" name="datapewangi" class="table table-bordered table-hover">
 <thead>
    <tr>
        <th>No</th>
        <th>Kode pewangi</th>
        <th>Nama pewangi</th>
        <th>Stok</th>
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
    <td><?php echo $data['kdpewangi'] ?></td>
    <td><?php echo $data['namapewangi'] ?></td>
    <td><?php echo $data['stok'] ?></td>
    <td>

    <a href="beranda.php?p=formeditpewangi&kdpewangi=<?php echo $data['kdpewangi'] ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
    <a href="beranda.php?p=proseshapuspewangi&kdpewangi=<?php echo $data['kdpewangi'] ?>" onclick="pesan = confirm('Yakin data di hapus?');

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