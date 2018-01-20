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
	public function insert_detail($data)
	{
		$data=$this->security->xss_clean($data);
    $this->db->insert('tbl_perusahaandetail',$data);
    // echo "Data added";
	}
	public function getedit($id)
	{
		$data = array('tbl_perusahaan.id_perusahaan' => $id );
		$this->db->join('tbl_perusahaandetail','tbl_perusahaandetail.id_perusahaan = tbl_perusahaan.id_perusahaan');
		$query=$this->db->get_where('tbl_perusahaan',$data);
		return $query->result_array();
	}
	public function edit($id,$data)
	{
		$data=$this->security->xss_clean($data);
		$this->db->where('id_perusahaan', $id);
		$this->db->update('tbl_perusahaan', $data);
		$this->db->where('id_perusahaan', $id);
		$this->db->delete('tbl_perusahaandetail');
		$this->db->query("ALTER TABLE tbl_perusahaandetail AUTO_INCREMENT = 1");
		echo "Data edited";
	}
	public function edit_detail($id,$data)
	{
		$data=$this->security->xss_clean($data);
		// delete lalu insert ulang
    $this->db->insert('tbl_perusahaandetail',$data);
		// echo "Data edited";
	}
	public function delete($id)
	{
		$this->db->where('id_perusahaan', $id);
		$this->db->delete('tbl_perusahaan');
		$this->db->where('id_perusahaan', $id);
		$this->db->delete('tbl_perusahaandetail');
		echo "Data deleted";
	}
}

/* End of file perusahaan_m.php */
/* Location: ./application/models/perusahaan_m.php */