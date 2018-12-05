<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // if($this->input->post("user")=='admin'&&$this->input->post("pass")=='admin')
        // { 
        //     $this->load->view('admin/index'); 
        // }
        $this->load->view('admin/index'); 
    }

    public function pengirim()
    {
        // Cek kolom combobox
        if($this->uri->segment(3))
        { $box=$this->uri->segment(3); }
        else
        {
            if($this->input->post("kolom"))
            { $box = $this->input->post("kolom"); }
            else
            { $box = 'null'; }
        }

        // Cek isi kotak
        if($this->uri->segment(4))
        { $search=$this->uri->segment(4); }
        else
        {
            if($this->input->post("search"))
            { $search = $this->input->post("search"); }
            else
            { $search = 'null'; }
        }

        $data = [];
        $total = $this->Pengirim_model->getTotal($box, $search);
        if ($total > 0)
        {
            $limit = 5;
            $start = $this->uri->segment(5, 0);
            $config = [
                'base_url' => base_url() . 'admin/pengirim/' . $box . '/' . $search,
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 5,

                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);

            $model='';
            if($this->input->post("tombol")=='print')
            { $model = $this->Pengirim_model->selectordername($box, $search); }
            else
            { $model = $this->Pengirim_model->list($limit, $start, $box, $search); }

            $data = [
                'data' => $model,
                'links' => $this->pagination->create_links(),
                'start' => $start,
                'box' => $box,
                'search' => $search
            ];
        }
        
        if($this->input->post("tombol")=='print')
        {
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->load_view('report/report_pengirim', $data, 'print.pdf'); 
        }
        else
        { $this->load->view('admin/pengirim', $data); }
		
    }

  

	public function login()
	{ $this->load->view('admin/login'); }
}