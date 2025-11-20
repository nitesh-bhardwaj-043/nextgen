<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends MX_Controller
{
    function index()
    {
        if ($this->session->userdata('username'))
        {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('body');
            $this->load->view('footer');
        }
        else redirect('login');
    }

    function login_layout($data)
    {
        $this->load->view('header',$data);
        $this->load->view('body');
        $this->load->view('footer');
    }

    function app_main()
    {

        if ($this->session->userdata('username'))
        {
            //app
            $this->load->view('main/main.js');
            //controllers

            $this->load->view('login/ctrl_login.js');
            $this->load->view('dashboard/ctrl_dashboard.js');

            // $this->load->view('expenses/ctrl_expenses.js');
            // $this->load->view('complaints/ctrl_complaints.js');
            // $this->load->view('fcomplaints/ctrl_fcomplaints.js');
            // $this->load->view('ccomplaints/ctrl_ccomplaints.js');
            // $this->load->view('dealership/ctrl_dealership.js');
        }
        else redirect('login');
    }

    function pagination()
    {
        $this->load->view('dirPagination.tpl.html');
    }
    function help()
    {
        $this->load->view('help/help');
    }

}