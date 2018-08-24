<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_login');
	}

	public function index()
	{
		$data['title'] = "Halaman Login - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";
		$this->load->view('login', $data);
	}

	public function check_login()
	{
		$data = array('admin_username' => $this->input->post('username'), 'admin_password' => $this->input->post('password'));
		$where = array( 'admin_username' => $data['admin_username'], 'admin_password' => md5($data['admin_password']));

		$cek = $this->Model_login->cek_login("tbl_admin", $where) -> num_rows();

		if($cek > 0) {
			//ambil data user dari database
			$user_n = $data['admin_username'];
			$query_ambil_user = $this->db->query("SELECT * FROM tbl_admin WHERE admin_username = '$user_n'");
			foreach ($query_ambil_user->result_array() as $baris_data)
			{
			     $data_user = $baris_data;
			}

			$data_session = array(
				'admin_id' => $data_user['admin_id'],				
				'admin_nama_lengkap' => $data_user['admin_nama_lengkap'],
				'admin_username' => $data_user['admin_username'],
				'admin_status' => $data_user['admin_status'],
				'status' => "login"
			);
			
			$this->session->set_userdata($data_session);
			redirect(base_url("index.php/dashboard"));

		} else {
			//$lg = array('login'  => 'gagal');
			//$this->session->set_userdata($lg);
			redirect(base_url("index.php/login"));			
			//redirect(base_url("index.php/login"));
		}
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url("index.php/login"));		
	}
}
