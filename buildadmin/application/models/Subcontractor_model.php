<?php


class Subcontractor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


     
    public function subcontractorDetails($sub_cont_id,$company_name,$cost_range,$monetary,$file1,$file2,$file3,$link)
    {
        $data = array(
            'market_user_id'=>$sub_cont_id,
            'company_name'=>$company_name,
            'cost_range'=>$cost_range,
            'monetory_value'=>$monetary,
            'image'=>$file1,
            'statutory'=>$file2,
            'security'=>$file3,
            'time'=>date('Y-m-d'),
            'link'=>$link,
            );
            
            $this->db->insert('sub_contractor_details',$data);
            $id = $this->db->insert_id();
            $this->db->where('market_user_id',$sub_cont_id);
            $this->db->update('marketplace',['type'=>'sub_contractor']);
            $this->db->select('sub_contractor_details.image,marketplace.*');
            $this->db->from('sub_contractor_details');
            $this->db->join('marketplace','marketplace.market_user_id=sub_contractor_details.market_user_id');
            $this->db->where('sub_contractor_details.sub_cont_details_id',$id);
            $sel = $this->db->get();
            $arr = array_merge($sel->row_array(), ['id' => $id]);
            return $arr;
            
            
    }
    
    public function editProfile($sub_cont_id,$company_name,$cost_range,$monetary,$file1,$file2,$file3,$link,$name)
    {
        // print_r($file1);die;
        $data = array(
            'company_name'=>$company_name,
            'cost_range'=>$cost_range,
            'monetory_value'=>$monetary,
            'image'=>$file1,
            'statutory'=>$file2,
            'security'=>$file3,
            'time'=>date('Y-m-d'),
            'link'=>$link
            );
            
            $this->db->where('market_user_id',$sub_cont_id);
            $this->db->update('sub_contractor_details',$data);
            $this->db->where('market_user_id',$sub_cont_id);
            $this->db->update('marketplace',['name'=>$name]);
            // return $this->db->affected_rows();
            $this->db->select('sub_contractor_details.sub_cont_details_id,sub_contractor_details.image,marketplace.*');
            $this->db->from('sub_contractor_details');
            $this->db->join('marketplace','marketplace.market_user_id=sub_contractor_details.market_user_id');
            $this->db->where('sub_contractor_details.market_user_id',$sub_cont_id);
            $sel = $this->db->get();
            return $sel->row_array();
            
            
    }
    public function sub_cont_location($loc,$sub_cont_id)
    {
        $this->db->insert('marketplace_location',['market_user_id'=>$sub_cont_id,'location_id'=>$loc]);
        return $this->db->insert_id();
        
    }
    
    public function sub_cont_qualification($qualify,$sub_cont_id)
    {
        $this->db->insert('marketplace_qualification',['market_user_id'=>$sub_cont_id,'qualification'=>$qualify]);
        return $this->db->insert_id();
    }
    
    public function detailsImages($filename,$details_id)
    {
        $this->db->insert('sub_contractor_details_image',['sub_cont_details_id'=>$details_id,'images'=>$filename]);
        return $this->db->insert_id();
        
    }
    
    public function typeUpdation($sub_cont_id)
    {
        $this->db->where('market_user_id',$sub_cont_id);
        $this->db->update('marketplace',['type'=>'sub_contractor']);
        return $this->db->affected_rows();
        
    }
    
    public function sub_cont_labour_contact($sub_cont_id,$labour_id,$title,$location,$startdate,$enddate,$desc)
    {
        
        $data = array(
            'sub_contractor_id'=>$sub_cont_id,
            'labour_id'=>$labour_id,
            'title'=>$title,
            'location_id'=>$location,
            'start_date'=>$startdate,
            'end_date'=>$enddate,
            'description'=>$desc,
            'time'=>date('Y-m-d'),
            );
            
            $this->db->insert('sc_labour_contact',$data);
            return $this->db->insert_id();
    }
    
    public function getProfileData($sub_cont_id)
    {
        $this->db->select('*');
        $this->db->from('sub_contractor_details');
        $this->db->where('market_user_id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getProfilequalification($sub_cont_id)
    {
        $this->db->select('marketplace_qualification.qualification');
        $this->db->from('marketplace_qualification');
        $this->db->where('market_user_id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    public function getProfileLocation($sub_cont_id)
    {
        $this->db->select('marketplace_location.location_id,locations.location,locations.location_id');
        $this->db->from('marketplace_location');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->where('market_user_id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function checkold($old_pass,$sub_cont_id)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('password',$old_pass);
        $this->db->where('market_user_id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function changePass($sub_cont_id,$old_pass,$new_pass)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $where = "market_user_id = '$sub_cont_id' AND password = '$old_pass'";
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
           $this->db->where('market_user_id',$sub_cont_id);
           $q = $this->db->update('marketplace',['password'=>$new_pass]);
           return true; 
        }
        else
        {
            return false;
        }
    }
    
    public function delQualification($sub_cont_id)
    {
        $this->db->where('market_user_id',$sub_cont_id);
        $this->db->delete('marketplace_qualification');
        return $this->db->affected_rows();
    }
    
    public function delLocation($sub_cont_id)
    {
        $this->db->where('market_user_id',$sub_cont_id);
        $this->db->delete('marketplace_location');
        return $this->db->affected_rows();
    }
    
    public function getequipmentimg($id)
    {
        $this->db->select('supplier_equip_post_images.images');
        $this->db->from('supplier_equip_post_images');
        $this->db->where('supplier_equip_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    // public function getmaterialLists()
    // {
    //     $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
    //     $this->db->from('supplier_material_post');
    //     $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
    //     $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
    //     $sel = $this->db->get();
    //     return $sel->result_array();
    // }
    
    public function getmaterialimg($id)
    {
        $this->db->select('supplier_material_post_images.images');
        $this->db->from('supplier_material_post_images');
        $this->db->where('supplier_mat_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function recievedMessageSection($sub_cont_id)
    {
        $this->db->select('contractor_sc_contact.contractor_sc_contact_id,contractor_sc_contact.title,marketplace.market_user_id,marketplace.name,contractor_details.image,locations.location');
        $this->db->from('contractor_sc_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_sc_contact.contractor_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_sc_contact.contractor_id');
        $this->db->join('locations','locations.location_id=contractor_sc_contact.location_id');
        $this->db->where('contractor_sc_contact.sub_contractor_id',$sub_cont_id);
        $this->db->where('contractor_sc_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
        
        
    }
    
    public function contractor_equip_contact($sub_cont_id)
    {
        $this->db->select('contractor_equipment_contact.id,contractor_equipment_contact.title,contractor_equipment_contact.equipment_id,locations.location,marketplace.market_user_id,marketplace.name,contractor_details.image');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.market_user_id');
        $this->db->join('locations','locations.location_id=contractor_equipment_contact.location_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_equipment_contact.market_user_id');
        $this->db->where('contractor_equipment_contact.equipment_id',$sub_cont_id);
        $this->db->where('contractor_equipment_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractor_mat_contact($sub_cont_id)
    {
        $this->db->select('contractor_material_contact.id,contractor_material_contact.title,contractor_material_contact.material_id,locations.location,marketplace.market_user_id,marketplace.name,contractor_details.image');
        $this->db->from('contractor_material_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.market_user_id');
        $this->db->join('locations','locations.location_id=contractor_material_contact.location_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_material_contact.market_user_id');
        $this->db->where('contractor_material_contact.material_id',$sub_cont_id);
        $this->db->where('contractor_material_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function chatList($sub_cont_id)
    {
        $this->db->select('contractor_sc_contact.response,marketplace.market_user_id,marketplace.name,marketplace.type,contractor_details.image');
        $this->db->from('contractor_sc_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_sc_contact.contractor_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_sc_contact.contractor_id');
        // $this->db->join('locations','locations.location_id=contractor_sc_contact.location_id');
        $this->db->where('contractor_sc_contact.sub_contractor_id',$sub_cont_id);
        $this->db->where('contractor_sc_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function messageSectionDetails($id)
    {
        
        $this->db->select('contractor_sc_contact.*,locations.location,marketplace.market_user_id,marketplace.name,contractor_details.image');
        $this->db->from('contractor_sc_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_sc_contact.contractor_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_sc_contact.contractor_id');
        $this->db->join('locations','locations.location_id=contractor_sc_contact.location_id');
        $this->db->where('contractor_sc_contact.contractor_sc_contact_id',$id);
        $sel = $this->db->get();
        return $sel->row_array();
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
    public function getequipmentlistsbyid($market_user_id)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where('supplier_equip_post.supplier_equip_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getmaterialListsbyid($market_user_id)
    {
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where('supplier_material_post.supplier_mat_id',$market_user_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function sc_equip_contact($sub_contractor_id,$equip_id,$title,$location,$startdate,$enddate,$desc)
    {
        $data = array(
            'sub_contractor_id'=>$sub_contractor_id,
            'equipment_id'=>$equip_id,
            'title'=>$title,
            'location_id'=>$location,
            'start_date'=>$startdate,
            'end_date'=>$enddate,
            'description'=>$desc,
            'type'=>'rent',
            'response'=>''
            );
            
            $this->db->insert('sc_equip_contact',$data);
            return $this->db->insert_id();
        
    }
    
    // public function getprojectImages($id)
    // {
    //     $this->db->select('sub_contractor_details_image.images');
    //     $this->db->from('sub_contractor_details_image');
    //     $this->db->where('sub_cont_details_id',$id);
    //     $sel = $this->db->get();
    //     return $sel->result_array();
    // }
    
    public function getprojectimages($project_id)
    {
        $this->db->select('marketplace_project_images.images');
        $this->db->from('marketplace_project_images');
        $this->db->where('project_id',$project_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function delprofileImages($id)
    {
        $this->db->where('sub_cont_details_id',$id);
        $this->db->delete('sub_contractor_details_image');
        return $this->db->affected_rows();
    }
    
    public function accept($id)
    {
        $this->db->where('contractor_sc_contact_id',$id);
        $this->db->update('contractor_sc_contact',['response'=>'1']);
        return true;
    }
    
    public function decline($id)
    {
        $this->db->where('contractor_sc_contact_id',$id);
        $this->db->update('contractor_sc_contact',['response'=>'0']);
        return true;
        
    }
    
    public function supplierHomescreen($sub_cont_id)
    {
        $this->db->select('supplier_equip_post.supplier_equip_id,supplier_equip_post.title,supplier_equip_post.type,supplier_equip_post.location_id,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        $this->db->where('supplier_equip_post.market_user_id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    public function suppliermaterialHomescreen($sub_cont_id)
    {
        $this->db->select('supplier_material_post.supplier_mat_id,supplier_material_post.title,supplier_material_post.location_id,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('locations','locations.location_id=supplier_material_post.location_id');
        $this->db->where('supplier_material_post.market_user_id',$sub_cont_id);
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
    
    public function laboursentRequest($sub_cont_id)
    {
        $this->db->select('sc_labour_contact.id,sc_labour_contact.title,sc_labour_contact.response,sc_labour_contact.labour_id,sc_labour_contact.time,labour_details.image,marketplace.name,marketplace.type');
        $this->db->from('sc_labour_contact');
        $this->db->join('labour_details','labour_details.market_user_id=sc_labour_contact.labour_id');
        $this->db->join('marketplace','marketplace.market_user_id=sc_labour_contact.labour_id');
        $this->db->where('sc_labour_contact.sub_contractor_id',$sub_cont_id);
        $this->db->order_by('sc_labour_contact.id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function materialsentRequest($sub_cont_id)
    {
       $this->db->select('contractor_material_contact.id,contractor_material_contact.title,contractor_material_contact.material_id,contractor_material_contact.response,contractor_material_contact.time,marketplace.name,marketplace.type');
       $this->db->from('contractor_material_contact');
       $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.material_id');
       $this->db->where('contractor_material_contact.market_user_id',$sub_cont_id);
       $this->db->order_by('contractor_material_contact.id','desc');
       $sel = $this->db->get();
       return $sel->result_array();
    }
    
    public function equipmentsentRequest($sub_cont_id)
    {
      $this->db->select('contractor_equipment_contact.id,contractor_equipment_contact.title,contractor_equipment_contact.market_user_id,contractor_equipment_contact.equipment_id,contractor_equipment_contact.response,contractor_equipment_contact.time,marketplace.name,marketplace.type');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.equipment_id');
        $this->db->where('contractor_equipment_contact.market_user_id',$sub_cont_id);
        $this->db->order_by('contractor_equipment_contact.id','desc');
        $sel = $this->db->get();
        return $sel->result_array();  
    }
    
    public function equipmentRequestDetails($id)
    {
        $this->db->select('contractor_equipment_contact.*,marketplace.name,marketplace.type,locations.location');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.equipment_id');
        $this->db->join('locations','locations.location_id=contractor_equipment_contact.location_id');
        $this->db->where('contractor_equipment_contact.id',$id);
        $sel = $this->db->get();
        return $sel->row_array(); 
        
    }
    public function materialRequestDetails($id)
    {
       $this->db->select('contractor_material_contact.*,marketplace.name,marketplace.type,locations.location');
       $this->db->from('contractor_material_contact');
       $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.material_id');
       $this->db->join('locations','locations.location_id=contractor_material_contact.location_id');
       $this->db->where('contractor_material_contact.id',$id);
       $sel = $this->db->get();
       return $sel->row_array();
    }
    
    public function labourRequestDetails($id)
    {
        $this->db->select('sc_labour_contact.*,labour_details.image,marketplace.name,marketplace.type,locations.location');
        $this->db->from('sc_labour_contact');
        $this->db->join('labour_details','labour_details.market_user_id=sc_labour_contact.labour_id');
        $this->db->join('marketplace','marketplace.market_user_id=sc_labour_contact.labour_id');
        $this->db->join('locations','locations.location_id=sc_labour_contact.location_id');
        $this->db->where('sc_labour_contact.id',$id);
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
        $arr = ['supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->order_by('supplier_equip_post.supplier_equip_id','desc');
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
        $arr = ['supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->order_by('supplier_equip_post.supplier_equip_id','desc');
         $this->db->where('supplier_equip_post.status','Active');
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    
    public function getmaterialLists($id=null)
    {
        $arr = ['supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->order_by('supplier_material_post.supplier_mat_id','desc');
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
        $arr = ['supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->order_by('supplier_material_post.supplier_mat_id','desc');
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        return $sel->num_rows();
    }
    
    public function labourChat($sub_cont_id)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,sc_labour_contact.description,labour_details.image');
        $this->db->from('sc_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=sc_labour_contact.labour_id');
        // $this->db->join('locations','locations.location_id=sc_labour_contact.location_id');
        $this->db->join('labour_details','labour_details.market_user_id=sc_labour_contact.labour_id');
        $this->db->where('sc_labour_contact.sub_contractor_id',$sub_cont_id);
        $this->db->where('sc_labour_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function supplier_equip_chat($sub_cont_id)
    {
        $this->db->select('supplier_details.image,supplier_details.market_user_id,marketplace.name,marketplace.type,');
        $this->db->from('contractor_equipment_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_equipment_contact.equipment_id');
        $this->db->join('supplier_details','supplier_details.market_user_id=contractor_equipment_contact.equipment_id');
        // $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        $this->db->where('contractor_equipment_contact.market_user_id',$sub_cont_id);
        $this->db->where('contractor_equipment_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function supplier_mat($sub_cont_id)
    {
        $this->db->select('supplier_details.image,supplier_details.market_user_id,marketplace.name,marketplace.type,');
        $this->db->from('contractor_material_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_material_contact.material_id');
        $this->db->join('supplier_details','supplier_details.market_user_id=contractor_material_contact.material_id');
        // $this->db->join('tender','tender.user_id=user_equipment_contact.user_id');
        $this->db->where('contractor_material_contact.market_user_id',$sub_cont_id);
        $this->db->where('contractor_material_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function labour_filter($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
        $this->db->select('labour_details.image,labour_details.wages,marketplace_location.market_user_id,locations.location,marketplace.name');
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
       $arr = ['supplier'];
       $this->db->select('supplier_equip_post.title,supplier_equip_post.type,supplier_equip_post.supplier_equip_id,supplier_equip_post.market_user_id,supplier_equip_post.location_id,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','marketplace.market_user_id=supplier_equip_post.market_user_id');
        $this->db->join('locations','locations.location_id=supplier_equip_post.location_id');
        if(!empty($location_filter[0])){
            
            $this->db->where_in('supplier_equip_post.location_id',$location_filter);
        }
        if(!empty($min_price_filter)){
            $this->db->where('(perdayprice >= '.$min_price_filter.' or price >= '.$min_price_filter.')');
            // $this->db->or_where('perdayprice >=', $min_price_filter);
            // $this->db->or_where('price >=', $min_price_filter);
        }
        if(!empty($max_price_filter)){
             $this->db->where('(perdayprice <= '.$max_price_filter.' or price <= '.$max_price_filter.')');
            // $this->db->or_where('perdayprice <=', $max_price_filter);
            // $this->db->or_where('price <=', $max_price_filter);
        }
        if(!empty($rating_filter['0']))
        {
           $this->db->join('marketplace_review','marketplace_review.reciever_id=supplier_equip_post.market_user_id');
           $this->db->where_in('marketplace_review.rating',$rating_filter);
        }
        $this->db->where_in('marketplace.type', $arr);
        $sel = $this->db->get();
        // echo $this->db->last_query();
        return $sel->result_array();
    }
    
    public function material_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter)
    {
       $arr = ['supplier'];
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
           $this->db->where_in('marketplace_review.rating',$rating_filter);
        }
        $this->db->where_in('marketplace.type', $arr);
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
   
   public function getProjectDetails($sub_cont_id)
    {
        $this->db->select('marketplace_project.*,locations.location,');
        $this->db->from('marketplace_project');
        $this->db->join('locations','locations.location_id=marketplace_project.location_id');
        $this->db->where('contractor_id',$sub_cont_id);
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
    
    public function supplierimg($id)
    {
        $this->db->select('supplier_details.image');
        $this->db->from('supplier_details');
        $this->db->where('market_user_id',$id);
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
    
    public function getposts($sub_cont_id)
    {
        $this->db->select('sub_contractor_details.posts');
        $this->db->from('sub_contractor_details');
        $this->db->where('market_user_id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->row_array();
        
    }
    public function getpaymentdate($sub_cont_id)
    {
        $this->db->select('payment.date');
        $this->db->from('payment');
        $this->db->where('market_user_id',$sub_cont_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function equipmentSearch($field)
    {
        $arr = ['supplier'];
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
        $arr = ['supplier'];
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
    
    public function equipmentRatings($market_user_id)
    {
        $this->db->select('sum(marketplace_review.rating)/count(marketplace_review.rating) as rating, count(marketplace_review.rating) as rating_count');
            $this->db->from('marketplace_review');
            $this->db->where('reciever_id',$market_user_id);
            $this->db->group_by('reciever_id');
            $sel = $this->db->get();
            return $sel->row_array();
    }
    
    public function homescreenSearch($field,$type)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,'.$type.'_details.wages,'.$type.'_details.image,marketplace_location.market_user_id,locations.location');
        $this->db->from('marketplace');
        $this->db->join($type.'_details','marketplace.market_user_id='.$type.'_details.market_user_id');
        $this->db->join('marketplace_location','marketplace_location.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->group_by('marketplace.market_user_id');
        $this->db->where("marketplace.name LIKE '%$field%'");
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function updateplan($sub_cont_id)
    {
        $this->db->where('market_user_id',$sub_cont_id);
        $this->db->update('marketplace',['plan_type'=>'Basic']);
        return $this->db->affected_rows();
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
        $arr = ['supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,marketplace.type,supplier_equip_post.*,locations.location');
        $this->db->from('supplier_equip_post');
        $this->db->join('marketplace','supplier_equip_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_equip_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        $this->db->where("locations.location LIKE '%$field%'");
        $this->db->where('supplier_equip_post.status','Active');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
     public function materialbyLocation($field)
    {
        $arr = ['supplier'];
        $this->db->select('marketplace.market_user_id,marketplace.name,supplier_material_post.*,locations.location');
        $this->db->from('supplier_material_post');
        $this->db->join('marketplace','supplier_material_post.market_user_id=marketplace.market_user_id');
        $this->db->join('locations','supplier_material_post.location_id=locations.location_id');
        $this->db->where_in('marketplace.type',$arr);
        $this->db->where("locations.location LIKE '%$field%'");
        $this->db->where('supplier_material_post.status','Active');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getPlanType($sub_cont_id)
    {
            $this->db->select('*');
            $this->db->from('marketplace');
            $this->db->where('market_user_id',$sub_cont_id);
            $sel = $this->db->get();
            return $sel->row_array();
    }
    
}

