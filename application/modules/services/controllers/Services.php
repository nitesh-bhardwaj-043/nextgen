<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends MX_Controller
{

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
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "deposit";
        echo Modules::run('template/layout2', $data);
    }
    function withdraw()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "withdraw";
        echo Modules::run('template/layout2', $data);
    }
    function dashboard()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "dashboard";
        echo Modules::run('template/layout2', $data);
    }
    function setting()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "setting";
        echo Modules::run('template/layout2', $data);
    }
    function editinfo()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "editinfo";
        echo Modules::run('template/layout2', $data);
    }
    function bank()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "bank";
        echo Modules::run('template/layout2', $data);
    }
    function changepassword()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "changepassword";
        echo Modules::run('template/layout2', $data);
    }
    function login()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "login";
        echo Modules::run('template/layout2', $data);
    }
    function register()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "register";
        echo Modules::run('template/layout2', $data);
    }
    function forgotpass(): void
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "forgotpass";
        echo Modules::run('template/layout2', $data);
    }
    // Terms and Conditions
    function tc(): void
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "tc";
        echo Modules::run('template/layout2', $data);
    }
    function refer(): void
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['module'] = "services";
        $data['view_file'] = "refer";
        echo Modules::run('template/layout2', $data);
    }
    function help(): void
    {
        $data['title'] = "";
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
}
