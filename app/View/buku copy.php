<div class="container mt-5">
    <br>
    <h2 class="text-center">Daftar Buku</h2></br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Opsi</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['isi'] as $dt) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $dt['judul']; ?></td>
                    <td><?= $dt['kategori']; ?></td>
                    <td><?= $dt['tahun terbit']; ?></td>

                    <td>
                        <a href="detail">
                            <button type="button" class="btn btn-primary">Detail</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>