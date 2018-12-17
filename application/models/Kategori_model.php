<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model 
{
    //show
    public function getKategori()
    { 
        return $this->db->get('kategori')->result(); 
    }

   //create (POST)
   public function postKategori($data)
   {
       return $this->db->insert('kategori',$data);
   }

   //update (PUT)
   public function putKategori()
   {
       $this->db->where('id_kategori', $id_kategori);
       $this->db->update('kategori', $data);
   }

   //delete (DELETE)
   public function deleteKategori()
   {
       $this->db->where('id_kategori', $id_kategori);
       $this->db->delete('kategori');
   }

   // REST

   public function getID($id)
   {
       $this->db->where('id_kategori', $id);
       return $this->db->get('kategori')->row();
   }
}