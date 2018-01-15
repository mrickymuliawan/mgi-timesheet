<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perusahaan_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getall(){
		$query=$this->db->query("select * from tbl_perusahaan");
		return $query->result_array();
	}


	public function insert($data)
	{
		$data=$this->security->xss_clean($data);
    $this->db->insert('tbl_perusahaan',$data);
    echo "Data added";
	}
	public function getedit($id)
	{
		$data = array('id_perusahaan' => $id );
		$query=$this->db->get_where('tbl_perusahaan',$data);
		return $query->row_array();
	}
	public function edit($id,$data)
	{
		$data=$this->security->xss_clean($data);
		$this->db->where('id_perusahaan', $id);
		$this->db->update('tbl_perusahaan', $data);
		echo "Data edited";
	}
	public function delete($id)
	{
		$this->db->where('id_perusahaan', $id);
		$this->db->delete('tbl_perusahaan');
		echo "Data deleted";
	}
}

/* End of file perusahaan_m.php */
/* Location: ./application/models/perusahaan_m.php */