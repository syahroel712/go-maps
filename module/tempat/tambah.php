<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Input Tempat</h2>
            <hr>
            <button onclick="goBack()" class="btn btn-info">Kembali</button>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p><b><i>*Klik pada peta untuk menggeser marker</i></b></p>
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                </div>

                <div class="col-md-6">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Nama Tempat</label>
                                <input name="nama_tempat" type="text" class="form-control" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Deskripsi Tempat</label>
                                <textarea name="deskripsi_tempat" class="form-control" cols="30" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Alamat Tempat</label>
                                <textarea name="alamat_tempat" class="form-control" cols="30" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Latitude</label>
                                <input name="latitude_tempat" id="latitude_tempat" type="text" class="form-control" autofocus="autofocus">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Longitude</label>
                                <input name="longitude_tempat" id="longitude_tempat" type="text" class="form-control" autofocus="autofocus">
                            </div>
                        </div>

                        <button name="simpan" class="btn btn-primary btn-block">SIMPAN</button>
                    </form>

                    <?php
                    if (isset($_POST['simpan'])) {
                        $data = array(
                            ":nama_tempat" => $_POST['nama_tempat'],
                            ":deskripsi_tempat" => $_POST['deskripsi_tempat'],
                            ":alamat_tempat" => $_POST['alamat_tempat'],
                            ":latitude_tempat" => $_POST['latitude_tempat'],
                            ":longitude_tempat" => $_POST['longitude_tempat'],
                        );
                        // var_dump($data);
                        // exit;
                        $simpan = $DB->query("INSERT INTO tb_tempat(nama_tempat, deskripsi_tempat, alamat_tempat, latitude_tempat, longitude_tempat) VALUES (:nama_tempat, :deskripsi_tempat, :alamat_tempat, :latitude_tempat, :longitude_tempat)", $data);
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSnFipxaBhQcKE_i8itckeTlY3cbOh9TE"></script>
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
            center: new google.maps.LatLng(-0.2288894365365062, 100.63173882695315),
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        // membuat Marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-0.2288894365365062, 100.63173882695315),
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
            center: new google.maps.LatLng(-0.952553, 100.389385),
            //center: new google.maps.LatLng(-8.5830695, 116.3202515),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        // membuat Marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-0.952553, 100.389385),
            map: peta,
            draggable: true
        });

        marker.addListener("drag", function() {
            console.log("angek se ma")
        })


    }

    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script> -->
