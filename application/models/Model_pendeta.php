<?php

class Model_pendeta extends CI_Model
{
    public function ambil_pendeta()
    {
        return $this->db->get('tbl_pendeta');
    }

    public function pendeta_json()
    {
        // DB table to use
        $table = 'tbl_pendeta';
        // Table's primary key
        $primaryKey = 'id_pendeta';


        $columns = array(
            array( 'db' => 'nama_pendeta', 'dt' => 0 ),           
            array( 'db' => 'jabatan', 'dt' => 1 ),
            array( 'db' => 'periode_pelayanan_mulai', 'dt' => 2 ),
            array( 'db' => 'periode_pelayanan_akhir', 'dt' => 3 ),

		    array(
                'db' => 'id_pendeta',
                'dt' => 4,
                'formatter' => function ($d) {
                    return "<center>
                    <a class='btn btn-sm btn-success' data-toggle='modal' data-target='#show_detail' data-id=".$d."><i class='fas fa-search'></i></a>                    
                    <a class='btn btn-sm btn-info' href=".base_url('index.php/pendeta/edit/'.$d)."><i class='fas fa-edit'></i></a>
                    <a class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hapus_pendeta' data-href=".base_url('index.php/pendeta/hapus/'.$d)."><i class='fas fa-trash'></i></a>
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


    public function simpan_pendeta($data)
    {
        $query = $this->db->insert('tbl_pendeta', $data);
        if ($query) {
            $this->session->set_flashdata('status_simpan', '<div class="alert alert-success"><strong>Berhasil !</strong> <br>Data berhasil disimpan.</div>');
            redirect(base_url("index.php/pendeta"));	
        }
    }

    public function edit_pendeta($id)
    {
        if (!$id) {
			redirect(base_url("index.php/pendeta"));            
        } else {
            $query = $this->db->get_where('tbl_pendeta', array('id_pendeta' => $id));
            return $query;
        }
    }

    public function update_pendeta($id, $data)
    {
        $this->db->where('id_pendeta', $id);
        $query = $this->db->update('tbl_pendeta', $data);
        if ($query) {
            $this->session->set_flashdata('status_update', '<div class="alert alert-success"><strong>Berhasil !</strong> <br>Data berhasil diupdate.</div>');
            redirect(base_url("index.php/pendeta"));
        }
    }

    public function detail_pendeta($id)
    {
        if ($id) {
            $query = $this->db->get_where('tbl_pendeta', array('id_pendeta' => $id));
            return $query;
        }        
    }

    public function hapus_pendeta($id)
    {
        if (!$id) {
			redirect(base_url("index.php/pendeta"));            
        } else {
            $query = $this->db->delete('tbl_pendeta', array('id_pendeta' => $id));
            if ($query) {
                $this->session->set_flashdata('status_hapus', '<div class="alert alert-success"><strong>Berhasil !</strong> <br>Data berhasil dihapus.</div>');
                redirect(base_url("index.php/pendeta"));
            }
        }
    }


}
