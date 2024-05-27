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
        <title>Data Master Kelas</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Kelas</h4>
                    </div>
                </div>
                <div class="container py-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-end">
                                <a href="?page=lihat-kelas" role="button" class="btn btn-info btn-sm hover">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body my-1">
                            <div class="table-responsive">
                                <table class="table table-stripped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            if(isset($_GET["id_kelas"])){
                                                $row = $configs->prepare("SELECT * FROM kelas WHERE id_kelas = ? order by id_kelas asc");
                                                $row->execute(array($_GET["id_kelas"]));
                                                $hasil = $row->fetchAll();
                                            }else{
                                                $hasil = $kelas->lihat("SELECT * FROM kelas order by id_kelas asc");
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["nama_kelas"] ?></td>
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