<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function specific_record_counts($table,$constraint_array,$date_col,$from_date,$to_date)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($constraint_array);
		$this->db->where($date_col.'>=',$from_date.'  00:00:00');
		$this->db->where($date_col.'<=',$to_date.'  23:59:59');
		$num_results = $this->db->count_all_results();
		return $num_results;
	}
	public function amount_sum($table,$constraint_array,$date_col,$from_date,$to_date,$field)
	{
		$this->db->select('SUM('.$field.') AS total', FALSE);
		$this->db->where($constraint_array);
		$this->db->where($date_col.'>=',$from_date.'  00:00:00');
		$this->db->where($date_col.'<=',$to_date.'  23:59:59');
		$qwer = $this->db->get($table)->row_array();
		return $qwer['total'];
	}
	public function customer_counts($from_date,$to_date)
	{
		$this->db->select('*');
		$this->db->from('users as u');
		$this->db->join('users_groups as ug','ug.user_id=u.id','inner');
		$this->db->where('ug.group_id','3');
		$this->db->where('u.created_on >=',strtotime($from_date));
		$this->db->where('u.created_on <=',strtotime($to_date));
		$num_results = $this->db->count_all_results();
		return $num_results;
	}
	public function areawise_sales($store,$date_col,$from_date,$to_date)
	{
		$this->db->select('m.mov_pincode,m.mov_placeName,SUM(o.od_grandTotal) AS total', FALSE);
		$this->db->from('pzo_orders as o');
		$this->db->join('pz_store_mov as m','o.mov_id=m.mov_id','inner');
		$this->db->where('o.st_storeID',$store);
		$this->db->where('o.'.$date_col.'>=',$from_date.'  00:00:00');
		$this->db->where('o.'.$date_col.'<=',$to_date.'  23:59:59');
		$this->db->group_by('o.mov_id');
		$results= $this->db->get()->result_array();
		return $results;
	}

	public function get_CheckhappyOffersAvailableORNot($store,$date_col,$from_date,$to_date)
	{
		$this->db->select('m.mov_pincode,m.mov_placeName,SUM(o.od_grandTotal) AS total', FALSE);
		$this->db->from('pzo_orders as o');
		$this->db->join('pz_store_mov as m','o.mov_id=m.mov_id','inner');
		$this->db->where('o.st_storeID',$store);
		$this->db->where('o.'.$date_col.'>=',$from_date.'  00:00:00');
		$this->db->where('o.'.$date_col.'<=',$to_date.'  23:59:59');
		$this->db->group_by('o.mov_id');
		$results= $this->db->get()->result_array();
		return $results;
	}
	

}