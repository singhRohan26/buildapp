<?php

defined('BASEPATH') OR die('Not Allowed');

class Supplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Supplier_model']);
    }

    public function supplierDetails()
    {
        $this->output->set_content_type('application/json');
        $supplier_id = $this->input->post('supplier_id');
        $company_name = $this->input->post('company_name');
        $aoi = $this->input->post('aoi_desc');
        $aoi = explode(',',$aoi);
        $location = $this->input->post('location');
        $location = explode(',',$location);
        $link = $this->input->post('link');
        if(!empty($_FILES['image_url']['name'])){
            $file1=$this->doUploadFile('image_url');
        }else{
            $file1='';
        }
         $result = $this->Supplier_model->insertdetailsimg($supplier_id,$company_name,$file1,$link);
                    if($result)
                    {
                        foreach($location as $loc)
                        {
                            $location = $this->Supplier_model->profileLocation($loc,$supplier_id);
                        }
                        foreach($aoi as $a)
                        {
                            $this->Supplier_model->supplieraoi($a,$supplier_id);
                        }
                        
                        $img = $result['image'];
                        if(!empty($img))
                        {
                           $result['image']=base_url('uploads/supplier/'.$img); 
                        }
                        else
                        {
                            $result['image']='';
                        }
                        
                        $typeUpdate = $this->Supplier_model->typeUpdate($supplier_id);
                        
                        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Details Inserted Sucessfully' , 'data' => $result]));
                    }
                    else
                    {
                        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Insert' , 'data' => 'Failed to Insert']));
                    }
             
        
    }
    
    public function editProfile()
    {
        $this->output->set_content_type('application/json');
        $supplier_id = $this->input->post('supplier_id');
        $name = $this->input->post('name');
        $company_name = $this->input->post('company_name');
        $aoi = $this->input->post('aoi_desc');
        $aoi = explode(',',$aoi);
        $location = $this->input->post('location');
        $location = explode(',',$location);
        $link = $this->input->post('link');
        $media = $this->Supplier_model->getProfileImage($supplier_id);
        if(!empty($_FILES['image_url']['name'])){
            $file1=$this->doUploadFile('image_url');
        }else{
            $file1=$media['image'];
        }
        
        $this->Supplier_model->delLocations($supplier_id);
        
        $this->Supplier_model->delaoi($supplier_id);
        $result = $this->Supplier_model->editProfile($supplier_id,$company_name,$file1,$name,$link);
        if($result)
        {
                        foreach($location as $loc)
                        {
                            $location = $this->Supplier_model->profileLocation($loc,$supplier_id);
                        }
                        foreach($aoi as $a)
                        {
                            $this->Supplier_model->supplieraoi($a,$supplier_id);
                        }
                        
                        $img = $result['image'];
                        if(!empty($img))
                        {
                            $result['image']=base_url('uploads/supplier/'.$img); 
                        }else
                        {
                            $result['image']='';
                        }
                        
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Profile Updated' , 'data' => $result])); 
        }
        else
        {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'failed to Updated' , 'data' => 'failed to Updated'])); 
        }
        
        
    }
    
    public function doUploadFile($file)
    {
        $file1 = $_FILES['image_url']['name'];
        $config['upload_path'] = './uploads/supplier/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
       // $config['max_filename'] = '2555';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        return $upload_data['file_name'];
        
    }
    
    
    public function addPost()
    {
        $this->output->set_content_type('application/json');
        $name = $this->input->post('name');
        $supplier_id = $this->input->post('market_user_id');
        $category = $this->input->post('category');
        $location = $this->input->post('location_id');
        $status = $this->input->post('status');
        $type = $this->input->post('type');
        $perdayprice = $this->input->post('perdayprice');
        $permonthprice = $this->input->post('permonthprice');
        $from_hour = $this->input->post('from_hour');
        $to_hour = $this->input->post('to_hour');
        $desc = $this->input->post('description');
        $quantity = $this->input->post('quantity');
        $unit = $this->input->post('unit');
        $price = $this->input->post('price');
        if($category == 'equipment')
        {
            // equipment post
            if($type == 'rent')
            {
                $result = $this->Supplier_model->addpostrent($name,$supplier_id,$location,$status,$type,$perdayprice,$permonthprice,$from_hour,$to_hour,$desc);
                if($result)
                {   $id = $result;
                    $this->supplier_equip_images($id,$category);
                    $usertype = $this->Supplier_model->getusertype($supplier_id);
                    $type = $usertype['type'];
                    if($type == 'supplier')
                    {
                        //bidding in supplier//
                        $posts = $this->Supplier_model->getPosts($supplier_id,$usertype['type']);
                        $post_no = $posts['posts'];
                        $post_no = $post_no - 1;
                        $updatePost = $this->Supplier_model->supplierPostUpdate($supplier_id,$post_no,$usertype['type']);
                        //bidding in supplier//
                    }
                    if($type == 'sub_contractor')
                    { //bidding in sub_contractor//
                        $posts = $this->Supplier_model->getPosts($supplier_id,$usertype['type']);
                        $post_no = $posts['posts'];
                        $post_no = $post_no - 1;
                        $updatePost = $this->Supplier_model->supplierPostUpdate($supplier_id,$post_no,$usertype['type']);
                        //bidding in sub_contractor//
                    }
                   $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Submitted Sucessfully' , 'data' => $result])); 
                }
            }
            if($type == 'sell')
            {
                $result = $this->Supplier_model->addpostsell($name,$supplier_id,$location,$status,$type,$desc,$price);
                if($result)
                {
                    $id = $result;
                    $this->supplier_equip_images($id,$category);
                    $usertype = $this->Supplier_model->getusertype($supplier_id);
                     $type = $usertype['type'];
                    if($type == 'supplier')
                    {
                        //bidding in supplier//
                        $posts = $this->Supplier_model->getPosts($supplier_id,$usertype['type']);
                        $post_no = $posts['posts'];
                        $post_no = $post_no - 1;
                        $updatePost = $this->Supplier_model->supplierPostUpdate($supplier_id,$post_no,$usertype['type']);
                        //bidding in supplier//
                    }
                    if($type == 'sub_contractor')
                    { //bidding in sub_contractor//
                        $posts = $this->Supplier_model->getPosts($supplier_id,$usertype['type']);
                        $post_no = $posts['posts'];
                        $post_no = $post_no - 1;
                        $updatePost = $this->Supplier_model->supplierPostUpdate($supplier_id,$post_no,$usertype['type']);
                        //bidding in sub_contractor//
                    }
                    $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Submitted Sucessfully' , 'data' => $result])); 
                }
            }
        }
        else
        {
            //material post 
            $result = $this->Supplier_model->addpostmaterial($name,$supplier_id,$location,$status,$quantity,$unit,$price,$desc);
            if($result)
            {   $id = $result;
                $this->supplier_equip_images($id,$category);
                $usertype = $this->Supplier_model->getusertype($supplier_id);
                 $type = $usertype['type'];
                    if($type == 'supplier')
                    {
                        //bidding in supplier//
                        $posts = $this->Supplier_model->getPosts($supplier_id,$usertype['type']);
                        $post_no = $posts['posts'];
                        $post_no = $post_no - 1;
                        $updatePost = $this->Supplier_model->supplierPostUpdate($supplier_id,$post_no,$usertype['type']);
                        //bidding in supplier//
                    }
                    if($type == 'sub_contractor')
                    { //bidding in sub_contractor//
                        $posts = $this->Supplier_model->getPosts($supplier_id,$usertype['type']);
                        $post_no = $posts['posts'];
                        $post_no = $post_no - 1;
                        $updatePost = $this->Supplier_model->supplierPostUpdate($supplier_id,$post_no,$usertype['type']);
                        //bidding in sub_contractor//
                    }
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Submitted Sucessfully' , 'data' => $result]));
            }
        }
    }
    
    public function editPost()
    {
     $this->output->set_content_type('application/json');
     $id = $this->input->post('id');
     $name = $this->input->post('name');
        // $supplier_id = $this->input->post('market_user_id');
        $category = $this->input->post('category');
        $location = $this->input->post('location_id');
        // $location = explode(',',$location);
        $status = $this->input->post('status');
        $type = $this->input->post('type');
        $perdayprice = $this->input->post('perdayprice');
        $permonthprice = $this->input->post('permonthprice');
        $from_hour = $this->input->post('from_hour');
        $to_hour = $this->input->post('to_hour');
        $desc = $this->input->post('description');
        $quantity = $this->input->post('quantity');
        $unit = $this->input->post('unit');
        $price = $this->input->post('price');
        if($category == 'equipment')
        {
            // equipment post
            if($type == 'rent')
            {
                $result = $this->Supplier_model->updatepostrent($id,$name,$location,$status,$type,$perdayprice,$permonthprice,$from_hour,$to_hour,$desc);
                if($result)
                {
                    
                    $this->Supplier_model->delequipImages($id);
                    // $this->Supplier_model->typeUpdate($category,$supplier_id);
                    $this->supplier_equip_images($id,$category);
                    
                   $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Updated Sucessfully' , 'data' => 'Post Updated Sucessfully'])); 
                }
            }
            if($type == 'sell')
            {
                $result = $this->Supplier_model->updatepostsell($id,$name,$location,$status,$type,$desc,$price);
                if($result)
                {
                    // $id = $result;
                   $this->Supplier_model->delequipImages($id);
                    // $this->Supplier_model->typeUpdate($category,$supplier_id);
                    $this->supplier_equip_images($id,$category);
                    $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Updated Sucessfully' , 'data' => 'Post Updated Sucessfully'])); 
                }
            }
        }
        else
        {
            //material post 
            $result = $this->Supplier_model->updatepostmaterial($id,$name,$location,$status,$quantity,$unit,$price,$desc);
            if($result)
            {
                // $id = $result;
                $this->Supplier_model->delmaterialImages($id);
                // $this->Supplier_model->typeUpdate($category,$supplier_id);
                $this->supplier_equip_images($id,$category);
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Updated Sucessfully' , 'data' => 'Post Updated Sucessfully']));
            }
        }
        
    }
    
    public function supplier_equip_images($id,$category)
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
                $this->Supplier_model->supplier_equip_images($data['file_name'],$id,$category);
            }
            }else if($key == 'media_url'){
                
            for ($s = 0; $s < $count_media; $s++) {
                $_FILES['media_url']['name'] = $value['name'][$s];
                $_FILES['media_url']['type'] = $value['type'][$s];
                $_FILES['media_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['media_url']['error'] = $value['error'][$s];
                $_FILES['media_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('media_url');
                $data = $this->upload->data();
                // echo $data['file_name'];die;
                $this->Supplier_model->supplier_equip_images($data['file_name'],$id,$category);
            }
            }
        }
        //Multiple Images 
    }
    
    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/supplierPost/';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|excel';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);
        return $config;
    }
    
    public function getProfileData()
    {
        $this->output->set_content_type('application/json');
        $supplier_id = $this->input->post('supplier_id');
        $result = $this->Supplier_model->getProfileData($supplier_id);
        if($result)
        {
            $location = $this->Supplier_model->getProfileLocation($supplier_id);
            $i=0;
            
            foreach($location as $loc)
            {  
                $result['locations'][$i]['location'] = $loc['location'];
                $result['locations'][$i]['location_id'] = $loc['location_id'];
                $i++;
            }
            
            $aoi = $this->Supplier_model->getProfileaoi($supplier_id);
            $i=0;
            
            foreach($aoi as $a)
            {  
                $result['aoi'][$i]['aoi_desc'] = $a['aoi_desc'];
                $result['aoi'][$i]['aoi_desc_id'] = $a['aoi_desc_id'];
                $i++;
            }
            
            $img = $result['image'];
            if(!empty($img))
            {
              $result['image']=base_url('uploads/supplier/'.$result['image']);  
            }
            else
            {
                $result['image']='';
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $result]));
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not Found' , 'data' => 'data not Found']));
        }
    }
    
    public function changePass()
    {
        $this->output->set_content_type('application/json');
        $supplier_id = $this->input->post('supplier_id');
        $old_pass = $this->input->post('old_pass');
        $new_pass  = $this->input->post('new_pass');
        $c_pass  = $this->input->post('c_pass');
        $checkold = $this->Supplier_model->checkold($old_pass,$supplier_id);
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
                  
                  $result = $this->Supplier_model->changePass($supplier_id,$old_pass,$new_pass);
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
                    $this->output->set_output(json_encode(['result' => 0, 'msg' =>'Old password does not match current password' , 'data' => 'Old password does not match current password']));
                }
            }
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Old Password Not Found' , 'data' => 'Old Password Not Found']));
        }
        
    }
    
    public function messageSection()
    {
        $this->output->set_content_type('application/json');
        $supplier_id = $this->input->post('supplier_id');
        $type = $this->input->post('type');
        if($type == 'recieved')
        {           $result['user_material'] = $this->Supplier_model->user_material_request($supplier_id);
                    $result['user_equipment'] = $this->Supplier_model->user_equipment_request($supplier_id);
                    $result['equip_req'] = $this->Supplier_model->marketplaceEquipReq($supplier_id);
                    $result['material_req'] = $this->Supplier_model->marketplaceMatReq($supplier_id);
                    
                    // print_r($result['equip_req']);die;
                    $i=0;
                    foreach($result['user_material'] as $res)
                    { 
                        $img = $res['image'];
                        // print_r($img);die;
                        if(!empty($img))
                        {
                            $result['user_material'][$i]['image']=base_url('uploads/tenderuser/'.$res['image']);
                        }else
                        {
                            $result['user_material'][$i]['image']= '';
                        }
                        
                        $result['user_material'][$i]['type']= 'tender';
                        $result['user_material'][$i]['sub_type']= 'material';
                        // $result['user_material'][$i]['type']= 'tender';
                        $i++;
                    }
                    
                    $i=0;
                    foreach($result['user_equipment'] as $equipment)
                    {
                        // print_r($equipment);die;
                        $img = $equipment['image'];
                        if(!empty($img))
                        {
                            $result['user_equipment'][$i]['image']=base_url('uploads/tenderuser/'.$img);
                        }
                        else
                        {
                            $result['user_equipment'][$i]['image']= '';
                        }
                        $result['user_equipment'][$i]['type']= 'tender';
                        $result['user_equipment'][$i]['sub_type']= $equipment['type'];
                        $i++;
                    }
                    
                    $i=0;
                       foreach($result['material_req'] as $material)
                       {
                        //   print_r($material);die;
                          $type = $material['type'];
                         $user_id = $material['material_id'];
                        if($type == 'sub_contractor')
                        {
                            $img = $this->Supplier_model->getsubcontractorImage($user_id);
                            
                            if(!empty($img['image']))
                            {
                               $result['material_req'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$img['image']); 
                            }else{
                                $result['material_req'][$i]['image'] = '';
                            }
                        }
                        if($type == 'contractor')
                        {
                            $img = $this->Supplier_model->getcontractorImage($user_id);
                            
                            if(!empty($img['image']))
                            {
                               $result['material_req'][$i]['image'] = base_url('uploads/contractorDetails/'.$img['image']); 
                            }else{
                                $result['material_req'][$i]['image'] = '';
                            }
                        }
                           $result['material_req'][$i]['sub_type'] = 'material';
                           $i++;
                       }
                       
                       $i=0;
                       foreach($result['equip_req'] as $equipment)
                       {
                        
                        $type = $equipment['type'];
                        $user_id = $equipment['market_user_id'];
                        if($type == 'sub_contractor')
                        {
                            $img = $this->Supplier_model->getsubcontractorImage($user_id);
                            
                            if(!empty($img['image']))
                            {
                               $result['equip_req'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$img['image']); 
                            }else{
                                $result['equip_req'][$i]['image'] = '';
                            }
                        }
                        if($type == 'contractor')
                        {
                            $img = $this->Supplier_model->getcontractorImage($user_id);
                            
                            if(!empty($img['image']))
                            {
                               $result['equip_req'][$i]['image'] = base_url('uploads/contractorDetails/'.$img['image']); 
                            }else{
                                $result['equip_req'][$i]['image'] = '';
                            }
                        }
                           $i++;
                       }
                    
                    $final = array_merge($result['user_material'],$result['user_equipment'],$result['equip_req'],$result['material_req']);
                    if($result)
                    {
                        
                        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $final]));
                    }
                    else
                    {
                        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
                    }
        }
        
        if($type == 'chat')
        {
            $result['marketplace_equip_chat'] = $this->Supplier_model->marketplace_equip_chat($supplier_id);
            // print_r($result['marketplace_equip_chat']);die;
            $result['marketplace_mat_chat'] = $this->Supplier_model->marketplace_mat_chat($supplier_id);
            $result['tender_equip_chat'] = $this->Supplier_model->tender_equip_chat($supplier_id);
            $result['tender_mat_chat'] = $this->Supplier_model->tender_mat_chat($supplier_id);
            // print_r($result['tender_equip_chat']);die;
            $i=0;
            foreach($result['marketplace_equip_chat'] as $equip_chat)
            {
                $result['marketplace_equip_chat'][$i]['image'] = '';
                $i++;
            }
            $i=0;
            foreach($result['marketplace_mat_chat'] as $mat_chat)
            {
                $result['marketplace_mat_chat'][$i]['image'] = '';
                $i++;
            }
            $i=0;
            foreach($result['tender_equip_chat'] as $tender_chat)
            {
                $img = $tender_chat['image'];
                if(!empty($img))
                {
                    $result['tender_equip_chat'][$i]['image']=base_url('uploads/tenderuser/'.$tender_chat['image']); 
                }else{
                    $result['tender_equip_chat'][$i]['image']= '';
                }
               
               $result['tender_equip_chat'][$i]['type']= 'tender';
               $i++;
            }
            
             $i=0;
            foreach($result['tender_mat_chat'] as $tender_mat_chat)
            {
                $img = $tender_mat_chat['image'];
                if(!empty($img))
                {
                   $result['tender_mat_chat'][$i]['image']=base_url('uploads/tenderuser/'.$tender_mat_chat['image']);
                }else{
                    $result['tender_mat_chat'][$i]['image']= '';
                }
                
               $result['tender_mat_chat'][$i]['type']= 'tender';
               $i++;
            }
            $final = array_merge($result['marketplace_equip_chat'],$result['marketplace_mat_chat'],$result['tender_equip_chat'],$result['tender_mat_chat']);
            if($result)
            {
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $final]));
              
            }else
            {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found'])); 
            }
        }
    }
    
    public function messageSectionDetails()
    {
      $this->output->set_content_type('application/json');
      $id = $this->input->post('id');
      $type = $this->input->post('type');
      $sub_type = $this->input->post('sub_type');
      if($type == 'contractor' || $type == 'sub_contractor')
      {
          if($sub_type == 'rent' || $sub_type == 'sell')
          {
              $result = $this->Supplier_model->marketplaceEquipReqDetails($id);
              if($result)
              {
                  $result['image'] = '';
                  $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $result]));
              }
              else
              {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
              }
              
          }else
          {
              $result = $this->Supplier_model->marketplaceMatReqDetails($id);
              if($result)
              {
                  $result['image'] = '';
                  $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $result]));
              }
              else
              {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
              }
          }
      }
      else
      {
          if($sub_type == 'rent' || $sub_type == 'buy' || $sub_type == 'sell')
          {
              $result = $this->Supplier_model->user_equipment_requestDetails($id);
              if($result)
              {
                  $img = $result['image'];
                  if(!empty($img))
                  {
                      $result['image']=base_url('uploads/tenderuser/'.$img);
                  }
                  else
                  {
                      $result['image']='';
                  }
                  
                  $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $result]));
              }
              else
              {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
              }
          }
          else
          {
            //   echo 'hi';die;
              $result = $this->Supplier_model->user_material_requestDetails($id);
              if($result)
              {
                  $img = $result['image'];
                  if(!empty($img))
                  {
                      $result['image']=base_url('uploads/tenderuser/'.$img);
                  }
                  else
                  {
                      $result['image']='';
                  }
                  
                  $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $result]));
              }
              else
              {
                 $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found'])); 
              }
          }
      }
    }
    
   
    public function supplierHomescreen()
    {
        $this->output->set_content_type('application/json');
        $supplier_id = $this->input->post('supplier_id');
        $result['equipment'] = $this->Supplier_model->supplierHomescreen($supplier_id);
        $result['material'] = $this->Supplier_model->suppliermaterialHomescreen($supplier_id);
        if($result)
        {  
            $i=0;
            foreach($result['equipment'] as $res)
            {
                $id = $res['supplier_equip_id'];
                $img = $this->Supplier_model->supplierHomescreenImg($id);
                if(!empty($img))
                {
                    $result['equipment'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                }
                else
                {
                    $result['equipment'][$i]['image']='';
                }
                $i++;
            }
            $i=0;
            foreach($result['material'] as $res)
            {
               $id = $res['supplier_mat_id'];
               $result['material'][$i]['type'] = 'material';
               $img = $this->Supplier_model->supplierHomescreenmatImg($id);
                if(!empty($img))
                {
                    $result['material'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                }
                else
                {
                    $result['material'][$i]['image']='';
                }
                $i++;
            }
            
            $posts = $this->Supplier_model->getPost($supplier_id);
            $post_no = $posts['posts'];
            $final = array_merge($result['equipment'],$result['material']);
            $days = $this->Supplier_model->getpaymentdate($supplier_id);
            // if(empty($days))
            // {
            //     $day = 1;
            // }
            // else{
                $date = strtotime($days['date']);
                $nextdate = strtotime(date('Y-m-d', strtotime($days['date']. ' + 30 days')));
                $now = strtotime(date('yy-m-d'));
                $datediff = $nextdate - $now;
                $day = round($datediff / (60 * 60 * 24));
                if($day == '0')
                {
                    $updateplan = $this->Supplier_model->updateplan($supplier_id);
                }
            // }
             $plan_type = $this->Supplier_model->getPlanType($supplier_id);
            $this->output->set_output(json_encode(['plan_type'=>$plan_type['plan_type'],'posts' => $post_no ,'result' => 1, 'msg' =>'data loaded' , 'data' => $final]));
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
        }
    }
    
    public function searching()
    {
        $this->output->set_content_type('application/json');
        $supplier_id = $this->input->post('supplier_id');
        $field = $this->input->post('field');
        $result['equipment'] = $this->Supplier_model->equipSearch($supplier_id,$field);
        $result['material'] = $this->Supplier_model->materialSearch($supplier_id,$field);
        if($result)
        {  
            $i=0;
            foreach($result['equipment'] as $res)
            {
                $id = $res['supplier_equip_id'];
                $img = $this->Supplier_model->supplierHomescreenImg($id);
                if(!empty($img))
                {
                    $result['equipment'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                }
                else
                {
                    $result['equipment'][$i]['image']='';
                }
                $i++;
            }
            $i=0;
            foreach($result['material'] as $res)
            {
               $id = $res['supplier_mat_id']; 
               $img = $this->Supplier_model->supplierHomescreenmatImg($id);
                if(!empty($img))
                {
                    $result['material'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                }
                else
                {
                    $result['material'][$i]['image']='';
                }
                $i++;
            }
            $final = array_merge($result['equipment'],$result['material']);
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $final]));
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
        }
    }
    
    public function supplierHomescreenDetails()
    {
         $this->output->set_content_type('application/json');
         $id = $this->input->post('id');
         $type = $this->input->post('type');
         if($type == 'equipment')
         {
           $result = $this->Supplier_model->supplierHomescreenDetails($id);
             if($result)
             {
                $equip_id= $result['supplier_equip_id'];
                
                $img = $this->Supplier_model->supplierHomescreenequipDetailsImg($equip_id);
                // print_r($img);die;
                $i=0;
                foreach($img as $im)
                {
                    
                   $result['images'][$i]=base_url('uploads/supplierPost/'.$im['images']); 
                   $i++;
                }
                
                
                 
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $result])); 
             }
             else
             {
                 $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
             }
             }
    
    else
    {
        
        $result = $this->Supplier_model->supplierHomescreenmaterialDetails($id);
             if($result)
             {
                $material_id= $result['supplier_mat_id'];
                $result['type'] = 'material';
                $img = $this->Supplier_model->supplierHomescreenmatDetailsImg($material_id);
                // print_r($img);die;
                $i=0;
                foreach($img as $im)
                {
                    
                   $result['images'][$i]=base_url('uploads/supplierPost/'.$im['images']); 
                   $i++;
                }
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $result])); 
             }
             else
             {
                 $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
             }   
    }
    }
    
    public function deletePosts()
    {
      $this->output->set_content_type('application/json');
      $type = $this->input->post('type');  
      $id = $this->input->post('id');
      if($type == 'equipment')
      {
          $result = $this->Supplier_model->deleteequipPosts($id);
          if($result)
          {
             $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Deleted' , 'data' => 'Post Deleted']));
          }else
          {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Deletion Failed' , 'data' => 'Deletion Failed']));   
          }  
      }
      else
      {
          $result = $this->Supplier_model->delmatPosts($id);
          if($result)
          {
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Deleted' , 'data' => 'Post Deleted']));
          }else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Deletion Failed' , 'data' => 'Deletion Failed']));
          }
      }
    }
    
    public function response()
    {
      $this->output->set_content_type('application/json');
      $id = $this->input->post('id');
      $type = $this->input->post('type');
      $response = $this->input->post('response');
      $sub_type = $this->input->post('sub_type');
      if($type == 'contractor' || $type == 'sub_contractor')
      {
        if($response == 'accept')
          {
              //accept
              $result = $this->Supplier_model->marketplaceacceptResponse($id,$sub_type);
              if($result)
              {
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Accepted' , 'data' => 'Accepted']));  
              }else{
                  
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to accept' , 'data' => 'Failed to accept'])); 
              }
          }
      else
      {
          //reject
          $result = $this->Supplier_model->marketplacedeclineResponse($id,$sub_type);
          if($result)
          {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Declined' , 'data' => 'Declined']));  
          }else{
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Decline Failed' , 'data' => 'Decline Failed'])); 
          }
      }  
          
      }
      if($type == 'tender')
      {
        if($response == 'accept')
      {
          //accept
          $result = $this->Supplier_model->tenderacceptResponse($id,$sub_type);
          if($result)
          {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Accepted' , 'data' => 'Accepted']));  
          }else{
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to accept' , 'data' => 'Failed to accept'])); 
          }
      }
      else
      {
          //reject
          $result = $this->Supplier_model->tenderdeclineResponse($id,$sub_type);
          if($result)
          {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Declined' , 'data' => 'Declined']));  
          }else{
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Decline Failed' , 'data' => 'Decline Failed'])); 
          }
          
      }
      }
    }

}