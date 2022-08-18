<?php

class Peta_model
{
    private $table = 'tb_peta';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllPeta()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPetaById($id_peta)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_peta=:id');
        $this->db->bind('id', $id_peta);
        return $this->db->single();
    }

    public function tambahDataPeta($data, $file)
    {
        // variabel yang diperlukan untuk fungsi dibawah
        // MENGAMBIL EKSTENSI GAMBAR
        $nama_file_gambar = $file['file_gambar']['name'];
        $ekstensi = explode('.', $nama_file_gambar);
        $ekstensi = strtolower(end($ekstensi));

        $tipe_file = $file['file_gambar']['type'];
        $tmp_file = $file['file_gambar']['tmp_name'];
        $nama_file = $data['Nomor'] . "_" . $data['Tahun'] . "_" . $data['Nama_Proyek_Kegiatan'] . "_" . $data['Kecamatan'] . "_" . $data['Desa'] . "." . $ekstensi;



        // SET PENYIMPANAN FOLDER UNTUK GAMBAR
        // $path = "/storage/file gambar/" . $data['Nomor'] . "_" . $data['Tahun'] . "_" . $data['Nama_Proyek_Kegiatan'] . "_" . $data['Kecamatan'] . "_" . $data['Desa'];
        $path = "./storage/file gambar/" . $nama_file;

        // PROSES UPLOAD
        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {


            if (move_uploaded_file($tmp_file, ROOT . $path)) {


                $query = "INSERT INTO " . $this->table . " (Nama_Proyek_Kegiatan, Nomor, Tahun, Kecamatan, Desa, Kondisi_fisik_Peta, file_gambar)" . " VALUES (:Nama_Proyek_Kegiatan, :Nomor, :Tahun, :Kecamatan, :Desa, :Kondisi_Fisik_Peta, :file_gambar)";

                $this->db->query($query);
                $this->db->bind('Nama_Proyek_Kegiatan', $data['Nama_Proyek_Kegiatan']);
                $this->db->bind('Nomor', $data['Nomor']);
                $this->db->bind('Tahun', $data['Tahun']);
                $this->db->bind('Kecamatan', $data['Kecamatan']);
                $this->db->bind('Desa', $data['Desa']);
                $this->db->bind('Kondisi_Fisik_Peta', $data['Kondisi_Fisik_Peta']);
                $this->db->bind('file_gambar', $nama_file);


                $this->db->execute();

                return $this->db->rowCount();
            } else {
                echo "file gagal di upload";
            }
        } else {
            echo "tipe gambar harus jpeg atau png";
        }
    }

    public function hapusDataPeta($id_peta)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_peta=:id";
        $this->db->query($query);
        $this->db->bind('id', $id_peta);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPeta($data, $file)
    {
        // TANGKAP DATA YANG DIKIRIKAN DARI CONTROLLER PETA
        // MENGAMBIL EKSTENSI FILE
        $nama_file_gambar = $file['file_gambar']['name'];
        $ekstensi = explode('.', $nama_file_gambar);
        $ekstensi = strtolower(end($ekstensi));

        // VARIABLE YANG DIBUTUHKAN
        $tmp_file = $file['file_gambar']['tmp_name'];
        $tipeFile = $file['gambar']['type'];


        // CEK APAKAH ADA FILE GAMBAR YANG DIUPLOAD
        if ($tipeFile == 'image/jpeg' || $tipeFile == 'image/png') {

            // jika tidak ada file gambar yang diupload
            if ($file['file_gambar']['error'] === 4) {

                $query = "UPDATE " . $this->table . " SET
                    Nama_Proyek_Kegiatan = :Nama_Proyek_Kegiatan,
                    Nomor = :Nomor, 
                    Tahun = :Tahun, 
                    Kecamatan = :Kecamatan, 
                    Desa = :Desa, 
                    Kondisi_Fisik_Peta = :Kondisi_Fisik_Peta" . " WHERE id_peta = :id";

                $this->db->query($query);
                $this->db->bind('Nama_Proyek_Kegiatan', $data['Nama_Proyek_Kegiatan']);
                $this->db->bind('Nomor', $data['Nomor']);
                $this->db->bind('Tahun', $data['Tahun']);
                $this->db->bind('Kecamatan', $data['Kecamatan']);
                $this->db->bind('Desa', $data['Desa']);
                $this->db->bind('Kondisi_Fisik_Peta', $data['Kondisi_Fisik_Peta']);
                $this->db->bind('id', $data['id_peta']);

                $this->db->execute();

                return $this->db->rowCount();
            }
            // jika ada file yang diupload
            else {
                // nama file baru
                $NamaFileGambarBaru = $data['Nomor'] . "_" . $data['Tahun'] . "_" . $data['Nama_Proyek_Kegiatan'] . "_" . $data['Kecamatan'] . "_" . $data['Desa'] . "." . $ekstensi;

                // pindahkan file gambar dari folder temp ke folder storage/file gambar

                // path penyimpanan
                $path = "./storage/file gambar/" . $NamaFileGambarBaru;

                if (move_uploaded_file($tmp_file, ROOT . $path)) {
                    $query = "UPDATE " . $this->table . " SET
                    Nama_Proyek_Kegiatan = :Nama_Proyek_Kegiatan,
                    Nomor = :Nomor, 
                    Tahun = :Tahun, 
                    Kecamatan = :Kecamatan, 
                    Desa = :Desa, 
                    Kondisi_Fisik_Peta = :Kondisi_Fisik_Peta,
                    file_gambar = :NamaFileGambarBaru" . " WHERE id_peta = :id";

                    $this->db->query($query);
                    $this->db->bind('Nama_Proyek_Kegiatan', $data['Nama_Proyek_Kegiatan']);
                    $this->db->bind('Nomor', $data['Nomor']);
                    $this->db->bind('Tahun', $data['Tahun']);
                    $this->db->bind('Kecamatan', $data['Kecamatan']);
                    $this->db->bind('Desa', $data['Desa']);
                    $this->db->bind('Kondisi_Fisik_Peta', $data['Kondisi_Fisik_Peta']);
                    $this->db->bind('NamaFileGambarBaru', $NamaFileGambarBaru);
                    $this->db->bind('id', $data['id_peta']);

                    $this->db->execute();

                    return $this->db->rowCount();
                }
            }
        }
    }

    public function tambahDatadwg($data, $file)
    {
        $namaFile = $file['file_dwg']['name'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));
        $tmp_file = $file['file_dwg']['tmp_name'];

        // cek tipe file apakah dwg atau tidak
        if ($ekstensi == 'dwg') {
            $NamaFiledwg = $namaFile;

            $path = "./storage/file dwg/" . $NamaFiledwg;

            if (move_uploaded_file($tmp_file, ROOT . $path)) {

                $query = "UPDATE " . $this->table . " SET File_dwg = :file_dwg WHERE id_peta= :id";

                $this->db->query($query);
                $this->db->bind('file_dwg', $NamaFiledwg);
                $this->db->bind('id', $data['id_peta']);

                $this->db->execute();

                return $this->db->rowCount();
            }
        }
    }

    public function tambahDatageojson($data, $file)
    {
        $namaFile = $file['file_geojson']['name'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));
        $tmp_file = $file['file_geojson']['tmp_name'];

        // cek tipe file apakah dwg atau tidak
        if ($ekstensi == 'geojson') {
            $NamaFilegeojson = $namaFile;

            $path = "./storage/file geojson/" . $NamaFilegeojson;

            if (move_uploaded_file($tmp_file, ROOT . $path)) {

                $query = "UPDATE " . $this->table . " SET File_geojson = :file_geojson WHERE id_peta= :id";

                $this->db->query($query);
                $this->db->bind('file_geojson', $NamaFilegeojson);
                $this->db->bind('id', $data['id_peta']);

                $this->db->execute();

                return $this->db->rowCount();
            }
        }
    }

    public function downloadDataPeta($id_peta)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_peta=:id');
        $this->db->bind('id', $id_peta);
        return $this->db->single();
    }
}
