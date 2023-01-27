<?php
include "../koneksi.php";
$kdbrg = $_GET['kdpelanggan'];
$result = mysql_query("DELETE FROM pelanggan WHERE kdpelanggan = '$kdbrg'");
if ($result){ ?>
 <script language="javascript">
 alert('Berhasil Dihapus');
 document.location.href="beranda.php?p=datapelanggan";
 </script>
<?php
}else {
 trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->error, E_USER_ERROR);
}
?>