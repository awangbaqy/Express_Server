<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Paket extends REST_Controller 
{
    public function __construct($config = 'rest') 
    { parent::__construct($config); }
    
    public function index_post()
    {
        $data = array(
            'nama_paket' => $this->post('nama_paket'),
            'berat' => $this->post('berat'),
            'id_pengiriman' => $this->post('id_pengiriman')
        );

        $this->Paket_model->insert($data);
    }
}
?>