<?php 
require_once("../../database/koneksi.php");
require_once("../../controller/controller.php");
require_once("../../model/model_pengguna.php");
require_once("../../model/model_wali.php");
require_once("../../model/model_kelas.php");
require_once("../../model/model_siswa.php");
require_once("../../model/model_keamanan.php");
require_once("../../model/model_pelanggaran.php");
require_once("../../model/model_sanksi.php");
require_once("../../model/model_laporan.php");

$auth = new controller\AuthPengguna($configs);
$wali = new controller\Wali($configs);
$kelas = new controller\Kelas($configs);
$siswa = new controller\Murid($configs);
$keamanan = new controller\Keamanan($configs);
$pelanggaran = new controller\Pelanggaran($configs);
$sanksi = new controller\Data($configs);
$laporan = new controller\Report($configs);

if(!isset($_GET["page"])){
    require_once("../dashboard/index.php");
}else{
    switch ($_GET["page"]) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;
        
        case 'pengguna':
            require_once("../pengguna/index.php");
            break;
            
        case 'lihat-pengguna':
            require_once("../pengguna/pengguna.php");
            break;
            
        case 'walikelas':
            require_once("../wali/index.php");
            break;
            
        case 'lihat-walikelas':
            require_once("../wali/wali.php");
            break;

        case 'kelas':
            require_once("../kelas/index.php");
            break;
            
        case 'lihat-kelas':
            require_once("../kelas/kelas.php");
            break;
            
        case 'siswa':
            require_once("../siswa/index.php");
            break;
            
        case 'lihat-siswa':
            require_once("../siswa/siswa.php");
            break;
            
        case 'keamanan':
            require_once("../keamanan/index.php");
            break;
            
        case 'lihat-keamanan':
            require_once("../keamanan/keamanan.php");
            break;

        case 'sanksi':
            require_once("../sanksi/index.php");
            break;
            
        case 'lihat-sanksi':
            require_once("../sanksi/sanksi.php");
            break;
            
        case 'pelanggaran':
            require_once("../pelanggaran/index.php");
            break;
            
        case 'lihat-pelanggaran':
            require_once("../pelanggaran/pelanggaran.php");
            break;
            
        case 'lihat-laporan':
            require_once("../laporan/laporan.php");
            break;
            
        case 'lihat-diskusi':
            require_once("../laporan/diskusi.php");
            break;

        case 'print':
            require_once("../laporan/print.php");
            break;
        
        case 'keluar':
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../auth/index.php");
            exit(0);
            break;
        
        default:
            require_once("../dashboard/index.php");
            break;
    }
}

if(!isset($_GET["aksi"])){
    require_once("../../controller/controller.php");
    require_once("../../model/model_pengguna.php");
    require_once("../../model/model_wali.php");
    require_once("../../model/model_kelas.php");
    require_once("../../model/model_siswa.php");
    require_once("../../model/model_keamanan.php");
    require_once("../../model/model_pelanggaran.php");
    require_once("../../model/model_sanksi.php");
    require_once("../../model/model_laporan.php");
}else{
    switch ($_GET["aksi"]) {
        // create pengguna
        case 'create-pengguna':
            $auth->buat();
            break;
        case 'update-pengguna':
            $auth->ubah();
            break;
        case 'delete-pengguna':
            $auth->hapus();
            break;
        // create pengguna

        // create wali kelas
        case 'update-waklas':
            $wali->ubah();
            break;
        // create wali kelas

        // create kelas
        case 'create-kelas':
            $kelas->buat();
            break;
        case 'update-kelas':
            $kelas->ubah();
            break;
        case 'delete-kelas':
            $kelas->hapus();
            break;
        // create kelas
        
        // create siswa
        case 'create-siswa':
            $siswa->buat();
            break;
        case 'update-siswa':
            $siswa->ubah();
            break;
        case 'delete-siswa':
            $siswa->hapus();
            break;
        // create siswa

        // create keamanan
        case 'create-keamanan':
            $keamanan->buat();
            break;
        case 'update-keamanan':
            $keamanan->ubah();
            break;
        case 'delete-keamanan':
            $keamanan->hapus();
            break;
        // create keamanan

        // create Pelanggaran
        case 'create-pelanggaran':
            $pelanggaran->buat();
            break;
        case 'update-pelanggaran':
            $pelanggaran->ubah();
            break;
        case 'delete-pelanggaran':
            $pelanggaran->hapus();
            break;
        // create Pelanggaran

        // create Sanksi
        case 'create-sanksi':
            $sanksi->buat();
            break;
        case 'update-sanksi':
            $sanksi->ubah();
            break;
        case 'delete-sanksi':
            $sanksi->hapus();
            break;
        // create Sanksi

        // create Laporan
        case 'update-laporan':
            $laporan->ubah();
            break;
        case 'delete-laporan':
            $laporan->hapus();
            break;
        // create Laporan
        
        default:
            require_once("../../controller/controller.php");
            require_once("../../model/model_pengguna.php");
            require_once("../../model/model_wali.php");
            require_once("../../model/model_kelas.php");
            require_once("../../model/model_siswa.php");
            require_once("../../model/model_keamanan.php");
            require_once("../../model/model_pelanggaran.php");
            require_once("../../model/model_sanksi.php");
            require_once("../../model/model_laporan.php");
            break;
    }
}
?>