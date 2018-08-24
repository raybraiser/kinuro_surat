<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_sidi extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_surat_sidi');
		$this->load->model('Model_pendeta');
    }

    public function index()
    {
		$data['title'] = "Surat Sidi - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_sidi/surat_sidi', $data);
    }

    public function tambah()
    {
        $data['title'] = "Tambah Surat Baptis - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";
        $data['pendeta'] = $this->Model_pendeta->ambil_pendeta();    
        $this->template->load('backend_template', 'surat_sidi/surat_sidi_tambah', $data);
    }

    public function simpan()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $upload_url = $this->config->item("upload_url");
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_sidi_'.$waktu_gambar;
            $config['upload_path']          = $upload_url;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'sk_sidi_nomor'             => $this->input->post('surat_sidi_nomor'),
                    'sk_sidi_tanggal_surat'     => $this->input->post('surat_sidi_tanggal_surat'),
                    'sk_sidi_tanggal_sidi'      => $this->input->post('surat_sidi_tanggal_sidi'),
                    'sk_sidi_nama'              => $this->input->post('surat_sidi_nama'),
                    'sk_sidi_tempat_lahir'      => $this->input->post('surat_sidi_tempat_lahir'),
                    'sk_sidi_tanggal_lahir'     => $this->input->post('surat_sidi_tanggal_lahir'),
                    'sk_sidi_jenis_kelamin'     => $this->input->post('surat_sidi_jenis_kelamin'),
                    'sk_sidi_yang_meneguhkan'   => $this->input->post('surat_sidi_oleh'),
                    'sk_sidi_link'              => $link
                );
                $this->Model_surat_sidi->simpan($data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_sidi_nomor'             => $this->input->post('surat_sidi_nomor'),
                        'sk_sidi_tanggal_surat'     => $this->input->post('surat_sidi_tanggal_surat'),
                        'sk_sidi_tanggal_sidi'      => $this->input->post('surat_sidi_tanggal_sidi'),
                        'sk_sidi_nama'              => $this->input->post('surat_sidi_nama'),
                        'sk_sidi_tempat_lahir'      => $this->input->post('surat_sidi_tempat_lahir'),
                        'sk_sidi_tanggal_lahir'     => $this->input->post('surat_sidi_tanggal_lahir'),
                        'sk_sidi_jenis_kelamin'     => $this->input->post('surat_sidi_jenis_kelamin'),
                        'sk_sidi_yang_meneguhkan'   => $this->input->post('surat_sidi_oleh'),
                        'sk_sidi_link'              => $baris['file_name']
                    );
                    $this->Model_surat_sidi->simpan($data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_sidi"));           
        }
    }
    public function ambil_surat_sidi()
    {
        $data = $this->Model_surat_sidi->surat_sidi_json();
    }

    public function detail()
    {
        $id = $this->input->post('rowid1');
        $data = $this->Model_surat_sidi->detail($id);

        foreach ($data->result() as $baris_data_surat_sidi_detail) {

            if ($baris_data_surat_sidi_detail->sk_sidi_link == '') {
                $link_gambar = "<td>-</td>";   
            } else {
                $link_gambar = "<td>
                <a href='".base_url('img/').$baris_data_surat_sidi_detail->sk_sidi_link."'>
                <img src=".base_url('img/').$baris_data_surat_sidi_detail->sk_sidi_link." class='img img-responsive'></a>
                </td>";                             
            }            

            echo "
                <table class='table'>
                    <tr>
                        <td style='width: 40%'>Nomor Surat sidi</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_nomor."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_tanggal_surat."</td>
                    </tr>
                    <tr>
                        <td>Tanggal sidi</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_tanggal_sidi."</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_nama."</td>
                    </tr>                    
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_jenis_kelamin."</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_tempat_lahir."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_tanggal_lahir."</td>
                    </tr>
                    <tr>
                        <td>Yang Meneguhkan Sidi</td>
                        <td>:</td>
                        <td>".$baris_data_surat_sidi_detail->sk_sidi_yang_meneguhkan."</td>
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
        $hasil_surat_sidi = $this->Model_surat_sidi->edit($id)->num_rows();
        if ($hasil_surat_sidi > 0) {
            $data['data_ss'] = $this->Model_surat_sidi->edit($id);
            $data['pendeta'] = $this->Model_pendeta->ambil_pendeta();  
            $data['title'] = "Edit Surat Sidi - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
            $this->template->load('backend_template', 'surat_sidi/surat_sidi_edit', $data);
        } else {
            redirect(base_url("index.php/surat_sidi"));           
        }

    }

    public function update()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $upload_url = $this->config->item("upload_url");
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_sidi_'.$waktu_gambar;
            $config['upload_path']          = $upload_url;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'sk_sidi_nomor'             => $this->input->post('surat_sidi_nomor'),
                    'sk_sidi_tanggal_surat'     => $this->input->post('surat_sidi_tanggal_surat'),
                    'sk_sidi_tanggal_sidi'      => $this->input->post('surat_sidi_tanggal_sidi'),
                    'sk_sidi_nama'              => $this->input->post('surat_sidi_nama'),
                    'sk_sidi_tempat_lahir'      => $this->input->post('surat_sidi_tempat_lahir'),
                    'sk_sidi_tanggal_lahir'     => $this->input->post('surat_sidi_tanggal_lahir'),
                    'sk_sidi_jenis_kelamin'     => $this->input->post('surat_sidi_jenis_kelamin'),
                    'sk_sidi_yang_meneguhkan'   => $this->input->post('surat_sidi_oleh'),
                );
                $id = $this->input->post('sk_sidi_id');
                $this->Model_surat_sidi->update($id, $data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_sidi_nomor'             => $this->input->post('surat_sidi_nomor'),
                        'sk_sidi_tanggal_surat'     => $this->input->post('surat_sidi_tanggal_surat'),
                        'sk_sidi_tanggal_sidi'      => $this->input->post('surat_sidi_tanggal_sidi'),
                        'sk_sidi_nama'              => $this->input->post('surat_sidi_nama'),
                        'sk_sidi_tempat_lahir'      => $this->input->post('surat_sidi_tempat_lahir'),
                        'sk_sidi_tanggal_lahir'     => $this->input->post('surat_sidi_tanggal_lahir'),
                        'sk_sidi_jenis_kelamin'     => $this->input->post('surat_sidi_jenis_kelamin'),
                        'sk_sidi_yang_meneguhkan'   => $this->input->post('surat_sidi_oleh'),
                        'sk_sidi_link'              => $baris['file_name']
                    );
                    $id = $this->input->post('sk_sidi_id');
                    $this->Model_surat_sidi->update($id, $data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_sidi"));           
        }
    }


    public function hapus_link()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_sidi->hapus_link($id);
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_sidi->hapus($id);
    }



}