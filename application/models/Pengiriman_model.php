<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model 
{
    public function select($box, $search)
    {
        $this->db->join('paket', 'paket.id_pengiriman = pengiriman.id_pengiriman');
        $this->db->join('kategori', 'kategori.id_kategori = pengiriman.id_kategori');

        if ($box != null && $search != null)
        { $this->db->like($box, $search); }
        
        return $this->db->get('pengiriman')->result();
    }
}