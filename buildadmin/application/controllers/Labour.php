<?php

defined('BASEPATH') OR die('Not Allowed');

class Labour extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Labour_model']);
    }

    public function labourDetails()
    {
        $this->output->set_content_type('application/json');
        $labour_id = $this->input->post('labour_id');
        $location = $this->input->post('location');
        $location = explode(',',$location);
        $skills = $this->input->post('skill');
        $skills = explode(',',$skills);
        $aoi = $this->input->post('aoi_desc');
        $aoi = explode(',',$aoi);
        $wages = $this->input->post('wages');
        if(!empty($_FILES['file1']['name'])){
            $file1=$this->doUploadFile('file1');
        }else{
            $file1='';
        }
        
        $result = $this->Labour_model->insertdetailsimg($labour_id,$wages,$file1);
                    if($result)
                    {
                        $id = $result['id'];
                        foreach($location as $loc)
                        {
                            $this->Labour_model->labourLocation($loc,$labour_id);
                        }
                        
                        foreach($skills as $skill)
                        {
                            $this->Labour_model->labourSkills($skill,$labour_id);
                        }
                        
                        foreach($aoi as $a)
                        {
                            $this->Labour_model->labouraoi($a,$labour_id);
                        }
                        
                        
                        //multiple image upload function call
                        $this->multipleImages($id);
                        //multiple image upload function call
                        
                        
                        // $typeupd = $this->Labour_model->typeupd($labour_id);
                        
                        $img = $result['image'];
                        if(!empty($img))
                        {
                           $result['image']=base_url('uploads/labour/'.$img); 
                        }
                        else
                        {
                            $result['image']='';
                        }
                        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Details Inserted Sucessfully' , 'data' => $result]));
                    }
                    else
                    {
                        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Insert' , 'data' => 'Failed to Insert']));
                    }
        
        
        
    }
    
    public function doUploadFile($file)
    {
        $file1 = $_FILES['file1']['name'];
        $config['upload_path'] = './uploads/labour/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
       // $config['max_filename'] = '2555';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        return $upload_data['file_name'];
        
    }
    
    public function multipleImages($id)
    {
       
         $this->output->set_content_type('application/json');
        //Multiple Images
           $this->load->library('upload');
           if(!empty($_FILES['image_url'])){
               $count = count($_FILES['image_url']['size']);
           } 
           if(!empty($_FILES['media_url'])){
               $count_media = count($_FILES['media_url']['size']);
           }
                 
                 
        foreach ($_FILES as $key => $value) {
            // print_r($_FILES['media_url']);die;
            // print_r($key);die;
            if($key == 'image_url'){
            for ($s = 0; $s < $count; $s++) {
                $_FILES['image_url']['name'] = $value['name'][$s];
                $_FILES['image_url']['type'] = $value['type'][$s];
                $_FILES['image_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url']['error'] = $value['error'][$s];
                $_FILES['image_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Labour_model->detailsImages($data['file_name'],$id);
            }
            }else if($key == 'media_url'){
                
            for ($s = 0; $s < $count_media; $s++) {
                // echo "hiiqqqi";die;
                $_FILES['media_url']['name'] = $value['name'][$s];
                $_FILES['media_url']['type'] = $value['type'][$s];
                $_FILES['media_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['media_url']['error'] = $value['error'][$s];
                $_FILES['media_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('media_url');
                $data = $this->upload->data();
                // echo $data['file_name'];die;
                $this->Labour_model->detailsImages($data['file_name'],$id);
            }
            }
        }
        
        //Multiple Images 
        
        
    }
    
    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/labour/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);

        return $config;
    }
    
    public function addPost()
    {
        $this->output->set_content_type('application/json');
        $labour_id = $this->input->post('labour_id');
        $title = $this->input->post('title');
        $aoi = $this->input->post('aoi');
        $skills = $this->input->post('skill');
        $location = $this->input->post('location');
        $wages = $this->input->post('wages');
        
        $result = $this->Labour_model->addPost($labour_id,$title,$aoi,$skills,$location,$wages);
        if($result)
        {
            $id = $result;
            $this->postImages($id);
            
            
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Submitted Sucessfully' , 'data' => $result]));
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Submit ' , 'data' => 'Failed to Submit']));
        }
        
        
        
    }
    
    public function postImages($id)
    {
        //  $this->output->set_content_type('application/json');
        //Multiple Images
           $this->load->library('upload');
            if(!empty($_FILES['image_url'])){
              $count = count($_FILES['image_url']['name']);
          }
        foreach ($_FILES as $key => $value) {
            if($key == 'image_url'){
            for ($s = 0; $s < $count; $s++) {
                $_FILES['image_url']['name'] = $value['name'][$s];
                $_FILES['image_url']['type'] = $value['type'][$s];
                $_FILES['image_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url']['error'] = $value['error'][$s];
                $_FILES['image_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->postImages_options());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Labour_model->postImages($data['file_name'],$id);
            }
            }
        }
        //Multiple Images 
    }
    
    private function postImages_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/labourPost/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);
        return $config;
    }
   
   public function homescreen()
   {
       $this->output->set_content_type('application/json');
       $labour_id = $this->input->post('labour_id');
       $result['user'] = $this->Labour_model->getusersRequest($labour_id);
    
    $i=0;
        foreach($result['user'] as $user)
        {
            $result['user'][$i]['type'] = 'tender';
            
            $img = $user['image'];
            if(!empty($img))
            {
               $result['user'][$i]['image'] = base_url('uploads/tenderuser/'.$img); 
            }
            else
            {
                $result['user'][$i]['image'] = '';
            }
            $i++;
        }
        
    
       $result['contractor'] = $this->Labour_model->getcontractorRequest($labour_id);
    
       $i=0;
        foreach($result['contractor'] as $contractor)
        {
            
            
            $img = $contractor['image'];
            if(!empty($img))
            {
               $result['contractor'][$i]['image'] = base_url('uploads/contractorDetails/'.$img); 
            }
            else
            {
                $result['contractor'][$i]['image'] = '';
            }
            $i++;
        }
    
      $result['sub_contractor'] = $this->Labour_model->getsubcontRequest($labour_id);
      $i=0;
      foreach($result['sub_contractor'] as $sub_contractor)
      {
          $img = $sub_contractor['image'];
            if(!empty($img))
            {
               $result['sub_contractor'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$img); 
            }
            else
            {
                $result['sub_contractor'][$i]['image'] = '';
            }
          
         $i++; 
      }
    
      $final = array_merge($result['user'],$result['contractor'],$result['sub_contractor']);
    
       if($result)
       {
       $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));    
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'No Requests Yet' , 'data' =>'No Requests Yet']));
       }
   }
   
   public function chatList()
   {
       $this->output->set_content_type('application/json');
       $labour_id = $this->input->post('labour_id');
    // $type = $this->input->post('type');
       $result['user'] = $this->Labour_model->userchatList($labour_id);
       $i=0;
        foreach($result['user'] as $user)
        {
            $result['user'][$i]['type'] = 'tender';
            
            $img = $user['image'];
            if(!empty($img))
            {
               $result['user'][$i]['image'] = base_url('uploads/tenderuser/'.$img); 
            }
            else
            {
                $result['user'][$i]['image'] = '';
            }
            $i++;
        }
       $result['contractor'] = $this->Labour_model->contractorchatList($labour_id);
        $i=0;
        foreach($result['contractor'] as $contractor)
        {
            // $result['user'][$i]['type'] = 'tender';
            
            $img = $contractor['image'];
            if(!empty($img))
            {
               $result['contractor'][$i]['image'] = base_url('uploads/contractorDetails/'.$img); 
            }
            else
            {
                $result['contractor'][$i]['image'] = '';
            }
            $i++;
        }
       $result['sub_contractor'] = $this->Labour_model->subcontchatList($labour_id);
    //   print_r()
        $i=0;
      foreach($result['sub_contractor'] as $sub_contractor)
      {
          $img = $sub_contractor['image'];
            if(!empty($img))
            {
               $result['sub_contractor'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$img); 
            }
            else
            {
                $result['sub_contractor'][$i]['image'] = '';
            }
          
         $i++; 
      }
       
       $final = array_merge($result['user'],$result['contractor'],$result['sub_contractor']);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final])); 
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' =>'data not found']));
       }
       
       
   }
   
   public function homescreenDetails()
   {
       $this->output->set_content_type('application/json');
       $id = $this->input->post('id');
       $type = $this->input->post('type');
       if($type == 'tender')
       {
           $result = $this->Labour_model->tenderRequestDetails($id);
        //   print_r($result);die;
           if($result)
           {
               $img = $result['image'];
               if(!empty($img))
               {
                   $result['image'] = base_url('uploads/tenderuser/'.$img); 
               }
               else
               {
                   $result['image'] = '';
               }
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result])); 
           }
           else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' =>'data not found']));
           }
       }
       if($type == 'contractor')
       {
           $result = $this->Labour_model->contractorRequestDetails($id);
           if($result)
           {
               $img = $result['image'];
               if(!empty($img))
               {
                   $result['image'] = base_url('uploads/contractorDetails/'.$img); 
               }
               else
               {
                   $result['image'] = '';
               }
               
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
           }
           else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' =>'data not found']));
           }
       }
       if($type == 'sub_contractor')
       {
           $result = $this->Labour_model->sub_contractorRequestDetails($id);
           
           if($result)
           {
               $img = $result['image'];
               if(!empty($img))
               {
                   $result['image'] = base_url('uploads/subcontractorDetails/'.$img); 
               }
               else
               {
                   $result['image'] = '';
               }
               
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
           }
           else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' =>'data not found']));
           }
       }
   }
   
   public function response()
   {
       $this->output->set_content_type('application/json');
       $id = $this->input->post('id');
       $type = $this->input->post('type');
       $response = $this->input->post('response');
       if($response == '1')
       {
           $result = $this->Labour_model->accept($id,$type);
           if($result)
           {
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Accepted' , 'data' => 'Request Accepted']));
           }
           else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Accept' , 'data' => 'Failed to Accept']));
           }
       }
       else
       {
           
           $result = $this->Labour_model->reject($id,$type);
           if($result)
           {
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Declined' , 'data' => 'Request Declined']));
           }
           else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to  Decline' , 'data' => 'Failed to  Decline']));
           }
           
       }
       
       
       
   }
   
   
   
   public function getProfileData()
   {
       $this->output->set_content_type('application/json');
       $labour_id = $this->input->post('labour_id');
       $result = $this->Labour_model->getProfileData($labour_id);
       if($result)
       {
           $labour_detail_id = $result['labour_detail_id'];
           $location = $this->Labour_model->getProfileLocation($labour_id);
            $i=0;
            
            foreach($location as $loc)
            {  
                $result['locations'][$i]['location'] = $loc['location'];
                $result['locations'][$i]['location_id'] = $loc['location_id'];
                $i++;
            }
            
            $aoi = $this->Labour_model->getProfileaoi($labour_id);
            $i=0;
            
            foreach($aoi as $a)
            {  
                $result['aoi'][$i]['aoi_desc'] = $a['aoi_desc'];
                $result['aoi'][$i]['aoi_desc_id'] = $a['aoi_desc_id'];
                $i++;
            }
            
            $skills = $this->Labour_model->getProfileskills($labour_id);
            // print_r($skills);die;
            $i=0;
            foreach($skills as $skill)
            {
                $result['skills'][$i]['skill'] = $skill['skill'];
                $result['skills'][$i]['skill_id'] = $skill['skill_id'];
                $i++;
            }
            
            $images = $this->Labour_model->getProfileImages($labour_detail_id);
            $i=0;
            
            foreach($images as $img)
            {  
                $result['images'][$i] = base_url('uploads/labour/'.$img['images']);
                $i++;
            }
            
            
            $img = $result['image'];
            if(!empty($img))
            {
                $result['image']=base_url('uploads/labour/'.$result['image']);
            }
            else
            {
                $result['image']='';
            }
           
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
       }
       else
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data not found' , 'data' => 'data not found']));
       }
       
   }
   
   public function editProfile()
   {
       $this->output->set_content_type('application/json');
       $labour_id = $this->input->post('labour_id');
       $wages = $this->input->post('wages');
       $name = $this->input->post('name');
       $location = $this->input->post('location');
        $location = explode(',',$location);
        $skills = $this->input->post('skill');
        $skills = explode(',',$skills);
        $aoi = $this->input->post('aoi_desc');
        $aoi = explode(',',$aoi);
        if(!empty($_FILES['file1']['name'])){
            $file1=$this->doUploadFile('file1');
        }else{
            $file1='';
        }
        $this->Labour_model->delLocations($labour_id);
        $this->Labour_model->delskills($labour_id);
        $this->Labour_model->delaoi($labour_id);
        // $this->Labour_model->delimages($labour_id);
        $result = $this->Labour_model->editProfile($labour_id,$wages,$file1,$name);
        if($result){
            
            foreach($location as $loc)
                        {
                            $this->Labour_model->labourLocation($loc,$labour_id);
                        }
                        
                        foreach($skills as $skill)
                        {
                            $this->Labour_model->labourSkills($skill,$labour_id);
                        }
                        
                        foreach($aoi as $a)
                        {
                            $this->Labour_model->labouraoi($a,$labour_id);
                        }
                        $img = $result['image'];
                        if(!empty($img))
                        {
                            $result['image']=base_url('uploads/labour/'.$result['image']);
                        }
                        else
                        {
                            $result['image']='';
                        }
                        $id = $result['labour_detail_id'];
                        $this->Labour_model->delimages($id);
                        //multiple image upload function call
                        $this->multipleImages($id);
                        //multiple image upload function call
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Profile Updated' ,'data' => $result]));
            return false;
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Profile Updation Failed' ,'data' => 'Profile Updation Failed']));
            return false;
        }
       
   }
   public function changePass()
   {
       
       $this->output->set_content_type('application/json');
        $labour_id = $this->input->post('labour_id');
        $old_pass = $this->input->post('old_pass');
        $new_pass  = $this->input->post('new_pass');
        $c_pass  = $this->input->post('c_pass');
        $checkold = $this->Labour_model->checkold($old_pass,$labour_id);
        if($checkold)
        {
            if($old_pass == $new_pass)
            {
                $this->output->set_output(json_encode(['result' => -1, 'msg' =>'New and Old Password Cannot be Same' , 'data' => 'New and Old Password Cannot be Same']));
                
            }
            else
            {
                if($new_pass == $c_pass)
                {
                  
                  $result = $this->Labour_model->changePass($labour_id,$old_pass,$new_pass);
                  if($result)
                  {
                      $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Password Changed Sucessfully' , 'data' => 'Password Changed Sucessfully']));
                  }
                  else
                  {
                      $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Update' , 'data' => 'Failed to Update']));
                  }
                   
                   
                    
                }
                else
                {
                    $this->output->set_output(json_encode(['result' => 0, 'msg' =>'New and Confirm Password not Matched' , 'data' => 'New and Confirm Password not Matched']));
                }
                
                
            }
            
                
            
            
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Old Password Not Found' , 'data' => 'Old Password Not Found']));
        }
       
   }
   
   public function filters()
   {
      $this->output->set_content_type('application/json');
      $labour_id = $this->input->post('labour_id');
    //   $type = $this->input->post('type');
      $location_filter = $this->input->post('location_filter');
      $location_filter = explode(',',$location_filter);
      $rating_filter = $this->input->post('rating_filter');
      $rating_filter = explode(',',$rating_filter);
      
         $result['tender_filter'] = $this->Labour_model->tender_filter($labour_id,$location_filter);
         $result['contractor_filter'] = $this->Labour_model->contractor_filter($labour_id,$location_filter);
         $result['sub_contractor_filter'] = $this->Labour_model->sub_contractor_filter($labour_id,$location_filter);
            //   $tempArr = array_unique(array_column($result, 'market_user_id'));
            //       $final = array_intersect_key($result, $tempArr);
            //       $final = array_values($final);
            $i=0;
         foreach($result['tender_filter'] as $tender)
         {
           $img = $tender['image'];
           if(!empty($img))
           {
               $result['tender_filter'][$i]['image'] = base_url('uploads/tenderuser/'.$img);
           }else{
               $result['tender_filter'][$i]['image'] = '';
           }
           
           $i++;  
         }
         
         $i=0;
         foreach($result['contractor_filter'] as $contractor)
         {
            //  echo "hiii";die;
            
              $img = $contractor['image'];
            // print_r($img);die;
           if(!empty($img))
           {
               $result['contractor_filter'][$i]['image'] = base_url('uploads/contractorDetails/'.$img);
           }else{
               $result['contractor_filter'][$i]['image'] = '';
           }
           
           $i++;  
         }
         
          $i=0;
         foreach($result['sub_contractor_filter'] as $subcontractor)
         {
             $img = $subcontractor['image'];
           if(!empty($img))
           {
               $result['sub_contractor_filter'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$img);
           }else{
               $result['sub_contractor_filter'][$i]['image'] = '';
           }
           
           $i++;  
         }
             $final = array_merge($result['tender_filter'],$result['contractor_filter'],$result['sub_contractor_filter']);  
            if($result)
            {
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final ]));
                
            }else{
                $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
            }
      }
      
      public function labourPosts()
      {
          $this->output->set_content_type('application/json');
          $labour_id = $this->input->post('labour_id');
          $result = $this->Labour_model->labourPosts($labour_id);
          if($result)
          {
              $i=0;
              foreach($result as $res)
              {
                  $post_id = $res['labour_post_id'];
                  $images = $this->Labour_model->getpostimages($post_id);
                  $j=0;
                    foreach($images as $img)
                    {
                             if(!empty($img['images']))
                              {
                                  $result[$i]['images'][$j] = base_url('uploads/labourPost/'.$img['images']);
                              }else
                              {
                                  $result[$i]['images'][$j] = '';
                              }
                              $j++;
                    }
                  
                  $i++;
              }
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result ]));
          }else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
          }
      }
      
      public function editDeleteProjects()
      {
          $this->output->set_content_type('application/json');
          $id = $this->input->post('id');
          $key = $this->input->post('key');
          if($key == 'edit')
          {
                $title = $this->input->post('title');
                $aoi = $this->input->post('aoi');
                $skills = $this->input->post('skill');
                $location = $this->input->post('location');
                $wages = $this->input->post('wages');
                $result = $this->Labour_model->editProject($id,$title,$aoi,$skills,$location,$wages);
                if($result)
                {
                   $this->Labour_model->delProjectImages($id);
                   // edit project images
                   $this->postImages($id);
                   $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Project Updated' ,'data' =>'Project Updated']));
                return false;
                
                }else
                {
                   $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Project Updation Failed' ,'data' =>'Project Updation Failed']));
                    return false;
                   
                }
              
          }else
          {
             $result = $this->Labour_model->deleteLabourProjects($id);
             if($result)
             {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Project Deleted' ,'data' =>'Project Deleted']));
                return false; 
             }else
             {
                 $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed to Delete' ,'data' =>'Failed to Delete']));
                    return false;
             }
              
          }
      }
      
   
   
   

}
