<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$dbname = "pelanggaran_siswa";
try {
    // $configs = new PDO("mysql:host=localhost;dbname=$dbname;", "root", "");
    $configs = new PDO("mysql:host=localhost;dbname=cp_pelanggaran_siswa;", "root", "");
} catch (Exception $e){
    die("Koneksi database anda gagal ...".$e->getMessage());
    exit;
}

?>