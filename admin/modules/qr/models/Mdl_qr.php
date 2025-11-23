<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_qr extends CI_Model
{
    private $table;
    function __construct()
    {
        parent::__construct();
        $this->table = "qr";
    }
    function view_data()
    {
        $this->db->select("*");
        $this->db->order_by('qr_id', "desc");
        return $this->db->get($this->table);
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
    function view_qr($qr_id)
    {
        $this->db->where('qr_id', $qr_id);
        return $this->db->get($this->table);
    }
}
