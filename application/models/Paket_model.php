<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model 
{
    //show
    public function getPaket()
    {
        $query = $this->db->get('paket');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    //create (POST)
    public function postPaket($data)
    { return $this->db->insert('paket',$data); }

    //update (PUT)
    public function putPaket()
    {
        $this->db->where('id_paket', $id_pengirim);
        $this->db->update('paket', $data);
    }

    //delete (DELETE)
    public function deletePaket()
    {
        $this->db->where('id_paket', $id_pengirim);
        $this->db->delete('paket');
    }

    public function delByID($id)
    {
        $this->db->where('id_pengiriman', $id);
        return $this->db->delete('paket');
    }
}