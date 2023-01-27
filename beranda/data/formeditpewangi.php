<?php
    include "../koneksi.php";
?>
<?php
    $kdpewangi=$_GET['kdpewangi'];
    $edit="select * from pewangi where kdpewangi='$kdpewangi' ";
    $hasil=mysql_query ($edit);
    $data=mysql_fetch_array ($hasil);
?>

<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
    <div class="box-header with-border">
    <h3 class="box-title">EDIT DATA PEWANGI</h3>
 </div>
 <!-- /.box-header -->

 <!-- form start -->
 <form class="form-horizontal form-label-left input_mask" method="POST" role="form" action="beranda.php?p=proseseditpewangi">
    <div class="box-body">
    <table id="datamodaljenis" class="table table-striped responsive-utilities jambo_table" >
        <div class="form-group">
        <label class="col-sm-3 control-label">Kode pewangi</label>
        <div class="col-sm-6">
        <input type="text" name="id" value="<?php echo $data['kdpewangi']?>" class="form-control" readonly>
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-3 control-label" align="left">Nama pewangi</label>
        <div class="col-sm-6">
        <input type="text" name="nama" value="<?php echo $data['namapewangi']?>" class="form-control" >
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-3 control-label" align="left">Stok</label>
        <div class="col-sm-6">
        <input type="text" name="stok" value="<?php echo $data['stok']?>" class="form-control" >
        </div>
        </div>

        </table>
        </div>
        <!-- footer modal -->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary btnSimpan" name="edit" >SIMPAN</button>

        <a href="beranda.php?p=datapewangi" class="btn btn-danger btn-close"><span class="glyphicon glyphiconcancel"></span>Batal</a>
        </div>
    </form>
    </div>