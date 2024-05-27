<?php 
namespace controller;
use model_pengguna\pengguna;
use model_wali\walikelas;
use model_kelas\Ruangan;
use model_siswa\Siswa;
use model_keamanan\Penjaga;
use model_pelanggaran\Kasus;
use model_sanksi\Sanksi;
use model_laporan\Laporan;

class AuthPengguna {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pengguna($konfig);
    }

    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function Login(){
        session_start();
        $userInput = htmlspecialchars($_POST['userInput']) ? htmlentities($_POST['userInput']) : $_POST['userInput'];
        $password = htmlspecialchars($_POST['password']) ? htmlentities($_POST['password']) : $_POST['password'];
        $this->konfig->SignIn($userInput,$password);
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id"]);
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $role = htmlspecialchars($_POST["role"]);
        $this->konfig->Update($username, $email, $password, $nama, $role, $id);
    }

    public function buat(){
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $role = htmlspecialchars($_POST["role"]);
        $this->konfig->create($username, $email, $password, $nama, $role);
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]);
        $this->konfig->Delete($id);
        uniqid($id);
    }
}

class Wali {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new walikelas($konfig);
    }

    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id_wali"]);
        $nama_wali = htmlspecialchars($_POST["nama_wali"]);
        $kelas = htmlspecialchars($_POST["id_kelas"]);
        $this->konfig->Update($nama_wali, $kelas, $id);
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]);
        $this->konfig->Delete($id);
        uniqid($id);
    }
}


class Kelas {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Ruangan($konfig);
    }

    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }
    
    public function buat(){
        $nama_kelas = htmlspecialchars($_POST["nama_kelas"]);
        $this->konfig->create($nama_kelas);
    }

    public function ubah(){
        $nama_kelas = htmlspecialchars($_POST["nama_kelas"]);
        $id = htmlspecialchars($_POST["id_kelas"]);
        $this->konfig->Update($nama_kelas, $id);
    }
    
    public function hapus(){
        $id = htmlspecialchars($_GET["id_kelas"]);
        $this->konfig->Delete($id);
        uniqid($id);
    }   
}

class Murid {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Siswa($konfig);
    }
    
    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function buat(){
        $nis = htmlspecialchars($_POST["nis"]);
        $nama = htmlspecialchars($_POST["nama_siswa"]);
        $id_kelas = htmlspecialchars($_POST["id_kelas"]);
        $id_wali = htmlspecialchars($_POST["id_wali"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        $this->konfig->create($nis,$nama,$id_kelas,$id_wali,$id_keamanan,$no_sanksi,$no_pelanggaran);
    }

    public function ubah(){
        $id_kelas = htmlspecialchars($_POST["id_kelas"]);
        $id_wali = htmlspecialchars($_POST["id_wali"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        $id = htmlspecialchars($_POST["id_siswa"]);
        $this->konfig->update($id_kelas,$id_wali,$id_keamanan,$no_sanksi,$no_pelanggaran,$id);
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id_siswa"]);
        $this->konfig->Delete($id);
        uniqid($id);
    }
}

class Keamanan {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Penjaga($konfig);
    }
    
    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function buat(){
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $id_pengguna = htmlspecialchars($_POST["id_pengguna"]);
        $nama_keamanan = htmlspecialchars($_POST["nama_keamanan"]);
        $this->konfig->create($id_keamanan,$id_pengguna,$nama_keamanan);
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $id_pengguna = htmlspecialchars($_POST["id_pengguna"]);
        $nama_keamanan = htmlspecialchars($_POST["nama_keamanan"]);
        $this->konfig->update($id_keamanan,$id_pengguna,$nama_keamanan,$id);
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]);
        $this->konfig->Delete($id);
        uniqid($id);
    }
}

class Pelanggaran {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Kasus($konfig);
    }
    
    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function buat(){
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        $nama_pelanggaran = htmlspecialchars($_POST["nama_pelanggaran"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $this->konfig->create($no_pelanggaran,$nama_pelanggaran,$no_sanksi,$id_keamanan);
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id_pelanggaran"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        $nama_pelanggaran = htmlspecialchars($_POST["nama_pelanggaran"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $this->konfig->update($no_pelanggaran,$nama_pelanggaran,$no_sanksi,$id_keamanan,$id);
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id_pelanggaran"]);
        $this->konfig->Delete($id);
        uniqid($id);
    }
}

class Data {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Sanksi($konfig);
    }
    
    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function buat(){
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]);
        $jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]);
        $this->konfig->create($no_sanksi,$nama_sanksi,$jenis_sanksi);
    }

    public function ubah(){
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]);
        $jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]);
        $id = htmlspecialchars($_POST["id_sanksi"]);
        $this->konfig->update($no_sanksi,$nama_sanksi,$jenis_sanksi,$id);
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id_sanksi"]);
        $this->konfig->Delete($id);
        uniqid($id);
    }
}

class Report {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Laporan($konfig);
    }
    
    public function lihat($query){
        $row = $this->konfig->Read($query);
        $row->execute();
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id"]);
        $hasil = htmlspecialchars($_POST["diskusi"]);
        $this->konfig->update($hasil,$id);
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]);
        $this->konfig->Delete($id);
        uniqid($id);

    }
}
?>