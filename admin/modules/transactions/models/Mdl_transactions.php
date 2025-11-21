<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_transactions extends CI_Model
{
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = "transactions";
    }
    function view_data()
    {
        $this->db->select("transactions.* , users.name as user_name , users.phone as user_phone");
        $this->db->join('users','users.user_id=transactions.user_id');
        $this->db->order_by('transactions.trans_id',"desc");
        return $this->db->get( $this->table);
    }
}