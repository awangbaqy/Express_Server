<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model 
{
    //show
    public function select($box, $search)
    {
        if ($box != 'null' && $search != 'null')
        { $this->db->like($box, $search); }

        return $this->db->get('paket')->result();
    }

    //create
    public function insert($data)
    { return $this->db->insert('paket',$data); }

    //update
    public function update($id, $data)
    {
        $this->db->where('id_paket', $id);
        $this->db->update('paket', $data);
    }

    //delete
    public function delete($id)
    {
        $this->db->where('id_paket', $id);
        $this->db->delete('paket');
    }

    // REST
    public function delByFkId($id)
    {
        $this->db->where('id_pengiriman', $id);
        return $this->db->delete('paket');
    }
}