<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <script src="https://code.jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form method="post" action="proses_validasi.php">
        <label for="nama">Nama: </label>
        <input type="text" id="nama" name="nama">
        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"> 
        <br>

        <input type="submit" value="Submit">
    </form>

    <script>
$(document).ready(function() {
    $("#myForm").submit(function(event) {
        var nama = $("#nama").val(); // Memperbaiki selector dari "irnama" ke "#nama"
        var email = $("#email").val();
        var valid = true;

        // Validasi Nama
        if (nama === "") {
            $("#nama-error").text("Nama harus diisi."); // Memperbaiki pesan error
            valid = false; // Memperbaiki penugasan ke valid
        } else {
            $("#nama-error").text(""); // Menghapus pesan error jika valid
        }

        // Validasi Email
        if (email === "") {
            $("#email-error").text("Email harus diisi."); // Memperbaiki pesan error
            valid = false; // Memperbaiki penugasan ke valid
        } else {
            $("#email-error").text(""); // Menghapus pesan error jika valid
        }

        // Jika validasi gagal, hentikan pengiriman form
        if (!valid) {
            event.preventDefault(); // Memperbaiki penulisan preventDefault
        }
    });
});
</script>


</body>
</html>

