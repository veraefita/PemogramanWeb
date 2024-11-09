<?php
include('koneksi.php');

// Periksa apakah variabel aksi telah diatur dalam URL
if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    // Menangani penambahan data
    if ($aksi == 'tambah') {
        if (isset($_POST['nama'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['no_telp'])) {
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
            $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

            $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp')";
            if (mysqli_query($koneksi, $query)) {
                header("Location: index2.php");
                exit();
            } else {
                echo "Gagal menambahkan data: " . mysqli_error($koneksi);
            }
        } else {
            echo "Data tidak lengkap.";
        }
    }

    // Menangani pengubahan data
    elseif ($aksi == 'ubah') {
        if (isset($_POST['id'], $_POST['nama'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['no_telp'])) {
            $id = mysqli_real_escape_string($koneksi, $_POST['id']);
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
            $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

            $query = "UPDATE anggota SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp' WHERE id='$id'";
            if (mysqli_query($koneksi, $query)) {
                header("Location: index2.php");
                exit();
            } else {
                echo "Gagal mengupdate data: " . mysqli_error($koneksi);
            }
        } else {
            echo "Data tidak lengkap.";
        }
    }

    // Menangani penghapusan data
    elseif ($aksi == 'hapus') {
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($koneksi, $_GET['id']);

            $query = "DELETE FROM anggota WHERE id = '$id'";
            if (mysqli_query($koneksi, $query)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Gagal menghapus data: " . mysqli_error($koneksi);
            }
        } else {
            echo "ID tidak valid.";
        }
    } else {
        echo "Aksi tidak dikenal.";
    }
} else {
    echo "Aksi tidak ditentukan.";
}

// Menutup koneksi
mysqli_close($koneksi);
?>
