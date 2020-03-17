<?php

$data_tempat = $DB->query("DELETE FROM `tb_jarak_tempat` WHERE id_jarak_tempat = :id_jarak_tempat ", array(":id_jarak_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);

echo "<script>alert('Data Dihapus');
    window.location='index.php?page=module/jarak_tempat/index';
    </script>";
