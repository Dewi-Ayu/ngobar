<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success tombolTambahBuku" data-toggle="modal" data-target="#formtambahbuku">
                Tambah Data Buku
            </button>
            <br></br>
            <h3>Daftar Buku</h3>
            <ul class="list-group">
                <?php foreach ($data['isi'] as $dt) : ?>
                    <li class="list-group-item" aria-current="true">
                        <?= $dt['judul']; ?>
                        <a href="<?= URL; ?>/buku/hapus/<?= $dt['id']; ?>" class="badge badge-danger float-right ml-3" onclick="return confirm('yakin mau dihapus?');">Hapus</a>
                        <a href="<?= URL; ?>/buku/edit/<?= $dt['id']; ?>" class="badge badge-warning float-right tampilModalUbah ml-3" data-toggle="modal" data-target="#formtambahbuku" data-id="<? = $dt['id']; ?">Edit</a>
                        <a href="<?= URL; ?>/buku/detail_buku/<?= $dt['id']; ?>" class="badge badge-primary float-right ml-3">Selengkapnya</a>

                    </li>
                <?php endforeach; ?>
            </ul>



        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formtambahbuku" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= URL; ?>/buku/tambah" method="post">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>
                    <div class="form-group">
                        <label for="tahunterbit">Tahun Terbit</label>
                        <select class="form-control" id="tahunterbit" name="tahunterbit">
                            <option value="2000-2005">2000-2005</option>
                            <option value="2005-2010">2005-2010</option>
                            <option value="2010-2015">2010-2015</option>
                            <option value="2015-2020">2015-2020</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>