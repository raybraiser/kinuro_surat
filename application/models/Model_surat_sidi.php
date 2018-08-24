<?php 
 
class Model_surat_sidi extends CI_Model {

	public function simpan ($data) {

        $query = $this->db->insert('tbl_surat_keluar_sidi', $data);
        if ($query) {
            $query_status = array(
				'status_query_surat_sidi' => 'sukses',			
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_sidi"));
        } else {
            $query_status = array(
				'status_query_surat_sidi' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_sidi"));
        }
    }


    public function surat_sidi_json(){
        // DB table to use
        $table = 'tbl_surat_keluar_sidi';
        // Table's primary key
        $primaryKey = 'sk_sidi_id';


        $columns = array(
            array( 'db' => 'sk_sidi_nomor', 'dt' => 0 ),           
            array( 'db' => 'sk_sidi_tanggal_sidi', 'dt' => 1 ),
            array( 'db' => 'sk_sidi_nama', 'dt' => 2 ),
		    array(
                'db' => 'sk_sidi_id',
                'dt' => 3,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn btn-sm btn-info' href=".base_url('index.php/surat_sidi/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hapus_surat_sidi' data-href=".base_url('index.php/surat_sidi/hapus/'.$d)."><i class='fas fa-trash'></i></a>
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
			redirect(base_url("index.php/surat_sidi"));            
        } else {
            $query = $this->db->get_where('tbl_surat_keluar_sidi', array('sk_sidi_id' => $id));
            return $query;
        }
        
    }

    public function hapus_link($id)
    {
        $data = array(
            'sk_sidi_link' => ''
        );
        $this->db->where('sk_sidi_id', $id);
        $query = $this->db->update('tbl_surat_keluar_sidi', $data);

        if ($query) {
            $query_status = array(
				'status_query_ss_hapus_link' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_sidi/edit/".$id.""));
        } else {
            $query_status = array(
				'status_query_ss_hapus_link' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_sidi/edit/".$id.""));
        }
    }

    public function update($id, $data)
    {
        $this->db->where('sk_sidi_id', $id);
        $query = $this->db->update('tbl_surat_keluar_sidi', $data);
        if ($query) {
            $query_status = array(
				'status_query_ss_update' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_sidi"));
        } else {
            $query_status = array(
				'status_query_ss_update' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_sidi"));
        }
    }

    public function hapus($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_sidi"));            
        } else {
            $query = $this->db->delete('tbl_surat_keluar_sidi', array('sk_sidi_id' => $id));
            if ($query) {
                $query_status = array(
                    'status_query_ss_hapus' => 'sukses',		
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_sidi"));
            } else {
                $query_status = array(
                    'status_query_ss_hapus' => 'gagal',										
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_sidi"));
            }
        }
    }


    public function detail($id)
    {
        if ($id) {
            $query = $this->db->get_where('tbl_surat_keluar_sidi', array('sk_sidi_id' => $id));
            return $query;
        }        
    }
}