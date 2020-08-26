<?php

defined('BASEPATH') OR die('Not Allowed');

class Subcontractor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Subcontractor_model']);
    }

    
    public function subcontractorDetails()
    {
        $this->output->set_content_type('application/json');
        $sub_cont_id = $this->input->post('sub_cont_id');
        $company_name = $this->input->post('company_name');
        $cost_range = $this->input->post('cost_range');
        $monetary = $this->input->post('monetary');
        $location = $this->input->post('location');
        $location = explode(',',$location);
        $qualification = $this->input->post('qualification');
        $qualification = explode(',',$qualification);
        $link = $this->input->post('link');
        if(!empty($_FILES['file1']['name'])){
            $file1=$this->doUploadFile('file1');
        }else{
            $file1='';
        }
        {
            $file2 = $this->doUploadFile('file2');
        }
        if(!empty($_FILES['file3']['name']))
        {
            $file3 = $this->doUploadFile('file3');
        }
        
        $result = $this->Subcontractor_model->subcontractorDetails($sub_cont_id,$company_name,$cost_range,$monetary,$file1,$file2,$file3,$link);
        if($result)
        {
            // print_r($result);die;
            $details_id = $result['id'];
           foreach($location as $loc)
           {
               $location = $this->Subcontractor_model->sub_cont_location($loc,$sub_cont_id);
           }
           foreach($qualification as $qualify)
           {
               $qualify = $this->Subcontractor_model->sub_cont_qualification($qualify,$sub_cont_id);
           }
           
            //multiple image upload function call
            $this->multiple($details_id);
            //multiple image upload function call
            
            //type updation
             //$typeupdate = $this->Subcontractor_model->typeUpdation($sub_cont_id);
           //type updation
           
           $img = $result['image'];
           if(!empty($img))
           {
               $result['image'] = base_url('uploads/subcontractorDetails/'.$img);
           }
           else
           {
               $result['image'] = '';
           }
            
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Details Inserted Sucessfully' ,'data' => $result]));
            return false;
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Details Insertion Failed' ,'data' => 'Details Insertion Failed']));
            return false;
        }
        
        
    }
    
    public function editProfile()
    {
       $this->output->set_content_type('application/json');
       $name = $this->input->post('name');
       $sub_cont_id = $this->input->post('sub_cont_id');
       $company_name = $this->input->post('company_name');
        $cost_range = $this->input->post('cost_range');
        $monetary = $this->input->post('monetary');
        $location = $this->input->post('location');
        $location = explode(',',$location);
        $qualification = $this->input->post('qualification');
        $qualification = explode(',',$qualification);
        $link = $this->input->post('link');
        if(!empty($_FILES['file1']['name'])){
            $file1=$this->doUploadFile('file1');
        }if(empty($_FILES['file1']['name'])){
            $file1='';
        }
       
        if(!empty($_FILES['file2']['name']))
        {
            $file2 = $this->doUploadFile('file2');
        }
        if(empty($_FILES['file2']['name']))
        {
            $file2='';
        }
        if(!empty($_FILES['file3']['name']))
        {
            $file3 = $this->doUploadFile('file3');
        }
        if(empty($_FILES['file3']['name']))
        {
            $file3='';
        }
        $this->Subcontractor_model->delQualification($sub_cont_id);
        $this->Subcontractor_model->delLocation($sub_cont_id);
        //  print_r($file1);die;
        $result = $this->Subcontractor_model->editProfile($sub_cont_id,$company_name,$cost_range,$monetary,$file1,$file2,$file3,$link,$name);
        if($result)
        {
            $id = $result['sub_cont_details_id'];
            
            foreach($location as $loc)
           {
               $location = $this->Subcontractor_model->sub_cont_location($loc,$sub_cont_id);
           }
           foreach($qualification as $qualify)
           {
               $qualify = $this->Subcontractor_model->sub_cont_qualification($qualify,$sub_cont_id);
           }
           
           $img = $result['image'];
           if(!empty($img))
           {
               $result['image'] = base_url('uploads/subcontractorDetails/'.$img);
           }
           else
           {
               $result['image'] = '';
           }
        //   print_r($id);die;
           $this->Subcontractor_model->delprofileImages($id);
           
            //multiple image upload function call
            $this->multiple($id);
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
    
    public function doUploadFile($file)
    {
        $file1 = $_FILES[$file]['name'];
        $config['upload_path'] = './uploads/subcontractorDetails/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
       // $config['max_filename'] = '2555';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        return $upload_data['file_name'];
        
    }
    
    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/subcontractorDetails/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);

        return $config;
    }
    
    public function multiple($details_id)
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
                $this->Subcontractor_model->detailsImages($data['file_name'],$details_id);
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
                $this->Subcontractor_model->detailsImages($data['file_name'],$details_id);
            }
            }
        }
        
        //Multiple Images 
        
        
    }
    
    public function sub_cont_labour_contact()
   {
     $this->output->set_content_type('application/json');
     $sub_cont_id = $this->input->post('sub_cont_id');
     $labour_id = $this->input->post('labour_id');
     $title = $this->input->post('title');
     $location = $this->input->post('location');
     $startdate = $this->input->post('startdate');
     $enddate = $this->input->post('enddate');
     $desc = $this->input->post('desc');
    //  $title = $this->input->post('title');
       
       $result = $this->Subcontractor_model->sub_cont_labour_contact($sub_cont_id,$labour_id,$title,$location,$startdate,$enddate,$desc);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Request sent Sucessully' ,'data' => $result]));
            return false;
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed to send Request' ,'data' => 'Failed to send Request']));
            return false;
       }
   }
   
   public function getProfileData()
   {
       $this->output->set_content_type('application/json');
       $sub_cont_id = $this->input->post('sub_cont_id');
       $result = $this->Subcontractor_model->getProfileData($sub_cont_id);
       if($result)
       {
           $id = $result['sub_cont_details_id'];
           
           $qualification = $this->Subcontractor_model->getProfilequalification($sub_cont_id);
           $i=1;
            
            foreach($qualification as $quali)
            {  
                $result['qualifications'.$i] = $quali['qualification'];
                $i++;
            }
            
            $location = $this->Subcontractor_model->getProfileLocation($sub_cont_id);
            $i=0;
            
            foreach($location as $loc)
            {  
                $result['locations'][$i]['location'] = $loc['location'];
                $result['locations'][$i]['location_id'] = $loc['location_id'];
                $i++;
            }
            $img = $result['image'];
            $statutory = $result['statutory'];
            $security = $result['security'];
            if(!empty($img))
            {
                $result['image']=base_url('uploads/subcontractorDetails/'.$img);
                
            }else
            {
                $result['image']='';
            }
            
            if(!empty($statutory))
            {
                $result['statutory']=base_url('uploads/subcontractorDetails/'.$statutory);
                
            }else
            {
                $result['statutory']='';
            }
            
            if(!empty($security))
            {
                $result['security']=base_url('uploads/subcontractorDetails/'.$security);
                
            }else
            {
                $result['security']='';
            }
           
           $project = $this->Subcontractor_model->getProjectDetails($sub_cont_id);
            // print_r($project);die;
            $i=0;
            foreach($project as $pro)
            {
                $project_id = $pro['project_id'];
                $img = $this->Subcontractor_model->getprojectimages($project_id);
                // print_r($img);die;
                if(!empty($img))
                {
                    $result['project'][$i]['image'] = base_url('uploads/contractorProject/'.$img['images']);
                    // $result['project'][$i]['images'] = base_url('uploads/contractorProject/'.$img['images']);
                }
              $result['project'][$i]['name'] = $pro['name'];
              $result['project'][$i]['location_id'] = $pro['location_id'];
              $result['project'][$i]['project_id'] = $pro['project_id'];
              $result['project'][$i]['location'] = $pro['location'];
                
                $i++;
            }
           
            
           
           
           $this->output->set_output(json_encode(['result' => 1, 'msg' => 'data loaded' ,'data' => $result]));
            return false;
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' => 'data not found' ,'data' => 'data not found']));
            return false;
           
       }
   }
   
   public function changePass()
   {
       $this->output->set_content_type('application/json');
        $sub_cont_id = $this->input->post('sub_cont_id');
        $old_pass = $this->input->post('old_pass');
        $new_pass  = $this->input->post('new_pass');
        $c_pass  = $this->input->post('c_pass');
        $checkold = $this->Subcontractor_model->checkold($old_pass,$sub_cont_id);
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
                  
                  $result = $this->Subcontractor_model->changePass($sub_cont_id,$old_pass,$new_pass);
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
   
   
   
   public function messageSection()
   {
       $this->output->set_content_type('application/json');
       $sub_cont_id = $this->input->post('sub_cont_id');
       $type = $this->input->post('type');
       if($type == 'recieved')
       { 
           $result['con_sc_cont'] = $this->Subcontractor_model->recievedMessageSection($sub_cont_id);
           $result['contractor_equip_contact'] = $this->Subcontractor_model->contractor_equip_contact($sub_cont_id);
           $result['contractor_mat_contact'] = $this->Subcontractor_model->contractor_mat_contact($sub_cont_id);
        //   print_r($result['contractor_mat_contact']);die;
           if($result)
           {
              $i=0;
              foreach($result['con_sc_cont'] as $res)
              {
                  $img = $res['image'];
                  if(!empty($img))
                  {
                      $result['con_sc_cont'][$i]['image']=base_url('uploads/contractorDetails/'.$img);
                  }
                  else
                  {
                      $result['con_sc_cont'][$i]['image']= '';
                  }
                  $i++;
              }
              $i=0;
              foreach($result['contractor_equip_contact'] as $res)
              {
                  $img = $res['image'];
                  if(!empty($img))
                  {
                      $result['contractor_equip_contact'][$i]['image']=base_url('uploads/contractorDetails/'.$img);
                  }
                  else
                  {
                      $result['contractor_equip_contact'][$i]['image']= '';
                  }
                  $i++;
              }
              $i=0;
              foreach($result['contractor_mat_contact'] as $res)
              {
                  $img = $res['image'];
                  if(!empty($img))
                  {
                      $result['contractor_mat_contact'][$i]['image']=base_url('uploads/contractorDetails/'.$img);
                  }
                  else
                  {
                      $result['contractor_mat_contact'][$i]['image']= '';
                  }
                  $i++;
              }
              
              $array_merge = array_merge($result['con_sc_cont'],$result['contractor_equip_contact'],$result['contractor_mat_contact']);
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $array_merge]));
           }
           else
           {
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not found' , 'data' => 'Data not found']));
           }
           
       }
       if($type == 'chat')
       {
           $result['contractor_chat'] = $this->Subcontractor_model->chatList($sub_cont_id);
           $result['labour_chat'] = $this->Subcontractor_model->labourChat($sub_cont_id);
           $result['supplier_equip'] = $this->Subcontractor_model->supplier_equip_chat($sub_cont_id);
           $result['supplier_mat'] = $this->Subcontractor_model->supplier_mat($sub_cont_id);
           if($result)
           {
               $i=0;
              foreach($result['contractor_chat'] as $res)
              {
                  $img = $res['image'];
                  if(!empty($img))
                  {
                      $result['contractor_chat'][$i]['image']=base_url('uploads/contractorDetails/'.$img);
                  }
                  else
                  {
                      $result['contractor_chat'][$i]['image']= '';
                  }
                  $i++;
              }
              $i=0;
              foreach($result['labour_chat'] as $labour)
              {
                  $img = $labour['image'];
                  if(!empty($img))
                  {
                      $result['labour_chat'][$i]['image']=base_url('uploads/labour/'.$img);
                  }
                  else
                  {
                      $result['labour_chat'][$i]['image']= '';
                  }
                  $i++;
              }
               $i=0;
              foreach($result['supplier_equip'] as $supplier_equip)
              {
                  $img = $supplier_equip['image'];
                  if(!empty($img))
                  {
                      $result['supplier_equip'][$i]['image']=base_url('uploads/supplier/'.$img);
                  }
                  else
                  {
                      $result['supplier_equip'][$i]['image']= '';
                  }
                  
                  $i++;
              }
              
              $i=0;
              foreach($result['supplier_mat'] as $supplier_mat)
              {
                  $img = $supplier_mat['image'];
                  if(!empty($img))
                  {
                      $result['supplier_mat'][$i]['image']=base_url('uploads/supplier/'.$img);
                  }
                  else
                  {
                      $result['supplier_mat'][$i]['image']= '';
                  }
                  
                  $i++;
              }
              
              $final = array_merge($result['contractor_chat'],$result['labour_chat'],$result['supplier_equip'],$result['supplier_mat']);
              $tempArr = array_unique(array_column($final, 'market_user_id'));
           $arr = array_intersect_key($final, $tempArr);
             $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));  
           }
           else
           {
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not found' , 'data' => 'Data not found'])); 
           }
           
       }
       
       if($type == 'post')
       {
           
        $result['equipment'] = $this->Subcontractor_model->supplierHomescreen($sub_cont_id);
        $result['material'] = $this->Subcontractor_model->suppliermaterialHomescreen($sub_cont_id);
        if($result)
        {  
            $i=0;
            foreach($result['equipment'] as $res)
            {
                $id = $res['supplier_equip_id'];
                $img = $this->Subcontractor_model->supplierHomescreenImg($id);
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
               $img = $this->Subcontractor_model->supplierHomescreenmatImg($id);
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
       if($type == 'sent')
       {
          $result['labour'] = $this->Subcontractor_model->laboursentRequest($sub_cont_id);
          $result['material'] = $this->Subcontractor_model->materialsentRequest($sub_cont_id);
          
          $result['equipment'] = $this->Subcontractor_model->equipmentsentRequest($sub_cont_id);
        // print_r($result['equipment']);die;
           $i=0;
           foreach($result['labour'] as $labour)
           {
               if(!empty($labour['image']))
               {
                 $result['labour'][$i]['image']=base_url('uploads/labour/'.$labour['image']);  
               }else
               {
                $result['labour'][$i]['image']='';   
               }
               $i++;
           }
           
           $i=0;
           foreach($result['material'] as $material)
           {
               $result['material'][$i]['image'] = '';
               $result['material'][$i]['type'] = 'supplier_material';
               $i++;
           }
           
           $i=0;
           foreach($result['equipment'] as $equipment)
           {
               $result['equipment'][$i]['image'] = '';
               $result['equipment'][$i]['type'] = 'supplier_equipment';
               $i++;
           }
           $final = array_merge($result['labour'],$result['material'],$result['equipment']);
           if($result)
           {
             $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data loaded' , 'data' => $final]));  
           }
           else
           {
             $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));  
           }
           
           
       }
   }
   
   public function messageSectionDetails()
   {
       $this->output->set_content_type('application/json');
       $type = $this->input->post('type');
       $id = $this->input->post('id');
       if($type == 'recieved')
       {
           $result = $this->Subcontractor_model->messageSectionDetails($id);
           if($result)
           {
               $img = $result['image'];
               if(!empty($img))
               {
                   $result['image']=base_url('uploads/contractorDetails/'.$img);
               }
               else
               {
                   $result['image']= '';
               }
               
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
           }
           else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found']));
           }
           
       }
       if($type == 'sent')
       {
           $user_type = $this->input->post('user_type');
           if($user_type == 'supplier_equipment')
           {
               $result = $this->Subcontractor_model->equipmentRequestDetails($id);
            //   print_r($result);die;
               if($result)
               {
                   $result['image'] ='';
                   $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
               }else
               {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found'])); 
               }
               
           }
           elseif($user_type == 'supplier_material')
           {
               $result = $this->Subcontractor_model->materialRequestDetails($id);
               if($result)
               {
                   $result['image']='';
                   $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
               }else
               {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found'])); 
               }
               
           }
           else
           {
               $result = $this->Subcontractor_model->labourRequestDetails($id);
               if($result)
               {
                   $result['image']='';
                   $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
               }else
               {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found'])); 
               }
               
               
           }
           
       }
       
   }
   
   public function marketusersDetails()
   {
       $this->output->set_content_type('application/json');
       $market_user_id = $this->input->post('market_user_id');
       $type = $this->input->post('type');
       if($type == 'contractor' || $type == 'labour')
       {
       $result = $this->Subcontractor_model->marketusersDetails($market_user_id,$type);
    //   print_r($result);die;
       if($result)
       {
           
           if($type == 'contractor'){
                   
                   $uploads = 'contractorDetails';
               }
              else if($type == 'sub_contractor')
              {
                  $uploads = 'subcontractorDetails';
              }
               else if($type == 'labour')
               {
                   $review_tender = $this->Subcontractor_model->LabourReview($market_user_id);
                //   print_r($review_tender);die;
                $i=0;
                  foreach($review_tender as $review)
                  {
                      $type = $review['sender_type'];
                      $user_id= $review['sender_id'];
                    
                      if($type == 'tender')
                      {
                        $tender = $this->Subcontractor_model->getTenderdetails($user_id);
                        // print_r($tender);die;
                          if(!empty($tender['image']))
                          {
                              $result['reviews'][$i]['image'] = base_url('uploads/tenderuser/'.$tender['image']);
                              $result['reviews'][$i]['name'] = $tender['name'];
                              $result['reviews'][$i]['date'] = '';
                              $result['reviews'][$i]['review'] = $review['msg'];
                              $result['reviews'][$i]['rating'] = $review['rating'];
                          }else{
                            $result['reviews'][$i]['image'] = ''; 
                            $result['reviews'][$i]['name'] = $tender['name'];
                            $result['reviews'][$i]['date'] = '';
                            $result['reviews'][$i]['review'] = $review['msg'];
                              $result['reviews'][$i]['rating'] = $review['rating'];
                          }
                      }
                      if($type =='contractor')
                      {
                          $contractor = $this->Subcontractor_model->getContractordetails($user_id);
                          if(!empty($contractor['image']))
                          {
                              $result['reviews'][$i]['image'] = base_url('uploads/tenderuser/'.$contractor['image']);
                              $result['reviews'][$i]['name'] = $contractor['name'];
                              $result['reviews'][$i]['date'] = '';
                              $result['reviews'][$i]['review'] = $review['msg'];
                              $result['reviews'][$i]['rating'] = $review['rating'];
                          }else{
                            $result['reviews'][$i]['image'] = ''; 
                            $result['reviews'][$i]['name'] = $contractor['name'];
                            $result['reviews'][$i]['date'] = '';
                            $result['reviews'][$i]['review'] = $review['msg'];
                              $result['reviews'][$i]['rating'] = $review['rating'];
                          }
                      }
                      if($type == 'sub_contractor')
                      {
                        $sub_contractor = $this->Subcontractor_model->getsubcontDetails($user_id);
                        if(!empty($sub_contractor['image']))
                          {
                              $result['reviews'][$i]['image'] = base_url('uploads/tenderuser/'.$sub_contractor['image']);
                              $result['reviews'][$i]['name'] = $sub_contractor['name'];
                              $result['reviews'][$i]['date'] = '';
                              $result['reviews'][$i]['review'] = $review['msg'];
                              $result['reviews'][$i]['rating'] = $review['rating'];
                          }else{
                            $result['reviews'][$i]['image'] = ''; 
                            $result['reviews'][$i]['name'] = $sub_contractor['name'];
                            $result['reviews'][$i]['date'] = '';
                            $result['reviews'][$i]['review'] = $review['msg'];
                              $result['reviews'][$i]['rating'] = $review['rating'];
                          }
                      }
                      $i++;
                      
                  }
                  
                  $project = $this->Subcontractor_model->getLabourProjectDetails($market_user_id);
                
                  $i=0;
                  foreach($project as $pro)
                  {
                      $project_id = $pro['labour_post_id'];
                      $img = $this->Subcontractor_model->getlabourprojectimage($project_id);
                      if(!empty($img))
                        {
                            $result['project'][$i]['image'] = base_url('uploads/labour/'.$img['images']);
                         }
                         $images = $this->Subcontractor_model->getallLabourprojectImages($project_id);
                          $result['project'][$i]['name'] = $pro['title'];
                          $result['project'][$i]['location_id'] = $pro['location_id'];
                          $result['project'][$i]['project_id'] = $pro['labour_post_id'];
                          $result['project'][$i]['location'] = $pro['location'];
                          $j=0;
                         foreach($images as $image)
                          {
                              $image = $image['images'];
                              if(!empty($image))
                              {
                                $result['project'][$i]['project_images'][$j] = base_url('uploads/labour/'.$image);   
                              }else{
                                 $result['project'][$i]['project_images'][$j] =''; 
                              }
                            $j++;
                          } 
                    $i++;     
                  }
                   
                   
                   $uploads = 'labour';
               }
              else
              {
                  $uploads = 'supplier';
              }
               if(!empty($result['image']))
               {
               $result['image'] = base_url('uploads/'.$uploads.'/'.$result['image']);    
               }
               if(empty($result['image']))
               {
                   $result['image'] = '';
               }
               
              if(!empty($result['security']))
              {
                  $result['security'] = base_url('uploads/'.$uploads.'/'.$result['security']);
              }if(empty($result['security']))
              {
                  $result['security'] = '';
              }
              if(!empty($result['statutory']))
              {
                  $result['statutory'] = base_url('uploads/'.$uploads.'/'.$result['statutory']);
              }
              if(empty($result['statutory']))
              {
                  $result['statutory'] = '';
              }
              
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
              
               
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));
       }
       
       }
       else
       {
           if($type == 'equipment')
           {
            $result = $this->Subcontractor_model->getequipmentlistsbyid($market_user_id);
            // $i=0;
            // foreach($result as $res)
            // {
               $id = $result['supplier_equip_id'];
               $type = $result['type'];
               if($type == 'sell')
               {
                   $result['type'] = 'buy';
               }
            $img = $this->Subcontractor_model->getequipmentimg($id);
            // print_r($img);die;
            if(!empty($img))
            {
                $result['image']=base_url('uploads/supplierPost/'.$img['images']);
            }
            else
            {
                $result['image']= '';
            }
            
            // $i++;
            // }
            
            
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
        }
           if($type == 'material')
           {
               $result = $this->Subcontractor_model->getmaterialListsbyid($market_user_id);
            //   $i=0;
            //   foreach($result as $res)
            //   {
                   $id = $result['supplier_mat_id'];
                   $img = $this->Subcontractor_model->getmaterialimg($id);
                   if(!empty($img))
                   {
                       $result['image']=base_url('uploads/supplierPost/'.$img['images']);
                   }
                   else
                   {
                       $result['image']='';
                   }
                   
            //       $i++;
            //   }
               
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
           }
           
       }
       
       
   }
   
   public function response()
   {
    $this->output->set_content_type('application/json');
    $id = $this->input->post('id');
    $response = $this->input->post('response');
    if($response == 'accept')
    {
        $result = $this->Subcontractor_model->accept($id);
        if($result)
        {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Accepted' , 'data' => 'Accepted']));
        }else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Accept' , 'data' => 'Failed to Accept']));
        }    
        
    }
    else
    {
        $result = $this->Subcontractor_model->decline($id);
        if($result)
        {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Declined' , 'data' => 'Declined']));
        }else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Decline' , 'data' => 'Failed to Decline']));
        }
     }
   }
   
   public function homescreenListing()
   {
       $this->output->set_content_type('application/json');
       $type = $this->input->post('type');
       $id = $this->input->post('id');
       $sub_cont_id = $this->input->post('sub_contractor_id');
       if($type == 'sub_contractor' || $type == 'labour')
       {
          $result = $this->Subcontractor_model->homescreenListing($type,$id);
       $i=0;
       if($result)
       {
           foreach($result as $res)
           {
               $market_user_id = $res['market_user_id'];
                $rating = $this->Subcontractor_model->ratings($market_user_id,$type);
                
               if(!empty($rating)){
                       $result[$i]['rating'] = round($rating['rating']);
                       $result[$i]['rating_count'] = $rating['rating_count'];
               }else{
                   $result[$i]['rating'] = '0';
                   $result[$i]['rating_count'] = '0';
               }
               
               if($type == 'sub_contractor'){
                   
                   $uploads = 'subcontractorDetails';
               }
            else if($type == 'labour')
               {
                   $uploads = 'labour';
               }
            if(!empty($res['image']))
               {
               $result[$i]['image'] = base_url('uploads/'.$uploads.'/'.$res['image']);    
               }
               if(empty($res['image']))
               {
                   $result[$i]['image'] = '';
               }
           $i++;
           }
            $count = (string)$this->Subcontractor_model->marketplaceCount($type);
            $posts = $this->Subcontractor_model->getposts($sub_cont_id);
            $days = $this->Subcontractor_model->getpaymentdate($sub_cont_id);
            
                $date = strtotime($days['date']);
                $nextdate = strtotime(date('Y-m-d', strtotime($days['date']. ' + 30 days')));
                $now = strtotime(date('yy-m-d'));
                // print_r($nextdate);die;
                $datediff = $nextdate - $now;
                $day = round($datediff / (60 * 60 * 24));
           
            if($day == '0')
                {
                    $updateplan = $this->Subcontractor_model->updateplan($sub_cont_id);
                }
            $plan_type = $this->Subcontractor_model->getPlanType($sub_cont_id);
          $this->output->set_output(json_encode(['plan_type' =>$plan_type['plan_type'],'posts'=>$posts['posts'],'count'=>$count,'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
        }  
       else
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));
       }
     }
       else
       {
           if($type == 'equipment')
           {
            $result = $this->Subcontractor_model->getequipmentlists($id);
            $count = (string)$this->Subcontractor_model->supplierequipCount();
            $i=0;
            foreach($result as $res)
            {
               $id = $res['supplier_equip_id'];
               $type = $res['type'];
               $market_user_id = $res['market_user_id'];
               $equipmentRatings = $this->Subcontractor_model->equipmentRatings($market_user_id);
               if(!empty($equipmentRatings)){
                       $result[$i]['rating'] = round($equipmentRatings['rating'],1);
                       $result[$i]['rating_count'] = $equipmentRatings['rating_count'];
               }else{
                   $result[$i]['rating'] = '0';
                   $result[$i]['rating_count'] = '0';
               }
               if($type == 'sell')
               {
                   $result[$i]['type'] = 'buy';
               }
            $img = $this->Subcontractor_model->getequipmentimg($id);
            // print_r($img);die;
            if(!empty($img))
            {
                $result[$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
            }
            else
            {
                $result[$i]['image']= '';
            }
            $i++;
            }
            $this->output->set_output(json_encode(['count'=>$count,'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
        }
           if($type == 'material')
           {
               $result = $this->Subcontractor_model->getmaterialLists($id);
               $count = (string)$this->Subcontractor_model->suppliermatCount();
               $i=0;
               foreach($result as $res)
               {
                   $id = $res['supplier_mat_id'];
                   $img = $this->Subcontractor_model->getmaterialimg($id);
                   if(!empty($img))
                   {
                       $result[$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                   }
                   else
                   {
                       $result[$i]['image']='';
                   }
                   $i++;
               }
               $this->output->set_output(json_encode(['count'=>$count,'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
           }
       }
    }
   
   
    public function filters()
    {
      $this->output->set_content_type('application/json');
      $type = $this->input->post('type');
      $location_filter = $this->input->post('location_filter');
      $location_filter = explode(',',$location_filter);
      $aoi_filter = $this->input->post('aoi_filter');
      $aoi_filter = explode(',',$aoi_filter);
      $max_price_filter = $this->input->post('max_price_filter');
      $min_price_filter = $this->input->post('min_price_filter');
      $rating_filter = $this->input->post('rating_filter');
      $rating_filter = explode(',',$rating_filter);
      if($type == 'labour')
      {
        $result  = $this->Subcontractor_model->labour_filter($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter);
         if($result)
          {
            $i=0;
          foreach($result as $res)
          {
              $market_user_id = $res['market_user_id'];
                $rating = $this->Subcontractor_model->ratings($market_user_id,$type);
                
               if(!empty($rating)){
                       $result[$i]['rating'] = round($rating['rating']);
                       $result[$i]['rating_count'] = $rating['rating_count'];
               }else{
                   $result[$i]['rating'] = '0';
                   $result[$i]['rating_count'] = '0';
               }
              $img = $res['image'];
              if(!empty($img))
              {
                  $result[$i]['image']=base_url('uploads/contractorDetails/'.$res['image']);
              }
              else
              {
                 $result[$i]['image']= ''; 
              }
               
             $i++; 
          }
                   $tempArr = array_unique(array_column($result, 'market_user_id'));
                   $final = array_intersect_key($result, $tempArr);
                   $final = array_values($final);
          
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));
      return FALSE;
          }
          else
          {
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not Found' , 'data' => []]));
      return FALSE;
          }  
      }
      
      if($type == 'equipment')
      {
            $result  = $this->Subcontractor_model->equipment_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter);
            // print_r($result);die;
            if($result)
            {
                $i=0;
                foreach($result as $res)
                {
                   $market_user_id = $res['market_user_id'];
                   $supplier_equip_id = $res['supplier_equip_id'];
                $getType = $this->Subcontractor_model->getType($market_user_id);
                $type = $getType['type'];
                 
                if($type == 'supplier')
                {
                   $img = $this->Subcontractor_model->getequipmentimg($supplier_equip_id);
                     if(!empty($img))
                     {
                         $result[$i]['image']= base_url('uploads/supplierPost/'.$img['images']);
                     }else
                     {
                       $result[$i]['image']= '';  
                     }             
                }
                    $i++;
                }
                       $tempArr = array_unique(array_column($result, 'market_user_id'));
                       $final = array_intersect_key($result, $tempArr);
                       $final = array_values($final);
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));
          return FALSE;  
            }
            else
            {
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not Found' , 'data' => []]));
          return FALSE;
            }  
          
      }
      
      if($type == 'material')
      {
          $result  = $this->Subcontractor_model->material_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter);
         if($result)
         {
             $i=0;
            foreach($result as $res)
            {
                $market_user_id = $res['market_user_id'];
                $supplier_mat_id = $res['supplier_mat_id'];
                $getType = $this->Subcontractor_model->getType($market_user_id);
                $type = $getType['type'];
                 
                if($type == 'supplier')
                {
                   $img = $this->Subcontractor_model->getequipmentimg($supplier_mat_id);
                     if(!empty($img))
                     {
                         $result[$i]['image']= base_url('uploads/supplierPost/'.$img['images']);
                     }else
                     {
                       $result[$i]['image']= '';  
                     }             
                }
                $i++;
            }
                   $tempArr = array_unique(array_column($result, 'market_user_id'));
                   $final = array_intersect_key($result, $tempArr);
                   $final = array_values($final);
             $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));
      return FALSE;
         }
         else
         {
             $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not Found' , 'data' => []]));
      return FALSE;
         }
      }
      
        
    }
    
   public function homescreenSearch()
   {
       $this->output->set_content_type('application/json');
       $type = $this->input->post('type');
       $field = $this->input->post('field');
       if($type == 'contractor' || $type == 'labour')
       {
          $result = $this->Subcontractor_model->homescreenSearch($field,$type);
           $i=0;
           if($result)
           {
               foreach($result as $res)
               {
                   $market_user_id = $res['market_user_id'];
                $rating = $this->Subcontractor_model->ratings($market_user_id,$type);
               if(!empty($rating)){
                       $result[$i]['rating'] = round($rating['rating']);
                       $result[$i]['rating_count'] = $rating['rating_count'];
               }else{
                   $result[$i]['rating'] = '0';
                   $result[$i]['rating_count'] = '0';
               }
                   if($type == 'contractor'){
                       
                       $uploads = 'contractorDetails';
                   }
                
                   else if($type == 'labour')
                   {
                       $uploads = 'labour';
                   }
                
                   if(!empty($res['image']))
                   {
                   $result[$i]['image'] = base_url('uploads/'.$uploads.'/'.$res['image']);    
                   }
                   if(empty($res['image']))
                   {
                       $result[$i]['image'] = '';
                   }
                   $i++;
               }
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result])); 
           }
           else
           {
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));  
           }
       }
       if($type == 'equipment')
       {  
           $result = $this->Subcontractor_model->equipmentSearch($field);
            $i=0;
            foreach($result as $res)
            {
               $id = $res['supplier_equip_id'];
               $market_user_id = $res['market_user_id'];
               $type = $res['type'];
               $equipmentRatings = $this->Subcontractor_model->equipmentRatings($market_user_id);
               if(!empty($equipmentRatings)){
                       $result[$i]['rating'] = round($equipmentRatings['rating'],1);
                       $result[$i]['rating_count'] = $equipmentRatings['rating_count'];
               }else{
                   $result[$i]['rating'] = '0';
                   $result[$i]['rating_count'] = '0';
               }
               
               if($type == 'sell')
               {
                   $result[$i]['type'] = 'buy';
               }
            $img = $this->Subcontractor_model->getequipmentimg($id);
            
            if(!empty($img))
            {
                $result[$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
            }
            else
            {
                $result[$i]['image']= '';
            }
            $i++;
            }
            if($result)
            {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));    
            }
            else
            {
                $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Not Found' , 'data' => 'Not Found']));
            }
       }
       if($type == 'material')
       {
           $result = $this->Subcontractor_model->materialSearch($field);
               $i=0;
               foreach($result as $res)
               {
                   $id = $res['supplier_mat_id'];
                   $img = $this->Subcontractor_model->getmaterialimg($id);
                   if(!empty($img))
                   {
                       $result[$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                   }
                   else
                   {
                       $result[$i]['image']='';
                   }
                   
                   $i++;
               }
               if($result)
               {
                   $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
               }
               else
               {
                   $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Not Found' , 'data' => 'Not Found']));
               }
        }
   }
   
  public function searchbyLocation()
  {
     $this->output->set_content_type('application/json');
     $field = $this->input->post('field');
     $result['labour'] = $this->Subcontractor_model->labourbyLocation($field);
     $result['equipment'] = $this->Subcontractor_model->equipmentbyLocation($field);
     $result['material'] = $this->Subcontractor_model->materialbyLocation($field);
     if($result)
     {
          $i=0;
          foreach($result['labour'] as $labour)
          {
              $result['labour'][$i]['image'] = base_url('uploads/labour/'.$labour['image']);
              $i++;
          }
          
          $i=0;
            foreach($result['equipment'] as $res)
            {
               $id = $res['supplier_equip_id'];
               $type = $res['type'];
               if($type == 'sell')
               {
                   $result['equipment'][$i]['type'] = 'buy';
               }
            $img = $this->Subcontractor_model->getequipmentimg($id);
            if(!empty($img))
            {
                $result['equipment'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
            }
            else
            {
                $result['equipment'][$i]['image']= '';
            }
            
            $i++;
            }
          
        $i=0;
               foreach($result['material'] as $material)
               {
                   $id = $material['supplier_mat_id'];
                   $img = $this->Subcontractor_model->getmaterialimg($id);
                   if(!empty($img))
                   {
                       $result['material'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                   }
                   else
                   {
                       $result['material'][$i]['image']='';
                   }
                   $result['material'][$i]['type']='material';
                   $i++;
               }
         $final = array_merge($result['labour'],$result['equipment'],$result['material']); 
         $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));
     }
     else
     {
         $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data not found' , 'data' => 'data not found']));
     }
  }

}
