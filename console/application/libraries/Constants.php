<?PHP
class Constants
{
	function __construct()
	{
		$this->ci =& get_instance();    // get a reference to CodeIgniter.
		date_default_timezone_set('Asia/Kolkata');
	} 
	public function get_constant_no()
	{
		$this->ci->db->select();
		$this->ci->db->from('all_no_generater');
		 $query= $this->ci->db->get()->result_array();
	
		  $year= $this->calculateFiscalYearForDate(date('Y-m-d'),"4/1","3/31");
			//$financial_year=$year.'-'.($year+1);
			$financial_year=$year;
	
		foreach ($query as $key => $value) 
		{
			$nos='';
	
			if($value['financial_status']) 
			{
				if($value['financial_beginning'])
				{
				   $nos=$financial_year.'/'.$value['prefix'].sprintf('%03d',$value['sequence_no']).$value['sufix']  ;
				}
				elseif($value['financial_before_s_no'])
				{
				   $nos=$value['prefix'].$financial_year.'-'.sprintf('%03d',$value['sequence_no']).$value['sufix']  ;
				}
				elseif($value['financial_after_s_no'])
				{
				   $nos=$value['prefix'].sprintf('%03d',$value['sequence_no']).$financial_year.'/'.$value['sufix']  ;
				}
				elseif($value['financial_end'])
				{
				   $nos=$value['prefix'].sprintf('%03d',$value['sequence_no']).$value['sufix'].'/'.$financial_year;
				}
			}
			else 
			{
			   $nos=$value['prefix'].sprintf('%03d',$value['sequence_no']).$value['sufix'];
			}
			$result[$value['field']]=$nos;
		}
		return $result;  
	}
	public  function calculateFiscalYearForDate($inputDate, $fyStart, $fyEnd)
	{
		$date = strtotime($inputDate);
		$inputyear = strftime('%Y',$date);
	
		$fystartdate = strtotime($fyStart.$inputyear);
		$fyenddate = strtotime($fyEnd.$inputyear);


		if($date < $fyenddate)
		{
			//$fy = intval(intval($inputyear) + 1);
			$fy = intval(intval($inputyear));
			
		}
		else
		{
			$fy = intval($inputyear);
		}
		return $fy;
	}
	
}

?>