<?php

class Dashboard extends Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->view('Dashboard/index', $data);
    }
}
