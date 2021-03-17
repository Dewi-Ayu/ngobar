<?php
class Buku_Model
{
    // public function __construct()
    // {
    //     //dsn = data source name
    //     $dsn = "mysql:host=localhost;dbname=ngobar";

    //     try {
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch (PDOException $e) {
    //         $e->getMessage();
    //     }
    // }

    // public function getBuku()
    // {
    //     $this->stmt = $this->dbh->prepare("SELECT * FROM tbl_buku");
    //     $this->stmt->execute();
    //     return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // }



    //=======================================================================

    private $dbl_name = 'tbl_buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        $this->db->query("SELECT * FROM tbl_buku");
        return $this->db->findAll();
    }
    public function getBukuById($id)
    {
        $this->db->query("SELECT * FROM " . $this->dbl_name . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahDataBuku($data)
    {
        $query = "INSERT INTO tbl_buku VALUES ('', :judul, :kategori, :tahunterbit)";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('tahunterbit', $data['tahunterbit']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataBuku($id)
    {
        $query = "DELETE FROM tbl_buku WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
};
