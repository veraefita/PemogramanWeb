<?php
// Jumlah total kursi di restoran
$totalKursi = 45;

// Jumlah kursi yang telah ditempati
$kursiDitempati = 28;

// Menghitung jumlah kursi yang masih kosong
$kursiKosong = $totalKursi - $kursiDitempati;

// Menghitung persentase kursi yang masih kosong
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;

// Menampilkan hasil
echo "Jumlah total kursi: {$totalKursi} <br>";
echo "Jumlah kursi yang telah ditempati: {$kursiDitempati} <br>";
echo "Jumlah kursi yang masih kosong: {$kursiKosong} <br>";
echo "Persentase kursi yang masih kosong: {$persentaseKosong}% <br>";
?>
