<?php
$totalPembelian = 106000;
$hargaProduk = 120000;
$diskon = 0.2;

if ($totalPembelian > 100000){
    $hargaDiskon = $hargaProduk - ($hargaProduk * $diskon);
    echo "Harga setelah diskon: $hargaDiskon";
} else { 
    echo "Harga Normal: $hargaProduk";
}
?>