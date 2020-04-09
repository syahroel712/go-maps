<?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $data_jaringan = json_decode($_POST['data_jaringan']);
    $data_jaringan = get_object_vars($data_jaringan);
    $id_jaringan = array_keys($data_jaringan);
    foreach($id_jaringan as $data)
    {
      // update posisi jaringan berdasarkan x dan y
      $DB->query("UPDATE tb_tempat SET x = :x, y = :y WHERE id_tempat = :id_tempat", ["x" => $data_jaringan[$data]->x, "y" => $data_jaringan[$data]->y, "id_tempat" => $data]);
    }
    echo "<script>alert('Data berhasil disimpan');</script>";
  }
?>
<div class="container">
  <div class="row">
    <div class="col-12 mb-5 mt-5" id="hasil_pencarian_rute">
      <h2>Atur Posisi Tempat</h2>
      <hr>
      <p><i>*Silahkan geser posisi titik sesuai keinginan dan tekan tombol "SIMPAN" untuk menyimpan perubahan.</i></p>
      <div id="hasil_jaringan" style="width:100%;height:500px; border: 1px solid lightgray;"></div>
      <form id="form_jaringan" method="POST">
        <input type="hidden" name="data_jaringan" />
        <button type="button" class="btn btn-block btn-primary" onclick="simpanData()">SIMPAN</button>
      </form>
    </div>
  </div>
</div>
<script>
  var network;
  var list_tempat = <?= json_encode($DB->query("SELECT * FROM tb_tempat ORDER BY nama_tempat ASC")->fetchAll(PDO::FETCH_ASSOC)) ?>;
  var titik = new vis.DataSet(<?= json_encode($DB->query("SELECT id_tempat AS id, nama_tempat AS label, x, y FROM tb_tempat ORDER BY nama_tempat ASC")->fetchAll(PDO::FETCH_ASSOC)) ?>);
  var titik_hubungan = new vis.DataSet(<?= json_encode($DB->query("Select
                                  tb_jarak_tempat.id_tempat As `from`,
                                  tb_jarak_tempat.id_tujuan As `to`
                              From
                                  tb_jarak_tempat")->fetchAll(PDO::FETCH_ASSOC)) ?>);
  var banyak_tempat = list_tempat.length;
  var list_marker = [];

  function tampilkanRuteJaringan(dom) {
    var container = document.getElementById(dom);
    var data = {
      nodes: titik,
      edges: titik_hubungan
    };
    var options = {
      physics: {
        "enabled": false,
      },
      interaction: {
        navigationButtons: true,
        selectConnectedEdges: false
      },
      nodes: {
        margin: 10
      }
    };
    network = new vis.Network(container, data, options);
  }
  
  function simpanData()
  {
    document.getElementsByName("data_jaringan")[0].value = JSON.stringify(network.getPositions());
    document.getElementById("form_jaringan").submit();
  }
  
  tampilkanRuteJaringan("hasil_jaringan");
</script>
