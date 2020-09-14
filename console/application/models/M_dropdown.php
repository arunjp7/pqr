<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_dropdown extends CI_Model {
    function __construct() 
	{
        parent::__construct();
        $this->load->database();
    }

    // All Category Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 7:44 PM
	function drop_menu_all_category()
    {
		$this->db->select('cat_id, cat_name, cat_parentID');
		$this->db->where('cat_status',1);
		$this->db->where('cat_delete',0);
		$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		$this->db->order_by('cat_sort', 'ASC');
		$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzm_category ');

		foreach($query->result_array() as $item)
		{
			$data[$item['cat_id']] = $item;
			
 				$this->db->select('cat_id, cat_name, cat_parentID');
				$this->db->where('cat_status',1);
				$this->db->where('cat_delete',0);
				//$this->db->where('cat_isSubcat',1);
				
				$this->db->where('cat_parentID ',$item['cat_id']);
				$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
				$this->db->order_by('cat_sort', 'ASC');
				$query1=$this->db->get('pzm_category ');
				foreach($query1->result_array() as $item1)
				{
					$data[$item['cat_id']]['sub'][$item1['cat_id']]= $item1;
 				}
		}
      return $data;
    }

    // All Category Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 7:44 PM
	function drop_menu_all_projects($limit = '')
    {
 		$this->db->select('client_name, client_id');
		$this->db->where('client_show_status',1);
		$this->db->order_by('client_id', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_client');

		foreach($query->result_array() as $item)
		{
			$data[$item['client_id']] = $item;
			
 				$this->db->select('project_id, project_no, project_client_name');
				$this->db->where('project_show_status',1);
				if($limit != ''){
					$this->db->limit($limit);
				}
				//$this->db->where('cat_status',1);
				//$this->db->where('cat_isSubcat',1);
				
				$this->db->where('project_client_name ',$item['client_id']);
				//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
				$this->db->order_by('project_id', 'ASC');
				$query1 = $this->db->get('jr_project');
				foreach($query1->result_array() as $item1)
				{
					$data[$item['client_id']]['sub'][$item1['project_id']]= $item1;
 				}
		}

      return $data;
    }

    
    // All Category Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 7:44 PM
	function drop_menu_all_project()
    {
		$this->db->select('project_id, project_name');
		$this->db->where('project_show_status',1);
		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		$this->db->order_by('project_id', 'ASC');
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('jr_project ');

		foreach($query->result_array() as $item)
		{
			$data[$item['project_id']] = $item;
			
 				$this->db->select('project_id, project_name, cat_parentID');
				$this->db->where('cat_status',1);
				$this->db->where('cat_delete',0);
				//$this->db->where('cat_isSubcat',1);
				
				$this->db->where('cat_parentID ',$item['project_id']);
				$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
				$this->db->order_by('cat_sort', 'ASC');
				$query1=$this->db->get('pzm_category ');
				foreach($query1->result_array() as $item1)
				{
					$data[$item['project_id']]['sub'][$item1['cat_id']]= $item1;
 				}
		}
      return $data;
    }

     // All Sizes Drop Down
	//Last Updated by S.jegatheesh 08/08/2016 1:20 PM
    function drop_menu_all_category_size($catid)
    {
		$this->db->select('u.catSize_id, u.catSize_name');
		$this->db->order_by('u.catSize_id', 'ASC');
		$this->db->where('u.cat_id',$catid);
		$query=$this->db->get('pzm_category_size As u');
		$result = $query->result();
		$drop_menu_vendor = array();
		
		$options[''] = '-- '.lang('extra_price_catSize_id_label').' --' ;
		
		

		foreach($result as $item)
		{
			$options[$item->catSize_id] = $item->catSize_name;
		}
      return $options;
    }

    // All Tax Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 8:20 PM
    function drop_menu_all_tax()
    {
		$this->db->select('u.tax_id, u.tax_percent');
		$this->db->order_by('u.tax_id', 'ASC');
		$this->db->where('u.st_storeID',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzm_tax As u');
		$result = $query->result();
		$drop_menu_vendor = array();
		$options[''] = '-- '.lang('menu_card_taxx_id_label').' --' ;

		foreach($result as $item)
		{
			$options[$item->tax_id] = $item->tax_percent;
		}
      return $options;
    }
    


     // All Dressing And  Extras Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 9:11 PM
    function all_Dressing_Details()
    {
		$this->db->select('dressing_id, dressing_name, dressing_status');
		$this->db->where('dressing_status',1);
		$this->db->where('dressing_delete',0);
		$this->db->order_by('dressing_id', 'ASC');
		$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzm_dressing');

		foreach($query->result_array() as $item)
		{
			$data[$item['dressing_id']] = $item;
		}
      return $data;
    }


    // All Extra Available Category And  Extras Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 9:11 PM
    function all_Dressing_Available_Details($cat_id='',$catSize_id='',$rateid='')
    {
			$this->db->select('er.drRate_id,er.cat_id,er.catSize_id,er.drRate_price,er.dressing_id,ex.dressing_name');
			$this->db->from('pzr_dressing_rate as er');
			$this->db->join('pzm_dressing as ex','ex.dressing_id = er.dressing_id','left');
			
			$this->db->where('er.drRate_delete',0);

			$this->db->where('er.cat_id',$cat_id);
			$this->db->where('er.catSize_id',$catSize_id);

			if($rateid!='')
			{
				$this->db->where('er.drRate_id',$rateid);
			}
			else
			{
				//$this->db->where('er.exRate_status',1);
			}

			$this->db->order_by('er.drRate_id', 'ASC');
			$this->db->where('er.st_storeID ',$this->session->userdata('st_storeID'));
			$query1=$this->db->get();

			foreach($query1->result_array() as $item1)
			{
				$data[$item1['drRate_id']] = $item1;
			}


      return $data;
    }


    


    // All Extra Category And  Extras Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 9:11 PM
    function all_Extral_Details($type)
    {
		$this->db->select('exCat_id, exCat_name, exCat_status, exCat_status');
		$this->db->where('exCat_status',1);
		$this->db->where('exCat_delete',0);
		$this->db->order_by('exCat_id', 'ASC');
		$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzm_extras_category ');

		foreach($query->result_array() as $item)
		{
			$data[$item['exCat_id']] = $item;
			
 				$this->db->select('extras_id, extras_name, extras_isFree');
				$this->db->where('extras_status',1);
				$this->db->where('extras_delete',0);
				
				$this->db->where('extras_isFree',$type);
				
				$this->db->where('exCat_id ',$item['exCat_id']);
				
				$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
				$this->db->order_by('extras_id', 'ASC');
				$query1=$this->db->get('pzm_extras ');
				foreach($query1->result_array() as $item1)
				{
					$data[$item['exCat_id']]['sub'][$item1['extras_id']]= $item1;
 				}
		}
      return $data;
    }


    
    // All Extra Category And  Extras Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 9:11 PM
    function all_Extral_ShowSizesDetails($type)
    {
		$this->db->select('exCat_id, exCat_name, exCat_status, exCat_status');
		$this->db->where('exCat_status',1);
		$this->db->where('exCat_delete',0);
		$this->db->order_by('exCat_id', 'ASC');
		$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzm_extras_category ');

		foreach($query->result_array() as $item)
		{
			$data[$item['exCat_id']] = $item;
			
 				$this->db->select('extras_id, extras_name, extras_isFree');
				$this->db->where('extras_status',1);
				$this->db->where('extras_delete',0);
				
				$this->db->where('extras_isFree',$type);
				
				$this->db->where('exCat_id ',$item['exCat_id']);
				
				$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
				$this->db->order_by('extras_id', 'ASC');
				$query1=$this->db->get('pzm_extras ');
				foreach($query1->result_array() as $item1)
				{
					$data[$item['exCat_id']]['sub'][$item1['extras_id']]= $item1;
 				}
		}
      return $data;
    }

    // All Exist Menu Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 2:32 PM
    function drop_menu_all_exist_menu($menu_id='')
    {
		$this->db->select('u.mCard_ID, u.mCard_name');
		$this->db->order_by('u.mCard_ID', 'ASC');
		$this->db->where('u.mCard_status','1');
		$this->db->where('u.mCard_delete','0');
		if($menu_id!='')
		{
			$this->db->where('u.mCard_ID != '.$menu_id.'');
		}
		
		$this->db->where('u.st_storeID',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzr_menu_card As u');
		$result = $query->result();
		$drop_menu_vendor = array();
		$options[''] = '-- '.lang('menu_card_mCardCombo_ite_label').' --' ;

		foreach($result as $item)
		{
			$options[$item->mCard_ID] = $item->mCard_name;
		}
      return $options;
    }



    // All Extra Available Category And  Extras Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 9:11 PM
    function all_Extral_Available_Details($cat_id='',$catSize_id='',$rateid='',$type='')
    {

    	//echo "cat_id".$cat_id."catSize_id".$catSize_id."rateid".$rateid."type".$type;
		$this->db->select('exc.exCat_id,exc.exCat_name');
		$this->db->from('pzr_extras_rate as er');
		$this->db->join('pzm_extras as ex','ex.extras_id = er.extras_id','left');
		$this->db->join('pzm_extras_category as exc','exc.exCat_id = ex.exCat_id','left');
		
		$this->db->where('er.exRate_delete',0);
		$this->db->where('er.extras_isFree',$type);

		$this->db->where('er.cat_id',$cat_id);
		$this->db->where('er.catSize_id',$catSize_id);

		if($rateid!='')
		{
			$this->db->where('er.exRate_id',$rateid);
		}
		else
		{
			//$this->db->where('er.exRate_status',1);
		}

		$this->db->order_by('exc.exCat_id', 'ASC');
		$this->db->where('er.st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get();

		foreach($query->result_array() as $item)
		{
			$data[$item['exCat_id']] = $item;

			$this->db->select('er.exRate_id,er.cat_id,er.catSize_id,er.exRate_price,er.extras_id,ex.extras_name,ex.exCat_id');
			$this->db->from('pzr_extras_rate as er');
			$this->db->join('pzm_extras as ex','ex.extras_id = er.extras_id','left');
			
			$this->db->where('er.exRate_delete',0);
			$this->db->where('er.extras_isFree',$type);
			$this->db->where('ex.exCat_id',$item['exCat_id']);

			$this->db->where('er.cat_id',$cat_id);
			$this->db->where('er.catSize_id',$catSize_id);

			if($rateid!='')
			{
				$this->db->where('er.exRate_id',$rateid);
			}
			else
			{
				//$this->db->where('er.exRate_status',1);
			}

			$this->db->order_by('er.exRate_id', 'ASC');
			$this->db->where('er.st_storeID ',$this->session->userdata('st_storeID'));
			$query1=$this->db->get();

			foreach($query1->result_array() as $item1)
			{
				$data[$item['exCat_id']]['sub'][$item1['exRate_id']]= $item1;
			}
		}
      return $data;
    }

    function drop_extra_category()
    {
		$this->db->select('*');
		$this->db->where('c.exCat_status',1);
		$this->db->where('c.exCat_delete',0);
		$this->db->order_by('c.exCat_id', 'ASC');
		//$this->db->join('wages w','w.user_id = u.up_id','left');
		$this->db->where('c.st_storeID',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzm_extras_category As c');
		$result = $query->result();
		$drop_extra_category = array();
		$options[''] = '-- Select --' ;

		foreach($result as $item)
		{
			$options[$item->exCat_id] = $item->exCat_name;
		}

      return $options;
    }

    function drop_offer_type()
    {
		$this->db->select('*');
		$this->db->where('offType_status',1);
		//$this->db->order_by('c.exCat_name', 'ASC');
		//$this->db->join('wages w','w.user_id = u.up_id','left');
		//$this->db->where('w.user_id ',NULL);
		$query=$this->db->get('pzm_offer_type');
		$result = $query->result();
		$drop_extra_category = array();
		$options[''] = '-- Select --' ;

	foreach($result as $item)
	{
		$options[$item->offType_id] = $item->offType_name;
	}
      return $options;
    }

  //end editing by jagatheesh


	
	
	/*********** 
	Category Master List 
	Edited By @Ramesh Krishnan
	*************/
	function drop_menu_category()
    {
		$this->db->select('cat_id, cat_name');
		$this->db->where('cat_delete','0');
		$this->db->where('cat_status','1');
		$this->db->order_by('cat_id', 'ASC');
		$query=$this->db->get('pzm_category');
		$result = $query->result();
		$options[''] = lang("mm_category_cat_Select_label") ;
		
		foreach($result as $item)
		{
			$options[$item->cat_id] = $item->cat_name;
		}
		
      	return $options;
    }


	/*********** 
	Category Master List 
	Edited By @Ramesh Krishnan
	*************/
	function drop_menu_designation()
    {
		$this->db->select('designation_id, designation_name');
		//$this->db->where('cat_delete','0');
		$this->db->where('designation_show_status','1');
		$this->db->order_by('designation_id', 'ASC');
		$query=$this->db->get('jr_designation');
		$result = $query->result();
		$options[''] = lang("hrm_designation_cat_Select_label") ;
		
		foreach($result as $item)
		{
			$options[$item->designation_id] = $item->designation_name;
		}
		
      	return $options;
    } 

    /*********** 
	Category Master List 
	Edited By @Ramesh Krishnan
	*************/
	function drop_menu_department()
    {
		$this->db->select('department_id, department_name');
		//$this->db->where('cat_delete','0');
		$this->db->where('department_show_status','1');
		$this->db->order_by('department_id', 'ASC');
		$query=$this->db->get('jr_department');
		$result = $query->result();
		$options[''] = lang("hrm_department_cat_Select_label") ;
		
		foreach($result as $item)
		{
			$options[$item->department_id] = $item->department_name;
		}
		
      	return $options;
    }   

    /*********** 
	Order Details List 
	Edited By @jagatheesh 
	*************/
	function get_OrderDetails($od_id)
    {
    	$this->db->select('pzso.status_name, b.od_date, u.first_name, b.od_grandTotal, pm.payment_typeName, pzs.status_name as od_paymentStatus, pdt.delivery_typeName, u1.first_name as name, b.od_lastUpdateOn, b.od_id, b.od_email, b.od_fax, b.od_invoiceNo, b.od_invoiceDate, b.od_remarks, b.od_status, b.od_shippingCost, b.od_totalOffer, b.od_delivery_time, b.invisecommentOverAll,b.od_deliveryMethod,b.happy_offers,b.happy_offers_title,b.happy_offers_description')
        ->from('pzo_orders AS b')
        ->where('b.od_id',$od_id)
        ->where('b.st_storeID',$this->session->userdata{'st_storeID'})
        ->join('users AS u', 'u.id = b.od_userId','left') 
        ->join('pzm_payment_types AS pm','pm.payment_typeID = b.od_paymentMethod','left') 

        ->join('pzm_status AS pzso','pzso.status_id = b.od_status','left') 
        ->join('pzm_status AS pzs','pzs.status_id = b.od_paymentStatus','left') 
        ->join('pzm_delivery_types AS pdt','pdt.delivery_typeID = b.od_deliveryMethod','left') 

        ->join('users AS u1', 'u1.id = b.od_lastUpdateBy','left') ;

		$query=$this->db->get();
		$result = $query->result();
		
      	return $result;
    } 

    /*********** 
	Order Details List 
	Edited By @jagatheesh 
	*************/
	function printorderformdetails($fromdate, $todate, $od_status, $od_deliveryMethod)
    {

    	$this->db->select('b.od_id,CONCAT((" #"),(b.od_id),(" ") ) AS ids, pzso.status_name, b.od_date, u.first_name, b.od_grandTotal,
    	 CONCAT((di.od_delivery_area), (" , "),(di.od_delivery_city), (" - "), (di.od_delivery_zipcode)) AS address, pdt.delivery_typeName, b.od_delivery_time, u1.first_name as name, b.od_lastUpdateOn')
        ->from('pzo_orders AS b');

        if($fromdate!='' && $fromdate!='-1' && $todate=='-1' )
        {
        	$this->db->where("( DATE(`b`.`od_date`) = '".$fromdate."')");
        }
        elseif($todate!='' && $todate!='-1' && $fromdate=='-1' )
        {
        	$this->db->where("( DATE(`b`.`od_date`) = '".$todate."')");
        }
        elseif($fromdate!='-1' && $todate!='-1' )
        {
        	$this->db->where("( DATE(`b`.`od_date`) >= '".$fromdate."' AND DATE(`b`.`od_date`) <= '".$todate."')");
        }

        if($od_status!='-1')
        {
        	$this->db->where('b.od_status',$od_status);
        }
        if($od_deliveryMethod!='-1')
        {
        	$this->db->where('b.od_deliveryMethod',$od_deliveryMethod);
        }


        $this->db->where('b.st_storeID',$this->session->userdata{'st_storeID'})
        ->join('users AS u', 'u.id = b.od_userId','left') 
        ->join('pzm_payment_types AS pm','pm.payment_typeID = b.od_paymentMethod','left') 
        ->join('pzo_delivery_info AS di','di.od_id = b.od_id','left') 
        ->join('pzm_status AS pzso','pzso.status_id = b.od_status','left') 
        //->join('pzm_status AS pzs','pzs.status_id = b.od_paymentStatus','left') 
        ->join('pzm_delivery_types AS pdt','pdt.delivery_typeID = b.od_deliveryMethod','left') 
        ->join('users AS u1', 'u1.id = b.od_lastUpdateBy','left');
        //$this->db->order_by("b.od_id", "DESC");
        $this->db->order_by("b.od_id desc , pzso.status_id desc");
    	
		$query=$this->db->get();
		$result = $query->result();
		
      	return $result;
    } 

    /*********** 
	Order Items List 
	Edited By @jagatheesh 
	*************/
	function get_OrderProducts($od_id)
    {
		$this->db->select('c.od_item_id,c.od_id,c.mCard_ID,c.mCardRate_id,c.catSize_id,c.od_item_price,c.od_item_comment,c.od_item_qty,c.od_item_isCombo,c.od_item_offerAmount,c.od_item_tax,c.od_item_taxAmount,mc.*,ct.*,rt.*');
		$this->db->from('pzo_order_item as c');
		$this->db->join('pzr_menu_card as mc','mc.mCard_ID=c.mCard_ID','inner');
		$this->db->join('pzm_category as ct','ct.cat_id=mc.cat_id','inner');
		$this->db->join('pzr_menu_card_rate as rt','rt.mCardRate_id=c.mCardRate_id','inner');
		$this->db->where('c.od_id',$od_id);
		$result = $this->db->get()->result();
		
      	return $result;
    } 

    public function getOrderItemsExtras($cartid)
	{
    	$this->db->select('c.od_extras_id,c.exRate_id,c.od_extras_isFree,c.od_extrasPrice,pe.extras_name');
		$this->db->from('pzo_order_extras as c');
		$this->db->join('pzm_extras as pe'," pe.extras_id=c.exRate_id",'left');
		$this->db->where('c.od_item_id',$cartid);
		$result = $this->db->get()->result();
    	return $result;
	}

	public function getOrderItemsExtras1($cartid)
	{
    	//$this->db->select('GROUP_CONCAT(pe.extras_name SEPARATOR ",") as extras_name, SUM(c.od_extrasPrice) as od_extrasPrice');
    	$this->db->select('GROUP_CONCAT( CONCAT_WS( "-",pe.extras_name, REPLACE(c.od_extrasPrice,".",","))  SEPARATOR ",") as extras_name, SUM(c.od_extrasPrice) as od_extrasPrice');
		$this->db->from('pzo_order_extras as c');
		$this->db->join('pzm_extras as pe'," pe.extras_id=c.exRate_id",'left');
		$this->db->where('c.od_item_id',$cartid);
		$result = $this->db->get()->result_array();
    	return $result;
	}

	public function getOrderItemsDressing($cartid)
	{
    	$this->db->select('c.od_dressing_id,c.exRate_id,c.od_dressing_isFree,c.od_dressing_price,pd.dressing_name');
		$this->db->from('pzo_order_dressing as c');
		$this->db->join('pzm_dressing as pd'," pd.dressing_id=c.exRate_id  AND pd.dressing_status ='1' ",'left');
		$this->db->where('c.od_item_id',$cartid);
		$result = $this->db->get()->result();
    	return $result;
	}

	public function getOrderItemsDressing1($cartid)
	{
    	$this->db->select('GROUP_CONCAT(pd.dressing_name SEPARATOR ",") as dressing_name');
		$this->db->from('pzo_order_dressing as c');
		$this->db->join('pzm_dressing as pd'," pd.dressing_id=c.exRate_id  AND pd.dressing_status ='1' ",'left');
		$this->db->where('c.od_item_id',$cartid);
		$result = $this->db->get()->result_array();
    	return $result;
	}



    function get_OrderTaxDetails($od_id)
    {
    	$this->db->select('pm.od_item_tax,SUM( (pm.od_item_taxAmount ) ) AS od_item_taxAmounts')
        ->from('pzo_orders AS b')
        ->where('b.od_id',$od_id)
        ->where('b.st_storeID',$this->session->userdata('st_storeID'))
        ->join('pzo_order_item AS pm','pm.od_id = b.od_id','left') ;

        $this->db->group_by('pm.od_item_tax'); 

		$query=$this->db->get();
		$result = $query->result();
		
      	return $result;
    } 

    public function taxTotal()
	{
		$query = $this->db->query("SELECT SUM( ( `item_tax` ) ) AS `total_tax` FROM `pzc_cart_item` WHERE `cart_session_id`='".$od_id."'");
		//$result = $this->db->get()->result();
    	return $query->row('total_tax');
	}


	// All Extra Category And  Extras Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 9:11 PM
    function all_Extral_ShowSizesDetails1($cat_id,$hfrom_date,$hfrom_time,$hto_date,$hto_time)
    {
    	$from_date = date('Y-m-d',strtotime($hfrom_date));
    	$to_date = date('Y-m-d',strtotime($hto_date));
    	$hfrom_time = date('H:i:s',strtotime($hfrom_time));
    	$hto_time = date('H:i:s',strtotime($hto_time));

		$this->db->select('hoffers_id, hoffer_status');
		$this->db->where('hoffer_status',1);
		$this->db->where('hoffer_delete',0);

		$this->db->where(" hfrom_date >= '".$from_date."' AND hfrom_time <= '".$hfrom_time."' AND hto_date <= '".$to_date."' AND hto_time >= '".$hto_time."'");

		$this->db->where('cat_id',$cat_id);

		$this->db->order_by('hoffers_id', 'ASC');
		$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('pzm_happy_offers ');

		foreach($query->result_array() as $item)
		{
			$data[$item['hoffers_id']] = $item;
			
 				$this->db->select('hoffers_item_id, cat_size_id');
				
				$this->db->where('hoffers_id ',$item['hoffers_id']);
				
				$this->db->order_by('hoffers_item_id', 'ASC');
				$query1=$this->db->get('pzm_happy_offers_item ');

				foreach($query1->result_array() as $item1)
				{
					$data[$item['hoffers_id']]['sub'][$item1['hoffers_item_id']]= $item1;
 				}
		}
      return $data;
    }


     // All Sizes Drop Down
	//Last Updated by S.jegatheesh 08/08/2016 1:20 PM
    function drop_menu_all_category_sizeCheckbox($catid)
    {
    	$dataArray = array();
		$this->db->select('u.catSize_id, u.catSize_name');
		$this->db->order_by('u.catSize_id', 'ASC');
		$this->db->where('u.cat_id',$catid);
		$query=$this->db->get('	 As u');

		foreach ($query->result_array() as $value)
		{
			$dataArray[$value['catSize_id']] = $value;
		}
        return $dataArray;
    }

    // All Category Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 7:44 PM
	function drop_menu_all_menuPage()
    {
    	$this->db->select('menu_id, menu_area, menu_name, menu_parent');
		$this->db->where('menu_status', '1');
		$this->db->where('menu_parent', '0');
		$this->db->group_by('menu_area');
		$this->db->order_by('top_menu_position', 'ASC');
		$query=$this->db->get('jr_menu_module');

		foreach($query->result_array() as $item)
		{
			$data[$item['menu_id']] = $item;

			$this->db->select('menu_id, menu_area, menu_name, menu_parent');
			$this->db->where('menu_status', '1');
			$this->db->where('menu_parent', '0');
			$this->db->where('menu_area', $item['menu_area']);
			$this->db->order_by('menu_position', 'ASC');
			$query1=$this->db->get('jr_menu_module');

			foreach($query1->result_array() as $item1)
			{
				$data[$item['menu_id']]['sub'][$item1['menu_id']]= $item1;
				
 				$this->db->select('menu_id, menu_name, menu_link');
				$this->db->where('menu_status', '1');
				$this->db->where('menu_parent',$item1['menu_id']);
				$this->db->order_by('menu_position', 'ASC');
				$query2=$this->db->get('jr_menu_module');
				foreach($query2->result_array() as $item2)
				{
					$data[$item['menu_id']]['sub'][$item1['menu_id']]['subsub'][$item2['menu_id']]= $item2;
 				}
 			}
		}
      return $data;
    }

        // All Category Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 7:44 PM
	function drop_menu_all_userGroupMenu($user_id)
    {
    	$this->db->select('ug.group_id, ug.id, g.description');
		$this->db->where('ug.user_id', $user_id);
		$this->db->join('groups AS g','ug.group_id = g.id','left');
		$this->db->group_by('ug.group_id');
		$this->db->order_by('ug.id', 'ASC');
		$query=$this->db->get('users_groups AS ug');

		foreach($query->result_array() as $item)
		{
			$data[$item['group_id']] = $item;
			$this->db->select('jmm.menu_id, jmm.menu_area, jmm.menu_name, jmm.menu_parent, ugm.module_id');
			$this->db->join('user_group_module AS ugm','ugm.module_id = jmm.menu_id AND ugm.group_id ='.$item['group_id'].'' ,'left');
			$this->db->where('jmm.menu_status', '1');
			$this->db->where('jmm.menu_parent', '0');
			$this->db->group_by('jmm.menu_area');
			$this->db->order_by('jmm.top_menu_position', 'ASC');
			$query1=$this->db->get('jr_menu_module AS jmm');

			foreach($query1->result_array() as $item1)
			{
				$data[$item['group_id']]['sub'][$item1['menu_id']] = $item1;

				$this->db->select('jmm.menu_id, jmm.menu_area, jmm.menu_name, jmm.menu_parent, ugm.module_id');
				$this->db->join('user_group_module AS ugm','ugm.module_id = jmm.menu_id AND ugm.group_id ='.$item['group_id'].'' ,'left');
				$this->db->where('jmm.menu_status', '1');
				$this->db->where('jmm.menu_parent', '0');
				$this->db->where('jmm.menu_area', $item1['menu_area']);
				$this->db->order_by('jmm.menu_position', 'ASC');
				$query2=$this->db->get('jr_menu_module AS jmm');

				foreach($query2->result_array() as $item2)
				{
					$data[$item['group_id']]['sub'][$item1['menu_id']]['subsub'][$item2['menu_id']]= $item2;
					
	 				$this->db->select('jmm.menu_id, jmm.menu_name, jmm.menu_link, ugm.module_id');
					$this->db->join('user_group_module AS ugm','ugm.module_id = jmm.menu_id AND ugm.group_id ='.$item['group_id'].'' ,'left');
					$this->db->where('jmm.menu_status', '1');
					$this->db->where('jmm.menu_parent',$item2['menu_id']);
					$this->db->order_by('jmm.menu_position', 'ASC');
					$query3=$this->db->get('jr_menu_module AS jmm');
					foreach($query3->result_array() as $item3)
					{
						$data[$item['group_id']]['sub'][$item1['menu_id']]['subsub'][$item2['menu_id']]['subsubsub'][$item3['menu_id']]= $item3;
	 				}
	 			}
			}
		}
      return $data;
    }

    // All Category Drop Down
	//Last Updated by S.jegatheesh 06/08/2016 7:44 PM
	function drop_menu_all_header_projects($isAdmin)
    {
    	/*
		$this->db->select('project_id, project_no, project_name');
		$this->db->where('project_show_status',1);
		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		$this->db->order_by('project_id', 'ASC');
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('jr_project');

		foreach($query->result_array() as $item)
		{
			$data[$item['project_id']] = $item;
			
 				$this->db->select('batch_wps, batch_id, batch_ref_no');
				//$this->db->where('cat_status',1);
				$this->db->where('batch_show_status',1);
				//$this->db->where('cat_isSubcat',1);
				
				$this->db->where('projectID ',$item['project_id']);
				//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
				$this->db->order_by('batch_id', 'ASC');
				$query1=$this->db->get('jr_batch');
				foreach($query1->result_array() as $item1)
				{
					$data[$item['project_id']]['sub'][$item1['batch_id']]= $item1;
 				}
		}
		*/
		$getDesignation = $this->mcommon->getCheckUserDesignation();	
		$user_id = $this->session->userdata('user_id');


		$this->db->select('project_id, project_no, project_name');
		$this->db->where('project_show_status',1);
		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		$this->db->order_by('project_id', 'ASC');
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query=$this->db->get('jr_project');

		foreach($query->result_array() as $item)
		{
			$data[$item['project_id']] = $item;
				$this->db->select('jb.job_no_id, jb.job_no');
				$this->db->where('jb.job_no_show_status',1);
				$this->db->where('jb.choose_project ',$item['project_id']);
				$this->db->order_by('jb.job_no_id', 'ASC');
				if (!$isAdmin && $getDesignation == 1) {
					$this->db->join('jr_inspector AS ji','ji.inspector_job = jb.job_no_id','left');
					$this->db->where('ji.inspector_name ',$user_id);
				}
				

				$query1=$this->db->get('jr_job_no AS jb');
				foreach($query1->result_array() as $item1)
				{
					$data[$item['project_id']]['sub'][$item1['job_no_id']]= $item1;
 				}
		}
      return $data;
    }


    function getMainMenuAll($userID)
    {
    	//echo "select DISTINCT(mm.menu_area) as menuarea from jr_menu_module as mm, user_group_module as gm where mm.menu_id=gm.module_id AND group_id IN (SELECT group_id as groupname FROM `user_admin_group` as a WHERE user_id = '".$userID."')";
    	$selectQuery = $this->db->query("select DISTINCT(mm.menu_area) as menuarea, mm.menu_active_name from jr_menu_module as mm, user_group_module as gm where mm.menu_id=gm.module_id AND group_id IN (SELECT group_id as groupname FROM `user_admin_group` as a WHERE user_id = '".$userID."')  Order by mm.top_menu_position");
    	return $selectQuery;

    }
    function getSubmenu($userID)
    {
    	$data = array();

    	$getMewnuArea = $this->getMainMenuAll($userID);

    	foreach($getMewnuArea->result_array() as $mainMenu)
		{
			$data[$mainMenu['menuarea']] = $mainMenu;
			//echo "select DISTINCT(mm.menu_name) as menuname, mm.menu_link, mm.menu_id from jr_menu_module as mm, user_group_module as gm where mm.menu_id=gm.module_id AND mm.menu_parent=0 AND mm.menu_status=1 AND group_id IN (SELECT group_id as groupname FROM `user_admin_group` as a WHERE user_id = '".$userID."') AND mm.menu_area IN ('".$mainMenu['menuarea']."') Order by mm.menu_name ";

			$selectQuery = $this->db->query("select DISTINCT(mm.menu_name) as menu_name, mm.menu_link, mm.menu_id, mm.menu_path, mm.menu_active_name from jr_menu_module as mm, user_group_module as gm where mm.menu_id=gm.module_id AND mm.menu_parent=0 AND mm.menu_status=1 AND group_id IN (SELECT group_id as groupname FROM `user_admin_group` as a WHERE user_id = '".$userID."') AND mm.menu_area IN ('".$mainMenu['menuarea']."') Order by mm.top_menu_position, mm.menu_position asc ");

			foreach($selectQuery->result_array() as $item1)
			{
				$data[$mainMenu['menuarea']]['submenu'][$item1['menu_id']]= $item1;
			}
		}

      return $data;
    }
    function getSubmenuAll()
    {
		$submenu_data = $this->session->userdata('submenu');
		$userID = $this->session->userdata('user_id');

		
		if(isset($submenu_data) && $submenu_data[$userID]){
			$submenuAll = $submenu_data[$userID];
		}else{
			$submenuAll = $this->getSubmenu($userID);
		}
		return $submenuAll;


    	        //$this->session->set_userdata('username', 'John Doe');

    	//$this->session->userdata('user_id')
    }


    // All company Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_all_company($limit = '')
    {
 		$this->db->select('company_name, company_id');
		$this->db->where('company_show_status',1);
		$this->db->order_by('company_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_company_details');
		$data[''] = lang("mm_operation_company_Select_label") ;

		foreach($query->result_array() as $item)
		{
			$data[$item['company_id']] = $item['company_name'];
		}
      return $data;
    }

    // All Process Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_process($limit = '')
    {
 		$this->db->select('process_name, process_id');
		$this->db->where('process_show_status',1);
		$this->db->order_by('process_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_process');
		$data[''] = lang("mm_operation_process_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['process_id']] = $item['process_name'];
		}
      return $data;
    }


    // All Position Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_position($limit = '')
    {
 		$this->db->select('position_name, position_id');
		$this->db->where('position_show_status',1);
		$this->db->order_by('position_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_position');
		$data[''] = lang("mm_operation_position_Select_label");
		
		foreach($query->result_array() as $item)
		{
			$data[$item['position_id']] = $item['position_name'];
		}
      return $data;
    }

    // All Cup Size Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_cup_size($limit = '')
    {
 		$this->db->select('cupsize_name, cupsize_id');
		$this->db->where('cupsize_show_status',1);
		$this->db->order_by('cupsize_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_cupsize');
		$data[''] = lang("mm_operation_cupsize_Select_label");
		
		foreach($query->result_array() as $item)
		{
			$data[$item['cupsize_id']] = $item['cupsize_name'];
		}
      return $data;
    }

    // All cleaning Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_cleaning($limit = '')
    {
 		$this->db->select('cleaning_name, cleaning_id');
		$this->db->where('cleaning_show_status',1);
		$this->db->order_by('cleaning_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_cleaning');
		$data[''] = lang("mm_operation_cleaning_Select_label");
		
		foreach($query->result_array() as $item)
		{
			$data[$item['cleaning_id']] = $item['cleaning_name'];
		}
      return $data;
    }


    // All Diameter Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_diameter($limit = '')
    {
 		$this->db->select('diameter_name, diameter_id');
		$this->db->where('diameter_show_status',1);
		$this->db->order_by('diameter_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_diameter');
		$data[''] = lang("mm_operation_diameter_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['diameter_id']] = $item['diameter_name'];
		}
      return $data;
    }
    
    // All Type Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_type($limit = '')
    {
 		$this->db->select('type_name, type_id');
		$this->db->where('type_show_status',1);
		$this->db->order_by('type_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_type');
		$data[''] = lang("mm_operation_type_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['type_id']] = $item['type_name'];
		}
      return $data;
    }

    // All Type Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_code($limit = '')
    {
 		$this->db->select('code_name, code_id');
		$this->db->where('code_show_status',1);
		$this->db->order_by('code_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_code');
		// $data[''] = lang("mm_operation_code_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['code_id']] = $item['code_name'];
		}
      return $data;
    }

    // All Type Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_pno($limit = '')
    {
 		$this->db->select(array('pno_name', 'pno_id','group_no', 'specification_no', 'dtg_name', 'uns_number'));
		$this->db->where('pno_show_status',1);
		$this->db->order_by('pno_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_pno');
		
		$data[''] = lang("mm_operation_pno_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['pno_id']] = $item['pno_name'] . " - " . $item['group_no'] . ',' . $item['specification_no'] . ',' . ($item['dtg_name']!=null?$item['dtg_name']:$item['uns_number']);
		}
      return $data;
    }

   

    // All other group no information Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_group($pno_id)
    {
 		$this->db->select(array('group_no', 'specification_no', 'dtg_name', 'uns_number'));
 		$this->db->where('pno_id',$pno_id);
		$this->db->where('pno_show_status',1);
		$this->db->order_by('group_no', 'ASC');
		
		$query = $this->db->get('jr_pno');
		
		foreach($query->result_array() as $item)
		{
			
			$data = array( 'group_no' => $item['group_no'], 
							'specification_no' => $item['specification_no'], 
							'dtg_name' => $item['dtg_name'], 
							'uns_number' => $item['uns_number']
						);
		}
      return $data;
    }

    // All fno information Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_fnoInfo($fno_id)
    {
 		$this->db->select(array('a_no', 'sfa_no', 'aws_classfication'));
 		$this->db->where('fno_id',$fno_id);
		$this->db->where('fno_show_status',1);
		
		
		$query = $this->db->get('jr_fno');
		
		foreach($query->result_array() as $item)
		{
			
			$data = array( 'a_no' => $item['a_no'], 
							'sfa_no' => $item['sfa_no'], 
							'aws_classfication' => $item['aws_classfication']
						);
		}
      return $data;
    }

    // All F-No. Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_fno($limit = '')
    {
 		$this->db->select('fno_name, fno_id');
		$this->db->where('fno_show_status',1);
		$this->db->order_by('fno_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		$query = $this->db->get('jr_fno');
		$data[''] = lang("mm_operation_fno_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['fno_id']] = $item['fno_name'];
		}
      return $data;
    }

    // All SFA Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_sfa($limit = '')
    {
 		$this->db->select('sfa_name, sfa_id');
		$this->db->where('sfa_show_status',1);
		$this->db->order_by('sfa_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_sfa');
		$data[''] = lang("mm_operation_sfa_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['sfa_id']] = $item['sfa_name'];
		}
      return $data;
    }
	
	// All Applicable Code Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_applicable_code($limit = '')
    {
 		$this->db->select('applicable_code_name, applicable_code_id');
		$this->db->where('applicable_code_show_status',1);
		$this->db->order_by('applicable_code_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_applicable_code');
		$data[''] = lang("mm_operation_applicable_code_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['applicable_code_id']] = $item['applicable_code_name'];
		}
      return $data;
    }

    // All Grade Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_grade($limit = '')
    {
 		$this->db->select('grade_name, grade_id');
		$this->db->where('grade_show_status',1);
		$this->db->order_by('grade_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_grade');
		$data[''] = lang("mm_operation_grade_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['grade_id']] = $item['grade_name'];
		}
      return $data;
    }

    // All Material Specification Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_material($limit = '')
    {
 		$this->db->select('material_name, material_id');
		$this->db->where('material_show_status',1);
		$this->db->order_by('material_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_material');
		$data[''] = lang("mm_operation_material_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['material_id']] = $item['material_name'];
		}
      return $data;
    }
	
	// All Welder Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_welder($limit = '')
    {
 		$this->db->select('welder_name, welder_id');
		$this->db->where('welder_show_status',1);
		$this->db->order_by('welder_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_welder');
		$data[''] = lang("mm_operation_welder_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['welder_id']] = $item['welder_name'];
		}
      return $data;
    }

    // All Staff Drop Down
	//Last Updated by N.S.Arunjayaprakash
	function drop_menu_staff_welder($limit = '')
    {
 		$this->db->select('staffs_employee_name, staffs_id');
		$this->db->where('staffs_show_status',1);
		$this->db->order_by('staffs_employee_name', 'ASC');
		if($limit != ''){
			$this->db->limit($limit);
		}

		//$this->db->where('cat_delete',0);
		//$this->db->where('cat_parentID',0);
		//$this->db->where('cat_isSubcat',0);
		//$this->db->where('st_storeID ',$this->session->userdata('st_storeID'));
		$query = $this->db->get('jr_staffs');
		$data[''] = lang("mm_operation_staff_Select_label") ;
		
		foreach($query->result_array() as $item)
		{
			$data[$item['staffs_id']] = $item['staffs_employee_name'];
		}
      return $data;

    }
   
}
  
/* End of file m_login.php */
