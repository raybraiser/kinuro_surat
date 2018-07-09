<?php 
 
class Model_surat_keterangan extends CI_Model {

	public function simpan ($data) {
        $query = $this->db->insert('tbl_surat_keterangan', $data);
        if ($query) {
            $query_status = array(
				'status_query_surat_keterangan' => 'sukses',			
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keterangan"));
        } else {
            $query_status = array(
				'status_query_surat_keterangan' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keterangan"));
        }
    }


    public function surat_keterangan_json(){
        // DB table to use
        $table = 'tbl_surat_keterangan';
        // Table's primary key
        $primaryKey = 'sk_keterangan_id';


        $columns = array(
            array( 'db' => 'sk_keterangan_nomor_surat', 'dt' => 0 ),            
            array( 'db' => 'sk_keterangan_tanggal_surat', 'dt' => 1 ),
            array( 'db' => 'sk_keterangan_jenis_surat', 'dt' => 2 ),
            array( 'db' => 'sk_keterangan_nama_lengkap', 'dt' => 3 ),
		    array(
                'db' => 'sk_keterangan_id',
                'dt' => 4,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn-sm btn-info' href=".base_url('index.php/surat_keterangan/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn-sm btn-danger' data-toggle='modal' data-target='#hapus_surat_keterangan' data-href=".base_url('index.php/surat_keterangan/hapus/'.$d)."><i class='fas fa-trash'></i></a>
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
			redirect(base_url("index.php/surat_keterangan"));            
        } else {
            $query = $this->db->get_where('tbl_surat_keterangan', array('sk_keterangan_id' => $id));
            return $query;
        }
        
    }

    public function hapus_link($id)
    {
        $data = array(
            'sk_keterangan_link' => ''
        );
        $this->db->where('sk_keterangan_id', $id);
        $query = $this->db->update('tbl_surat_keterangan', $data);

        if ($query) {
            $query_status = array(
				'status_query_surat_keterangan_hapus_link' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keterangan/edit/".$id.""));
        } else {
            $query_status = array(
				'status_query_surat_keterangan_hapus_link' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keterangan/edit/".$id.""));
        }
    }

    public function update($id, $data)
    {
        $this->db->where('sk_keterangan_id', $id);
        $query = $this->db->update('tbl_surat_keterangan', $data);
        if ($query) {
            $query_status = array(
				'status_query_surat_keterangan_update' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keterangan"));
        } else {
            $query_status = array(
				'status_query_surat_keterangan_update' => 'gagal',										
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/surat_keterangan"));
        }
    }

    public function hapus($id)
    {
        if (!$id) {
			redirect(base_url("index.php/surat_keterangan"));            
        } else {
            $query = $this->db->delete('tbl_surat_keterangan', array('sk_keterangan_id' => $id));
            if ($query) {
                $query_status = array(
                    'status_query_surat_keterangan_hapus' => 'sukses',		
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_keterangan"));
            } else {
                $query_status = array(
                    'status_query_surat_keterangan_hapus' => 'gagal',										
                );
                $this->session->set_userdata($query_status);
                redirect(base_url("index.php/surat_keterangan"));
            }
        }
    }


    public function detail($id)
    {
        if ($id) {
            $query = $this->db->get_where('tbl_surat_keterangan', array('sk_keterangan_id' => $id));
            return $query;
        }        
    }



}