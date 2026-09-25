<?php 
class crud_model extends CI_Model{
	//echo $this->db->last_query();    
	public function getById($id,$fieldName,$table){
			$this->db->select("*");
			$this->db->from($table);
			$this->db->where($fieldName,$id);
			$query=$this->db->get();
			return $query->row_array();
	}
	public function Updatedata($id,$fieldName,$table,$data){
		$this->db->where($fieldName, $id);
		return $this->db->update($table, $data);
	}
	public function getDatafromtable($table,$sort='desc'){
		$this->db->order_by('id',$sort);
  		$query = $this->db->get($table);
    	return $query->result_array();
	}
	public function getCount($table,$where){
		$this->db->where($where);
  		$query = $this->db->get($table);
    	return $query->num_rows();
	}
	public function InsertData($table,$data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
	public function getDatafromtablewhere($table,$where,$order_by='ASC'){
		
		$this->db->where($where);
		$this->db->order_by('id',$order_by);
  		$query = $this->db->get($table);
		return $query->result_array();
    	
	}
    public function getDatafromtablelike($table,$where,$order_by='ASC',$column_name='id'){
        
        $this->db->like($where);
        $this->db->order_by($column_name,$order_by);
        $query = $this->db->get($table);
        return $query->result_array();
        
    }
	public function DeletData($id,$fieldName,$table){
		$this->db->where($fieldName,$id);
		return $this->db->delete($table);		
	}
	public function getDatafromtablewheresingle($table,$where){
		$this->db->where($where);
  		$query = $this->db->get($table);
    	return $query->row_array();
	}
	public function getDatafromtablewhereorderby($table,$where,$order_by='ASC',$col='id'){
		$this->db->where($where);
		$this->db->order_by($col,$order_by);
  		$query = $this->db->get($table);
    	return $query->result_array();
	}
	public function getDatafromtablewherecount($table,$where,$order_by='ASC'){
		
		$this->db->where($where);
		$this->db->order_by('id',$order_by);
  		$query = $this->db->get($table);
    	return $query->num_rows();
	}
	
    public function get_count_where($table,$where) {
        $this->db->where($where);
        $query = $this->db->get($table);
        return count($query->result_array());
    }

    public function get_limit_data($limit, $start,$table,$column_name="id") {
        $this->db->order_by($column_name,'DESC');
		$this->db->limit($limit, $start);		
        $query = $this->db->get($table);
        return $query->result_array();
    }
   
	public function is_email_available($email)  
    {  
		   $this->db->where('email', $email);  
		   $query = $this->db->get("subscription");  
		   if($query->num_rows() > 0)  
		   {  
				return true;  
		   }  
		   else  
		   {                  
				$data = array( 
					'email'	=>  strtolower($email)
				);
				$this->db->insert('subscription', $data);
				return false;  
		   }  
	}
	function get_info($id, $table = "", $field = "id", $whereCon = "", $all_field = '*', $join = false, $GroupBy = false, $OrderBy = false, $having = false, $db_config = 'db') {
        if (!empty($id) && !empty($table)) {
            $this->$db_config->select($all_field);
            if ($join) {
                if (isset($join['table'])) {
                    $this->$db_config->join($join['table'], $join['on'], $join['type']);
                } else {
                    foreach ($join as $j) {
                        $this->$db_config->join($j['table'], $j['on'], $j['type']);
                    }
                }
            }
            if ($OrderBy) {
                if (isset($OrderBy['field']))
                    $this->$db_config->order_by($OrderBy['field'], $OrderBy['order']);
                else
                    foreach ($OrderBy as $Order)
                        $this->$db_config->order_by($Order['field'], $Order['order']);
            }
            if (!empty($whereCon)) {
                $this->$db_config->where($whereCon);
            }
            if ($having)
                $this->$db_config->having($having);
            if ($GroupBy)
                $this->$db_config->group_by($GroupBy);
            if ($id && $field) {
                $this->$db_config->where($field, $id);
            }
            $query = $this->$db_config->get($table);
            // echo $this->$db_config->last_query(); die;
            if ($query->num_rows() > 0) {
                return $query->row();
            }
        }
        return NULL;
    }

    function GetAllInfo($id = '', $table = "", $field = "id", $whereCon = "", $all_field = '*', $count = false, $join = false, $GroupBy = false, $OrderBy = false, $limit = false, $offset = false, $having = false, $QueryGet = false) {
        // echo "id: ".$id." table: ".$table." field: ".$field;
        if (!empty($table)) {
            $this->db->select($all_field);
            if (!empty($whereCon))
                $this->db->where($whereCon);
            if ($join && count($join) > 0) {
                if (isset($join['table']))
                    $this->db->join($join['table'], $join['on'], $join['type']);
                else
                    foreach ($join as $j)
                        $this->db->join($j['table'], $j['on'], $j['type']);
            }
            if ($OrderBy) {
                if (isset($OrderBy['field']))
                    $this->db->order_by($OrderBy['field'], $OrderBy['order']);
                else
                    foreach ($OrderBy as $Order)
                        $this->db->order_by($Order['field'], $Order['order']);
            }
            if ($limit)
                $this->db->limit($limit);
            if ($offset)
                $this->db->offset($offset);
            if ($having)
                $this->db->having($having);
            if ($id != "")
                $this->db->where($field, $id);
            if ($GroupBy)
                $this->db->group_by($GroupBy);
            $query = $this->db->get($table);
            if ($count)
                if ($QueryGet)
                    return array($this->db->last_query(), $query->num_rows());
                else
                    return $query->num_rows();
            if ($query->num_rows() > 0) {
                if ($QueryGet) {
                    return array($this->db->last_query(), $query->result());
                } else {
                    return $query->result();
                }
            }
        }
        if ($QueryGet) {
            return array($this->db->last_query(), array());
        } else {
            return array();
        }
    }  
    function GetProductDetails($data=''){ 
        $this->db->select('p.*,c.name as collectionname,c.shortname as collectionshortname,pi.image_name');
        $this->db->from('product as p');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
        $this->db->join('product_image as pi','pi.product_id=p.id','LEFT');
        if(isset($data['collectiontype']) and $data['collectiontype']!=''){
            $this->db->where('p.collectiontype',$data['collectiontype']);    
        }
        if(isset($data['categoryid']) and $data['categoryid']!=''){
            $this->db->where('p.categoryid',$data['categoryid']);    
        }
        if(isset($data['productcode']) and $data['productcode']!=''){
            $this->db->where('p.productcode',$data['productcode']);    
        }
        if(isset($data['name']) and $data['name']!=''){
            $this->db->like('p.name',$data['name']);    
        }
        if(isset($data['description']) and $data['description']!=''){
            $this->db->like('p.description',$data['description']);    
        }
        if(isset($data['pricemin']) and $data['pricemin']!='' and $data['pricemax']!=''){
            if($data['pricemin']!='' and $data['pricemax']!=''  and $data['pricemax']!='0'){
                $this->db->where('price >=', $data['pricemin']);
                $this->db->where('price <=', $data['pricemax']);
            }
            if($data['pricemax']!=''  and $data['pricemax']=='0'){
                $this->db->where('price >=', $data['pricemin']);
            }
        }
        if(isset($data['highlight']) and $data['highlight']!=''){
            $this->db->like('p.highlight',$data['highlight']);    
        }
        if(isset($data['CustomWhere']) and $data['CustomWhere']!=''){
            $this->db->where($data['CustomWhere']);    
        }
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('p.status',$data['status']);    
        }else{
            $this->db->where('p.status','1');    
        }
        $this->db->where('p.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('p.id','DESC');
        }
        $this->db->group_by('p.id');        
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    } 
    function GetProductSingleDetails($data=''){ 
        $this->db->select('p.*,c.name as collectionname,c.shortname as collectionshortname,sc.name as categoryname,pi.image_name');
        $this->db->from('product as p');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
        $this->db->join('sub_category as sc','sc.id=p.categoryid','LEFT');
        $this->db->join('product_image as pi','pi.product_id=p.id','LEFT');
        if(isset($data['id']) and $data['id']!=''){
            $this->db->where('p.id',$data['id']);    
        }
        if(isset($data['slug']) and $data['slug']!=''){
            $this->db->where('p.slug',$data['slug']);    
        }
        if(isset($data['collectiontype']) and $data['collectiontype']!=''){
            $this->db->where('p.collectiontype',$data['collectiontype']);    
        }
        if(isset($data['categoryid']) and $data['categoryid']!=''){
            $this->db->where('p.categoryid',$data['categoryid']);    
        }
        if(isset($data['productcode']) and $data['productcode']!=''){
            $this->db->where('p.productcode',$data['productcode']);    
        }
        if(isset($data['gender']) and $data['gender']!=''){
            $this->db->like('p.gender',$data['gender']);    
        }
        if(isset($data['highlight']) and $data['highlight']!=''){
            $this->db->like('p.highlight',$data['highlight']);    
        }
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('p.status',$data['status']);    
        }else{
            $this->db->where('p.status','1');    
        }
        $this->db->where('p.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('p.id','DESC');
        }
        $this->db->group_by('p.id');        
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get();
        //echo $this->db->last_query();    
        return $query->row_array();
    } 	
	function GetAllCustomerDetails($data='')
	{
		$this->db->select('u.*,c.name as country_name,s.name as state_name');
        $this->db->from('users as u');
		$this->db->join('own_countries c', 'u.country = c.id');
	    $this->db->join('own_states s', 'u.state = s.id');
		 if(isset($data['id']) and $data['id']!=''){
            $this->db->where('u.id',$data['id']);    
        }
        if(isset($data['email']) and $data['email']!=''){
            $this->db->where('u.email',$data['email']);    
        }
        if(isset($data['state']) and $data['state']!=''){
            $this->db->where('u.state',$data['state']);    
        }
        if(isset($data['city']) and $data['city']!=''){
            $this->db->like('u.city',$data['city']);    
        }
        if(isset($data['name']) and $data['name']!=''){
            $this->db->like('u.name',$data['name']);    
        }
        if(isset($data['create_at']) and $data['create_at']!=''){
            $this->db->like('u.created_datetime',$data['create_at']);    
        }
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('u.status',$data['status']);    
        }else{
            $this->db->where('u.status','1');    
        }
      //  $this->db->where('c.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('u.id','DESC');
        }
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }  
        $query=$this->db->get();
       //echo $this->db->last_query();    exit;
        return $query->result_array();
	}
	 
    function GetCustomerDetails($data=''){ 
        //count(o.OrderID) as totalorder,count(fp.id) as totalfavorite
        $this->db->select('u.*');
        $this->db->from('users as u');
        $this->db->join('orders as o','o.CustomerID=u.id','LEFT');
        $this->db->join('customer_favorite_products as fp','fp.customer_id=u.id','LEFT');
        
        if(isset($data['id']) and $data['id']!=''){
            $this->db->where('u.id',$data['id']);    
        }
        if(isset($data['email']) and $data['email']!=''){
            $this->db->where('u.email',$data['email']);    
        }
        if(isset($data['state']) and $data['state']!=''){
            $this->db->where('u.state',$data['state']);    
        }
        if(isset($data['city']) and $data['city']!=''){
            $this->db->like('u.city',$data['city']);    
        }
        if(isset($data['name']) and $data['name']!=''){
            $this->db->like('u.name',$data['name']);    
        }
        if(isset($data['create_at']) and $data['create_at']!=''){
            $this->db->like('u.created_datetime',$data['create_at']);    
        }
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('u.status',$data['status']);    
        }else{
            $this->db->where('u.status','1');    
        }
      //  $this->db->where('c.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('u.id','DESC');
        }
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }  
        $query=$this->db->get();
       //echo $this->db->last_query();    exit;
        return $query->result_array();
    }
    function CheckAlreadyCustomer($email){
        $this->db->select('*');
        $this->db->from('billing_customer');
        $this->db->where('email', $email);
        $this->db->where('status','1');
        $this->db->where('isdelete','0');
        $query = $this->db->get();        
        return $query->row_array();
    }
      
	function CheckAuth($email,$password){
        //check if password is working or not 
        $this->db->select('id');
        $this->db->from('billing_customer');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('status', '1');
        $query = $this->db->get();
        $ApExists = $query->row_array();

        if(count($ApExists) > 0 ){
            //check if user is active or not 
            $this->db->select('*');
            $this->db->from('billing_customer');
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $this->db->where('status', '1');
            $this->db->where('isdelete', '0');
            $query = $this->db->get();
            $AaExists = $query->row_array();
            if(count($AaExists) > 0){
                $AaExists["id"] = $AaExists['id'];
                $AaExists["name"] = $AaExists['name'];
                $AaExists["mobileno"] = $AaExists['mobileno'];
                $AaExists["password"] = $AaExists['password'];
                $AaExists['verifystatus'] ='done';
                $AaExists['logged_in'] = TRUE;
                return $AaExists;
            }else{
                $AaExists["msg"]="Sorry, Your Account has been deactive , contact to administrator";
                $AaExists['logged_in'] = FALSE;
                return $AaExists;
            }

        }else{
            //tell user that your password is wrong here.
            $AaExists["msg"]="Sorry, your password is wrong.";
            $AaExists['logged_in'] = FALSE;
            return $AaExists;
        }
    }
    function GetLastOrderNo(){ 
        $this->db->select('count(OrderID) as totalorder');
        $this->db->from('orders');
        $this->db->order_by('OrderID ','DESC');
        $this->db->limit(1);
        $query=$this->db->get();
        return $query->row_array();
    } 
    function GetOrderDetails($data=''){
        $this->db->select('*');
        $this->db->from('orders');
        if(isset($data['OrderID']) and $data['OrderID']!=''){
            $this->db->where('OrderID',$data['OrderID']);    
        }
        if(isset($data['CustomerID']) and $data['CustomerID']!=''){
            $this->db->where('CustomerID',$data['CustomerID']);    
        }
        if(isset($data['OrderNo']) and $data['OrderNo']!=''){
            $this->db->where('OrderNo',$data['OrderNo']);    
        }
        if(isset($data['OrderDate']) and $data['OrderDate']!=''){
            $this->db->where('OrderDate',$data['OrderDate']);    
        }
        $this->db->where('status','1');
        $this->db->where('isdelete','0');
		$this->db->order_by("OrderID", "DESC");
        $query = $this->db->get();        
        return $query->result_array();
    }

    function GetOrderDetails_new($data=''){
        $this->db->select("customer_bill.*,users.name,users.surname");
        $this->db->from('customer_bill');                
        $this->db->join('users', 'customer_bill.customer_id = users.id','LEFT');
        //$this->db->where('customer_bill.status',1);
        if(isset($data['oreder_date']) and $data['oreder_date']!=''){
            $this->db->where('oreder_date',$data['oreder_date']);    
        }
        $this->db->order_by('customer_bill.order_id','DESC');      

        $query = $this->db->get();        
        return $query->result_array();
    }

    function GetOrderSingleDetails($data=''){
	//	echo "<pre>"; print_r($data);
        $this->db->select('o.*,s.name as statename,o.BillingState as Shippingstatename,bc.name as ShippingcountryName');
        $this->db->from('orders as o');
        $this->db->join('own_states as s','s.id=o.BillingState','LEFT');
		$this->db->join('own_countries as bc','bc.id=o.ShippingCountry','LEFT');

		if(isset($data['OrderID']) and $data['OrderID']!=''){
            $this->db->where('md5(o.OrderID)=',$data['OrderID']);    
        }
        if(isset($data['CustomerID']) and $data['CustomerID']!=''){
            $this->db->where('o.CustomerID',$data['CustomerID']);    
        }
        if(isset($data['OrderNo']) and $data['OrderNo']!=''){
            $this->db->where('o.OrderNo',$data['OrderNo']);    
        }
        if(isset($data['OrderDate']) and $data['OrderDate']!=''){
            $this->db->where('o.OrderDate',$data['OrderDate']);    
        }
        $this->db->where('o.status','1');
        $this->db->where('o.isdelete','0');
        $this->db->order_by("o.OrderID", "DESC");
        $query = $this->db->get();   
		//echo $this->db->last_query();     
        return $query->row_array();
    } 
    function GetOrderProductDetails($data=''){ 
        $this->db->select('op.*,p.name as pname,p.slug as pslug,p.productcode,pi.image_name,count(op.customer_id) as totalcustomer,c.name as collectionname,c.shortname as collectionshortname,pi.image_name');
        $this->db->from('order_products as op');
        $this->db->join('product as p','op.products_id=p.id','LEFT');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');

        $this->db->join('product_image as pi','pi.product_id=op.products_id','LEFT');

        if(isset($data['order_id']) and $data['order_id']!=''){
            $this->db->where('op.order_id',$data['order_id']);    
        }
        if(isset($data['order_no']) and $data['order_no']!=''){
            $this->db->where('op.order_no',$data['order_no']);    
        }
        if(isset($data['order_id']) and $data['order_id']!=''){
            $this->db->where('op.order_id',$data['order_id']);    
        }
        if(isset($data['customer_id']) and $data['customer_id']!=''){
            $this->db->where('op.customer_id',$data['customer_id']);    
        }
        if(isset($data['products_id']) and $data['products_id']!=''){
            $this->db->where('op.products_id',$data['products_id']);    
        }
        
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('op.status',$data['status']);    
        }else{
            $this->db->where('op.status','1');    
        }
        $this->db->where('op.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('op.order_products_id','DESC');
        }
        $this->db->group_by('op.order_products_id');        
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get();
        return $query->result_array();
    }

    function GetOrderSingleDetails_new($data=''){
    //  echo "<pre>"; print_r($data);
        $this->db->select('o.*,o.billing_state_name as Shippingstatename,o.billing_country_name as ShippingcountryName');
        $this->db->from('customer_bill as o');
        if(isset($data['order_id']) and $data['order_id']!=''){
            $this->db->where('md5(o.order_id)=',$data['order_id']);    
        }
        $this->db->order_by("o.order_id", "DESC");
        $query = $this->db->get();   
        //echo $this->db->last_query();     
        return $query->row_array();
    }
    function GetOrderProductDetails_new($data='')
    { 
        $rarr = array();
        $this->db->select('op.*,p.name as pname,p.slug as pslug,p.productcode');
        $this->db->from('customer_bill_detail as op');
        $this->db->join('product as p','op.product_id=p.id','LEFT');
        //$this->db->join('category as c','c.id=p.collectiontype','LEFT');

        //$this->db->join('product_image as pi','pi.product_id=op.product_id','LEFT');

        if(isset($data['order_id']) and $data['order_id']!=''){
            $this->db->where('op.bill_id',$data['order_id']);    
        }
        
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get()->result_array();
        foreach ($query as $key => $v)
        {
            $im = $this->db->select("*")->from('product_image')->where('product_id',$v['product_id'])->get()->row_array();
            $v['image_name'] = $im['image_name'];
            $rarr[] = $v;
        }
        return $rarr;
    } 


    function GetFavoriteProductDetails($data=''){ 
        @$this->db->query("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $this->db->select('f.id, f.customer_id, f.products_id, f.status, f.isdelete, p.name as pname, p.slug as pslug, p.productcode, MAX(pi.image_name) as image_name, c.name as collectionname, c.slug as cate_slug');
        $this->db->from('customer_favorite_products as f');
        $this->db->join('product as p','f.products_id=p.id','LEFT');
		$this->db->join('category c','c.id = p.collectiontype','LEFT');
        $this->db->join('product_image as pi','pi.product_id=f.products_id','LEFT');
        if(isset($data['customer_id']) and $data['customer_id']!=''){
            $this->db->where('f.customer_id',$data['customer_id']);    
        }
        if(isset($data['products_id']) and $data['products_id']!=''){
            $this->db->where('f.products_id',$data['products_id']);    
        }
        
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('f.status',$data['status']);    
        }else{
            $this->db->where('f.status','1');    
        }
        $this->db->where('f.isdelete','0');
        $this->db->group_by(array('f.id', 'f.customer_id', 'f.products_id', 'f.status', 'f.isdelete', 'p.name', 'p.slug', 'p.productcode', 'c.name', 'c.slug'));
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('f.id','DESC');
        }
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get();
        return $query->result_array();
    }

     function Getuseraddress($data=''){ 
        $this->db->select('f.*,c.name as country_name,s.name as state_name,ct.name as city_name');
        $this->db->from('users_address as f');
        $this->db->join('own_countries as c','f.country=c.id','LEFT');
        $this->db->join('own_states as s','f.state=s.id','LEFT');
        $this->db->join('own_cities as ct','f.city=ct.id','LEFT');
        if(isset($data['user_id']) and $data['user_id']!=''){
            $this->db->where('f.user_id',$data['user_id']);    
        }
        
        $this->db->order_by('f.id','DESC');
        $query=$this->db->get();
        return $query->result_array();
    }
    function FavoriteProductDetails($data=''){ 
        $this->db->select('f.*,p.name as pname,p.slug as pslug,p.productcode,count(f.customer_id) as totalcustomer,c.name as collectionname,c.shortname as collectionshortname');
        $this->db->from('customer_favorite_products as f');
        $this->db->join('product as p','f.products_id=p.id','LEFT');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
      //  $this->db->join('product_image as pi','pi.product_id=f.products_id','LEFT');


        if(isset($data['customer_id']) and $data['customer_id']!=''){
            $this->db->where('f.customer_id',$data['customer_id']);    
        }
        if(isset($data['products_id']) and $data['products_id']!=''){
            $this->db->where('f.products_id',$data['products_id']);    
        }
        
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('f.status',$data['status']);    
        }else{
            $this->db->where('f.status','1');    
        }
        $this->db->where('f.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
           //$this->db->order_by('f.id','DESC');
        }
        $this->db->group_by('f.products_id');        
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $this->db->order_by('totalcustomer','DESC');
        $query=$this->db->get();
     //  echo $this->db->last_query();    exit;
        return $query->result_array();
    } 
    function GetProductCollectionDetails($data=''){ 
        $this->db->select('p.*,c.name as collectionname,c.shortname as collectionshortname,sc.name as categoryname,sc.slug as categoryslug,count(p.id) as totalrecord');
        $this->db->from('product as p');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
        $this->db->join('sub_category as sc','sc.id=p.categoryid','LEFT');
        if(isset($data['collectiontype']) and $data['collectiontype']!=''){
            $this->db->where('p.collectiontype',$data['collectiontype']);    
        }
        if(isset($data['categoryid']) and $data['categoryid']!=''){
            $this->db->where('p.categoryid',$data['categoryid']);    
        }
        if(isset($data['productcode']) and $data['productcode']!=''){
            $this->db->where('p.productcode',$data['productcode']);    
        }
        if(isset($data['gender']) and $data['gender']!=''){
            $this->db->like('p.gender',$data['gender']);    
        }
        if(isset($data['pricemin']) and $data['pricemin']!='' and $data['pricemax']!=''){
            if($data['pricemin']!='' and $data['pricemax']!=''  and $data['pricemax']!='0'){
                $this->db->where('price >=', $data['pricemin']);
                $this->db->where('price <=', $data['pricemax']);
            }
            if($data['pricemax']!=''  and $data['pricemax']=='0'){
                $this->db->where('price >=', $data['pricemin']);
            }
        }
        if(isset($data['highlight']) and $data['highlight']!=''){
            $this->db->like('p.highlight',$data['highlight']);    
        }
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('p.status',$data['status']);    
        }else{
            $this->db->where('p.status','1');    
        }
        $this->db->where('p.isdelete','0');
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('p.id','DESC');
        }
        if(isset($data['GroupBy']) and $data['GroupBy']!=''){
            $this->db->group_by($data['GroupBy']);
        }else{
             $this->db->group_by('p.id','DESC');
        }
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get();
        return $query->result_array();
    } 
    function GetProductMinMaxPriceDetails(){ 
        $this->db->select('Min(price) as MinPrice,Max(price) as MaxPrice');
        $this->db->from('product');
        $this->db->limit(1);
        $query=$this->db->get();
        return $query->row_array();
    } 
    function GetProductForSearch($search){
 
        $response = array();
      
        $this->db->select('*');
        $this->db->from('product');
        if(isset($search)){
          // Select record
            $this->db->like('name', $search, 'both');
            //$this->db->where("name like '%".$data['search']."%' ");
            //$this->db->where("description like '%".$data['search']."%' ");
        }
        $records=$this->db->get()->result();
        //echo $this->db->last_query();exit;
        foreach($records as $row ){
            $response[] = array("id"=>$row->id,"name"=>$row->name);
        }
        return $response;
    }
    function GetSearchProductDetails($data=''){ 
        $this->db->select('p.*,c.name as collectionname,c.shortname as collectionshortname,sc.name as categoryname,pi.image_name');
        $this->db->from('product as p');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
        $this->db->join('sub_category as sc','sc.id=p.categoryid','LEFT');
        $this->db->join('product_image as pi','pi.product_id=p.id','LEFT');
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('p.status',$data['status']);    
        }else{
            $this->db->where('p.status','1');    
        }
        $this->db->where('p.isdelete','0');
        if(isset($data['collectiontype']) and $data['collectiontype']!=''){
            $this->db->where('p.collectiontype',$data['collectiontype']);    
        }
        if(isset($data['categoryid']) and $data['categoryid']!=''){
            $this->db->where('p.categoryid',$data['categoryid']);    
        }
        
        if(isset($data['pricemin']) and $data['pricemin']!='' and $data['pricemax']!=''){
            if($data['pricemin']!='' and $data['pricemax']!=''  and $data['pricemax']!='0'){
                $this->db->where('price >=', $data['pricemin']);
                $this->db->where('price <=', $data['pricemax']);
            }
            if($data['pricemax']!=''  and $data['pricemax']=='0'){
                $this->db->where('price >=', $data['pricemin']);
            }
        }
        $this->db->group_start();
        if(isset($data['name']) and $data['name']!=''){
            $this->db->like('p.name',$data['name']);    
        }
        if(isset($data['productcode']) and $data['productcode']!=''){
            $this->db->or_like('p.productcode',$data['productcode']);    
        }
        
        if(isset($data['description']) and $data['description']!=''){
            $this->db->or_like('p.description',$data['description']);    
        }
        if(isset($data['gender']) and $data['gender']!=''){
            
            // if($data['gender']=='MEN' || $data['gender']=='KIDS'){
            //     $this->db->or_like('p.gender',$data['gender'],'after');        
            // }else if($data['gender']=='MEN' || $data['gender']=='KIDS'){
            //     $this->db->or_like('p.gender',$data['gender'],'before');        
            // }else{
            //     $this->db->or_like('p.gender',$data['gender'],'after');        
            // }
            $this->db->or_like('p.gender',$data['gender']);    
        }
        if(isset($data['highlight']) and $data['highlight']!=''){
            $this->db->or_like('p.highlight',$data['highlight']);    
        }
        $this->db->group_end();        
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('p.id','DESC');
        }
        $this->db->group_by('p.id');        
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get();
        //echo $this->db->last_query();    exit;
        return $query->result_array();
    } 
    function GetSearchProductOnPageDetails($data=''){ 
        $this->db->select('p.*,c.name as collectionname,c.shortname as collectionshortname,sc.name as categoryname,pi.image_name');
        $this->db->from('product as p');
        $this->db->join('category as c','c.id=p.collectiontype','LEFT');
        $this->db->join('sub_category as sc','sc.id=p.categoryid','LEFT');
        $this->db->join('product_image as pi','pi.product_id=p.id','LEFT');
        if(isset($data['status']) and $data['status']!=''){
            $this->db->where('p.status',$data['status']);    
        }else{
            $this->db->where('p.status','1');    
        }
        $this->db->where('p.isdelete','0');
        if(isset($data['collectiontype']) and $data['collectiontype']!=''){
            $this->db->where('p.collectiontype',$data['collectiontype']);    
        }
        if(isset($data['categoryid']) and $data['categoryid']!=''){
            $this->db->where('p.categoryid',$data['categoryid']);    
        }
        
        if(isset($data['pricemin']) and $data['pricemin']!='' and $data['pricemax']!=''){
            if($data['pricemin']!='' and $data['pricemax']!=''  and $data['pricemax']!='0'){
                $this->db->where('price >=', $data['pricemin']);
                $this->db->where('price <=', $data['pricemax']);
            }
            if($data['pricemax']!=''  and $data['pricemax']=='0'){
                $this->db->where('price >=', $data['pricemin']);
            }
        }
       
        // Search
        if(isset($data['type']) and $data['type']!='' and $data['type']=='search'){
           $this->db->group_start();
                if(isset($data['name']) and $data['name']!=''){
                    $this->db->like('p.name',$data['name']);    
                }
                if(isset($data['productcode']) and $data['productcode']!=''){
                    $this->db->or_like('p.productcode',$data['productcode']);    
                }        
                if(isset($data['description']) and $data['description']!=''){
                    $this->db->or_like('p.description',$data['description']);    
                }
                if(isset($data['highlight']) and $data['highlight']!=''){
                    $this->db->or_like('p.highlight',$data['highlight']);    
                }
            $this->db->group_end();  

            
            if(isset($data['collection']) and $data['collection']!=''){
                $this->db->group_start();
                $excollection = explode(',',$data['collection']);
                if(!empty($excollection)){
                    $c=1;
                    foreach ($excollection as $key => $value) {
                        if($value!=''){
                            if($c==1){
                                $this->db->like('p.collectiontype',$value);      
                            }else{
                                $this->db->or_like('p.collectiontype',$value);  
                            }                                
                            $c++;  
                        }
                    }
                }            
                $this->db->group_end();  
            }
            
            if(isset($data['genders']) and $data['genders']!=''){
                $this->db->group_start();
                    $exgenders = explode(',',$data['genders']);
                    if(!empty($exgenders)){
                        $c=1;
                        foreach ($exgenders as $key => $value) {
                            if($value!=''){
                                if($c==1){
                                    if($value=='MEN' || $value=='KIDS'){
                                        $this->db->like('p.gender',$value,'after');           
                                    }else if($value=='WOMEN'){
                                        $this->db->like('p.gender',$value,'before');      
                                    }else{
                                        $this->db->like('p.gender',$value,'after');           
                                    }
                                    //$this->db->like('p.gender',$value,'after');       
                                }else{
                                    if($value=='MEN' || $value=='KIDS'){
                                        $this->db->or_like('p.gender',$value,'after');           
                                    }else if($value=='WOMEN'){
                                        $this->db->or_like('p.gender',$value,'before');      
                                    }else{
                                        $this->db->or_like('p.gender',$value,'after');           
                                    }
                                    //$this->db->or_like('p.gender',$value,'after');    
                                }                                
                                $c++; 
                                
                            }
                        }
                    } 
                $this->db->group_end();  
            }else{
                if(isset($data['gender']) and $data['gender']!=''){
                    $this->db->like('p.gender',$data['gender']);    
                }
            }
            

        }else{

             if(isset($data['name']) and $data['name']!=''){
                $this->db->group_start();
                if(isset($data['name']) and $data['name']!=''){
                    $this->db->like('p.name',$data['name']);    
                }
                if(isset($data['productcode']) and $data['productcode']!=''){
                    $this->db->or_like('p.productcode',$data['productcode']);    
                }        
                if(isset($data['description']) and $data['description']!=''){
                    $this->db->or_like('p.description',$data['description']);    
                }
                if(isset($data['highlight']) and $data['highlight']!=''){
                    $this->db->or_like('p.highlight',$data['highlight']);    
                }
                $this->db->group_end(); 
            }

            if(isset($data['collection']) and $data['collection']!=''){
                $this->db->group_start();
                $excollection = explode(',',$data['collection']);
                if(!empty($excollection)){
                    $c=1;
                    foreach ($excollection as $key => $value) {
                        if($value!=''){
                            if($c==1){
                                $this->db->like('p.collectiontype',$value);      
                            }else{
                                $this->db->or_like('p.collectiontype',$value);  
                            }                                
                            $c++;  
                        }
                    }
                }            
                $this->db->group_end();  
            }
            
            if(isset($data['genders']) and $data['genders']!=''){
                $this->db->group_start();
                    $exgenders = explode(',',$data['genders']);
                    if(!empty($exgenders)){
                        $c=1;
                        foreach ($exgenders as $key => $value) {
                            if($value!=''){
                                if($c==1){
                                    if($value=='MEN' || $value=='KIDS'){
                                        $this->db->like('p.gender',$value,'after');           
                                    }else if($value=='WOMEN'){
                                        $this->db->like('p.gender',$value,'before');      
                                    }else{
                                        $this->db->like('p.gender',$value,'after');           
                                    }
                                    //$this->db->like('p.gender',$value,'after');       
                                }else{
                                    if($value=='MEN' || $value=='KIDS'){
                                        $this->db->or_like('p.gender',$value,'after');           
                                    }else if($value=='WOMEN'){
                                        $this->db->or_like('p.gender',$value,'before');      
                                    }else{
                                        $this->db->or_like('p.gender',$value,'after');           
                                    }
                                    //$this->db->or_like('p.gender',$value,'after');    
                                }  
                                
                                // if($c==1){
                                //   $this->db->like('p.gender',$value,'after');       
                                // }else{
                                //   $this->db->or_like('p.gender',$value,'after');    
                                // }                                
                                $c++; 
                                
                            }
                        }
                    } 
                $this->db->group_end();  
            }else{
                if(isset($data['gender']) and $data['gender']!=''){
                    $this->db->like('p.gender',$data['gender']);    
                }
            }    
        }
        if(isset($data['OrderBy']) and $data['OrderBy']!=''){
            $this->db->order_by($data['OrderBy'], $data['order']);
        }else{
             $this->db->order_by('p.id','DESC');
        }
        $this->db->group_by('p.id');        
        if(isset($data['Limit']) and $data['Limit']!=''){
            $this->db->limit($data['Limit']);
        }
        $query=$this->db->get();
        //echo $this->db->last_query();    exit;
        return $query->result_array();
    }
    function GetStateDetails($data=''){
        $this->db->select('*');
        $this->db->from('billing_state');
        if(isset($data['name']) and $data['name']!=''){
            $this->db->where('name',$data['name']);    
        }
        if(isset($data['country_id']) and $data['country_id']!=''){
            $this->db->where('country_id',$data['country_id']);    
        }
        $this->db->where('status','1');
        $this->db->order_by("name", "ASC");
        $query = $this->db->get();  
        //echo $this->db->last_query();          
        return $query->result_array();
    } 
	
	public function getProductsAdmin($id="")
	{
		$this->db->select("p.*,c.name as collectionname,pi.image_name");
		$this->db->from('product p');
		$this->db->join('category c','c.id = p.collectiontype','LEFT');
		$this->db->join('product_image pi','pi.product_id=p.id','LEFT');
		if($id != ""){
			$this->db->where('p.id', $id);	
			$query=$this->db->get();
			return $query->row_array();
		} else{
			$this->db->group_by('p.id');    
			$query=$this->db->order_by('p.id','desc');
			$query=$this->db->get();			
			return $query->result_array();
		}
	}
    
    //FOR VENUS PRODUCT SERACH FILTER
    public function get_count_product($table,$status=1,$where="") {
        $this->db->select('b.*,c.name as category_name');
        $this->db->from('product b');
        if(!empty($where))
        {
            $this->db->where($where);
        }
        if(isset($_SESSION['txt_search']) && $_SESSION['txt_search']!="")
        {
            $this->db->group_start();
            $this->db->or_like('b.name',trim($_SESSION['txt_search']));
            $this->db->or_like('c.name',trim($_SESSION['txt_search']));
            $this->db->group_end();
        }
        
        $this->db->join('category c','b.collectiontype = c.id','left');        
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_limit_data_product_where($limit,$start,$table,$where,$column_name="id",$order_by="DESC") 
    {
        $this->db->select('b.*,c.name as category_name,c.slug as cate_slug');
        $this->db->from('product b');
        if(!empty($where))
        {
            $this->db->where($where);
        }
        if(isset($_SESSION['txt_search']) && $_SESSION['txt_search']!="")
        {
            $this->db->group_start();
            $this->db->or_like('b.name',trim($_SESSION['txt_search']));
            $this->db->or_like('c.name',trim($_SESSION['txt_search']));
            $this->db->group_end();
        }
        $this->db->join('category c','b.collectiontype = c.id','left');        
        $this->db->limit($limit, $start);
        $query = $this->db->get();
    
        return $query->result_array();
    }
    //////////////////////////////////////////////////
	
	public function get_product_reviews($id)
	{
		$this->db->select("product_reviews.*, product.name, category.name as cat_name");
		$this->db->from('product_reviews');                
		$this->db->join('product', 'product.id = product_reviews.product_id', 'LEFT');
		$this->db->join('category', 'product.collectiontype = category.id', 'LEFT');
		$this->db->where('product_reviews.id', $id);
		$query1 = $this->db->get();
		return $query1 ? $query1->row_array() : array();	
	}
	
}
?>