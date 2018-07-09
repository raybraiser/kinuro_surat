<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keputusan extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_surat_keputusan');
	}

    public function index()
    {
		$data['title'] = "Surat Keputusan - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_keputusan/surat_keputusan', $data);
    }

    public function tambah()
    {
		$data['title'] = "Tambah Surat Keputusan - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_keputusan/surat_keputusan_tambah', $data);
    }

    public function simpan()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $upload_url = $this->config->item("upload_url");
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_keputusan_'.$waktu_gambar;
            $config['upload_path']          = $upload_url;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'keputusan_nomor_surat'   => $this->input->post('surat_keputusan_nomor'), 
                    'keputusan_tanggal_surat' => $this->input->post('surat_keputusan_tanggal'), 
                    'keputusan_untuk'         => $this->input->post('surat_keputusan_untuk'), 
                    'keputusan_perihal'       => $this->input->post('surat_keputusan_perihal'), 
                    'keputusan_deskripsi'     => $this->input->post('surat_keputusan_deskripsi'), 
                    'keputusan_link'          => $link
                );
                $this->Model_surat_keputusan->simpan($data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'keputusan_nomor_surat'   => $this->input->post('surat_keputusan_nomor'), 
                        'keputusan_tanggal_surat' => $this->input->post('surat_keputusan_tanggal'), 
                        'keputusan_untuk'         => $this->input->post('surat_keputusan_untuk'), 
                        'keputusan_perihal'       => $this->input->post('surat_keputusan_perihal'), 
                        'keputusan_deskripsi'     => $this->input->post('surat_keputusan_deskripsi'), 
                        'keputusan_link'          => base_url() . 'img/' . $baris['file_name']
                    );
                    $this->Model_surat_keputusan->simpan($data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_keputusan"));           
        }
    }

    public function ambil_surat_keputusan()
    {
        $data = $this->Model_surat_keputusan->surat_keputusan_json();
        
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['data_keputusan'] = $this->Model_surat_keputusan->edit($id);
		$data['title'] = "Edit Surat Keputusan - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_keputusan/surat_keputusan_edit', $data);
    }

    public function hapus_link()
    {
        $id = $this->uri->segment(3);
        $data['data_sm'] = $this->Model_surat_keputusan->hapus_link($id);
    }

    public function update()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $upload_url = $this->config->item("upload_url");
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_keputusan_'.$waktu_gambar;
            $config['upload_path']          = $upload_url;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'keputusan_nomor_surat'   => $this->input->post('surat_keputusan_nomor'), 
                    'keputusan_tanggal_surat' => $this->input->post('surat_keputusan_tanggal'), 
                    'keputusan_untuk'         => $this->input->post('surat_keputusan_untuk'), 
                    'keputusan_perihal'       => $this->input->post('surat_keputusan_perihal'), 
                    'keputusan_deskripsi'     => $this->input->post('surat_keputusan_deskripsi'), 
                );
                $id = $this->input->post('surat_keputusan_id');
                $this->Model_surat_keputusan->update($id, $data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'keputusan_nomor_surat'   => $this->input->post('surat_keputusan_nomor'), 
                        'keputusan_tanggal_surat' => $this->input->post('surat_keputusan_tanggal'), 
                        'keputusan_untuk'         => $this->input->post('surat_keputusan_untuk'), 
                        'keputusan_perihal'       => $this->input->post('surat_keputusan_perihal'), 
                        'keputusan_deskripsi'     => $this->input->post('surat_keputusan_deskripsi'), 
                        'keputusan_link'          => base_url() . 'img/' . $baris['file_name']
                    );
                    $id = $this->input->post('surat_keputusan_id');
                    $this->Model_surat_keputusan->update($id, $data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_keputusan"));           
        }
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $data['data_sm'] = $this->Model_surat_keputusan->hapus($id);
    }

    public function detail()
    {
        //$id = $this->input->post('rowid1');
        $id = $this->input->post('rowid1');
        $data = $this->Model_surat_keputusan->detail($id);
        
        foreach ($data->result() as $baris_data_surat_keputusan_detail) {

            if ($baris_data_surat_keputusan_detail->keputusan_link == '') {
                $link_gambar = "<td>-</td>";   
            } else {
                $link_gambar = "<td>
                <a href=".$baris_data_surat_keputusan_detail->keputusan_link."><img src=".$baris_data_surat_keputusan_detail->keputusan_link." class='img img-responsive'>
                </td>";                             
            }

            echo "
                <table class='table'>
                    <tr>
                        <td style='width: 40%'>Nomor Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keputusan_detail->keputusan_nomor_surat."</td>
                    </tr>

                    <tr>
                        <td>Nomor Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keputusan_detail->keputusan_nomor_surat."</td>
                    </tr>

                    <tr>
                        <td>Tanggal Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keputusan_detail->keputusan_tanggal_surat."</td>
                    </tr>

                    <tr>
                        <td>Surat Keputusan Untuk</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keputusan_detail->keputusan_untuk."</td>
                    </tr>

                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keputusan_detail->keputusan_perihal."</td>
                    </tr>

                    <tr>
                        <td>Surat Keputusan Untuk</td>
                        <td>:</td>
                        <td>".$baris_data_surat_keputusan_detail->keputusan_deskripsi."</td>
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