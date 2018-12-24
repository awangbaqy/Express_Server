<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKategori extends CI_Controller 
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

        $data['data'] = $this->Kategori_model->select($box, $search);
        $this->load->view('admin/kategori', $data);
    }

	public function store()
    {
        // Insert data
        $data = [
            'jenis' => $this->input->post('jenis'),
            'harga' => $this->input->post('harga')
        ];
        
        $this->Kategori_model->insert($data);

        redirect('DataKategori/show');
    }

	public function update()
    {
        //Ambil Value
        $id=$this->input->post('id_kategori');

		$data = [
            'jenis' => $this->input->post('jenis'),
            'harga' => $this->input->post('harga')
        ];
        
        $this->Kategori_model->update($id, $data);
        redirect('datakategori/show');
	}
	
	public function destroy($id)
    {
		$this->Kategori_model->delete($id);
		redirect('DataKategori/show');
    }
}