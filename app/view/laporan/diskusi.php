<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION["role"] == "bk" || $_SESSION["role"] == "wali"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Laporan Diskusi</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Diskusi</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-end">
                                <a href="?page=lihat-diskusi" class="btn btn-info hover">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-md">
                            <div class="card-body my-1">
                                <table class="table table-stripped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Nama Keamanan</th>
                                            <th>No Sanksi</th>
                                            <th>No Pelanggaran</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = "SELECT laporan_diskusi.*, kelas.id_kelas, kelas.nama_kelas, walikelas.id_wali, walikelas.nama_wali,
                                             keamanan.id_keamanan, keamanan.nama_keamanan, sanksi.no_sanksi, sanksi.nama_sanksi, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran FROM laporan_diskusi left join siswa on laporan_diskusi.nama_siswa = siswa.nama_siswa left join kelas on laporan_diskusi.id_kelas = kelas.id_kelas left join walikelas on laporan_diskusi.id_wali = walikelas.id_wali left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi left join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran order by id asc";
                                            $hasil = $laporan->lihat($sql);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["nama_siswa"]; ?></td>
                                            <td><?php echo $isi["nama_kelas"] ?></td>
                                            <td><?php echo $isi["nama_wali"] ?></td>
                                            <td><?php echo $isi["nama_keamanan"] ?></td>
                                            <td><?php echo $isi["no_sanksi"] ?></td>
                                            <td><?php echo $isi["no_pelanggaran"] ?></td>
                                            <td>
                                                <a href="" role="button" aria-current="page"
                                                    data-bs-target="#update<?php echo $isi["id"]?>"
                                                    data-bs-toggle="modal" class="btn btn-sm btn-info hover">
                                                    <i class="bi bi-plus"></i>
                                                </a>
                                                <a href="?aksi=delete-laporan&id=<?=$isi["id"]?>"
                                                    onclick="return confirm('apakah anda ingin menghapus data ini ?')"
                                                    role="button" aria-current="page" class="btn btn-sm btn-info hover">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                <div class="modal fade" id="update<?php echo $isi["id"]?>"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Laporan Diskusi Siswa</h4>
                                                                <button type='button' class='btn btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=update-laporan" method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi["id"]?>">
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Hasil Diskusi :</label>
                                                                                <textarea name="diskusi" maxlength="255"
                                                                                    required class="form-control"
                                                                                    id="diskusi"></textarea>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary hover">Update</button>
                                                                        <button type='button' class='btn btn-default'
                                                                            data-bs-dismiss='modal'>Batal</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            require_once("../ui/footer.php");
        ?>