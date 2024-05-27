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
                        <h4 class="panel-heading">Data Master Khusus Keamanan</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Master Keamanan</h4>
                            <a href="" aria-current="page" role="button" data-bs-toggle="modal" data-bs-target="#tambah"
                                class="btn btn-danger hover">
                                <i class="bi bi-plus"></i>
                                <span>Tambah Keamanan</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambah" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Data Keamanan</h4>
                                                <button type='button' class='btn-close'
                                                    data-bs-dismiss='modal'></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-keamanan" method="post">
                                                    <table class="table table-striped-columns">
                                                        <tr>
                                                            <td>
                                                                <label for="">ID Keamanan</label>
                                                                <input type="text" name="id_keamanan" required
                                                                    class="form-control"
                                                                    placeholder="masukkan angka id keamanan"
                                                                    maxlength="5" id="id_keamanan">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Pengguna</label>
                                                                <select name="id_pengguna" required
                                                                    class="form-control form-select" id="id_pengguna">
                                                                    <option value="">Pilih Nama Wali Kelas</option>
                                                                    <?php 
                                                                        $hasil = $auth->lihat("SELECT * FROM pengguna where role = 'wali' order by id_pengguna asc");
                                                                        foreach ($hasil as $i) {
                                                                    ?>
                                                                    <option value="<?=$i["id_pengguna"]?>">
                                                                        <?php echo $i["nama"] ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Keamanan</label>
                                                                <input type="text" name="nama_keamanan"
                                                                    id="nama_keamanan"
                                                                    placeholder="masukkan nama penjaga keamanan"
                                                                    class="form-control" required>
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
                            <div class="text-end">
                                <a href="?page=keamanan" aria-current="page" class="btn btn-info hover">
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
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = "SELECT keamanan.*, pengguna.id_pengguna, pengguna.nama FROM keamanan left join pengguna on
                                             keamanan.id_pengguna = pengguna.id_pengguna order by id asc";
                                            $hasil = $keamanan->lihat($sql);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["id_keamanan"] ?></td>
                                            <td><?php echo $isi["nama"] ?></td>
                                            <td><?php echo $isi["nama_keamanan"] ?></td>
                                            <td>
                                                <a href="" role="button" data-bs-target="#edit<?=$isi["id_keamanan"]?>"
                                                    data-bs-toggle="modal" class="btn btn-warning hover btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=delete-keamanan&id=<?=$isi["id"]?>"
                                                    onclick="return confirm('')" class="btn btn-danger hover btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="edit<?=$isi["id_keamanan"]?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data Keamanan</h4>
                                                                <button type='button' class='btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=update-keamanan" method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi["id"]?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">ID Keamanan</label>
                                                                                <input type="text" name="id_keamanan"
                                                                                    required class="form-control"
                                                                                    value="<?=$isi["id_keamanan"]?>"
                                                                                    placeholder="masukkan angka id keamanan"
                                                                                    maxlength="5" id="id_keamanan">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Pengguna</label>
                                                                                <select name="id_pengguna" required
                                                                                    class="form-control form-select"
                                                                                    id="id_pengguna">
                                                                                    <option value="">Pilih Nama Wali
                                                                                        Kelas</option>
                                                                                    <?php 
                                                                                        $hasil = $auth->lihat("SELECT * FROM pengguna where role = 'wali' order by id_pengguna asc");
                                                                                        foreach ($hasil as $i) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi["id_pengguna"] == $i["id_pengguna"]){?>
                                                                                        selected
                                                                                        value="<?=$i["id_pengguna"]?>"
                                                                                        <?php } ?>>
                                                                                        <?php echo $i["nama"] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Keamanan</label>
                                                                                <input type="text" name="nama_keamanan"
                                                                                    id="nama_keamanan"
                                                                                    value="<?=$isi["nama_keamanan"]?>"
                                                                                    placeholder="masukkan nama penjaga keamanan"
                                                                                    class="form-control" required>
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