



<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "uploads/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Daftar ekstensi yang diizinkan
$allowedExtensions = array("jpg", "jpeg", "png", "gif");

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileTmpName = $_FILES['files']['tmp_name'][$i];
        $fileSize = $_FILES['files']['size'][$i];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $targetFile = $targetDirectory . basename($fileName);

        // Validasi ekstensi file
        if (in_array($fileType, $allowedExtensions)) {
            // Pindahkan file yang diunggah ke direktori penyimpanan
            if (move_uploaded_file($fileTmpName, $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";

                // Tampilkan gambar thumbnail dengan lebar 200px
                echo "<img src='$targetFile' width='200' style='margin: 10px;' alt='Thumbnail'><br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "File $fileName bukan gambar yang valid.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>

