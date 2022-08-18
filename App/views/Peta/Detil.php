<div class="content-header">
    <div class="col">
        <div class="row">
            <h1 class="m-0 text-dark"><?= $data['title']; ?></h1>
        </div>
        <div class="row">
            <!-- KOLOM DETIL -->
            <div class="col-sm">
                <div class="row border-bottom border-dark">
                    <div class="col text-center">
                        <h1>Detil</h1>
                    </div>
                    <div class="col text-end">
                        <a href="<?= BASEURL; ?>/Peta/updatePeta/<?= $data['peta']['id_peta']; ?>" class="UpdatePeta" style="text-decoration: none ;" data-bs-toggle="modal" data-bs-target="#formUpdateData" data-bs-whatever="@mdo" data-id="<?= $data['peta']['id_peta']; ?>">
                            <img src="<?= BASEURL; ?>/assets/img/edit.jpg" width="35" height="35" alt="">
                        </a>
                        <a href="<?= BASEURL; ?>/Peta/hapusPeta/<?= $data['peta']['id_peta']; ?>" onclick="return confirm('Apakah Anda Yakin ?');">
                            <img src="<?= BASEURL; ?>/assets/img/delete.jpg" width="35" height="35" alt="">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <dl class="row mt-3">
                        <dt class="col-sm-3">Nomor Peta</dt>
                        <dd class="col-sm-9"><?= $data['peta']['Nomor']; ?></dd>

                        <dt class="col-sm-3">Tahun</dt>
                        <dd class="col-sm-9"><?= $data['peta']['Tahun']; ?></dd>

                        <dt class="col-sm-3">Nama Proyek/Kegiatan</dt>
                        <dd class="col-sm-9"><?= $data['peta']['Nama_Proyek_Kegiatan']; ?></dd>

                        <dt class="col-sm-3 text-truncate">Kecamatan</dt>
                        <dd class="col-sm-9"><?= $data['peta']['Kecamatan']; ?></dd>

                        <dt class="col-sm-3">Desa</dt>
                        <dd class="col-sm-9"><?= $data['peta']['Desa']; ?></dd>

                        <dt class="col-sm-3">Kendisi Fisik Peta</dt>
                        <dd class="col-sm-9"><?= $data['peta']['Kondisi_Fisik_Peta']; ?></dd>

                        <dt class="col-sm-3">File dwg</dt>
                        <dd class="col-sm-9"><?php
                                                if ($data['peta']['File_dwg'] === '') {
                                                    echo '
                            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#formUploadFiledwg" data-bs-whatever="@mdo">
                                <i class="fas fa-plus"> Upload File .dwg</i>
                            </button>';
                                                } else {
                                                    echo $data['peta']['File_dwg'];
                                                }
                                                ?>
                        </dd>

                        <dt class="col-sm-3">File geojson</dt>
                        <dd class="col-sm-9">
                            <?php
                            if ($data['peta']['File_geojson'] === '') {
                                echo '
                            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#formUploadFilegeojson" data-bs-whatever="@mdo">
                                <i class="fas fa-plus"> Upload File .geojson</i>
                            </button>
                            </div>';
                            } else {
                                echo $data['peta']['File_geojson'];
                            }
                            ?>
                        </dd>
                    </dl>
                </div>


                <!-- KOLOM PREVIEW -->
                <div class="col-sm">
                    <div class="row">
                        <h1>Preview</h1>
                    </div>
                    <!-- <a class="btn btn-primary mb-3 mt-3" href="<?= BASEURL; ?>/Peta/downloadPeta/<?= $data['peta']['id_peta']; ?>">Download</a> -->
                    <div class="row">
                        <?php if ($data['peta']['file_gambar'] != '') {
                            // variabel menampung tag img
                            $linkDownload = '<a class="' . 'btn btn-primary mb-3 mt-3"' . ' href="' . BASEURL . '/Peta/downloadPeta/' . $data['peta']['id_peta'] . '">Download</a>';
                            $img = '<img src="' . BASEURL . "/app/storage/file gambar/" . $data['peta']['file_gambar'] . '" class=' . '"img-fluid"' .  '"/>';

                            // eksekusi tag omg
                            echo $linkDownload, $img;
                        } else {
                            echo '<img src="' . BASEURL . "/assets/img/no_image.png" . '" class=' . '"img-fluid rounded mx-auto d-block"' . '/>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- MODAL UPDATE PETA -->
<div class="modal fade" id="formUpdateData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judulForm">Formulir Update Peta</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Peta/tambahFiledwg" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" value="<?= $data['peta']['id_peta']; ?>" id="id_peta" name="id_peta">

                        <label for="NamaPeta" class="form-label">Nama Proyek/Kegiatan</label>
                        <input type="text" class="form-control" id="NamaPeta" name="Nama_Proyek_Kegiatan" value="<?= $data['peta']['Nama_Proyek_Kegiatan']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Nomor_Peta" class="form-label">Nomor</label>
                        <input class="form-control" id="Nomor_Peta" name="Nomor" value="<?= $data['peta']['Nomor']; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="Tahun" class="form-label">Tahun</label>
                        <input class="form-control" id="Tahun" name="Tahun" value="<?= $data['peta']['Tahun']; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="Kecamatan" class="form-label">Kecamatan</label>
                        <input class="form-control" id="Kecamatan" name="Kecamatan" value="<?= $data['peta']['Kecamatan']; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="Desa" class="form-label">Desa</label>
                        <input class="form-control" id="Desa" name="Desa" value="<?= $data['peta']['Desa']; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="Kondisi_Fisik_Peta" class="form-label">Kondisi Fisik Peta</label>
                        <select class="form-control" aria-label="Default select example" name="Kondisi_Fisik_Peta">
                            <option selected value="<?= $data['peta']['Kondisi_Fisik_Peta']; ?>"><?= $data['peta']['Kondisi_Fisik_Peta']; ?></option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Tidak Ditemukan">Tidak Ditemukan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="filegambar" class="form-label">Pilih File Peta</label>
                        <label for="filegambar" class="form-label"><?= $data['peta']['file_gambar'] ?></label>
                        <input class="form-control" type="file" id="filegambar" name="file_gambar" value="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Upload file .dwg -->
<div class="modal fade" id="formUploadFiledwg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judulForm">Formulir Upload File .dwg</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Peta/tambahFiledwg" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $data['peta']['id_peta']; ?>" id="id_peta" name="id_peta">
                    <input class="form-control" type="file" id="filedwg" name="file_dwg" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Upload file .geojson -->
<div class="modal fade" id="formUploadFilegeojson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judulForm">Formulir Upload File .geojson</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/Peta/tambahFilegeojson" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $data['peta']['id_peta']; ?>" id="id_peta" name="id_peta">
                    <input class="form-control" type="file" id="filegeojson" name="file_geojson" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>