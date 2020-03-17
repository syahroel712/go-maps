<?php

$data_tempat = $DB->query("SELECT * FROM tb_tempat WHERE id_tempat = :id_tempat ", array(":id_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Edit Tempat</h2>
            <hr>
            <div class="row">

                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.067476689432!2d100.3894529!3d-0.9526198!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa4a89deaa38dc47a!2sCV.%20Mediatama%20Web%20Indonesia%20-%20Jasa%20Pembuatan%20dan%20Kursus%20Website%20di%20Kota%20Padang!5e0!3m2!1sid!2sid!4v1584408212488!5m2!1sid!2sid" frameborder="0" style="border:0; width:100%; height:450px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>

                <div class="col-md-6">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Nama Tempat</label>
                                <input name="id_tempat" type="hidden" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['id_tempat'] ?>">
                                <input name="nama_tempat" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['nama_tempat'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Deskripsi Tempat</label>
                                <textarea name="deskripsi_tempat" class="form-control" cols="30" rows="6"><?php echo $data_tempat['deskripsi_tempat'] ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Alamat Tempat</label>
                                <textarea name="alamat_tempat" class="form-control" cols="30" rows="6"><?php echo $data_tempat['alamat_tempat'] ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Latitude</label>
                                <input name="latitude_tempat" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['latitude_tempat'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Longitude</label>
                                <input name="longitude_tempat" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['longitude_tempat'] ?>">
                            </div>
                        </div>

                        <button name="simpan" class="btn btn-primary btn-block">EDIT</button>
                    </form>

                    <?php
                    if (isset($_POST['simpan'])) {
                        $data = array(
                            ":id_tempat" => $_POST['id_tempat'],
                            ":nama_tempat" => $_POST['nama_tempat'],
                            ":deskripsi_tempat" => $_POST['deskripsi_tempat'],
                            ":alamat_tempat" => $_POST['alamat_tempat'],
                            ":latitude_tempat" => $_POST['latitude_tempat'],
                            ":longitude_tempat" => $_POST['longitude_tempat'],
                        );
                        // var_dump($data);
                        // exit;
                        $simpan = $DB->query("UPDATE tb_tempat SET 
                                                nama_tempat = :nama_tempat,
                                                deskripsi_tempat = :deskripsi_tempat,
                                                alamat_tempat = :alamat_tempat,
                                                latitude_tempat = :latitude_tempat,
                                                longitude_tempat = :longitude_tempat
                                                WHERE id_tempat = :id_tempat", $data);

                        if ($simpan) {
                            echo "<script>alert('Data Disimpan');
                            window.location='index.php?page=module/tempat/index';
                            </script>";
                        } else {
                            echo "<script>alert('Data Tidak Disimpan');
                            window.location='index.php?page=module/tempat/index';
                            </script>";
                        }
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>