<div class="content-header">
    <div class="container-fluid border-bottom">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $data['title']; ?></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <?php Flasher::Flash(); ?>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <!-- Trigger Modal INput Peta Baru-->
            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#formInputPeta" data-bs-whatever="@mdo">
                <i class="fas fa-plus"> Tambah Peta Baru</i>
            </button>
        </div>




        <!-- TABEL  -->
        <section class="content">
            <table class="table table-bordered table-hover" style="vertical-align: middle; text-align: center">
                <thead class="table-dark text-center align-center">
                    <tr>
                        <th rowspan="2" class="" style="width: 5px; vertical-align:middle;">No</th>
                        <th rowspan="2" style="vertical-align:middle;">Nama Peta Atau Kegiatan</th>
                        <th rowspan="2" style="vertical-align:middle;" class="text-center">Nomor dan Tahun</th>
                        <th colspan="3" style="vertical-align:middle;">Status</th>
                        <!-- <th rowspan="2" style="vertical-align:middle;">Aksi</th> -->
                    </tr>
                    <tr>
                        <th>File Gambar</th>
                        <th>Digitasi</th>
                        <th>Plotting</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['peta'] as $peta) : ?>
                        <tr role="button" data-href="<?= BASEURL ?>/Peta/Detil/<?= $peta['id_peta'] ?>">
                            <th class="text-center" scope="row"><?= $no; ?></th>
                            <td class="text-center"><?= $peta['Nama_Proyek_Kegiatan']; ?></td>
                            <td class="text-center"><?= $peta['Nomor'] . ' / ' . $peta['Tahun']; ?></td>
                            <td class="text-center"><?php if ($peta['file_gambar'] !== '') {
                                                        echo ('<i class=" fas fa-check"></i>');
                                                    } else {
                                                        echo ('<i class="fas fa-times"></i>');
                                                    } ?>
                            </td>
                            <td class="text-center"><?php if ($peta['File_dwg'] !== '') {
                                                        echo ('<i class=" fas fa-check"></i>');
                                                    } else {
                                                        echo ('<i class="fas fa-times"></i>');
                                                    } ?>
                            </td>
                            <td class="text-center"><?php if ($peta['File_geojson'] !== '') {
                                                        echo ('<i class=" fas fa-check"></i>');
                                                    } else {
                                                        echo ('<i class="fas fa-times"></i>');
                                                    } ?>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>


    <!-- Modal Tambah Peta Baru -->
    <div class="modal fade" id="formInputPeta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judulForm">Formulir Tambah Peta</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/Peta/tambahPeta" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="NamaPeta" class="form-label">Nama Proyek/Kegiatan</label>
                            <input type="text" class="form-control" id="NamaPeta" name="Nama_Proyek_Kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="Nomor_Peta" class="form-label">Nomor</label>
                            <input class="form-control" id="Nomor_Peta" name="Nomor"></input>
                        </div>
                        <div class="mb-3">
                            <label for="Tahun" class="form-label">Tahun</label>
                            <input class="form-control" id="Tahun" name="Tahun"></input>
                        </div>
                        <div class="mb-3">
                            <label for="Kecamatan" class="form-label">Kecamatan</label>
                            <input class="form-control" id="Kecamatan" name="Kecamatan"></input>
                        </div>
                        <div class="mb-3">
                            <label for="Desa" class="form-label">Desa</label>
                            <input class="form-control" id="Desa" name="Desa"></input>
                        </div>
                        <div class="mb-3">
                            <label for="Kondisi_Fisik_Peta" class="form-label">Kondisi Fisik Peta</label>
                            <select class="form-control" aria-label="Default select example" name="Kondisi_Fisik_Peta">
                                <option selected value="Baik"></option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                                <option value="Tidak Ditemukan">Tidak Ditemukan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="filegambar" class="form-label">Pilih File Peta</label>
                            <input class="form-control" type="file" id="filegambar" name="file_gambar">
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
</div>





<!-- script clikable -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tr[data-href]");
        rows.forEach(row => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });
    });
</script>