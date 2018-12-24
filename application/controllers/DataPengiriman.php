<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPengiriman extends CI_Controller 
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
            'data' => $this->Pengiriman_model->selectDistinct($box, $search),
            'dataDetail' => $this->Pengiriman_model->select($box, $search),
            'dataKat' => $this->Kategori_model->select('null', 'null'),
            'dataPengirim' => $this->Pengirim_model->select('null', 'null')
        ];
        $this->load->view('admin/pengiriman', $data);
    }

	public function store()
    {
        // Insert data
        $data = array(
            'tgl_masuk' => date("Y-m-d"),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'alamat_penerima' => $this->input->post('alamat_penerima'),
            'status' => 'Dikemas',
            'id_kategori' => $this->input->post('id_kategori'),
            'id_pengirim' => $this->input->post('id_pengirim')
        );
        
        $this->Pengiriman_model->insert($data);
        redirect('DataPengiriman/show');
    }

    public function update()
    {
        $id = $this->input->post('id_pengiriman');
        
        $date = '';
        $stat = $this->input->post('status');
        if ($stat == 'Diterima')
        { $date = date("Y-m-d"); }

        $data = [
            'tgl_keluar' => $date,
            'nama_penerima' => $this->input->post('nama_penerima'),
            'alamat_penerima' => $this->input->post('alamat_penerima'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_pengirim' => $this->input->post('id_pengirim'),
            'status' => $stat
        ];

        $this->Pengiriman_model->update($id, $data);
        if ($this->updateCost($id))
        { redirect('DataPengiriman/show'); }
    }
	
	public function destroy($id)
    {
        $this->Pengiriman_model->delete($id);
        $this->Paket_model->delByFkId($id);
		redirect('DataPengiriman/show');
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