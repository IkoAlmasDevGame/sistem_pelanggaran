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
        <title>Data Master Pengguna</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="container p-auto m-4">
            <div class="panel panel-default bg-body-tertiarity">
                <div class="panel-body">
                    <h4 class="panel-heading fs-4 fst-normal">Data Master Khusus Pengguna</h4>
                </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title display-5
                             text-dark fs-5 fst-normal fw-normal text-center">
                            Master Pengguna - Sistem Pelanggaran Siswa / i -</h4>
                        <div class="form-group">
                            <a href="" role="button" data-bs-target="#tambah" data-bs-toggle="modal"
                                class="btn btn-sm btn-default hover bg-danger text-light">
                                <i class="bi bi-plus"></i>
                                <span>Tambah Pengguna</span>
                            </a>
                            <div class="text-end">
                                <a href="?page=pengguna" role="button"
                                    class="btn btn-sm btn-default hover bg-info text-light">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </div>
                            <div class="modal fade" id="tambah" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create Account</h4>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="modal-title fs-6 fst-normal fw-normal text-center">Sistem
                                                Informasi Pelanggaran Siswa/Siswi</h4>
                                            <div class="form-group">
                                                <form action="?aksi=create-pengguna" method="post">
                                                    <table class="table table-striped-columns">
                                                        <tr>
                                                            <td>
                                                                <label for="">Username : </label>
                                                                <input type="text" name="username"
                                                                    placeholder="masukkan username baru" maxlength="100"
                                                                    id="username"
                                                                    class="form-control form-control-static form-control-border"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Email : </label>
                                                                <input type="email" name="email"
                                                                    placeholder="masukkan email baru" maxlength="100"
                                                                    id="email"
                                                                    class="form-control form-control-static form-control-border"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Password : </label>
                                                                <input type="password" name="password"
                                                                    placeholder="masukkan password baru" maxlength="255"
                                                                    id="password"
                                                                    class="form-control form-control-border form-control-static"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama :</label>
                                                                <input type="text" name="nama"
                                                                    placeholder="masukkan nama anda" maxlength="80"
                                                                    id="nama"
                                                                    class="form-control form-control-border form-control-static"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Jabatan : </label>
                                                                <br>
                                                                <input type="radio" name="role" value="admin"
                                                                    class="radio-inline" required id="role"> Admin
                                                                <input type="radio" name="role" value="bk"
                                                                    class="radio-inline" required id="role">
                                                                Bimbingan Konseling
                                                                <input type="radio" name="role" value="wali"
                                                                    class="radio-inline" required id="role"> Wali
                                                                Kelas
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary hover text-light">
                                                            Simpan
                                                        </button>
                                                        <button type='button' class='btn btn-secondary hover text-light'
                                                            data-bs-dismiss='modal'>Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $no = 1;
                                            $hasil = $auth->lihat("SELECT * FROM pengguna order by id_pengguna asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $isi["username"]; ?></td>
                                        <td><?php echo $isi["email"]; ?></td>
                                        <td>Ter-enkripsi</td>
                                        <td><?php echo $isi["nama"]; ?></td>
                                        <td><?php echo $isi["role"]; ?></td>
                                        <td>
                                            <a href="" data-bs-target="#edit<?=$isi["id_pengguna"]?>"
                                                data-bs-toggle="modal" aria-current="page"
                                                class="btn btn-sm btn-default bg-info text-light hover">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="?aksi=delete-pengguna&id=<?=$isi["id_pengguna"]?>"
                                                aria-current="page"
                                                onclick="return confirm('apakah anda ingin menghapus data ini ?');"
                                                class="btn btn-sm btn-default bg-danger text-light hover">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="modal fade" id="edit<?=$isi["id_pengguna"]?>" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title fs-6 fst-normal fw-normal">Edit
                                                                Account</h4>
                                                            <button type='button' class='btn-close'
                                                                data-bs-dismiss='modal'></button>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="modal-body">
                                                                <form action="?aksi=update-pengguna" method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi["id_pengguna"]?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Username : </label>
                                                                                <input type="text" name="username"
                                                                                    placeholder="masukkan username baru"
                                                                                    maxlength="100" id="username"
                                                                                    value="<?=$isi["username"]?>"
                                                                                    class="form-control form-control-static form-control-border"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Email : </label>
                                                                                <input type="email" name="email"
                                                                                    placeholder="masukkan email baru"
                                                                                    maxlength="100" id="email"
                                                                                    value="<?=$isi["email"]?>"
                                                                                    class="form-control form-control-static form-control-border"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Password : </label>
                                                                                <input type="password" name="password"
                                                                                    placeholder="masukkan password baru"
                                                                                    maxlength="255" id="password"
                                                                                    class="form-control form-control-border form-control-static"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama :</label>
                                                                                <input type="text" name="nama"
                                                                                    placeholder="masukkan nama anda"
                                                                                    maxlength="80" id="nama"
                                                                                    value="<?=$isi["nama"]?>"
                                                                                    class="form-control form-control-border form-control-static"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Jabatan : </label>
                                                                                <br>
                                                                                <input type="radio" name="role"
                                                                                    <?php if($isi["role"] == "admin"){?>
                                                                                    checked value="admin" <?php } ?>
                                                                                    value="admin" class="radio-inline"
                                                                                    required id="role"> Admin
                                                                                <input type="radio" name="role"
                                                                                    <?php if($isi["role"] == "bk"){?>
                                                                                    checked value="bk" <?php } ?>
                                                                                    value="bk" class="radio-inline"
                                                                                    required id="role">
                                                                                Bimbingan Konseling
                                                                                <input type="radio" name="role"
                                                                                    <?php if($isi["role"] == "wali"){?>
                                                                                    checked value="wali" <?php } ?>
                                                                                    value="wali" class="radio-inline"
                                                                                    required id="role"> Wali Kelas
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary hover text-light">
                                                                            Update
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
        <?php 
            require_once("../ui/footer.php");
        ?>