<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION["role"] == "admin" || $_SESSION["role"] == "wali" || $_SESSION["role"] == "bk"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Data Master Wali Kelas</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid py-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading fs-4 fst-normal">Data Master Wali Kelas</h4>
                    </div>
                </div>
                <div class="container-fluid p-1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Master Wali Kelas</h4>
                            <div class="form-group">
                                <div class="text-end">
                                    <a href="?page=lihat-walikelas" role="button"
                                        class="btn btn-sm btn-default hover bg-info text-light">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1"></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Wali Kelas</th>
                                            <th>Wali Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            if(isset($_GET["id_wali"])){
                                                $row = $configs->prepare("SELECT walikelas.*, kelas.id_kelas, kelas.nama_kelas FROM walikelas left join
                                                 kelas on walikelas.id_kelas = kelas.id_kelas WHERE id_wali = ? order by id_wali asc");
                                                $row->execute(array($_GET["id_wali"]));
                                                $hasil = $row->fetchAll();
                                            }else{
                                                $hasil = $wali->Lihat("SELECT walikelas.*, kelas.id_kelas, kelas.nama_kelas FROM walikelas left join
                                                 kelas on walikelas.id_kelas = kelas.id_kelas order by id_wali asc");
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["nama_wali"]; ?></td>
                                            <td><?php echo $isi["nama_kelas"]; ?></td>
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