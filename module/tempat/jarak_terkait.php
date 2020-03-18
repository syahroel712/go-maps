<?php
session_start();

$id = $_GET['id'];

$_SESSION['id_tempat'] = $id;
// echo $_SESSION['id_tempat'];
$data_tempat = $DB->query("SELECT * FROM tb_tempat WHERE id_tempat = :id_tempat ", array(":id_tempat" => $_GET['id']))->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">

    <div class="row">

        <div class="col-md-12 mb-5 mt-5">
            <h2>Data Jarak Tempat <?php echo $data_tempat['nama_tempat']  ?> </h2>
            <hr>
            <div class="table-responsive">
                <a href="?page=module/jarak_tempat/tambah&id=<?php echo $_SESSION['id_tempat'];  ?>" class="btn btn-primary ">Tambah Data</a>
                <br><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama Tempat</th>
                            <th>Jarak Tempat</th>
                            <th>Waktu Tempuh</th>
                            <th width="131px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data_tempat = $DB->query("SELECT * FROM tb_jarak_tempat JOIN tb_tempat ON tb_jarak_tempat.id_tujuan = tb_tempat.id_tempat WHERE tb_jarak_tempat.id_tempat = $_SESSION[id_tempat] ");
                        foreach ($data_tempat as $no => $data) {
                        ?>
                            <tr>
                                <td><?php echo $no + 1; ?></td>
                                <td><?php echo $data['nama_tempat']; ?></td>
                                <td><?php echo $data['jarak_tempat']; ?></td>
                                <td><?php echo $data['waktu_tempuh']; ?></td>

                                <td>
                                    <a href="index.php?page=module/jarak_tempat/edit&id=<?php echo $data['id_jarak_tempat'];  ?> " class="btn btn-success btn-sm">Edit</a>
                                    <a href="index.php?page=module/jarak_tempat/hapus&id=<?php echo $data['id_jarak_tempat'];  ?> " onclick="return confirm('Yakin hapus data ini?');" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>