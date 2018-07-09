<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_baptis extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_surat_baptis');
	}

    public function index()
    {
		$data['title'] = "Surat Baptis - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_baptis/surat_baptis', $data);
    }

    public function tambah()
    {
		$data['title'] = "Tambah Surat Baptis - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'surat_baptis/surat_baptis_tambah', $data);
    }

    public function simpan()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_baptis_'.$waktu_gambar;
            $config['upload_path']          = '/var/www/html/project/kinuro_surat/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $link = '';
                $data = array   (
                    'sk_baptis_nomor'           => $this->input->post('surat_baptis_nomor'),
                    'sk_baptis_tanggal_surat'   => $this->input->post('surat_baptis_tanggal_surat'),
                    'sk_baptis_tanggal_baptis'  => $this->input->post('surat_baptis_tanggal_baptis'),
                    'sk_baptis_nama'            => $this->input->post('surat_baptis_nama'),
                    'sk_baptis_tempat_lahir'    => $this->input->post('surat_baptis_tempat_lahir'),
                    'sk_baptis_tanggal_lahir'   => $this->input->post('surat_baptis_tanggal_lahir'),
                    'sk_baptis_jenis_kelamin'   => $this->input->post('surat_baptis_jenis_kelamin'),
                    'sk_baptis_nama_ayah'       => $this->input->post('surat_baptis_nama_ayah'),
                    'sk_baptis_nama_ibu'        => $this->input->post('surat_baptis_nama_ibu'),
                    'sk_baptis_yang_membaptis'  => $this->input->post('surat_baptis_oleh'),
                    'sk_baptis_link'            => $link
                );
                $this->Model_surat_baptis->simpan($data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_baptis_nomor'           => $this->input->post('surat_baptis_nomor'),
                        'sk_baptis_tanggal_surat'   => $this->input->post('surat_baptis_tanggal_surat'),
                        'sk_baptis_tanggal_baptis'  => $this->input->post('surat_baptis_tanggal_baptis'),
                        'sk_baptis_nama'            => $this->input->post('surat_baptis_nama'),
                        'sk_baptis_tempat_lahir'    => $this->input->post('surat_baptis_tempat_lahir'),
                        'sk_baptis_tanggal_lahir'   => $this->input->post('surat_baptis_tanggal_lahir'),
                        'sk_baptis_jenis_kelamin'   => $this->input->post('surat_baptis_jenis_kelamin'),
                        'sk_baptis_nama_ayah'       => $this->input->post('surat_baptis_nama_ayah'),
                        'sk_baptis_nama_ibu'        => $this->input->post('surat_baptis_nama_ibu'),
                        'sk_baptis_yang_membaptis'  => $this->input->post('surat_baptis_oleh'),
                        'sk_baptis_link'             => base_url() . 'img/' . $baris['file_name']
                    );
                    $this->Model_surat_baptis->simpan($data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_baptis"));           
        }
    }
    public function ambil_surat_baptis()
    {
        $data = $this->Model_surat_baptis->surat_baptis_json();
    }

    public function detail()
    {
        $id = $this->input->post('rowid1');
        $data = $this->Model_surat_baptis->detail($id);

        foreach ($data->result() as $baris_data_surat_baptis_detail) {

            if ($baris_data_surat_baptis_detail->sk_baptis_link == '') {
                $link_gambar = "<td>-</td>";
            } else {
                $link_gambar = "<td>
                <a href=".$baris_data_surat_baptis_detail->sk_baptis_link."><img src=".$baris_data_surat_baptis_detail->sk_baptis_link." class='img img-responsive'>
                </td>";                             
            }

            echo "
                <table class='table'>
                    <tr>
                        <td style='width: 40%'>Nomor Surat Baptis</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_nomor."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_tanggal_surat."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Baptis</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_tanggal_baptis."</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_nama."</td>
                    </tr>                    
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_jenis_kelamin."</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_tempat_lahir."</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_tanggal_lahir."</td>
                    </tr>
                    <tr>
                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_nama_ayah."</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_nama_ibu."</td>
                    </tr>
                    <tr>
                        <td>Yang Membaptis</td>
                        <td>:</td>
                        <td>".$baris_data_surat_baptis_detail->sk_baptis_yang_membaptis."</td>
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
        $hasil_surat_baptis = $this->Model_surat_baptis->edit($id)->num_rows();
        if ($hasil_surat_baptis > 0) {
            $data['data_sb'] = $this->Model_surat_baptis->edit($id);
            $data['title'] = "Edit Surat Baptis - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
            $this->template->load('backend_template', 'surat_baptis/surat_baptis_edit', $data);
        } else {
            redirect(base_url("index.php/surat_baptis"));           
        }

    }

    public function update()
    {
        $simpan = $this->input->post('tombol_simpan');
        if (isset($simpan)) {
            $waktu_gambar = date("dmYhis"); 
            $nama_gambar = 'surat_baptis_'.$waktu_gambar;
            $config['upload_path']          = '/var/www/html/project/kinuro_surat/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $nama_gambar;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('upload_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                $data = array   (
                    'sk_baptis_nomor'           => $this->input->post('surat_baptis_nomor'),
                    'sk_baptis_tanggal_surat'   => $this->input->post('surat_baptis_tanggal_surat'),
                    'sk_baptis_tanggal_baptis'  => $this->input->post('surat_baptis_tanggal_baptis'),
                    'sk_baptis_nama'            => $this->input->post('surat_baptis_nama'),
                    'sk_baptis_tempat_lahir'    => $this->input->post('surat_baptis_tempat_lahir'),
                    'sk_baptis_tanggal_lahir'   => $this->input->post('surat_baptis_tanggal_lahir'),
                    'sk_baptis_jenis_kelamin'   => $this->input->post('surat_baptis_jenis_kelamin'),
                    'sk_baptis_nama_ayah'       => $this->input->post('surat_baptis_nama_ayah'),
                    'sk_baptis_nama_ibu'        => $this->input->post('surat_baptis_nama_ibu'),
                    'sk_baptis_yang_membaptis'  => $this->input->post('surat_baptis_oleh')
                );
                $id = $this->input->post('id_sb');                
                $this->Model_surat_baptis->update($id, $data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $baris) {
                    $data = array   (
                        'sk_baptis_nomor'           => $this->input->post('surat_baptis_nomor'),
                        'sk_baptis_tanggal_surat'   => $this->input->post('surat_baptis_tanggal_surat'),
                        'sk_baptis_tanggal_baptis'  => $this->input->post('surat_baptis_tanggal_baptis'),
                        'sk_baptis_nama'            => $this->input->post('surat_baptis_nama'),
                        'sk_baptis_tempat_lahir'    => $this->input->post('surat_baptis_tempat_lahir'),
                        'sk_baptis_tanggal_lahir'   => $this->input->post('surat_baptis_tanggal_lahir'),
                        'sk_baptis_jenis_kelamin'   => $this->input->post('surat_baptis_jenis_kelamin'),
                        'sk_baptis_nama_ayah'       => $this->input->post('surat_baptis_nama_ayah'),
                        'sk_baptis_nama_ibu'        => $this->input->post('surat_baptis_nama_ibu'),
                        'sk_baptis_yang_membaptis'  => $this->input->post('surat_baptis_oleh'),
                        'sk_baptis_link'             => base_url() . 'img/' . $baris['file_name']
                    );
                    $id = $this->input->post('id_sb');                
                    $this->Model_surat_baptis->update($id, $data);
                }            
            }
        } else {
			redirect(base_url("index.php/surat_baptis"));           
        }
    }


    public function hapus_link()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_baptis->hapus_link($id);
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_surat_baptis->hapus($id);
    }



}