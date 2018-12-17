<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model 
{
    //show
    public function getPengiriman($box, $search)
    {
        $this->db->join('paket', 'paket.id_pengiriman = pengiriman.id_pengiriman');
        $this->db->join('kategori', 'kategori.id_kategori = pengiriman.id_kategori');
        $this->db->join('pengirim', 'pengirim.id_pengirim = pengiriman.id_pengirim');

        if ($box != null && $search != null)
        { $this->db->like($box, $search); }
        
        return $this->db->get('pengiriman')->result();
    }

    //create (POST)
    public function postPengiriman($data)
    {
        $this->db->insert('pengiriman', $data); 
        return $this->db->insert_id();
    }

    //update (PUT)
    public function putPengiriman()
    {
        $this->db->where('id_pengiriman', $id_pengiriman);
        $this->db->update('pengiriman', $data);
    }

    //delete (DELETE)
    public function deletePengiriman($id_pengiriman)
    {
        $this->db->where('id_pengiriman', $id_pengiriman);
        return $this->db->delete('pengiriman');
    }
}