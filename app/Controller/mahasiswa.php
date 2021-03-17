<?php
class Mahasiswa extends controller
{

    public function index()
    {
        $data['isi'] = $this->model("Mahasiswa_Model")->getMahasiswa();
        $this->view("header");
        $this->view("mahasiswa", $data);
        $this->view("footer");
    }
    public function detail($id)
    {
        $data['isi'] = $this->model("Mahasiswa_Model")->getMahasiswaById($id);
        $this->view("header");
        $this->view("detail", $data);
        $this->view("footer");
    }
    public function tambah()
    {
        $data['nama'] = $_POST['tbhNama'];
        $data['alamat'] = $_POST['tbhAlamat'];
        $data['jurusan'] = $_POST['tbhJurusan'];

        // var_dump($data);
        if ($this->model('Mahasiswa_model')->tambahData($data) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . URL . '/mahasiswa');
            exit;
        }
    }
    public function hapus($id)
    {
        // $data['nama'] = $_POST['tbhNama'];
        // $data['alamat'] = $_POST['tbhAlamat'];
        // $data['jurusan'] = $_POST['tbhJurusan'];

        // var_dump($data);
        if ($this->model('Mahasiswa_model')->hapusData($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . URL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . URL . '/mahasiswa');
            exit;
        }
    }

    // public function getedit()
    // {
    //     $val = $this->model('Mahasiswa_model')->getId($id);
    //     $data = [
    //         'title' => 'Edit data',
    //         'nama' => ['Nama'],
    //         'alamat' => ['Alamat'],
    //         'jurusan' => ['Jurusan']
    //     ];
    //     $this->view('header', $data);
    //     $this->view('edit', $data);
    //     $this->view('header', $data);
    //     // echo $_POST['id'];
    //     // echo json_encode($this->model('mahasiswa_model')->getMahasiswaById($_POST['id']));
    // }
    public function editMahasiswa($id)
    {
        $val = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        $data = [
            'title' => 'Edit data',
            'id' => $val['id'],
            'nama' => $val['nama'],
            'alamat' => $val['alamat'],
            'jurusan' => $val['jurusan']
        ];
        $this->view('header', $data);
        $this->view('editMahasiswa', $data);
        $this->view('header', $data);
    }
    public function save()
    {
        $data['id'] = $_POST['id'];
        $data['nama'] = $_POST['tbhNama'];
        $data['alamat'] = $_POST['tbhAlamat'];
        $data['jurusan'] = $_POST['tbhJurusan'];
        if ($this->model('Mahasiswa_model')->updateData($data) > 0) {
            Flasher::setFlash('berhasil', 'diperbarui', 'success');
            header('Location: ' . URL . '/mahasiswa');
            exit;
        }
    }
}
