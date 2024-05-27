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
        <title>Laporan Pelanggaran</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Laporan</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-end">
                                <a href="?page=lihat-laporan" class="btn btn-info hover">
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
                                            <th>Hasil Diskusi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = "SELECT laporan_diskusi.*, siswa.nama_siswa, kelas.id_kelas, kelas.nama_kelas, walikelas.id_wali, walikelas.nama_wali,
                                             keamanan.id_keamanan, keamanan.nama_keamanan, sanksi.no_sanksi, sanksi.nama_sanksi, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran FROM laporan_diskusi left join siswa on laporan_diskusi.nama_siswa = siswa.nama_siswa left join kelas on laporan_diskusi.id_kelas = kelas.id_kelas left join walikelas on laporan_diskusi.id_wali = walikelas.id_wali left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi left join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran order by id asc";
                                            $hasil = $laporan->lihat($sql);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                                <a href="?page=lihat-siswa&nama_siswa=<?=$isi["nama_siswa"]?>"
                                                    class="text-decoration-none text-primary">
                                                    <?php echo $isi["nama_siswa"]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-kelas&id_kelas=<?=$isi["id_kelas"]?>"
                                                    class="text-decoration-none text-primary">
                                                    <?php echo $isi["nama_kelas"] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-walikelas&id_wali=<?=$isi["id_wali"]?>"
                                                    class="text-decoration-none text-primary">
                                                    <?php echo $isi["nama_wali"] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-keamanan&id_keamanan=<?=$isi["id_keamanan"]?>"
                                                    class="text-decoration-none text-primary">
                                                    <?php echo $isi["nama_keamanan"] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-sanksi&no_sanksi=<?=$isi["no_sanksi"]?>"
                                                    class="text-decoration-none text-primary">
                                                    <?php echo $isi["no_sanksi"] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-pelanggaran&no_pelanggaran=<?=$isi["no_pelanggaran"]?>"
                                                    class="text-decoration-none text-primary">
                                                    <?php echo $isi["no_pelanggaran"] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" data-bs-target="#lihat<?=$isi["id"]?>" data-bs-toggle="modal"
                                                    role="button" aria-current="page" class="btn btn-sm btn-info hover">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=print&id=<?=$isi["id"]?>"
                                                    onclick="return confirm('apakah anda ingin print laporan ini ?')"
                                                    role="button" aria-current="page" class="btn btn-sm btn-info hover">
                                                    <i class="bi bi-printer"></i>
                                                </a>
                                                <div class="modal fade" id="lihat<?=$isi["id"]?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hasil Diskusi</h4>
                                                                <button type='button' class='btn btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-striped-columns">
                                                                    <tr>
                                                                        <td>
                                                                            <label for="">Hasil Diskusi : </label>
                                                                            <textarea class="form-control" required
                                                                                readonly><?php echo $isi["diskusi"] ?></textarea>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <div class="modal-footer">
                                                                    <button type='button' class='btn btn-default'
                                                                        data-bs-dismiss='modal'>Batal</button>
                                                                </div>
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