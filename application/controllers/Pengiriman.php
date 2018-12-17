<?php
require APPPATH . '/libraries/REST_Controller.php';

class Pengiriman extends REST_Controller 
{
    function __construct($config = 'rest') 
    { parent::__construct($config); }

    // show data pengiriman
    function index_get() {
        $box = $this->get('box');
        $search = $this->get('search');

        $pengiriman = $this->Pengiriman_model->getPengiriman($box, $search);
        
        $this->response($pengiriman, 200);
    }

    // insert new data to pengiriman
    function index_post() 
    {
        $kat = $this->Kategori_model->getID($this->post('id_kategori'));
        $nam = $this->Pengirim_model->getName($this->post('nama_pengirim'));
        
        $weight = null;
        if ($this->post('berat') <= 1) { $weight = 1; } else { $weight = $this->post('berat'); }

        $data = array(
            'tgl_masuk' => date("Y-m-d"),
            'nama_penerima' => $this->post('nama_penerima'),
            'alamat_penerima' => $this->post('alamat_penerima'),
            'total_harga' => $kat->harga * $weight  ,
            'status' => 'Dikemas',
            'id_kategori' => $this->post('id_kategori'),
            'id_pengirim' => $nam->id_pengirim
        );

        $id = $this->Pengiriman_model->postPengiriman($data);
        if (!empty($id))
        { $this->response($id, 200); }
        else
        { $this->response(array('status' => 'fail', 502)); }
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
        if (
            $this->Pengiriman_model->deletePengiriman($id_pengiriman)
            &&
            $this->Paket_model->delByID($id_pengiriman)
            )
        { $this->response(array('status' => 'success'), 201); }
        else 
        { $this->response(array('status' => 'fail', 502)); }
    }

}