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
        <title>Data Master Siswa</title>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="panel panel-default bg-body-tertiarity">
                    <div class="panel-body">
                        <h4 class="panel-heading">Data Master Khusus Siswa</h4>
                    </div>
                </div>
                <div class="container-fluid py-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-group">
                                <a href="" class="btn btn-danger hover" role="button" data-bs-target="#tambah"
                                    data-bs-toggle="modal" aria-current="page">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah Siswa/i</span>
                                </a>
                            </div>
                            <div class="modal fade" id="tambah" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Siswa</h4>
                                            <button type='button' class='btn btn-close'
                                                data-bs-dismiss='modal'></button>
                                        </div>
                                        <div class="form-group">
                                            <div class="modal-body">
                                                <form action="?aksi=create-siswa" method="post">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <label for="">Nomer Induk Siswa</label>
                                                                <input type="text" name="nis"
                                                                    class="form-control form-control-border" id="nis"
                                                                    placeholder="masukkan nomer induk siswa" required
                                                                    maxlength="10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Siswa</label>
                                                                <input type="text" name="nama_siswa"
                                                                    class="form-control form-control-border"
                                                                    id="nama_siswa" placeholder="masukkan Nama Siswa"
                                                                    required maxlength="80">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Kelas</label>
                                                                <select name="id_kelas" required
                                                                    class="form-control form-select" id="id_kelas">
                                                                    <option value="">Pilih Kelas</option>
                                                                    <?php 
                                                                        $hasil = $kelas->lihat("SELECT * FROM kelas order by id_kelas asc");
                                                                        foreach ($hasil as $k) {
                                                                    ?>
                                                                    <option value="<?=$k['id_kelas']?>">
                                                                        <?=$k['nama_kelas']?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Wali Kelas</label>
                                                                <select name="id_wali" required
                                                                    class="form-control form-select" id="id_wali">
                                                                    <option value="">Pilih Wali Kelas</option>
                                                                    <?php 
                                                                        $hasil = $wali->lihat("SELECT * FROM walikelas order by id_Wali asc");
                                                                        foreach ($hasil as $w) {
                                                                    ?>
                                                                    <option value="<?=$w['id_wali']?>">
                                                                        <?=$w['nama_wali']?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Petugas Keamanan</label>
                                                                <select name="id_keamanan" required
                                                                    class="form-control form-select" id="id_keamanan">
                                                                    <option value="">Pilih Petugas Keamanan</option>
                                                                    <?php 
                                                                        $hasil = $keamanan->lihat("SELECT * FROM keamanan order by id asc");
                                                                        foreach ($hasil as $a) {
                                                                    ?>
                                                                    <option value="<?=$a['id_keamanan']?>">
                                                                        <?=$a['nama_keamanan']?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Sanksi</label>
                                                                <select name="no_sanksi" required
                                                                    class="form-control form-select" id="no_sanksi">
                                                                    <option value="">Pilih Nama Sanksi</option>
                                                                    <?php 
                                                                        $hasil = $sanksi->lihat("SELECT * FROM sanksi order by id_sanksi asc");
                                                                        foreach ($hasil as $s) {
                                                                    ?>
                                                                    <option value="<?=$s['no_sanksi']?>">
                                                                        <?=$s['nama_sanksi']?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Pelanggaran</label>
                                                                <select name="no_pelanggaran" required
                                                                    class="form-control form-select"
                                                                    id="no_pelanggaran">
                                                                    <option value="">Pilih Nama Pelanggaran</option>
                                                                    <?php 
                                                                        $hasil = $pelanggaran->lihat("SELECT * FROM pelanggaran order by id_pelanggaran asc");
                                                                        foreach ($hasil as $p) {
                                                                    ?>
                                                                    <option value="<?=$p['no_pelanggaran']?>">
                                                                        <?=$p['nama_pelanggaran']?></option>
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
                                <a href="?page=siswa" class="btn btn-info hover">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-md">
                            <div class="card-body my-1">
                                <table class="table table-stripped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nis</th>
                                            <th style="width:9pc; max-width: 11pc;">Nama Siswa</th>
                                            <th style="width:9pc; max-width: 9.5pc;">Kelas</th>
                                            <th style="width:10.2pc; max-width: 10.25pc;">Wali Kelas</th>
                                            <th style="width:14.5pc; max-width: 15.5pc;">Petugas Keamanan</th>
                                            <th style="width:10pc; max-width: 10pc;">No Sanksi</th>
                                            <th style="width:10pc; max-width: 10pc;">No Pelanggaran</th>
                                            <th style="width: 5pc; max-width: 6pc;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql = "SELECT siswa.*, kelas.id_kelas, kelas.nama_kelas, walikelas.id_wali, walikelas.nama_wali,
                                             keamanan.id_keamanan, keamanan.nama_keamanan, sanksi.no_sanksi, sanksi.nama_sanksi, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran FROM siswa left join kelas on siswa.id_kelas = kelas.id_kelas left join walikelas on siswa.id_wali = walikelas.id_wali left join keamanan on siswa.id_keamanan = keamanan.id_keamanan left join sanksi on siswa.no_sanksi = sanksi.no_sanksi left join pelanggaran on siswa.no_pelanggaran = pelanggaran.no_pelanggaran order by id_siswa asc";
                                            $hasil = $siswa->lihat($sql);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["nis"]; ?></td>
                                            <td><?php echo $isi["nama_siswa"]; ?></td>
                                            <td><?php echo $isi["nama_kelas"] ?></td>
                                            <td><?php echo $isi["nama_wali"] ?></td>
                                            <td><?php echo $isi["nama_keamanan"] ?></td>
                                            <td><?php echo $isi["no_sanksi"]." - ".$isi["nama_sanksi"] ?></td>
                                            <td><?php echo $isi["no_pelanggaran"]." - ".$isi["nama_pelanggaran"] ?></td>
                                            <td>
                                                <a href="" role="button" aria-current="page"
                                                    data-bs-target="#edit<?=$isi["id_siswa"]?>" data-bs-toggle="modal"
                                                    class="btn btn-warning btn-sm hover">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=delete-siswa&id_siswa=<?=$isi["id_siswa"]?>"
                                                    aria-current="page" onclick="return confirm('')"
                                                    class="btn btn-danger hover btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="edit<?=$isi["id_siswa"]?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data Siswa -
                                                                    <?php echo $isi["nama_siswa"] ?></h4>
                                                                <button type='button' class='btn btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="post" class="form-group">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Kelas</label>
                                                                                <select name="id_kelas" required
                                                                                    class="form-control form-select"
                                                                                    id="id_kelas">
                                                                                    <option value="">Pilih Kelas
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $kelas->lihat("SELECT * FROM kelas order by id_kelas asc");
                                                                                        foreach ($hasil as $k) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['id_kelas'] == $k['id_kelas']){?>
                                                                                        value="<?=$k['id_kelas']?>"
                                                                                        selected <?php } ?>
                                                                                        value="<?=$k['id_kelas']?>">
                                                                                        <?=$k['nama_kelas']?></option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Wali Kelas</label>
                                                                                <select name="id_wali" required
                                                                                    class="form-control form-select"
                                                                                    id="id_wali">
                                                                                    <option value="">Pilih Wali Kelas
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $wali->lihat("SELECT * FROM walikelas order by id_Wali asc");
                                                                                        foreach ($hasil as $w) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['id_wali'] == $w['id_wali']){?>
                                                                                        value="<?=$w['id_wali']?>"
                                                                                        selected <?php } ?>
                                                                                        value="<?=$w['id_wali']?>">
                                                                                        <?=$w['nama_wali']?></option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Petugas Keamanan</label>
                                                                                <select name="id_keamanan" required
                                                                                    class="form-control form-select"
                                                                                    id="id_keamanan">
                                                                                    <option value="">Pilih Petugas
                                                                                        Keamanan</option>
                                                                                    <?php 
                                                                                        $hasil = $keamanan->lihat("SELECT * FROM keamanan order by id asc");
                                                                                        foreach ($hasil as $a) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['id_keamanan'] == $a['id_keamanan']){?>
                                                                                        value="<?=$a['id_keamanan']?>"
                                                                                        selected <?php } ?>
                                                                                        value="<?=$a['id_keamanan']?>">
                                                                                        <?=$a['nama_keamanan']?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Sanksi</label>
                                                                                <select name="no_sanksi" required
                                                                                    class="form-control form-select"
                                                                                    id="no_sanksi">
                                                                                    <option value="">Pilih Nama Sanksi
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $sanksi->lihat("SELECT * FROM sanksi order by id_sanksi asc");
                                                                                        foreach ($hasil as $s) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['no_sanksi'] == $s['no_sanksi']){?>
                                                                                        value="<?=$s['no_sanksi']?>"
                                                                                        selected <?php } ?>
                                                                                        value="<?=$s['no_sanksi']?>">
                                                                                        <?=$s['nama_sanksi']?></option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Pelanggaran</label>
                                                                                <select name="no_pelanggaran" required
                                                                                    class="form-control form-select"
                                                                                    id="no_pelanggaran">
                                                                                    <option value="">Pilih Nama
                                                                                        Pelanggaran</option>
                                                                                    <?php 
                                                                                        $hasil = $pelanggaran->lihat("SELECT * FROM pelanggaran order by id_pelanggaran asc");
                                                                                        foreach ($hasil as $p) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['no_pelanggaran'] == $p['no_pelanggaran']){?>
                                                                                        value="<?=$p['no_pelanggaran']?>"
                                                                                        selected <?php } ?>
                                                                                        value="<?=$p['no_pelanggaran']?>">
                                                                                        <?=$p['nama_pelanggaran']?>
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