<?php
// Mendefinisikan variabel dasar
$a = 10;
$b = 5;
$c = $a + 5; // c adalah a ditambah 5
$d = $b + (10 * 5); // d adalah b ditambah 10 kali 5
$e = $d - $c; // e adalah d dikurangi c

// Menampilkan nilai variabel dasar
echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br>";
echo "Variabel c: {$c} <br>";
echo "Variabel d: {$d} <br>";
echo "Variabel e: {$e} <br>";
echo "<br>"; // Jarak antar tipe data


var_dump($e); // Menampilkan informasi tentang e
echo "<br>"; // Jarak

// Mendefinisikan nilai untuk mata pelajaran
$nilaiMatematika = 5.1;
$nilaiIPA = 6.7;
$nilaiBahasaIndonesia = 9.3;

// Menghitung rata-rata
$rataRata = ($nilaiMatematika + $nilaiIPA + $nilaiBahasaIndonesia) / 3;

// Menampilkan nilai mata pelajaran
echo "Matematika: {$nilaiMatematika} <br>";
echo "IPA: {$nilaiIPA} <br>";
echo "Bahasa Indonesia: {$nilaiBahasaIndonesia} <br>";
echo "Rata-rata: {$rataRata} <br>";
echo "<br>"; // Jarak

var_dump($rataRata); // Menampilkan informasi tentang rata-rata
echo "<br>"; // Jarak

// Mendefinisikan status siswa
$apakahSiswaLulus = true;
$apakahSiswaSudahUjian = false;

// Menampilkan status siswa
var_dump($apakahSiswaLulus);
echo "<br>"; // Jarak
var_dump($apakahSiswaSudahUjian);
echo "<br>"; // Jarak

// Mendefinisikan nama
$namaDepan = "Ibnu";
$namaBelakang = 'Jakaria';

// Menggabungkan nama
$namaLengkap = "{$namaDepan} {$namaBelakang}";
$namaLengkap2 = $namaDepan . ' ' . $namaBelakang;

// Menampilkan nama
echo "Nama Depan: {$namaDepan} <br>";
echo 'Nama Belakang: ' . $namaBelakang . '<br>';
echo "Nama Lengkap: {$namaLengkap} <br>";
echo "<br>"; // Jarak

// Daftar mahasiswa
$listMahasiswa = ["Wahid Abdullah", "Elmo Bachtiar", "Lendis Fabri"];
echo "Mahasiswa Pertama: " . $listMahasiswa[0];
?>


