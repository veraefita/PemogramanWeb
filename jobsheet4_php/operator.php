<?php
$a = 10;  // Menggunakan integer (true)
$b = 5;   // Menggunakan integer (true)

// Menampilkan nilai awal
echo "Nilai awal a: {$a} <br>";
echo "Nilai awal b: {$b} <br><br>";

// Operasi Aritmatika
$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

// Menampilkan hasil operasi aritmatika
echo "Hasil Penjumlahan: {$hasilTambah} <br>";
echo "Hasil Pengurangan: {$hasilKurang} <br>";
echo "Hasil Perkalian: {$hasilKali} <br>";
echo "Hasil Pembagian: {$hasilBagi} <br>";
echo "Sisa Bagi: {$sisaBagi} <br>";
echo "Hasil Pangkat: {$pangkat} <br><br>";

// Operasi Perbandingan
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

// Menampilkan hasil operasi perbandingan
echo "Apakah a sama dengan b? " . ($hasilSama ? 'True' : 'False') . "<br>";
echo "Apakah a tidak sama dengan b? " . ($hasilTidakSama ? 'True' : 'False') . "<br>";
echo "Apakah a lebih kecil dari b? " . ($hasilLebihKecil ? 'True' : 'False') . "<br>";
echo "Apakah a lebih besar dari b? " . ($hasilLebihBesar ? 'True' : 'False') . "<br>";
echo "Apakah a lebih kecil atau sama dengan b? " . ($hasilLebihKecilSama ? 'True' : 'False') . "<br>";
echo "Apakah a lebih besar atau sama dengan b? " . ($hasilLebihBesarSama ? 'True' : 'False') . "<br><br>";

// Operasi Logika
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

// Menampilkan hasil operasi logika
echo "Hasil AND (a && b): " . ($hasilAnd ? 'True' : 'False') . "<br>";
echo "Hasil OR (a || b): " . ($hasilOr ? 'True' : 'False') . "<br>";
echo "Hasil NOT a (!a): " . ($hasilNotA ? 'True' : 'False') . "<br>";
echo "Hasil NOT b (!b): " . ($hasilNotB ? 'True' : 'False') . "<br><br>";

// Operasi Penugasan
echo "Operasi Penugasan: <br>";
$a += $b;  

$a -= $b;  

$a *= $b;  

$a /= $b;  

$a %= $b; 

// Penjumlahan dan penugasan
echo "Setelah a += b, nilai a: {$a} <br>";
// Pengurangan dan penugasan
echo "Setelah a -= b, nilai a: {$a} <br>";
// Perkalian dan penugasan
echo "Setelah a *= b, nilai a: {$a} <br>";
// Pembagian dan penugasan
echo "Setelah a /= b, nilai a: {$a} <br>";
 // Modulus dan penugasan
 echo "Setelah a %= b, nilai a: {$a} <br>";

 $hasilIdentik =$a === $b;
 $hasilTidakIdentik = $a !== $b;

 echo "Apakah a identik dengan b? " . ($hasilIdentik ? 'True' : 'False') . "<br>";
echo "Apakah a tidak identik dengan b? " . ($hasilTidakIdentik ? 'True' : 'False') . "<br><br>";
?>

