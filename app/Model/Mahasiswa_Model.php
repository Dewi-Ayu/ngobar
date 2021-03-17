<?php
class Mahasiswa_Model
{
    // private $dbh;
    // private $stmt;

    //  = [
    //     [
    //         "nama" => 'Dewi',
    //         "alamat" => "Singotrunan",
    //         "jurusan" => 'S1 Teknik Informatika'
    //     ],
    //     [
    //         "nama" => 'Ayu',
    //         "alamat" => "Banyuwangi",
    //         "jurusan" => "S1 Manajemen"
    //     ],
    //     [
    //         "nama" => 'Anggraini',
    //         "alamat" => "Giri",
    //         "jurusan" => "S1 Informatika"
    //     ]
    // ];

    // public function __construct()
    // {
    //     $dsn ="mysql:host=localhost;dbname=ngobar";

    //     try {
    //         $this->dbh =new PDO($dsn, 'root', '');
    //     } catch (PDOException $e) {
    //         $e->getMessage();
    //     }
    // }

    // public function getMahasiswa()
    // {
    //     $this->stmt = $this->dbh->prepare("SELECT * FROM tbl_mahasiswa");
    //     $this->stmt->execute();
    //     return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    //=====================================================================================

    private $tbl_name = 'tbl_mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMahasiswa()
    {
        $this->db->query("SELECT * FROM " . $this->tbl_name);
        return $this->db->findAll();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM " . $this->tbl_name . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahData($data)
    {
        $query = ' INSERT INTO ' . $this->tbl_name . ' VALUES("", :nama, :alamat, :jurusan);';
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusData($id)
    {
        $query = "DELETE FROM tbl_mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateData($data)
    {

        $query = " UPDATE " . $this->tbl_name . " SET 
                    nama = :nama,
                    alamat = :alamat,
                    jurusan = :jurusan 
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
};
