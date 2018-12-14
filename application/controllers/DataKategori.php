<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKategori extends CI_Controller {

	public function __construct()
    { parent::__construct(); }

    public function show()
	{
        $data['data'] = $this->Kategori_model->getKategori();
        $this->load->view('admin/kategori', $data);
    }

	public function store()
    {
        // Insert data
        $data = [
            'jenis' => $this->input->post('jenis'),
            'harga'    => $this->input->post('harga')
        ];
        if ($this->Kategori_model->postKategori($data))
        {
            redirect('DataKategori/show');
        }
        else
        { $this->load->view('admin/kategori', $data); }

    }

	public function update($id_kategori)
    {
        //Ambil Value
        $id_kategori=$this->input->post('id_kategori');

		$data = [
            'jenis' => $this->input->post('jenis'),
            'harga'    => $this->input->post('harga')
        ];
        
        if ($this->Kategori_model->update($id_kategori, $data))
        { 
            redirect('DataKategori/update/'.$id_kategori); 
        } 
        else
        { redirect('admin/index'); }
	}
	
	public function destroy($id_kategori)
    {
		if ($this->Kategori_model->delete($id_kategori))
		{ redirect('admin/DataKategori'); }
    }
}