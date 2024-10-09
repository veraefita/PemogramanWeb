<!DOCTYPE htm1>
    <htm1>
    <head>
    <title>Form Input PHP</title>
</head>
<body>
    <h2>Form Input PHP</h2>
    <form method="post" action="proses_form.php">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="email">Email :</label>
<input typc="email" name="email" id="email" required><br><br>

<input type="submit" name="submit" value="Submit">
</form>
</body>
</htm1>

<?php
    if ($_SERVER["REQUEST_METHOD" ] == "POST" ) {
    $nama = $_POST["nama"];
    $email =$_POST["email"];

    echo "Nama: " . $nama . "<br>";
    echo "Email: ". $email;
}
    ?>

