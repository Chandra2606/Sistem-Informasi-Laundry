<?php
    include '../koneksi.php';
        if (isset($_POST['SIMPAN'])) {
            $kdbrg = $_POST['kdpaket'];
            $namabrg = $_POST['namapaket'];
            $satuan = $_POST['lama'];
            $harga = $_POST['harga'];
            $sql_tambah_brg = "INSERT INTO paket VALUES('$kdbrg','$namabrg','$satuan','$harga')";
            $tambahbarang = mysql_query($sql_tambah_brg);

            if ($tambahbarang) {
            echo "<script> document.location='beranda.php?p=datapaket'</script>";
            } else {
            echo "Gagal Tambah Paket Laundry";
            }
    }
?>