<?php

$data_tempat = $DB->query("DELETE FROM `tb_tempat` WHERE id_tempat = :id_tempat ", array(":id_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);

echo "<script>alert('Data Dihapus');
    window.location='index.php?page=module/tempat/index';
    </script>";
