<?php
    include '../koneksi.php';
        if (isset($_POST['SIMPAN'])) {
            $kdbrg = $_POST['id'];
            $namabrg = $_POST['nama'];
            $satuan = $_POST['alamat'];
            $harga = $_POST['nohp'];
            $sql_tambah_brg = "INSERT INTO pelanggan VALUES('$kdbrg','$namabrg','$satuan','$harga')";
            $tambahbarang = mysql_query($sql_tambah_brg);

            if ($tambahbarang) {
            echo "<script> document.location='beranda.php?p=datapelanggan'</script>";
            } else {
            echo "Gagal Tambah Pelanggan";
            }

    } elseif (isset($_POST['SIMPANMODAL'])) {
        $kdplg = $_POST['kdplg'];
        $nmplg = $_POST['namaplg'];
        $almt = $_POST['alamatplg'];
        $hrg = $_POST['nohpplg'];
        $sql_tambah_plg = "INSERT INTO pelanggan VALUES('$kdplg','$nmplg','$almt','$hrg')";
        $tambahplg = mysql_query($sql_tambah_plg);

        if ($tambahplg) {
        echo "<script> document.location='beranda.php?p=inputdatacucianmasuk'</script>";
        } else {
        echo "Gagal Tambah Pelanggan";
        }
    }

?>