<?php 
 
class Model_surat_keputusan extends CI_Model {

	public function simpan ($data) {
        $query = $this->db->insert('tbl_surat_keputusan', $data);
        if ($query) {
            $query_status = array(
				'status_query_surat_keputusan' => 'sukses',			
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keputusan"));
        } else {
            $query_status = array(
				'status_query_surat_keputusan' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keputusan"));
        }
    }


    public function surat_keputusan_json(){
        // DB table to use
        $table = 'tbl_surat_keputusan';
        // Table's primary key
        $primaryKey = 'keputusan_id';


        $columns = array(
            array( 'db' => 'keputusan_nomor_surat', 'dt' => 0 ),            
            array( 'db' => 'keputusan_tanggal_surat', 'dt' => 1 ),
            array( 'db' => 'keputusan_perihal', 'dt' => 2 ),
            array( 'db' => 'keputusan_untuk', 'dt' => 3 ),
		    array(
                'db' => 'keputusan_id',
                'dt' => 4,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn btn-sm btn-info' href=".base_url('index.php/surat_keputusan/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hapus_surat_keputusan' data-href=".base_url('index.php/surat_keputusan/hapus/'.$d)."><i class='fas fa-trash'></i></a>
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
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
         );

    }

    public function edit($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_keputusan"));            
        } else {
            $query = $this->db->get_where('tbl_surat_keputusan', array('keputusan_id' => $id));
            return $query;
        }
        
    }

    public function hapus_link($id)
    {
        $data = array(
            'keputusan_link' => ''
        );
        $this->db->where('keputusan_id', $id);
        $query = $this->db->update('tbl_surat_keputusan', $data);

        if ($query) {
            $query_status = array(
				'status_query_keputusan_hapus_link' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keputusan/edit/".$id.""));
        } else {
            $query_status = array(
				'status_query_keputusan_hapus_link' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keputusan/edit/".$id.""));
        }
    }

    public function update($id, $data)
    {
        $this->db->where('keputusan_id', $id);
        $query = $this->db->update('tbl_surat_keputusan', $data);
        if ($query) {
            $query_status = array(
				'status_query_keputusan_update' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keputusan"));
        } else {
            $query_status = array(
				'status_query_keputusan_update' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keputusan"));
        }
    }

    public function hapus($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_keputusan"));            
        } else {
            $query = $this->db->delete('tbl_surat_keputusan', array('keputusan_id' => $id));
            if ($query) {
                $query_status = array(
                    'status_query_surat_keputusan_hapus' => 'sukses',		
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_keputusan"));
            } else {
                $query_status = array(
                    'status_query_surat_keputusan_hapus' => 'gagal',										
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_keputusan"));
            }
        }
    }


    public function detail($id)
    {
        if ($id) {
            $query = $this->db->get_where('tbl_surat_keputusan', array('keputusan_id' => $id));
            return $query;
        }        
    }



}