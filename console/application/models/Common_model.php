<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * [record_counts description]
	 * @param  [type] $user_id [users id]
	 * @return [INT]   user's id [description]
	 * @author Ganesh Ananthan
	 */

	function reportShow($path)
	{
		//error_reporting(0);

		include_once('phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
		include_once("phpjasperxml_0.9d/class/PHPJasperXML.inc.php");

		
//include_once ('phpjasperxml_0.9d/setting.php');

		$server="localhost";
		$db="phpjasperxml";
		$user="root";
		$pass="";

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("parameter1"=>1);
		$PHPJasperXML->load_xml_file($path);

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


	}

	function drop_down_status()
	{
		return array('1' => 'Active', '0' => 'In-active');
	}

	function drop_down_CWI()
	{
		return array('1' => 'AWS', '0' => 'CSWIP');
	}

	function drop_down_Staff()
	{
		return array('1' => 'Active', '0' => 'Idel');
	}
	
	public function record_counts($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function specific_record_counts($table,$constraint_array)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($constraint_array);
		$num_results = $this->db->count_all_results();
		return $num_results;
	}

	public function specific_row_value($table,$constraint_array='',$get_field)
	{
		$this->db->select($get_field);
		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);	
		}
		$result= $this->db->get()->row_array();
		return $result[$get_field];
	}
	public function records_all($table,$constraint_array='')
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);	
		}
		$results= $this->db->get()->result();
		return $results;
	}
	public function specific_fields_records_all($table,$constraint_array='',$get_field_array='')
	{
		if(!empty($constraint_array))
		{
			$this->db->select($get_field_array);
		}
		else
		{
			$this->db->select('*');
		}
		$this->db->from($table);
		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);	
		}
		$results= $this->db->get()->result_array();
		return $results;
	}
	public function common_insert($table,$data)
	{
	    $this->db->insert($table, $data);
		$result = $this->db->insert_id();
		return $result;
	}
	function common_edit($table,$data,$where_array)
	{
		$this->db->update($table , $data , $where_array);
		$result = $this->db->affected_rows();
		return $result;	
	}
	function common_edit1($table,$data,$where_array)
	{
		$result = $this->db->update($table , $data , $where_array);
		return $result;	
	}

	
// JOIN query
	public function join_records_all($fields, $table, $joinArr, $constraint_array = '', $groupBy = '', $orderby = '', $limit='', $resultType='' )
	{

		$this->db->select(implode(',', $fields), FALSE);
		$this->db->from($table);

		foreach ($joinArr as $tableName => $condition) 
		{
			$this->db->join($tableName, $condition, 'left');
		}

		if (!empty($constraint_array))
		{
			$this->db->where($constraint_array);
		}

		if($groupBy != '')
		{
			$this->db->group_by($groupBy);
		}

		if(!empty($orderby))
		{
			$this->db->order_by($orderby);	
		}

		if($limit != '')
		{
			$this->db->limit($limit);	
		}

		if($resultType == 'object')
		{
			$results= $this->db->get();
			
		}
		if($resultType == 'array')
		{
			$results= $this->db->get()->result_array();
			
		}
		else
		{
			$results= $this->db->get();
		}

		return $results;
	}

	public function join_records_counts($fields, $table, $joinArr, $constraint_array = '', $groupBy = '', $orderby = '')
	{

		$this->db->select(implode(',', $fields), FALSE);
		$this->db->from($table);

		foreach ($joinArr as $tableName => $condition) 
		{
			$this->db->join($tableName, $condition, 'left');
		}

		if (!empty($constraint_array))
		{
			$this->db->where($constraint_array);
		}

		if($groupBy != '')
		{
			$this->db->group_by($groupBy);
		}

		if(!empty($orderby))
		{
			$this->db->order_by($orderby);	
		}

		$num_results = $this->db->count_all_results();

		return $num_results;
	}

	//  Dropdown Menu Simple
	/**
		* @param $get_field 		-	mention only two params like KEY & VALUE
									- 	If you want CONCAT two or more fields in the Key OR Value section. use like that
									- 	array( CONCAT(user_firstname, '.', user_surname) AS Key, fieldName as Value)
	*/
	public function Dropdown($table, $get_field, $joinArr='', $constraint_array='', $groupBy='', $orderby='', $limit='', $optionType='')
	{
		$this->db->select($get_field);
		$this->db->from($table);

		if(!empty($joinArr))
		{
			foreach ($joinArr as $tableName => $condition) 
			{
				$this->db->join($tableName, $condition, 'left');
			}
		}
		

		if(!empty($constraint_array))
		{
			$this->db->where($constraint_array);	
		}

		if($groupBy != '')
		{
			$this->db->group_by($groupBy);
		}

		if(!empty($orderby))
		{
			$this->db->order_by($orderby);	
		}

		if($limit != '')
		{
			$this->db->limit($limit);	
		}

		$results	= $this->db->get()->result();
		$options	= array();

		if($optionType == '')
		{
			$options[''] = lang("label_Select");
		}

		foreach($results as $item)
		{
			$options[$item->Key] = $item->Value;
		}
	    return $options;
	}




	public function common_edit_generatenumbers($table,$where_array)
	{

		$this->db->set('sequence_no', 'sequence_no+1', FALSE);
		$this->db->where($where_array);
		$this->db->update($table);
		return TRUE;

	}
	
	public function common_delete($table,$where_array)
	{
	   return $this->db->delete($table, $where_array);
	}
	function in_array_rec($needle, $haystack, $strict = false) {
	    foreach ($haystack as $item) {
	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_rec($needle, $item, $strict))) {
	            return true;
	        }
	    }
	    return 0;
	}

	public function common_table_last_updated($table,$pm_key,$date_column)
	{
		$this->db->select($date_column);
		$this->db->from($table);
		$this->db->order_by($pm_key,'desc');
		$this->db->limit('1');
		$result= $this->db->get()->row_array();
		return $this->time_elapsed_string($result[$date_column]);
	}

	public function time_elapsed_string($datetime, $full = false)
	{
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	function clean_url($string)
    {
        $url=strtolower($string);
        $url=str_replace(array("'",'"'), '', $url);
        $url=str_replace(array(' ','+', '!', '&','-','/','.'), '-', $url);
        $url=str_replace("?", "", $url);
        $url=str_replace("---", "-", $url);
        $url=str_replace("--", "-", $url);
        return $url;
    }

    function get_fulldata($table,$constraint_array)
	{
		$query = $this->db->get_where($table,$constraint_array,1);
		return $query;
	}

	function get_fulldataAll($table,$constraint_array)
	{
		$query = $this->db->get_where($table,$constraint_array);
		return $query;

	}


	function get_fulldatafrontcolum($table,$constraint_array,$coumn)
	{
		$this->db->select($coumn);
		$this->db->where($constraint_array);
		$this->db->order_by($orderby_array);
		$query=$this->db->get($table);
		return $query;
	}

	function getpageRole($userID)
	{
		$item = array();
		$selectQuery = $this->db->query("select GROUP_CONCAT(group_id) as group_id from user_admin_group WHERE user_id = '".$userID."'");
		foreach($selectQuery->result_array() as $item1)
		{
			$item = $item1;
		}

		return (!empty($item)) ? array_unique($item): 1;

	}
	function getpagePermission($userID)
	{
		$data = array();
		$page_role = $this->session->userdata('pagerole');

		if(isset($page_role) && $page_role[$userID]){
			$roleValue = $page_role[$userID];
		}else{
			$roleValue = $this->getpageRole($userID);
		}

		$selectQuery = $this->db->query("select DISTINCT(mm.menu_name) as menu_name, mm.menu_id from jr_menu_module as mm, user_group_module as gm where mm.menu_id=gm.module_id AND mm.menu_status=1 AND group_id IN (SELECT group_id as groupname FROM `user_admin_group` as a WHERE group_id = '".implode(',', $roleValue)."')");

		foreach($selectQuery->result_array() as $item1)
		{
			$menuName = trim(strtolower($item1['menu_name']));
			$data[$menuName] = trim(strtolower($item1['menu_name']));
		}
		return $data;
	}

	function getISUserPermission($premlink, $userID)
	{
		$permissinValue = array();
		$page_permissinon = $this->session->userdata('pagepermissinon');

		if(isset($page_permissinon) && $page_permissinon[$userID]){
			$permissinValue[$userID] = $page_permissinon[$userID];
		}else{
			$permissinValue[$userID] = $this->getpagePermission($userID);
		}

		if(in_array(trim(strtolower($premlink)), $permissinValue[$userID])){
			return true;
		}
		return false;
	}

	public function getCheckUserPermissionHead($premlink, $redirect=false)
	{
		$user_id = $this->session->userdata('user_id');
		if(!$this->getISUserPermission($premlink, $user_id)){
			$this->session->set_flashdata('res', lang('common_message_create'));
			$this->session->set_flashdata('res_type', 'success');
			if($redirect == true){
				redirect('auth/pagenotfound', 'refresh');
			}
			return false;
		}
		return true;
	}

	public function getCheckUserDesignation()
	{
		$user_id = $this->session->userdata('user_id');

		$selectQuery = $this->db->query("select jd.designation_name, jd.designation_id from jr_staffs as js LEFT JOIN jr_designation as jd ON js.staffs_designation = jd.designation_id WHERE js.user_id = '".$user_id."'");
		$designationID = '';
		foreach($selectQuery->result_array() as $item1)
		{
			$designationID = $item1['designation_id'];
		}
		return $designationID;

		//SELECT u.email, g.description, mm.menu_name FROM users as u left join user_admin_group as uag on u.id = uag.user_id LEFT JOIN user_group_module as ugm ON uag.group_id = ugm.group_id LEFT JOIN groups as g ON uag.group_id = g.id LEFT JOIN jr_menu_module as mm ON mm.menu_id = ugm.module_id
	}	
}