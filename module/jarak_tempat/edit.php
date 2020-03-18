<?php
session_start();

$id = $_GET['id'];

$_SESSION['id_jarak_tempat'] = $id;
// echo $_SESSION['id_jarak_tempat'];
// echo $_SESSION['id_tempat'];


$data_tempat = $DB->query("SELECT * FROM tb_jarak_tempat WHERE id_jarak_tempat = :id_jarak_tempat ", array(":id_jarak_tempat" => $_SESSION['id_jarak_tempat']))->fetch(PDO::FETCH_ASSOC);
// var_dump($data_tempat);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Edit Jarak Tempat</h2>
            <hr>
            <button onclick="goBack()" class="btn btn-info">Kembali</button>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input name="id_jarak_tempat" type="hidden" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['id_jarak_tempat'] ?>" placeholder="Dalam satuan kilometer">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Jarak Tempat</label>
                                <input name="jarak_tempat" type="text" class="form-control" autofocus="autofocus" placeholder="Dalam satuan kilometer" value="<?php echo $data_tempat['jarak_tempat'] ?> ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Waktu Tempuh</label>
                                <input name="waktu_tempuh" type="text" class="form-control" autofocus="autofocus" placeholder="Dalam satuan menit" value="<?php echo $data_tempat['waktu_tempuh'] ?> ">
                            </div>
                        </div>
                        <button name="simpan" class="btn btn-primary btn-block">SIMPAN</button>
                    </form>

                    <?php
                    if (isset($_POST['simpan'])) {
                        $data = array(
                            ":id_jarak_tempat" => $_POST['id_jarak_tempat'],
                            ":jarak_tempat" => $_POST['jarak_tempat'],
                            ":waktu_tempuh" => $_POST['waktu_tempuh'],
                        );
                        // var_dump($data);
                        // exit;
                        $simpan = $DB->query("UPDATE tb_jarak_tempat SET jarak_tempat = :jarak_tempat, waktu_tempuh = :waktu_tempuh WHERE id_jarak_tempat = :id_jarak_tempat", $data);
                        if ($simpan) {
                            echo "<script>alert('Data Disimpan');
                            window.location='index.php?page=module/tempat/jarak_terkait&id=$_SESSION[id_tempat]';
                            </script>";
                        } else {
                            echo "<script>alert('Data Tidak Disimpan');
                            window.location='index.php?page=module/tempat/jarak_terkait&id=$_SESSION[id_tempat]';
                            </script>";
                        }
                    }




                    ?>

                </div>
            </div>
        </div>
    </div>
</div>