<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_request extends CI_Model
{
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = "request";
    }
    function view_data($where = null)
    {
        $this->db->select("*");
        if ($where)
            $this->db->where($where);
        $this->db->where('status', 1);
        $this->db->order_by('trans_id', "desc");
        return $this->db->get($this->table);
    }

    // Generic view for any table (d_request, w_request, etc.)
    function view_table($table, $where = null)
    {
        $this->db->select($table . '.*' . ", users.name as user_name, users.phone as user_phone");
        $this->db->join('users', 'users.user_id=' . $table . '.user_id');
        $this->db->from($table);
        if ($where)
            $this->db->where($where);
        $this->db->order_by('req_id', 'desc');
        return $this->db->get();
    }

    function add_data($data)
    {
        $a = $this->db->insert($this->table, $data);
        return $this->db->affected_rows($a);
    }
    function update_data($where, $data)
    {
        $this->db->where($where);
        $a = $this->db->update($this->table, $data);
        return $this->db->affected_rows($a);
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a = $this->db->delete($this->table);
        return $this->db->affected_rows($a);
    }

    // Update arbitrary table
    function update_table($table, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    // Insert a transaction record
    function add_transaction($data)
    {
        return $this->db->insert('transactions', $data);
    }

    // Wallet helpers
    function get_wallet($user_id)
    {
        $q = $this->db->get_where('wallet', array('user_id' => $user_id));
        return $q->row_array();
    }

    function update_wallet($user_id, $new_amount , $new_tamount)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update('wallet', array('amount' => $new_amount , 't_amount' => $new_tamount));
    }

    function insert_wallet($user_id, $amount, $t_amount)
    {
        return $this->db->insert('wallet', array('user_id' => $user_id, 'amount' => $amount, 't_amount' => $t_amount));
    }
}
