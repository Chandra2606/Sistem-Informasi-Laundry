<script>
	$(document).ready(function (e) {
	$('#databarang').DataTable();
	$('#datapemasok').DataTable();
})
</script>
  
 <script language="javascript">
function hitung(){ 
	var harga=parseInt(document.barangmasuk2010039.harga.value);
	var lama=parseInt(document.barangmasuk2010039.berat.value);
	
	var tothrg=harga*lama;
	
	document.barangmasuk2010039.subtot.value=tothrg;
}  
</script>

<script type="text/javascript" src="input.js"></script>
<?php
include '../koneksi.php';
 $today = date("Ymd");
	 $query1 = "SELECT max(nofaktur) as maxID FROM cucianmasuk WHERE nofaktur LIKE '$today%'";
    $hasil = mysql_query($query1);
    $data = mysql_fetch_array($hasil);
    $idMax = $data['maxID'];
	$NoUrut = (int) substr($idMax, 8, 4);
    $NoUrut++;
	$NewID = $today .sprintf('%04s', $NoUrut);
?>

<?php

include "../koneksi.php";
// mencari kode barang dengan nilai paling besar
$query1 = "SELECT max(kdpelanggan) as maxID FROM pelanggan";
$hasil = mysql_query($query1);
$data = mysql_fetch_array($hasil);
$idMax = $data['maxID'];
$NoUrut = (int) substr($idMax, 4, 3);
$NoUrut++;
$char = "PLG";
$kodepaket = $char .sprintf('%04s', $NoUrut);
?>
	<div class="col-md-12">
	<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Input Data Barang Masuk</h3>  
			</div>
            <!-- /.box-header -->
            <!-- form start -->
			
            <form class="form-horizontal form-label-left input_mask" method="POST" role="form" action="beranda.php?p=prosessimpancucianmasuk" name="barangmasuk2010039" id="finput">
			<div class="box-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">No Faktur</label>
					<div class="col-sm-3">
					<input type="text" name="nofak" class="form-control" value="<?php echo $NewID; ?>" readonly>
					</div>
					<label class="col-sm-2 control-label">Kode Pewangi</label>
					<div class="col-sm-3">
					<input type="text" id="kdpewangi" name="kdpewangi" class="form-control" readonly>
					</div>
					<a class="btn btn-success btn-sm btnTambah" data-toggle="modal" data-target="#modalCaripewangi"><i class="glyphicon glyphicon-search"></i></a>
					</div>

					<div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Masuk</label>
					<div class="col-sm-3">
					<input type="date" name="tglmasuk" class="form-control" required>
					</div>
					<label class="col-sm-2 control-label" align="left">Nama Pewangi</label>
					<div class="col-sm-4">
					<input type="text" id="namapewangi" name="namapewangi" class="form-control" readonly >
					</div>
				</div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Selesai</label>
					<div class="col-sm-3">
					<input type="date" name="tglselesai" class="form-control" required>
					</div>
                    </div>

				<hr>
                
				<div class="form-group">
                    	<label class="col-sm-2 control-label">Kode Paket</label>
                    <div class="col-sm-2">
                		<input type="text" id="kdpaket" name="kdpaket" class="form-control" readonly >
                	</div>
                <div class="col-sm-1">
                <a class="btn btn-success btn-sm btnTambah" data-toggle="modal" data-target="#modalCaripaket"><i class="glyphicon glyphicon-search"></i></a>
                </div>
                <label class="col-sm-2 control-label" align="left">Harga/Kg</label>
                <div class="col-sm-2">
                <input type="text" id="harga" name="harga" class="form-control" readonly >
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" align="left">Nama Paket</label>
                <div class="col-sm-3">
                <input type="text" id="namapaket" name="namapaket" class="form-control" readonly >
                </div>
                <label class="col-sm-2 control-label" align="left">Lama</label>
                <div class="col-sm-1">
                <input type="text" name="lama" id="lama" class="form-control" oninput="hitung();" readonly>
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pelanggan</label>
                    <div class="col-sm-2">
                		<input type="text" id="kdpelanggan" name="kdpelanggan" class="form-control" readonly >
                	</div>
                    <div class="col-sm-1">
                <a class="btn btn-success btn-sm btnTambah" data-toggle="modal" data-target="#modalCaripelanggan"><i class="glyphicon glyphicon-search"></i></a>
                </div>
                <label class="col-sm-2 control-label" align="left">Berat/Kg</label>
                <div class="col-sm-1">
                <input type="text" name="berat" class="form-control" oninput="hitung();">
                </div>
                </div>
                </div>
                <div class="form-group">
                    <div class="namapelanggan">
                <label class="col-sm-2 control-label" align="right">Nama Pelanggan</label>
                    <div class="col-sm-2">
                		<input type="text" id="namapelanggan" name="namapelanggan" class="form-control" readonly >
                	</div>
                    </div>
                    <div class="subtotal">
                    <label class="col-sm-3 control-label" align="left">Sub Total</label>
                <div class="col-sm-2">
                <input type="text" id="subtot" name="subtot" class="form-control" readonly>
                </div>
                </div>
                <button type="submit" class="btn btn-warning btnSimpan" name="ok" id="ok"> <span class="glyphicon glyphicon-floppy-saved"></span> SIMPAN</button>
                </div>

                <div class="form-group">
                    <div class="namapelanggan">
                <label class="col-sm-2 control-label" align="right">Alamat</label>
                    <div class="col-sm-2">
                		<input type="text" id="alamat" name="alamat" class="form-control" readonly >
                	</div>
                </div>
                </div>
            
                

                <style>
                    .namapelanggan{
                        margin-left: 9px;
                    }
                    .tambahdataplg{
                        margin-left: 385px;
                        margin-top: -30px;
                    }

                    .subtotal{
                        margin-left: 28px;
                    }
                </style>
            
                

                
                
                <!-- Modal Cari paket-->
                <div id="modalCaripaket" class="modal modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Data Paket Laundry</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">


				<?php
               include '../koneksi.php';
                $result = mysql_query("select kdpaket, namapaket,lama,harga from paket");
                ?>


                <table id="barang" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Kode Paket</th>
                <th>Nama Paket</th>
                <th>Lama</th>
                <th>Harga</th>
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
                <td><?php echo $row['kdpaket'] ?></td>
                <td><?php echo $row['namapaket'] ?></td>
                <td><?php echo $row['lama'] ?></td>
                <td><?php echo $row['harga'] ?></td>
                <td>
                <span class="btn btn-info btn-sm" type="button" onClick="document.getElementById('kdpaket').value =
                '<?php echo $row['kdpaket'] ?>'; document.getElementById('namapaket').value = '<?php echo
                $row['namapaket'] ?>'; document.getElementById('lama').value = '<?php echo
                $row['lama'] ?>'; document.getElementById('harga').value = '<?php echo
                $row['harga'] ?>'; $('#modalCaripaket').modal('hide');"></button><i class="glyphicon glyphicon-ok-sign" aria-hidden="true"></i></span>
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

                <!-- Modal Cari Pewangi-->
                <div id="modalCaripewangi" class="modal modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Data Pewangi</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">


				<?php
               include '../koneksi.php';
                $result = mysql_query("select kdpewangi, namapewangi from pewangi");
                ?>


                <table id="barang" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Kode Pewangi</th>
                <th>Nama Pewangi</th>
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
                <td><?php echo $row['kdpewangi'] ?></td>
                <td><?php echo $row['namapewangi'] ?></td>
                <td>
                <span class="btn btn-info btn-sm" type="button" onClick="document.getElementById('kdpewangi').value =
                '<?php echo $row['kdpewangi'] ?>'; document.getElementById('namapewangi').value = '<?php echo
                $row['namapewangi'] ?>'; $('#modalCaripewangi').modal('hide');"></button><i class="glyphicon glyphicon-ok-sign" aria-hidden="true"></i></span>
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

<!-- modal insert -->
<div class="example-modal">
  <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Registrasi User Baru</h3>
        </div>
        <div class="modal-body">
          <form action="beranda.php?p=prosestambahpelanggan" method="post" role="form">
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Kode Pelanggan</label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="kdplg" value="<?php echo $kodepaket; ?>" readonly></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Nama Pelanggan</label>
              <div class="col-sm-8"><input type="text" class="form-control" name="namaplg"value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Alamat</label>
              <div class="col-sm-8"><input type="text" class="form-control" name="alamatplg"value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Nohp</label>
              <div class="col-sm-8"><input type="text" class="form-control" name="nohpplg"value=""></div>
              </div>
            </div>
            <div class="modal-footer">
              <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btnSimpan" name="SIMPANMODAL">SIMPAN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><!-- modal insert close -->


<!-- Modal Cari Pemasok-->
<div id="modalCaripelanggan" class="modal modal fade" role="dialog">
<div class="modal-dialog">
<!-- konten modal-->
<div class="modal-content">
<!-- heading modal -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Cari Data Pelanggan</h4>
<div class="tambahdataplg">
<a data-toggle="modal" data-target="#tambahuser" class="btn btn-success btn-sm btnTambah" align="left" onClick="$('#modalCaripelanggan').modal('hide');"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Pelanggan</a>
</div>
</div>
<!-- body modal -->
<div class="modal-body">


<?php
include '../koneksi.php';
$result = mysql_query("SELECT kdpelanggan, namapelanggan, alamat FROM pelanggan ORDER BY kdpelanggan ASC");
?>
<table id="datapemasok" class="table table-bordered table-striped">
<thead>
<tr>
<th>No</th>
<th>Kode Pelanggan</th>
<th>Nama Pelanggan</th>
<th>Alamat</th>
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
<td><?php echo $row['kdpelanggan'] ?></td>
<td><?php echo $row['namapelanggan'] ?></td>
<td><?php echo $row['alamat'] ?></td>


<td><span class="btn btn-info btn-sm" type="button" onClick="document.getElementById('kdpelanggan').value = '<?php echo $row['kdpelanggan'] ?>'; document.getElementById('namapelanggan').value = '<?php echo
$row['namapelanggan'] ?>'; document.getElementById('alamat').value = '<?php echo
$row['alamat'] ?>';$('#modalCaripelanggan').modal('hide');"></button><i class="glyphicon glyphicon-ok-sign" aria- hidden="true"></i></span>
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