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

    $sql_tambah_brgmasuk = "INSERT INTO cucianmasuk VALUES('$nofaktur','$tglmasuk','$tglselesai', '$kdpelanggan','Laundry')";
    $tambahbrgmasuk = mysql_query($sql_tambah_brgmasuk);
    
    $sql_tambah_detail_brg = "INSERT INTO detailcucianmasuk(detailnofaktur,detailkdpaket,detailkdpewangi,detailberat,detailharga) select '$nofaktur','$kdpaket','$kdpewangi','$lama','$harga'";
    $tambahdetail_brg = mysql_query($sql_tambah_detail_brg);
    
    $update_perawat = "UPDATE pewangi set stok = stok-1 where kdpewangi='$kdpewangi'";
    $update = mysql_query($update_perawat);

    if ($tambahdetail_brg) {
        echo "<script>   document.location='beranda.php?p=datacucianmasuk'</script>";
    } else {
        echo "Gagal Input data Cucian
        ";
    }
} else {
    echo "Gagal input data Cucian";
}

?>
