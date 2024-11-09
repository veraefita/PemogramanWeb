<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $errors = array();

        if (isset($_POST["password"])) {
            $password = $_POST["password"];
        } else {
            $password = "";
        }

        //validasi nama
        if (empty($nama)) {
            $errors[] = "Nama harus diisi.";
        }

        //validasi email
        if (empty($email)) {
            $errors[] = "Email harus diisi.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Format email tidak valid.";
        }

        //validasi password
        if (empty($password)) {
            $errors[] = "Password harus diisi.";
        } elseif (strlen($password < 8)) {
            $errors[] = "Password harus lebih dari 8 karakter.";
        }

        //jika ada kesalahan validasi
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        } else {
            //lanjutkan dengan pemrosesan data jika semua validasi berhasil
            //misalnya menyimpan data ke database atau mengirim email
            echo "Data berhasil dikirim: Nama = $nama, Email = $email";
        }
    }
?>