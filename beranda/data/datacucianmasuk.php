<script>

    $(document).ready(function (e) {
    $('#databrgmasuk').DataTable();

    })
</script>

<?php

    include '../koneksi.php';
    $result = mysql_query("SELECT detailnofaktur, tglmasuk,tglselesai, namapelanggan, alamat, namapewangi, namapaket, lama, detailharga, detailberat, (detailberat*detailharga) AS subtotal, statuslaundry FROM detailcucianmasuk JOIN paket ON paket.kdpaket=detailcucianmasuk.detailkdpaket JOIN cucianmasuk ON cucianmasuk.nofaktur=detailcucianmasuk.detailnofaktur JOIN pelanggan ON cucianmasuk.kdpelanggan=pelanggan.kdpelanggan JOIN pewangi ON kdpewangi=detailkdpewangi WHERE statuslaundry='Laundry' ORDER BY detailnofaktur ASC");
    $total = mysql_num_rows($result);

?>
    <div class="col-xs-12">
    <div class="box">
    <div class="box-header">
    <h3 class="box-title">Data Cucian Masuk</h3>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
    <a href="beranda.php?p=inputdatacucianmasuk" class="btn btn-success btn-sm btnTambah"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
    <br /><br />
    <table id="databrgmasuk" class="table table-bordered table-striped">
    <thead>

    <tr>
        <th>No</th>
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
        <td><?php echo $row['tglmasuk'] ?></td>
        <td><?php echo $row['tglselesai'] ?></td>
        <td><?php echo $row['namapelanggan'] ?></td>
        <td><?php echo $row['alamat'] ?></td>
        <td><?php echo $row['namapewangi'] ?></td>
        <td><?php echo $row['namapaket'] ?></td>
        <td><?php echo $row['lama'] ?></td>
        <td><?php echo $row['detailharga'] ?></td>
        <td><?php echo $row['detailberat'] ?></td>
        <td><?php echo $row['subtotal'] ?></td>
        <td><?php echo $row['statuslaundry'] ?></td>
        <td>
        <a href="beranda.php?p=formeditbrgmasuk&nofakmasuk=<?php echo $row['nofakmasuk'] ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
        <a href="beranda.php?p=hapusbrgmasuk&nofakmasuk=<?php echo $row['nofakmasuk'] ?>" onclick="pesan = confirm('Yakin data di hapus?'); if (pesan) return true; else return false;" class="btn btn-danger btn- sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
 

