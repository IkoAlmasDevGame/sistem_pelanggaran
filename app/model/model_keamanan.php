<?php 
namespace model_keamanan;

class Penjaga {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }

    public function create($id_keamanan, $id_pengguna, $nama_keamanan){
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $id_pengguna = htmlspecialchars($_POST["id_pengguna"]);
        $nama_keamanan = htmlspecialchars($_POST["nama_keamanan"]);

        $table = "keamanan";
        $sql = "INSERT $table SET id_keamanan = ?, id_pengguna = ?, nama_keamanan = ?";
        $row = $this->db->prepare($sql);
        $keamanan = array($id_keamanan,$id_pengguna,$nama_keamanan);
        if($row->execute($keamanan) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil ditambahkan.');
            document.location.href = '../ui/header.php?page=keamanan';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal ditambahkan.');
            document.location.href = '../ui/header.php?page=keamanan';
            }, 3000);
            </script>";
            die;
            exit;            
        }
    }
    
    public function update($id_keamanan, $id_pengguna, $nama_keamanan, $id){
        $id = htmlspecialchars($_POST["id"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]);
        $id_pengguna = htmlspecialchars($_POST["id_pengguna"]);
        $nama_keamanan = htmlspecialchars($_POST["nama_keamanan"]);

        $table = "keamanan";
        $sql = "UPDATE $table SET id_keamanan = ?, id_pengguna = ?, nama_keamanan = ? WHERE id = ?";
        $row = $this->db->prepare($sql);
        $keamanan = array($id_keamanan,$id_pengguna,$nama_keamanan,$id);
        if($row->execute($keamanan) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=keamanan';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=keamanan';
            }, 3000);
            </script>";
            die;
            exit;            
        }
    }
    
    public function delete($id){
        $id = htmlspecialchars($_GET["id"]);

        $table = "keamanan";
        $sql = "DELETE FROM $table WHERE id = ?";
        $row = $this->db->prepare($sql);
        $keamanan = array($id);
        if($row->execute($keamanan) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil dihapus.');
            document.location.href = '../ui/header.php?page=keamanan';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal dihapus.');
            document.location.href = '../ui/header.php?page=keamanan';
            }, 3000);
            </script>";
            die;
            exit;            
        }
    }
}
?>