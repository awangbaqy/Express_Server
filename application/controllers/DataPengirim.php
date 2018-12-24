<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPengirim extends CI_Controller 
{
	public function __construct()
    { 
        parent::__construct(); 
        if ($this->session->user != 'admin')
        { redirect('home'); }
    }

    public function show()
	{
        // Cek kolom combobox
        if($this->uri->segment(3))
        { $box = $this->uri->segment(3); }
        else
        {
            if($this->input->post("kolom"))
            { $box = $this->input->post("kolom"); }
            else
            { $box = 'null'; }
        }

        // Cek isi kotak
        if($this->uri->segment(4))
        { $search = $this->uri->segment(4); }
        else
        {
            if($this->input->post("search"))
            { $search = $this->input->post("search"); }
            else
            { $search = 'null'; }
        }

        $data['data'] = $this->Pengirim_model->select($box, $search);
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
        
        $this->Pengirim_model->insert($data);
        redirect('DataPengirim/show');
    }

	public function update()
    {
        //Ambil Value
        $id=$this->input->post('id_pengirim');
        
		$data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp')
        ];

        $this->Pengirim_model->update($id, $data);
        redirect('DataPengirim/show');
	}
	
	public function destroy($id)
    {
        $this->Pengirim_model->delete($id);
        redirect('DataPengirim/show');
    }
}