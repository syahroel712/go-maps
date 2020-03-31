<?php
  $waktu_awal = strtotime(date("Y-m-d H:i:s"));
  require_once "../../config/koneksi.php";
  $id_awal = $_GET['id_awal'];
  $id_tujuan = $_GET['id_tujuan'];
  $daftar_tempat = []; // hasil pencarian atau titik yang akan dilewati disimpan disini
  $data_hasil = [
    "ditemukan" => false,
    "rute" => [],
  ];
  
  $daftar_tempat[] = $id_awal; // titik awal ditambahkan ke daftar tempat sebagai start
  $id_tempat_sekarang = $id_awal; // menampung id_tempat yang sedang dipilih untuk diproses
  $cari_titik = $DB->get("tb_jarak_tempat", ["id_tujuan"], ["id_tempat" => $id_tempat_sekarang, "id_tujuan[!]" => $daftar_tempat, "ORDER" => ["jarak_tempat" => "ASC"]]);
  while(!empty($cari_titik))
  {
    $id_tempat_sekarang = $cari_titik['id_tujuan']; // simpan titik terakhir kali yg ditemukan
    $daftar_tempat[] = $cari_titik['id_tujuan']; // titik yg ketemu disimpan didaftar tempat
    $cari_titik = $DB->get("tb_jarak_tempat", ["id_tujuan"], ["id_tempat" => $id_tempat_sekarang, "id_tujuan[!]" => $daftar_tempat, "ORDER" => ["jarak_tempat" => "ASC"]]);
    if($id_tempat_sekarang == $id_tujuan)
    {
      $data_hasil["ditemukan"] = true;
      break;
    }
  }
  $data_hasil["rute"] = $DB->select("tb_tempat", "*", ["id_tempat" => $daftar_tempat]);
  echo json_encode($data_hasil);
  exit;
?>
