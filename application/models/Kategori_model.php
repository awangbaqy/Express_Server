<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model 
{
    public function get()
    { return $this->db->get('kategori')->result(); }
}