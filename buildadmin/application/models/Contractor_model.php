<?php


class Contractor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function checkmail($email)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('email',$email);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function signUp($name,$email,$phone,$pass)
    {
        $this->db->insert('marketplace',['name' => $name,'email'=>$email,'phone'=>$phone,'password'=>$pass,'time'=>date('Y-m-d')]);
        $id =  $this->db->insert_id();
        $sel = $this->db->get_where('marketplace',['market_user_id'=>$id]);
        return $sel->row_array();
    }
    
    public function Login($email,$pass)
    {
        
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('email',$email);
        $this->db->where('password',$pass);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function contractorDetails($contractor_id,$company_name,$capablity,$aoi,$work_exp,$cost_range,$file1,$file2,$link)
    {
        $data = array(
            'market_user_id'=>$contractor_id,
            'company_name'=>$company_name,
            'capablity'=>$capablity,
            // 'location'=>$location,
            
            'work_exp'=>$work_exp,
            'cost_range'=>$cost_range,
            'image'=>$file1,
            'statutory'=>$file2,
            'time'=>date('Y-m-d'),
            'link'=>$link
            
            );
            $this->db->insert('contractor_details',$data);
            $id =  $this->db->insert_id();
            $this->db->where('market_user_id',$contractor_id);
            $this->db->update('marketplace',['type'=>'contractor']);
            // return $this->db->affected_rows();	
            $this->db->select('contractor_details.image,marketplace.*');
            $this->db->from('contractor_details');
            $this->db->join('marketplace','marketplace.market_user_id=contractor_details.market_user_id');
            $this->db->where('contractor_details.market_user_id',$contractor_id);
            $sel = $this->db->get();
            return $sel->row_array();
            
            
    }
    
    public function contractorDetailsupdate($name,$contractor_id,$company_name,$capablity,$aoi,$work_exp,$cost_range,$file1,$file2,$link)
    {
        $data = array(
            
            'company_name'=>$company_name,
            'capablity'=>$capablity,
            // 'location'=>$location,
            
            'work_exp'=>$work_exp,
            'cost_range'=>$cost_range,
            'image'=>$file1,
            'statutory'=>$file2,
            'time'=>date('Y-m-d'),
            'link'=>$link
            
            );
            
            $this->db->where('market_user_id',$contractor_id);
            $this->db->update('contractor_details',$data);
            $this->db->where('market_user_id',$contractor_id);
            $this->db->update('marketplace',['name'=>$name]);
            $this->db->select('contractor_details.image,marketplace.*');
            $this->db->from('contractor_details');
            $this->db->join('marketplace','marketplace.market_user_id=contractor_details.market_user_id');
            $this->db->where('contractor_details.market_user_id',$contractor_id);
            $sel = $this->db->get();
            return $sel->row_array();
            // return true;
    }
    
    public function contractorQualification($qualify,$contractor_id)
    {
        $this->db->insert('marketplace_qualification',['market_user_id'=>$contractor_id,'qualification'=>$qualify]);
        return $this->db->insert_id();
    }
    
    public function contracterLocation($loc,$contractor_id)
    {
        $this->db->insert('marketplace_location',['market_user_id'=>$contractor_id,'location_id'=>$loc]);
        return $this->db->insert_id();
    }
    
    public function typeupdate($contractor_id)
    {
        $this->db->where('market_user_id',$contractor_id);
        $this->db->update('marketplace',['type'=>'contractor']);
        return $this->db->affected_rows();
    }
    
    public function messagesRequest($contractor_id)
    {
        $this->db->select('user_contractor_contact.description,user_contractor_contact.ucc_id,tender.name,tender.user_id,tender.image,locations.location');
        $this->db->from('user_contractor_contact');
        $this->db->join('tender','user_contractor_contact.user_id=tender.user_id');
        $this->db->join('locations','locations.location_id=user_contractor_contact.location_id');
        $this->db->where('market_user_id',$contractor_id);
        $this->db->where('user_contractor_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function bidChatRequest($contractor_id)
    {
        $this->db->select('tender.unique_id,tender.image,tender.name');
        $this->db->from('contractor_bid');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_bid.contractor_id');
        $this->db->join('tender','tender.user_id=contractor_bid.user_id');
        $this->db->where('contractor_bid.contractor_id',$contractor_id);
        $this->db->where('contractor_bid.response','1');
        // $this->db->group_by('user_post.post_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function labourChatRequest($contractor_id)
    {
       $this->db->select('marketplace.name,marketplace.type,contractor_labour_contact.labour_id as unique_id,labour_details.image');
        $this->db->from('contractor_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_labour_contact.labour_id');
        $this->db->join('labour_details','labour_details.market_user_id=contractor_labour_contact.labour_id');
        // $this->db->join('locations','locations.location_id=contractor_labour_contact.location_id');
        $this->db->where('contractor_labour_contact.contractor_id',$contractor_id);
        $this->db->where('contractor_labour_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array(); 
        
    }
    
    public function sub_contractor_chatRequest($contractor_id)
    {
       $this->db->select('contractor_sc_contact.sub_contractor_id as unique_id,marketplace.name,,marketplace.type,sub_contractor_details.image');
        $this->db->from('contractor_sc_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_sc_contact.sub_contractor_id');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=contractor_sc_contact.sub_contractor_id');
        // $this->db->join('locations','locations.location_id=contractor_sc_contact.location_id');
        $this->db->where('contractor_sc_contact.contractor_id',$contractor_id);
        $this->db->where('contractor_sc_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array(); 
        
    }
    
    public function supplier_equip_chat($contractor_id)
    {
        $this->db->select('supplier_details.image,supplier_details.market_user_id as unique_id,marketplace.name,marketplace.type,');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.equipment_id');
        $this->db->join('supplier_details','supplier_details.market_user_id=contractor_equipment_contact.equipment_id');
        // $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        $this->db->where('contractor_equipment_contact.market_user_id',$contractor_id);
        $this->db->where('contractor_equipment_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function supplier_mat_chat($contractor_id)
    {
        $this->db->select('supplier_details.image,supplier_details.market_user_id as unique_id,marketplace.name,marketplace.type,');
        $this->db->from('contractor_material_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.material_id');
        $this->db->join('supplier_details','supplier_details.market_user_id=contractor_material_contact.material_id');
        // $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        $this->db->where('contractor_material_contact.market_user_id',$contractor_id);
        $this->db->where('contractor_material_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    
    public function bidding($cost_range,$available,$desc,$contractor_id,$user_id,$post_id,$cost_m2,$duration,$link,$site_visit,$ucc_id)
    {
        $data = array(
            'contractor_id'=>$contractor_id,
            'user_id'=>$user_id,
            'cost_range'=>$cost_range,
            'availablity'=>$available,
            'description'=>$desc,
             'user_post_id'=>$post_id,
            'time'=>date('Y-m-d'),
            'response'=>'',
            'cost_m2'=>$cost_m2,
            'duration'=>$duration,
            'link'=>$link,
            'site_visit'=>$site_visit,
            'ucc_id'=>$ucc_id
            
           
            );
        
        $this->db->insert('contractor_bid',$data);
        return $this->db->insert_id();
        // $this->db->where('market_user_id',$contractor_id);
        
    }
    
    public function getpostid($id)
    {
        $this->db->select('contractor_bid.ucc_id');
        $this->db->from('contractor_bid');
        $this->db->where('bid_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function hidepost($post_id)
    {
        $this->db->where('ucc_id',$post_id);
        $this->db->update('user_contractor_contact',['response'=>'0']);
        return $this->db->affected_rows();
    }
    
    // public function getBids($contractor_id)
    // {
    //     // $sel = $this->db->get_where('contractor_details',['market_user_id'=>$contractor_id]);
    //     // return $sel->row_array();
    //     $this->db->select('contractor_details.bids');
    //     $this->db->from('contractor_details');
    //     $this->db->where('market_user_id',$contractor_id);
    //     $sel = $this->db->get();
    //     return $sel->row_array();
    // }
    
    public function addProject($contractor_id,$name,$location,$price)
    {
        $data = array(
            'contractor_id'=>$contractor_id,
            'name'=>$name,
            'location_id'=>$location,
            'price'=>$price
            );
            
            $this->db->insert('marketplace_project',$data);
            return $this->db->insert_id();
    }
    
    public function projectimages($file,$project_id)
    {
        $this->db->insert('marketplace_project_images',['project_id'=>$project_id,'images'=>$file]);
        return $this->db->insert_id();
    }
    
    public function contractor_labour_contact($contractor_id,$labour_id,$title,$location,$startdate,$enddate,$desc)
    {
        
        $data = array(
            'contractor_id'=>$contractor_id,
            'labour_id'=>$labour_id,
            'title'=>$title,
            'location_id'=>$location,
            'start_date'=>$startdate,
            'end_date'=>$enddate,
            'description'=>$desc,
            'time'=>date('Y-m-d'),
            'response'=>'',
            );
            
            $this->db->insert('contractor_labour_contact',$data);
            return $this->db->insert_id();
    }
    
    public function viewProjects($project_id)
    {
        $this->db->select('marketplace_project.*,locations.location');
        $this->db->from('marketplace_project');
        $this->db->join('locations','locations.location_id=marketplace_project.location_id');
        $this->db->where('project_id',$project_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function homescreenListing($type,$id=null)
    {
        if($type == 'labour')
        {
            $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.wages,'.$type.'_details.image,marketplace_location.market_user_id,locations.location');
        }
        else
        { 
            $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.cost_range,'.$type.'_details.image,marketplace_location.*,locations.*');
        }
        
        $this->db->from('marketplace');
        $this->db->join($type.'_details','marketplace.market_user_id='.$type.'_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where('type',$type);
        $this->db->order_by('marketplace.market_user_id','desc');
        if(!empty($id)){
        $this->db->where('marketplace.market_user_id <',$id);
        $this->db->limit(6);
        }else{
        $this->db->limit(6);
        }
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getequipmentlists($id=null)
    {
        $arr = ['sub_contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->order_by('supplier_equip_post.market_user_id','desc');
        $this->db->where('supplier_equip_post.status','Active');
        $this->db->where_in('marketplace.type', $arr);
        if(!empty($id)){
        $this->db->where('marketplace.market_user_id <',$id);
        $this->db->limit(6);
        }else{
        $this->db->limit(6);
        }
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function supplierequipCount()
    {
        $arr = ['sub_contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->order_by('supplier_equip_post.market_user_id','desc');
        $this->db->where('supplier_equip_post.status','Active');
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function getmaterialLists($id=null)
    {
        $arr = ['sub_contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->order_by('supplier_material_post.market_user_id','desc');
        $this->db->where('supplier_material_post.status','Active');
        $this->db->where_in('marketplace.type', $arr);
        if(!empty($id)){
        $this->db->where('marketplace.market_user_id <',$id);
        $this->db->limit(6);
        }else{
        $this->db->limit(6);
        }
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function suppliermatCount()
    {
        $arr = ['sub_contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->order_by('supplier_material_post.market_user_id','desc');
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
        
    
    
    public function getequipmentimg($id)
    {
        // $sel = $this->db->get_where('supplier_equip_post_images.images',['supplier_equip_id'=>$id]);
        // return $sel->row_array();
        $this->db->select('supplier_equip_post_images.images');
        $this->db->from('supplier_equip_post_images');
        $this->db->where('supplier_equip_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    public function getmaterialimg($id)
    {
        $this->db->select('supplier_material_post_images.images');
        $this->db->from('supplier_material_post_images');
        $this->db->where('supplier_mat_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function contractoraoi($a,$contractor_id)
    {
        $this->db->insert('marketplace_aoi',['market_user_id'=>$contractor_id,'aoi_desc_id'=>$a]);
        return $this->db->insert_id();
    }
    
    public function getTenderList($id=null)
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_post.title,user_post.post_id,user_post.location_id,user_post.cost_to,user_post.cost_from,user_post.time,locations.location');
        $this->db->from('tender');
        $this->db->join('user_post','user_post.user_id=tender.user_id');
        $this->db->join('locations','locations.location_id=user_post.location_id');
        $this->db->order_by('user_id', 'desc');
        $this->db->where('user_post.status','Active');
        $this->db->limit('10');
        if(!empty($id)){
        $this->db->where('tender.user_id <',$id);
        $this->db->limit(6);
        }else{
        $this->db->limit(6);
        }
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function contractor_sc_contact($contractor_id,$sub_cont_id,$title,$location_id,$plot,$built,$cost_to,$cost_from,$start_date,$end_date,$quality,$desc)
    {
        $data = array(
            'contractor_id'=>$contractor_id,
            'sub_contractor_id'=>$sub_cont_id,
            'title'=>$title,
            'location_id'=>$location_id,
            'plot_area'=>$plot,
            'built'=>$built,
            'cost_to'=>$cost_to,
            'cost_from'=>$cost_from,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'quality'=>$quality,
            'description'=>$desc,
            'time'=>date('Y-m-d'),
            'response'=>'',
            );
            $this->db->insert('contractor_sc_contact',$data);
            return $this->db->insert_id();
    }
    
    public function LoginwithFacebook($name,$email,$phone=null,$password=null)
    {
        $ins = $this->db->insert('marketplace',['name'=>$name,'email'=>$email,'phone'=>$phone,'password'=>$password]);
        $id =  $this->db->insert_id();
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function tenderUserDetails($id)
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_post.*,locations.location');
        $this->db->from('tender');
        $this->db->join('user_post','user_post.user_id=tender.user_id');
        $this->db->join('locations','locations.location_id=user_post.location_id');
        // $this->db->order_by('user_id', 'RANDOM');
        // $this->db->limit('10');
        $this->db->where('user_post.post_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getTenderAoi($post_id)
    {
        $this->db->select('aoi_description.aoi_desc');
        $this->db->from('aoi_description');
        $this->db->join('user_post_aoi','user_post_aoi.aoi_desc_id=aoi_description.aoi_desc_id');
        $this->db->where('user_post_aoi.post_id',$post_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getpostimages($post_id)
    {
        $this->db->select('user_post_images.images,user_post_images.id');
        $this->db->from('user_post_images');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function marketusersDetails($id,$type)
    {
        if($type == 'labour')
        {
            $this->db->select('marketplace.*,'.$type.'_details.*,marketplace_location.market_user_id,locations.location,marketplace_skills.*,skills.*');
        }
        else
        {
            $this->db->select('marketplace.*,'.$type.'_details.*,marketplace_location.market_user_id,locations.location');
        }
        $this->db->from('marketplace');
        $this->db->join($type.'_details','marketplace.market_user_id='.$type.'_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        if($type == 'labour')
        {
        $this->db->join('marketplace_skills','marketplace_skills.market_user_id=marketplace.market_user_id');
        $this->db->join('skills','skills.skill_id=marketplace_skills.skill_id');
        }
        $this->db->where('marketplace.market_user_id',$id);
        $this->db->where('marketplace.type',$type);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    
    public function getequipmentlistsbyid($id)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where('supplier_equip_post.supplier_equip_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getmaterialListsbyid($id)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where('supplier_material_post.supplier_mat_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getequipmentimgdetails($supplier_equip_id)
    {
        // $sel = $this->db->get_where('supplier_equip_post_images.images',['supplier_equip_id'=>$id]);
        // return $sel->row_array();
        $this->db->select('supplier_equip_post_images.images');
        $this->db->from('supplier_equip_post_images');
        $this->db->where('supplier_equip_id',$supplier_equip_id);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    
    public function getmaterialimgdetails($supplier_mat_id)
    {
        $this->db->select('supplier_material_post_images.images');
        $this->db->from('supplier_material_post_images');
        $this->db->where('supplier_mat_id',$supplier_mat_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function homescreenSearch($field,$type)
    {
      if($type == 'labour')
        {
            $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.wages,'.$type.'_details.image,marketplace_location.market_user_id,locations.location');
        }
        else
        {
            $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.cost_range,'.$type.'_details.image,marketplace_location.*,locations.*');
        }
        
        $this->db->from('marketplace');
        $this->db->join($type.'_details','marketplace.market_user_id='.$type.'_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where("marketplace.name LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();  
        
    }
    
    
    
    public function materialSearch($field)
    {
        $arr = ['sub_contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        // $this->db->or_where("marketplace.name LIKE '%$field%'");
        // $this->db->or_where("supplier_material_post.title LIKE '%$field%'");
        $this->db->where("(marketplace.name LIKE '%$field%' OR supplier_material_post.title LIKE '%$field%')");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getProfileData($contractor_id)
    {
        $this->db->select('contractor_details.*,marketplace.name');
        $this->db->from('contractor_details');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_details.market_user_id');
        // $this->db->join('marketplace_aoi','marketplace_aoi.market_user_id=contractor_details.market_user_id');
        // $this->db->join('aoi_description','aoi_description.aoi_desc_id=marketplace_aoi.aoi_desc_id');
        // $this->db->join('marketplace_location','marketplace_location.market_user_id=contractor_details.market_user_id');
        // $this->db->join('locations','locations.location_id=marketplace_location.location_id');
        // $this->db->join('marketplace_qualification','marketplace_qualification.market_user_id=contractor_details.market_user_id');
        $this->db->where('contractor_details.market_user_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function delLocations($contractor_id)
    {
        $this->db->where('market_user_id',$contractor_id);
        $this->db->delete('marketplace_location');
        return $this->db->affected_rows();
    }
    
    public function delqualifications($contractor_id)
    {
        $this->db->where('market_user_id',$contractor_id);
        $this->db->delete('marketplace_qualification');
        return $this->db->affected_rows();
    }
    
    public function delaoi($contractor_id)
    {
       $this->db->where('market_user_id',$contractor_id);
        $this->db->delete('marketplace_aoi');
        return $this->db->affected_rows(); 
    }
    
    public function getProfilequalification($contractor_id)
    {
        // $sel = $this->db->get_where('marketplace_qualification',['market_user_id',$contractor_id]);
        // return $sel->result_array();
        
        $this->db->select('marketplace_qualification.qualification');
        $this->db->from('marketplace_qualification');
        $this->db->where('market_user_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getProfileLocation($contractor_id)
    {
        $this->db->select('marketplace_location.location_id,locations.location,locations.location_id');
        $this->db->from('marketplace_location');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->where('market_user_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getProfileaoi($contractor_id)
    {
        $this->db->select('marketplace_aoi.aoi_desc_id,aoi_description.aoi_desc,aoi_description.aoi_desc_id');
        $this->db->from('marketplace_aoi');
        $this->db->join('aoi_description','aoi_description.aoi_desc_id=marketplace_aoi.aoi_desc_id');
        $this->db->where('market_user_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function checkold($old_pass,$user_id)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('password',$old_pass);
        $this->db->where('market_user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getBids($contractor_id)
    {
        $this->db->select('contractor_details.bids');
        $this->db->from('contractor_details');
        $this->db->where('market_user_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    
    public function updateBids($contractor_id,$bids)
    {
        $this->db->where('market_user_id',$contractor_id);
        $this->db->update('contractor_details',['bids'=>$bids]);
        return $this->db->affected_rows();
    }
    
    public function getmedia($contractor_id)
    {
        $this->db->select('contractor_details.image,contractor_details.statutory');
        $this->db->from('contractor_details');
        $this->db->where('market_user_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function changePass($contractor_id,$old_pass,$new_pass)
    {
         $this->db->select('*');
        $this->db->from('marketplace');
        $where = "market_user_id = '$contractor_id' AND password = '$old_pass'";
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
           $this->db->where('market_user_id',$contractor_id);
           $q = $this->db->update('marketplace',['password'=>$new_pass]);
           return true; 
        }
        else
        {
            return false;
        }
    }
    
    public function contractorimg($id)
    {
        $this->db->select('contractor_details.image');
        $this->db->from('contractor_details');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function sub_contractorimg($id)
    {
        $this->db->select('sub_contractor_details.image');
        $this->db->from('sub_contractor_details');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function labourimg($id)
    {
        $this->db->select('labour_details.image');
        $this->db->from('labour_details');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function supplierimg($id)
    {
        $this->db->select('supplier_details.image');
        $this->db->from('supplier_details');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function faq()
    {
        $this->db->select('*');
        $this->db->from('faq');
        // $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function faq_desc($faq_id)
    {
        $this->db->select('faq_desc.faq_desc');
        $this->db->from('faq_desc');
        $this->db->where('faq_id',$faq_id);
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function recivedmessageDetails($id)
    {
        $this->db->select('user_contractor_contact.*,tender.name,tender.image,locations.location');
        $this->db->from('user_contractor_contact');
        $this->db->join('tender','user_contractor_contact.user_id=tender.user_id');
        $this->db->join('locations','locations.location_id=user_contractor_contact.location_id');
        $this->db->where('user_contractor_contact.ucc_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function accept($id)
    {
        $this->db->where('ucc_id',$id);
       
        $this->db->update('user_contractor_contact',['response'=>'1']);
        return $this->db->affected_rows();
    }
    
    public function reject($id)
    {
        $this->db->where('ucc_id',$id);
        
        $this->db->update('user_contractor_contact',['response'=>'0']);
        return true;
    }
    
    public function skills()
    {
        $this->db->select('*');
        $this->db->from('skills');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractor_sc_images($file,$id)
    {
        $this->db->insert('contractor_sc_contact_images',['contractor_sc_contact_id'=>$id,'images'=>$file]);
        return $this->db->insert_id();
    }
    
    public function contractorbyLocation($field)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,sub_contractor_details.cost_range,sub_contractor_details.image,marketplace_location.*,locations.*');
        $this->db->from('marketplace');
        $this->db->join('sub_contractor_details','marketplace.market_user_id=sub_contractor_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where("locations.location LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function tenderbyLocation($field)
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_post.title,user_post.post_id,user_post.location_id,user_post.cost_to,user_post.cost_from,user_post.time,locations.location');
        $this->db->from('tender');
        $this->db->join('user_post','user_post.user_id=tender.user_id');
        $this->db->join('locations','locations.location_id=user_post.location_id');
        $this->db->where("locations.location LIKE '%$field%'");
        // $this->db->order_by('user_id', 'RANDOM');
        // $this->db->limit('10');
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function labourbyLocation($field)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,labour_details.wages,labour_details.image,marketplace_location.market_user_id,locations.location');
        $this->db->from('marketplace');
        $this->db->join('labour_details','marketplace.market_user_id=labour_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where("locations.location LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function equipmentbyLocation($field)
    {
        $arr = ['sub_contractor','supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        $this->db->where("locations.location LIKE '%$field%'");
        // $this->db->or_where("supplier_equip_post.title LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function materialbyLocation($field)
    {
        $arr = ['sub_contractor','supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        $this->db->where("locations.location LIKE '%$field%'");
        // $this->db->or_where("supplier_equip_post.title LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractorsearching($field)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,contractor_details.cost_range,contractor_details.image,marketplace_location.*,locations.*');
        $this->db->from('marketplace');
        $this->db->join('contractor_details','marketplace.market_user_id=contractor_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where("marketplace.name LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function laboursearching($field)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,labour_details.wages,labour_details.image,marketplace_location.market_user_id,locations.location');
        $this->db->from('marketplace');
        $this->db->join('labour_details','marketplace.market_user_id=labour_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where("marketplace.name LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function equipmentSearch($field)
    {
        $arr = ['sub_contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        $this->db->where("(marketplace.name LIKE '%$field%' OR supplier_equip_post.title LIKE '%$field%')");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function tenderSearch($field)
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_post.title,user_post.post_id,user_post.location_id,user_post.cost_to,user_post.cost_from,user_post.time,locations.location');
        $this->db->from('tender');
        $this->db->join('user_post','user_post.user_id=tender.user_id');
        $this->db->join('locations','locations.location_id=user_post.location_id');
        $this->db->where("tender.name LIKE '%$field%'");
        // $this->db->order_by('user_id', 'RANDOM');
        // $this->db->limit('10');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function sub_contractorSearch($field)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,sub_contractor_details.cost_range,sub_contractor_details.image,marketplace_location.*,locations.*');
        $this->db->from('marketplace');
        $this->db->join('sub_contractor_details','marketplace.market_user_id=sub_contractor_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        // $this->db->group_by('marketplace.market_user_id');
        $this->db->where("marketplace.name LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function biddingRequest($contractor_id)
    {
        $this->db->select('contractor_bid.*,tender.user_id,tender.name,tender.image');
        $this->db->from('contractor_bid');
        $this->db->join('tender','tender.user_id=contractor_bid.user_id');
        $this->db->where('contractor_id',$contractor_id);
        $this->db->order_by('contractor_bid.bid_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function tendersentDetails($id)
    {
        $this->db->select('contractor_bid.*,tender.user_id,tender.name,tender.image');
        $this->db->from('contractor_bid');
        $this->db->join('tender','tender.user_id=contractor_bid.user_id');
        $this->db->where('contractor_bid.bid_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    
    public function laboursentRequest($contractor_id)
    {
        $this->db->select('contractor_labour_contact.title,contractor_labour_contact.id,contractor_labour_contact.contractor_id,contractor_labour_contact.labour_id,contractor_labour_contact.time,contractor_labour_contact.response,marketplace.name,marketplace.type,labour_details.image');
        $this->db->from('contractor_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_labour_contact.labour_id');
        $this->db->join('labour_details','labour_details.market_user_id=contractor_labour_contact.labour_id');
        $this->db->where('contractor_labour_contact.contractor_id',$contractor_id);
        $this->db->order_by('contractor_labour_contact.id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function laboursentDetails($id)
    {
        $this->db->select('contractor_labour_contact.*,marketplace.name,marketplace.type,labour_details.image,locations.location');
        $this->db->from('contractor_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_labour_contact.labour_id');
        $this->db->join('labour_details','labour_details.market_user_id=contractor_labour_contact.labour_id');
        $this->db->join('locations','locations.location_id=contractor_labour_contact.location_id');
        $this->db->where('contractor_labour_contact.id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function sub_contractorsentRequest($contractor_id)
    {
        $this->db->select('contractor_sc_contact.contractor_sc_contact_id,contractor_sc_contact.title,contractor_sc_contact.contractor_id,contractor_sc_contact.sub_contractor_id,contractor_sc_contact.response,contractor_sc_contact.time,marketplace.name,marketplace.type,sub_contractor_details.image');
        $this->db->from('contractor_sc_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_sc_contact.sub_contractor_id');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=contractor_sc_contact.sub_contractor_id');
        $this->db->where('contractor_sc_contact.contractor_id',$contractor_id);
        $this->db->order_by('contractor_sc_contact.contractor_sc_contact_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function subcontsentDetails($id)
    {
        $this->db->select('contractor_sc_contact.*,marketplace.name,marketplace.type,sub_contractor_details.image,locations.location');
        $this->db->from('contractor_sc_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_sc_contact.sub_contractor_id');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=contractor_sc_contact.sub_contractor_id');
        $this->db->join('locations','locations.location_id=contractor_sc_contact.location_id');
        $this->db->where('contractor_sc_contact.contractor_sc_contact_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
     }
    public function equipmentsentRequest($contractor_id)
    {
        $this->db->select('contractor_equipment_contact.id,contractor_equipment_contact.title,contractor_equipment_contact.market_user_id,contractor_equipment_contact.equipment_id,contractor_equipment_contact.response,contractor_equipment_contact.time,contractor_equipment_contact.type,marketplace.name');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.equipment_id');
        $this->db->where('contractor_equipment_contact.market_user_id',$contractor_id);
        $this->db->order_by('contractor_equipment_contact.id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function equipsentDetails($id)
    {
        $this->db->select('contractor_equipment_contact.*,marketplace.name,locations.location');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.equipment_id');
        $this->db->join('locations','locations.location_id=contractor_equipment_contact.location_id');
        $this->db->where('contractor_equipment_contact.id',$id);
        $sel = $this->db->get();
        return $sel->row_array();    
        
    }
    
    public function materialsentRequest($contractor_id)
    {
       $this->db->select('contractor_material_contact.id,contractor_material_contact.title,contractor_material_contact.market_user_id,contractor_material_contact.material_id,contractor_material_contact.response,contractor_material_contact.time,marketplace.name');
       $this->db->from('contractor_material_contact');
       $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.material_id');
       $this->db->where('contractor_material_contact.market_user_id',$contractor_id);
       $this->db->order_by('contractor_material_contact.id','desc');
       $sel = $this->db->get();
       return $sel->result_array();
        
    }
    
    public function materialsentDetails($id)
    {
        $this->db->select('contractor_material_contact.*,marketplace.name,locations.location');
       $this->db->from('contractor_material_contact');
       $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.material_id');
       $this->db->join('locations','locations.location_id=contractor_material_contact.location_id');
       $this->db->where('contractor_material_contact.id',$id);
       $sel = $this->db->get();
       return $sel->row_array();
    }
    
    public function chatRequest($contractor_id)
    {
        $this->db->select('tender.name,tender.unique_id,tender.image');
        $this->db->from('tender');
        $this->db->join('user_contractor_contact','user_contractor_contact.user_id=tender.user_id');
        $this->db->where('user_contractor_contact.market_user_id',$contractor_id);
        $this->db->where('user_contractor_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractor_equip_contact($market_user_id,$equip_id,$title,$location,$startdate,$enddate,$desc)
    {
        $data = array(
            'market_user_id'=>$market_user_id,
            'equipment_id'=>$equip_id,
            'title'=>$title,
            'location_id'=>$location,
            'start_date'=>$startdate,
            'end_date'=>$enddate,
            'description'=>$desc,
            'type'=>'rent',
            'response'=>''
            );
            
            $this->db->insert('contractor_equipment_contact',$data);
            return $this->db->insert_id();
    }
    
    public function user_material_contact($market_user_id,$material_id,$title,$location,$desc)
    {
         $data = array(
            'market_user_id'=>$market_user_id,
            'material_id'=>$material_id,
            'title'=>$title,
            'location_id'=>$location,
            'description'=>$desc,
            // 'quantity'=>$quantity,
            'response'=>''
            );
            
            $this->db->insert('contractor_material_contact',$data);
            return $this->db->insert_id();
    }
    
    public function contractor_equip_buy($market_user_id,$equip_id,$title,$location,$desc)
    {
        $data = array(
            'market_user_id'=>$market_user_id,
            'equipment_id'=>$equip_id,
            'title'=>$title,
            'location_id'=>$location,
            'description'=>$desc,
            'type'=>'buy',
            'response'=>''
            );
            
            $this->db->insert('contractor_equipment_contact',$data);
            return $this->db->insert_id();
        
        
    }
    
    public function supplierHomescreen($supplier_id)
    {
        $this->db->select('supplier_equip_post.supplier_equip_id,supplier_equip_post.title,supplier_equip_post.type,supplier_equip_post.location_id,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        $this->db->where('supplier_equip_post.market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    public function suppliermaterialHomescreen($supplier_id)
    {
        $this->db->select('supplier_material_post.supplier_mat_id,supplier_material_post.title,supplier_material_post.location_id,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('locations','locations.location_id=supplier_material_post.location_id');
        $this->db->where('supplier_material_post.market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function supplierHomescreenImg($id)
    {
        $this->db->select('supplier_equip_post_images.images');
        $this->db->from('supplier_equip_post_images');
        // $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        $this->db->where('supplier_equip_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function supplierHomescreenmatImg($id)
    {
        $this->db->select('supplier_material_post_images.images');
        $this->db->from('supplier_material_post_images');
        // $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        $this->db->where('supplier_mat_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function bidDocuments($file,$id)
    {
        $this->db->insert(' contractor_bid_images',['bid_id'=>$id,'images'=>$file]);
        return $this->db->insert_id();
        
    }
    
    public function reviews($sender_id,$reciever_id,$sender_type,$reciever_type,$msg,$rating)
    {
        $this->db->insert('marketplace_review',['sender_id'=>$sender_id,'reciever_id'=>$reciever_id,'sender_type'=>$sender_type,'reciever_type'=>$reciever_type,'msg'=>$msg,'rating'=>$rating]);
        return $this->db->insert_id();
        
    }
    
    public function getProjectDetails($contractor_id)
    {
        $this->db->select('marketplace_project.*,locations.location,');
        $this->db->from('marketplace_project');
        $this->db->join('locations','locations.location_id=marketplace_project.location_id');
        $this->db->where('contractor_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getprojectimages($project_id)
    {
        $this->db->select('marketplace_project_images.images');
        $this->db->from('marketplace_project_images');
        $this->db->where('project_id',$project_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function deleteProject($project_id)
    {
        $this->db->where('project_id',$project_id);
        $this->db->delete('marketplace_project');
        $this->db->where('project_id',$project_id);
        $this->db->delete('marketplace_project_images');
        return $this->db->affected_rows();
        
    }
    
    public function getAllprojectImages($project_id)
    {
        $this->db->select('marketplace_project_images.images');
        $this->db->from('marketplace_project_images');
        $this->db->where('project_id',$project_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function editProject($project_id,$name,$location,$price)
    {
        $this->db->where('project_id',$project_id);
        $this->db->update('marketplace_project',['name'=>$name,'location_id'=>$location,'price'=>$price]);
        return true;
    }
    
    public function delProjectImages($project_id)
    {
        $this->db->where('project_id',$project_id);
        $this->db->delete('marketplace_project_images');
        return $this->db->affected_rows();
    }
    
    public function labour_filter($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
        $this->db->select('labour_details.image,labour_details.wages,marketplace_location.location_id,marketplace_location.market_user_id,locations.location,marketplace.name,marketplace.type');
        $this->db->from('labour_details');
        $this->db->join('marketplace','marketplace.market_user_id=labour_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=labour_details.market_user_id');
            $this->db->join('locations','locations.location_id=marketplace_location.location_id');
        if(!empty($location_filter[0])){
            $this->db->where_in('marketplace_location.location_id',$location_filter);
        }
        if(!empty($aoi_filter['0']))
        {
        $this->db->join('marketplace_aoi','marketplace_aoi.market_user_id=labour_details.market_user_id');
        $this->db->join('aoi_description','aoi_description.aoi_desc_id=marketplace_aoi.aoi_desc_id');
           $this->db->where_in('marketplace_aoi.aoi_desc_id',$aoi_filter); 
        }
        if(!empty($min_price_filter)){
            $this->db->where('wages >=', $min_price_filter);
        }
        if(!empty($max_price_filter)){
            $this->db->where('wages <=', $max_price_filter);
        }
        if(!empty($rating_filter['0']))
        {
           $this->db->join('marketplace_review','marketplace_review.reciever_id=labour_details.market_user_id');
           $this->db->where('marketplace_review.reciever_type','labour');
           foreach($rating_filter as $rating_filters){
              $this->db->or_having('avg(marketplace_review.rating)',$rating_filters);
           }
           $this->db->group_by('marketplace_review.reciever_id');
        }
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array();
    }
    
    public function sub_contractor($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
        $this->db->select('sub_contractor_details.image,sub_contractor_details.cost_range,marketplace_location.location_id,marketplace_location.market_user_id,locations.location,marketplace.name,marketplace.type');
        $this->db->from('sub_contractor_details');
        $this->db->join('marketplace','marketplace.market_user_id=sub_contractor_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=sub_contractor_details.market_user_id');
        $this->db->join('locations','locations.location_id=marketplace_location.location_id');
        if(!empty($location_filter[0])){
            
            $this->db->where_in('marketplace_location.location_id',$location_filter);
        }
        if(!empty($aoi_filter['0']))
        {
        $this->db->join('marketplace_aoi','marketplace_aoi.market_user_id=sub_contractor_details.market_user_id');
        $this->db->join('aoi_description','aoi_description.aoi_desc_id=marketplace_aoi.aoi_desc_id');
           $this->db->where_in('marketplace_aoi.aoi_desc_id',$aoi_filter); 
        }
        if(!empty($min_price_filter)){
            $this->db->where('cost_range >=', $min_price_filter);
        }
        if(!empty($max_price_filter)){
            $this->db->where('cost_range <=', $max_price_filter);
        }
        if(!empty($rating_filter['0']))
        {
           $this->db->join('marketplace_review','marketplace_review.reciever_id=sub_contractor_details.market_user_id');
           $this->db->where('marketplace_review.reciever_type','sub_contractor');
           foreach($rating_filter as $rating_filters){
              $this->db->or_having('avg(marketplace_review.rating)',$rating_filters);
           }
           $this->db->group_by('marketplace_review.reciever_id');
        }
        $sel = $this->db->get();
        echo $this->db->last_query();die;
        return $sel->result_array();
        
    }
    
    public function equipment_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
        $arr = ['sub_contractor', 'supplier'];
        $this->db->select('supplier_equip_post.title,supplier_equip_post.type,supplier_equip_post.supplier_equip_id,supplier_equip_post.market_user_id,supplier_equip_post.location_id,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','marketplace.market_user_id=supplier_equip_post.market_user_id');
        $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        if(!empty($location_filter[0])){
            $this->db->where_in('supplier_equip_post.location_id',$location_filter);
        }
        if(!empty($min_price_filter)){
            $this->db->where('(perdayprice >= '.$min_price_filter.' or price >= '.$min_price_filter.')');
            
        }
        if(!empty($max_price_filter)){
            $this->db->where('(perdayprice <= '.$max_price_filter.' or price <= '.$max_price_filter.')');
        }
        if(!empty($rating_filter['0']))
        {
           $this->db->join('marketplace_review','marketplace_review.reciever_id=supplier_equip_post.market_user_id');
        // $this->db->where('marketplace_review.reciever_type','contractor');
           $this->db->where_in('marketplace_review.rating',$rating_filter);
        }
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array();
    }
    
    public function material_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
       $arr = ['sub_contractor', 'supplier'];
       $this->db->select('supplier_material_post.title,marketplace.type,supplier_material_post.supplier_mat_id,supplier_material_post.market_user_id,supplier_material_post.location_id,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','marketplace.market_user_id=supplier_material_post.market_user_id');
        $this->db->join('locations','locations.location_id=supplier_material_post.location_id');
        if(!empty($location_filter[0])){
            
            $this->db->where_in('supplier_material_post.location_id',$location_filter);
        }
        if(!empty($min_price_filter)){
            
            $this->db->where('price >=', $min_price_filter);
        }
        if(!empty($max_price_filter)){
            
            $this->db->where('price <=', $max_price_filter);
        }
        if(!empty($rating_filter['0']))
        {
           $this->db->join('marketplace_review','marketplace_review.reciever_id=supplier_material_post.market_user_id');
        //   $this->db->where('marketplace_review.reciever_type','contractor');
           $this->db->where_in('marketplace_review.rating',$rating_filter);
        }
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array(); 
    }
    
    public function subcontractorProjectImages($detail_id)
    {
        $this->db->select('sub_contractor_details_image.images');
        $this->db->from('sub_contractor_details_image');
        $this->db->where('sub_contractor_details_image.sub_cont_details_id',$detail_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function subcontractorReviews($id)
    {
        $this->db->select('marketplace_review.rating,marketplace_review.msg,marketplace.name,marketplace.type,contractor_details.image');
        $this->db->from('marketplace_review');
        $this->db->join('marketplace','marketplace.market_user_id=marketplace_review.sender_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=marketplace_review.sender_id');
        $this->db->where('reciever_id',$id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function ratings($market_user_id,$type)
    {
            $this->db->select('sum(marketplace_review.rating)/count(marketplace_review.rating) as rating, count(marketplace_review.rating) as rating_count');
            $this->db->from('marketplace_review');
            $this->db->where('reciever_type',$type);
            $this->db->where('reciever_id',$market_user_id);
            $this->db->group_by('reciever_id');
            $sel = $this->db->get();
            // echo $this->db->last_query();
            return $sel->row_array();    
        
    }
    public function LabourReview($market_user_id)
    {
        $this->db->select('marketplace_review.rating,marketplace_review.msg,marketplace_review.sender_type,marketplace_review.sender_id');
        $this->db->where_in('sender_type', ['contractor', 'sub_contractor', 'tender']);
        $this->db->where('reciever_id',$market_user_id);
        $query = $this->db->get('marketplace_review');
         return $query->result_array(); 
    }
    public function getTenderdetails($id)
    {
        $this->db->select('tender.name,tender.image');
        $this->db->from('tender');
        $this->db->where('user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getContractordetails($id)
    {
        $this->db->select('marketplace.name,marketplace.type,contractor_details.image');
        $this->db->from('marketplace');
        $this->db->join('contractor_details','contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getsubcontDetails($id)
    {
        $this->db->select('marketplace.name,marketplace.type,sub_contractor_details.image');
        $this->db->from('marketplace');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getLabourProjectDetails($market_user_id)
    {
        $this->db->select('labour_post.labour_post_id,labour_post.title,labour_post.location_id,locations.location');
        $this->db->from('labour_post');
        $this->db->join('locations','locations.location_id=labour_post.location_id');
        $this->db->where('market_user_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getlabourprojectimage($project_id)
    {
        $this->db->select('labour_post_images.images');
        $this->db->from('labour_post_images');
        $this->db->where('labour_post_id',$project_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getallLabourprojectImages($project_id)
    {
        $this->db->select('labour_post_images.images');
        $this->db->from('labour_post_images');
        $this->db->where('labour_post_id',$project_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function subcontractorQualifications($id)
    {
        $this->db->select('marketplace_qualification.qualification');
        $this->db->from('marketplace_qualification');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function equipmentRatings($market_user_id)
    {
        $this->db->select('sum(marketplace_review.rating)/count(marketplace_review.rating) as rating, count(marketplace_review.rating) as rating_count');
            $this->db->from('marketplace_review');
            // $this->db->where('reciever_type',$type);
            $this->db->where('reciever_id',$market_user_id);
            $this->db->group_by('reciever_id');
            $sel = $this->db->get();
            // echo $this->db->last_query();
            return $sel->row_array();
    }
    
    public function subscriptionPlans($type)
    {
        $this->db->select('*');
        $this->db->from('marketplace_subscription');
        $this->db->where('type',$type);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getusercontractorcontactProjects($id)
    {
        $this->db->select('user_contractor_contact_images.images');
        $this->db->from('user_contractor_contact_images');
        $this->db->where('ucc_id',$id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getType($market_user_id)
    {
        $this->db->select('marketplace.type');
        $this->db->from('marketplace');
        $this->db->where('market_user_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function updatePass($email,$newpass)
    {
        $this->db->where('email',$email);
        $this->db->update('marketplace',['password'=>$newpass]);
        return $this->db->affected_rows();
    }
    
    public function getPlanType($contractor_id)
    {
        $this->db->select('marketplace.plan_type');
        $this->db->from('marketplace');
        $this->db->where('market_user_id',$contractor_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function insertPaymentDetails($market_user_id,$txn_id,$type,$price,$user_type)
    {
        $data = array(
            'market_user_id' => $market_user_id,
            'txn_id' => $txn_id,
            'plan_type' => $type,
            'price'=>$price,
            'date'=>date('Y-m-d'),
            'user_type'=>$user_type,
            );
            
            $this->db->insert('payment',$data);
            return $this->db->insert_id();
    }
    
    public function planupdates($type,$market_user_id)
    {
        if($type == 'Professional')
        {
            $this->db->where('market_user_id',$market_user_id);
            $this->db->update('marketplace',['plan_type'=>'Professional']);
            $this->db->where('market_user_id',$market_user_id);
            $this->db->update('contractor_details',['bids'=>4]);
            // return $this->db->affected_rows();
            $this->db->select('marketplace.plan_type,contractor_details.bids');
            $this->db->from('marketplace');
            $this->db->join('contractor_details','contractor_details.market_user_id=marketplace.market_user_id');
            $this->db->where('marketplace.market_user_id',$market_user_id);
            $sel = $this->db->get();
            return $sel->row_array();
        }
        if($type == 'Single')
        {
            $this->db->where('market_user_id',$market_user_id);
            $this->db->update('contractor_details',['bids'=>1]);
            // return $this->db->affected_rows();
            $this->db->select('marketplace.plan_type,contractor_details.bids');
            $this->db->from('marketplace');
            $this->db->join('contractor_details','contractor_details.market_user_id=marketplace.market_user_id');
            $this->db->where('marketplace.market_user_id',$market_user_id);
            $sel = $this->db->get();
            return $sel->row_array();
        }
    }
    
    public function getallfaq()
    {
        $this->db->select('*');
        $this->db->from('faq');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function marketplaceCount($type)
    { 
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('marketplace.type',$type);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function getTenderCount()
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_post.title,user_post.post_id,user_post.location_id,user_post.cost_to,user_post.cost_from,user_post.time,locations.location');
        $this->db->from('tender');
        $this->db->join('user_post','user_post.user_id=tender.user_id');
        $this->db->join('locations','locations.location_id=user_post.location_id');
        
        $this->db->where('user_post.status','Active');
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function supplierplanupdate($market_user_id)
    {
        $this->db->where('market_user_id',$market_user_id);
        $this->db->update('supplier_details',['posts'=>'Unlimited']);
        $this->db->where('market_user_id',$market_user_id);
        $this->db->update('marketplace',['plan_type'=>'Professional']);
        // return $this->db->affected_rows();
        $this->db->select('marketplace.plan_type,supplier_details.posts');
        $this->db->from('marketplace');
        $this->db->join('supplier_details','supplier_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    
    public function sub_contractorplanupdate($market_user_id)
    {
        $this->db->where('market_user_id',$market_user_id);
        $this->db->update('sub_contractor_details',['posts'=>'Unlimited']);
        $this->db->where('market_user_id',$market_user_id);
        $this->db->update('marketplace',['plan_type'=>'Professional']);
        // return $this->db->affected_rows();
        $this->db->select('marketplace.plan_type,sub_contractor_details.posts');
        $this->db->from('marketplace');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=marketplace.market_user_id');
        $this->db->where('marketplace.market_user_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getpaymentdate($supplier_id)
    {
        $this->db->select('payment.date');
        $this->db->from('payment');
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function updateplan($contractor_id)
    {
        $this->db->where('market_user_id',$contractor_id);
        $this->db->update('marketplace',['plan_type'=>'Basic']);
        return $this->db->affected_rows();
    }
}

