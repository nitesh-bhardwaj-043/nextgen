<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
        if (!$user_id)
            return null;

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
    public function user()
    {
        $user_id = $this->session->userdata('user_id');

        $this->db->select("name,phone,email");
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row_array();
    }

    public function loginform()
    {
        $login_input = $this->input->post('phone'); // phone or email
        $password = $this->input->post('password');

        // Check user by phone OR email
        $user = $this->db
            ->where('phone', $login_input)
            ->or_where('email', $login_input)
            ->get('users')
            ->row();

        if (!$user) {
            return 2; // user not found
        }

        // Verify hashed password
        if (password_verify($password, $user->password)) {

            // set session
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $user->user_id);
            $this->session->set_userdata('phone', $user->phone);
            $this->session->set_userdata('email', $user->email);

            return 1; // success
        } else {
            return 3; // incorrect password
        }
    }

    public function registerform()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');

        if ($password !== $cpassword) {
            return 3;
        }

        // Check if exists
        $exists = $this->db
            ->where('phone', $phone)
            ->or_where('email', $email)
            ->get('users')
            ->num_rows();

        if ($exists > 0) {
            return 2;
        }

        // HASH THE PASSWORD
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $hashed_password
        ];

        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();

        // Create wallet
        $this->db->insert('wallet', ['user_id' => $user_id]);
        // Create bank details
        $this->db->insert('bank_details', ['user_id' => $user_id]);
        return 1;
    }

    // Change Password
    public function change_password()
    {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            return 0; // not logged in
        }

        $current = $this->input->post('current');
        $new = $this->input->post('new');

        // Fetch user
        $user = $this->db->where('user_id', $user_id)->get('users')->row();

        if (!$user) {
            return 0;
        }

        // Check current password
        if (!password_verify($current, $user->password)) {
            return 2; // incorrect current password
        }

        // Hash new password
        $hashed = password_hash($new, PASSWORD_DEFAULT);

        // Update DB
        $this->db->where('user_id', $user_id)->update('users', [
            'password' => $hashed
        ]);

        return 1; // success
    }

}
