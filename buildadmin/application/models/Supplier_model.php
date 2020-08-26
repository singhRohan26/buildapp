<?php


class Supplier_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 
     
     public function insertdetailsimg($supplier_id,$company_name,$file1,$link)
     {
         $data = array(
             'market_user_id' =>$supplier_id,
             'company_name'=>$company_name,
             
             'image'=>$file1,
             'time'=>DATE('Y-m-d'),
             'link'=>$link
             );
             
             $this->db->insert('supplier_details',$data);
             $id = $this->db->insert_id();
             $this->db->where('market_user_id',$supplier_id);
             $this->db->update('marketplace',['type'=>'supplier']);
             $this->db->select('supplier_details.image,marketplace.*');
             $this->db->from('supplier_details');
             $this->db->join('marketplace','marketplace.market_user_id=supplier_details.market_user_id');
             $this->db->where('supplier_details.supplier_detail_id',$id);
             $sel = $this->db->get();
             return $sel->row_array();
             
             
     }
     
     public function insertdetails($supplier_id,$company_name,$link)
     {
         $data = array(
             'market_user_id' =>$supplier_id,
             'company_name'=>$company_name,
             
             'time'=>DATE('Y-m-d'),
             'link'=>$link
             
             );
             
             $this->db->insert('supplier_details',$data);
             $id = $this->db->insert_id();
             $this->db->where('market_user_id',$supplier_id);
            $this->db->update('marketplace',['type'=>'supplier']);
             $this->db->select('supplier_details.image,marketplace.*');
             $this->db->from('supplier_details');
             $this->db->join('marketplace','marketplace.market_user_id=supplier_details.market_user_id');
             $this->db->where('supplier_details.supplier_detail_id',$id);
             $sel = $this->db->get();
             return $sel->row_array();
         
     }
     
     public function editProfile($supplier_id,$company_name,$file1,$name,$link)
     {
         $data = array(
             'company_name'=>$company_name,
             'image'=>$file1,
             'link'=>$link
             );
             
             $this->db->where('market_user_id',$supplier_id);
             $this->db->update('supplier_details',$data);
             $this->db->where('market_user_id',$supplier_id);
             $this->db->update('marketplace',['name'=>$name]);
            //  return $this->db->affected_rows();
             $this->db->select('supplier_details.image,marketplace.*');
             $this->db->from('supplier_details');
             $this->db->join('marketplace','marketplace.market_user_id=supplier_details.market_user_id');
             $this->db->where('supplier_details.market_user_id',$supplier_id);
             $sel = $this->db->get();
             return $sel->row_array();
         
     }
     
     public function typeUpdate($supplier_id)
     {
         $this->db->where('market_user_id',$supplier_id);
        $this->db->update('marketplace',['type'=>'supplier']);
        return $this->db->affected_rows();
     }
     
     public function addpostrent($name,$supplier_id,$location,$status,$type,$perdayprice,$permonthprice,$from_hour,$to_hour,$desc)
     {
        $data = array(
            'title'=>$name,
            'market_user_id'=>$supplier_id,
            'location_id'=>$location,
            'status'=>$status,
            'type'=>$type,
            'perdayprice'=>$perdayprice,
            'permonthprice'=>$permonthprice,
            'from_hour'=>$from_hour,
            'to_hour'=>$to_hour,
            'description'=>$desc,
            
            ); 
            
            $this->db->insert('supplier_equip_post',$data);
            return $this->db->insert_id();
            
         
     }
     
     public function updatepostrent($id,$name,$location,$status,$type,$perdayprice,$permonthprice,$from_hour,$to_hour,$desc)
     {
          $data = array(
            'title'=>$name,
            // 'market_user_id'=>$supplier_id,
            'location_id'=>$location,
            'status'=>$status,
            'type'=>$type,
            'perdayprice'=>$perdayprice,
            'permonthprice'=>$permonthprice,
            'from_hour'=>$from_hour,
            'to_hour'=>$to_hour,
            'description'=>$desc,
            
            ); 
            
            $this->db->where('supplier_equip_id',$id);
            $this->db->update('supplier_equip_post',$data);
            return $this->db->affected_rows();
         
     }
     
     public function addpostsell($name,$supplier_id,$location,$status,$type,$desc,$price)
     {
        $data = array(
            'title'=>$name,
            'market_user_id'=>$supplier_id,
            'location_id'=>$location,
            'status'=>$status,
            'type'=>$type,
            'description'=>$desc,
            'price'=>$price
            
            ); 
            $this->db->insert('supplier_equip_post',$data);
            return $this->db->insert_id();
         
     }
     
     public function updatepostsell($id,$name,$location,$status,$type,$desc,$price)
     {
         $data = array(
            'title'=>$name,
            // 'market_user_id'=>$supplier_id,
            'location_id'=>$location,
            'status'=>$status,
            'type'=>$type,
            'description'=>$desc,
            'price'=>$price
            
            ); 
            $this->db->where('supplier_equip_id',$id);
            $this->db->update('supplier_equip_post',$data);
            return $this->db->affected_rows();
     }
     
     public function addpostmaterial($name,$supplier_id,$location,$status,$quantity,$unit,$price,$desc)
     {
        $data = array(
            'title'=>$name,
            'market_user_id'=>$supplier_id,
            'location_id'=>$location,
            'status'=>$status,
            
            'quantity'=>$quantity,
            'unit'=>$unit,
            'price'=>$price,
            'description'=>$desc,
            
            
            ); 
         
         $this->db->insert('supplier_material_post',$data);
         return $this->db->insert_id();
     }
     
     public function updatepostmaterial($id,$name,$location,$status,$quantity,$unit,$price,$desc)
     {
         $data = array(
            'title'=>$name,
            // 'market_user_id'=>$supplier_id,
            'location_id'=>$location,
            'status'=>$status,
            
            'quantity'=>$quantity,
            'unit'=>$unit,
            'price'=>$price,
            'description'=>$desc,
            
            
            ); 
         
        //  $this->db->insert('supplier_material_post',$data);
        //  return $this->db->insert_id();
        
        $this->db->where('supplier_mat_id',$id);
        $this->db->update('supplier_material_post',$data);
        return $this->db->affected_rows();
        
         
     }
     
     public function supplier_equip_images($file,$id,$category)
     {
         if($category == 'equipment')
         {
             $this->db->insert('supplier_equip_post_images',['supplier_equip_id'=>$id,'images'=>$file]);
             return $this->db->insert_id();
         }
         else
         {
             $this->db->insert('supplier_material_post_images',['supplier_mat_id'=>$id,'images'=>$file]);
             return $this->db->insert_id();
         }
         
     }
     
    //  public function typeUpdate($category,$supplier_id)
    //  {
    //      $this->db->where('market_user_id',$supplier_id);
    //      $this->db->update('marketplace',['type'=>$category]);
    //      return $this->db->affected_rows();
    //  }
     
     
     public function profileLocation($loc,$supplier_id)
     {
         $this->db->insert('marketplace_location',['market_user_id'=>$supplier_id,'location_id'=>$loc]);
         return $this->db->insert_id();
     }
     
     public function supplieraoi($a,$supplier_id)
     {
         $this->db->insert('marketplace_aoi',['market_user_id'=>$supplier_id,'aoi_desc_id'=>$a]);
        return $this->db->insert_id();
     }
     
     public function getProfileData($supplier_id)
     {
         $this->db->select('*');
         $this->db->from('supplier_details');
         $this->db->where('market_user_id',$supplier_id);
         $sel = $this->db->get();
         return $sel->row_array();
     }
     
     public function getProfileLocation($supplier_id)
    {
        $this->db->select('marketplace_location.location_id,locations.location,locations.location_id');
        $this->db->from('marketplace_location');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getProfileaoi($supplier_id)
    {
        $this->db->select('marketplace_aoi.aoi_desc_id,aoi_description.aoi_desc,aoi_description.aoi_desc_id');
        $this->db->from('marketplace_aoi');
        $this->db->join('aoi_description','aoi_description.aoi_desc_id=marketplace_aoi.aoi_desc_id');
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function delLocations($supplier_id)
    {
        $this->db->where('market_user_id',$supplier_id);
        $this->db->delete('marketplace_location');
        return $this->db->affected_rows();
    }
    
    public function delaoi($supplier_id)
    {
        $this->db->where('market_user_id',$supplier_id);
        $this->db->delete('marketplace_aoi');
        return $this->db->affected_rows();
    }
    
    public function checkold($old_pass,$supplier_id)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('password',$old_pass);
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function changePass($supplier_id,$old_pass,$new_pass)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $where = "market_user_id = '$supplier_id' AND password = '$old_pass'";
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
           $this->db->where('market_user_id',$supplier_id);
           $q = $this->db->update('marketplace',['password'=>$new_pass]);
           return true; 
        }
        else
        {
            return false;
        }
    }
    
    public function user_material_request($supplier_id)
    {
        $this->db->select('user_material_contact.id,user_material_contact.title,user_material_contact.location_id,tender.user_id,tender.name,tender.image,locations.location');
        $this->db->from('user_material_contact');
        $this->db->join('tender','tender.user_id=user_material_contact.user_id');
        $this->db->join('locations','locations.location_id=user_material_contact.location_id');
        $this->db->where('user_material_contact.market_user_id',$supplier_id);
        $this->db->where('user_material_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function tender_mat_chat($supplier_id)
    {
        $this->db->select('tender.unique_id,tender.name,tender.image');
        $this->db->from('user_material_contact');
        $this->db->join('tender','tender.user_id=user_material_contact.user_id');
        // $this->db->join('locations','locations.location_id=user_material_contact.location_id');
        $this->db->where('user_material_contact.market_user_id',$supplier_id);
        $this->db->where('user_material_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    
    
    public function user_material_requestDetails($id)
    {
        $this->db->select('user_material_contact.*,tender.user_id,tender.name,tender.image,locations.location');
        $this->db->from('user_material_contact');
        $this->db->join('tender','tender.user_id=user_material_contact.user_id');
        $this->db->join('locations','locations.location_id=user_material_contact.location_id');
        $this->db->where('user_material_contact.id',$id);
        $this->db->where('user_material_contact.response','');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function user_equipment_request($supplier_id)
    {
        $this->db->select('user_equipment_contact.id,user_equipment_contact.title,user_equipment_contact.location_id,user_equipment_contact.type,tender.user_id,tender.name,tender.image,locations.location');
        $this->db->from('user_equipment_contact');
        $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        $this->db->join('locations','locations.location_id=user_equipment_contact.location_id');
        $this->db->where('user_equipment_contact.market_user_id',$supplier_id);
        $this->db->where('user_equipment_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function tender_equip_chat($supplier_id)
    {
        $this->db->select('tender.unique_id,tender.name,tender.image');
        $this->db->from('user_equipment_contact');
        $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        // $this->db->join('locations','locations.location_id=user_equipment_contact.location_id');
        $this->db->where('user_equipment_contact.market_user_id',$supplier_id);
        $this->db->where('user_equipment_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function user_equipment_requestDetails($id)
    {
        $this->db->select('user_equipment_contact.*,tender.user_id,tender.name,tender.image,locations.location');
        $this->db->from('user_equipment_contact');
        $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        $this->db->join('locations','locations.location_id=user_equipment_contact.location_id');
        $this->db->where('user_equipment_contact.id',$id);
        $this->db->where('user_equipment_contact.response','');
        $sel = $this->db->get();
        return $sel->row_array();
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
    
    public function equipSearch($supplier_id,$field)
    {
       $this->db->select('supplier_equip_post.supplier_equip_id,supplier_equip_post.title,supplier_equip_post.type,supplier_equip_post.location_id,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        // $this->db->where('supplier_equip_post.market_user_id',$supplier_id);
        $this->db->where("supplier_equip_post.title LIKE '%$field%'");
        $this->db->where('supplier_equip_post.market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    public function materialSearch($supplier_id,$field)
    {
       $this->db->select('supplier_material_post.supplier_mat_id,supplier_material_post.title,supplier_material_post.location_id,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('locations','locations.location_id=supplier_material_post.location_id');
        $this->db->where("supplier_material_post.title LIKE '%$field%'");
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
    
    public function supplierHomescreenDetails($id)
    {
        $this->db->select('supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        $this->db->where('supplier_equip_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function supplierHomescreenequipDetailsImg($equip_id)
    {
        $this->db->select('supplier_equip_post_images.images');
        $this->db->from('supplier_equip_post_images');
        $this->db->where('supplier_equip_id',$equip_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function supplierHomescreenmaterialDetails($id)
    {
        $this->db->select('supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('locations','locations.location_id=supplier_material_post.location_id');
        $this->db->where('supplier_mat_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function supplierHomescreenmatDetailsImg($material_id)
    {
       $this->db->select('supplier_material_post_images.images');
        $this->db->from('supplier_material_post_images');
        $this->db->where('supplier_mat_id',$material_id);
        $sel = $this->db->get();
        return $sel->result_array(); 
    }
    
    public function delequipImages($id)
    {
        $this->db->where('supplier_equip_id',$id);
        $this->db->delete('supplier_equip_post_images');
        return $this->db->affected_rows();
    }
    
    public function delmaterialImages($id)
    {
        $this->db->where('supplier_mat_id',$id);
        $this->db->delete('supplier_material_post_images');
        return $this->db->affected_rows();
    }
    
    public function getProfileImage($supplier_id)
    {
        $this->db->select('supplier_details.image');
        $this->db->from('supplier_details');
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function deleteequipPosts($id)
    {
        $this->db->where('supplier_equip_id',$id);
        $this->db->delete('supplier_equip_post');
        $this->db->where('supplier_equip_id',$id);
        $this->db->delete('supplier_equip_post_images');
        return $this->db->affected_rows();
        
    }
    
    public function delmatPosts($id)
    {
        $this->db->where('supplier_mat_id',$id);
        $this->db->delete('supplier_material_post');
        $this->db->where('supplier_mat_id',$id);
        $this->db->delete('supplier_material_post_images');
        return $this->db->affected_rows();
    }
    
    public function marketplace_equip_chat($supplier_id)
    {
        $this->db->select('contractor_equipment_contact.market_user_id,marketplace.name,marketplace.type');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.market_user_id');
        // $this->db->join('locations','locations.location_id=contractor_equipment_contact.location_id');
        $this->db->where('contractor_equipment_contact.equipment_id',$supplier_id);
        $this->db->where('contractor_equipment_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function marketplace_mat_chat($supplier_id)
    {
        $this->db->select('contractor_material_contact.market_user_id,marketplace.name,marketplace.type');
       $this->db->from('contractor_material_contact');
       $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.market_user_id');
    //   $this->db->join('locations','locations.location_id=contractor_material_contact.location_id');
       $this->db->where('contractor_material_contact.material_id',$supplier_id);
       $this->db->where('contractor_material_contact.response','1');
       $sel = $this->db->get();
       return $sel->result_array();
    }
    
    public function marketplaceEquipReq($supplier_id)
    {
        $this->db->select('contractor_equipment_contact.id,contractor_equipment_contact.title,contractor_equipment_contact.market_user_id,contractor_equipment_contact.equipment_id,contractor_equipment_contact.response,contractor_equipment_contact.time,contractor_equipment_contact.type as sub_type,contractor_equipment_contact.location_id,marketplace.name,marketplace.type,locations.location');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.market_user_id');
        $this->db->join('locations','locations.location_id=contractor_equipment_contact.location_id');
        $this->db->where('contractor_equipment_contact.equipment_id',$supplier_id);
        $this->db->where('contractor_equipment_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function marketplaceMatReq($supplier_id)
    {
      $this->db->select('contractor_material_contact.id,contractor_material_contact.title,contractor_material_contact.material_id,contractor_material_contact.response,contractor_material_contact.time,contractor_material_contact.location_id,marketplace.name,marketplace.type,locations.location');
       $this->db->from('contractor_material_contact');
       $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.market_user_id');
       $this->db->join('locations','locations.location_id=contractor_material_contact.location_id');
       $this->db->where('contractor_material_contact.material_id',$supplier_id);
       $this->db->where('contractor_material_contact.response','');
       $sel = $this->db->get();
       return $sel->result_array();
    }
    
    public function marketplaceEquipReqDetails($id)
    {
        $this->db->select('contractor_equipment_contact.*,marketplace.name,marketplace.type,locations.location');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.market_user_id');
        $this->db->join('locations','locations.location_id=contractor_equipment_contact.location_id');
        $this->db->where('contractor_equipment_contact.id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function marketplaceMatReqDetails($id)
    {
        $this->db->select('contractor_material_contact.*,marketplace.name,marketplace.type,locations.location');
       $this->db->from('contractor_material_contact');
       $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.market_user_id');
       $this->db->join('locations','locations.location_id=contractor_material_contact.location_id');
       $this->db->where('contractor_material_contact.id',$id);
       $sel = $this->db->get();
       return $sel->row_array();
    }
    
    public function marketplaceacceptResponse($id,$sub_type)
    {
        if($sub_type == 'rent' || $sub_type == 'buy')
        {
            $this->db->where('id',$id);
            $this->db->update('contractor_equipment_contact',['response'=>'1']);
            return $this->db->affected_rows();
        }
        if($sub_type == 'material')
        {
            $this->db->where('id',$id);
            $this->db->update('contractor_material_contact',['response'=>'1']);
            return $this->db->affected_rows();
        }
        
    }
    
    public function marketplacedeclineResponse($id,$sub_type)
    {
        if($sub_type == 'rent' || $sub_type == 'buy')
        {
        $this->db->where('id',$id);
        $this->db->update('contractor_equipment_contact',['response'=>'0']);
        return $this->db->affected_rows();
        }
        if($sub_type == 'material')
        {
            $this->db->where('id',$id);
            $this->db->update('contractor_material_contact',['response'=>'0']);
            return $this->db->affected_rows();
        }

        
    }
    
    public function tenderacceptResponse($id,$sub_type)
    {
        if($sub_type == 'rent' || $sub_type == 'buy')
        {
            $this->db->where('id',$id);
            $this->db->update('user_equipment_contact',['response'=>'1']);
            return $this->db->affected_rows();
        }
        if($sub_type == 'material')
        {
            $this->db->where('id',$id);
            $this->db->update('user_material_contact',['response'=>'1']);
            return $this->db->affected_rows();
        }
        
    }
    
    public function tenderdeclineResponse($id,$sub_type)
    {
         if($sub_type == 'rent' || $sub_type == 'buy')
        {
            $this->db->where('id',$id);
            $this->db->update('user_equipment_contact',['response'=>'0']);
            return $this->db->affected_rows();
        }
        if($sub_type == 'material')
        {
            $this->db->where('id',$id);
            $this->db->update('user_material_contact',['response'=>'0']);
            return $this->db->affected_rows();
        }
    }
    
    public function getsubcontractorImage($user_id)
    {
        $this->db->select('sub_contractor_details.image');
        $this->db->from('sub_contractor_details');
        $this->db->where('market_user_id',$user_id);
        $sel = $this->db->get();
        // echo $this->db->last_query();
        return $sel->row_array();
    }
    
    public function getcontractorImage($user_id)
    {
        $this->db->select('contractor_details.image');
        $this->db->from('contractor_details');
        $this->db->where('market_user_id',$user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getPosts($supplier_id,$type)
    {
        if($type == 'supplier')
        {
            
            $this->db->select('supplier_details.posts');
            $this->db->from('supplier_details');
            $this->db->where('market_user_id',$supplier_id);
            $sel = $this->db->get();
            return $sel->row_array();
        }
        if($type == 'sub_contractor')
        {
            $this->db->select('sub_contractor_details.posts');
            $this->db->from('sub_contractor_details');
            $this->db->where('market_user_id',$supplier_id);
            $sel = $this->db->get();
            return $sel->row_array();
        }
        
    }
    
    public function getPost($supplier_id)
    {
            $this->db->select('supplier_details.posts');
            $this->db->from('supplier_details');
            $this->db->where('market_user_id',$supplier_id);
            $sel = $this->db->get();
            return $sel->row_array();
    }
    
    public function supplierPostUpdate($supplier_id,$post_no,$type)
    {
        if($type == 'supplier')
        {
            $this->db->where('market_user_id',$supplier_id);
            $this->db->update('supplier_details',['posts'=>$post_no]);
            return $this->db->affected_rows();    
        }
        if($type == 'sub_contractor')
        {
            $this->db->where('market_user_id',$supplier_id);
            $this->db->update('sub_contractor_details',['posts'=>$post_no]);
            return $this->db->affected_rows();
        }
        
    }
    
    public function getpaymentdate($supplier_id)
    {
        $this->db->select('payment.date');
        $this->db->from('payment');
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getusertype($supplier_id)
    {
        $this->db->select('marketplace.type');
        $this->db->from('marketplace');
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
     public function getPlanType($supplier_id)
    {
        $this->db->select('marketplace.plan_type');
        $this->db->from('marketplace');
        $this->db->where('market_user_id',$supplier_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function updateplan($supplier_id)
    {
        $this->db->where('market_user_id',$supplier_id);
        $this->db->update('marketplace',['plan_type'=>'Basic']);
        return $this->db->affected_rows();
    }
    
   
    
}