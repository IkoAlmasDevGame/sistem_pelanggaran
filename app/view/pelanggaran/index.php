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
        ?> <title>Data Master Pelanggaran</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Khusus Pelanggaran</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <a href="" role="button" aria-current="page" data-bs-target="#tambah" data-bs-toggle="modal"
                                class="btn btn-danger hover">
                                <i class="bi bi-plus"></i>
                                <span>Tambah Data Pelanggaran</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambah" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Data Pelanggaran</h4>
                                                <button type='button' class='btn btn-close'
                                                    data-bs-dismiss='modal'></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-pelanggaran" method="post">
                                                    <table class="table table-striped-columns">
                                                        <tr>
                                                            <td>
                                                                <label for="">No Pelanggaran</label>
                                                                <input type="text" placeholder="" class="form-control"
                                                                    maxlength="5" name="no_pelanggaran" required
                                                                    id="no_pelanggaran">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Pelanggaran</label>
                                                                <input type="text" placeholder="" class="form-control"
                                                                    maxlength="25" name="nama_pelanggaran" required
                                                                    id="nama_pelanggaran">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">No Sanksi</label>
                                                                <select name="no_sanksi"
                                                                    class="form-control form-select" required
                                                                    id="no_sanksi">
                                                                    <option value="">Pilih Nama Sanksi</option>
                                                                    <?php 
                                                                        $hasil = $sanksi->lihat("SELECT * FROM sanksi order by id_sanksi asc");
                                                                        foreach ($hasil as $k) {
                                                                    ?>
                                                                    <option value="<?=$k['no_sanksi']?>">
                                                                        <?php echo $k["nama_sanksi"] ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">ID Keamanan</label>
                                                                <select name="id_keamanan"
                                                                    class="form-control form-select" required
                                                                    id="id_keamanan">
                                                                    <option value="">Pilih Nama Keamanan</option>
                                                                    <?php 
                                                                        $hasil = $keamanan->lihat("SELECT * FROM keamanan order by id asc");
                                                                        foreach ($hasil as $i) {
                                                                    ?>
                                                                    <option value="<?=$i["id_keamanan"]?>">
                                                                        <?php echo $i["nama_keamanan"] ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
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
                                <a href="?page=pelanggaran" role="button" class="btn btn-info hover">
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
                                            <th>No Pelanggaran</th>
                                            <th>Nama Pelanggaran</th>
                                            <th>No Sanksi</th>
                                            <th>ID Keamanan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = "SELECT pelanggaran.*, sanksi.no_sanksi, sanksi.nama_sanksi, keamanan.id_keamanan, keamanan.nama_keamanan FROM pelanggaran left join sanksi on pelanggaran.no_sanksi = sanksi.no_sanksi left join keamanan on pelanggaran.id_keamanan = keamanan.id_keamanan order by id_pelanggaran asc";
                                            $hasil = $pelanggaran->lihat($sql);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["no_pelanggaran"]; ?></td>
                                            <td><?php echo $isi["nama_pelanggaran"]; ?></td>
                                            <td><?php echo $isi["no_sanksi"]." - ".$isi["nama_sanksi"]; ?></td>
                                            <td><?php echo $isi["id_keamanan"]." - ".$isi["nama_keamanan"]; ?></td>
                                            <td>
                                                <a href="" role="button" aria-current="page"
                                                    data-bs-target="#edit<?=$isi["id_pelanggaran"]?>"
                                                    data-bs-toggle="modal" class="btn btn-warning btn-sm hover">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=delete-pelanggaran&id_pelanggaran=<?=$isi["id_pelanggaran"]?>"
                                                    role="button" aria-current="page" onclick="return confirm('')"
                                                    class="btn btn-danger btn-sm hover">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="edit<?=$isi["id_pelanggaran"]?>"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data Pelanggaran</h4>
                                                                <button type='button' class='btn btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=update-pelanggaran" method="post">
                                                                    <input type="hidden" name="id_pelanggaran"
                                                                        value="<?=$isi["id_pelanggaran"]?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Pelanggaran</label>
                                                                                <input type="text" placeholder=""
                                                                                    value="<?=$isi["no_pelanggaran"]?>"
                                                                                    class="form-control" maxlength="5"
                                                                                    name="no_pelanggaran" required
                                                                                    id="no_pelanggaran">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Pelanggaran</label>
                                                                                <input type="text" placeholder=""
                                                                                    value="<?=$isi["nama_pelanggaran"]?>"
                                                                                    class="form-control" maxlength="25"
                                                                                    name="nama_pelanggaran" required
                                                                                    id="nama_pelanggaran">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Sanksi</label>
                                                                                <select name="no_sanksi"
                                                                                    class="form-control form-select"
                                                                                    required id="no_sanksi">
                                                                                    <option value="">Pilih Nama Sanksi
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $sanksi->lihat("SELECT * FROM sanksi order by id_sanksi asc");
                                                                                        foreach ($hasil as $k) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi["no_sanksi"] == $k["no_sanksi"]){?>
                                                                                        selected
                                                                                        value="<?=$k['no_sanksi']?>"
                                                                                        <?php } ?>
                                                                                        value="<?=$k['no_sanksi']?>">
                                                                                        <?php echo $k["nama_sanksi"] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">ID Keamanan</label>
                                                                                <select name="id_keamanan"
                                                                                    class="form-control form-select"
                                                                                    required id="id_keamanan">
                                                                                    <option value="">Pilih Nama Keamanan
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $keamanan->lihat("SELECT * FROM keamanan order by id asc");
                                                                                        foreach ($hasil as $i) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi["id_keamanan"] == $i["id_keamanan"]){?>
                                                                                        selected
                                                                                        value="<?=$i["id_keamanan"]?>"
                                                                                        <?php } ?>
                                                                                        value="<?=$i["id_keamanan"]?>">
                                                                                        <?php echo $i["nama_keamanan"] ?>
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
                                                                            class="btn btn-primary hover">Simpan</button>
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