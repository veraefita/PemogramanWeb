<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$totalNilai = 0;


foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 92 || $nilai <= 70) {
        continue;
    }
    $totalNilai += $nilai;
    $avg = $totalNilai / count($nilaiSiswa);
}
echo "Rata-rata nilai:$avg<br>";
?>
