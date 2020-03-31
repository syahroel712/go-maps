<div class="container">

    <div class="row">

        <div class="col-12 mb-5 mt-5">
            <h2>Cari Tempat</h2>
            <hr>
            <div class="table-responsive">
                <div class="form-group">
                    <div class="form-label-group">
                        <label>Nama Tempat Awal</label>
                        <select name="id_awal" id="id_awal" class="form-control select2">
                            <option value="">Pilih Tempat</option>
                            ?>
                            <?php
                            $data_tempat = $DB->query("SELECT * FROM tb_tempat ORDER BY nama_tempat ASC");
                            foreach ($data_tempat as $no => $data) {
                            ?>
                                <option value="<?php echo $data['id_tempat'] ?>"><?php echo $data['nama_tempat'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                        <label>Nama Tempat Tujuan</label>
                        <select name="id_tujuan" id="id_tujuan" class="form-control select2">
                            <option value="">Pilih Tempat</option>
                            <?php
                            $data_tempat = $DB->query("SELECT * FROM tb_tempat ORDER BY nama_tempat ASC");
                            foreach ($data_tempat as $no => $data) {
                            ?>
                                <option value="<?php echo $data['id_tempat'] ?>"><?php echo $data['nama_tempat'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button name="simpan" class="btn btn-primary btn-block">CARI</button>
            </div>
        </div>
        <div class="col-12 mb-5 mt-5">
          <div id="hasil_pencarian" style="width:100%;height:500px;"></div>
        </div>
    </div>
</div>
<script src="assets/js/axios.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
  var list_tempat = <?=json_encode($DB->query("SELECT * FROM tb_tempat")->fetchAll(PDO::FETCH_ASSOC))?>;
  var banyak_tempat = list_tempat.length;
  var list_marker = [];
  var propertiPeta = {
    center: new google.maps.LatLng(-0.2288894365365062, 100.63173882695315),
    zoom: 18,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var bounds;

  var peta;
  
  function initialize() {
    bounds = new google.maps.LatLngBounds();
    peta = new google.maps.Map(document.getElementById("hasil_pencarian"), propertiPeta);
    // buat marker dan tampilkan dipeta
    for(var x = 0; x < banyak_tempat; x++)
    {
      list_marker[x] = new google.maps.Marker({
        position: new google.maps.LatLng(list_tempat[x].latitude_tempat, list_tempat[x].longitude_tempat),
        map: peta,
        label: list_tempat[x].nama_tempat
      });
    }
    bounds.extend(list_marker[x]);
    peta.fitBounds(bounds);
  }
  
  function resetHasilPencarian()
  {
    document.getElementById("hasil_pencarian").innerHTML = "";
  }
  function cariRute(id_awal, id_tujuan)
  {
    document.getElementsByName("simpan")[0].disabled = true;
    axios.get("module/caritempat/proses_cari.php?id_awal=" + id_awal + "&id_tujuan=" + id_tujuan)
      .then(function(res)
      {
        var data = res.data;
        if(data.ditemukan == false)
        {
          alert("Hasil pencarian rute tidak ditemukan...");
        }
        else
        {
          //~ document.getElementById("hasil_pencarian").innerHTML = res.data;
        }
      })
      .catch(function(err)
      {
        alert("Tidak dapat melakukan pencarian rute. Silahkan ulangi lagi...")
      })
      .finally(function(){
        document.getElementsByName("simpan")[0].disabled = false;
      })
  }
  
  document.getElementsByName("simpan")[0].addEventListener("click", function(){
    var id_awal = document.getElementsByName("id_awal")[0].value;
    var id_tujuan = document.getElementsByName("id_tujuan")[0].value;
    if(id_awal != "" && id_tujuan != "")
    {
      cariRute(id_awal, id_tujuan);
    }
    else
    {
      alert("Silahkan pilih tujuan atau titik awal terlebih dahulu!");
    }
  })
   
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
