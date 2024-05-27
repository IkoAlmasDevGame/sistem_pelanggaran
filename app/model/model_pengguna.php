<?php 
namespace model_pengguna;

class pengguna {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function SignIn($userInput, $password){
        $userInput = htmlspecialchars($_POST['userInput']) ? htmlentities($_POST['userInput']) : $_POST['userInput'];
        $password = htmlspecialchars($_POST['password']) ? htmlentities($_POST['password']) : $_POST['password'];

        if(password_verify(md5($password, false), PASSWORD_DEFAULT)){
            return true;
        }

        if($userInput == "" || $password == ""){
            echo "<script>alert('username atau email anda salah ...'); document.location.href = '../auth/index.php'</script>";
            die;
            exit;
        }

        $table = "pengguna";
        $sql = "SELECT * FROM $table WHERE email = ? and password = ? || username='$userInput' and password='$password'";
        $row = $this->db->prepare($sql);
        $row->execute(array($userInput,$password));
        $cek = $row->rowCount();

        if($cek > 0){
            $response = array($userInput,$password);
            $respon[$table] = $response;
            if($db = $row->fetch()){
                if($db["role"] == "admin"){
                    $_SESSION["id"] = $db["id_pengguna"];
                    $_SESSION["email"] = $db["email"];
                    $_SESSION["username"] = $db["username"];
                    $_SESSION["nama"] = $db["nama"];
                    $_SESSION["role"] = "admin";
                    echo "<script>alert('selamat datang di sistem informasi pelanggaran siswa/i'); document.location.href = '../ui/header.php?page=beranda';</script>";
                }else if($db["role"] == "wali"){
                    $_SESSION["id"] = $db["id_pengguna"];
                    $_SESSION["email"] = $db["email"];
                    $_SESSION["username"] = $db["username"];
                    $_SESSION["nama"] = $db["nama"];
                    $_SESSION["role"] = "wali";
                    echo "<script>alert('selamat datang di sistem informasi pelanggaran siswa/i'); document.location.href = '../ui/header.php?page=beranda';</script>";
                }else if($db["role"] == "bk"){
                    $_SESSION["id"] = $db["id_pengguna"];
                    $_SESSION["email"] = $db["email"];
                    $_SESSION["username"] = $db["username"];
                    $_SESSION["nama"] = $db["nama"];
                    $_SESSION["role"] = "bk";
                    echo "<script>alert('selamat datang di sistem informasi pelanggaran siswa/i'); document.location.href = '../ui/header.php?page=beranda';</script>";
                }
                $_SESSION["status"] = true;
                $_SERVER["HTTPS"] == $_SERVER["HTTP"] = true;
                $_COOKIE["cookies"] = $userInput;
                setcookie($respon[$table], $db, time() + (86400 * 30), "/");
                array_push($respon[$table], $db);
                exit;
            }
        }else{
            $_SESSION["status"] = false;
            $_SERVER["HTTPS"] == $_SERVER["HTTP"] = false;
            echo "<script>alert('Harap coba lagi ...'); document.location.href = '../auth/index.php'</script>";
            die;
            exit;
        }
    }

    public function Read($query){
        $row = $this->db->prepare($query);
        return $row;
    }
    
    public function Update($username, $email, $password, $nama, $role, $id){
        // Database Set
        $id = htmlspecialchars($_POST["id"]);
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $role = htmlspecialchars($_POST["role"]);

        $table = "pengguna";
        $sql = "UPDATE $table SET username = ?, email = ?, password = ?, nama = ?, role = ? WHERE id = ?";
        $row = $this->db->prepare($sql);
        $set = array($username, $email, $password, $nama, $role, $id);
        if($row->execute($set) === true){
           echo "<script type='text/javascript'>
           window.setTimeout(()=> {
            alert('data berhasil diubah.');
            document.location.href = '../ui/header.php?page=pengguna';
           }, 3000);
           </script>
           ";
           die;
           exit;
        }else{
            echo "<script type='text/javascript'>
            window.setTimeout(()=> {
            alert('data gagal diubah.');
            document.location.href = '../ui/header.php?page=pengguna';
           }, 3000);
           </script>
           ";
           die;
           exit;            
        }
    }

    public function create($username, $email, $password, $nama, $role){
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $role = htmlspecialchars($_POST["role"]);

        $table = "pengguna";
        
        if($role == "wali"){
            $this->db->prepare("INSERT walikelas SET nama_wali = ?")->execute(array($nama));
            $sql = "INSERT INTO $table (username,email,password,nama,role) VALUES (?,?,?,?,?)";
            $row = $this->db->prepare($sql);
        }else{            
            $sql = "INSERT INTO $table (username,email,password,nama,role) VALUES (?,?,?,?,?)";
            $row = $this->db->prepare($sql);
        }

        $set = array($username, $email, $password, $nama, $role);
        if($row->execute($set) === true){
           echo "<script type='text/javascript'>
           window.setTimeout(()=> {
            alert('data berhasil ditambahkan.');
            document.location.href = '../ui/header.php?page=pengguna';
           }, 3000);
           </script>
           ";
           die;
           exit;
        }else{
            echo "<script type='text/javascript'>
            window.setTimeout(()=> {
            alert('data gagal ditambahkan.');
            document.location.href = '../ui/header.php?page=pengguna';
           }, 3000);
           </script>
           ";
           die;
           exit;            
        }
    }

    public function Delete($id){
        $id = htmlspecialchars($_GET["id"]);
        $table = "pengguna";
        $sql = "DELETE FROM $table WHERE id = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($id));
        if($row === true){
            echo "<script>document.location.href = '../ui/header.php?page=pengguna'</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=pengguna'</script>";
            die;
            exit;
        }
    }
}

?>