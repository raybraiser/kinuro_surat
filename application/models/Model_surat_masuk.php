<?php 
 
class Model_surat_masuk extends CI_Model {

	public function simpan ($data) {
        $query = $this->db->insert('tbl_surat_masuk', $data);
        if ($query) {
            $query_status = array(
				'status_query_sm' => 'sukses',			
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_masuk"));
        } else {
            $query_status = array(
				'status_query_sm' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_masuk"));
        }
    }


    public function surat_masuk_json(){
        // DB table to use
        $table = 'tbl_surat_masuk';
        // Table's primary key
        $primaryKey = 'sm_id';


        $columns = array(
            array( 'db' => 'sm_tanggal_masuk', 'dt' => 0 ),            
            array( 'db' => 'sm_dari', 'dt' => 1 ),
            array( 'db' => 'sm_untuk', 'dt' => 2 ),
            array( 'db' => 'sm_nomor', 'dt' => 3 ),
            array( 'db' => 'sm_perihal', 'dt' => 4 ),
		    array(
                'db' => 'sm_id',
                'dt' => 5,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn btn-sm btn-info' href=".base_url('index.php/surat_masuk/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hapus_surat_masuk' data-href=".base_url('index.php/surat_masuk/hapus/'.$d)."><i class='fas fa-trash'></i></a>
                    </center>";
                }
            )
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname,
            'charset' => 'utf8'
        );
        
        echo json_encode(
            SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns)
         );

    }

    public function edit($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_masuk"));            
        } else {
            $query = $this->db->get_where('tbl_surat_masuk', array('sm_id' => $id));
            return $query;
        }
        
    }

    public function hapus_link($id)
    {
        $data = array(
            'sm_link' => ''
        );
        $this->db->where('sm_id', $id);
        $query = $this->db->update('tbl_surat_masuk', $data);

        if ($query) {
            $query_status = array(
				'status_query_sm_hapus_link' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_masuk/edit/".$id.""));
        } else {
            $query_status = array(
				'status_query_sm_hapus_link' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_masuk/edit/".$id.""));
        }
    }

    public function update($id, $data)
    {
        $this->db->where('sm_id', $id);
        $query = $this->db->update('tbl_surat_masuk', $data);
        if ($query) {
            $query_status = array(
				'status_query_sm_update' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_masuk"));
        } else {
            $query_status = array(
				'status_query_sm_update' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_masuk"));
        }
    }

    public function hapus($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_masuk"));            
        } else {
            // $ambil_path_gambar = $this->db->get_where('tbl_surat_masuk', array('sm_id' => $id));
            // foreach ($ambil_path_gambar->result() as $baris) {
            //     print_r($baris);
            // }
            $query = $this->db->delete('tbl_surat_masuk', array('sm_id' => $id));
            if ($query) {
                $query_status = array(
                    'status_query_sm_hapus' => 'sukses',		
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_masuk"));
            } else {
                $query_status = array(
                    'status_query_sm_hapus' => 'gagal',										
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_masuk"));
            }
        }
    }


    public function detail($id)
    {
        if ($id) {
            $query = $this->db->get_where('tbl_surat_masuk', array('sm_id' => $id));
            return $query;
        }        
    }



}