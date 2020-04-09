<div class="container">

    <div class="row">

        <div class="col-md-12 mb-5 mt-5">
            <h2>Data Tempat</h2>
            <hr>
            <div class="table-responsive">
                <a href="?page=module/tempat/tambah" class="btn btn-primary ">Tambah Data</a>
                <a href="?page=module/tempat/atur_posisi_tempat" class="btn btn-success">Atur Posisi Tempat</a>
                <br><br>
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama Tempat</th>
                            <th>Deskripsi</th>
                            <th>Alamat</th>
                            <th>Koordinat</th>
                            <th>Kontak</th>

                            <th width="190px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data_tempat = $DB->query("SELECT * FROM tb_tempat");
                        foreach ($data_tempat as $no => $data) {
                        ?>
                            <tr>
                                <td><?php echo $data['id_tempat']; ?></td>
                                <td><?php echo $data['nama_tempat']; ?></td>
                                <td>
                                    <img src="assets/foto/<?php echo $data['foto']; ?>" alt="-" width="100px">
                                    <br>
                                    <?php echo $data['deskripsi_tempat']; ?>
                                </td>
                                <td>
                                    <ul>
                                        <li>Provinsi : <?php echo $data['provinsi']; ?></li>
                                        <li>Kab/Kota : <?php echo $data['kabkota']; ?></li>
                                        <li>Kecamatan : <?php echo $data['kecamatan']; ?></li>
                                        <li>Alamat : <?php echo $data['alamat_tempat']; ?></li>
                                    </ul>

                                </td>
                                <td>
                                    <ul>
                                        <li>Latitude : <?php echo $data['latitude_tempat']; ?></li>
                                        <li>Longitude : <?php echo $data['longitude_tempat']; ?></li>
                                    </ul>
                                </td>
                                <td>
                                    <?php echo $data['kontak'] ?>
                                </td>
                                <td>
                                    <a href="index.php?page=module/tempat/jarak_terkait&id=<?php echo $data['id_tempat'];  ?> " class="btn btn-success btn-sm">Jarak Terkait</a>
                                    <a href="index.php?page=module/tempat/edit&id=<?php echo $data['id_tempat'];  ?> " class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=module/tempat/hapus&id=<?php echo $data['id_tempat'];  ?> " onclick="return confirm('Yakin hapus data ini?');" class="btn btn-danger btn-sm">Hapus</a>
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
