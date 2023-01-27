<?php
    include "../koneksi.php";

    if (isset($_POST['edit'])) {
        $kdbrg = $_POST['id'];
        $namabrg = $_POST['nama'];
        $stok = $_POST['stok'];
        $sql_update_brg = "update pewangi set namapewangi='$namabrg', stok='$stok' where kdpewangi='$kdbrg'";
        $updatebarang = mysql_query($sql_update_brg);

    if ($updatebarang) {
    echo "<script> document.location='beranda.php?p=datapewangi'</script>";
    } else {
    echo "Gagal Update Data";
    }
    }
?>