<?php 
 
class Model_admin extends CI_Model {

	public function simpan ($username_check, $data) {
        $sql = "SELECT * FROM tbl_admin WHERE admin_username = ?";
        $query = $this->db->query($sql, array($username_check));
        $count = $query->num_rows();
        if ($count > 1) {
            $query_status = array(
				'status_query_simpan_admin' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/admin"));
        } else {
            $query_simpan = $this->db->insert('tbl_admin', $data);
            $query_status = array(
                'status_query_simpan_admin' => 'sukses',			
            );
            $this->session->set_userdata($query_status);
            redirect(base_url("index.php/admin"));
        }
    }


    public function data_admin_json(){
        // DB table to use
        $table = 'tbl_admin';
        // Table's primary key
        $primaryKey = 'admin_id';


        $columns = array(
            array( 'db' => 'admin_nama_Lengkap', 'dt' => 0 ),           
            array( 'db' => 'admin_username', 'dt' => 1 ),
		    array(
                'db' => 'admin_status',
                'dt' => 2,
                'formatter' => function ($d) {
                    if ($d == 1) {
                        $datax = "Super Admin"; 
                    } elseif ($d == 2) {
                        $datax = "Admin"; 
                    } 
                    return $datax;
                }
            ),
		    array(
                'db' => 'admin_id',
                'dt' => 3,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn btn-sm btn-info' href=".base_url('index.php/admin/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hapus_admin' data-href=".base_url('index.php/admin/hapus/'.$d)."><i class='fas fa-trash'></i></a>
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
			redirect(base_url("index.php/admin"));            
        } else {
            $query = $this->db->get_where('tbl_admin', array('admin_id' => $id));
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
        $this->db->where('admin_id', $id);
        $query = $this->db->update('tbl_admin', $data);
        if ($query) {
            $query_status = array(
                'status_query_update_admin' => 'sukses',		
            );
            $this->session->set_userdata($query_status);
            redirect(base_url("index.php/admin"));
        } else {
            $query_status = array(
				'status_query_update_admin' => 'gagal',				
            );
            $this->session->set_userdata($query_status);
			redirect(base_url("index.php/admin"));
        }
    }

    public function hapus($id)
    {
        if (!$id) {
			redirect(base_url("index.php/admin"));            
        } else {
            $sql = "SELECT * FROM tbl_admin WHERE admin_id = ?";
            $query = $this->db->query($sql, array($id));
            foreach ($query->result() as $cek_data) {
                $as = $cek_data->admin_status;
                if ($as == 1) {
                    $query = $this->db->delete('tbl_admin', array('admin_id' => $id));
                    if ($query) {
                        $query_status = array(
                            'status_query_admin_hapus' => 'sukses',		
                        );
                        $this->session->set_userdata($query_status);
                        redirect(base_url("index.php/admin"));
                    } else {
                        $query_status = array(
                            'status_query_admin_hapus' => 'gagal',										
                        );
                        $this->session->set_userdata($query_status);
                        redirect(base_url("index.php/admin"));
                    }
                } else {
                    redirect(base_url("index.php/admin"));
                }
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