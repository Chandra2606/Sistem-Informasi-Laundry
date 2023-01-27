<div class="row">
 <div class="col-lg-12">
 <div class="panel panel-default">
 <div class="panel-heading">
 Laporan Data Barang Masuk Per Bulan
 </div>


 <div class="panel-body">
 <div class="row">
 <div class="col-lg-11">
 <form role="form" method="POST" action="data/cetaklapbrgmasuk.php" name="brgmasuk" id ="finput">
 <div class="box-body">
 <div class="form-group">
 <label class="col-sm-1 control-label">Bulan</label>
 <div class="col-sm-2">
 <select name="bulan">
    <option value="01">Januari</option>
    <option value="02">Februari</option>
    <option value="03">Maret</option>
    <option value="04">April</option>
    <option value="05">Mei</option>
    <option value="06">Juni</option>
    <option value="07">Juli</option>
    <option value="08">Agustus</option>
    <option value="09">September</option>
    <option value="10">Oktober</option>
    <option value="12">November</option>
    <option value="12">Desember</option>
 </select>
 </div>

 <div class="form-group">
 <label class="col-sm-1 control-label">Tahun</label>
 <div class="col-sm-1">
 <select name="tahun">

 <?php
 $mulai= date('Y') - 50;
 for($i = $mulai;$i<$mulai + 100;$i++){
 $sel = $i == date('Y') ? ' selected="selected"' : '';
 echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
 }
 ?>

 </select>
 </div>
 </div>

<div class="col-sm-2">
 <button type="submit" class="btn btndefault" name="cetak">CETAK</button>
 <a href="beranda.php" class="btn btn-default">BATAL</a></button>
 </div>
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>
 </div>
</div>
</div>
<script>
 function print_d(){
 window.open("data/lap_brg_masuk.php","_blank");
 }
 </script>
