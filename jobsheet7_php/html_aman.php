<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Input Aman</title>
    </head>
    <body>
        <h2>Input Aman</h2>
        <form action="html_aman.php" method="post">
            <label for="input">Masukkan data :</label><br>
            <input type="text" id="input" name="input"><br><br>

            <label for="email">Masukkan Email :</label><br>
            <input type="text" id="email" name="email"><br><br>

            <input type="submit" value="Submit">
        </form>
        </body>
        </html>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mendapatkan input
            $input = $_POST['input'];
            $email = $_POST['email'];

            // Sanitasi input untuk mencegah XSS
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

            // Validasi sederhana: pastikan input tidak kosong
            if (!empty($input)) {
                echo "<p>Data yang dimasukkan : " . $input . "</p>";
            } else {
                echo "<p>Input tidak boleh kosong!</p>";
            }

            // Validasi email
            if (!empty($email)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<p>Email yang dimasukkan: " . $email . "</p>";
                } else {
                    echo "<p>Format email tidak valid!</p>";
                }
            } else {
                echo "<p>Email tidak boleh kosong!</p>";
            }
        }
        ?>

