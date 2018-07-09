<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_surat_masuk');
	}

    public function index()
    {
		$data['title'] = "Surat Masuk - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_masuk/surat_masuk', $data);
    }

    public function tambah()
    {
		$data['title'] = "Tambah Surat Masuk - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_masuk/surat_masuk_tambah', $data);
    }

    public function simpan()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_masuk_'.$waktu_gambar;
            $config['upload_path']          = '/var/www/html/project/kinuro_surat/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'sm_dari' => $this->input->post('surat_masuk_dari'), 
                    'sm_untuk' => $this->input->post('surat_masuk_untuk'), 
                    'sm_nomor' => $this->input->post('surat_masuk_nomor'), 
                    'sm_tanggal_surat' => $this->input->post('surat_masuk_tanggal'), 
                    'sm_perihal' => $this->input->post('surat_masuk_perihal'), 
                    'sm_tanggal_masuk' => $this->input->post('surat_masuk_tanggal_masuk'), 
                    'sm_deskripsi' => $this->input->post('surat_masuk_deskripsi'), 
                    'sm_link' => $link, 
                );
                $this->Model_surat_masuk->simpan($data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sm_dari' => $this->input->post('surat_masuk_dari'), 
                        'sm_untuk' => $this->input->post('surat_masuk_untuk'), 
                        'sm_nomor' => $this->input->post('surat_masuk_nomor'), 
                        'sm_tanggal_surat' => $this->input->post('surat_masuk_tanggal'), 
                        'sm_perihal' => $this->input->post('surat_masuk_perihal'), 
                        'sm_tanggal_masuk' => $this->input->post('surat_masuk_tanggal_masuk'), 
                        'sm_deskripsi' => $this->input->post('surat_masuk_deskripsi'), 
                        'sm_link' => base_url() . 'img/' . $baris['file_name'], 
                    );
                    $this->Model_surat_masuk->simpan($data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_masuk"));           
        }
    }

    public function ambil_surat_masuk()
    {
        $data = $this->Model_surat_masuk->surat_masuk_json();
        
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['data_sm'] = $this->Model_surat_masuk->edit($id);
		$data['title'] = "Edit Surat Masuk - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_masuk/surat_masuk_edit', $data);
    }

    public function hapus_link()
    {
        $id = $this->uri->segment(3);
        $data['data_sm'] = $this->Model_surat_masuk->hapus_link($id);
    }

    public function update()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {

            $config['upload_path']          = '/var/www/html/project/kinuro_surat/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $data = array   (
                    'sm_dari' => $this->input->post('surat_masuk_dari'), 
                    'sm_untuk' => $this->input->post('surat_masuk_untuk'), 
                    'sm_nomor' => $this->input->post('surat_masuk_nomor'), 
                    'sm_tanggal_surat' => $this->input->post('surat_masuk_tanggal'), 
                    'sm_perihal' => $this->input->post('surat_masuk_perihal'), 
                    'sm_tanggal_masuk' => $this->input->post('surat_masuk_tanggal_masuk'), 
                    'sm_deskripsi' => $this->input->post('surat_masuk_deskripsi'),
                );
                $id = $this->input->post('id_sm');
                $this->Model_surat_masuk->update($id, $data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sm_dari' => $this->input->post('surat_masuk_dari'), 
                        'sm_untuk' => $this->input->post('surat_masuk_untuk'), 
                        'sm_nomor' => $this->input->post('surat_masuk_nomor'), 
                        'sm_tanggal_surat' => $this->input->post('surat_masuk_tanggal'), 
                        'sm_perihal' => $this->input->post('surat_masuk_perihal'), 
                        'sm_tanggal_masuk' => $this->input->post('surat_masuk_tanggal_masuk'), 
                        'sm_deskripsi' => $this->input->post('surat_masuk_deskripsi'), 
                        'sm_link' => base_url() . 'img/' . $baris['file_name'], 
                    );
                    $id = $this->input->post('id_sm');
                    $this->Model_surat_masuk->update($id, $data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_masuk"));           
        }
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $data['data_sm'] = $this->Model_surat_masuk->hapus($id);
    }

    public function detail()
    {
        //$id = $this->input->post('rowid1');
        $id = $this->input->post('rowid1');
        $data = $this->Model_surat_masuk->detail($id);
        
        foreach ($data->result() as $baris_data_sm_detail) {

            if ($baris_data_sm_detail->sm_link == '') {
                $link_gambar = "<td>-</td>";   
            } else {
                $link_gambar = "<td>
                <a href=".$baris_data_sm_detail->sm_link."><img src=".$baris_data_sm_detail->sm_link." class='img img-responsive'>
                </td>";                             
            }
        

            echo "
                <table class='table'>
                    <tr>
                        <td style='width: 40%'>Surat Dari</td>
                        <td>:</td>
                        <td>".$baris_data_sm_detail->sm_dari."</td>
                    </tr>
                    <tr>
                        <td style='width:30%;'>Surat Untuk</td>
                        <td>:</td>
                        <td>".$baris_data_sm_detail->sm_untuk."</td>
                    </tr>
                    <tr>
                        <td>Nomor Surat</td>
                        <td>:</td>
                        <td>".$baris_data_sm_detail->sm_nomor."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td>:</td>
                        <td>".$baris_data_sm_detail->sm_tanggal_surat."</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td>".$baris_data_sm_detail->sm_perihal."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td>:</td>
                        <td>".$baris_data_sm_detail->sm_tanggal_masuk."</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td>".$baris_data_sm_detail->sm_deskripsi."</td>
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