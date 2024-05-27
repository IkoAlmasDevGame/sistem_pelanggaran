<?php 
namespace model_wali;

class walikelas {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }

    public function update($nama_wali, $kelas, $id){
        $id = htmlspecialchars($_POST["id_wali"]);
        $nama_wali = htmlspecialchars($_POST["nama_wali"]);
        $kelas = htmlspecialchars($_POST["id_kelas"]);

        $table = "walikelas";
        $sql = "UPDATE $table SET nama_wali = ?, id_kelas = ? WHERE id_wali = ?";
        $row = $this->db->prepare($sql);
        $set = array($nama_wali, $kelas, $id);
        if($row->execute($set) === true){
           echo "<script type='text/javascript'>
           window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=walikelas';
           }, 3000);
           </script>
           ";
           die;
           exit;
        }else{
            echo "<script type='text/javascript'>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=walikelas';
           }, 3000);
           </script>
           ";
           die;
           exit;            
        }
    }

    public function delete(){
        $id = htmlspecialchars($_GET["id"]);
        $table = "walikelas";
        $sql = "DELETE FROM $table WHERE id_wali = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($id));
        if($row === true){
            echo "<script>document.location.href = '../ui/header.php?page=walikelas'</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=walikelas'</script>";
            die;
            exit;
        }
    }
}
?>