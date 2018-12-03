<?php

require APPPATH . '/libraries/REST_Controller.php';

class pengirim extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data pengirim
    function index_get() {
        $id_pengirim = $this->get('id_user');
        if ($id_pengirim == '') {
            $pengirim = $this->db->get('pengirim')->result();
        } else {
            $this->db->where('id_user', $id_pengirim);
            $pengirim = $this->db->get('pengirim')->result();
        }
        $this->response($pengirim, 200);
    }

    // insert new data to pembeli
    function index_post() {
        $data = array(
            'id_user'       => $this->post('id_user'),
            'nama'          => $this->post('nama'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'alamat'        => $this->post('hp'),
            'hp'            => $this->post('telpn'));
        $insert = $this->db->insert('pengirim', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data pengirim
    function index_put() {
        $id_pengirim = $this->put('id_user');
        $data = array(
            'id_user'       => $this->post('id_user'),
            'nama'          => $this->post('nama'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'alamat'        => $this->post('hp'),
            'hp'            => $this->post('telpn'));
        $this->db->where('id_user', $id_pengirim);
        $update = $this->db->update('pengirim', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete pengirim
    function index_delete() {
        $id_pengirim = $this->delete('id_user');
        $this->db->where('id_user', $id_pengirim);
        $delete = $this->db->delete('pengirim');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}