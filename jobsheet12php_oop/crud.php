<?php
require_once 'database.php';
class Crud
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //create
    public function create($jabatan, $keterangan)
    {
        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";
        $result = $this->db->conn->query($query);

        return $result;
    }

    //Read
    // Fungsi untuk membaca data dari tabel jabata
    public function read()
    {
        // Query untuk mengambil semua data dari tabel jabata
        $query = "SELECT * FROM jabatan";
        $result = $this->db->conn->query($query);

        $data = []; // Inisialisasi array kosong untuk menampung hasil data

        // Memeriksa apakah ada data yang ditemukan
        if ($result->num_rows > 0) {
            // Mengambil data per baris dan menyimpannya ke dalam array
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data; // Mengembalikan array data
    }


    //Read By Id
    public function readById($id)
    {
        $query = "SELECT * FROM jabatan WHERE id = '$id'";
        $result = $this->db->conn->query($query);
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }


    //Update
    public function update($id, $jabatan, $keterangan)
    {
        $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";
        $result = $this->db->conn->query($query);
        return $result;
    }

    //Delete
    public function delete($id)
    {
        $query = "DELETE FROM jabatan WHERE id = '$id'";
        $result = $this->db->conn->query($query);
        return $result;
    }
}
