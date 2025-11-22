<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_services extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
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
