<?php

require APPPATH . '/libraries/REST_Controller.php';

class pembeli extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data pembeli
    function index_get() {
        $id_pembeli = $this->get('id_pembeli');
        if ($id_pembeli == '') {
            $pembeli = $this->db->get('pembeli')->result();
        } else {
            $this->db->where('id_pembeli', $id_pembeli);
            $pembeli = $this->db->get('pembeli')->result();
        }
        $this->response($pembeli, 200);
    }

    // insert new data to pembeli
    function index_post() {
        $data = array(
            'id_pembeli'   => $this->post('id_pembeli'),
            'nama'         => $this->post('nama'),
            'alamat'       => $this->post('alamat'),
            'telpn'        => $this->post('telpn'));
        $insert = $this->db->insert('pembeli', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data pembeli
    function index_put() {
        $id_pembeli = $this->put('id_pembeli');
        $data = array(
            'id_pembeli'   => $this->put('id_pembeli'),
            'nama'         => $this->put('nama'),
            'alamat'       => $this->put('alamat'),
            'telpn'        => $this->put('telpn'));
        $this->db->where('id_pembeli', $id_pembeli);
        $update = $this->db->update('pembeli', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete pembeli
    function index_delete() {
        $id_pembeli = $this->delete('id_pembeli');
        $this->db->where('id_pembeli', $id_pembeli);
        $delete = $this->db->delete('pembeli');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}