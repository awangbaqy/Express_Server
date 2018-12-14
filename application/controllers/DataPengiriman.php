<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPengiriman extends CI_Controller {

	public function __construct()
    { parent::__construct(); }

    public function show()
	{
        $data['data'] = $this->Pengiriman_model->getPengiriman();
        $this->load->view('admin/pengiriman', $data);
    }

	public function store()
    {
        // Insert data
        $data = [
            'tgl_masuk'       => $this->input->post('tgl_masuk'),
            'tgl_keluar'      => $this->input->post('tgl_keluar'),
            'nama_penerima'   => $this->input->post('nama_penerima'),
            'alamat_penerima' => $this->input->post('alamat_penerima'),
            'total_harga'     => $this->input->post('total_harga'),
            'status'          => $this->input->post('status'),
            'id_kategori'     => $this->input->post('id_kategori'),
            'id_pengirim'     => $this->input->post('id_pengirim')
            ];
        
        if ($this->Pengiriman_model->postPengiriman($data))
        {
            redirect('DataPengiriman/show');
        }
        else
        { $this->load->view('admin/pengiriman', $data); }

    }

	public function update($id_pengiriman)
    {
        //Ambil Value
        $id_pengiriman=$this->input->post('id_pengiriman');
        
		$data = [
            'tgl_masuk'       => $this->input->post('tgl_masuk'),
            'tgl_keluar'      => $this->input->post('tgl_keluar'),
            'nama_penerima'   => $this->input->post('nama_penerima'),
            'alamat_penerima' => $this->input->post('alamat_penerima'),
            'total_harga'     => $this->input->post('total_harga'),
            'status'          => $this->input->post('status'),
            'id_kategori'     => $this->input->post('id_kategori'),
            'id_pengirim'     => $this->input->post('id_pengirim')
            ];

        if ($this->Pengiriman_model->update($id_pengiriman, $data))
        { 
            redirect('DataPengiriman/update/'.$id_pengiriman); 
        } 
        else
        { redirect('admin/index'); }
	}
	
	public function destroy($id_pengiriman)
    {
		if ($this->Pengiriman_model->delete($id_pengiriman))
		{ redirect('admin/DataPengiriman'); }
    }
}