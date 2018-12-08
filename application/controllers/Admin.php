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
        //if($this->session->user=="admin")
        //{
            $this->load->view('admin/index'); 
        //} 
    }


    

	
}