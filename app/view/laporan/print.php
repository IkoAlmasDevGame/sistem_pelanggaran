<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if($_SESSION["role"] == "bk" || $_SESSION["role"] == "wali"){
                require_once("../ui/header.php");
                require_once("../ui/footer.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
        <title>Print Document</title>
    </head>

    <body onload="window.print()">
        <div class="p-auto m-5">
            <div class="container p-3">
                <div class="container py-3">
                    <?php 
                        $id = htmlspecialchars($_GET["id"]);
                        $sql = "SELECT laporan_diskusi.*, siswa.nama_siswa, kelas.id_kelas, kelas.nama_kelas, walikelas.id_wali, walikelas.nama_wali,
                        keamanan.id_keamanan, keamanan.nama_keamanan, sanksi.no_sanksi, sanksi.nama_sanksi, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran FROM laporan_diskusi left join siswa on laporan_diskusi.nama_siswa = siswa.nama_siswa left join kelas on laporan_diskusi.id_kelas = kelas.id_kelas left join walikelas on laporan_diskusi.id_wali = walikelas.id_wali left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi left join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran WHERE laporan_diskusi.id = ? order by laporan_diskusi.id asc";
                        $row = $configs->prepare($sql);
                        $row->execute(array($id));
                        $hasil = $row->fetchAll();
                        foreach($hasil as $isi){
                    ?>
                    <h4 style="text-align: center;">Laporan Diskusi - Pelanggaran -</h4>
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="col-sm-10 col-md-10">
                            <div class="border border-top mb-1"></div>
                            <h4 style="text-align: start; font-size: 14px;">Sekolah Apa Saja</h4>
                            <h4 style="font-size:16px; text-align: end;"><?php echo date('D, d / M / Y') ?></h4>
                            <table class="table border border-transparent">
                                <tr>
                                    <td>Nama Siswa : </td>
                                    <td><?php echo $isi["nama_siswa"] ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas Berapa : </td>
                                    <td><?php echo $isi["nama_kelas"] ?></td>
                                </tr>
                                <tr>
                                    <td>Wali Kelas : </td>
                                    <td><?php echo $isi["nama_wali"] ?></td>
                                </tr>
                                <tr>
                                    <td>Petugas Keamanan : </td>
                                    <td><?php echo $isi["nama_keamanan"] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Sanksi : </td>
                                    <td><?php echo $isi["no_sanksi"]." - ".$isi["nama_sanksi"] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Pelanggaran : </td>
                                    <td><?php echo $isi["no_pelanggaran"]." - ".$isi["nama_pelanggaran"] ?></td>
                                </tr>
                                <tr>
                                    <td>Hasil Diskusi : </td>
                                    <td><?php echo $isi["diskusi"] ?></td>
                                </tr>
                            </table>
                            <div class="border border-bottom"></div>
                        </div>
                    </div>
                    <?php
                        } 
                    ?>
                </div>
            </div>
        </div>
    </body>

</html>