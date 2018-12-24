<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model 
{
    //show
    public function select($box, $search)
    {
        if ($box != 'null' && $search != 'null')
        { $this->db->like($box, $search); }

        return $this->db->get('kategori')->result();
    }

    //create
    public function insert($data)
    { return $this->db->insert('kategori',$data); }

    //update
    public function update($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }

    //delete
    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    // REST
    public function getID($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('kategori')->row();
    }
}