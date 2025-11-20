<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Contacts_mdl extends CI_Model
{
    private $config;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->config = array(
            'protocol' => 'smtp',
            'smtp_host' => '',
            'smtp_port' => 587,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
    }
    public function insert()
    {
        $this->load->library('email', $this->config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $msg = $this->input->post('message');
        $phn = $this->input->post('phone');
        $mfrom = $this->input->post('mfrom');
        $category = $this->input->post('category');

        $this->db->insert('contacts', array("name" => $name, "email" => $mfrom, "mfrom" => $email, "phone" => $phn, "message" => $msg, "category" => $category));
        $message = "<div style='padding:30px;background: #e6e6e6;font-size: 18px !important;'>Client's Query: <h3>$category</h3><b><q>$msg</q></b><br><br>Client's Name:  <b>$name</b><br><br>Phone Number:  <b>$phn</b><b>$mfrom</b><br><br> Email: <b> $email</b></div>";

        $this->email->to('arshadktr9@gmail.com');
        $this->email->from("$this->comp['supportmail']");
        if (@$email)
            $this->email->reply_to(@$email);
        $this->email->subject('New Contact Message Received' .$this->comp['companydomain']);
        $this->email->message($message);
        $this->email->send();

        return true;
    }


public function bookings()
{
    $this->load->library('email', $this->config);
    $this->email->set_newline("\r\n");
    $this->email->set_crlf("\r\n");

    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $phone = $this->input->post('phone');
    $mfrom = $this->input->post('mfrom');
    $mto = $this->input->post('mto');
    $msg = $this->input->post('message');

    // Insert booking data into the database
    $this->db->insert('bookings', array(
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "mfrom" => $mfrom,
        "mto" => $mto,
        "msg" => $msg
    ));

    // Admin notification email
    $msgd = "Services Needed";
    $adminMessage = "<div style='padding:30px;background:#e6e6e6;font-size: 18px !important;'>Client's Query: <b><q>$msgd</q></b><br><br>Client's Name:  <b>$name</b><br><br>From: <b>$mfrom</b><br><br>To: <b>$mto</b><br><br>Phone Number: <b><a href='tel:$phone'>$phone</a></b><br><br>Email: <b> $email</b><br><br>Client Msg: <b>$msg</b></div>";

    $this->email->to('arshadktr9@gmail.com');
    $this->email->from("$this->comp['supportmail']");
    if (@$email) {
        $this->email->reply_to(@$email);
    }
    $this->email->subject('New Booking Enquiry Received' .$this->comp['companydomain']);
    $this->email->message($adminMessage);
    $this->email->send();

    // Send reply email to the client
    $clientMessage = "<div style='padding:30px;background:#e6e6e6;font-size: 18px !important;'>Dear <b>$name</b>,<br><br>Thank you for reaching out to us regarding your booking from <b>$mfrom</b> to <b>$mto</b>. We have received your inquiry and will get back to you shortly to confirm the details.<br><br>If you have any further questions, please feel free to contact us.<br><br>Best regards,<br>.$this->comp['company3']<br><br><b>Email:</b> $this->comp['supportmail']<br><b>Phone:</b>  <a href='$this->comp['phonehtml']'>$this->comp['phone']</a></div>";

    $this->email->clear(); 
    $this->email->to($email); 
    $this->email->from("$this->comp['supportmail']", $this->comp['company3']);
    $this->email->subject('Thank You for Your Booking Inquiry!');
    $this->email->message($clientMessage);
    $this->email->send();

    return true;
}

    public function newsletter()
    {
        $email = $this->input->post('email');
        $this->db->insert('newsletter', array("email" => $email));
        return true;
    }
    public function faq()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $question = $this->input->post('question');
        $this->db->insert('faq', array("phone" => $phone,"name" => $name,"question"=> $question));
        return true;
    }
    public function contact(){
        $this->load->library('email', $this->config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $qry = $this->input->post('message');
        $this->db->insert('contacts', array("name"=>$name,"phone"=>$phone,"message"=>$qry,"email" => $email));
        $message = "<div style='padding:30px;background:#e6e6e6;font-size: 18px !important;'>Client's Query: <b><q>$qry</q></b><br><br>Client's Name:  <b>$name</b><br><br>Phone Number: <b><a href='tel:$phone'>$phone</a></b><br><br>Email: <b> $email</b></div>";
        $this->email->to('arshadktr9@gmail.com');
        $this->email->from("$this->comp['supportmail']");
        if (@$email)
            $this->email->reply_to(@$email);
        $this->email->subject('New Contacts Enquiry Received '.$this->comp['companydomain']);
        $this->email->message($message);
        $this->email->send();
        return true;
    }
}
