<?php 
namespace model_pelanggaran;

class Kasus {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }

    public function create($no_pelanggaran, $nama_pelanggaran, $no_sanksi, $id_keamanan){
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        $nama_pelanggaran = htmlspecialchars($_POST["nama_pelanggaran"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);

        $table = "pelanggaran";
        $sql = "INSERT $table SET no_pelanggaran = ?, nama_pelanggaran = ?, no_sanksi = ?, id_keamanan = ?";
        $row = $this->db->prepare($sql);
        $pelanggaran = array($no_pelanggaran, $nama_pelanggaran, $no_sanksi, $id_keamanan);

        if($row->execute($pelanggaran) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil ditambahkan.');
            document.location.href = '../ui/header.php?page=pelanggaran';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal ditambahkan.');
            document.location.href = '../ui/header.php?page=pelanggaran';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }

    public function update($no_pelanggaran, $nama_pelanggaran, $no_sanksi, $id_keamanan, $id){
        $id = htmlspecialchars($_POST["id_pelanggaran"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]);
        $nama_pelanggaran = htmlspecialchars($_POST["nama_pelanggaran"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);

        $table = "pelanggaran";
        $sql = "UPDATE $table SET no_pelanggaran = ?, nama_pelanggaran = ?, no_sanksi = ?, id_keamanan = ? WHERE id_pelanggaran = ?";
        $row = $this->db->prepare($sql);
        $pelanggaran = array($no_pelanggaran, $nama_pelanggaran, $no_sanksi, $id_keamanan, $id);

        if($row->execute($pelanggaran) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=pelanggaran';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=pelanggaran';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }

    public function delete($id){
        $id = htmlspecialchars($_GET["id"]);
        $table = "pelanggaran";
        $sql = "DELETE FROM $table WHERE id_pelanggaran = ?";
        $row = $this->db->prepare($sql);
        $pelanggaran = array($id);

        if($row->execute($pelanggaran) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=pelanggaran';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=pelanggaran';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }
}
?>