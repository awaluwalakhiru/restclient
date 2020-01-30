<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap.min.css'); ?>">
    <title><?php echo $judul; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">RestClient</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Pengunjung </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="card text-center mt-md-3 mt-sm-0">
        <div class="card-header">
            Daftar Pengunjung
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="col mb-2 pr-0 d-flex justify-content-end">
                        <button data-add="<?php echo site_url('client/add'); ?>" class="btn btn-action btn-sm btn-success tambah" data-toggle="modal" data-target="#modalTambah">tambah</button>
                    </div>
                    <ul class="list-group main-content">
                        <?php if ($pengunjung != null) : ?>
                            <?php foreach ($pengunjung as $key) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center"><strong><?php echo strtolower($key->nama); ?></strong>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo base_url('client'); ?>" class="badge badge-primary mr-1 detail" data-toggle="modal" data-target="#modalDetail" data-id="<?php echo $key->id; ?>">detail</a>
                                        <a href="<?php echo base_url('client'); ?>" class="badge badge-warning mr-1 ubah" data-toggle="modal" data-target="#modalUbah" data-id="<?php echo $key->id; ?>">ubah</a>
                                        <a href="<?php echo base_url('client'); ?>" class="badge badge-danger mr-1 hapus" data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $key->id; ?>">hapus</a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li class="list-group-item d-flex justify-content-center align-items-center">Data tidak ditemukan</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Rest Api Client
        </div>
    </div>
    <!-- Modal detail-->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengunjung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-8 mx-auto">
                        <ul class="list-group">
                            <li class="list-group-item detailNama"></li>
                            <li class="list-group-item detailAlamat"></li>
                            <li class="list-group-item detailHp"></li>
                            <li class="list-group-item detailPekerjaan"></li>
                            <li class="list-group-item detailHobi"></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ubah-->
    <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Pengunjung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-8 mx-auto">
                        <ul class="list-group">
                            <form name="ubah">
                                <li class="list-group-item">
                                    <input type="hidden" name="id" class="ubahId">
                                    <div><label for="">Nama</label></div>
                                    <div><input type="text" class="ubahNama" name="nama"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Alamat</label></div>
                                    <div><input type="text" class="ubahAlamat" name="alamat"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Hp</label></div>
                                    <div><input type="text" class="ubahHp" name="hp"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Pekerjaan</label></div>
                                    <div><input type="text" class="ubahPekerjaan" name="pekerjaan"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Hobi</label></div>
                                    <div><input type="text" class="ubahHobi" name="hobi"></div>
                                </li>
                            </form>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary prosesUbah">ubah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal hapus-->
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengunjung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin mau menghapus data?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger prosesHapus">hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah-->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengunjung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-8 mx-auto">
                        <ul class="list-group">
                            <form name="tambah">
                                <li class="list-group-item">
                                    <div><label for="">Nama</label></div>
                                    <div><input type="text" class="tambahNama" name="nama"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Alamat</label></div>
                                    <div><input type="text" class="tambahAlamat" name="alamat"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Hp</label></div>
                                    <div><input type="text" class="tambahHp" name="hp"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Pekerjaan</label></div>
                                    <div><input type="text" class="tambahPekerjaan" name="pekerjaan"></div>
                                </li>
                                <li class="list-group-item">
                                    <div><label for="">Hobi</label></div>
                                    <div><input type="text" class="tambahHobi" name="hobi"></div>
                                </li>
                            </form>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger prosesTambah">tambah</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/popper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap.min.js'); ?>"></script>
    <script>
        $(function() {
            $(document).on('click', 'a.detail', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('client/byId'); ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('.detailNama').text(`Nama : ${response.nama}`);
                        $('.detailAlamat').text(`Alamat : ${response.alamat}`);
                        $('.detailHp').text(`Hp : ${response.hp}`);
                        $('.detailPekerjaan').text(`Pekerjaan : ${response.pekerjaan}`);
                        $('.detailHobi').text(`Hobi : ${response.hobi}`);
                    }
                });
            });
            $(document).on('click', 'a.ubah', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('client/byId'); ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('.ubahNama').val(response.nama);
                        $('.ubahAlamat').val(response.alamat);
                        $('.ubahHp').val(response.hp);
                        $('.ubahPekerjaan').val(response.pekerjaan);
                        $('.ubahHobi').val(response.hobi);
                        $('.ubahId').val(response.id);
                        $('button.prosesUbah').click(function() {
                            let form = $('form[name="ubah"]');
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('client/update'); ?>",
                                data: form.serialize(),
                                dataType: "JSON",
                                success: function(response) {
                                    if (response) {
                                        alert('Update berhasil');
                                    } else {
                                        alert('Update gagal');
                                    }
                                    $('.main-content').html();
                                    $('#modalUbah').modal('hide');
                                    loadPage();
                                }
                            });
                        });
                    }
                });
            });
            $(document).on('click', 'a.hapus', function() {
                let id = $(this).data('id');
                $(document).on('click', 'button.prosesHapus', function() {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('client/delete'); ?>",
                        data: {
                            id: id
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response) {
                                alert('Delete berhasil');
                            } else {
                                alert('Delete gagal');
                            }
                            $('.main-content').html();
                            $('#modalHapus').modal('hide');
                            loadPage();
                        }
                    });
                });
            });

            $(document).on('click', 'button.tambah', function() {
                let url = $(this).data('add');
                $(document).on('click', '.prosesTambah', function() {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $('form[name="tambah"]').serialize(),
                        dataType: "JSON",
                        success: function(response) {
                            if (response) {
                                alert('tambah berhasil');
                            } else {
                                alert('tambah gagal');
                            }
                            $('.main-content').html();
                            $('#modalTambah').modal('hide');
                            $('form[name="tambah"]')[0].reset();
                            loadPage();
                        }
                    });
                });
            });
        });

        function loadPage() {
            $.ajax({
                type: "POST",
                data: {
                    url: "<?php echo site_url('client'); ?>"
                },
                url: "<?php echo site_url('client/loadPage'); ?>",
                success: function(response) {
                    $('.main-content').html(response);
                }
            });
        }
    </script>
</body>

</html>
