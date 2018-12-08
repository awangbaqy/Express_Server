<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPengirim extends CI_Controller {

	public function __construct()
    { parent::__construct(); }

    public function show()
	{
        $data['data'] = $this->Pengirim_model->getPengirim();
        $this->load->view('admin/pengirim', $data);
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
        
        if ($this->Pengirim_model->insert($data))
        {
            redirect('admin/pengirim');
        }
        else
        { $this->load->view('admin/pengirim', $data); }

    }

	public function update($id_pengirim)
    {
        //Ambil Value
        $id_pengirim=$this->input->post('id_pengirim');
        
		$data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp')
            ];

        if ($this->Pengirim_model->update($id_pengirim, $data))
        { 
            redirect('DataPengirim/update/'.$id_pengirim); 
        } 
        else
        { redirect('admin/index'); }
	}
	
	public function destroy($id_pengirim)
    {
		if ($this->Pengirim_model->delete($id_pengirim))
		{ redirect('admin/DataPengirim'); }
    }
}