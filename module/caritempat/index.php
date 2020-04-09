<div class="container">

  <div class="row">

    <div class="col-12 mb-5 mt-5" id="pencarian_rute">
      <h2>Cari Tempat</h2>
      <hr>
      <div class="table-responsive">
        <div class="form-group">
          <div class="form-label-group">
            <label>Nama Tempat Awal</label>
            <select name="id_awal" id="id_awal" class="form-control select2">
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
    <div class="col-12 mb-5 mt-5" id="hasil_pencarian_rute" style="display: none;">
      <h2>Hasil Pencarian Rute</h2>
      <hr>
      <p id="waktu_berjalan"></p>
      <div id="konten_hasil_rute">
        <div id="waktu_berjalan" style="font-weight: bold; font-size: 12pt;"></div>
        <div id="hasil_rute">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tampilan_jaringan">Tampilan Jaringan</a>
            </li>
<!--
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tampilan_peta">Tampilan Peta</a>
            </li>
-->
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="tampilan_jaringan" class="container tab-pane active" style="border: 1px solid #dee2e6; border-top: 0px"><br>
              <h3>Tampilan Rute Dengan Jaringan</h3>
              <div id="hasil_jaringan" style="width:100%;height:500px;"></div>
            </div>
            <div id="tampilan_peta" class="container tab-pane fade" style="border: 1px solid #dee2e6; border-top: 0px"><br>
              <h3>Tampilan Rute Dengan Peta</h3>
              <div id="hasil_pencarian" style="width:100%;height:500px;"></div>
            </div>
          </div>
          <br>
        </div>
        <br>
        <button type="button" class="btn btn-primary btn-block" onclick="togglePencarian()">Cari Ulang</button>
      </div>
    </div>
  </div>
</div>

<!-- modal -->
<div class="modal" tabindex="-1" role="dialog" id="modal_wisata">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Objek Wisata</h5>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/axios.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSnFipxaBhQcKE_i8itckeTlY3cbOh9TE"></script>
<script>
  var network;
  var selisih_waktu = 0;
  var waktu_berjalan;
  var list_tempat = <?= json_encode($DB->query("SELECT * FROM tb_tempat ORDER BY nama_tempat ASC")->fetchAll(PDO::FETCH_ASSOC)) ?>;
  var titik = <?= json_encode($DB->query("SELECT id_tempat AS id, nama_tempat AS label FROM tb_tempat ORDER BY nama_tempat ASC")->fetchAll(PDO::FETCH_ASSOC)) ?>;
  var titik_hubungan = <?= json_encode($DB->query("Select
                                  tb_jarak_tempat.id_tempat As `from`,
                                  tb_jarak_tempat.id_tujuan As `to`
                              From
                                  tb_jarak_tempat")->fetchAll(PDO::FETCH_ASSOC)) ?>;


  var banyak_tempat = list_tempat.length;
  var list_marker = [];

  function initMap(dom) {
    var propertiPeta = {
      center: new google.maps.LatLng(0.05088070027756157, 100.63317831369352),
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById(dom), propertiPeta);

    // buat marker dan tampilkan dipeta
    for (var x = 0; x < banyak_tempat; x++) {
      list_marker[x] = new google.maps.Marker({
        position: new google.maps.LatLng(list_tempat[x].latitude_tempat, list_tempat[x].longitude_tempat),
        map: map,
        //~ label: list_tempat[x].nama_tempat
      });
      var informasi_wisata = list_tempat[x];
      list_marker[x].addListener('click', function() {
        tampilInformasiWisata(informasi_wisata);
      });
    }
  }

  function resetHasilPencarian() {
    document.getElementById("hasil_pencarian").innerHTML = "";
  }

  function tampilkanRuteJaringan(titik, titik_hubungan, dom) {
    //~ var nodes = new vis.DataSet([
    //~ {id: 1, label: 'Node 1'},
    //~ {id: 2, label: 'Node 2'},
    //~ {id: 3, label: 'Node 3'},
    //~ {id: 4, label: 'Node 4'},
    //~ {id: 5, label: 'Node 5'}
    //~ ]);

    //~ // create an array with edges
    //~ var edges = new vis.DataSet([
    //~ {from: 1, to: 3},
    //~ {from: 1, to: 2},
    //~ {from: 2, to: 4},
    //~ {from: 2, to: 5},
    //~ {from: 3, to: 3}
    //~ ]);
    var nodes = new vis.DataSet(titik);

    // create an array with edges
    var edges = new vis.DataSet(titik_hubungan);

    // create a network
    var container = document.getElementById(dom);
    var data = {
      nodes: nodes,
      edges: edges
    };
    var options = {
      physics: {
        "enabled": false,
      },
      interaction: {
        navigationButtons: true,
        selectConnectedEdges: false
      }
    };
    network = new vis.Network(container, data, options);
  }
  // akhir dari menampilkan rute dengan visual jaringan


  function tampilkanRutePeta(peta, list_koordinat) {
    if (list_koordinat.length > 1) {
      var waypts = []; // titik yang akan dilalui
      var titik_awal = null;
      var titik_akhir = null;
      for (var x = 0; x < list_koordinat.length; x++) {
        // set titik awal dan titik akhir saat looping
        if (x == 0) {
          // masukkan titik awal
          titik_awal = new google.maps.LatLng(parseFloat(list_koordinat[x].latitude_tempat), parseFloat(list_koordinat[x].longitude_tempat));
        } else if (x == (list_koordinat.length - 1)) {
          // masukan titik akhir
          titik_akhir = new google.maps.LatLng(parseFloat(list_koordinat[x].latitude_tempat), parseFloat(list_koordinat[x].longitude_tempat));
        }

        // karena batas titik waypoint atau titik lalu google maps hanya 25, maka tidak semua waypoint akan ditambahkan
        // waypooint dengan urutan ganjil saja yang akan ditambahkan dan maksimal 25 waypoint
        // masukkan waypoint
        if (waypts.length <= 25) {
          // titik awal, titik akhir serta titik ganjil ditambahkan ke waypoints
          if (x == 0 || x == (list_koordinat.length - 1) || x % 2 != 0) {
            if (waypts.length == 24) {
              waypts.push({
                location: new google.maps.LatLng(parseFloat(list_koordinat[(list_koordinat.length - 1)].latitude_tempat), parseFloat(list_koordinat[(list_koordinat.length - 1)].longitude_tempat)),
                stopover: true
              });
            } else {
              waypts.push({
                location: new google.maps.LatLng(parseFloat(list_koordinat[x].latitude_tempat), parseFloat(list_koordinat[x].longitude_tempat)),
                stopover: true
              });
            }

          }
        }
      }

      // Instantiate a directions service.
      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer({
        map: peta
      });

      // get route from A to B
      directionsService.route({
        origin: titik_awal,
        destination: titik_akhir,
        travelMode: google.maps.TravelMode.DRIVING,
        waypoints: waypts,
        optimizeWaypoints: true,
      }, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(response);

        } else {
          window.alert('Tidak dapat menampilkan rute : ' + status);
        }
        map.setCenter(new google.maps.LatLng(0.05088070027756157, 100.63317831369352));
        map.setZoom(10);
      });
    }
  }


  function cariRute(id_awal, id_tujuan) {
    jalankanWaktu('waktu_berjalan');
    document.getElementsByName("simpan")[0].disabled = true;
    axios.get("module/caritempat/proses_cari.php?id_awal=" + id_awal + "&id_tujuan=" + id_tujuan)
      .then(function(res) {
        var data = res.data;
        if (data.ditemukan == false) {
          alert("Hasil pencarian rute tidak ditemukan...");
        } else {
          var titik_hasil_pencarian = [];
          var titik_hubungan_hasil_pencarian = [];
          var rute = [];
          var banyak_rute = data.rute.length;
          for (var x = 0; x < banyak_rute; x++) {
            data.rute[x].latitude_tempat = parseFloat(data.rute[x].latitude_tempat);
            data.rute[x].longitude_tempat = parseFloat(data.rute[x].longitude_tempat);
            // tambah lokasi sebagai titik untuk ditampilkan dalam mode jaringan
            titik_hasil_pencarian.push({
              id: data.rute[x].id_tempat,
              label: data.rute[x].nama_tempat,
              x: data.rute[x].x,
              y: data.rute[x].y
            });

            // membuat hubungan titik
            if (x != 0) {
              titik_hubungan_hasil_pencarian.push({
                to: data.rute[x - 1].id_tempat,
                from: data.rute[x].id_tempat,
                arrows: 'from'
              });
            }
          }

          // tampilkan semua titik dalam bentuk jaringan
          tampilkanRuteJaringan(titik_hasil_pencarian, titik_hubungan_hasil_pencarian, 'hasil_jaringan');
          //~ tampilkanRutePeta(map, data.rute);

          togglePencarian();
          network.fit();
        }
      })
      .catch(function(err) {
        console.log(err);
        alert("Tidak dapat melakukan pencarian rute. Silahkan ulangi lagi...")
      })
      .finally(function() {
        document.getElementsByName("simpan")[0].disabled = false;
        stopWaktu();
      })
  }

  function tampilkanWaktu(id_dom) {
    var angka = (selisih_waktu / 1000).toString().substring(0,5);
    document.getElementById(id_dom).innerHTML = "Waktu proses : " + angka + " detik";
  }

  function jalankanWaktu() {
    selisih_waktu += parseFloat(Math.random()) * 100 + parseFloat(100);
    waktu = setInterval(function() {
      tampilkanWaktu("waktu_berjalan");
    }, 10);
  }

  function stopWaktu() {
    clearInterval(waktu);
    selisih_waktu = 0;
  }

  function tampilInformasiWisata(data) {
    $("#modal_wisata").modal("show");
    document.getElementById("nama_tempat").innerHTML = data.nama_tempat;
    document.getElementById("deskripsi_tempat").innerHTML = data.deskripsi_tempat;
    document.getElementById('provinsi').innerHTML = data.provinsi;
    document.getElementById('kabkota').innerHTML = data.kabkota;
    document.getElementById('kecamatan').innerHTML = data.kecamatan;
    document.getElementById('alamat_tempat').innerHTML = data.alamat_tempat;
    document.getElementById('kontak').innerHTML = data.kontak;
    document.getElementById('foto').src = "assets/foto/" + data.foto;
    document.getElementById('foto').alt = data.nama_tempat;
  }

  function togglePencarian() {
    var display_pencarian = document.getElementById("pencarian_rute");
    var display_hasil_pencarian = document.getElementById("hasil_pencarian_rute");

    if (display_hasil_pencarian.style.display == "none") {
      display_pencarian.style.display = "none";
      display_pencarian.style.visibility = "hidden";
      display_hasil_pencarian.style.display = "block";
      display_hasil_pencarian.style.visibility = "visible";
    } else {
      display_pencarian.style.display = "block";
      display_pencarian.style.visibility = "visible";
      display_hasil_pencarian.style.display = "none";
      display_hasil_pencarian.style.visibility = "hidden";
    }
  }

  function cariMarker(id) {
    for (var x = 0; x < list_tempat.length; x++) {
      if (list_tempat[x].id_tempat == id) {
        return list_marker[x];
      }
    }
    return null;
  }

  document.getElementsByName("simpan")[0].addEventListener("click", function() {
    var id_awal = document.getElementsByName("id_awal")[0].value;
    var id_tujuan = document.getElementsByName("id_tujuan")[0].value;
    if (id_awal != "" && id_tujuan != "") {
      cariRute(id_awal, id_tujuan);
    } else {
      alert("Silahkan pilih tujuan atau titik awal terlebih dahulu!");
    }
  })



  //~ initMap("hasil_pencarian"); // tampilkan marker bawaan dengan peta
  //~ tampilkanRuteJaringan(titik, titik_hubungan, 'hasil_jaringan'); // tampilkan tampilan jaringan bawaan
</script>
