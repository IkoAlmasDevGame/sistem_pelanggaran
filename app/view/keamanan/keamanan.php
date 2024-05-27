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
        ?> <title>Data Master Keamanan</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Keamanan</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Master Keamanan</h4>
                            <div class="text-end">
                                <a href="?page=lihat-keamanan" aria-current="page" class="btn btn-info hover">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-md">
                            <div class="card-body">
                                <table class="table table-stripped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Keamanan</th>
                                            <th>Nama Pengguna</th>
                                            <th>Nama Keamanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            if(isset($_GET["id_keamanan"])){
                                            $row = $configs->prepare("SELECT keamanan.*, pengguna.id_pengguna, pengguna.nama FROM keamanan left join pengguna on
                                             keamanan.id_pengguna = pengguna.id_pengguna WHERE id_keamanan = ?");
                                            $row->execute(array($_GET["id_keamanan"]));
                                            $hasil = $row->fetchAll();
                                            }else{
                                            $sql = "SELECT keamanan.*, pengguna.id_pengguna, pengguna.nama FROM keamanan left join pengguna on
                                             keamanan.id_pengguna = pengguna.id_pengguna order by id asc";
                                            $hasil = $keamanan->lihat($sql);
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["id_keamanan"] ?></td>
                                            <td><?php echo $isi["nama"] ?></td>
                                            <td><?php echo $isi["nama_keamanan"] ?></td>
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