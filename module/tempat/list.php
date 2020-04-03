<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <h2 class="my-3">List Objek Wisata</h2>
            <hr>
        </div>

        <!-- card 1 -->
        <?php
        $data_tempat = $DB->query("SELECT * FROM tb_tempat ORDER BY id_tempat DESC")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data_tempat as $no => $pecah) {
            # code...
        ?>
          <div class="col-sm-3 col-xs-12 my-3">
            <div class="card">

                <a href="tempat/<?php echo $pecah['id_tempat']; ?>" data-toggle="modal" data-target="#tampil" class="text-decoration-none" onclick="ambilDataTempat('<?php echo $no ?>')">
                    <img class="img-fluid pt-2 pl-3 pr-3 pb-2 img-thumbnail rounded mx-auto d-block" src="./assets/foto/<?php echo $pecah['foto']; ?>" style="width: 240px; height: 153px; margin-top:5px;" class="card-img-top" alt="<?php echo $pecah['nama_tempat']; ?>">
                    <div class="card-body" style="margin-top: 5px;">
                        <h5 class="card-title" style="font-size: 16px; color:black;"><?php echo $pecah['nama_tempat'] ?></h5>
                        <p class="card-text text-muted " style="font-size: 14px; color:black;"><?php  ?></p>
                    </div>
                </a>
            </div>
          </div>
        <?php } ?>
    </div>

    <div class="modal fade" id="tampil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4>List Wisata</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <img src="" class="img-thumbnail" alt="" id="foto" class="img-responsive" style="margin: 10px; padding: 10px; width: 300px;">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 form-label"><b>Nama Tempat</b></label>
                                    <label for="" class="col-sm-8 form-label" id="nama_tempat"></label>
                                    <!-- <input type="text" for="" class="col-sm-8 form-control" id="nama_tempat"></label> -->
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 form-label"><b>Deskripsi Tempat</b></label>
                                    <label for="" class="col-sm-8 form-label" id="deskripsi_tempat"></label>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 form-label"><b>Provinsi</b></label>
                                    <label for="" class="col-sm-8 form-label" id="provinsi"></label>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 form-label"><b>Kab/Kota</b></label>
                                    <label for="" class="col-sm-8 form-label" id="kabkota"></label>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 form-label"><b>Kecamatan</b></label>
                                    <label for="" class="col-sm-8 form-label" id="kecamatan"></label>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 form-label"><b>Alamat</b></label>
                                    <label for="" class="col-sm-8 form-label" id="alamat_tempat"></label>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 form-label"><b>Kontak</b></label>
                                    <label for="" class="col-sm-8 form-label" id="kontak"></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function ambilDataTempat(id) {
        var data_tempat = <?= json_encode($data_tempat) ?>;
        var data_terpilih = data_tempat[id];
        console.log(data_terpilih);
        document.getElementById("nama_tempat").innerHTML = data_terpilih.nama_tempat;
        document.getElementById("deskripsi_tempat").innerHTML = data_terpilih.deskripsi_tempat;
        document.getElementById('provinsi').innerHTML = data_terpilih.provinsi;
        document.getElementById('kabkota').innerHTML = data_terpilih.kabkota;
        document.getElementById('kecamatan').innerHTML = data_terpilih.kecamatan;
        document.getElementById('alamat_tempat').innerHTML = data_terpilih.alamat_tempat;
        document.getElementById('kontak').innerHTML = data_terpilih.kontak;
        document.getElementById('foto').src = "assets/foto/" + data_terpilih.foto;
        document.getElementById('foto').alt = data_terpilih.nama_tempat;
        $("#tampil").show();
    }
</script>
