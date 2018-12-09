<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    { parent::__construct(); }

    public function index()
    { $this->load->view('admin/index'); }

    public function login()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        
        if ($user == 'admin' && $pass == 'admin')
        { redirect('admin/');
        }
        else
        { redirect('home'); }
    }	
}