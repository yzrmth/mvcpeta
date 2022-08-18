<?php

class Beranda extends Controller
{

    public function index()
    {
        $data['title'] = 'Beranda';

        $this->view('Beranda/index', $data);
    }
}
