<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Users extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_users');
    }
    function index()
    {
        $this->load->view('data');
    }
    function view_data()
    {
        $return = $this->mdl_users->view_data();
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
}
