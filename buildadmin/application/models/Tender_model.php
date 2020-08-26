<?php


class Tender_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkmail($email)
    {
        $this->db->select('*');
        $this->db->from('tender');
        $this->db->where('email',$email);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    
    public function signUp($name,$email,$phone,$pass,$unique_id)
    {
        $this->db->insert('tender',['name'=>$name,'email'=>$email,'phone'=>$phone,'password'=>$pass,'unique_id'=>$unique_id,'time'=>date('Y-m-d')]);
        $id =  $this->db->insert_id();
        $sel = $this->db->get_where('tender',['user_id'=>$id]);
        return $sel->row_array();
    }
    
    public function Login($email,$pass)
    {
        $this->db->select('*');
        $this->db->from('tender');
        $this->db->where('email',$email);
        $this->db->where('password',$pass);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function LoginwithFacebook($name,$email,$unique_id,$phone=null,$password=null)
    {
        $ins = $this->db->insert('tender',['unique_id'=>$unique_id,'name'=>$name,'email'=>$email,'phone'=>$phone,'password'=>$password]);
        $id =  $this->db->insert_id();
        $this->db->select('*');
        $this->db->from('tender');
        $this->db->where('user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getprofileimg($userid){
        $this->db->select('image');
        $this->db->from('tender');
        $this->db->where('user_id',$userid);
        $s = $this->db->get();
        return $s->row_array();
    }
    
    public function updatePass($email,$newpass)
    {
        $this->db->where('email',$email);
        $this->db->update('tender',['password'=>$newpass]);
        return $this->db->affected_rows();
    }
    
    public function doupdateprofileimg($name,$email,$phone,$fnn,$user_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->update('tender',['name'=>$name,'email'=>$email,'phone'=>$phone,'image'=>$fnn]);
        // return $this->db->affected_rows();
        $this->db->select('*');
        $this->db->from('tender');
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function doupdateprofile($name,$email,$phone,$user_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->update('tender',['name'=>$name,'email'=>$email,'phone'=>$phone]);
        // return $this->db->affected_rows();
        $this->db->select('*');
        $this->db->from('tender');
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function changePass($user_id,$old_pass,$new_pass)
    {
         $this->db->select('*');
        $this->db->from('tender');
        $where = "user_id = '$user_id' AND password = '$old_pass'";
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
           $this->db->where('user_id',$user_id);
           $q = $this->db->update('tender',['password'=>$new_pass]);
           return true; 
        }
        else
        {
            return false;
        }
    }
    
    public function addPost($user_id,$title,$plot_area,$cost_to,$cost_from,$start_date,$end_date,$quality,$desc,$status,$location,$built_up)
    {
        $data = array(
            'user_id'=>$user_id,
            'title'=>$title,
            'plot_area'=>$plot_area,
            'cost_to'=>$cost_to,
            'cost_from'=>$cost_from,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'quality'=>$quality,
            'description'=>$desc,
            'status'=>$status,
            'location_id'=>$location,
            'time'=>date('Y-m-d'),
            // 'aoi_desc_id'=>$aoi_desc,
            'built_up'=>$built_up
            
            );
            
            $this->db->insert('user_post',$data);
            return $this->db->insert_id();
        
    }
    
    public function editPost($post_id,$user_id,$title,$plot_area,$cost_to,$cost_from,$start_date,$end_date,$quality,$desc,$status,$location,$built_up)
    {
        $data = array(
            'title'=>$title,
            'plot_area'=>$plot_area,
            'cost_to'=>$cost_to,
            'cost_from'=>$cost_from,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'quality'=>$quality,
            'description'=>$desc,
            'status'=>$status,
            'location_id'=>$location,
            'time'=>date('Y-m-d'),
            
            'built_up'=>$built_up
            );
            
            $this->db->where('post_id',$post_id);
            $this->db->update('user_post',$data);
            return true;
    }
    
    public function delpostimages($post_id)
    {
        $this->db->where('post_id',$post_id);
        $this->db->delete('user_post_images');
        // echo $this->db->last_query();die;
        return $this->db->affected_rows();
    }
    
    // public function userPostLocation($loc,$post_id)
    // {
    //     $this->db->insert('user_location',['location_id'=>$loc,'post_id'=>$post_id]);
    //     return $this->db->insert_id();
    // }
    
    public function postImages($image,$post_id)
    {
        $this->db->insert('user_post_images',['images'=>$image,'post_id'=>$post_id]);
        return $this->db->insert_id();
    }
    
    public function user_contractor_contact($user_id,$contractor_id,$title,$plot_area,$built_up,$costTo,$costFrom,$startdate,$enddate,$quality,$location,$desc)
    {
        $data = array(
            'user_id'=>$user_id,
            'market_user_id'=>$contractor_id,
            'title'=>$title,
            'plot_area'=>$plot_area,
            'built_up'=>$built_up,
            'cost_to'=>$costTo,
            'cost_from'=>$costFrom,
            'start_date'=>$startdate,
            'end_date'=>$enddate,
            'quality'=>$quality,
            'time'=>date('Y-m-d'),
            'location_id'=>$location,
            'description'=>$desc,
            'response'=>'',
            );
            
            $this->db->insert('user_contractor_contact',$data);
            return $this->db->insert_id();
    }
    
    // public function contact_location($loc,$user_id,$contractor_id)
    // {
    //     $this->db->insert('user_contact_location',['location_id'=>$loc,'user_id'=>$user_id,'market_user_id'=>$contractor_id]);
    //     return $this->db->insert_id();
    // }
    
    public function user_labour_contact($user_id,$labour_id,$title,$startdate,$enddate,$desc,$location)
    {
        $data = array(
            'user_id'=>$user_id,
            'market_user_id'=>$labour_id,
            'title'=>$title,
            'start_date'=>$startdate,
            'end_date'=>$enddate,
            'description'=>$desc,
            'location_id'=>$location,
            'time'=>date('Y-m-d'),
            'response'=>''
            );
        $this->db->insert('user_labour_contact',$data);
        return $this->db->insert_id();
    }
    
    public function user_equip_contact($user_id,$equip_id,$title,$location,$startdate,$enddate,$desc)
    {
        $data = array(
            'user_id'=>$user_id,
            'market_user_id'=>$equip_id,
            'title'=>$title,
            'location_id'=>$location,
            'start_date'=>$startdate,
            'end_date'=>$enddate,
            'description'=>$desc,
            'type'=>'rent',
            'response'=>''
            );
            
            $this->db->insert('user_equipment_contact',$data);
            return $this->db->insert_id();
        
    }
    
    public function user_equip_buy($user_id,$equip_id,$title,$location,$desc)
    {
        $data = array(
            'user_id'=>$user_id,
            'market_user_id'=>$equip_id,
            'title'=>$title,
            'location_id'=>$location,
            'description'=>$desc,
            'type'=>'buy',
            'response'=>''
            );
            
            $this->db->insert('user_equipment_contact',$data);
            return $this->db->insert_id();
            
        
    }
    
    public function user_material_contact($user_id,$material_id,$title,$location,$desc,$quantity)
    {
        $data = array(
            'user_id'=>$user_id,
            'market_user_id'=>$material_id,
            'title'=>$title,
            'location_id'=>$location,
            'description'=>$desc,
            'quantity'=>$quantity,
            'response'=>''
            );
            
            $this->db->insert('user_material_contact',$data);
            return $this->db->insert_id();
    }
    
    public function homescreenListing($type,$id=null)
    {
    //   echo $id;die;
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
                $this->db->order_by('marketplace.market_user_id','desc');
                $this->db->where('type',$type);
                // $this->db->where('marketplace.market_user_id <',$id);
                if(!empty($id)){
                    $this->db->where('marketplace.market_user_id <',$id);
                    $this->db->limit(6);
                }else{
                     $this->db->limit(6);
                 }
                $sel = $this->db->get();
                
                return $sel->result_array();
       
    }
    
    public function homescreenLoadmore($type,$id)
    {
        if($type == 'labour')
        {
            $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.wages,'.$type.'_details.image,marketplace_location.market_user_id,locations.location');
        }
        elseif($type == 'contractor')
        {
            $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.cost_range,'.$type.'_details.image,marketplace_location.*,locations.*');
        }
        else
        {
            $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.cost_range,'.$type.'_details.image,marketplace_location.*,locations.*');
        }
        
        $this->db->from('marketplace');
        $this->db->join($type.'_details','marketplace.market_user_id='.$type.'_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->where('marketplace.market_user_id <',$id);
        $this->db->group_by('marketplace.market_user_id');
        $this->db->order_by('marketplace.name','desc');
        // $this->db->where('type',$type);
        $this->db->limit('10');
        $sel = $this->db->get();
        return $sel->result_array();
        
        
    }
    
    public function marketusersDetails($market_user_id,$type)
    {
        if($type == 'labour')
        {
            $this->db->select('marketplace.*,'.$type.'_details.*,marketplace_location.market_user_id,locations.location,marketplace_skills.*,skills.*');
        }
        else
        {
            $this->db->select('marketplace.*,'.$type.'_details.*,marketplace_location.market_user_id,locations.location');
        }
        // $this->db->select('marketplace.*,'.$type.'_details.*,marketplace_location.market_user_id,locations.location,marketplace_skills.*,skills.*');
        $this->db->from('marketplace');
        $this->db->join($type.'_details','marketplace.market_user_id='.$type.'_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        if($type == 'labour')
        {
        $this->db->join('marketplace_skills','marketplace_skills.market_user_id=marketplace.market_user_id');
        $this->db->join('skills','skills.skill_id=marketplace_skills.skill_id');
        }
        $this->db->where('marketplace.market_user_id',$market_user_id);
        $this->db->where('marketplace.type',$type);
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->row_array();
        
    }
    
    public function getmultipleimages($type)
    {
       $this->db->select($type.'_details_image.*');
       $this->db->from($type.'_details_image');
    //   $this->db->join($type.'_details_image','marketplace.market_user_id='.$type.'_details_image.market_user_id');
        // $this->db->where('type',$type);
        $sel = $this->db->get();
        return $sel->result_array();
       
    }
    
    public function user_contractor_multiple($file,$ucc_id)
    {
        $this->db->insert('user_contractor_contact_images',['ucc_id'=>$ucc_id,'images'=>$file]);
        return $this->db->insert_id();
    }
    
    public function review($user_id,$market_user_id,$review,$rating)
    {
        $this->db->insert('tender_review',['user_id'=>$user_id,'market_user_id'=>$market_user_id,'review'=>$review,'rating'=>$rating]);
        return $this->db->insert_id();
        
    }
    
    public function allLocations()
    {
        $this->db->select('*');
        $this->db->from('locations');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function allAoi()
    {
        $this->db->select('*');
        $this->db->from('aoi');
        // $this->db->join('aoi_description','aoi.aoi_id=aoi_description.aoi_id');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function aoiDescription($aoi_id)
    {
        $this->db->select('*');
        $this->db->from('aoi_description');
        $this->db->where('aoi_id',$aoi_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getequipmentlists($id=null)
    {
        $arr = ['contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_equip_post.*,locations.location');
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
        $arr = ['contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->order_by('supplier_equip_post.market_user_id','desc');
        $this->db->where('supplier_equip_post.status','Active');
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function getequipmentlistsbyid($market_user_id)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type as user_type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where('supplier_equip_post.supplier_equip_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getmaterialLists($id=null)
    {
        $arr = ['contractor', 'supplier'];
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
        $arr = ['contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->order_by('supplier_material_post.market_user_id','desc');
        $this->db->where('supplier_material_post.status','Active');
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function getmaterialListsbyid($market_user_id)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type as user_type,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where('supplier_material_post.supplier_mat_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getequipmentimg($id)
    {
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
    
    public function bidRequests($user_id)
    {
        $this->db->select('contractor_bid.cost_range,contractor_bid.contractor_id,contractor_bid.bid_id,contractor_bid.user_post_id,marketplace.name,user_post.title');
        $this->db->from('contractor_bid');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_bid.contractor_id');
        $this->db->join('user_post','user_post.post_id=contractor_bid.user_post_id');
        $this->db->where('contractor_bid.user_id',$user_id);
        $this->db->where('contractor_bid.response','');
        $this->db->order_by('contractor_bid.bid_id','desc');
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array();
        
    }
    
    public function user_contractor_contactbidsRequest($user_id)
    {
        $this->db->select('contractor_bid.cost_range,contractor_bid.contractor_id,contractor_bid.bid_id,contractor_bid.user_post_id,marketplace.name,user_contractor_contact.title');
        $this->db->from('contractor_bid');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_bid.contractor_id');
        $this->db->join('user_contractor_contact','user_contractor_contact.ucc_id=contractor_bid.ucc_id');
        $this->db->where('contractor_bid.user_id',$user_id);
        $this->db->where('contractor_bid.response','');
        $this->db->order_by('contractor_bid.bid_id','desc');
        // $this->db->group_by('contractor_bid.user_id');
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array();
    }
    
    public function chatList($user_id)
    {
        $this->db->select('contractor_bid.contractor_id as market_user_id,tender.unique_id,marketplace.name,marketplace.type');
        $this->db->distinct('contractor_bid.contractor_id');
        $this->db->from('contractor_bid');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_bid.contractor_id');
        $this->db->join('tender','tender.user_id=contractor_bid.user_id');
        $this->db->where('contractor_bid.user_id',$user_id);
        $this->db->where('contractor_bid.response','1');
        // $this->db->group_by('marketplace.name');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function usersPost($user_id)
    {   $this->db->select('user_post.title,user_post.post_id,user_post.time,user_post.description,user_post.location_id,locations.location');
        $this->db->from('user_post');
        $this->db->join('locations','user_post.location_id=locations.location_id');
        $this->db->where('user_post.user_id',$user_id);
        $this->db->order_by('user_post.post_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractorImage($id)
    {
        $this->db->select('contractor_details.image');
        $this->db->from('contractor_details');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    
    public function labourImage($id)
    {
        $this->db->select('labour_details.image');
        $this->db->from('labour_details');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function supplierImage($id)
    {
        $this->db->select('supplier_details.image');
        $this->db->from('supplier_details');
        $this->db->where('market_user_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function accept($bid_id)
    {
        $this->db->where('bid_id',$bid_id);
        // $this->db->where('contractor_id',$contractor_id);
        $this->db->update('contractor_bid',['response'=>'1']);
        // return $this->db->affected_rows();
        $this->db->select('contractor_bid.contractor_id');
        $this->db->from('contractor_bid');
        $this->db->where('bid_id',$bid_id);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    
    public function reject($bid_id)
    {
        $this->db->where('bid_id',$bid_id);
        // $this->db->where('contractor_id',$contractor_id);
        $this->db->update('contractor_bid',['response'=>'0']);
        return true;
        
    }
    
    public function contractorsentRequests($user_id)
    {
        $this->db->select('user_contractor_contact.title,user_contractor_contact.ucc_id,user_contractor_contact.market_user_id,user_contractor_contact.time,user_contractor_contact.response,marketplace.name,marketplace.type');
        $this->db->from('user_contractor_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_contractor_contact.market_user_id');
        $this->db->where('user_contractor_contact.user_id',$user_id);
        $this->db->order_by('user_contractor_contact.ucc_id','desc');
        $sel = $this->db->get();
        // $this->db->contractorImage($id);
        return $sel->result_array();
        
    }
    public function contractorchatRequests($user_id)
    {
        $this->db->select('user_contractor_contact.market_user_id,marketplace.name,marketplace.type,tender.unique_id');
        $this->db->distinct('user_contractor_contact.market_user_id');
        $this->db->group_by('user_contractor_contact.market_user_id');
        $this->db->from('user_contractor_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_contractor_contact.market_user_id');
        $this->db->join('tender','tender.user_id=user_contractor_contact.user_id');
        $this->db->where('user_contractor_contact.user_id',$user_id);
        $this->db->where('user_contractor_contact.response','1');
        $sel = $this->db->get();
        
        return $sel->result_array();
        
    }
    
    public function laboursentRequests($user_id)
    {
        $this->db->select('user_labour_contact.title,user_labour_contact.id,user_labour_contact.market_user_id,user_labour_contact.time,user_labour_contact.response,marketplace.name,marketplace.type');
        $this->db->from('user_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_labour_contact.market_user_id');
        $this->db->where('user_labour_contact.user_id',$user_id);
        $this->db->order_by('user_labour_contact.id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function labourchatRequests($user_id)
    {
        $this->db->select('user_labour_contact.market_user_id,marketplace.name,marketplace.type,tender.unique_id');
        $this->db->from('user_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_labour_contact.market_user_id');
        $this->db->join('tender','tender.user_id=user_labour_contact.user_id');
        $this->db->where('user_labour_contact.user_id',$user_id);
        $this->db->where('user_labour_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function equipmentsentRequests($user_id)
    {
        $this->db->select('user_equipment_contact.title,user_equipment_contact.id,user_equipment_contact.market_user_id,user_equipment_contact.time,user_equipment_contact.response,marketplace.name,marketplace.type');
        $this->db->from('user_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_equipment_contact.market_user_id');
        $this->db->where('user_equipment_contact.user_id',$user_id);
        $this->db->order_by('user_equipment_contact.id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function equipmentchatRequests($user_id)
    {
        $this->db->select('supplier_details.image,supplier_details.market_user_id,marketplace.name,marketplace.type,tender.unique_id');
        $this->db->from('user_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_equipment_contact.market_user_id');
        $this->db->join('supplier_details','supplier_details.market_user_id=user_equipment_contact.market_user_id');
        $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        $this->db->where('user_equipment_contact.user_id',$user_id);
        $this->db->where('user_equipment_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function materialsentRequests($user_id)
    {
        $this->db->select('user_material_contact.title,user_material_contact.id,user_material_contact.market_user_id,user_material_contact.time,user_material_contact.response,marketplace.name,marketplace.type');
        $this->db->from('user_material_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_material_contact.market_user_id');
        $this->db->where('user_material_contact.user_id',$user_id);
        // $this->db->where('user_material_contact.response','1');
        $this->db->order_by('user_material_contact.id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function materialchatRequests($user_id)
    {
        $this->db->select('supplier_details.image,supplier_details.market_user_id,marketplace.name,marketplace.type,tender.unique_id');
        $this->db->from('user_material_contact');
        $this->db->join('marketplace','marketplace.market_user_id=user_material_contact.market_user_id');
        $this->db->join('supplier_details','supplier_details.market_user_id=user_material_contact.market_user_id');
        $this->db->join('tender','tender.user_id=user_material_contact.user_id');
        $this->db->where('user_material_contact.user_id',$user_id);
        $this->db->where('user_material_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function bidDetails($id)
    {
        $this->db->select('*');
        $this->db->from('contractor_bid');
        $this->db->where('bid_id',$id);
        $sel= $this->db->get();
        return $sel->row_array();
    }
    
    public function post_details($id)
    {
        $this->db->select('user_post.*,locations.location');
        $this->db->from('user_post');
        $this->db->join('locations','user_post.location_id=locations.location_id');
        // $this->db->join('user_post_aoi','user_post_aoi.post_id=user_post.post_id');
        // $this->db->join('aoi_description','user_post.aoi_desc_id=aoi_description.aoi_desc_id');
        $this->db->where('post_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getpostimages($post_id)
    {
        $this->db->select('user_post_images.images,user_post_images.id');
        $this->db->from('user_post_images');
        $this->db->where('post_id',$post_id);
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function contractor_details($id)
    {
        $this->db->select('user_contractor_contact.*,locations.location');
        $this->db->from('user_contractor_contact');
        $this->db->join('locations','locations.location_id=user_contractor_contact.location_id');
        $this->db->where('ucc_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function labour_details($id)
    {
        $this->db->select('user_labour_contact.*,locations.location');
        $this->db->from('user_labour_contact');
        $this->db->join('locations','locations.location_id=user_labour_contact.location_id');
        $this->db->where('id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function equipment_details($id)
    {
        $this->db->select('user_equipment_contact.*,locations.location');
        $this->db->from('user_equipment_contact');
        $this->db->join('locations','locations.location_id=user_equipment_contact.location_id');
        $this->db->where('id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function material_details($id)
    {
        $this->db->select('user_material_contact.*,locations.location');
        $this->db->from('user_material_contact');
        $this->db->join('locations','locations.location_id=user_material_contact.location_id');
        $this->db->where('id',$id);
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
    
    public function equipmentSearch($field)
    {
        $arr = ['contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        $this->db->where("(marketplace.name LIKE '%$field%' OR supplier_equip_post.title LIKE '%$field%')");
        $this->db->where('supplier_equip_post.status','Active');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function materialSearch($field)
    {
        $arr = ['contractor', 'supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        $this->db->where("(marketplace.name LIKE '%$field%' OR supplier_material_post.title LIKE '%$field%')");
        $this->db->where('supplier_material_post.status','Active');
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
    
    public function searchLocation($field)
    {
        $this->db->select('*');
        $this->db->from('locations');
        $this->db->where("location LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function deletePosts($post_id)
    {
        $this->db->delete('user_post', ['post_id' => $post_id]);
        $this->db->delete('user_post_images', ['post_id' => $post_id]);
        return $this->db->affected_rows();
    }
    
    public function contractorfilter($id)
    {
        // $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,contractor_details.cost_range,contractor_details.image,marketplace_location.*,locations.*');
        // $this->db->from('marketplace');
        // $this->db->join('contractor_details','marketplace.market_user_id=contractor_details.market_user_id');
        // $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        // $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        // $this->db->group_by('marketplace.market_user_id');
        // $this->db->where('contractor_details.location_id',$id);
        // $sel = $this->db->get();
        // return $sel->result_array();
        
        // $this->db->select('marketplace.name,marketplace.type,marketplace.market_user_id,marketplace_location.*,locations.*,marketplace_aoi.*,aoi_description.*');
        // $this->db->from('marketplace');
        // $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        // $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        // $this->db->join('marketplace_aoi','marketplace_aoi.market_user_id=marketplace.market_user_id');
        // $this->db->join('aoi_description','aoi_description.aoi_desc=marketplace_aoi.aoi_desc_id');
        // $this->db->where('locations.location_id',$id);
        // $this->db->where('aoi_description.aoi_desc_id',$id);
        // $sel = $this->db->get();
        // return $sel->result_array();
        
        
    }
    public function labourfilter($field)
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
    
    public function equipmentfilter($field)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->or_where("marketplace.name LIKE '%$field%'");
        $this->db->or_where("supplier_equip_post.title LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function materialfilter($field)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->or_where("marketplace.name LIKE '%$field%'");
        $this->db->or_where("supplier_material_post.title LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractorbyLocation($field)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,contractor_details.cost_range,contractor_details.image,marketplace_location.*,locations.*');
        $this->db->from('marketplace');
        $this->db->join('contractor_details','marketplace.market_user_id=contractor_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where("locations.location LIKE '%$field%'");
        // $this->db->where('marketplace.type','contractor');
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
        // $this->db->where('marketplace.type','labour');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function equipmentbyLocation($field)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where("locations.location LIKE '%$field%'");
        $this->db->where('supplier_equip_post.status','Active');
        // $this->db->or_where("supplier_equip_post.title LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function materialbyLocation($field)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where("locations.location LIKE '%$field%'");
        $this->db->where('supplier_material_post.status','Active');
        // $this->db->or_where("supplier_equip_post.title LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function appSettings($type)
    {
        $this->db->select('*');
        $this->db->from('app_setting');
        $this->db->where('type',$type);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function checkold($old_pass,$user_id)
    {
        $this->db->select('*');
        $this->db->from('tender');
        $this->db->where('password',$old_pass);
        $this->db->where('user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function postaoi($aoi,$post_id)
    {
        $this->db->insert('user_post_aoi',['post_id'=>$post_id,'aoi_desc_id'=>$aoi]);
        return $this->db->insert_id();
    }
    
    public function delpostaoi($post_id)
    {
        $this->db->where('post_id',$post_id);
        $this->db->delete('user_post_aoi');
        return $this->db->affected_rows();
    }
    
    public function getPostaoi($post_id)
    {
        $this->db->select('user_post_aoi.aoi_desc_id,user_post_aoi.post_id,aoi_description.aoi_desc');
        $this->db->from('user_post_aoi');
        $this->db->join('aoi_description','user_post_aoi.aoi_desc_id=aoi_description.aoi_desc_id');
        $this->db->where('user_post_aoi.post_id',$post_id);
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    
    
    public function contractor_filter($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter,$type)
    {
        $this->db->select('contractor_details.image,contractor_details.cost_range,marketplace_location.location_id,marketplace_location.market_user_id,locations.location,marketplace.name,marketplace.type');
        $this->db->from('contractor_details');  
        $this->db->join('marketplace','marketplace.market_user_id=contractor_details.market_user_id');  
        $this->db->join('marketplace_location','marketplace_location.market_user_id=contractor_details.market_user_id'); 
        $this->db->join('locations','locations.location_id=marketplace_location.location_id');
        if(!empty($location_filter['0'])){
            
            $this->db->where_in('marketplace_location.location_id',$location_filter);
        }
        if(!empty($aoi_filter['0']))
        {
        $this->db->join('marketplace_aoi','marketplace_aoi.market_user_id=contractor_details.market_user_id');
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
           $this->db->join('marketplace_review','marketplace_review.reciever_id=contractor_details.market_user_id');
           $this->db->where('marketplace_review.reciever_type','contractor');
           foreach($rating_filter as $rating_filters){
              $this->db->or_having('avg(marketplace_review.rating)',$rating_filters);
           }
           $this->db->group_by('marketplace_review.reciever_id');
        }
        
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array();
        
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
    
    public function equipment_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
        $arr = ['contractor', 'supplier'];
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
        
           $this->db->where_in('marketplace_review.rating',$rating_filter);
        }
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        // echo $this->db->last_query();die;
        return $sel->result_array();
    }
    
    public function material_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
       $arr = ['contractor', 'supplier'];
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
    
    public function tenderNotifications()
    {
        $this->db->select('*');
        $this->db->from('tender_notification');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function marketplaceNotifications()
    {
        $this->db->select('*');
        $this->db->from('marketplace_notification');
        $sel = $this->db->get();
        return $sel->result_array();
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
    
    public function contractorReview($market_user_id)
    {
        $this->db->select('marketplace_review.rating,marketplace_review.msg,tender.name,tender.image');
        $this->db->from('marketplace_review');
        $this->db->join('tender','tender.user_id=marketplace_review.sender_id');
        $this->db->where('reciever_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function LabourReview($market_user_id)
    {
        $this->db->select('marketplace_review.rating,marketplace_review.msg,marketplace_review.sender_type,marketplace_review.sender_id');
        $this->db->where_in('sender_type', ['contractor', 'sub_contractor', 'tender']);
        $this->db->where('reciever_id',$market_user_id);
        $this->db->order_by('marketplace_review.id','desc');
        $query = $this->db->get('marketplace_review');
         return $query->result_array(); 
    }
    
    public function getallprojectImages($project_id)
    {
        $this->db->select('marketplace_project_images.images');
        $this->db->from('marketplace_project_images');
        $this->db->where('project_id',$project_id);
        $sel = $this->db->get();
        return $sel->result_array();
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
    
    public function contractorQualifications($market_user_id)
    {
        $this->db->select('marketplace_qualification.qualification');
        $this->db->from('marketplace_qualification');
        $this->db->where('market_user_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->result_array();
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
    
    public function bidImages($id)
    {
        $this->db->select('contractor_bid_images.images');
        $this->db->from('contractor_bid_images');
        $this->db->where('bid_id',$id);
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
    
    public function marketplaceCount($type)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('marketplace.type',$type);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function getbiddingdata($bid_id){
        $this->db->select('contractor_bid.contractor_id,contractor_bid.user_id,tender.unique_id');
        $this->db->from('contractor_bid');
        $this->db->join('tender','tender.user_id=contractor_bid.user_id');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function biddingNotification($receiver_id)
    {
        $this->db->select('notification.token_id,notification.user_id,notification.type,contractor_bid.*,tender.name');
        $this->db->from('notification');
        $this->db->join('contractor_bid','contractor_bid.contractor_id=notification.user_id');
        $this->db->join('tender','contractor_bid.user_id=tender.user_id');
        $this->db->where('notification.user_id',$receiver_id);
        $this->db->where('contractor_bid.response','1');
        $sel= $this->db->get();
        return $sel->row_array();
    }
    
   
    
    
}

