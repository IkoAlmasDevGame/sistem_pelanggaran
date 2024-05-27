<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION["role"] == "admin" || $_SESSION["role"] == "bk" || $_SESSION["role"] == "wali"){
                require_once("../ui/header.php");
            }else{
                $halaman = "../ui/header.php?page=beranda";
                header("location:".$halaman."");
            }
        ?>
        <title>Data Master Siswa</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Khusus Siswa</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-end">
                                <a href="?page=lihat-siswa" class="btn btn-info hover">
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
                                            <th>Nis</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Petugas Keamanan</th>
                                            <th>No Sanksi</th>
                                            <th>No Pelanggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            if(isset($_GET["nama_siswa"])){
                                                $row = $configs->prepare("SELECT siswa.*, kelas.id_kelas, kelas.nama_kelas, walikelas.id_wali, walikelas.nama_wali,
                                                keamanan.id_keamanan, keamanan.nama_keamanan, sanksi.no_sanksi, sanksi.nama_sanksi, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran FROM siswa left join kelas on siswa.id_kelas = kelas.id_kelas left join walikelas on siswa.id_wali = walikelas.id_wali left join keamanan on siswa.id_keamanan = keamanan.id_keamanan left join sanksi on siswa.no_sanksi = sanksi.no_sanksi left join pelanggaran on siswa.no_pelanggaran = pelanggaran.no_pelanggaran WHERE nama_siswa = ? order by id_siswa asc");
                                                $row->execute(array($_GET["nama_siswa"]));
                                                $hasil = $row->fetchAll();
                                            }else{
                                                $sql = "SELECT siswa.*, kelas.id_kelas, kelas.nama_kelas, walikelas.id_wali, walikelas.nama_wali,
                                                keamanan.id_keamanan, keamanan.nama_keamanan, sanksi.no_sanksi, sanksi.nama_sanksi, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran FROM siswa left join kelas on siswa.id_kelas = kelas.id_kelas left join walikelas on siswa.id_wali = walikelas.id_wali left join keamanan on siswa.id_keamanan = keamanan.id_keamanan left join sanksi on siswa.no_sanksi = sanksi.no_sanksi left join pelanggaran on siswa.no_pelanggaran = pelanggaran.no_pelanggaran order by id_siswa asc";
                                                $hasil = $siswa->lihat($sql);
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["nis"]; ?></td>
                                            <td><?php echo $isi["nama_siswa"]; ?></td>
                                            <td><?php echo $isi["nama_kelas"] ?></td>
                                            <td><?php echo $isi["nama_wali"] ?></td>
                                            <td><?php echo $isi["id_keamanan"]." - ".$isi["nama_keamanan"] ?></td>
                                            <td><?php echo $isi["no_sanksi"]." - ".$isi["nama_sanksi"] ?></td>
                                            <td><?php echo $isi["no_pelanggaran"]." - ".$isi["nama_pelanggaran"] ?></td>
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