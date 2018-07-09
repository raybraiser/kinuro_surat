<?php 
 
class Model_surat_nikah extends CI_Model {

	public function simpan ($data) {
        $query = $this->db->insert('tbl_surat_keluar_nikah', $data);
        if ($query) {
            $query_status = array(
				'status_query_surat_nikah' => 'sukses',			
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_nikah"));
        } else {
            $query_status = array(
				'status_query_surat_nikah' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_nikah"));
        }
    }


    public function surat_nikah_json(){
        // DB table to use
        $table = 'tbl_surat_keluar_nikah';
        // Table's primary key
        $primaryKey = 'sk_menikah_id';


        $columns = array(
            array( 'db' => 'sk_menikah_nomor', 'dt' => 0 ),           
            array( 'db' => 'sk_menikah_tanggal_menikah', 'dt' => 1 ),
            array( 'db' => 'sk_menikah_nama_pria', 'dt' => 2 ),
            array( 'db' => 'sk_menikah_nama_wanita', 'dt' => 3 ),
		    array(
                'db' => 'sk_menikah_id',
                'dt' => 4,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn btn-sm btn-info' href=".base_url('index.php/surat_nikah/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hapus_surat_nikah' data-href=".base_url('index.php/surat_nikah/hapus/'.$d)."><i class='fas fa-trash'></i></a>
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
			redirect(base_url("index.php/surat_nikah"));            
        } else {
            $query = $this->db->get_where('tbl_surat_keluar_nikah', array('sk_menikah_id' => $id));
            return $query;
        }
        
    }

    public function hapus_link($id)
    {
        $data = array(
            'sk_menikah_link' => ''
        );
        $this->db->where('sk_menikah_id', $id);
        $query = $this->db->update('tbl_surat_keluar_nikah', $data);

        if ($query) {
            $query_status = array(
				'status_query_sn_hapus_link' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_nikah/edit/".$id.""));
        } else {
            $query_status = array(
				'status_query_sn_hapus_link' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_nikah/edit/".$id.""));
        }
    }

    public function update($id, $data)
    {
        $this->db->where('sk_menikah_id', $id);
        $query = $this->db->update('tbl_surat_keluar_nikah', $data);
        if ($query) {
            $query_status = array(
				'status_query_sn_update' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_nikah"));
        } else {
            $query_status = array(
				'status_query_sn_update' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_nikah"));
        }
    }

    public function hapus($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_nikah"));            
        } else {
            $query = $this->db->delete('tbl_surat_keluar_nikah', array('sk_menikah_id' => $id));
            if ($query) {
                $query_status = array(
                    'status_query_sn_hapus' => 'sukses',		
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_nikah"));
            } else {
                $query_status = array(
                    'status_query_sn_hapus' => 'gagal',										
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_nikah"));
            }
        }
    }


    public function detail($id)
    {
        if ($id) {
            $query = $this->db->get_where('tbl_surat_keluar_nikah', array('sk_menikah_id' => $id));
            return $query;
        }        
    }



}