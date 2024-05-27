<?php 
namespace model_kelas;

class Ruangan {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }

    public function create($nama_kelas){
        $nama_kelas = htmlspecialchars($_POST["nama_kelas"]);
        $table = "kelas";
        $row = $this->db->prepare("INSERT $table SET nama_kelas = ?");
        if($row->execute(array($nama_kelas)) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil ditambahkan.');
            document.location.href = '../ui/header.php?page=kelas';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal ditambahkan.');
            document.location.href = '../ui/header.php?page=kelas';
            }, 3000);
            </script>";
            die;
            exit;            
        }
    }

    public function update($nama_kelas, $id){
        $id = htmlspecialchars($_POST["id_kelas"]);
        $nama_kelas = htmlspecialchars($_POST["nama_kelas"]);
        $table = "kelas";
        $row = $this->db->prepare("UPDATE $table SET nama_kelas = ? WHERE id_kelas = ?");
        if($row->execute(array($nama_kelas,$id)) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=kelas';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=kelas';
            }, 3000);
            </script>";
            die;
            exit;            
        }
    }

    public function delete($id){
        $id = htmlspecialchars($_GET["id_kelas"]);
        $table = "kelas";
        $row = $this->db->prepare("DELETE FROM $table WHERE id_kelas = ?");
        if($row->execute(array($id)) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil dihapus.');
            document.location.href = '../ui/header.php?page=kelas';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal dihapus.');
            document.location.href = '../ui/header.php?page=kelas';
            }, 3000);
            </script>";
            die;
            exit;            
        }
    }
}
?>