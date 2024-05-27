<?php 
namespace model_siswa;

class Siswa {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }

    public function create($nis, $nama, $id_kelas,$id_wali,$id_keamanan,$no_sanksi,$no_pelanggaran){
        $nis = htmlspecialchars($_POST["nis"]);
        $nama = htmlspecialchars($_POST["nama_siswa"]);
        $id_kelas = htmlspecialchars($_POST["id_kelas"]);
        $id_wali = htmlspecialchars($_POST["id_wali"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        
        $table = "siswa";
        $sql = "INSERT INTO $table (nis,nama_siswa,id_kelas,id_wali,id_keamanan,no_sanksi,no_pelanggaran) VALUES (?,?,?,?,?,?,?)";
        $this->db->prepare("INSERT laporan_diskusi SET nama_siswa = ?, no_pelanggaran = ?, no_sanksi = ?, id_keamanan = ?, id_wali = ?, id_kelas = ?")->execute(
            array($nama, $no_pelanggaran, $no_sanksi, $id_keamanan, $id_wali, $id_kelas));
        $row = $this->db->prepare($sql);
        $siswa = array($nis, $nama, $id_kelas,$id_wali ,$id_keamanan,$no_sanksi,$no_pelanggaran);

        if($row->execute($siswa) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil ditambahkan.');
            document.location.href = '../ui/header.php?page=siswa';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal ditambahkan.');
            document.location.href = '../ui/header.php?page=siswa';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }
    
    public function update($id_kelas,$id_wali,$id_keamanan,$no_sanksi,$no_pelanggaran,$id){
        $id_kelas = htmlspecialchars($_POST["id_kelas"]);
        $id_wali = htmlspecialchars($_POST["id_wali"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        $id = htmlspecialchars($_POST["id_siswa"]);

        $table = "siswa";
        $sql = "UPDATE $table SET id_kelas = ?, id_wali = ?, id_keamanan = ?, no_sanksi = ?, no_pelanggaran = ? WHERE id_siswa = ?";
        $row = $this->db->prepare($sql);
        $this->db->prepare("UPDATE laporan_diskusi SET no_pelanggaran = ?, no_sanksi = ?, id_keamanan = ? WHERE id_wali = ?")->execute(array($no_pelanggaran,$no_sanksi,$id_keamanan,$id_wali));
        $siswa = array($id_kelas, $id_wali, $id_keamanan, $no_sanksi, $no_pelanggaran, $id);

        if($row->execute($siswa) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=siswa';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=siswa';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }

    public function delete($id){
        $id = htmlspecialchars($_GET["id_siswa"]);

        $table = "siswa";
        $sql = "DELETE FROM $table WHERE id_siswa = ?";
        $row = $this->db->prepare($sql);
        $siswa = array($id);

        if($row->execute($siswa) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil dihapus.');
            document.location.href = '../ui/header.php?page=siswa';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal dihapus.');
            document.location.href = '../ui/header.php?page=siswa';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }
}
?>