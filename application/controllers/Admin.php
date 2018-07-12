<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_admin');
	}

    public function index()
    {
		$data['title'] = "Admin - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'admin/admin', $data);
    }

    public function tambah()
    {
		$data['title'] = "Tambah Admin- Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'admin/admin_tambah', $data);
    }

    public function ambil_admin()
    {
        $data = $this->Model_admin->data_admin_json();
    }    

    public function simpan()
    {
		$simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $data = array (
                            'admin_nama_lengkap' => $this->input->post('admin_nama_lengkap'), 
                            'admin_username' => $this->input->post('admin_username'), 
                            'admin_password' => md5($this->input->post('admin_password')), 
                            'admin_status' => $this->input->post('admin_status') 
                        );
            $username_check = $this->input->post('admin_username');
            $this->Model_admin->simpan($username_check, $data);
        } else {
			redirect(base_url("index.php/admin"));           
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $hasil_admin = $this->Model_admin->edit($id)->num_rows();
        if ($hasil_admin > 0) {
            $data['data_admin'] = $this->Model_admin->edit($id);
            $data['title'] = "Edit Data Admin - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
            $this->template->load('backend_template', 'admin/admin_edit', $data);
        } else {
            redirect(base_url("index.php/admin"));           
        }

    }

    public function update()
    {
		$simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $password_value = $this->input->post('admin_password');
            if ($password_value) {
                $data = array (
                    'admin_nama_lengkap' => $this->input->post('admin_nama_lengkap'), 
                    'admin_password' => md5($this->input->post('admin_password')), 
                    'admin_status' => $this->input->post('admin_status') 
                );
                $id = $this->input->post('admin_id');
                $this->Model_admin->update($id, $data);
            } else {
                $data = array (
                    'admin_nama_lengkap' => $this->input->post('admin_nama_lengkap'), 
                    'admin_status' => $this->input->post('admin_status') 
                );
                $id = $this->input->post('admin_id');
                $this->Model_admin->update($id, $data);             
            }
        } else {
			redirect(base_url("index.php/admin"));           
        }
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $sess_id = $this->session->admin_id;
        if ($sess_id == $id) {
            redirect(base_url("index.php/admin"));            
        } else {
            $this->Model_admin->hapus($id);
        }

    }




}