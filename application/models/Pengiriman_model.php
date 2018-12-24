<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model 
{
    //show
    public function select($box, $search)
    {
        $this->db->join('paket', 'paket.id_pengiriman = pengiriman.id_pengiriman');
        $this->db->join('kategori', 'kategori.id_kategori = pengiriman.id_kategori');
        $this->db->join('pengirim', 'pengirim.id_pengirim = pengiriman.id_pengirim');

        if ($box != 'null' && $search != 'null')
        { $this->db->like($box, $search); }
        
        $this->db->order_by('pengiriman.id_pengiriman', 'asc');
        return $this->db->get('pengiriman')->result();
    }

    public function selectDistinct($box, $search)
    {
        $this->db->distinct();
        $this->db->join('kategori', 'kategori.id_kategori = pengiriman.id_kategori');
        $this->db->join('pengirim', 'pengirim.id_pengirim = pengiriman.id_pengirim');

        if ($box != 'null' && $search != 'null')
        { $this->db->like($box, $search); }

        $this->db->order_by('pengiriman.id_pengiriman', 'asc');
        return $this->db->get('pengiriman')->result();
    }

    public function selectStatus($id)
    {
        $this->db->distinct();
        $this->db->join('kategori', 'kategori.id_kategori = pengiriman.id_kategori');
        $this->db->where('id_pengiriman', $id);
        $this->db->order_by('pengiriman.id_pengiriman', 'asc');
        return $this->db->get('pengiriman')->row();
    }

    //create
    public function insert($data)
    {
        $this->db->insert('pengiriman', $data); 
        return $this->db->insert_id();
    }

    //update
    public function update($id, $data)
    {
        $this->db->where('id_pengiriman', $id);
        $this->db->update('pengiriman', $data);
    }

    //delete
    public function delete($id)
    {
        $this->db->where('id_pengiriman', $id);
        $this->db->delete('pengiriman');
    }
}