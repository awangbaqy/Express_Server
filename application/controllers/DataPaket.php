<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPaket extends CI_Controller {

	public function __construct()
    { parent::__construct(); }

    public function show()
	{
        $data['data'] = $this->Paket_model->getPaket();
        $this->load->view('admin/paket', $data);
    }

	public function store()
    {
        // Insert data
        $data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp')
            ];
        
        if ($this->Paket_model->postPaket($data))
        {
            redirect('DataPaket/show');
        }
        else
        { $this->load->view('admin/paket', $data); }

    }

	public function update($id_paket)
    {
        //Ambil Value
        $id_paket=$this->input->post('id_paket');
        
		$data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp')
            ];

        if ($this->Paket_model->update($id_paket, $data))
        { 
            redirect('DataPaket/update/'.$id_paket); 
        } 
        else
        { redirect('admin/index'); }
	}
	
	public function destroy($id_paket)
    {
		if ($this->Paket_model->delete($id_paket))
		{ redirect('admin/DataPaket'); }
    }
}