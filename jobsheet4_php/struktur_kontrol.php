<?php
$nilaiNumerik = 92;

// Menentukan nilai huruf berdasarkan nilai numerik
if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A<br>";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B<br>";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C<br>";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D<br>";
}

// Menghitung hari yang diperlukan atlet untuk mencapai jarak target
$jarakSaatIni = 0;         // Jarak saat ini
$jarakTarget = 500;        // Jarak target
$peningkatanHarian = 30;   // Peningkatan jarak harian
$hari = 0;                 // Inisialisasi hari

// Loop untuk menghitung jumlah hari
while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian; // Tambah jarak saat ini
    $hari++;                              // Tambah jumlah hari
}

// Menampilkan hasil
echo "Atlet tersebut memerlukan <strong>{$hari}</strong> hari untuk mencapai jarak <strong>{$jarakTarget}</strong> kilometer.<br>";
echo "Jarak yang telah ditempuh: <strong>{$jarakSaatIni}</strong> kilometer.";


$jumlahLahan = 10;          // Jumlah lahan
$tanamanPerLahan = 5;      // Jumlah tanaman per lahan
$buahPerTanaman = 10;      // Jumlah buah per tanaman
$jumlahBuah = 0;           // Inisialisasi jumlah buah

// Menghitung jumlah buah yang akan dipanen
for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

// Menampilkan hasil dengan format yang rapi
echo "Jumlah lahan: <strong>{$jumlahLahan}</strong><br>";
echo "Jumlah tanaman per lahan: <strong>{$tanamanPerLahan}</strong><br>";
echo "Jumlah buah per tanaman: <strong>{$buahPerTanaman}</strong><br>";
echo "Jumlah buah yang akan dipanen adalah: <strong>{$jumlahBuah}</strong>";


$skorUjian = [85, 92, 78, 96, 88];  // Array skor ujian
$totalSkor = 0;                    // Inisialisasi total skor

// Menghitung total skor ujian
foreach ($skorUjian as $skor) {
    $totalSkor += $skor;  // Menambahkan setiap skor ke total
}

// Menghitung rata-rata skor ujian
$rataRataSkor = $totalSkor / count($skorUjian);

// Menampilkan hasil
echo "Total skor ujian adalah: <strong>{$totalSkor}</strong><br>";
echo "Rata-rata skor ujian adalah: <strong>{$rataRataSkor}</strong>";


$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];  // Array nilai siswa

// Menampilkan status kelulusan setiap siswa
foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br>";
        continue; // Melanjutkan ke iterasi berikutnya jika tidak lulus
    }
    
    echo "Nilai: $nilai (Lulus) <br>";  // Menampilkan status lulus jika nilai >= 60
}
?>



