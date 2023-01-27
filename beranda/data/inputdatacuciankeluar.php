<script>
    $(document).ready(function (e) {
    $('#databarang').DataTable();
    $('#datapelanggan').DataTable();
    })
</script>

<script language="javascript">
    function hitungbayar(){
        var harga=parseInt(document.brgkeluar.subtot.value);
        var jumlah=parseInt(document.brgkeluar.dibayar.value);
        var tothrg=jumlah-harga;
        document.brgkeluar.kembalian.value=tothrg;
    }
</script>

<script type="text/javascript" src="input.js"></script>

<div class="col-md-12">
<!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Input Data Cucian Keluar</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal form-label-left input_mask" method="POST" role="form" action="beranda.php?p=prosessimpancuciankeluar" name="brgkeluar" id="finput">
<div class="box-body">
<div class="form-group">
<label class="col-sm-2 control-label">No Faktur</label>
<div class="col-sm-3">
<input type="text" name="nofak" id="nofak" class="form-control" readonly>
</div>
<a class="btn btn-success btn-sm btnTambah" data-toggle="modal" data-target="#modalCarifaktur"><i class="glyphicon glyphicon-search"></i></a>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Tgl Selesai</label>
<div class="col-sm-3">
<input type="text" name="tglselesai" id="tglselesai" class="form-control" readonly>
</div>
<label class="col-sm-2 control-label">Nama Paket</label>
<div class="col-sm-3">
<input type="text" name="namapaket" id="namapaket" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Nama Pelanggan</label>
<div class="col-sm-3">
<input type="text" name="namapelanggan" id="namapelanggan" class="form-control" readonly>
</div>
<label class="col-sm-2 control-label">Harga/Kg</label>
<div class="col-sm-2">
<input type="text" name="harga" id="harga" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-3">
<input type="text" name="alamat" id="alamat" class="form-control" readonly>
</div>
<label class="col-sm-2 control-label">Berat/Kg</label>
<div class="col-sm-2">
<input type="text" name="berat" id="berat" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Nama Pewangi</label>
<div class="col-sm-3">
<input type="text" name="namapewangi" id="namapewangi" class="form-control" readonly>
</div>
<label class="col-sm-2 control-label">Sub Total</label>
<div class="col-sm-2">
<input type="text" name="subtot" id="subtot" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Dibayar</label>
<div class="col-sm-3">
<div class="bayar">
<input class="form-control form-control-lg" type="text" name="dibayar" id="dibayar" oninput="hitungbayar();">
</div>
</div>
<label class="col-sm-2 control-label" align="left">Kembalian</label>
<div class="col-sm-3">
<input type="text" name="kembalian" id="kembalian" class="form-control" readonly>
</div>
<div class="tombol">
<button type="submit" class="btn btn-warning btnSimpan" name="ok" id="ok"> <span class="glyphicon glyphicon-floppy-saved"></span> SIMPAN</button>
<a href="beranda.php?p=datacuciankeluar" class="btn btn-danger btn-close"><span class="glyphicon glyphicon-remove-circle"></span> Batal</a>
</div>
</div>

</div>

<style>
                    .tomboll{
                        margin-top: 10px;
                    }
                </style>


<!-- footer modal -->
</div>
</form>
</div>
</div>

<!-- Modal Cari faktur-->
<div id="modalCarifaktur" class="modal modal fade" role="dialog">
<div class="modal-dialog-l">
<!-- konten modal-->
<div class="modal-content">
<!-- heading modal -->
<div class="modal-header">
<button type="button" class="close" datadismiss="modal">&times;</button>
<h4 class="modal-title">Cari Data Cucian</h4>
</div>
<!-- body modal -->
<div class="modal-body">

<?php
    include '../koneksi.php';
    $result = mysql_query("SELECT detailnofaktur,tglselesai, namapelanggan, alamat, namapewangi, namapaket, detailharga, detailberat, (detailberat*detailharga) AS subtotal FROM detailcucianmasuk JOIN paket ON paket.kdpaket=detailcucianmasuk.detailkdpaket JOIN cucianmasuk ON cucianmasuk.nofaktur=detailcucianmasuk.detailnofaktur JOIN pelanggan ON cucianmasuk.kdpelanggan=pelanggan.kdpelanggan JOIN pewangi ON kdpewangi=detailkdpewangi WHERE statuslaundry='Laundry' ORDER BY detailnofaktur ASC");
    ?>
<table id="databarang" class="table table-bordered tablestriped">
<thead>
    <tr>
    <th>No</th>
        <th>No Faktur</th>
        <th>Tanggal Selesai</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Nama Pewangi</th>
        <th>Nama Paket</th>
        <th>Harga/Kg</th>
        <th>Berat</th>
        <th>Sub Total</th>
        <th>Pilih</th>
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
        <td><?php echo $row['tglselesai'] ?></td>
        <td><?php echo $row['namapelanggan'] ?></td>
        <td><?php echo $row['alamat'] ?></td>
        <td><?php echo $row['namapewangi'] ?></td>
        <td><?php echo $row['namapaket'] ?></td>
        <td><?php echo $row['detailharga'] ?></td>
        <td><?php echo $row['detailberat'] ?></td>
        <td><?php echo $row['subtotal'] ?></td>
    <td> <span class="btn btn-info btn-sm" type="button" onClick="document.getElementById('nofak').value = '<?php echo $row['detailnofaktur'] ?>'; 
                                                                  document.getElementById('tglselesai').value = '<?php echo $row['tglselesai'] ?>'; 
                                                                  document.getElementById('namapelanggan').value = '<?php echo $row['namapelanggan'] ?>'; 
                                                                  document.getElementById('alamat').value = '<?php echo $row['alamat'] ?>';
                                                                  document.getElementById('namapewangi').value = '<?php echo $row['namapewangi'] ?>';
                                                                  document.getElementById('namapaket').value = '<?php echo $row['namapaket'] ?>';
                                                                  document.getElementById('harga').value = '<?php echo $row['detailharga'] ?>';
                                                                  document.getElementById('berat').value = '<?php echo $row['detailberat'] ?>';
                                                                  document.getElementById('subtot').value = '<?php echo $row['subtotal'] ?>';

$('#modalCarifaktur').modal('hide');"></button><i class="glyphicon glyphicon-ok-sign" aria-hidden="true"></i></span>
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
<!-- footer modal -->
<div class="modal-footer">
</div>
</form>
</div>
</div>

<!-- Modal Cari Pelanggan-->
<div id="modalCariPelanggan" class="modal modal fade" role="dialog">
<div class="modal-dialog">
<!-- konten modal-->
<div class="modal-content">
<!-- heading modal -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Cari Data Pelanggan</h4>
</div>
<!-- body modal -->
<div class="modal-body">

<?php
include '../koneksi.php';
$result = mysql_query("SELECT idpelanggan,namapelanggan FROM pelanggan ORDER BY idpelanggan ASC");
?>

<table id="datapelanggan" class="table table-bordered table-striped">
<thead>
<tr>
<th>No</th>
<th>Kode Pelanggan</th>
<th>Nama Pelanggan</th>
<th>Pilih</th>
</tr>
</thead>
<tbody>

<?php
    $nomor = 1;
    while ($row = mysql_fetch_assoc($result)) {
?>

<tr>
<td><?php echo $nomor ?></td>
<td><?php echo $row['idpelanggan'] ?></td>
<td><?php echo $row['namapelanggan'] ?></td>
<td><span class="btn btn-info btn-sm" type="button" onClick="document.getElementById('kdplg').value = '<?php echo $row['idpelanggan'] ?>'; 
                                                             document.getElementById('namaplg').value = '<?php echo $row['namapelanggan'] ?>';
$('#modalCariPelanggan').modal('hide');"></button><i class="glyphicon glyphicon-ok-sign" aria- hidden="true"></i></span>
</td>
</tr>

<?php
    $nomor++;
    }
?>

</tbody>
</table>
</div>
<!-- footer modal -->
<div class="modal-footer">
</div>
</form>
</div>
</div>
