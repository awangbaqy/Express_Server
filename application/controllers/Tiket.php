<?php

require APPPATH . '/libraries/REST_Controller.php';

class Tiket extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data tiket
    function index_get() {
        $id_tiket = $this->get('id_tiket');
        if ($id_tiket == '') {
            $tiket = $this->db->get('tiket')->result();
        } else {
            $this->db->where('id_tiket', $id_tiket);
            $tiket = $this->db->get('tiket')->result();
        }
        $this->response($tiket, 200);
    }

    // insert new data to tiket
    function index_post() {
        $data = array(
            'id_tiket'          => $this->post('id_tiket'),
            'tujuan'            => $this->post('tujuan'),
            'tanggal_berangkat' => $this->post('tanggal_berangkat'),
            'nama_kereta'       => $this->post('nama_kereta'));
        $insert = $this->db->insert('tiket', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data tiket
    function index_put() {
        $id_tiket = $this->put('id_tiket');
        $data = array(
            'id_tiket'          => $this->put('id_tiket'),
            'tujuan'            => $this->put('tujuan'),
            'tanggal_berangkat' => $this->put('tanggal_berangkat'),
            'nama_kereta'       => $this->put('nama_kereta'));
        $this->db->where('id_tiket', $id_tiket);
        $update = $this->db->update('tiket', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete tiket
    function index_delete() {
        $id_tiket = $this->delete('id_tiket');
        $this->db->where('id_tiket', $id_tiket);
        $delete = $this->db->delete('tiket');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}