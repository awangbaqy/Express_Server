<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPaket extends CI_Controller 
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

        $data = [
            'data' => $this->Paket_model->select($box, $search),
            'dataPeng' => $this->Pengiriman_model->selectDistinct($box, $search)
        ];

        $this->load->view('admin/paket', $data);
    }

	public function store()
    {
        $weight = $this->input->post('berat');
        if ($weight < 1) { $weight = 1; }

        $id = $this->input->post('id_pengiriman');

        // Insert data
        $data = [
            'nama_paket' => $this->input->post('nama_paket'),
            'berat' => $weight,
            'id_pengiriman' => $id
        ];
        
        $this->Paket_model->insert($data);
        if ($this->updateCost($id))
        { redirect('DataPaket/show'); }
    }

	public function update()
    {
        //Ambil Value
        $weight = $this->input->post('berat');
        if ($weight < 1) { $weight = 1; }

        $id = $this->input->post('id_paket');
        $id_peng = $this->input->post('id_pengiriman');
        
		$data = [
            'nama_paket' => $this->input->post('nama_paket'),
            'berat' => $weight,
            'id_pengiriman' => $id_peng
            ];

        $this->Paket_model->update($id, $data);
        if ($this->updateCost($id_peng))
        { redirect('DataPaket/show'); }
	}
    
    public function destroy($id)
    {
		$this->Paket_model->delete($id);
		redirect('DataPaket/show');
    }

    public function updateCost($id)
    {
        // Update Biaya Pengiriman
        $weights = 0;
        $packet = $this->Paket_model->select('id_pengiriman', $id);
        if (empty($packet))
        { $weights = 0; }
        else
        {
            foreach ($packet as $p)
            { $weights += $p->berat; }
        }

        $biaya = $this->Pengiriman_model->selectStatus($id);
        $data['total_harga'] = $biaya->harga * $weights;
        $this->Pengiriman_model->update($id, $data);

        return true;
    }
}