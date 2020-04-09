<?php

$data_tempat = $DB->query("SELECT * FROM tb_tempat WHERE id_tempat = :id_tempat ", array(":id_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);

// var_dump($data_tempat);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Edit Tempat</h2>
            <hr>
            <a href="index.php?page=module/tempat/index" class="btn btn-info">Kembali</a>
            <br>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <p><b><i>*Klik pada peta untuk menggeser marker</i></b></p>
                    <div id="googleMap" style="width:100%;height:500px;"></div>
                </div>
                <div class="col-md-12">
                    <hr>
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
                                <label>Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-control select2">
                                    <option value="">Pilih Provinsi</option>
                                    ?>
                                    <?php
                                    $data_tempat1 = $DB->query("SELECT DISTINCT provinsi FROM tb_tempat ORDER BY provinsi ASC");
                                    foreach ($data_tempat1 as $no => $data) {
                                    ?>
                                        <option value="<?php echo $data['provinsi'] ?>"><?php echo $data['provinsi'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    <script>
                                        document.getElementsByName('provinsi')[0].value = "<?php echo $data_tempat['provinsi'] ?>";
                                    </script>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Kab/Kota</label>
                                <select name="kabkota" id="kabkota" class="form-control select2">
                                    <option value="">Pilih Kab/Kota</option>
                                    ?>
                                    <?php
                                    $data_tempat1 = $DB->query("SELECT DISTINCT kabkota FROM tb_tempat ORDER BY kabkota ASC");
                                    foreach ($data_tempat1 as $no => $data) {
                                    ?>
                                        <option value="<?php echo $data['kabkota'] ?>"><?php echo $data['kabkota'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    <script>
                                        document.getElementsByName('kabkota')[0].value = "<?php echo $data_tempat['kabkota'] ?>";
                                    </script>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Kecamatan</label>
                                <select name="kecamatan" id="kecamatan" class="form-control select2">
                                    <option value="">Pilih Kecamatan</option>
                                    ?>
                                    <?php
                                    $data_tempat1 = $DB->query("SELECT DISTINCT kecamatan FROM tb_tempat ORDER BY kecamatan ASC");
                                    foreach ($data_tempat1 as $no => $data) {
                                    ?>
                                        <option value="<?php echo $data['kecamatan'] ?>"><?php echo $data['kecamatan'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    <script>
                                        document.getElementsByName('kecamatan')[0].value = "<?php echo $data_tempat['kecamatan'] ?>";
                                    </script>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Alamat Tempat</label>
                                <textarea name="alamat_tempat" class="form-control" cols="30" rows="8"><?php echo $data_tempat['alamat_tempat'] ?>
                                </textarea>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label>Deskripsi Tempat</label>
                            <textarea name="deskripsi_tempat" class="form-control" cols="30" rows="3"><?php echo $data_tempat['deskripsi_tempat'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label>Kontak</label>
                            <input name="kontak" id="kontak" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['kontak'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <center><img src="assets/foto/<?php echo $data_tempat['foto']; ?>" alt="load gagal" width="120px"></center>
                            <label>Foto</label>
                            <input name="foto" id="foto" type="file" class="form-control" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label>Latitude</label>
                            <input name="latitude_tempat" id="latitude_tempat" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['latitude_tempat'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label>Longitude</label>
                            <input name="longitude_tempat" id="longitude_tempat" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['longitude_tempat'] ?>">
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <button name="simpan" class="btn btn-primary btn-block">SIMPAN</button>
                </div>
                </form>

                <!-- <div class="col-md-6"> -->
                <!-- <form method="POST" enctype="multipart/form-data">
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
                                <input name="latitude_tempat" id="latitude_tempat" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['latitude_tempat'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Longitude</label>
                                <input name="longitude_tempat" id="longitude_tempat" type="text" class="form-control" autofocus="autofocus" value="<?php echo $data_tempat['longitude_tempat'] ?>">
                            </div>
                        </div>

                        <button name="simpan" class="btn btn-primary btn-block">EDIT</button>
                    </form> -->

                <?php
                if (isset($_POST['simpan'])) {

                    // var_dump($data1);
                    // exit;

                    if ($_FILES['foto']['size'] != 0) {

                        $nama_foto    = $_FILES['foto']['name'];
                        $lokasi_foto  = $_FILES['foto']['tmp_name'];

                        $file_name = explode('.', $nama_foto);
                        $nama_file = end($file_name);
                        $file_ext = strtolower($nama_file);
                        $nama_file_foto = str_replace(" ", "-", $file_name[0]) . "-" . substr(uniqid('', true), -5) . "." . $file_ext;

                        $data = array(
                            ":id_tempat" => $_POST['id_tempat'],
                            ":nama_tempat" => $_POST['nama_tempat'],
                            ":deskripsi_tempat" => $_POST['deskripsi_tempat'],
                            ":alamat_tempat" => $_POST['alamat_tempat'],
                            ":latitude_tempat" => $_POST['latitude_tempat'],
                            ":longitude_tempat" => $_POST['longitude_tempat'],
                            ":provinsi" => $_POST['provinsi'],
                            ":kabkota" => $_POST['kabkota'],
                            ":kecamatan" => $_POST['kecamatan'],
                            ":kontak" => $_POST['kontak'],
                            ":foto" => $nama_file_foto,
                        );

                        $foto = $data_tempat['foto'];
                        unlink('assets/foto/' . $foto);
                        move_uploaded_file($lokasi_foto, "assets/foto/$nama_file_foto");

                        $simpan = $DB->query("UPDATE tb_tempat SET 
                                                nama_tempat = :nama_tempat,
                                                deskripsi_tempat = :deskripsi_tempat,
                                                alamat_tempat = :alamat_tempat,
                                                latitude_tempat = :latitude_tempat,
                                                longitude_tempat = :longitude_tempat,
                                                provinsi = :provinsi,
                                                kabkota = :kabkota,
                                                kecamatan = :kecamatan,
                                                kontak = :kontak,
                                                foto = :foto                              
                                                WHERE id_tempat = :id_tempat", $data);
                    } else {
                        $data1 = array(
                            ":id_tempat" => $_POST['id_tempat'],
                            ":nama_tempat" => $_POST['nama_tempat'],
                            ":deskripsi_tempat" => $_POST['deskripsi_tempat'],
                            ":alamat_tempat" => $_POST['alamat_tempat'],
                            ":latitude_tempat" => $_POST['latitude_tempat'],
                            ":longitude_tempat" => $_POST['longitude_tempat'],
                            ":provinsi" => $_POST['provinsi'],
                            ":kabkota" => $_POST['kabkota'],
                            ":kecamatan" => $_POST['kecamatan'],
                            ":kontak" => $_POST['kontak'],
                        );

                        $simpan = $DB->query("UPDATE tb_tempat SET 
                                                nama_tempat = :nama_tempat,
                                                deskripsi_tempat = :deskripsi_tempat,
                                                alamat_tempat = :alamat_tempat,
                                                latitude_tempat = :latitude_tempat,
                                                longitude_tempat = :longitude_tempat,
                                                provinsi = :provinsi,
                                                kabkota = :kabkota,
                                                kecamatan = :kecamatan,
                                                kontak = :kontak
                                                WHERE id_tempat = :id_tempat", $data1);
                    }



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

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBSnFipxaBhQcKE_i8itckeTlY3cbOh9TE"></script>
<script>
    // variabel global marker
    var marker;

    function taruhMarker(peta, posisiTitik) {

        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }

        // isi nilai koordinat ke form
        document.getElementById("latitude_tempat").value = posisiTitik.lat();
        document.getElementById("longitude_tempat").value = posisiTitik.lng();

    }


    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(document.getElementById("latitude_tempat").value,
                document.getElementById("longitude_tempat").value),
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        // membuat Marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(document.getElementById("latitude_tempat").value,
                document.getElementById("longitude_tempat").value),
            map: peta
        });

        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            marker.setMap(null);

            taruhMarker(this, event.latLng);
        });

    }


    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- <script>
    var marker;

    function taruhMarker(peta, posisiTitik) {

        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }

        document.getElementById("latitude_tempat").value = posisiTitik.lat();
        document.getElementById("longitude_tempat").value = posisiTitik.lng();

    }

    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(
                document.getElementById("latitude_tempat").value,
                document.getElementById("longitude_tempat").value
            ),
            //center: new google.maps.LatLng(-8.5830695, 116.3202515),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        // membuat Marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(
                document.getElementById("latitude_tempat").value,
                document.getElementById("longitude_tempat").value
            ),
            map: peta
        });

        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });


    }

    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script> -->
