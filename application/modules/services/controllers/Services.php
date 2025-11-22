<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Services extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries, helpers, and models
        $this->load->library(['form_validation', 'email', 'session']);
        $this->load->model('mdl_services');
    }

    function homeRelocation()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "home_relocation";
        echo Modules::run('template/layout2', $data);
    }

    function office()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "office";
        echo Modules::run('template/layout2', $data);
    }

    function car()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "car";
        echo Modules::run('template/layout2', $data);
    }

    function courier()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "courier";
        echo Modules::run('template/layout2', $data);
    }

    function luggage()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "luggage";
        echo Modules::run('template/layout2', $data);
    }

    function insurance()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "insurance";
        echo Modules::run('template/layout2', $data);
    }
    function deposit()
    {
        if (!$this->session->userdata('user_id'))
            redirect("login");
        $data['title'] = "Deposit";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "deposit";
        echo Modules::run('template/layout2', $data);
    }
    function withdraw()
    {
        if (!$this->session->userdata('user_id'))
            redirect("login");
        $data['title'] = "Withdraw";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "withdraw";
        echo Modules::run('template/layout2', $data);
    }
    function dashboard()
    {
        if (!$this->session->userdata('user_id'))
            redirect("login");

        $this->load->model('mdl_services');
        $data['dashboard'] = $this->mdl_services->dashboard();
        $data['user'] = $this->mdl_services->user();

        $data['title'] = "Dashboard";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "dashboard";
        echo Modules::run('template/layout2', $data);
    }
    function setting()
    {
        if (!$this->session->userdata('user_id'))
            redirect("login");
        $data['title'] = "Setting";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "setting";
        echo Modules::run('template/layout2', $data);
    }
    function editinfo()
    {
        if (!$this->session->userdata('user_id'))
            redirect("login");
        $data['title'] = "Edit Info";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "editinfo";
        echo Modules::run('template/layout2', $data);
    }
    function bank()
    {
        if (!$this->session->userdata('user_id'))
            redirect("login");
        // Load the model
        $this->load->model('Mdl_services');

        // Fetch bank details from the 'bank_details' table
        $user_bank_details = $this->Mdl_services->get_bank_details_by_user_id($this->session->userdata('user_id'));

        // Pass user bank details to the view
        $data['user_bank_details'] = $user_bank_details;

        $data['title'] = "Bank Details";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "bank";
        echo Modules::run('template/layout2', $data);
    }
    function changepassword()
    {
        if (!$this->session->userdata('user_id'))
            redirect("login");
        $data['title'] = "";
        $data['description'] = "Change Password";
        $data['module'] = "services";
        $data['view_file'] = "changepassword";
        echo Modules::run('template/layout2', $data);
    }
    function login()
    {
        $data['title'] = "Login";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "login";
        echo Modules::run('template/layout2', $data);
    }
    function register()
    {
        $data['title'] = "Register";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "register";
        echo Modules::run('template/layout2', $data);
    }
    function forgotpass(): void
    {
        $data['title'] = "Forgot Password";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "forgotpass";
        echo Modules::run('template/layout2', $data);
    }
    // Terms and Conditions
    function tc(): void
    {
        $data['title'] = "Terms & Conditions";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "tc";
        echo Modules::run('template/layout2', $data);
    }
    function refer(): void
    {
        $data['title'] = "Referral";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "refer";
        echo Modules::run('template/layout2', $data);
    }
    function help(): void
    {
        $data['title'] = "Help";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "help";
        echo Modules::run('template/layout2', $data);
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    function loginform()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone', 'Phone number', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->load->model('mdl_services');
            $check = $this->mdl_services->loginform();
            echo $check;
        } else {
            $errors = validation_errors('<li>', '</li>');
            echo "<div class='alert alert-danger validation-error'>
                    <strong><i class='fa fa-exclamation-circle'></i> Please correct the following:</strong>
                    <ul class='mt-2 mb-0'>
                        {$errors}
                    </ul>
                  </div>";
        }
    }
    public function registerform()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim');

        if ($this->form_validation->run() == true) {

            $this->load->model('mdl_services');
            $result = $this->mdl_services->registerform();

            echo $result;
            // 1 = success
            // 2 = user exists
            // 3 = password mismatch

        } else {

            $errors = validation_errors('<li>', '</li>');
            echo "<div class='alert alert-danger validation-error'>
                <strong><i class='fa fa-exclamation-circle'></i> Please correct the following:</strong>
                <ul class='mt-2 mb-0'>{$errors}</ul>
              </div>";
        }
    }

    public function change_password()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('current', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new', 'New Password', 'required|trim');

        if ($this->form_validation->run() == true) {

            $this->load->model('mdl_services');
            $result = $this->mdl_services->change_password();

            echo $result;
            // 1 = success
            // 2 = incorrect current password
            // 0 = error/not logged in

        } else {

            $errors = validation_errors('<li>', '</li>');
            echo "
        <div class='alert alert-danger validation-error'>
            <strong><i class='fa fa-exclamation-circle'></i> Fix the following:</strong>
            <ul class='mt-2 mb-0'>{$errors}</ul>
        </div>";
        }
    }

    public function send_otp()
    {
        $email = $this->input->post('email');

        // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Check if email exists in the database
            $user = $this->mdl_services->get_user_by_email($email);
            if ($user) {
                // Generate OTP
                $otp = rand(100000, 999999);
                $this->session->set_userdata('otp', $otp);
                $this->session->set_userdata('otp_email', $email);

                // Send OTP to the email
                $this->_send_otp_email($email, $otp);

                // Return success response
                echo json_encode(['status' => 'success', 'message' => 'OTP sent to your email.']);
            } else {
                // Email not found
                echo json_encode(['status' => 'error', 'message' => 'Email not found']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        }
    }

    public function verify_otp()
    {
        $otp = $this->input->post('otp');
        $stored_otp = $this->session->userdata('otp');

        if ($otp == $stored_otp) {
            // OTP verified successfully
            echo json_encode(['status' => 'success', 'message' => 'OTP verified successfully.']);
        } else {
            // OTP incorrect
            echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
        }
    }

    // Step 3: Reset Password
    public function reset_password()
    {
        $new_password = $this->input->post('password');
        $email = $this->session->userdata('otp_email');

        if ($new_password) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update the password in the database
            $result = $this->mdl_services->update_password($email, $hashed_password);

            if ($result) {
                // Successfully updated password
                echo json_encode(['status' => 'success', 'message' => 'Password reset successfully.']);
            } else {
                // Error in updating password
                echo json_encode(['status' => 'error', 'message' => 'Error resetting password.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Password cannot be empty.']);
        }
    }

    // Helper function to send OTP email
    private function _send_otp_email($email, $otp)
    {
        // Email configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.hostinger.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@techelevatr.in',
            'smtp_pass' => 'tech@Website69',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        );

        $this->email->initialize($config);
        $this->email->from('info@techelevatr.in', 'NextGenHybrid');
        $this->email->to($email);
        $this->email->subject('Password Reset OTP');

        // Email message
        $message = "
    <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    color: #333;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .email-wrapper {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    border-radius: 8px;
                    overflow: hidden;
                    border: 1px solid #ddd;
                }
                .email-header {
                    background-color: #1e90ff;
                    padding: 20px;
                    text-align: center;
                    color: #fff;
                }
                .email-header img {
                    width: 150px;
                    margin-bottom: 10px;
                }
                .email-body {
                    padding: 20px;
                    font-size: 16px;
                }
                .otp {
                    font-size: 24px;
                    font-weight: bold;
                    color: #1e90ff;
                    background-color: #f1f1f1;
                    padding: 10px;
                    border-radius: 5px;
                    display: inline-block;
                }
                .footer {
                    text-align: center;
                    font-size: 12px;
                    color: #999;
                    padding: 20px;
                }
                .footer a {
                    color: #1e90ff;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <div class='email-wrapper'>
                <div class='email-header'>
                    <img src='https://techelevatr.in/nextgen/assets/images/logo_final.png' alt='NextGenHybrid Logo'>
                    <h1>NextGenHybrid</h1>
                    <p>Your Trusted Investment Partner</p>
                </div>
                <div class='email-body'>
                    <p>Hello,</p>
                    <p>We received a request to reset your password. Please use the OTP below to proceed with resetting your password:</p>
                    <p class='otp'>{$otp}</p>
                    <p>If you did not request a password reset, please ignore this email. Your account is safe.</p>
                    <p>Thank you for choosing <strong>NextGenHybrid</strong>. We are committed to providing you with the best investment opportunities, offering 1% daily profit!</p>
                </div>
                <div class='footer'>
                    <p>&copy; 2025 NextGenHybrid. All rights reserved.</p>
                    <p>If you have any questions, please <a href='mailto:support@nextgenhybrid.com'>contact us</a>.</p>
                </div>
            </div>
        </body>
    </html>";

        $this->email->message($message);
        $this->email->send();
    }




    public function update()
    {
        $user_id = $this->session->userdata('user_id');
        $password = $this->input->post('password');  // Get the password from the form data

        // Check if user is logged in
        if (!$user_id) {
            redirect('login');
            return;
        }

        // Check if password is correct
        $this->load->model('Mdl_services');

        $user_data = $this->Mdl_services->get_user_by_id($user_id);

        // Assuming the password is hashed and stored in the 'password' column
        if (!password_verify($password, $user_data->password)) {
            // If password doesn't match, return error
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password.']);
            return;
        }

        $payment_method = $this->input->post('payment-method');
        // Validate form based on the selected payment method
        if ($payment_method === 'bank') {
            $this->form_validation->set_rules('holder_name', 'Account Holder Name', 'required');
            $this->form_validation->set_rules('acc_no', 'Account Number', 'required');
            $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
            $this->form_validation->set_rules('confirm_acc_no', 'Confirm Account Number', 'required|matches[acc_no]');
        } elseif ($payment_method === 'upi') {
            $this->form_validation->set_rules('upi_id', 'UPI ID', 'required');
        }

        if ($this->form_validation->run() === TRUE) {
            // Prepare data to save
            $data = [
                'user_id' => $user_id,
            ];

            if ($payment_method === 'bank') {
                $data['holder_name'] = $this->input->post('holder_name');
                $data['acc_no'] = $this->input->post('acc_no');
                $data['ifsc_code'] = $this->input->post('ifsc_code');
                $data['bank_name'] = $this->input->post('bank_name');
                $data['upi_id'] = NULL;
            } else {
                $data['upi_id'] = $this->input->post('upi_id');
                $data['holder_name'] = NULL;
                $data['acc_no'] = NULL;
                $data['ifsc_code'] = NULL;
                $data['bank_name'] = NULL;
            }

            // Call the model to update or insert the details
            $result = $this->Mdl_services->update_user_details($data);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Bank details updated successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update details.']);
            }
        } else {
            // Return validation errors
            $errors = validation_errors('<li>', '</li>');
            echo json_encode(['status' => 'error', 'message' => "<ul>{$errors}</ul>"]);
        }
    }


}
