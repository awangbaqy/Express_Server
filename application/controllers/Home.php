<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
    { parent::__construct(); }

	public function index()
    {
        if (isset($_POST['submit']))
        { 
            $id = $this->input->post('search');
            $data['data'] = $this->Pengiriman_model->selectStatus($id);
            $this->load->view('home', $data); 
        }
        else
        { $this->load->view('home'); }
    }

    public function login()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        
        if ($user == 'admin' && $pass == 'admin')
        { 
            $this->session->set_userdata('user', 'admin');
            redirect('admin/');
        }
        else
        { redirect('home'); }
    }
}