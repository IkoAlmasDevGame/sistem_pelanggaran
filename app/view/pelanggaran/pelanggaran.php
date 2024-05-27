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
        ?> <title>Data Master Pelanggaran</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Pelanggaran</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-end">
                                <a href="?page=lihat-pelanggaran" role="button" class="btn btn-info hover">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-md">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No Pelanggaran</th>
                                            <th>Nama Pelanggaran</th>
                                            <th>No Sanksi</th>
                                            <th>ID Keamanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(isset($_GET["no_pelanggaran"])){
                                                $row = $configs->prepare("SELECT pelanggaran.*, sanksi.no_sanksi, sanksi.nama_sanksi, keamanan.id_keamanan, keamanan.nama_keamanan FROM pelanggaran left join sanksi on pelanggaran.no_sanksi = sanksi.no_sanksi left join keamanan on pelanggaran.id_keamanan = keamanan.id_keamanan WHERE no_pelanggaran = ? order by id_pelanggaran asc");
                                                $row->execute(array($_GET["no_pelanggaran"]));
                                                $hasil = $row->fetchAll();
                                            }else{
                                                $sql = "SELECT pelanggaran.*, sanksi.no_sanksi, sanksi.nama_sanksi, keamanan.id_keamanan, keamanan.nama_keamanan FROM pelanggaran left join sanksi on pelanggaran.no_sanksi = sanksi.no_sanksi left join keamanan on pelanggaran.id_keamanan = keamanan.id_keamanan order by id_pelanggaran asc";
                                                $hasil = $pelanggaran->lihat($sql);
                                            }
                                            $no = 1;
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["no_pelanggaran"]; ?></td>
                                            <td><?php echo $isi["nama_pelanggaran"]; ?></td>
                                            <td><?php echo $isi["no_sanksi"]." - ".$isi["nama_sanksi"]; ?></td>
                                            <td><?php echo $isi["id_keamanan"]." - ".$isi["nama_keamanan"]; ?></td>
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