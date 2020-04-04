<div class="container">

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <center class="my-4">
                <h1>Aplikasi Cari Rute Wisata</h1>
            </center>
            <hr>
            <div class="card my-4">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kontak</label>
                            <input type="text" class="form-control" name="kontak" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level</label>
                            <select name="level" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                    </form>

                    <?php

                    if (isset($_POST['register'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        // echo $username;
                        // echo $password;
                        // exit;

                        $ambil = $DB->query("SELECT * FROM tb_user WHERE username=:username ", ["username" => $username])->fetch(PDO::FETCH_ASSOC);
                        if ($ambil['username']) {
                            if (md5($password) == $ambil['password']) {
                                if (!empty($ambil)) {
                                    // session_start();
                                    $_SESSION['user_id']       = $ambil['user_id'];
                                    $_SESSION['username']       = $ambil['username'];
                                    $_SESSION['nama']   = $ambil['nama'];
                                    $_SESSION['level']   = $ambil['level'];
                                    echo "
                                            <script>
                                            alert ('Login Sukses');
                                            window.location='index.php';
                                            </script>";
                                }
                            }
                        } else {
                            echo "
                                        <script>
                                        alert ('Login Gagal');
                                        </script>";
                        }
                        // $cek = mysqli_num_rows($ambil);  sama dengan diatas  
                    }


                    ?>


                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>