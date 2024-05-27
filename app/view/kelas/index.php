<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION["role"] == "admin"){
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
                        <h4 class="panel-heading">Data Master Khusus Kelas</h4>
                    </div>
                </div>
                <div class="container py-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-group">
                                <?php 
                                    if(isset($_GET["id_kelas"])){
                                        $row = $configs->prepare("SELECT * FROM kelas WHERE id_kelas = ?");
                                        $row->execute(array($_GET["id_kelas"]));
                                        $hasil = $row->fetchAll();
                                        foreach ($hasil as $i) {
                                ?>
                                <form action="?aksi=update-kelas" method="post">
                                    <input type="hidden" name="id_kelas" value="<?=$i["id_kelas"]?>">
                                    <div class="d-flex position-relative flex-wrap gap-1">
                                        <input type="text" style="width: 25pc; max-width: 25pc;" name="nama_kelas"
                                            value="<?=$i["nama_kelas"]?>" id="nama_kelas"
                                            placeholder="masukkan nama kelas ..." required
                                            class="form-control form-control-border">
                                        <button type="submit" class="btn btn-primary hover">Update</button>
                                    </div>
                                </form>
                                <?php
                                    }
                                }else{
                                ?>
                                <form action="?aksi=create-kelas" method="post">
                                    <div class="d-flex position-relative flex-wrap gap-1">
                                        <input type="text" style="width: 25pc; max-width: 25pc;" name="nama_kelas"
                                            id="nama_kelas" placeholder="masukkan nama kelas ..." required
                                            class="form-control form-control-border">
                                        <button type="submit" class="btn btn-primary hover">Simpan</button>
                                    </div>
                                </form>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="text-end">
                                <a href="?page=kelas" role="button" class="btn btn-info btn-sm hover">
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
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $kelas->lihat("SELECT * FROM kelas order by id_kelas asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["nama_kelas"] ?></td>
                                            <td>
                                                <a href="?page=kelas&id_kelas=<?=$isi["id_kelas"]?>" aria-current="page"
                                                    class="btn btn-secondary btn-sm hover">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=delete-kelas&id_kelas=<?=$isi["id_kelas"]?>"
                                                    onclick="return confirm('Apakah anda ingin menghapus data ini ?')"
                                                    aria-current="page" class="btn btn-danger btn-sm hover">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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