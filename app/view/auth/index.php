<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Pelanggaran Informasi Siswa/i</title>
        <meta name="description" content="Make Website @copyright 2024">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style type="text/css">
        * {
            box-sizing: border-box;
            font-family: monospace;
            font-style: normal;
        }

        body {
            background-color: gray;
            background-blend-mode: darken;
        }

        .card {
            width: 400px;
        }

        .card-body {
            height: 360px;
        }

        @media (max-height: 500px) {
            .card-body {
                max-height: 500px;
            }
        }

        @media (max-width: 720px) {
            .card {
                max-width: 720px;
            }
        }
        </style>
    </head>

    <body onload="startTime();">
        <div class="layot">
            <div class="container-fluid pt-5 mt-5">
                <div class="d-grid justify-content-center align-items-center flex-wrap">
                    <div class="container-fluid bg-body-secondary p-5 m-5 mx-auto rounded-1">
                        <div class="card">
                            <div class="d-flex justify-content-center align-items-center flex-wrap gap-1">
                                <div class="card-body">
                                    <h4 class="display-4 fs-6 fw-normal fst-normal
                                 text-center mt-2 mt-lg-0 pt-4 shadow-sm">
                                        Sistem Informasi Pelanggaran</h4>
                                    <?php 
                                        require_once("../../database/koneksi.php");
                                        require_once("../../model/model_pengguna.php");
                                        require_once("../../controller/controller.php");
                                        
                                        $authen = new controller\AuthPengguna($configs);

                                        if(isset($_GET["aksi"])){
                                            if($_GET["aksi"] == "signin"){
                                                $authen->Login();
                                            }
                                        }else{
                                            require_once("../../database/koneksi.php");
                                            require_once("../../model/model_pengguna.php");
                                            require_once("../../controller/controller.php");
                                        }
                                    ?>
                                    <form action="?aksi=signin" method="post">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <label for="userEmail">username / email :</label>
                                                    <input type="text" name="userInput" id="userEmail"
                                                        class="form-control" required aria-required="true"
                                                        placeholder="masukkan username atau email anda ...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="password">password :</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" required aria-required="true"
                                                        placeholder="masukkan password anda ...">
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-secondary hover">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="container">
                                    <footer class="footer">
                                        <p id="year" class="text-center">
                                        </p>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
        <script type="text/javascript">
        function startTime() {
            var day = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
            var today = new Date();
            var h = today.getHours();
            var tahun = today.getFullYear();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('year').innerHTML =
                "&copy Sistem Pelanggaran Sekolah " + tahun + "<br>" + day[today.getDay()] + ", " + h + " : " + m +
                " : " + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
        </script>
    </body>

</html>