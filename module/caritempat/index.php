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
        <div class="col-12 mb-5 mt-5" id="pencarian">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tampilan_peta">Tampilan Peta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tampilan_jaringan">Tampilan Jaringan</a>
            </li>
          </ul>
        
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="tampilan_peta" class="container tab-pane active"><br>
              <h3>Tampilan Rute Dengan Peta</h3>
              <div id="hasil_pencarian" style="width:100%;height:500px;border: 1px solid lightgray;"></div>
            </div>
            <div id="tampilan_jaringan" class="container tab-pane fade"><br>
              <h3>Tampilan Rute Dengan Jaringan</h3>
              <div id="hasil_jaringan" style="width:100%;height:500px;border: 1px solid lightgray;"></div>
            </div>
          </div>
          
        </div>
    </div>
</div>
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/peta.js"></script>
<script>
  var list_tempat = <?=json_encode($DB->query("SELECT * FROM tb_tempat ORDER BY nama_tempat ASC")->fetchAll(PDO::FETCH_ASSOC))?>;
  var banyak_tempat = list_tempat.length;
  var list_marker = [];
  
  function initMap(dom) {
    //variabel penampung peta
    map = L.map(dom, {layers: [OpenStreetMap]}).setView(posisi, zoom); // set layer awal langsung ke OpenStreetMap
    
    L.control.layers(penyediaPeta).addTo(map); // tambahkan semua layer penyedia peta ke instance peta sekarang
          
    map.addLayer(penyediaPeta['Mapbox Streets']);
    
    // buat marker dan tampilkan dipeta
    for(var x = 0; x < banyak_tempat; x++)
    {
        list_marker[x] = L.marker([list_tempat[x].latitude_tempat, list_tempat[x].longitude_tempat])
                          .bindPopup(list_tempat[x].nama_tempat)
                          .addTo(map);
    }
    
  }
  
  function resetHasilPencarian()
  {
    document.getElementById("hasil_pencarian").innerHTML = "";
  }
  
  function tampilkanRuteJaringan(titik, titik_hubungan, dom)
  {
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
    var options = {};
    var network = new vis.Network(container, data, options);
  }
  
  // menampilkan rute dengan visual jaringan
    // create an array with nodes
    
  // akhir dari menampilkan rute dengan visual jaringan
  
  
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
        var titik = [];
        var titik_hubungan = [];
        var rute = [];
        var banyak_rute = data.rute.length;
        for(var x = 0; x < banyak_rute; x++)
        {
          
          // menentukan titik awal dan titik akhir daripada peta
          if(x == 0 || x == (banyak_rute - 1))
          {
            rute.push(L.latLng(data.rute[x].latitude_tempat, data.rute[x].longitude_tempat));
          }
          
          // tambah lokasi sebagai titik untuk ditampilkan dalam mode jaringan
          titik.push({id: data.rute[x].id_tempat, label: data.rute[x].nama_tempat});
          
          // membuat hubungan titik
          if(x != 0)
          {
            titik_hubungan.push({from: data.rute[x-1].id_tempat, to: data.rute[x].id_tempat, arrows:'from'});
          }
          
        }
        
        // tampilkan semua titik dalam bentuk jaringan
        tampilkanRuteJaringan(titik, titik_hubungan, 'hasil_jaringan');
        
        // bagian menampilkan rute pada peta
        L.Routing.control({
          waypoints: rute,
          router: L.Routing.mapbox(bingMaps.bingMapsKey)
        }).addTo(map);
        
        window.location.hash = '#pencarian';
      })
      .catch(function(err)
      {
        console.log(err);
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
   
  
  initMap("hasil_pencarian");
  
  
</script>
