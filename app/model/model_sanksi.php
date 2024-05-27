<?php 
namespace model_sanksi;

class Sanksi {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }

    public function create($no_sanksi, $nama_sanksi, $jenis_sanksi){
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]);
        $jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]);

        $table = "sanksi";
        $sql = "INSERT $table SET no_sanksi = ?, nama_sanksi = ?, jenis_sanksi = ?";
        $row = $this->db->prepare($sql);
        $sanksi = array($no_sanksi, $nama_sanksi, $jenis_sanksi);

        if($row->execute($sanksi) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil ditambahkan.');
            document.location.href = '../ui/header.php?page=sanksi';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal ditambahkan.');
            document.location.href = '../ui/header.php?page=sanksi';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }

    public function update($no_sanksi, $nama_sanksi, $jenis_sanksi, $id){
        $id = htmlspecialchars($_POST["id_sanksi"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]);
        $nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]);
        $jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]);

        $table = "sanksi";
        $sql = "UPDATE $table SET no_sanksi = ?, nama_sanksi = ?, jenis_sanksi = ? WHERE id_sanksi = ?";
        $row = $this->db->prepare($sql);
        $sanksi = array($no_sanksi, $nama_sanksi, $jenis_sanksi,$id);

        if($row->execute($sanksi) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=sanksi';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=sanksi';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }

    public function delete($id){
        $id = htmlspecialchars($_GET["id_sanksi"]);

        $table = "sanksi";
        $sql = "DELETE FROM $table WHERE id_sanksi = ?";
        $row = $this->db->prepare($sql);
        $sanksi = array($id);

        if($row->execute($sanksi) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil dihapus.');
            document.location.href = '../ui/header.php?page=sanksi';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal dihapus.');
            document.location.href = '../ui/header.php?page=sanksi';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }
}
?>