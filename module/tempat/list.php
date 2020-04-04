<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <h2 class="my-3">List Objek Wisata</h2>
            <hr>
        </div>

        <!-- card 1 -->
        <?php
        $halaman_sekarang = 1;
        if(isset($_GET['halaman']) && !empty($_GET['halaman']))
        {
          $halaman_sekarang = $_GET['halaman'];
        }
        $banyak_artikel = $DB->count("tb_tempat");
        $banyak_artikel_per_halaman = 8;
        $banyak_halaman = ceil($banyak_artikel/$banyak_artikel_per_halaman);
        $limit = ($halaman_sekarang - 1) * $banyak_artikel_per_halaman;
        
        $sql = "SELECT * FROM artikel LIMIT ".$limit.",".$banyak_artikel_per_halaman;
        
        $data_tempat = $DB->query("SELECT * FROM tb_tempat ORDER BY id_tempat DESC LIMIT :limit, :offset", ["limit" => $limit, "offset" => $banyak_artikel_per_halaman])->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data_tempat as $no => $pecah) {
        ?>
          <div class="col-sm-3 col-xs-12 my-3">
            <div class="card" style="min-height: 255px;">
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
        <div class="col-12">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php
                if($halaman_sekarang == 1)
                {
                  echo '<li class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>';
                }
                else
                {
                  echo '<li class="page-item"><a class="page-link" href="index.php?page=module/tempat/list&halaman='.($halaman_sekarang-1).'">Sebelumnya</a></li>';
                }
              ?>
              
              <?php
                for($x = 1; $x <= $banyak_halaman; $x++)
                {
                  if($halaman_sekarang == $x)
                  {
              ?>
                    <li class="page-item active"><a class="page-link" href="index.php?page=module/tempat/list&halaman=<?=$x?>"><?=$x?></a></li>
              <?php
                  }
                  else
                  {
              ?>
                    <li class="page-item"><a class="page-link" href="index.php?page=module/tempat/list&halaman=<?=$x?>"><?=$x?></a></li>
              <?php
                  }
                }
              ?>
              <?php
                if($halaman_sekarang == $banyak_halaman)
                {
                  echo '<li class="page-item disabled"><a class="page-link">Selanjutnya</a></li>';
                }
                else
                {
                  echo '<li class="page-item"><a class="page-link" href="index.php?page=module/tempat/list&halaman='.($halaman_sekarang+1).'">Selanjutnya</a></li>';
                }
              ?>
              
            </ul>
          </nav>
        </div>
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
