<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengirim_model extends CI_Model 
{
    //show
    public function getPengirim()
    {
        $query = $this->db->get('pengirim');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //create (POST)
    public function postPengirim($data)
    { return $this->db->insert('pengirim', $data); }

    //update (PUT)
    public function putPengirim()
    {
        $this->db->where('id_pengirim', $id_pengirim);
        $this->db->update('pengirim', $data);
    }

    //delete (DELETE)
    public function deletePengirim()
    {
        $this->db->where('id_pengirim', $id_pengirim);
        $this->db->delete('pengirim');
    }

    // REST
    public function getName($name)
    {
        $this->db->where('nama', $name);
        return $this->db->get('pengirim')->row();
    }
}