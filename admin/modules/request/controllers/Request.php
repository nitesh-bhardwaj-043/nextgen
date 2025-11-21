<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Request extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_request');
    }

    function index()
    {
        $this->load->view('data');
    }

    function save_data()
    {
        // print_r($_POST);
        // die();
        $this->load->library('form_validation');

        // Validation rules
        $this->form_validation->set_rules("c_name", "Name", "required|trim");
        $this->form_validation->set_rules("f_name", "Firm Name", "required|trim");
        $this->form_validation->set_rules("city", "City", "required|trim");
        $this->form_validation->set_rules("product", "Product", "required|trim");
        $this->form_validation->set_rules("qty", "Quantity", "required|trim");
        $this->form_validation->set_rules("c_no", "Complaint Number", "required|trim");
        $this->form_validation->set_rules("c_date", "Date", "required|trim");

        if ($this->form_validation->run() == TRUE) {
            $data['c_name'] = trim($_POST['c_name']);
            $data['f_name'] = trim($_POST['f_name']);
            $data['city'] = trim($_POST['city']);
            $data['product'] = trim($_POST['product']);
            $data['qty'] = trim($_POST['qty']);
            $data['c_no'] = trim($_POST['c_no']);
            $data['c_date'] = trim($_POST['c_date']);
            $data['status'] = isset($_POST['status']) ? 1 : 0;

            // Check for update or insert
            if (!empty($_POST['c_id'])) {
                $where['c_id'] = $_POST['c_id'];
                echo $this->mdl_request->update_data($where, $data);
            } else {
                echo $this->mdl_request->add_data($data);
            }
        } else {
            echo validation_errors();
        }
    }


    function view_data()
    {
        $table = isset($_GET['table']) ? $_GET['table'] : null;
        $where = null;
        if (isset($_GET['req_id']))
            $where['req_id'] = $_GET['req_id'];

        $select = isset($_GET['data']) ? $_GET['data'] : '*';

        if ($table && in_array($table, array('d_request', 'w_request'))) {
            $return = $this->mdl_request->view_table($table, $where, $select);
        } else {
            $return = $this->mdl_request->view_data($where, $select);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }

    // Approve deposit: move money into wallet and add transaction
    function approve_deposit()
    {
        $req_id = $this->input->post('req_id');
        if (!$req_id) {
            echo "Invalid request";
            return;
        }
        $row = $this->db->get_where('d_request', array('req_id' => $req_id))->row_array();
        if (!$row) {
            echo "Request not found";
            return;
        }
        if ($row['status'] != 0) {
            echo "Already processed";
            return;
        }

        $this->db->trans_begin();
        // set status = 1
        $this->mdl_request->update_table('d_request', array('req_id' => $req_id), array('status' => 1));
        // add transaction
        $this->mdl_request->add_transaction(array('user_id' => $row['user_id'], 'type' => 'deposit', 'amount' => $row['amount']));
        // update wallet
        $wallet = $this->mdl_request->get_wallet($row['user_id']);
        if ($wallet) {
            $new_amt = $wallet['amount'] + $row['amount'];
            $this->mdl_request->update_wallet($row['user_id'], $new_amt);
        } else {
            $this->mdl_request->insert_wallet($row['user_id'], $row['amount']);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo "Error processing";
        } else {
            $this->db->trans_commit();
            echo "Deposit approved";
        }
    }

    function disapprove_deposit()
    {
        $req_id = $this->input->post('req_id');
        if (!$req_id) {
            echo "Invalid request";
            return;
        }
        $row = $this->db->get_where('d_request', array('req_id' => $req_id))->row_array();
        if (!$row) {
            echo "Request not found";
            return;
        }
        if ($row['status'] != 0) {
            echo "Already processed";
            return;
        }
        $this->mdl_request->update_table('d_request', array('req_id' => $req_id), array('status' => 2));
        echo "Deposit disapproved";
    }

    // Approve withdrawal: ensure wallet has funds, subtract and add transaction
    function approve_withdraw()
    {
        $req_id = $this->input->post('req_id');
        if (!$req_id) {
            echo "Invalid request";
            return;
        }
        $row = $this->db->get_where('w_request', array('req_id' => $req_id))->row_array();
        if (!$row) {
            echo "Request not found";
            return;
        }
        if ($row['status'] != 0) {
            echo "Already processed";
            return;
        }

        $wallet = $this->mdl_request->get_wallet($row['user_id']);
        if (!$wallet || $wallet['amount'] < $row['amount']) {
            echo "Insufficient wallet balance";
            return;
        }

        $this->db->trans_begin();
        // set status = 1
        $this->mdl_request->update_table('w_request', array('req_id' => $req_id), array('status' => 1));
        // add transaction
        $this->mdl_request->add_transaction(array('user_id' => $row['user_id'], 'type' => 'withdraw', 'amount' => $row['amount']));
        // deduct wallet
        $new_amt = $wallet['amount'] - $row['amount'];
        $this->mdl_request->update_wallet($row['user_id'], $new_amt);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo "Error processing";
        } else {
            $this->db->trans_commit();
            echo "Withdrawal approved";
        }
    }

    function disapprove_withdraw()
    {
        $req_id = $this->input->post('req_id');
        if (!$req_id) {
            echo "Invalid request";
            return;
        }
        $row = $this->db->get_where('w_request', array('req_id' => $req_id))->row_array();
        if (!$row) {
            echo "Request not found";
            return;
        }
        if ($row['status'] != 0) {
            echo "Already processed";
            return;
        }
        $this->mdl_request->update_table('w_request', array('req_id' => $req_id), array('status' => 2));
        echo "Withdrawal disapproved";
    }

    function delete_data()
    {
        if (isset($_GET['c_id']) && $_GET['c_id']) {

            $where['c_id'] = $_GET['c_id'];
            echo $this->mdl_request->delete_data($where);
        } else
            echo "Not Deleted";
    }
}
