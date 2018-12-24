<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengirim_model extends CI_Model 
{
    //show
    public function select($box, $search)
    { 
        if ($box != 'null' && $search != 'null')
        { $this->db->like($box, $search); }

        return $this->db->get('pengirim')->result(); 
    }

    //create
    public function insert($data)
    { $this->db->insert('pengirim', $data); }

    //update
    public function update($id, $data)
    {
        $this->db->where('id_pengirim', $id);
        $this->db->update('pengirim', $data);
    }

    //delete
    public function delete($id)
    {
        $this->db->where('id_pengirim', $id);
        $this->db->delete('pengirim');
    }

    // REST
    public function getName($name)
    {
        $this->db->where('nama', $name);
        return $this->db->get('pengirim')->row();
    }
}