<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getuser(){
		$query=$this->db->query("select * from tbl_user where role='user' or role='supervisor'");
		return $query->result_array();
	}
	public function getadmin(){
		$query=$this->db->query("select * from tbl_user where role='administrator'");
		return $query->result_array();
	}

	public function addjamcuti($jumlahjam,$operasi)
	{
    $this->db->query("update tbl_user set saldo_cuti=saldo_cuti $operasi $jumlahjam where status='aktif'");
    echo "Data updated";
	}
	public function insert($data)
	{
		$data=$this->security->xss_clean($data);
    $this->db->insert('tbl_user',$data);
    echo "Data updated";
	}
	public function getedit($id)
	{
		$data = array('npwp' => $id );
		$query=$this->db->get_where('tbl_user',$data);
		return $query->row_array();
	}
	public function edit($id,$data)
	{
		$data=$this->security->xss_clean($data);
		$this->db->where('npwp', $id);
		$this->db->update('tbl_user', $data);
		echo "Data updated";
	}
	public function delete($id)
	{
		$this->db->where('npwp', $id);
		$this->db->delete('tbl_user');
		echo "Data updated";
	}
	public function resetpass($id,$data)
	{
		$data=$this->security->xss_clean($data);
		$this->db->where('npwp', $id);
		$this->db->update('tbl_user', $data);
		echo "Data updated";
	}
}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */