<?php
include "../koneksi.php";
$kdbrg = $_GET['kdpewangi'];
$result = mysql_query("DELETE FROM pewangi WHERE kdpewangi = '$kdbrg'");
if ($result){ ?>
 <script language="javascript">
 alert('Berhasil Dihapus');
 document.location.href="beranda.php?p=datapewangi";
 </script>
<?php
}else {
 trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->error, E_USER_ERROR);
}
?>