<?php

require APPPATH . '/libraries/REST_Controller.php';

class Pengiriman extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data pengiriman
    function index_get() {
        $box = $this->get('box');
        $search = $this->get('search');

        $pengiriman = $this->Pengiriman_model->getPengiriman($box, $search);
        
        $this->response($pengiriman, 200);
    }

    // insert new data to pengiriman
    function index_post() {
        $data = array(
            'id_pengiriman'   => $this->post('id_pengiriman'),
            'id_pembeli'     => $this->post('id_pembeli'),
            'tanggal_beli'   => $this->post('tanggal_beli'),
            'total_harga'    => $this->post('total_harga'),
            'id_tiket'       => $this->post('id_tiket'));
        
        if ($this->Pengirim_model->postPengirim($data)) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data pengiriman
    function index_put() {
        $id_pengiriman = $this->put('id_pengiriman');
        $data = array(
            'id_pengiriman'   => $this->put('id_pengiriman'),
            'id_pembeli'     => $this->put('id_pembeli'),
            'tanggal_beli'   => $this->put('tanggal_beli'),
            'total_harga'    => $this->put('total_harga'),
            'id_tiket'       => $this->put('id_tiket'));
        $this->db->where('id_pengiriman', $id_pengiriman);
        $update = $this->db->update('pengiriman', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete pengiriman
    function index_delete() {
        $id_pengiriman = $this->delete('id_pengiriman');
        $this->db->where('id_pengiriman', $id_pengiriman);
        $delete = $this->db->delete('pengiriman');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}