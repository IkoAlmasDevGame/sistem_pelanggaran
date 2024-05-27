<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION["role"] == "admin"){
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
                        <h4 class="panel-heading fs-4 fst-normal">Data Master Khusus Wali Kelas</h4>
                    </div>
                </div>
                <div class="container-fluid p-1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Master Khusus Wali Kelas</h4>
                            <div class="form-group">
                                <div class="text-end">
                                    <a href="?page=walikelas" role="button"
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
                                            <th>Kelas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $wali->Lihat("SELECT walikelas.*, kelas.id_kelas, kelas.nama_kelas FROM walikelas left join
                                            kelas on walikelas.id_kelas = kelas.id_kelas order by id_wali asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                                <a href="?page=lihat-pengguna&nama=<?=$isi['nama_wali']?>"
                                                    aria-current="page" class="text-decoration-none text-primary">
                                                    <?php echo $isi["nama_wali"]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-kelas&id_kelas=<?=$isi["id_kelas"]?>"
                                                    aria-current="page" class="text-decoration-none text-primary">
                                                    <?php echo $isi["nama_kelas"]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" role="button" aria-current="page"
                                                    data-bs-target="#edit<?=$isi["id_wali"]?>" data-bs-toggle="modal"
                                                    class="btn btn-warning hover text-light">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <!-- <a href="?aksi=delete-waklas&id=<?=$isi['id_kelas']?>"
                                                    onclick="return confirm('Apakah data ini akan anda hapus ?')"
                                                    aria-current="page" class="btn btn-danger hover text-light">
                                                    <i class="fa fa-trash"></i>
                                                </a> -->
                                                <div class="modal fade" id="edit<?=$isi["id_wali"]?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Tambah Wali Kelas</h4>
                                                                <button type='button' class='btn btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="modal-body">
                                                                    <form action="?aksi=update-waklas" method="post">
                                                                        <input type="hidden" name="id_wali"
                                                                            value="<?=$isi["id_wali"]?>">
                                                                        <table class="table table-striped-columns">
                                                                            <tr>
                                                                                <td>
                                                                                    <label for="">Nama Wali
                                                                                        Kelas</label>
                                                                                    <input type="text" name="nama_wali"
                                                                                        id="nama_wali" required
                                                                                        value="<?=$isi["nama_wali"]?>"
                                                                                        placeholder="nama wali kelas anda ..."
                                                                                        class="form-control form-control-border">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <label for="">Kelas Wali
                                                                                        Kelas</label>
                                                                                    <select name="id_kelas"
                                                                                        class="form-control form-select"
                                                                                        id="id_kelas">
                                                                                        <option value="">Pilih Kelas
                                                                                            untuk Wali Kelas
                                                                                        </option>
                                                                                        <?php 
                                                                                            $hasil = $configs->prepare("SELECT * FROM kelas
                                                                                             order by id_kelas asc");
                                                                                            $hasil->execute();
                                                                                            $row = $hasil->fetchAll();
                                                                                            foreach ($row as $k) {
                                                                                        ?>
                                                                                        <option
                                                                                            value="<?=$k['id_kelas']?>">
                                                                                            <?php echo $k['nama_kelas'] ?>
                                                                                        </option>
                                                                                        <?php
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary hover text-light">
                                                                                Simpan
                                                                            </button>
                                                                            <button type='button'
                                                                                class='btn btn-secondary hover text-light'
                                                                                data-bs-dismiss='modal'>Batal</button>
                                                                        </div>
                                                                    </form>
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