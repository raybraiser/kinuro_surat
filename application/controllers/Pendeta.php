<?php

class Pendeta extends CI_Controller
{

	public function __construct(){
		parent::__construct();		
		$this->load->model('Model_pendeta');
    }

    public function index()
    {
		$data['title'] = "Data Pendeta - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'pendeta/pendeta', $data);
    }

    public function ambil_pendeta_json()
    {
        $data = $this->Model_pendeta->pendeta_json();
    }

    public function tambah()
    {
        $data['title'] = "Tambah Data Pendeta - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'pendeta/pendeta_tambah', $data);
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['data_pendeta'] = $this->Model_pendeta->edit_pendeta($id);
		$data['title'] = "Edit Data Pendeta - Aplikasi Sistem Informasi Surat GMIM Kineret Urongo";        
        $this->template->load('backend_template', 'pendeta/pendeta_edit', $data);
    }

    public function simpan()
    {
        $data = array
                        (
                            'nama_pendeta' => $this->input->post('nama_pendeta'),
                            'jabatan' => $this->input->post('jabatan'),
                            'periode_pelayanan_mulai' => $this->input->post('periode_mulai'),
                            'periode_pelayanan_akhir' => $this->input->post('periode_akhir'),
                        );
        $this->Model_pendeta->simpan_pendeta($data);
    }


    public function update()
    {
        
        $data = array
                    (
                        'nama_pendeta' => $this->input->post('nama_pendeta'),
                        'jabatan' => $this->input->post('jabatan'),
                        'periode_pelayanan_mulai' => $this->input->post('periode_mulai'),
                        'periode_pelayanan_akhir' => $this->input->post('periode_akhir')
                    );
        
        $id = $this->input->post('id');
        $this->Model_pendeta->update_pendeta($id, $data);
    }

    public function detail()
    {
        //$id = $this->input->post('rowid1');
        $id = $this->input->post('rowid1');
        $data = $this->Model_pendeta->detail_pendeta($id);
        
        foreach ($data->result() as $baris_data_pendeta) {


            echo "
                <table class='table'>
                    <tr>
                        <td style='width: 40%'>Nama Pendeta</td>
                        <td>:</td>
                        <td>".$baris_data_pendeta->nama_pendeta."</td>
                    </tr>
                    <tr>
                        <td style='width: 40%'>Jabatan</td>
                        <td>:</td>
                        <td>".$baris_data_pendeta->jabatan."</td>
                    </tr>
                    <tr>
                        <td style='width: 40%'>Periode Pelayanan Mulai</td>
                        <td>:</td>
                        <td>".$baris_data_pendeta->periode_pelayanan_mulai."</td>
                    </tr>
                    <tr>
                        <td style='width: 40%'>Periode Pelayanan Akhir</td>
                        <td>:</td>
                        <td>".$baris_data_pendeta->periode_pelayanan_akhir."</td>
                    </tr>
                </table>
            ";
        }

    }


    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_pendeta->hapus_pendeta($id);
    }


}
