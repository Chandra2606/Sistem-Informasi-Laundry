<?php
    include '../koneksi.php';
?>

<?php
include "../koneksi.php";
// mencari kode barang dengan nilai paling besar
$query1 = "SELECT max(kdpewangi) as maxID FROM pewangi";
$hasil = mysql_query($query1);
$data = mysql_fetch_array($hasil);
$idMax = $data['maxID'];
$NoUrut = (int) substr($idMax, 4, 3);
$NoUrut++;
$char = "PWG";
$kodepaket = $char .sprintf('%04s', $NoUrut);
?>

<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
    <div class="box-header with-border">
    <h3 class="box-title">TAMBAH DATA PEWANGI</h3>
 </div>
 <!-- /.box-header -->
 <!-- form start -->

 <form class="form-horizontal form-label-left input_mask" method="POST" role="form" action="beranda.php?p=prosestambahpewangi">
    <div class="box-body">
    <table id="datamodaljenis" class="table table-striped responsive-utilities jambo_table" >
        <div class="form-group">
        <label class="col-sm-3 control-label">Kode Pewangi</label>
        <div class="col-sm-6">
        <input type="text" name="id" class="form-control" value="<?php echo $kodepaket; ?>" readonly>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label" align="left">Nama Pewangi</label>
        <div class="col-sm-6">
        <input type="text" name="nama" class="form-control" >
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label" align="left">Stok</label>
        <div class="col-sm-6">
        <input type="text" name="stok" class="form-control" >
        </div>
        </div>
    
    </table>

    <div class="box-footer">
    <button type="submit" class="btn btn-primary btnSimpan" name="SIMPAN">SIMPAN</button>

    <a href="beranda.php?p=datapewangi" class="btn btn-danger btn-close"><span class="glyphicon glyphicon-cancel"></span> Batal</a>
 </div>
 </form>
 </div>
