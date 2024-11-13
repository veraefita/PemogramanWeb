<?php
session_start();
if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';
    if (!empty($_GET['jabatan'])) {
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);
        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES('$jabatan','$keterangan')";
        if (mysqli_query($koneksi, $query)) {
            pesan('success', "Jabatan Baru Ditambahkan.");
        }else {
            pesan('danger', "Menambahkan Jabatan Karena: " . mysqli_error($koneksi));
        }
        header("Location: ../index.php?page=jabatan");
    }
    elseif (!empty($_GET['anggota'])) {
        $username = antiInjection($koneksi, $_POST['username']);
        $password = antiInjection($koneksi, $_POST['password']);
        $level = antiInjection($koneksi, $_POST['level']);
        $jabatan = antiInjection($koneksi, $_POST['jabatan']);
        $nama = antiInjection($koneksi, $_POST['nama']);
        $jenis_kelamin = antiInjection($koneksi, $_POST['jenis_kelamin']);
        $alamat = antiInjection($koneksi, $_POST['alamat']);
        $no_telp = antiInjection($koneksi, $_POST['no_telp']);
    
        $salt = bin2hex(random_bytes(16));
        $combined_password = $salt . $password;
        $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);
    
        $query = "INSERT INTO user (username, password, salt, level) VALUES ('$username', '$hashed_password', '$salt', '$level')";
        if (mysqli_query($koneksi, $query)) {
            $last_id = mysqli_insert_id($koneksi);
            $query2 = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp, user_id, jabatan_id) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp', '$last_id', '$jabatan')";
            if (mysqli_query($koneksi, $query2)) {
                pesan('success', 'Anggota Baru Ditambahkan.');
            } else {
                pesan('warning', 'Gagal Menambahkan Anggota Tetapi Data Login Tersimpan Karena: ' . mysqli_error($koneksi));
            }
        } else {
            pesan('danger', 'Menambahkan Anggota Karena: ' . mysqli_error($koneksi));
        }
        header('Location: ../index.php?page=anggota');
    }
    
}