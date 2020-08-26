 <?php


class Labour_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertdetailsimg($labour_id,$wages,$file1)
    {
        
        $data = array(
            'market_user_id'=>$labour_id,
            'wages'=>$wages,
            'image'=>$file1,
            'time'=>date('Y-m-d'),
            );
        
        $this->db->insert('labour_details',$data);
        $id =    $this->db->insert_id();
        $this->db->where('market_user_id',$labour_id);
        $this->db->update('marketplace',['type'=>'labour']);
        // // return true;
        $this->db->select('labour_details.image,marketplace.*');
        $this->db->from('labour_details');
        $this->db->join('marketplace','marketplace.market_user_id=labour_details.market_user_id');
        $this->db->where('labour_details.labour_detail_id',$id);
        $sel=  $this->db->get();
        $row = array_merge($sel->row_array(), ['id' => $id]);
        // print_r($row);die;
        return $row;
        
        
    }
    
    public function editProfile($labour_id,$wages,$file1,$name)
    {
     
     $data = array(
         'market_user_id'=>$labour_id,
         'wages'=>$wages,
         'image'=>$file1,
         'time'=>date('Y-m-d'),
         );
         $this->db->where('market_user_id',$labour_id);
         $this->db->update('labour_details',$data);
         $this->db->where('market_user_id',$labour_id);
          $this->db->update('marketplace',['name'=>$name]);
          $this->db->select('labour_details.*,marketplace.name,marketplace.email,marketplace.type');
          $this->db->from('labour_details');
          $this->db->join('marketplace','marketplace.market_user_id=labour_details.market_user_id');
          $this->db->where('labour_details.market_user_id',$labour_id);
          $sel = $this->db->get();
          return $sel->row_array();
        //  return $this->db->affected_rows();
    }
    
    public function delimages($id)
    {
        $this->db->where('labour_detail_id',$id);
        $this->db->delete('labour_details_image');
        return $this->db->affected_rows();
    }
    
    public function labourLocation($loc,$labour_id)
    {
        $this->db->insert('marketplace_location',['market_user_id'=>$labour_id,'location_id'=>$loc]);
        return $this->db->insert_id();
    }
    
    public function labourSkills($skill,$labour_id)
    {
        $this->db->insert('marketplace_skills',['market_user_id'=>$labour_id,'skill_id'=>$skill]);
        return $this->db->insert_id();
    }
    
    public function labouraoi($a,$labour_id)
    {
        $this->db->insert('marketplace_aoi',['market_user_id'=>$labour_id,'aoi_desc_id'=>$a]);
        return $this->db->insert_id();
    }
    
    public function detailsImages($file,$id)
    {
        // print_r($id);die;
        $this->db->insert('labour_details_image',['labour_detail_id'=>$id,'images'=>$file]);
        return $this->db->insert_id();
    }
    
    public function typeupd($labour_id)
    {
        $this->db->where('market_user_id',$labour_id);
        $this->db->update('marketplace',['type'=>'labour']);
        return $this->db->affected_rows();
    }
    
    public function addPost($labour_id,$title,$aoi,$skills,$location,$wages)
    {
        $data = array(
            'market_user_id'=>$labour_id,
            'title'=>$title,
            'aoi_id'=>$aoi,
            'skill_id'=>$skills,
            'location_id'=>$location,
            'wages'=>$wages,
            'time'=>date('Y-m-d'),
            
            
            );
            
            $this->db->insert('labour_post',$data);
            return $this->db->insert_id();
        
    }
    
    public function editProject($id,$title,$aoi,$skills,$location,$wages)
    {
        $data = array(
            'labour_post_id'=>$id,
            'title'=>$title,
            'aoi_id'=>$aoi,
            'skill_id'=>$skills,
            'location_id'=>$location,
            'wages'=>$wages,
            'time'=>date('Y-m-d'),
            );
            $this->db->where('labour_post_id',$id);
            $this->db->update('labour_post',$data);
            return true;
    }
    
    public function delProjectImages($id)
    {
        $this->db->where('labour_post_id',$id);
        $this->db->delete('labour_post_images');
        return $this->db->affected_rows();
    }
    
    public function postImages($file,$id)
    {
        $this->db->insert('labour_post_images',['labour_post_id'=>$id,'images'=>$file]);
        return $this->db->insert_id();
        
    }
    
    public function deleteLabourProjects($id)
    {
        $this->db->where('labour_post_id',$id);
        $this->db->delete('labour_post');
        $this->db->where('labour_post_id',$id);
        $this->db->delete('labour_post_images');
        return $this->db->affected_rows();
    }
    
    public function getcontractorRequest($labour_id)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,contractor_labour_contact.title,contractor_labour_contact.start_date,contractor_labour_contact.id,contractor_details.image,locations.location');
        $this->db->from('contractor_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_labour_contact.contractor_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_labour_contact.contractor_id');
        $this->db->join('locations','locations.location_id=contractor_labour_contact.location_id');
        $this->db->where('contractor_labour_contact.labour_id',$labour_id);
        $this->db->where('contractor_labour_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getusersRequest($labour_id)
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_labour_contact.start_date,user_labour_contact.title,user_labour_contact.id,locations.location');
        $this->db->from('user_labour_contact');
        $this->db->join('tender','tender.user_id=user_labour_contact.user_id');
        $this->db->join('labour_details','labour_details.market_user_id=user_labour_contact.market_user_id');
        $this->db->join('locations','locations.location_id=user_labour_contact.location_id');
        $this->db->where('user_labour_contact.market_user_id',$labour_id);
        $this->db->where('user_labour_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getsubcontRequest($labour_id)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,sc_labour_contact.id,sc_labour_contact.title,sc_labour_contact.start_date,locations.location,sub_contractor_details.image');
        $this->db->from('sc_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=sc_labour_contact.sub_contractor_id');
        $this->db->join('locations','locations.location_id=sc_labour_contact.location_id');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=sc_labour_contact.sub_contractor_id');
        $this->db->where('sc_labour_contact.labour_id',$labour_id);
        $this->db->where('sc_labour_contact.response','');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function tenderRequestDetails($id)
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_labour_contact.*,locations.location');
        $this->db->from('user_labour_contact');
        $this->db->join('tender','tender.user_id=user_labour_contact.user_id');
        $this->db->join('labour_details','labour_details.market_user_id=user_labour_contact.market_user_id');
        $this->db->join('locations','locations.location_id=user_labour_contact.location_id');
        $this->db->where('user_labour_contact.id',$id);
        // $this->db->where('user_labour_contact.response','0');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function userchatList($labour_id)
    {
        $this->db->select('tender.name,tender.unique_id,tender.image,user_labour_contact.description,locations.location');
        $this->db->from('user_labour_contact');
        $this->db->join('tender','tender.user_id=user_labour_contact.user_id');
        $this->db->join('labour_details','labour_details.market_user_id=user_labour_contact.market_user_id');
        $this->db->join('locations','locations.location_id=user_labour_contact.location_id');
        $this->db->where('user_labour_contact.market_user_id',$labour_id);
        $this->db->where('user_labour_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractorchatList($labour_id)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,contractor_labour_contact.description,contractor_details.image');
        $this->db->from('contractor_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_labour_contact.contractor_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_labour_contact.contractor_id');
        // $this->db->join('locations','locations.location_id=contractor_labour_contact.location_id');
        $this->db->where('contractor_labour_contact.labour_id',$labour_id);
        $this->db->where('contractor_labour_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function subcontchatList($labour_id)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,sc_labour_contact.description,sub_contractor_details.image');
        $this->db->from('sc_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=sc_labour_contact.sub_contractor_id');
        // $this->db->join('locations','locations.location_id=sc_labour_contact.location_id');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=sc_labour_contact.sub_contractor_id');
        $this->db->where('sc_labour_contact.labour_id',$labour_id);
        $this->db->where('sc_labour_contact.response','1');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function contractorRequestDetails($id)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,contractor_labour_contact.*,contractor_details.image,locations.location');
        $this->db->from('contractor_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_labour_contact.contractor_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_labour_contact.contractor_id');
        $this->db->join('locations','locations.location_id=contractor_labour_contact.location_id');
        $this->db->where('contractor_labour_contact.id',$id);
        // $this->db->where('contractor_labour_contact.response','0');
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function sub_contractorRequestDetails($id)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,sc_labour_contact.*,sub_contractor_details.image,locations.location');
        $this->db->from('sc_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=sc_labour_contact.sub_contractor_id');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=sc_labour_contact.sub_contractor_id');
        $this->db->join('locations','locations.location_id=sc_labour_contact.location_id');
        $this->db->where('sc_labour_contact.id',$id);
        $sel = $this->db->get();
        // echo $this->db->last_query();
        return $sel->row_array();
    }
    public function accept($id,$type)
    {
        if($type == 'contractor')
        {
            $this->db->where('id',$id);
            $this->db->update('contractor_labour_contact',['response'=>'1']);
            return $this->db->affected_rows();
        }
        else if($type == 'sub_contractor')
        {
            $this->db->where('id',$id);
            $this->db->update('sc_labour_contact',['response'=>'1']);
            return $this->db->affected_rows();
        }
        else
        {
            $this->db->where('id',$id);
            $this->db->update('user_labour_contact',['response'=>'1']);
            return $this->db->affected_rows();
            
        }
    }
    
    public function reject($id,$type)
    {
        if($type == 'contractor')
        {
            $this->db->where('id',$id);
            $this->db->update('contractor_labour_contact',['response'=>'0']);
            return true;
        }
        else if($type == 'sub_contractor')
        {
            $this->db->where('id',$id);
            $this->db->update('sc_labour_contact',['response'=>'0']);
            return true;
        }
        else
        {
            $this->db->where('id',$id);
            $this->db->update('user_labour_contact',['response'=>'0']);
            return true;
            
        }
    }
    
    
    
    public function getProfileData($labour_id)
    {
        $this->db->select('*');
        $this->db->from('labour_details');
        $this->db->where('market_user_id',$labour_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function getProfileLocation($labour_id)
    {
        $this->db->select('marketplace_location.location_id,locations.location,locations.location_id');
        $this->db->from('marketplace_location');
        $this->db->join('locations','marketplace_location.location_id=locations.location_id');
        $this->db->where('market_user_id',$labour_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getProfileaoi($labour_id)
    {
        $this->db->select('marketplace_aoi.aoi_desc_id,aoi_description.aoi_desc,aoi_description.aoi_desc_id');
        $this->db->from('marketplace_aoi');
        $this->db->join('aoi_description','aoi_description.aoi_desc_id=marketplace_aoi.aoi_desc_id');
        $this->db->where('market_user_id',$labour_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getProfileskills($labour_id)
    {
        $this->db->select('marketplace_skills.skill_id,skills.*');
        $this->db->from('marketplace_skills');
        $this->db->join('skills','marketplace_skills.skill_id=skills.skill_id');
        $this->db->where('marketplace_skills.market_user_id',$labour_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getProfileImages($labour_detail_id)
    {
        $this->db->select('labour_details_image.images');
        $this->db->from('labour_details_image');
        $this->db->where('labour_detail_id',$labour_detail_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function checkold($old_pass,$labour_id)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $this->db->where('password',$old_pass);
        $this->db->where('market_user_id',$labour_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function changePass($labour_id,$old_pass,$new_pass)
    {
        $this->db->select('*');
        $this->db->from('marketplace');
        $where = "market_user_id = '$labour_id' AND password = '$old_pass'";
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
           $this->db->where('market_user_id',$labour_id);
           $q = $this->db->update('marketplace',['password'=>$new_pass]);
           return true; 
        }
        else
        {
            return false;
        }
    }
    
    public function delLocations($labour_id)
    {
        $this->db->where('market_user_id',$labour_id);
        $this->db->delete('marketplace_location');
        return $this->db->affected_rows();
    }
    
    public function delskills($labour_id)
    {
        $this->db->where('market_user_id',$labour_id);
        $this->db->delete('marketplace_skills');
        return $this->db->affected_rows();
    }
    
    public function delaoi($labour_id)
    {
        $this->db->where('market_user_id',$labour_id);
        $this->db->delete('marketplace_aoi');
        return $this->db->affected_rows();
    }
    
    public function tender_filter($labour_id,$location_filter)
    {
        $this->db->select('tender.name,tender.user_id,tender.image,user_labour_contact.start_date,user_labour_contact.title,user_labour_contact.id,locations.location');
        $this->db->from('user_labour_contact');
        $this->db->join('tender','tender.user_id=user_labour_contact.user_id');
        $this->db->join('labour_details','labour_details.market_user_id=user_labour_contact.market_user_id');
        $this->db->join('locations','locations.location_id=user_labour_contact.location_id');
        if(!empty($location_filter))
        {
            $this->db->where_in('user_labour_contact.location_id',$location_filter);
        }
       
        $this->db->where('user_labour_contact.market_user_id',$labour_id);
        $sel = $this->db->get();
        return $sel->result_array();
        
        
         
    }
    
    public function contractor_filter($labour_id,$location_filter)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,contractor_labour_contact.title,contractor_labour_contact.start_date,contractor_labour_contact.id,contractor_details.image,locations.location');
        $this->db->from('contractor_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=contractor_labour_contact.contractor_id');
        $this->db->join('contractor_details','contractor_details.market_user_id=contractor_labour_contact.contractor_id');
        $this->db->join('locations','locations.location_id=contractor_labour_contact.location_id');
        if(!empty($location_filter))
        {
            $this->db->where_in('contractor_labour_contact.location_id',$location_filter);
        }
        $this->db->where('contractor_labour_contact.labour_id',$labour_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function sub_contractor_filter($labour_id,$location_filter)
    {
        $this->db->select('marketplace.name,marketplace.market_user_id,marketplace.type,sc_labour_contact.id,sc_labour_contact.title,sc_labour_contact.start_date,locations.location,sub_contractor_details.image');
        $this->db->from('sc_labour_contact');
        $this->db->join('marketplace','marketplace.market_user_id=sc_labour_contact.sub_contractor_id');
        $this->db->join('locations','locations.location_id=sc_labour_contact.location_id');
        $this->db->join('sub_contractor_details','sub_contractor_details.market_user_id=sc_labour_contact.sub_contractor_id');
        if(!empty($location_filter))
        {
            $this->db->where_in('sc_labour_contact.location_id',$location_filter);
        }
        $this->db->where('sc_labour_contact.labour_id',$labour_id);
        $sel = $this->db->get();
        return $sel->result_array();
        
    }
    
    public function labourPosts($labour_id)
    {
        $this->db->select('labour_post.*,locations.location,aoi_description.aoi_desc,skills.skill');
        $this->db->from('labour_post');
        $this->db->join('locations','locations.location_id=labour_post.location_id');
        $this->db->join('aoi_description','aoi_description.aoi_desc_id=labour_post.aoi_id');
        $this->db->join('skills','skills.skill_id=labour_post.skill_id');
        $this->db->where('market_user_id',$labour_id);
        $this->db->order_by('labour_post.labour_post_id','desc');
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    public function getpostimages($post_id)
    {
        $this->db->select('labour_post_images.images');
        $this->db->from('labour_post_images');
        $this->db->where('labour_post_id',$post_id);
        $sel = $this->db->get();
        return $sel->result_array();
    }
    
    
    
    
    
    
        
    
    
    
}
