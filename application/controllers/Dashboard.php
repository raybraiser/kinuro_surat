<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $data['nama_lengkap'] = $this->session->admin_nama_lengkap;
		$data['title'] = "Dashboard - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'dashboard', $data);
    }
}