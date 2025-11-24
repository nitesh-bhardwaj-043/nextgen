<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Qr extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_qr');
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
        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("upi_id", "UPI ID", "required|trim|regex_match[/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9.-]+$/]");


        if ($this->form_validation->run() == TRUE) {
            $data['name'] = trim($_POST['name']);
            $data['upi_id'] = trim($_POST['upi_id']);

            if (!empty($_FILES['image']['name'])) {
                $data['image'] = $this->image_upload($_FILES['image']['name']);
                if ($_POST['old_image']) {
                    $this->remove_image($_POST['old_image']);
                }
            } else {
                echo "Please Upload Image";
                die();
            }

            if (!empty($_POST['qr_id'])) {
                $where['qr_id'] = $_POST['qr_id'];
                echo $this->mdl_qr->update_data($where, $data);
            } else {
                echo $this->mdl_qr->add_data($data);
            }
        } else {
            echo validation_errors();
        }
    }
    function view_data()
    {
        $return = $this->mdl_qr->view_data();
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['qr_id']) && $_GET['qr_id']) {

            $worker_data = $this->mdl_qr->view_qr($_GET['qr_id']);

            if ($worker_data->result_array()[0]['image']) {
                $this->remove_image($worker_data->result_array()[0]['image']);
            }

            $where['qr_id'] = $_GET['qr_id'];
            echo $this->mdl_qr->delete_data($where);
        } else
            echo "Not Deleted";
    }
    function image_upload($title)
    {
        $folder = "qr";
        // upload coder starts here
        $config['upload_path'] = './assets/temp';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['new_image'] = "./assets/uploads/$folder/";
        $config['min_width'] = 100;

        $rand_number = mt_rand(0, 85);
        $timestamp = time();
        //             $title = str_replace(" ", "_", $title);
        $config['file_name'] = $rand_number . $timestamp;

        $config['overwrite'] = false;
        $config['remove_spaces'] = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            echo $this->upload->display_errors();
            die();
        } else {
            $image = $this->upload->data();
            if ($this->input->post('width')) {
                $config['width'] = $this->input->post('width');
            } else {
                if ($image['image_width'] > 720)
                    $config['width'] = 720;
            }
            // image manipulation resizing 1
            $config['source_image'] = './assets/temp/' . $image['file_name'];
            $config['maintain_ratio'] = TRUE;

            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);

            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
                die();
            }

            $this->image_lib->clear();
            // image manipulation resizing 2
            $config['source_image'] = './assets/temp/' . $image['file_name'];
            $config['new_image'] = "./assets/uploads/$folder/thumb/";
            $config['file_name'] = $rand_number . $timestamp;
            $config['maintain_ratio'] = TRUE;
            if ($image['image_width'] > 100) {
                $config['width'] = 100;
            }
            $config['overwrite'] = FALSE;
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
                die();
            } else {
                unlink($config['source_image']);
                return $image['file_name'];
            }
        }
    }
    function remove_image($title)
    {
        if (substr($title, 0, 4) != "http") {
            $path1 = "./assets/uploads/qr/" . $title;
            unlink($path1);
            $path2 = "./assets/uploads/qr/thumb/" . $title;
            unlink($path2);
        }
    }
}
