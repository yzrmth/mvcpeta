<?php

class Peta extends Controller
{

    public function index()
    {
        $data['title'] = 'Daftar Peta';
        $data['peta'] = $this->model('Peta_model')->getAllPeta();

        $this->view('Peta/index', $data);
    }

    public function detil($id_peta)
    {
        $data['title'] = 'Detil Peta';
        $data['peta'] = $this->model('Peta_model')->getPetaById($id_peta);

        $this->view('Peta/Detil', $data);
    }

    public function tambahPeta()
    {
        if ($this->model('Peta_model')->tambahDataPeta($_POST, $_FILES) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/Peta');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/Peta');
            exit;
        }
    }

    public function hapusPeta($id_peta)
    {
        if ($this->model('Peta_model')->hapusDataPeta($id_peta) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location:' . BASEURL . '/Peta');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location:' . BASEURL . '/Peta');
            exit;
        }
    }

    public function updatePeta()
    {
        if ($this->model('Peta_model')->updateDataPeta($_POST, $_FILES) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location:' . BASEURL . '/Peta');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location:' . BASEURL . '/Peta');
            exit;
        }
    }

    public function tambahFiledwg()
    {
        if ($this->model('Peta_model')->tambahDatadwg($_POST, $_FILES) > 0) {
            Flasher::setFlash('dwg berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/Peta');
            exit;
        } else {
            Flasher::setFlash(' dwg gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/Peta');
            exit;
        }
    }

    public function tambahFilegeojson()
    {
        if ($this->model('Peta_model')->tambahDatageojson($_POST, $_FILES) > 0) {
            Flasher::setFlash('geojson berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/Peta');
            exit;
        } else {
            Flasher::setFlash(' geojson gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/Peta');
            exit;
        }
    }

    public function downloadPeta($id_peta)
    {

        $data['peta'] = $this->model('Peta_model')->downloadDataPeta($id_peta);

        // DOWNLOAD GAMBAR

        $filename   = $data['peta']['file_gambar'];

        $dir    = ROOT . '/storage/file gambar/';
        $attachment = $dir . $filename;

        if (file_exists($attachment) && $filename) {
            header('Content-Description: File Transfer');
            // header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($attachment));
            // header('Content-Transfer-Encoding: binary');
            // header('Expires: 0');
            // header('Cache-Control: private');
            // header('Pragma: private');
            // header('Content-Length: ' . filesize($attachment));

            ob_clean();
            flush();
            readfile($attachment);

            exit;
        } else {
            echo 'File Not Found!';
        }
    }
}
