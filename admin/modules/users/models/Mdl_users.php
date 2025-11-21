<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_users extends CI_Model
{
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }
    function view_data()
    {
        $this->db->select("users.* , wallet.amount as amount , bank_details.upi_id as upi_id");
        $this->db->join('wallet','wallet.user_id=users.user_id');
        $this->db->join('bank_details','bank_details.user_id=users.user_id');
        $this->db->order_by('users.user_id',"desc");
        return $this->db->get( $this->table);
    }  
}