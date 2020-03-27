<div class="container">

    <div class="row">

        <div class="col-md-12 mb-5 mt-5">
            <h2>Cari Tempat</h2>
            <hr>
            <div class="table-responsive">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label>Nama Tempat Awal</label>
                            <select name="id_tujuan" id="" class="form-control">
                                <option value="">Pilih Tempat</option>
                                ?>
                                <?php
                                $data_tempat = $DB->query("SELECT * FROM tb_tempat");
                                foreach ($data_tempat as $no => $data) {
                                ?>
                                    <option value="<?php echo $data['id_tempat'] ?>"><?php echo $data['nama_tempat'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-label-group">
                            <label>Nama Tempat Tujuan</label>
                            <select name="id_tujuan" id="" class="form-control">
                                <option value="">Pilih Tempat</option>
                                ?>
                                <?php
                                $data_tempat = $DB->query("SELECT * FROM tb_tempat");
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
                </form>
            </div>
        </div>

    </div>
</div>