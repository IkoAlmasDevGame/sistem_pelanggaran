<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION["role"] == "admin" || $_SESSION["role"] == "bk" || $_SESSION["role"] == "wali"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Data Master Pengguna</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="container p-auto m-4">
            <div class="panel panel-default bg-body-tertiarity">
                <div class="panel-body">
                    <h4 class="panel-heading fs-4 fst-normal">Data Master Pengguna</h4>
                </div>
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title display-5
                             text-dark fs-5 fst-normal fw-normal text-center">
                                Master Pengguna - Sistem Pelanggaran Siswa / i -</h4>
                            <div class="form-group">
                                <div class="text-end">
                                    <a href="?page=lihat-pengguna" role="button"
                                        class="btn btn-sm btn-default hover bg-info text-light">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1"></div>
                        <div class="table-responsive">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Nama Pengguna</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        if(isset($_GET["nama"])){
                                            $nama = htmlspecialchars($_GET["nama"]);
                                            $row = $configs->prepare("SELECT * FROM pengguna WHERE nama like ?");
                                            $row->execute(array($nama));
                                            $hasil = $row->fetchAll();
                                        }else{
                                            $hasil = $auth->lihat("SELECT * FROM pengguna order by id_pengguna asc");
                                        }
                                        foreach ($hasil as $isi) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["username"]; ?></td>
                                            <td><?php echo $isi["email"]; ?></td>
                                            <td>Ter-enkripsi</td>
                                            <td><?php echo $isi["nama"]; ?></td>
                                            <td><?php echo $isi["role"]; ?></td>
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