<script>
    $(document).ready(function (e) {
    $('#databrgkeluar').DataTable();
    })
</script>

<?php
    include '../koneksi.php';
    $result = mysql_query("SELECT detailnofaktur, tgldiambil, namapelanggan, alamat, namapewangi, namapaket, (detailberat*detailharga) AS subtotal, statuslaundry FROM detailcucianmasuk JOIN paket ON paket.kdpaket=detailcucianmasuk.detailkdpaket JOIN cucianmasuk ON cucianmasuk.nofaktur=detailcucianmasuk.detailnofaktur JOIN pelanggan ON cucianmasuk.kdpelanggan=pelanggan.kdpelanggan JOIN pewangi ON kdpewangi=detailkdpewangi JOIN cuciankeluar ON cuciankeluar.nofaktur=cucianmasuk.nofaktur WHERE statuslaundry='SELESAI LAUNDRY' ORDER BY detailnofaktur ASC");
    $total = mysql_num_rows($result);
?>

<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Data Barang Keluar</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<a href="beranda.php?p=inputdatacuciankeluar" class="btn btn-success btn-sm btnTambah"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
<br /><br />
<table id="databrgkeluar" class="table table-bordered tablestriped">
<thead>
    <tr>
    <th>No</th>
        <th>No Faktur</th>
        <th>Tanggal Diambil</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Nama Pewangi</th>
        <th>Nama Paket</th>
        <th>Sub Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>

<?php
    $nomor = 1;
    while ($row = mysql_fetch_assoc($result)) {
?>

<tr>
<td><?php echo $nomor ?></td>
        <td><?php echo $row['detailnofaktur'] ?></td>
        <td><?php echo $row['tgldiambil'] ?></td>
        <td><?php echo $row['namapelanggan'] ?></td>
        <td><?php echo $row['alamat'] ?></td>
        <td><?php echo $row['namapewangi'] ?></td>
        <td><?php echo $row['namapaket'] ?></td>
        <td><?php echo $row['subtotal'] ?></td>
        <td><?php echo $row['statuslaundry'] ?></td>
    <td>
    <a href="home.php?p=formeditbrgkeluar&detailnofakkeluar=<?php echo $row['detailnofakkeluar'] ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
    <a href="home.php?p=hapusbrgkeluar&detailnofakkeluar=<?php echo $row['detailnofakkeluar'] ?>" onclick="pesan = confirm('Yakin data di hapus?'); if (pesan) return true; else return false;" class="btn btn-danger btnsm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
