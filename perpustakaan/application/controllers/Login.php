<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        $this->load->model('m_login');
        $this->load->helper('url');
    }

    public function index()
    {

        $this->load->view('login/index');
    }
}
