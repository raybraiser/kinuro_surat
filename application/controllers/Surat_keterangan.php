<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keterangan extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_surat_keterangan');
	}

    public function index()
    {
		$data['title'] = "Surat Keterangan - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_keterangan/surat_keterangan', $data);
    }

    public function tambah()
    {
		$data['title'] = "Tambah Surat Keterangan - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_keterangan/surat_keterangan_tambah', $data);
    }

    public function simpan()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_keterangan_'.$waktu_gambar;
            $config['upload_path']          = '/var/www/html/project/kinuro_surat/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'sk_keterangan_jenis_surat'     => $this->input->post('jenis_surat_keterangan'), 
                    'sk_keterangan_nomor_surat'     => $this->input->post('surat_keterangan_nomor'), 
                    'sk_keterangan_tanggal_surat'   => $this->input->post('surat_keterangan_tanggal'), 
                    'sk_keterangan_perihal'         => $this->input->post('surat_keterangan_perihal'), 
                    'sk_keterangan_nama_lengkap'    => $this->input->post('surat_keterangan_nama'), 
                    'sk_keterangan_tanggal_lahir'   => $this->input->post('surat_keterangan_tanggal_lahir'), 
                    'sk_keterangan_jenis_kelamin'   => $this->input->post('jenis_kelamin_surat_keterangan'), 
                    'sk_keterangan_domisili_kolom'  => $this->input->post('kolom_surat_keterangan'), 
                    'sk_keterangan_deskripsi'       => $this->input->post('surat_keterangan_deskripsi'), 
                    'sk_keterangan_link'            => $link
                );
                $this->Model_surat_keterangan->simpan($data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_keterangan_jenis_surat'     => $this->input->post('jenis_surat_keterangan'), 
                        'sk_keterangan_nomor_surat'     => $this->input->post('surat_keterangan_nomor'), 
                        'sk_keterangan_tanggal_surat'   => $this->input->post('surat_keterangan_tanggal'), 
                        'sk_keterangan_perihal'         => $this->input->post('surat_keterangan_perihal'), 
                        'sk_keterangan_nama_lengkap'    => $this->input->post('surat_keterangan_nama'), 
                        'sk_keterangan_tanggal_lahir'   => $this->input->post('surat_keterangan_tanggal_lahir'), 
                        'sk_keterangan_jenis_kelamin'   => $this->input->post('jenis_kelamin_surat_keterangan'), 
                        'sk_keterangan_domisili_kolom'  => $this->input->post('kolom_surat_keterangan'), 
                        'sk_keterangan_deskripsi'       => $this->input->post('surat_keterangan_deskripsi'),  
                        'sk_keterangan_link'            => base_url() . 'img/' . $baris['file_name']
                    );
                    $this->Model_surat_keterangan->simpan($data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_keterangan"));           
        }
    }

    public function ambil_surat_keterangan()
    {
        $data = $this->Model_surat_keterangan->surat_keterangan_json();
        
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['data_keterangan'] = $this->Model_surat_keterangan->edit($id);
		$data['title'] = "Edit Surat Keterangan - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_keterangan/surat_keterangan_edit', $data);
    }

    public function hapus_link()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_keterangan->hapus_link($id);
    }

    public function update()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_keterangan_'.$waktu_gambar;
            $config['upload_path']          = '/var/www/html/project/kinuro_surat/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $data = array   (
                    'sk_keterangan_jenis_surat'     => $this->input->post('jenis_surat_keterangan'), 
                    'sk_keterangan_nomor_surat'     => $this->input->post('surat_keterangan_nomor'), 
                    'sk_keterangan_tanggal_surat'   => $this->input->post('surat_keterangan_tanggal'), 
                    'sk_keterangan_perihal'         => $this->input->post('surat_keterangan_perihal'), 
                    'sk_keterangan_nama_lengkap'    => $this->input->post('surat_keterangan_nama'), 
                    'sk_keterangan_tanggal_lahir'   => $this->input->post('surat_keterangan_tanggal_lahir'), 
                    'sk_keterangan_jenis_kelamin'   => $this->input->post('jenis_kelamin_surat_keterangan'), 
                    'sk_keterangan_domisili_kolom'  => $this->input->post('kolom_surat_keterangan'), 
                    'sk_keterangan_deskripsi'       => $this->input->post('surat_keterangan_deskripsi'), 
                );
                $id = $this->input->post('surat_keterangan_id');
                $this->Model_surat_keterangan->update($id, $data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_keterangan_jenis_surat'     => $this->input->post('jenis_surat_keterangan'), 
                        'sk_keterangan_nomor_surat'     => $this->input->post('surat_keterangan_nomor'), 
                        'sk_keterangan_tanggal_surat'   => $this->input->post('surat_keterangan_tanggal'), 
                        'sk_keterangan_perihal'         => $this->input->post('surat_keterangan_perihal'), 
                        'sk_keterangan_nama_lengkap'    => $this->input->post('surat_keterangan_nama'), 
                        'sk_keterangan_tanggal_lahir'   => $this->input->post('surat_keterangan_tanggal_lahir'), 
                        'sk_keterangan_jenis_kelamin'   => $this->input->post('jenis_kelamin_surat_keterangan'), 
                        'sk_keterangan_domisili_kolom'  => $this->input->post('kolom_surat_keterangan'), 
                        'sk_keterangan_deskripsi'       => $this->input->post('surat_keterangan_deskripsi'),  
                        'sk_keterangan_link'            => base_url() . 'img/' . $baris['file_name']
                    );
                    $id = $this->input->post('surat_keterangan_id');
                    $this->Model_surat_keterangan->update($id, $data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_keterangan"));           
        }
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_keterangan->hapus($id);
    }

    public function detail()
    {
        $id = $this->input->post('rowid1');
        $data = $this->Model_surat_keterangan->detail($id);
        
        foreach ($data->result() as $baris_data_surat_keterangan_detail) {

            if ($baris_data_surat_keterangan_detail->sk_keterangan_link == '') {
                $link_gambar = "<td>-</td>";   
            } else {
                $link_gambar = "<td>
                <a href=".$baris_data_surat_keterangan_detail->sk_keterangan_link."><img src=".$baris_data_surat_keterangan_detail->sk_keterangan_link." class='img img-responsive'>
                </td>";                             
            }

            echo "
                <table class='table'>
                    <tr>
                        <td style='width: 40%'>Jenis Surat</td>
                        <td>:</td>
                        <td>Surat ".$baris_data_surat_keterangan_detail->sk_keterangan_jenis_surat."</td>
                    </tr>

                    <tr>
                        <td>Nomor Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keterangan_detail->sk_keterangan_nomor_surat."</td>
                    </tr>

                    <tr>
                        <td>Tanggal Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keterangan_detail->sk_keterangan_tanggal_surat."</td>
                    </tr>

                    <tr>
                        <td>Perihal Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keterangan_detail->sk_keterangan_perihal."</td>
                    </tr>                    

                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>Surat ".$baris_data_surat_keterangan_detail->sk_keterangan_nama_lengkap."</td>
                    </tr> 

                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keterangan_detail->sk_keterangan_tanggal_lahir."</td>
                    </tr> 

                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keterangan_detail->sk_keterangan_jenis_kelamin."</td>
                    </tr> 

                    <tr>
                        <td>Domisi Kolom</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keterangan_detail->sk_keterangan_domisili_kolom."</td>
                    </tr> 

                    <tr>
                        <td>Deskripsi Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keterangan_detail->sk_keterangan_deskripsi."</td>
                    </tr> 

                    <tr>
                        <td>Gambar Surat</td>
                        <td>:</td>
                        ".$link_gambar."
                    </tr>

                </table>
            ";
        }

    }


}