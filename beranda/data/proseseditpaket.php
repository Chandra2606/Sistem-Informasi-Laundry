<?php
    include "../koneksi.php";

    if (isset($_POST['edit'])) {
        $kdbrg = $_POST['kdbrg'];
        $namabrg = $_POST['namabrg'];
        $satbrg = $_POST['satbrg'];
        $hrgbrg = $_POST['hrgbrg'];
        $sql_update_brg = "update paket set namapaket='$namabrg',lama='$satbrg',harga='$hrgbrg' where kdpaket='$kdbrg'";
        $updatepaket = mysql_query($sql_update_brg);

    if ($updatepaket) {
    echo "<script> document.location='beranda.php?p=datapaket'</script>";
    } else {
    echo "Gagal Update Data";
    }
    }
?>