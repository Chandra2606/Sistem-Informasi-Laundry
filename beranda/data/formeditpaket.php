<?php
    include "../koneksi.php";
?>
<?php
    $kdpaket=$_GET['kdpaket'];
    $edit="select * from paket where kdpaket='$kdpaket' ";
    $hasil=mysql_query ($edit);
    $data=mysql_fetch_array ($hasil);
?>

<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
    <div class="box-header with-border">
    <h3 class="box-title">EDIT DATA PAKET LAUNDRY</h3>
 </div>
 <!-- /.box-header -->

 <!-- form start -->
 <form class="form-horizontal form-label-left input_mask" method="POST" role="form" action="beranda.php?p=proseseditpaket">
    <div class="box-body">
    <table id="datamodaljenis" class="table table-striped responsive-utilities jambo_table" >
        <div class="form-group">
        <label class="col-sm-3 control-label">Kode paket</label>
        <div class="col-sm-6">
        <input type="text" name="kdbrg" value="<?php echo $data['kdpaket']?>" class="form-control">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-3 control-label" align="left">Nama paket</label>
        <div class="col-sm-6">
        <input type="text" name="namabrg" value="<?php echo $data['namapaket']?>" class="form-control" >
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-3 control-label" align="left">Lama Laundry</label>
        <div class="col-sm-6">
        <input type="text" name="satbrg" value="<?php echo $data['lama']?>" class="form-control" >
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-3 control-label">Harga/Kg</label>
        <div class="col-sm-6">
        <input type="text" name="hrgbrg" value="<?php echo $data['harga']?>" class="form-control" >
        </div>
        </div> 

        </table>
        </div>
        <!-- footer modal -->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary btnSimpan" name="edit" >SIMPAN</button>

        <a href="beranda.php?p=datapaket" class="btn btn-danger btn-close"><span class="glyphicon glyphiconcancel"></span>Batal</a>
        </div>
    </form>
    </div>