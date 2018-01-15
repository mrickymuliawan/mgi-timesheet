<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class job_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function getdikerjakan($bulan,$tahun){
		$query=$this->db->get_where('tbl_job',array('status' => 'dikerjakan','month(tanggal_mulai)'=>$bulan,'year(tanggal_mulai)'=>$tahun));
		return $query->result_array();
	}
	public function getselesai($bulan,$tahun){
		$query=$this->db->get_where('tbl_job',array('status' => 'selesai','month(tanggal_mulai)'=>$bulan,'year(tanggal_mulai)'=>$tahun));
		return $query->result_array();
	}

	public function insert($data)
	{
		$data=$this->security->xss_clean($data);
    $this->db->insert('tbl_job',$data);
    echo "Data added";
	}
	public function getedit($id)
	{
		$idjob=$id;
		$query=$this->db->query("select * from tbl_job job inner join tbl_perusahaan per on job.id_perusahaan=per.id_perusahaan where id_job=$idjob");
		return $query->row_array();
	}
	public function edit($id,$data)
	{
		$data=$this->security->xss_clean($data);
		$this->db->where('id_job', $id);
		$this->db->update('tbl_job', $data);
		echo "Data edited";
	}
	public function delete($id)
	{
		$this->db->where('id_job', $id);
		$this->db->delete('tbl_job');
		echo "Data deleted";
	}
}

/* End of file job_m.php */
/* Location: ./application/models/job_m.php */