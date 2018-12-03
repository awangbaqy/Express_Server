<?php

require APPPATH . '/libraries/REST_Controller.php';

class Pembelian extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data pembelian
    function index_get() {
        $id_pembelian = $this->get('id_pembelian');
        if ($id_pembelian == '') {
            $pembeli = $this->db->get('pembelian')->result();
        } else {
            $this->db->where('id_pembelian', $id_pembelian);
            $pembeli = $this->db->get('pembelian')->result();
        }
        $this->response($pembeli, 200);
    }

    // insert new data to pembelian
    function index_post() {
        $data = array(
            'id_pembelian'   => $this->post('id_pembelian'),
            'id_pembeli'     => $this->post('id_pembeli'),
            'tanggal_beli'   => $this->post('tanggal_beli'),
            'total_harga'    => $this->post('total_harga'),
            'id_tiket'       => $this->post('id_tiket'));
        $insert = $this->db->insert('pembelian', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data pembelian
    function index_put() {
        $id_pembelian = $this->put('id_pembelian');
        $data = array(
            'id_pembelian'   => $this->put('id_pembelian'),
            'id_pembeli'     => $this->put('id_pembeli'),
            'tanggal_beli'   => $this->put('tanggal_beli'),
            'total_harga'    => $this->put('total_harga'),
            'id_tiket'       => $this->put('id_tiket'));
        $this->db->where('id_pembelian', $id_pembelian);
        $update = $this->db->update('pembelian', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete pembelian
    function index_delete() {
        $id_pembelian = $this->delete('id_pembelian');
        $this->db->where('id_pembelian', $id_pembelian);
        $delete = $this->db->delete('pembelian');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}