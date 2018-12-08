<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Pengirim extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    // show data pengirim
    function index_get() {
        $id_pengirim = $this->get('id_pengirim');
        if ($id_pengirim == '') {
            $pengirim = $this->db->get('pengirim')->result();
        } else {
            $this->db->where('id_pengirim', $id_pengirim);
            $pengirim = $this->db->get('pengirim')->result();
        }
        $this->response($pengirim, 200);
    }

    // insert new data to pengirim
    function index_post() {
        $data = array(
            'id_pengirim'   => $this->post('id_pengirim'),
            'nama'          => $this->post('nama'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'alamat'        => $this->post('alamat'),
            'hp'            => $this->post('hp'));
        $insert = $this->db->insert('pengirim', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data pengirim
    function index_put() {
        $id_pengirim = $this->put('id_pengirim');
        $data = array(
            'id_pengirim'       => $this->post('id_pengirim'),
            'nama'          => $this->post('nama'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'alamat'        => $this->post('alamat'),
            'hp'            => $this->post('hp'));
        $this->db->where('id_pengirim', $id_pengirim);
        $update = $this->db->update('pengirim', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete pengirim
    function index_delete() {
        $id_pengirim = $this->delete('id_pengirim');
        $this->db->where('id_pengirim', $id_pengirim);
        $delete = $this->db->delete('pengirim');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}