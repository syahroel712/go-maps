<?php
session_start();

$id = $_GET['id'];

$_SESSION['id_tempat'] = $id;
// echo $_SESSION['id_tempat'];
$data_tempat = $DB->query("SELECT * FROM tb_tempat WHERE id_tempat = :id_tempat ", array(":id_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 mt-4">
            <h2>Input Jarak Tempat <?php echo $data_tempat['nama_tempat']  ?></h2>
            <hr>
            <button onclick="goBack()" class="btn btn-info">Kembali</button>
            <br>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                </div>

                <div class="col-md-6">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input name="id_tempat" type="hidden" class="form-control" autofocus="autofocus" value="<?php echo $_SESSION['id_tempat'] ?>" placeholder="Dalam satuan kilometer">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Nama Tempat Tujuan</label>
                                <select name="id_tujuan" id="" class="form-control select2">
                                    <option value="">Pilih Tempat</option>
                                    ?>
                                    <?php
                                    $data_tempat = $DB->query("SELECT * FROM tb_tempat");
                                    foreach ($data_tempat as $no => $data) {
                                        if ($data['id_tempat'] != $_SESSION['id_tempat']) {
                                    ?>
                                            <option value="<?php echo $data['id_tempat'] ?>"><?php echo $data['nama_tempat'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Jarak Tempat</label>
                                <input name="jarak_tempat" type="text" class="form-control" autofocus="autofocus" placeholder="Dalam satuan kilometer">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label>Waktu Tempuh</label>
                                <input name="waktu_tempuh" type="text" class="form-control" autofocus="autofocus" placeholder="Dalam satuan menit">
                            </div>
                        </div>
                        <button name="simpan" class="btn btn-primary btn-block">SIMPAN</button>
                    </form>

                    <?php
                    if (isset($_POST['simpan'])) {
                        $data = array(
                            ":id_tempat" => $_POST['id_tempat'],
                            ":id_tujuan" => $_POST['id_tujuan'],
                            ":jarak_tempat" => $_POST['jarak_tempat'],
                            ":waktu_tempuh" => $_POST['waktu_tempuh'],
                        );
                        // var_dump($data);
                        // exit;
                        $simpan = $DB->query("INSERT INTO tb_jarak_tempat(id_tempat, id_tujuan, jarak_tempat, waktu_tempuh) VALUES (:id_tempat, :id_tujuan, :jarak_tempat, :waktu_tempuh)", $data);
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
