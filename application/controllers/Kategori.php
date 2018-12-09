<?php

require APPPATH . '/libraries/REST_Controller.php';

class Kategori extends REST_Controller 
{
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    public function index_get()
    {
        $data = $this->Kategori_model->get();
        $this->response($data, 200);
    }
}

/* End of file Controllername.php */

?>
