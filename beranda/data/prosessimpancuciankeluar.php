<?php

include '../koneksi.php';

if (isset($_POST['ok'])) {
    $nofaktur = $_POST['nofak'];
    $tglmasuk = $_POST['tglmasuk'];
    $tglselesai = $_POST['tglselesai'];
    $kdpelanggan = $_POST['kdpelanggan'];
	$kdpaket = $_POST['kdpaket'];
	$kdpewangi = $_POST['kdpewangi'];
	$lama = $_POST['berat'];
    $harga = $_POST['harga']; 

    $sql_tambah_brgmasuk = "INSERT INTO cuciankeluar(nofaktur,tgldiambil) select '$nofaktur',now()";
    $tambahbrgmasuk = mysql_query($sql_tambah_brgmasuk);
    
    $sql_tambah_detail_brg = "UPDATE cucianmasuk set statuslaundry='SELESAI LAUNDRY' where nofaktur='$nofaktur'";
    $tambahdetail_brg = mysql_query($sql_tambah_detail_brg);
    
    if ($tambahbrgmasuk) {
        echo "<script> document.location='beranda.php?p=datacuciankeluar'</script>";
    } else {
        echo "Gagal Input data Cucian Keluar";
    }
} else {
    echo "Gagal input data Cucian Keluar";
}

?>
