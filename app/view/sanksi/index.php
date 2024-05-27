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
                        <h4 class="panel-heading">Data Master Khusus Sanksi</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Master Sanksi</h4>
                            <a href="" role="button" aria-current="page" data-bs-target="#tambah" data-bs-toggle="modal"
                                class="btn btn-danger hover">
                                <i class="bi bi-plus"></i>
                                <span>Tambah Data sanksi</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambah" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Data Sanksi</h4>
                                                <button type='button' class='btn btn-close'
                                                    data-bs-dismiss='modal'></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-sanksi" method="post">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <label for="">No Sanksi</label>
                                                                <input type="text" name="no_sanksi" maxlength="5"
                                                                    placeholder="masukkan no sanksi" required
                                                                    class="form-control" id="no_sanksi">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Sanksi</label>
                                                                <input type="text" name="nama_sanksi" maxlength="25"
                                                                    placeholder="masukkan nama sanksi" required
                                                                    class="form-control" id="nama_sanksi">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Jenis Sanksi</label>
                                                                <input type="text" name="jenis_sanksi" maxlength="25"
                                                                    placeholder="masukkan jenis sanksi" required
                                                                    class="form-control" id="jenis_sanksi">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-primary hover">Simpan</button>
                                                        <button type='button' class='btn btn-default'
                                                            data-bs-dismiss='modal'>Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = "SELECT * FROM sanksi order by id_sanksi asc";
                                            $hasil = $sanksi->lihat($sql);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["no_sanksi"] ?></td>
                                            <td><?php echo $isi["nama_sanksi"] ?></td>
                                            <td><?php echo $isi["jenis_sanksi"] ?></td>
                                            <td>
                                                <a href="" role="button" aria-current="page"
                                                    data-bs-target="#edit<?=$isi["id_sanksi"]?>" data-bs-toggle="modal"
                                                    class="btn btn-warning btn-sm hover">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=delete-sanksi&id_sanksi=<?=$isi["id_sanksi"]?>"
                                                    role="button" aria-current="page" onclick="return confirm('')"
                                                    class="btn btn-danger btn-sm hover">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="edit<?=$isi["id_sanksi"]?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data Sanksi</h4>
                                                                <button type='button' class='btn btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=update-sanksi" method="post">
                                                                    <input type="hidden" name="id_sanksi"
                                                                        value="<?=$isi["id_sanksi"]?>">
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Sanksi</label>
                                                                                <input type="text" name="no_sanksi"
                                                                                    maxlength="5"
                                                                                    value="<?=$isi["no_sanksi"]?>"
                                                                                    placeholder="masukkan no sanksi"
                                                                                    required class="form-control"
                                                                                    id="no_sanksi">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Sanksi</label>
                                                                                <input type="text" name="nama_sanksi"
                                                                                    maxlength="25"
                                                                                    value="<?=$isi["nama_sanksi"]?>"
                                                                                    placeholder="masukkan nama sanksi"
                                                                                    required class="form-control"
                                                                                    id="nama_sanksi">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Jenis Sanksi</label>
                                                                                <input type="text" name="jenis_sanksi"
                                                                                    maxlength="25"
                                                                                    value="<?=$isi["jenis_sanksi"]?>"
                                                                                    placeholder="masukkan jenis sanksi"
                                                                                    required class="form-control"
                                                                                    id="jenis_sanksi">
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