<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Mdl_services extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function referral_code()
    {
        $user_id = $this->session->userdata('user_id');

        $this->db->select('referral_code');
        $this->db->where('user_id', $user_id);

        $row = $this->db->get('users')->row();

        return $row ? $row->referral_code : null;
    }
    public function referrals(){
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            return [];
        }

        // Use 'referral' table; change to 'referrals' if your DB uses that name
        $this->db->select('r.ref_id, r.ref_by, r.ref_to, r.created_at, u.name as name, u.phone as phone');
        $this->db->from('referral r');
        $this->db->join('users u', 'u.user_id = r.ref_to', 'left');
        $this->db->where('r.ref_by', $user_id);
        $this->db->order_by('r.created_at', 'desc');
        return $this->db->get()->result_array();
    }
    public function transactions()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('trans_id', 'desc');
        return $this->db->get('transactions')->result_array();
    }
    public function bank()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        return $this->db->get('bank_details')->row_array();
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
        $this->db->where('status', 0);
        $d_row = $this->db->get()->row_array();
        $d_amount = isset($d_row['d_amount']) ? $d_row['d_amount'] : 0;

        // sum of withdrawals (w_request)
        $this->db->select('COALESCE(SUM(amount),0) as w_amount', false);
        $this->db->from('w_request');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 0);
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
    public function depositform()
    {
        $utr = $this->input->post('utr');
        $image = $this->input->post('image');
        $amount = $this->input->post('amount');
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) return "Not logged in";
        if (!$utr) return "UTR is required";
        if (!$amount || !is_numeric($amount) || $amount <= 0) return "Invalid amount";

        $data = [
            'user_id' => $user_id,
            'amount' => $amount,
            'utr' => $utr,
            'image' => $image,
            'status' => 0
        ];

        $this->db->insert('d_request', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return "Failed to submit deposit request";
        }
    }

    public function withdrawform()
    {
        $amount = $this->input->post('amount');
        $password = $this->input->post('password');
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) return 'Not logged in';
        if (!$amount || !is_numeric($amount) || $amount <= 0) return 'Invalid amount';
        if (!$password) return 'Password required';

        $user = $this->db->where('user_id', $user_id)->get('users')->row_array();
        if (!$user) return 'User not found';

        // verify password (users.password is hashed)
        if (!password_verify($password, $user['password'])) return 'Incorrect password';

        // optional: check wallet balance
        $wallet = $this->db->where('user_id', $user_id)->get('wallet')->row_array();
        $balance = isset($wallet['t_amount']) ? (float)$wallet['t_amount'] : 0;
        if ($balance < $amount) return 'Insufficient balance';

        // insert withdraw request with status 0
        $data = [
            'user_id' => $user_id,
            'amount' => $amount,
            'status' => 0
        ];
        $this->db->insert('w_request', $data);
        if ($this->db->affected_rows() > 0) return 1;
        return 'Failed to submit withdraw request';
    }

    public function registerform()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');
        $ref_code = $this->input->post('ref_code'); // optional

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

        // HASH PASSWORD
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Generate referral code
        $firstName = explode(" ", trim($name))[0];
        $referral_code = strtoupper($firstName) . '_' . date("dHis");

        // Ensure unique referral code
        while ($this->db->where('referral_code', $referral_code)->get('users')->num_rows() > 0) {
            $referral_code = strtoupper($firstName) . '_' . date("dHis") . rand(100, 999);
        }

        // Prepare user data
        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $hashed_password,
            'referral_code' => $referral_code
        ];

        // Insert user
        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();

        // Create wallet
        $this->db->insert('wallet', ['user_id' => $user_id]);

        // Create bank details
        $this->db->insert('bank_details', ['user_id' => $user_id]);

        // ❗ Handle referral code logic
        if (!empty($ref_code)) {

            // Check if referral code exists
            $referrer = $this->db->where('referral_code', $ref_code)->get('users')->row();

            if (!$referrer) {
                return 4; // ❌ Invalid referral code
            }

            // Insert referral mapping
            $this->db->insert('referral', [
                'ref_by' => $referrer->user_id,  // existing user (referrer)
                'ref_to' => $user_id       // new user (referred)
            ]);
        }

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
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('users')->row();  // Return the user row if found, else false
    }
    public function get_user_by_id($user_id)
    {
        return $this->db->where('user_id', $user_id)->get('users')->row();  // Adjust the table name to match your database
    }
    // In your Mdl_services model
    public function get_bank_details_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('bank_details');
        return $query->row();  // Returns a single row or null if no data found
    }


    // Update user password
    public function update_password($email, $password)
    {
        $data = ['password' => $password];
        $this->db->where('email', $email);
        return $this->db->update('users', $data);
    }

    public function update_user_details($data)
    {
        $user_id = $data['user_id'];

        // Check if the user already has bank details
        $existing_details = $this->db->where('user_id', $user_id)->get('bank_details')->row();

        if ($existing_details) {
            // If details exist, update them
            $this->db->where('user_id', $user_id);
            return $this->db->update('bank_details', $data);
        } else {
            // If no details exist, insert them
            return $this->db->insert('bank_details', $data);
        }
    }
}
