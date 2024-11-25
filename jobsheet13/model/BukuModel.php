<?php
include('Model.php');
class BukuModel extends Model {
    protected $db;
    protected $table = 'm_buku';
    protected $driver;

    public function __construct(){
        include_once('../lib/Connection.php');
        
        $this->db = $db;
        $this->driver = $use_driver;
    }
    
    public function insertData($data){
        if ($this->driver == 'mysql') {
            // prepare statement untuk query insert
            $query = $this->db->prepare("INSERT INTO {$this->table} (buku_kode, buku_nama, kategori_id, jumlah, deskripsi, gambar) 
                    VALUES (?, ?, ?, ?, ?, ?)");
            // binding parameter ke query, "s" berarti string, "ss" berarti dua string
            $query->bind_param('ssisss', $data['buku_kode'], $data['buku_nama'], $data['kategori_id'], $data['jumlah'], $data['deskripsi'], $data['gambar']);
            // eksekusi query untuk menyimpan ke database
            $query->execute();
        } else {
            // eksekusi query untuk menyimpan ke database 
            sqlsrv_query($this->db, "INSERT INTO {$this->table} (buku_kode, buku_nama, kategori_id, jumlah, deskripsi, gambar) 
            VALUES (?, ?, ?, ?, ?, ?)", [
                $data['buku_kode'],
                $data['buku_nama'],
                $data['kategori_id'],
                $data['jumlah'],
                $data['deskripsi'],
                $data['gambar']
            ]);
        }
        

    }
    
    public function getData(){
        if ($this->driver == 'mysql') {
            // fetch data
            return $this->db->query("SELECT * FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
        } else {
            // fetch data
            $query = sqlsrv_query($this->db, "SELECT * FROM {$this->table}");
            $data = [];
            while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getDataById($id){
        if ($this->driver == 'mysql') {
            // query untuk mengambil data berdasarkan id
            $query = $this->db->prepare("select * from {$this->table} where buku_id = ?");
            // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
            $query->bind_param('i', $id);
            // eksekusi query
            $query->execute();
            // ambil hasil query
            return $query->get_result()->fetch_assoc();
        } else {
            $query = sqlsrv_query($this->db, "SELECT * FROM {$this->table} WHERE buku_id = ?", [$id]);
            return sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
        }
    }

    public function updateData($id, $data){ 
        if ($this->driver == 'mysql') {
            $query = $this->db->prepare("UPDATE {$this->table} 
                SET buku_kode = ?, buku_nama = ?, kategori_id = ?, jumlah = ?, deskripsi = ?, gambar = ? 
                WHERE buku_id = ?");
            // Bind parameters
            $query->bind_param('ssiissi', $data['buku_kode'], $data['buku_nama'], $data['kategori_id'], $data['jumlah'], $data['deskripsi'], $data['gambar'], $id);
            // Execute the query
            $query->execute();
        } else {
            // Execute update query
            sqlsrv_query($this->db, "UPDATE {$this->table} 
                SET buku_kode = ?, buku_nama = ?, kategori_id = ?, jumlah = ?, deskripsi = ?, gambar = ? 
                WHERE buku_id = ?", [
                $data['buku_kode'],
                $data['buku_nama'],
                $data['kategori_id'],
                $data['jumlah'],
                $data['deskripsi'],
                $data['gambar'],
                $id
            ]);
        }
    }
    public function deleteData($id){
        if ($this->driver == 'mysql') {
            // MySQL: Prepare delete query
            $query = $this->db->prepare("DELETE FROM {$this->table} WHERE buku_id = ?");
            // Bind parameter
            $query->bind_param('i', $id);
            // Execute the query
            $query->execute();
        } else {
            // SQL Server: Execute delete query
            sqlsrv_query($this->db, "DELETE FROM {$this->table} WHERE buku_id = ?", [$id]);
        }
    }
}