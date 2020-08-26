<?php

/**
 * Description of Admin_model
 *
 * 
 */
class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin()
    {
        $em = $this->input->post('email');
        $pass = $this->input->post('pass');
       $sel =  $this->db->get_where('admin',['email'=>$em,'password'=>$pass]);
       return $sel->row_array();
    }
    
    public function tenderList()
    {
        $this->db->select('tender.user_id,tender.image,tender.name,tender.email,tender.phone');
        $this->db->from('tender');
        $this->db->order_by('user_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function tenderDetails($id)
    {
        $this->db->select('tender.*');
        $this->db->from('tender');
        $this->db->where('user_id',$id);
        // $this->db->order_by('user_id','desc');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function locations()
    {
        $this->db->select('*');
        $this->db->from('locations');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function allaoi()
    {
        $this->db->select('*');
        $this->db->from('aoi');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function doAddSubcategory($aoi_id,$sub_category)
    {
        $data  = array(
            'aoi_id'=>$aoi_id,
            'aoi_desc'=>$sub_category
            );
        $this->db->insert('aoi_description',$data);
        return $this->db->insert_id();
    }
    
    public function allcontractors()
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,marketplace.plan_type,marketplace.email,contractor_details.image');
        $this->db->from('marketplace');
        $this->db->join('contractor_details','contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('type','contractor');
        $this->db->order_by('marketplace.market_user_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function allsub_cont()
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,marketplace.email,marketplace.plan_type,sub_contractor_details.image');
        $this->db->from('marketplace');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('type','sub_contractor');
         $this->db->order_by('marketplace.market_user_id','desc');
         $this->db->group_by('marketplace.market_user_id');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function allLabours()
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,marketplace.email,marketplace.plan_type,labour_details.image');
        $this->db->from('marketplace');
        $this->db->join('labour_details','labour_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.type','labour');
        $this->db->order_by('marketplace.market_user_id','desc');
        $this->db->group_by('marketplace.market_user_id');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    
    
    public function allSuppliers()
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,marketplace.email,marketplace.plan_type,supplier_details.image');
        $this->db->from('marketplace');
        $this->db->join('supplier_details','supplier_details.market_user_id=marketplace.market_user_id');
        $this->db->where('type','supplier');
        $this->db->order_by('marketplace.market_user_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function tenderCount()
    {
        $this->db->select('*');
        $this->db->from('tender');
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function contractorcount()
    {
        $this->db->select('marketplace.*,contractor_details.image');
        $this->db->from('marketplace');
        $this->db->join('contractor_details','contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('type','contractor');
        $sel = $this->db->get();
        
        return $sel->num_rows();
    }
    
    public function subcontractorcount()
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('type','sub_contractor');
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    public function labourcount()
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('type','labour');
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function suppliercount()
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('type','supplier');
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function contractorDetails($id)
    {
        $this->db->select('marketplace.*,contractor_details.*');
        $this->db->from('marketplace');
        $this->db->join('contractor_details','contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function subcontDetails($id)
    {
        $this->db->select('marketplace.*,sub_contractor_details.*');
        $this->db->from('marketplace');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function labourDetails($id)
    {
        $this->db->select('marketplace.*,labour_details.*');
        $this->db->from('marketplace');
        $this->db->join('labour_details','labour_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function supplierDetails($id)
    {
        $this->db->select('marketplace.*,supplier_details.*');
        $this->db->from('marketplace');
        $this->db->join('supplier_details','supplier_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function aoisubCategory()
    {
        $this->db->select('aoi_description.aoi_desc,aoi_description.aoi_id');
        $this->db->from('aoi_description');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function doaddcontractorsubscription($price,$package,$id,$bids)
    {
          $this->db->where('id',$id);
		  $this->db->update('marketplace_subscription',['package_type'=>$package,'price'=>$price,'bids'=>$bids]);
		  return $this->db->affected_rows();
    }
	
	public function contractorplanbyid($id)
	{
		$this->db->select('marketplace_subscription.id,marketplace_subscription.price,marketplace_subscription.package_type');
		$this->db->from('marketplace_subscription');
		$this->db->where('type','contractor');
		$this->db->where('id',$id);
		$sel = $this->db->get();
		return $sel->row_array();
	}
     
    public function supplierplanbyid($id)
	{
		$this->db->select('marketplace_subscription.id,marketplace_subscription.price,marketplace_subscription.package_type');
		$this->db->from('marketplace_subscription');
		$this->db->where('type','supplier');
		$this->db->where('id',$id);
		$sel = $this->db->get();
		return $sel->row_array();
		
	}
    	 
    
    
    public function getcontractorSubscription()
    {
        $this->db->select('*');
        $this->db->from('marketplace_subscription');
        $this->db->where('type','contractor');
        $sel = $this->db->get();
        return $sel->result_array();
    }
	
	public function getsubContractorSubscription()
	{
		$this->db->select('*');
        $this->db->from('marketplace_subscription');
        $this->db->where('type','sub_contractor');
        $sel = $this->db->get();
        return $sel->result_array();
	}
	
	public function subcontplanbyid($id)
	{
		$this->db->select('marketplace_subscription.id,marketplace_subscription.price,marketplace_subscription.package_type');
		$this->db->from('marketplace_subscription');
		$this->db->where('type','sub_contractor');
		$this->db->where('id',$id);
		$sel = $this->db->get();
		return $sel->row_array();
	}
    
    public function getsupplierSubscription()
    {
        $this->db->select('*');
        $this->db->from('marketplace_subscription');
        $this->db->where('type','supplier');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function delcontractorplan($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('marketplace_subscription');
        return $this->db->affected_rows();
    }
    
    public function delcont($id)
    {
        $this->db->where('market_user_id',$id);
        $this->db->delete('marketplace');
        $this->db->where('market_user_id',$id);
        $this->db->delete('contractor_details');
        return $this->db->affected_rows();
    }
	
	public function delsubcontractor($id)
	{
	    $this->db->where('market_user_id',$id);
        $this->db->delete('marketplace');
        $this->db->where('market_user_id',$id);
        $this->db->delete('sub_contractor_details');
        return $this->db->affected_rows();
	}
	
	public function dellabour($id)
	{
	    $this->db->where('market_user_id',$id);
        $this->db->delete('marketplace');
        $this->db->where('market_user_id',$id);
        $this->db->delete('labour_details');
        return $this->db->affected_rows();
	}
	
	public function delsupplier($id)
	{
	    $this->db->where('market_user_id',$id);
        $this->db->delete('marketplace');
        $this->db->where('market_user_id',$id);
        $this->db->delete('supplier_details');
        return $this->db->affected_rows();
	}
	
	public function deltender($id)
	{
	    $this->db->where('user_id',$id);
        $this->db->delete('tender');
        return $this->db->affected_rows();
	}
	public function delsubcontplan($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('marketplace_subscription');
        return $this->db->affected_rows();
	}
    
    public function doaddaboutus($text,$id)
    {
        // $this->db->insert('app_setting',['text'=>$text,'type'=>'About Us']);
        // return $this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('app_setting',['text'=>$text]);
        return $this->db->affected_rows();
    }
    
    
    
    public function getaboutus()
    {
        $this->db->select('*');
        $this->db->from('app_setting');
        $this->db->where('type','About Us');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function gettnc()
    {
       $this->db->select('*');
        $this->db->from('app_setting');
        $this->db->where('type','Terms and Conditions');
        $sel = $this->db->get();
        return $sel->row_array(); 
    }
    
    public function privacy()
    {
        $this->db->select('*');
        $this->db->from('app_setting');
        $this->db->where('type','Privacy Policy');
        $sel = $this->db->get();
        return $sel->row_array(); 
    }
    
    public function getFaq()
    {
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->order_by('faq_id','desc');
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    public function doaddfaq($faq)
    {
        $this->db->insert('faq',['faq'=>$faq]);
        return $this->db->insert_id();
    }
    
    public function deleteFaq($id)
    {
        $this->db->where('faq_id',$id);
        $this->db->delete('faq');
        return $this->db->affected_rows();
    }
    
    public function faqDesc()
    {
        $this->db->select('*');
        $this->db->from('faq_desc');
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    public function doAddFaqDescription($faq_desc,$id)
    {
        $this->db->insert('faq_desc',['faq_desc'=>$faq_desc,'faq_id'=>$id]);
        return $this->db->insert_id();
        
    }
    
    public function do_check_oldpassword($email){
        $oldpassword = $this->input->post('op');
        $query = $this->db->get_where('admin', ['email'=>$email, 'password'=>$oldpassword]);
        return $query->row_array();
    }
    
    public function reset_password($email){
        $newpassword = $this->input->post('np');
        $this->db->update('admin', ['password'=>$newpassword], ['email'=>$email]);
        return $this->db->affected_rows();
    }
    
    public function doAddTenderNotification($title,$text){
        $data = array(
            'title'=>$title,
            'notification'=>$text
            );
            $this->db->insert('tender_notification',$data);
            return $this->db->insert_id();
    }
    
    public function getTenderNotifications(){
        $this->db->select('*');
        $this->db->from('tender_notification');
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    public function getMarketplaceNotifications(){
        $this->db->select('*');
        $this->db->from('marketplace_notification');
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    public function doAddMarketplaceNotification($title,$text){
        $data = array(
            'title'=>$title,
            'notification'=>$text
            );
            $this->db->insert('marketplace_notification',$data);
            return $this->db->insert_id();
    }
    
    public function delmarketplaceNoti($id){
        $this->db->where('id',$id);
        $this->db->delete('marketplace_notification');
        return $this->db->affected_rows();
    }
    
    public function delTenderNoti($id){
        $this->db->where('id',$id);
        $this->db->delete('tender_notification');
        return $this->db->affected_rows();
    }
    
    public function getTransactions(){
        $this->db->select('payment.*,marketplace.name');
        $this->db->from('payment');
        $this->db->join('marketplace','marketplace.market_user_id=payment.market_user_id');
        $sel = $this->db->get();
        return $sel->result_array();
    }

}
