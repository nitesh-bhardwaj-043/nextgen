<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Transactions extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_transactions');
    }
    function index()
    {
        $this->load->view('data');
    }
    function view_data()
    {
        $where = null;
        if (isset($_GET['c_id']))
            $where['c_id'] = $_GET['c_id'];

        if (isset($_GET['data']))
            $select = $_GET['data'];
        else
            $select = "*";

        $return = $this->mdl_transactions->view_data($where, $select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
}
