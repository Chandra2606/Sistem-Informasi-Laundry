<?php
    include '../koneksi.php';
        if (isset($_POST['SIMPAN'])) {
            $kdbrg = $_POST['id'];
            $namabrg = $_POST['nama'];
            $satuan = $_POST['stok'];
            $sql_tambah_brg = "INSERT INTO pewangi VALUES('$kdbrg','$namabrg','$satuan')";
            $tambahbarang = mysql_query($sql_tambah_brg);

            if ($tambahbarang) {
            echo "<script> document.location='beranda.php?p=datapewangi'</script>";
            } else {
            echo "Gagal Tambah Pewangi";
            }
    }
?>