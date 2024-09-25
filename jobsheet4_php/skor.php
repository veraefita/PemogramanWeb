<?php
$poin = 550; // Ganti dengan poin yang diinginkan
$totalSkor = $poin;
$hadiahTambahan = ($totalSkor > 500) ? "YA" : "TIDAK";

echo "Total skor pemain adalah: $totalSkor<br>";
echo "Apakah pemain mendapatkan hadiah tambahan? $hadiahTambahan";
?>
