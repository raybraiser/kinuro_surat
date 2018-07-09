<?php 
 
class Model_surat_baptis extends CI_Model {

	public function simpan ($data) {
        $query = $this->db->insert('tbl_surat_keluar_baptis', $data);
        if ($query) {
            $query_status = array(
				'status_query_surat_baptis' => 'sukses',			
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_baptis"));
        } else {
            $query_status = array(
				'status_query_surat_baptis' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_baptis"));
        }
    }


    public function surat_baptis_json(){
        // DB table to use
        $table = 'tbl_surat_keluar_baptis';
        // Table's primary key
        $primaryKey = 'sk_baptis_id';


        $columns = array(
            array( 'db' => 'sk_baptis_nomor', 'dt' => 0 ),           
            array( 'db' => 'sk_baptis_tanggal_baptis', 'dt' => 1 ),
            array( 'db' => 'sk_baptis_nama', 'dt' => 2 ),
		    array(
                'db' => 'sk_baptis_id',
                'dt' => 3,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn btn-sm btn-info' href=".base_url('index.php/surat_baptis/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hapus_surat_baptis' data-href=".base_url('index.php/surat_baptis/hapus/'.$d)."><i class='fas fa-trash'></i></a>
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
			redirect(base_url("index.php/surat_baptis"));            
        } else {
            $query = $this->db->get_where('tbl_surat_keluar_baptis', array('sk_baptis_id' => $id));
            return $query;
        }
        
    }

    public function hapus_link($id)
    {
        $data = array(
            'sk_baptis_link' => ''
        );
        $this->db->where('sk_baptis_id', $id);
        $query = $this->db->update('tbl_surat_keluar_baptis', $data);

        if ($query) {
            $query_status = array(
				'status_query_sb_hapus_link' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_baptis/edit/".$id.""));
        } else {
            $query_status = array(
				'status_query_sb_hapus_link' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_baptis/edit/".$id.""));
        }
    }

    public function update($id, $data)
    {
        $this->db->where('sk_baptis_id', $id);
        $query = $this->db->update('tbl_surat_keluar_baptis', $data);
        if ($query) {
            $query_status = array(
				'status_query_sb_update' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_baptis"));
        } else {
            $query_status = array(
				'status_query_sb_update' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_baptis"));
        }
    }

    public function hapus($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_baptis"));            
        } else {
            $query = $this->db->delete('tbl_surat_keluar_baptis', array('sk_baptis_id' => $id));
            if ($query) {
                $query_status = array(
                    'status_query_sb_hapus' => 'sukses',		
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_baptis"));
            } else {
                $query_status = array(
                    'status_query_sb_hapus' => 'gagal',										
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_baptis"));
            }
        }
    }


    public function detail($id)
    {
        if ($id) {
            $query = $this->db->get_where('tbl_surat_keluar_baptis', array('sk_baptis_id' => $id));
            return $query;
        }        
    }



}