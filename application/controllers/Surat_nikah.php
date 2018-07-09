<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_nikah extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_surat_nikah');
	}

    public function index()
    {
		$data['title'] = "Surat Nikah - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_nikah/surat_nikah', $data);
    }

    public function tambah()
    {
		$data['title'] = "Tambah Surat Nikah - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_nikah/surat_nikah_tambah', $data);
    }

    public function simpan()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $upload_url = $this->config->item("upload_url");
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_nikah_'.$waktu_gambar;
            $config['upload_path']          = $upload_url;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'sk_menikah_nomor'            => $this->input->post('surat_nikah_nomor'),
                    'sk_menikah_tanggal_surat'    => $this->input->post('surat_nikah_tanggal_surat'),
                    'sk_menikah_tanggal_menikah'  => $this->input->post('surat_nikah_tanggal_menikah'),
                    'sk_menikah_nama_pria'        => $this->input->post('surat_nikah_mempelai_pria'),
                    'sk_menikah_nama_wanita'      => $this->input->post('surat_nikah_mempelai_wanita'),
                    'sk_menikah_yang_meneguhkan'  => $this->input->post('surat_nikah_pendeta'),
                    'sk_menikah_link'             => $link
                );
                $this->Model_surat_nikah->simpan($data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_menikah_nomor'            => $this->input->post('surat_nikah_nomor'),
                        'sk_menikah_tanggal_surat'    => $this->input->post('surat_nikah_tanggal_surat'),
                        'sk_menikah_tanggal_menikah'  => $this->input->post('surat_nikah_tanggal_menikah'),
                        'sk_menikah_nama_pria'        => $this->input->post('surat_nikah_mempelai_pria'),
                        'sk_menikah_nama_wanita'      => $this->input->post('surat_nikah_mempelai_wanita'),
                        'sk_menikah_yang_meneguhkan'  => $this->input->post('surat_nikah_pendeta'),
                        'sk_menikah_link'             => base_url() . 'img/' . $baris['file_name']
                    );
                    $this->Model_surat_nikah->simpan($data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_masuk"));           
        }
    }
    public function ambil_surat_nikah()
    {
        $data = $this->Model_surat_nikah->surat_nikah_json();
    }

    public function detail()
    {
        $id = $this->input->post('rowid1');
        $data = $this->Model_surat_nikah->detail($id);
        
        foreach ($data->result() as $baris_data_surat_nikah_detail) {

            if ($baris_data_surat_nikah_detail->sk_menikah_link == '') {
                $link_gambar = "<td>-</td>";   
            } else {
                $link_gambar = "<td>
                <a href=".$baris_data_surat_nikah_detail->sk_menikah_link."><img src=".$baris_data_surat_nikah_detail->sk_menikah_link." class='img img-responsive'>
                </td>";                             
            }

            echo "
                <table class='table'>
                    <tr>
                        <td style='width: 40%'>Nomor Surat Nikah</td>
                        <td>:</td>
                        <td>".$baris_data_surat_nikah_detail->sk_menikah_nomor."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_nikah_detail->sk_menikah_tanggal_surat."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Menikah</td>
                        <td>:</td>
                        <td>".$baris_data_surat_nikah_detail->sk_menikah_tanggal_menikah."</td>
                    </tr>
                    <tr>
                        <td>Nama Mempelai Pria</td>
                        <td>:</td>
                        <td>".$baris_data_surat_nikah_detail->sk_menikah_nama_pria."</td>
                    </tr>
                    <tr>
                        <td>Nama Mempelai Wanita</td>
                        <td>:</td>
                        <td>".$baris_data_surat_nikah_detail->sk_menikah_nama_wanita."</td>
                    </tr>
                    <tr>
                        <td>Pendeta Yang Meneguhkan</td>
                        <td>:</td>
                        <td>".$baris_data_surat_nikah_detail->sk_menikah_yang_meneguhkan."</td>
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


    public function edit()
    {
        $id = $this->uri->segment(3);
        $hasil_surat_nikah = $this->Model_surat_nikah->edit($id)->num_rows();
        if ($hasil_surat_nikah > 0) {
            $data['data_sn'] = $this->Model_surat_nikah->edit($id);
            $data['title'] = "Edit Surat Nikah - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
            $this->template->load('backend_template', 'surat_nikah/surat_nikah_edit', $data);
        } else {
            redirect(base_url("index.php/surat_nikah"));           
        }

    }

    public function update()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $upload_url = $this->config->item("upload_url");
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_nikah_'.$waktu_gambar;
            $config['upload_path']          = $upload_url;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $data = array   (
                    'sk_menikah_nomor' => $this->input->post('surat_nikah_nomor'),
                    'sk_menikah_tanggal_surat' => $this->input->post('surat_nikah_tanggal_surat'),
                    'sk_menikah_tanggal_menikah' => $this->input->post('surat_nikah_tanggal_menikah'),
                    'sk_menikah_nama_pria' => $this->input->post('surat_nikah_mempelai_pria'),
                    'sk_menikah_nama_wanita' => $this->input->post('surat_nikah_mempelai_wanita'),
                    'sk_menikah_yang_meneguhkan' => $this->input->post('surat_nikah_pendeta'),
                );
                $id = $this->input->post('sk_menikah_id');
                $this->Model_surat_nikah->update($id, $data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_menikah_nomor' => $this->input->post('surat_nikah_nomor'),
                        'sk_menikah_tanggal_surat' => $this->input->post('surat_nikah_tanggal_surat'),
                        'sk_menikah_tanggal_menikah' => $this->input->post('surat_nikah_tanggal_menikah'),
                        'sk_menikah_nama_pria' => $this->input->post('surat_nikah_mempelai_pria'),
                        'sk_menikah_nama_wanita' => $this->input->post('surat_nikah_mempelai_wanita'),
                        'sk_menikah_yang_meneguhkan' => $this->input->post('surat_nikah_pendeta'),
                        'sk_menikah_link'             => base_url() . 'img/' . $baris['file_name']
                    );
                    $id = $this->input->post('sk_menikah_id');
                    $this->Model_surat_nikah->update($id, $data);
                    
                }            
            }
        } else {
			redirect(base_url("index.php/surat_masuk"));           
        }
    }


    public function hapus_link()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_nikah->hapus_link($id);
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_nikah->hapus($id);
    }



}