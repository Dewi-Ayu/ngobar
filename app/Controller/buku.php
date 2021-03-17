<?php
class Buku extends controller
{

    public function index()
    {
        $data['judul'] = 'Daftar Buku';
        $data['isi'] = $this->model("Buku_Model")->getAllBuku();
        $this->view("header");
        $this->view("buku", $data);
        $this->view("footer");
    }
    public function detail_buku($id)
    {
        $data['judul'] = 'Detail_Buku';
        $data['isi'] = $this->model("Buku_Model")->getBukuById($id);
        $this->view("header");
        $this->view("detail_buku", $data);
        $this->view("footer");
    }
    public function tambah()
    {
        // var_dump($_POST);
        if ($this->model('Buku_Model')->tambahDataBuku($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . URL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . URL . '/buku');
            exit;
        }
    }
    public function hapus($id)
    {
        // var_dump($_POST);
        if ($this->model('Buku_Model')->hapusDataBuku($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . URL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . URL . '/buku');
            exit;
        }
    }
}
