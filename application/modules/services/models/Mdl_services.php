<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_services extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function dashboard()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) return null;

        // wallet amounts
        $wallet = $this->db->get_where('wallet', array('user_id' => $user_id))->row_array();
        $amount = isset($wallet['amount']) ? $wallet['amount'] : 0;
        $t_amount = isset($wallet['t_amount']) ? $wallet['t_amount'] : 0;

        // sum of deposits (d_request)
        $this->db->select('COALESCE(SUM(amount),0) as d_amount', false);
        $this->db->from('d_request');
        $this->db->where('user_id', $user_id);
        $d_row = $this->db->get()->row_array();
        $d_amount = isset($d_row['d_amount']) ? $d_row['d_amount'] : 0;

        // sum of withdrawals (w_request)
        $this->db->select('COALESCE(SUM(amount),0) as w_amount', false);
        $this->db->from('w_request');
        $this->db->where('user_id', $user_id);
        $w_row = $this->db->get()->row_array();
        $w_amount = isset($w_row['w_amount']) ? $w_row['w_amount'] : 0;

        return array(
            'amount' => $amount,
            't_amount' => $t_amount,
            'd_amount' => $d_amount,
            'w_amount' => $w_amount
        );
    }
    public function user(){
        $user_id = $this->session->userdata('user_id');

        $this->db->select("name,phone,email");
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row_array();
    }
    public function loginform()
    {
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');

        $user = $this->db->where('phone', $phone)->get('users')->row();

        if (!$user) {
            return 2;
        }

        if ($user->password == $password) {
            $this->session->set_userdata('phone', $phone);
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $user->user_id);
            return 1;
        } else {
            return 3;
        }
    }
    public function registerform()
    {
        $name      = $this->input->post('name');
        $phone     = $this->input->post('phone');
        $email     = $this->input->post('email');
        $password  = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');

        if ($password !== $cpassword) {
            return 3;
        }

        // 2. Check if user already exists (phone OR email)
        $exists = $this->db->where('phone', $phone)
            ->or_where('email', $email)
            ->get('users')
            ->num_rows();

        if ($exists > 0) {
            return 2; // User already exists
        }

        // 3. Create user
        $data = [
            'name'     => $name,
            'phone'    => $phone,
            'email'    => $email,
            'password' => $password
        ];

        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();

        // 4. Create wallet entry for the new user
        $this->db->insert('wallet', [
            'user_id' => $user_id
        ]);

        // 5. Create bank_details entry with empty defaults
        $this->db->insert('bank_details', [
            'user_id' => $user_id,
        ]);

        return 1; // Successfully registered
    }
}
