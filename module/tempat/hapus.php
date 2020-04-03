<?php
$data_tempat = $DB->query("SELECT * FROM tb_tempat WHERE id_tempat = :id_tempat ", array(":id_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);

$foto = $data_tempat['foto'];
unlink('assets/foto/' . $foto);

$data_tempat = $DB->query("DELETE FROM `tb_tempat` WHERE id_tempat = :id_tempat ", array(":id_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);

echo "<script>alert('Data Dihapus');
    window.location='index.php?page=module/tempat/index';
    </script>";
