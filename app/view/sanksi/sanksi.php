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
        ?> <title>Data Master Sanksi</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Sanksi</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Master Sanksi</h4>
                            <div class="text-end">
                                <a href="?page=lihat-sanksi" class="btn btn-info hover">
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
                                            <th>No Sanksi</th>
                                            <th>Nama Sanksi</th>
                                            <th>Jenis Sanksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            if(isset($_GET["no_sanksi"])){
                                                $row = $configs->prepare("SELECT * FROM sanksi WHERE no_sanksi = ? order by id_sanksi asc");
                                                $row->execute(array($_GET["no_sanksi"]));
                                                $hasil = $row->fetchAll();
                                            }else{
                                                $sql = "SELECT * FROM sanksi order by id_sanksi asc";
                                                $hasil = $sanksi->lihat($sql);
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["no_sanksi"] ?></td>
                                            <td><?php echo $isi["nama_sanksi"] ?></td>
                                            <td><?php echo $isi["jenis_sanksi"] ?></td>
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