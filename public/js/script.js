// console.log('ok');
$(function () {

    $('.tombolTambahBuku').on('click', function () {
        $('#formModalLabel').html('Tambah Data Buku');
        $('.modal-footer button[type=submit]').html('Tambah Data Buku');
    })
    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data Mahasiswa');
    })


    $('.tampilModalUbah').on('click', function () {
        console.log('ok');
        $('#judulModal').html('Edit Data Buku');
        $('.modal-footer button[type=submit]').html('Edit Data');

        $('#formModalLabel').html('Edit Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/ngobar/public/mahasiswa/edit');

        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: "http://localhost/ngobar/public/mahasiswa/getedit",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                // console.log(data);
                $("#id").val(data.id);
                $("#nama").val(data.nama);
                $("#alamat").val(data.alamat);
                $("#jurusan").val(data.jurusan);
            },
        });
    });
});

//id kiri = id yg dikirimkan, id kanan = isi datanya
//ajax memiliki beberpa parameter krna bentukny object