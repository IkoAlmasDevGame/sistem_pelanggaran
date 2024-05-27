<?php 
namespace model_laporan;

class Laporan {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }

    public function update($hasil,$id){
        $id = htmlspecialchars($_POST["id"]);
        $hasil = htmlspecialchars($_POST["diskusi"]);

        $table = "laporan_diskusi";
        $sql = "UPDATE $table SET diskusi = ? WHERE id = ?";
        $row = $this->db->prepare($sql);
        if($row->execute(array($hasil,$id)) === true){
            echo "<script>
            window.setTimeout(()=> {
            alert('data berhasil ditambahkan.');
            document.location.href = '../ui/header.php?page=lihat-diskusi';
            }, 3000);
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            window.setTimeout(()=> {
            alert('data gagal ditambahkan.');
            document.location.href = '../ui/header.php?page=lihat-diskusi';
            }, 3000);
            </script>";
            die;
            exit;
        }
    }

    public function delete($id){
        $id = htmlspecialchars($_GET["id"]);
        $table = "laporan_diskusi";
        $sql = "DELETE FROM $table WHERE id = ?";
        $row = $this->db->prepare($sql);
        $laporan = array($id);
        if($row->execute($laporan) === true){
            echo "<script>document.location.href = '../ui/header.php?page=lihat-diskusi'</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=lihat-diskusi'</script>";
            die;
            exit;
        }
    }
}
?>