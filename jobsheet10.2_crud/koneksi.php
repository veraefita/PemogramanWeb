<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB1', 'prakwebdb');

$db1 = new mysqli(HOST, USER, PASS, DB1);

//p1-5
// $koneksi = mysqli_connect("localhost", "root", "", "prakwebdb");

// //periksa koneksi
// if (mysqli_connect_errno()) {
//     die("Koneksi database gagal: " . mysqli_connect_error());
// }