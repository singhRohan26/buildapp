<?php

defined('BASEPATH') OR die('Not Allowed');

class Contractor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Contractor_model']);
    }

    public function registration()
    {
       $this->output->set_content_type('application/json');
       $key  = $this->input->post('key');
       $name = $this->input->post('name');
       $email  = $this->input->post('email');
       $phone = $this->input->post('phone');
       $pass = $this->input->post('pass');
       $cpass = $this->input->post('c_pass');
       if($key == 1)
       {
           //registration
           $checkmail = $this->Contractor_model->checkmail($email);
           if($checkmail)
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Email already exist' ,'data' => 'email already exist']));
                        return false;
           }
           else
           {
               if($pass == $cpass)
               {
                      
                      $result = $this->Contractor_model->signUp($name,$email,$phone,$pass);
                                if($result)
                                {
                                    $result['image'] = '';
                                $this->output->set_output(json_encode(['plan_type'=>$result['plan_type'],'result' => 1, 'msg' => 'Registration Sucess' ,'data' => $result]));
                                return false;
                                }
                                else
                                {
                                $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Registration Failed' ,'data' => 'Registration Failed']));
                                return false;
                                }
                   
               }
               else
               {
                   $this->output->set_output(json_encode(['plan_type'=>$result['plan_type'],'result' => -3, 'msg' => 'Password Mismatched' ,'data' => 'Password Mismatched']));
                                return false;
               }
               
           }
           
           
       }
       else
       {
           //login
           
           $result = $this->Contractor_model->Login($email,$pass);
           if($result)
           {
               $type = $result['type'];
               $id = $result['market_user_id'];
               if($type == 'contractor')
               {
                   $img = $this->Contractor_model->contractorimg($id);
                   if(!empty($img['image'])){
                    $result['image'] = base_url('uploads/contractorDetails/'.$img['image']);
                }else{
                    $result['image'] = '';
                }
               }
               if($type == 'sub_contractor')
               {
                   $img = $this->Contractor_model->sub_contractorimg($id);
                   if(!empty($img['image'])){
                    $result['image'] = base_url('uploads/subcontractorDetails/'.$img['image']);
                }else{
                    $result['image'] = '';
                }
               }
               if($type == 'labour')
               {
                   $img = $this->Contractor_model->labourimg($id);
                   if(!empty($img['image'])){
                    $result['image'] = base_url('uploads/labour/'.$img['image']);
                }else{
                    $result['image'] = '';
                }
               }
               if($type == 'supplier')
               {
                   $img = $this->Contractor_model->supplierimg($id);
                   if(!empty($img['image'])){
                    $result['image'] = base_url('uploads/supplier/'.$img['image']);
                }else{
                    $result['image'] = '';
                }
               }
               
            //   $result['image'] = ''; 
            $this->output->set_output(json_encode(['plan_type'=>$result['plan_type'],'result' => 1, 'msg' => 'Login Sucess' ,'data' => $result]));
            return false;
           }
           else
           {
            $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Login Failed' ,'data' => 'Login Failed']));
            return false;  
           }
           
           
       }
       
        
    }
    
    public function loginWithFacebook()
    {
       
       $this->output->set_content_type('application/json');
       $name = $this->input->post('name');
       $email = $this->input->post('email');
       $checkmail = $this->Contractor_model->checkmail($email);
       
       if($checkmail)
       {
           $type = $checkmail['type'];
           $id = $checkmail['market_user_id'];
           if($type == 'contractor')
               {
                   $img = $this->Contractor_model->contractorimg($id);
                   if(!empty($img['image'])){
                    $checkmail['image'] = base_url('uploads/contractorDetails/'.$img['image']);
                }else{
                    $checkmail['image'] = '';
                }
               }
               if($type == 'sub_contractor')
               {
                   $img = $this->Contractor_model->sub_contractorimg($id);
                   if(!empty($img['image'])){
                    $checkmail['image'] = base_url('uploads/subcontractorDetails/'.$img['image']);
                }else{
                    $checkmail['image'] = '';
                }
               }
               if($type == 'labour')
               {
                   $img = $this->Contractor_model->labourimg($id);
                   if(!empty($img['image'])){
                    $checkmail['image'] = base_url('uploads/labour/'.$img['image']);
                }else{
                    $checkmail['image'] = '';
                }
               }
               if($type == 'supplier')
               {
                   $img = $this->Contractor_model->supplierimg($id);
                   if(!empty($img['image'])){
                    $checkmail['image'] = base_url('uploads/supplier/'.$img['image']);
                }else{
                    $checkmail['image'] = '';
                }
               }
           
            // $checkmail['image'] = '';
           $this->output->set_output(json_encode(['result' => 1,'plan_type'=>$checkmail['plan_type'], 'msg' => 'Login Success', 'data' => $checkmail]));
            return false; 
       }
       else
       {
            $result = $this->Contractor_model->LoginwithFacebook($name,$email,$phone=null,$password=null);
            if($result)
            {
                 $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Login Success', 'data' => $result]));
            return false;
            }
            else
            {
             $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Login Failed', 'data' => 'Login Failed']));
            return false;
            }
       }
        
    }
    
    public function faq()
    {
        $this->output->set_content_type('application/json');
        $result = $this->Contractor_model->faq();
        if($result)
        {
            $i=0;
            foreach($result as $res)
            {
                $faq_id = $res['faq_id'];
                $faq_desc = $this->Contractor_model->faq_desc($faq_id);
                $j=0;
                 foreach($faq_desc as $des)
                 {
                     if(!empty($des['faq_desc']))
                     {
                        $result[$i]['faq_desc'][$j] = $des['faq_desc']; 
                     }else
                     {
                         $result[$i]['faq_desc'][$j] = '';
                     }
                    
                    $j++; 
                 }
                
                $i++;
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'data loaed', 'data' => $result]));
            return false;
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'data not found', 'data' => 'data not found']));
            return false;
        }
        
    }
    
    public function faq_desc()
    {
        $this->output->set_content_type('application/json');
        $faq_id = $this->input->post('faq_id');
        $result = $this->Contractor_model->faq_desc($faq_id);
        if($result)
        {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'data loaed', 'data' => $result]));
            return false;
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'data not found', 'data' => 'data not found']));
            return false;
        }
        
    }
    
    public function skills()
    {
        $this->output->set_content_type('application/json');
        $result = $this->Contractor_model->skills();
        if($result)
        {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'data loaed', 'data' => $result]));
            return false;
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'data not found', 'data' => 'data not found']));
            return false;
        }
    }
    
    public function contractorDetails()
    {
        $this->output->set_content_type('application/json');
        $contractor_id = $this->input->post('contractor_id');
        // $name = $this->input->post('name');
        $company_name = $this->input->post('company_name');
        $capablity = $this->input->post('capability');
        $location = $this->input->post('location');
        $location = explode(',',$location);
        $aoi  = $this->input->post('aoi_desc');
        $aoi = explode(',',$aoi);
        $work_exp = $this->input->post('work_exp');
        $cost_range = $this->input->post('cost_range');
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
            $file2 = '';
        }
        $result = $this->Contractor_model->contractorDetails($contractor_id,$company_name,$capablity,$aoi,$work_exp,$cost_range,$file1,$file2,$link);
        if($result)
        {
            // $contractor_detail_id = $result;
            foreach($qualification as $qualify)
            {
                $qualify = $this->Contractor_model->contractorQualification($qualify,$contractor_id);
            }
            foreach($location as $loc)
            {
                $location = $this->Contractor_model->contracterLocation($loc,$contractor_id);
            }
            foreach($aoi as $a)
             {
                 $this->Contractor_model->contractoraoi($a,$contractor_id);
             }
            $img = $result['image'];
            
            if(!empty($img))
            {
                 $result['image'] = base_url('uploads/contractorDetails/'.$img);
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
    
    public function doUploadFile($file)
    {
        // echo $file;die;
        $file1 = $_FILES[$file]['name'];
        $config['upload_path'] = './uploads/contractorDetails/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
       // $config['max_filename'] = '2555';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        return $upload_data['file_name'];
        
    }
    
    public function messagesRequest()
    { 
        $this->output->set_content_type('application/json');
        $contractor_id = $this->input->post('contractor_id');
        $type = $this->input->post('type');
        if($type == 'recieved')
        {
            $result = $this->Contractor_model->messagesRequest($contractor_id);
            // $result['user_cont_equip'] = $this->Contractor_model->user_cont_equip($contractor_id);
            // $result['user_cont_mat'] = $this->Contractor_model->user_cont_mat($contractor_id);
            
            if($result)
            {
                $i=0;
                foreach($result as $res)
                {
                    $ucc_id = $res['ucc_id'];
                    $img = $res['image'];
                    
                    if(!empty($img))
                    {
                        $result[$i]['image']=base_url('uploads/tenderuser/'.$res['image']);
                    }
                    else
                    {
                        $result[$i]['image']='';
                    }
                    
                    $i++;
                    
                }
               
                
            $plan = $this->Contractor_model->getPlanType($contractor_id);   
                
            $this->output->set_output(json_encode(['plan_type'=>$plan['plan_type'],'result' => 1, 'msg' => 'Data Loaded' ,'data' => $result]));
            return false;
            }
            else
            {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No Recieved Requests' ,'data' => 'No Recieved Requests']));
            return false;
            }
            
        }
        if($type == 'chat')
        {
            $result['user_contractor'] = $this->Contractor_model->chatRequest($contractor_id);
            $result['user_bidding'] = $this->Contractor_model->bidChatRequest($contractor_id);
            $result['labour_chat'] = $this->Contractor_model->labourChatRequest($contractor_id);
            $result['sub_contractor_chat'] = $this->Contractor_model->sub_contractor_chatRequest($contractor_id);
            $result['supplier_equip_chat'] = $this->Contractor_model->supplier_equip_chat($contractor_id);
            // print_r($result['supplier_equip_chat']);die;
            $result['supplier_mat_chat'] = $this->Contractor_model->supplier_mat_chat($contractor_id);
            // print_r($result['supplier_mat_chat']);die;
            // print_r($result['labour_chat']);die;
            if($result)
            {
                
             $i=0;
                foreach($result['user_contractor'] as $res)
                {
                    
                    $img = $res['image'];
                    // print_r($img);die;
                    if(!empty($img))
                    {
                        $result['user_contractor'][$i]['image']=base_url('uploads/tenderuser/'.$res['image']);
                    }
                    else
                    {
                        $result['user_contractor'][$i]['image']='';
                    }
                    $result['user_contractor'][$i]['type']='tender';
                    $i++;
                    // die;
                }
                
                $i=0;
                foreach($result['user_bidding'] as $userBid)
                {
                   $img = $userBid['image'];
                   if(!empty($img))
                   {
                       $result['user_bidding'][$i]['image']=base_url('uploads/tenderuser/'.$img);
                   }else
                   {
                       $result['user_bidding'][$i]['image']='';
                   }
                   
                   $result['user_bidding'][$i]['type']='tender';
                  $i++;  
                }
                
                $i=0;
                foreach($result['labour_chat'] as $labour)
                {
                    $img = $labour['image'];
                    if(!empty($img))
                    {
                      $result['labour_chat'][$i]['image'] = base_url('uploads/labour/'.$img);  
                    }else
                    {
                        $result['labour_chat'][$i]['image'] = '';
                    }
                    
                    $result['labour_chat'][$i]['market_user_id'] = $labour['unique_id'];
                    
                    $i++;
                }
                
                $i=0;
                foreach($result['sub_contractor_chat'] as $sub_contractor)
                {
                  $img = $sub_contractor['image'];  
                  
                  if(!empty($img))
                    {
                      $result['sub_contractor_chat'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$img);  
                    }else
                    {
                        $result['sub_contractor_chat'][$i]['image'] = '';
                    }  
                    
                    $result['sub_contractor_chat'][$i]['market_user_id'] = $sub_contractor['unique_id'];
                    $i++;
                }
                $i=0;
                foreach($result['supplier_equip_chat'] as $supplier_chat)
                {
                 $img =  $supplier_chat['image'];
                 if(!empty($img))
                 {
                     $result['supplier_equip_chat'][$i]['image'] = base_url('uploads/supplier/'.$img);
                 }else{
                     $result['supplier_equip_chat'][$i]['image'] = '';
                 }
                  $result['supplier_equip_chat'][$i]['market_user_id'] = $supplier_chat['unique_id'];
                  $i++;  
                }
                
                $i=0;
                foreach($result['supplier_mat_chat'] as $supplier_mat_chat)
                {
                 $img =  $supplier_mat_chat['image'];
                 if(!empty($img))
                 {
                     $result['supplier_mat_chat'][$i]['image'] = base_url('uploads/supplier/'.$img);
                 }else{
                     $result['supplier_mat_chat'][$i]['image'] = '';
                 }
                  $result['supplier_mat_chat'][$i]['market_user_id'] = $supplier_mat_chat['unique_id'];
                  $i++;  
                }
                
                
                $final = array_merge($result['user_contractor'],$result['user_bidding'],$result['labour_chat'],$result['sub_contractor_chat'],$result['supplier_equip_chat'],$result['supplier_mat_chat']);
                // print_r($final);die;
                $tempArr = array_unique(array_column($final, 'unique_id'));
                $arr = array_intersect_key($final, $tempArr);
                $arr = array_values($arr);
                // print_r($arr);die;

            // $arr = array($arr);
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' => $arr]));
            return false;
            }
            else
            {
                
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No Recieved Requests' ,'data' => 'No Recieved Requests']));
            return false;
            
            }
        }
        
        if($type == 'sent')
        {
            $result['bidding'] = $this->Contractor_model->biddingRequest($contractor_id);
            $result['labour'] = $this->Contractor_model->laboursentRequest($contractor_id);
            $result['sub_contractor'] = $this->Contractor_model->sub_contractorsentRequest($contractor_id);
            $result['material'] = $this->Contractor_model->materialsentRequest($contractor_id);
            $result['equipment'] = $this->Contractor_model->equipmentsentRequest($contractor_id);
            
            $i=0;
               foreach($result['bidding'] as $bidding)
               {
                   if(!empty($bidding['image']))
                   {
                    $result['bidding'][$i]['image'] = base_url('uploads/tenderuser/'.$bidding['image']);
                    
                   }else
                   {
                       $result['bidding'][$i]['image'] = '';
                   }
                  $result['bidding'][$i]['type'] = 'tender';  
                $i++;
                   
               }
            
            $i=0;
               foreach($result['labour'] as $labour)
               {
                   if(!empty($labour['image']))
                   {
                    $result['labour'][$i]['image'] = base_url('uploads/labour/'.$labour['image']);   
                   }else
                   {
                       $result['labour'][$i]['image'] = '';
                   }
                    
                $i++;
                   
               }
               $i=0;
               foreach($result['sub_contractor'] as $sub_cont)
               {
                   
                  if(!empty($sub_cont['image']))
                  {
                      $result['sub_contractor'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$sub_cont['image']);
                  }else
                  {
                      $result['sub_contractor'][$i]['image'] = '';
                  }
                  $i++; 
               }
               
               $i=0;
               foreach($result['material'] as $mat)
               {
                   $result['material'][$i]['image'] = '';
                   $result['material'][$i]['type'] = 'material';
                   $i++;
               }
               $i=0;
               foreach($result['equipment'] as $equip)
               {
                   $result['equipment'][$i]['image'] = '';
                   
                   $i++;
                   
               }
               
            if($result)
            {
                $final = array_merge($result['bidding'],$result['labour'],$result['sub_contractor'],$result['equipment'],$result['material']);
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' => $final]));
                return false;   
            }
            else
            {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No sent Messages yet' ,'data' => 'No sent Messages yet']));
                return false;
            }
            
        }
        if($type == 'post')
        {
         $this->output->set_content_type('application/json');
        $contractor_id = $this->input->post('contractor_id');
        $result['equipment'] = $this->Contractor_model->supplierHomescreen($contractor_id);
        $result['material'] = $this->Contractor_model->suppliermaterialHomescreen($contractor_id);
        if($result)
        {  
            $i=0;
            foreach($result['equipment'] as $res)
            {
                $id = $res['supplier_equip_id'];
                $img = $this->Contractor_model->supplierHomescreenImg($id);
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
               $img = $this->Contractor_model->supplierHomescreenmatImg($id);
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
}
    public function messageSectionDetails()
    {
        $this->output->set_content_type('application/json');
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        $contractor_id = $this->input->post('contractor_id');
        if($type == 'recieved')
        {
            $result = $this->Contractor_model->recivedmessageDetails($id);
            if($result)
            {
                
                $projects = $this->Contractor_model->getusercontractorcontactProjects($id);
                
                    $j=0;
                    foreach($projects as $pro)
                    {
                       $result['images'][$j] = base_url('uploads/user-contractor-contact/'.$pro['images']);
                       $j++; 
                    }
                $img = $result['image'];
                if(!empty($img))
                {
                    $result['image'] = base_url('uploads/tenderuser/'.$img);
                }
                else
                {
                    $result['image'] = '';
                }
                
                $bid = $this->Contractor_model->getBids($contractor_id);
              $bid_no = $bid['bids'];
                
                $this->output->set_output(json_encode(['bids'=>$bid_no,'result' => 1, 'msg' => 'Data Loaded' ,'data' => $result]));
            return false;
            }
            else
            {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not Found' ,'data' => 'Data not Found']));
            return false;
            }
            
        }
        if($type == 'sent')
        {
            $user_type = $this->input->post('user_type');
            if($user_type == 'tender')
            {
                $result = $this->Contractor_model->tendersentDetails($id);
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
                   $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' => $result]));
            return false; 
                }else
                {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not Found' ,'data' => 'Data not Found']));
            return false;
                }
            }
            elseif($user_type == 'labour')
            {
                $result = $this->Contractor_model->laboursentDetails($id);
                // print_r($result);die;
                if($result)
                {
                    $img = $result['image'];
                if(!empty($img))
                {
                    $result['image'] = base_url('uploads/labour/'.$img);
                }
                else
                {
                    $result['image'] = '';
                
                }  
                    
                  $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' => $result]));
            return false;  
                }
                else
                {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not Found' ,'data' => 'Data not Found']));
            return false;
                }
            }
            elseif($user_type == 'sub_contractor')
            {
             $result = $this->Contractor_model->subcontsentDetails($id);
                // print_r($result);die;
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
                    
                  $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' => $result]));
            return false;  
                }
                else
                {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not Found' ,'data' => 'Data not Found']));
            return false;
                } 
             }
            elseif($user_type == 'rent' || $user_type == 'buy')
            {
               $result = $this->Contractor_model->equipsentDetails($id);
                // print_r($result);die;
                if($result)
                {
                    $result['image'] = '';
                  $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' => $result]));
            return false;  
                }
                else
                {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not Found' ,'data' => 'Data not Found']));
            return false;
                } 
            }
            else
            {$result = $this->Contractor_model->materialsentDetails($id);
                // print_r($result);die;
                if($result)
                {
                    $result['image'] = '';
                  $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' => $result]));
            return false;  
                }
                else
                {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Data not Found' ,'data' => 'Data not Found']));
            return false;
                }
            }
         }
     }
    
    
    
    
    
    
    
    //contractor biding flow
    
    public function bidding()
    {
       $this->output->set_content_type('application/json');
       $contractor_id = $this->input->post('contractor_id');
       $user_id = $this->input->post('user_id');
       $cost_range = $this->input->post('cost_range');
       $available = $this->input->post('available');
       $desc = $this->input->post('desc');
       $post_id = $this->input->post('user_post_id');
       $cost_m2 = $this->input->post('cost_m2');
       $duration = $this->input->post('duration');
       $link = $this->input->post('link');
       $site_visit = $this->input->post('site_visit');
       $ucc_id = $this->input->post('ucc_id');
       $result = $this->Contractor_model->bidding($cost_range,$available,$desc,$contractor_id,$user_id,$post_id,$cost_m2,$duration,$link,$site_visit,$ucc_id);
       if($result)
       {
        $id = $result;
        //hide request
        $getpostid = $this->Contractor_model->getpostid($id);
        $post_id = $getpostid['ucc_id'];
        $this->Contractor_model->hidepost($post_id);
        //hide request
        
        
        // print_r($id);die;
        $bid = $this->Contractor_model->getBids($contractor_id);
        $bids = $bid['bids'];
        // print_r($bids);die;
        $bids = $bids - 1;
        $this->Contractor_model->updateBids($contractor_id,$bids);
        $this->bidDocuments($id);
            
           $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Bid Submitted' ,'data' => $result]));
           return false;
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed to Bid' ,'data' => 'Failed to Bid']));
            return false;
       }
        
    }
    
    public function bidDocuments($id)
    {
        // echo $id;die;
        //  $this->output->set_content_type('application/json');
        //Multiple Images
           $this->load->library('upload');
             if(!empty($_FILES['image_url'])){
               $count = count($_FILES['image_url']['size']);
           }
             
             
        foreach ($_FILES as $key => $value) {
            // print_r($_FILES['image_url']);die;
            // print_r($key);die;
            if($key == 'image_url'){
            for ($s = 0; $s < $count; $s++) {
                $_FILES['image_url']['name'] = $value['name'][$s];
                $_FILES['image_url']['type'] = $value['type'][$s];
                $_FILES['image_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url']['error'] = $value['error'][$s];
                $_FILES['image_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->setbidDocumentsOptions());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Contractor_model->bidDocuments($data['file_name'],$id);
            }
            }
        }
    }
    
    public function setbidDocumentsOptions()
    {
        $config = array();
        $config['upload_path'] = './uploads/bidding/';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);

        return $config;
    }
    
    public function contractorProject($bid_id)
    {
        $this->output->set_content_type('application/json');
        $name = $this->input->post('name');
        $names = explode(',',$name);
        $location_id = $this->input->post('location_id');
        $location_id = explode(',',$location_id);
        foreach($names as $key => $name){
            // echo $location_id[$key];
            $result = $project_id = $this->Contractor_model->contractorProject($bid_id,$name,$location_id[$key]);
            $this->load->library('upload');
            $count = count($_FILES['image_url'.$key]['size']);
            foreach ($_FILES as $key1 => $value) {
            if($key1 == 'image_url'.$key){
            for ($s = 0; $s < $count; $s++) {
                $_FILES['image_url'.$key]['name'] = $value['name'][$s];
                $_FILES['image_url'.$key]['type'] = $value['type'][$s];
                $_FILES['image_url'.$key]['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url'.$key]['error'] = $value['error'][$s];
                $_FILES['image_url'.$key]['size'] = $value['size'][$s];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('image_url'.$key);
                $data = $this->upload->data();
                 $this->Contractor_model->projectimages($data['file_name'],$project_id);
            }
            }
        }
        
        }
        // die;
        // print_r($name);die;
        
        
        
        if($result)
        {
            $project_id = $result;
            $this->projectimages($project_id);
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Bid Submitted without adding Project' ,'data' => 'Bid Submitted without adding Project']));
            return false;
        }
    }
    
   
   
   public function addProjects()
   {
       $this->output->set_content_type('application/json');
       $contractor_id = $this->input->post('market_user_id');
       $key = $this->input->post('key');
       if($key == '1')
       {
           //Add Project
           $name = $this->input->post('name');
           $location = $this->input->post('location_id');
           $price = $this->input->post('price');
           $result = $this->Contractor_model->addProject($contractor_id,$name,$location,$price);
           if($result)
           {
               $project_id = $result;
               $this->projectimages($project_id);
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Project Added' ,'data' => $result]));
            return false;
           }
           else
           {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Failed to Add Project' ,'data' => 'Failed to Add Project']));
            return false;
           }
       }
       
       if($key == '2')
       {
           //Delete Project
           $project_id = $this->input->post('project_id');
           $result = $this->Contractor_model->deleteProject($project_id);
           if($result)
           {
               $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Project Deleted' ,'data' => 'Project Deleted']));
            return false;
           }else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Deletion Failed' ,'data' => 'Deletion Failed']));
            return false;
           }
       }
       if($key == '3')
       {
           // view all projects
           $project_id = $this->input->post('project_id');
           $result = $this->Contractor_model->viewProjects($project_id);
           
           if($result)
           {
            //  $i=0;
            // foreach($result as $res)
            // {
                
                // print_r($res);die;
                
                $images = $this->Contractor_model->getAllprojectImages($project_id);
                
                    $j=0; 
                  foreach($images as $img)
                  {
                    //   print_r($img);die;
                          if(!empty($img['images']))
                          {
                              $result['images'][$j]= base_url('uploads/contractorProject/'.$img['images']);
                          }
                          else
                          {
                              $result['images'][$j] = '';
                          }
                          $j++;
                     
                  }
            //      $i++;
                
            // }
              
               
               
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Data Loaded' ,'data' =>$result]));
            return false;
           }
           else
           {
              $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No data found' ,'data' =>'No data found']));
            return false; 
           }
         
       }
       if($key == '4')
       {
           $project_id = $this->input->post('project_id');
           $name = $this->input->post('name');
           $location = $this->input->post('location_id');
           $price = $this->input->post('price');
           $result = $this->Contractor_model->editProject($project_id,$name,$location,$price);
           if($result)
           {
               $this->Contractor_model->delProjectImages($project_id);
               
               // edit project images
               $this->projectimages($project_id);
               $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Project Updated' ,'data' =>'Project Updated']));
            return false;
            
           }else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Project Updation Failed' ,'data' =>'Project Updation Failed']));
            return false;
               
           }
           
           
           
       }
       
       
       
   }
   
   public function projectimages($project_id)
   {
           $this->output->set_content_type('application/json');
        //Multiple Images
           $this->load->library('upload');
             if(!empty($_FILES['image_url'])){
              $count = count($_FILES['image_url']['size']);
          }
        foreach ($_FILES as $key => $value) {
            if($key == 'image_url'){
            for ($s = 0; $s < $count; $s++) {
                $_FILES['image_url']['name'] = $value['name'][$s];
                $_FILES['image_url']['type'] = $value['type'][$s];
                $_FILES['image_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url']['error'] = $value['error'][$s];
                $_FILES['image_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->setprojectimagesOptions());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Contractor_model->projectimages($data['file_name'],$project_id);
            }
            }
        }
   }
   
   public function setprojectimagesOptions()
    {
        $config = array();
        $config['upload_path'] = './uploads/contractorProject/';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);
        return $config;
    }
   
   
   public function contractor_labour_contact()
   {
     $this->output->set_content_type('application/json');
     $contractor_id = $this->input->post('contractor_id');
     $labour_id = $this->input->post('labour_id');
     $title = $this->input->post('title');
     $location = $this->input->post('location');
     $startdate = $this->input->post('startdate');
     $enddate = $this->input->post('enddate');
     $desc = $this->input->post('desc');
       $result = $this->Contractor_model->contractor_labour_contact($contractor_id,$labour_id,$title,$location,$startdate,$enddate,$desc);
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
   
   //homescreen
   public function homescreen()
   {
       $this->output->set_content_type('application/json');
       $type = $this->input->post('type');
       $contractor_id = $this->input->post('contractor_id');
       $id = $this->input->post('id');
       if($type == 'sub_contractor' || $type == 'labour')
       {
          $result = $this->Contractor_model->homescreenListing($type,$id);
       $i=0;
       if($result)
       {
           foreach($result as $res)
           {
                $market_user_id = $res['market_user_id'];
                $rating = $this->Contractor_model->ratings($market_user_id,$type);
                
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
            $count = (string)$this->Contractor_model->marketplaceCount($type);
            
          $this->output->set_output(json_encode(['count'=>$count,'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
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
            $result = $this->Contractor_model->getequipmentlists($id);
            $count = (string)$this->Contractor_model->supplierequipCount();
            $i=0;
            foreach($result as $res)
            {
               $id = $res['supplier_equip_id'];
               $type = $res['type'];
               $market_user_id = $res['market_user_id'];
               $equipmentRatings = $this->Contractor_model->equipmentRatings($market_user_id);
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
            $img = $this->Contractor_model->getequipmentimg($id);
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
               $result = $this->Contractor_model->getmaterialLists($id);
               $count = (string)$this->Contractor_model->suppliermatCount();
               $i=0;
               foreach($result as $res)
               {
                   $id = $res['supplier_mat_id'];
                   $img = $this->Contractor_model->getmaterialimg($id);
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
           if($type == 'tender')
           {
               $result = $this->Contractor_model->getTenderList($id);
            //   echo '<pre>';print_r($result);die;
               if($result)
               {
                   $i=0;
                  foreach($result as $res)
                  {
                      $img = $res['image'];
                      if(!empty($img))
                      {
                          $result[$i]['image']=base_url('uploads/tenderuser/'.$res['image']);
                      }
                      else
                      {
                          $result[$i]['image']= '';
                      }
                       $i++;
                  }
                $days = $this->Contractor_model->getpaymentdate($contractor_id);
                $date = strtotime($days['date']);
                $nextdate = strtotime(date('Y-m-d', strtotime($days['date']. ' + 30 days')));
                $now = strtotime(date('yy-m-d'));
                $datediff = $nextdate - $now;
                $day = round($datediff / (60 * 60 * 24));
               $count = (string)$this->Contractor_model->getTenderCount();
            //   print_r($count);die;
               $bid = $this->Contractor_model->getBids($contractor_id);
               $bid_no = $bid['bids'];
               $plan_type = $this->Contractor_model->getPlanType($contractor_id);
                if($day == '0')
                {
                    $updateplan = $this->Contractor_model->updateplan($contractor_id);
                }
               $this->output->set_output(json_encode(['plan_type'=>$plan_type['plan_type'],'count'=>$count,'bid'=>$bid_no,'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
               }else{
                   
                $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found']));   
               }
            }
       }
    }
   
   //homescreen
   
   public function contractor_sc_contact()
   {
       $this->output->set_content_type('application/json');
       $contractor_id = $this->input->post('contractor_id');
       $sub_cont_id = $this->input->post('sub_cont_id');
       $title = $this->input->post('title');
       $location_id = $this->input->post('location_id');
       $plot = $this->input->post('plot');
       $built = $this->input->post('built');
       $cost_to = $this->input->post('cost_to');
       $cost_from = $this->input->post('cost_from');
       $start_date = $this->input->post('start_date');
       $end_date = $this->input->post('end_date');
       $quality = $this->input->post('quality');
       $desc = $this->input->post('description');
       $result = $this->Contractor_model->contractor_sc_contact($contractor_id,$sub_cont_id,$title,$location_id,$plot,$built,$cost_to,$cost_from,$start_date,$end_date,$quality,$desc);
       if($result)
       {
           $id = $result;
           $this->contractor_sc_images($id);
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Submitted Sucesfully!' , 'data' => 'Request Submitted Sucesfully!'])); 
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Request Submission Failed' , 'data' => 'Request Submission Failed'])); 
       }
   }
   
   public function contractor_sc_images($id)
    {
        // echo $id;die;
        //  $this->output->set_content_type('application/json');
        //Multiple Images
           $this->load->library('upload');
             $count = count($_FILES['image_url']['name']);
        foreach ($_FILES as $key => $value) {
            // print_r($_FILES['image_url']);die;
            // print_r($key);die;
            if($key == 'image_url'){
            for ($s = 0; $s < $count; $s++) {
                $_FILES['image_url']['name'] = $value['name'][$s];
                $_FILES['image_url']['type'] = $value['type'][$s];
                $_FILES['image_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url']['error'] = $value['error'][$s];
                $_FILES['image_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->contractor_sc_images_options());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Contractor_model->contractor_sc_images($data['file_name'],$id);
            }
            }
        }
        
        
        //Multiple Images 
    }
    
    public function contractor_sc_images_options()
    {
        $config = array();
        $config['upload_path'] = './uploads/contractor-sc-contact/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);

        return $config;
    }
   
   public function userDetails()
   {
       $this->output->set_content_type('application/json');
       $type = $this->input->post('type');
       $id = $this->input->post('id');

       if($type == 'tender')
       {
           $result = $this->Contractor_model->tenderUserDetails($id);
           $result['image']=base_url('uploads/tenderuser/'.$result['image']);
           if($result)
           {
               $post_id = $result['post_id'];
               $images = $this->Contractor_model->getpostimages($post_id);
            $i=0;
            foreach($images as $img)
            {  
                $result['images'][$i] = base_url('uploads/userPost/'.$img['images']);
                $i++;
            }
            $aoi = $this->Contractor_model->getTenderAoi($post_id);
            $i=0;
            foreach($aoi as $a)
            {  
                $result['aoi'][$i] = $a['aoi_desc'];
                $i++;
            }
            
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data loaded' , 'data' => $result]));
           }
           else
           {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'data not found' , 'data' => 'data not found']));
           }
       }
       
       if($type == 'sub_contractor' || $type == 'labour')
       {
           $result = $this->Contractor_model->marketusersDetails($id,$type);
           if($result)
           {
              if($type == 'sub_contractor')
              {
                  $uploads = 'subcontractorDetails';
                  $detail_id = $result['sub_cont_details_id'];
                  $project = $this->Contractor_model->getProjectDetails($id);
                   $i=0;
            foreach($project as $pro)
            {
                $project_id = $pro['project_id'];
                $img = $this->Contractor_model->getprojectimages($project_id);
                
                if(!empty($img))
                {
                    $result['project'][$i]['image'] = base_url('uploads/contractorProject/'.$img['images']);
                   
                }
                $images = $this->Contractor_model->getallprojectImages($project_id);
              $result['project'][$i]['name'] = $pro['name'];
              $result['project'][$i]['location_id'] = $pro['location_id'];
              $result['project'][$i]['project_id'] = $pro['project_id'];
              $result['project'][$i]['location'] = $pro['location'];
              $j=0;
              foreach($images as $image)
              {
                  $image = $image['images'];
                  if(!empty($image))
                  {
                    $result['project'][$i]['project_images'][$j] = base_url('uploads/contractorProject/'.$image);   
                  }else{
                     $result['project'][$i]['project_images'][$j] =''; 
                  }
                $j++;
              }
                $i++;
            }
                   $qualifications = $this->Contractor_model->subcontractorQualifications($id);
                   $i=1;
            
                    foreach($qualifications as $quali)
                    {  
                        $result['qualifications'.$i] = $quali['qualification'];
                        $i++;
                    }
                   
                  
                  $reviews = $this->Contractor_model->subcontractorReviews($id);
                   $i=0;
              foreach($reviews as $review)
              {
               $result['reviews'][$i]['image'] = base_url('uploads/contractorDetails/'.$review['image']);
               $result['reviews'][$i]['name'] = $review['name'];
               $result['reviews'][$i]['review'] = $review['msg'];
               $result['reviews'][$i]['rating'] = $review['rating'];
                $result['reviews'][$i]['date'] = '';
              $i++;   
              }
                  
              }
               else if($type == 'labour')
               {
                   $review_tender = $this->Contractor_model->LabourReview($id);
                $i=0;
                  foreach($review_tender as $review)
                  {
                      $type = $review['sender_type'];
                      $user_id= $review['sender_id'];
                    
                      if($type == 'tender')
                      {
                        $tender = $this->Contractor_model->getTenderdetails($user_id);
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
                          $contractor = $this->Contractor_model->getContractordetails($user_id);
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
                        $sub_contractor = $this->Contractor_model->getsubcontDetails($user_id);
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
                  $project = $this->Contractor_model->getLabourProjectDetails($id);
                  $i=0;
                  foreach($project as $pro)
                  {
                      $project_id = $pro['labour_post_id'];
                      $img = $this->Contractor_model->getlabourprojectimage($project_id);
                      if(!empty($img))
                        {
                            $result['project'][$i]['image'] = base_url('uploads/labourPost/'.$img['images']);
                         }
                         $images = $this->Contractor_model->getallLabourprojectImages($project_id);
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
                                $result['project'][$i]['project_images'][$j] = base_url('uploads/labourPost/'.$image);   
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
       if($type == 'equipment')
       {
           $result = $this->Contractor_model->getequipmentlistsbyid($id);
               $supplier_equip_id = $result['supplier_equip_id'];
               $type = $result['type'];
               if($type == 'sell')
               {
                   $result['type'] = 'buy';
               }
            $img = $this->Contractor_model->getequipmentimgdetails($supplier_equip_id);
            // print_r($img);die;
            if(!empty($img))
            {
                $result['image']=base_url('uploads/supplierPost/'.$img['images']);
            }
            else
            {
                $result['image']= '';
            }
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
       }
       
       if($type == 'material')
       {
           $result = $this->Contractor_model->getmaterialListsbyid($id);
                   $supplier_mat_id = $result['supplier_mat_id'];
                   $img = $this->Contractor_model->getmaterialimgdetails($supplier_mat_id);
                   if(!empty($img))
                   {
                       $result['image']=base_url('uploads/supplierPost/'.$img['images']);
                   }
                   else
                   {
                       $result['image']='';
                   }
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
       }
   }
   
       public function homescreensearch()
   {
       $this->output->set_content_type('application/json');
       $type = $this->input->post('type');
       $field = $this->input->post('field');
       if($type == 'sub_contractor' || $type == 'labour')
       {
          $result = $this->Contractor_model->homescreenSearch($field,$type);
           $i=0;
           if($result)
           {
               foreach($result as $res)
               {
                    $market_user_id = $res['market_user_id'];
                    $rating = $this->Contractor_model->ratings($market_user_id,$type);
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
               
                 $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));  
           }
           else
           {
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));  
           }
       }
       
       if($type == 'equipment')
       {
           $result = $this->Contractor_model->equipmentSearch($field);
            $i=0;
            foreach($result as $res)
            {
               $id = $res['supplier_equip_id'];
               $type = $res['type'];
               if($type == 'sell')
               {
                   $result[$i]['type'] = 'buy';
               }
            $img = $this->Contractor_model->getequipmentimg($id);
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
       {     $result = $this->Contractor_model->materialSearch($field);
               $i=0;
               foreach($result as $res)
               {
                   $id = $res['supplier_mat_id'];
                   $img = $this->Contractor_model->getmaterialimg($id);
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
   
  public function getProfileData()
  {
      $this->output->set_content_type('application/json');
      $contractor_id = $this->input->post('contractor_id');
      $result = $this->Contractor_model->getProfileData($contractor_id);
     if($result)
      {
          $qualification = $this->Contractor_model->getProfilequalification($contractor_id);
           $i=1;
            foreach($qualification as $quali)
            {  
                $result['qualifications'.$i] = $quali['qualification'];
                $i++;
            }
            $location = $this->Contractor_model->getProfileLocation($contractor_id);
            $i=0;
            foreach($location as $loc)
            {  
                $result['locations'][$i]['location'] = $loc['location'];
                $result['locations'][$i]['location_id'] = $loc['location_id'];
                $i++;
            }
            $aoi = $this->Contractor_model->getProfileaoi($contractor_id);
            $i=0;
            
            foreach($aoi as $a)
            {  
                $result['aoi'][$i]['aoi_desc'] = $a['aoi_desc'];
                $result['aoi'][$i]['aoi_desc_id'] = $a['aoi_desc_id'];
                $i++;
            }
            $project = $this->Contractor_model->getProjectDetails($contractor_id);
            // print_r($project);die;
            $i=0;
            foreach($project as $pro)
            {
                $project_id = $pro['project_id'];
                $img = $this->Contractor_model->getprojectimages($project_id);
                // print_r($img);die;
                if(!empty($img))
                {
                    $result['project'][$i]['image'] = base_url('uploads/contractorProject/'.$img['images']);
                    $result['project'][$i]['images'] = base_url('uploads/contractorProject/'.$img['images']);
                }
              $result['project'][$i]['name'] = $pro['name'];
              $result['project'][$i]['location_id'] = $pro['location_id'];
              $result['project'][$i]['project_id'] = $pro['project_id'];
              $result['project'][$i]['location'] = $pro['location'];
                
                $i++;
            }
          if(!empty($result['image']))
          {
          $result['image']=base_url('uploads/contractorDetails/'.$result['image']);    
          }else
          {
              $result['image']= '';
          }
          $result['statutory']=base_url('uploads/contractorDetails/'.$result['statutory']);
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
      $contractor_id = $this->input->post('contractor_id');
      $name = $this->input->post('name');
      $company_name = $this->input->post('company_name');
        $capablity = $this->input->post('capability');
        $work_exp = $this->input->post('work_exp');
        $cost_range = $this->input->post('cost_range');
        
        $location = $this->input->post('location');
        $location = explode(',',$location);
        $aoi  = $this->input->post('aoi_desc');
        $aoi = explode(',',$aoi);
        $qualification = $this->input->post('qualification');
        $qualification = explode(',',$qualification);
        $link = $this->input->post('link');
        $res = $this->Contractor_model->getmedia($contractor_id);
        if(!empty($_FILES['file1']['name'])){
            $file1=$this->doUpdateFile('file1');
        }else{
            $file1=$res['image'];
        }
        if(!empty($_FILES['file2']['name']))
        {
            $file2 = $this->doUpdateFile('file2');
        }
        else
        {
            $file2 = $res['statutory'];
        }
        $this->Contractor_model->delLocations($contractor_id);
        $this->Contractor_model->delqualifications($contractor_id);
        $this->Contractor_model->delaoi($contractor_id);
        $result = $this->Contractor_model->contractorDetailsupdate($name,$contractor_id,$company_name,$capablity,$aoi,$work_exp,$cost_range,$file1,$file2,$link);
        if($result)
        {
            foreach($qualification as $qualify)
            {
                $qualify = $this->Contractor_model->contractorQualification($qualify,$contractor_id);
            }
            foreach($location as $loc)
            {
                $location = $this->Contractor_model->contracterLocation($loc,$contractor_id);
            }
            foreach($aoi as $a)
             {
                 $this->Contractor_model->contractoraoi($a,$contractor_id);
             }
             
             
             $img = $result['image'];
            // print_r($img);die;
            if(!empty($img))
            {
                 $result['image'] = base_url('uploads/contractorDetails/'.$img);
            }
            else
            {
                $result['image'] = '';
            }
             
             $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Profile Updated' ,'data' => $result]));
            return false;
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Profile Updation Failed' ,'data' => 'Profile Updation Failed']));
            return false;
        }
  }
  
  public function doUpdateFile($file)
    {
        $file1 = $_FILES['file1']['name'];
        $config['upload_path'] = './uploads/contractorDetails/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
       // $config['max_filename'] = '2555';
        $config['file_name'] = rand();
        $this->upload->initialize($config);
        $this->upload->do_upload($file);
        $upload_data = $this->upload->data();
        return $upload_data['file_name'];
    }
    
    public function changePass()
    {  
        $this->output->set_content_type('application/json');
        $contractor_id = $this->input->post('contractor_id');
        $old_pass = $this->input->post('old_pass');
        $new_pass  = $this->input->post('new_pass');
        $c_pass  = $this->input->post('c_pass');
        $checkold = $this->Contractor_model->checkold($old_pass,$contractor_id);
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
                  
                  $result = $this->Contractor_model->changePass($contractor_id,$old_pass,$new_pass);
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
    
    public function response()
   {
       $this->output->set_content_type('application/json');
    //   $user_id = $this->input->post('user_id');
    //   $contractor_id = $this->input->post('contractor_id');
       $id = $this->input->post('id');
       $response = $this->input->post('response');
       if($response == '1')
       {
              $result = $this->Contractor_model->accept($id);
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
         $result = $this->Contractor_model->reject($id);
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
   
   public function searchbyLocation()
  {
     $this->output->set_content_type('application/json');
     $field = $this->input->post('field');
     $result['contractor'] = $this->Contractor_model->contractorbyLocation($field);
     $result['labour'] = $this->Contractor_model->labourbyLocation($field);
     $result['equipment'] = $this->Contractor_model->equipmentbyLocation($field);
     $result['material'] = $this->Contractor_model->materialbyLocation($field);
     $result['tender'] = $this->Contractor_model->tenderbyLocation($field);
     if($result)
     {
         $i=0;
          foreach($result['contractor'] as $contractor)
          {
              $result['contractor'][$i]['image'] = base_url('uploads/contractorDetails/'.$contractor['image']);
                $i++;
          }
          
          $i=0;
          foreach($result['labour'] as $labour)
          {
              $result['labour'][$i]['image'] = base_url('uploads/labour/'.$labour['image']);
                $i++;
          }
          
           $i=0;
               foreach($result['tender'] as $tender)
               {
                   if(!empty($tender['image']))
                   {
                       $result['tender'][$i]['image'] = base_url('uploads/tenderuser/'.$tender['image']);
                   }else
                   {
                       $result['tender'][$i]['image'] = '';
                   }
                    
                    $result['tender'][$i]['type'] = 'tender';
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
            $img = $this->Contractor_model->getequipmentimg($id);
            // print_r($img);die;
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
                   $img = $this->Contractor_model->getmaterialimg($id);
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
         
         $final = array_merge($result['contractor'],$result['labour'],$result['equipment'],$result['material'],$result['tender']); 
         $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));
     }
     else
     {
         $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data not found' , 'data' => 'data not found']));
     }
  }
  
  
   public function searching()
   {
      $this->output->set_content_type('application/json');
      $field = $this->input->post('field');
      $type = $this->input->post('type');
      if($type == 'contractor')
      {
           $result['labour'] = $this->Contractor_model->laboursearching($field);
          $result['equipment'] = $this->Contractor_model->equipmentSearch($field);
          $result['material'] = $this->Contractor_model->materialSearch($field);
          $result['tender'] = $this->Contractor_model->tenderSearch($field);
          $result['sub_contractor'] = $this->Contractor_model->sub_contractorSearch($field);
      
      
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
               
            $img = $this->Contractor_model->getequipmentimg($id);
            // print_r($img);die;
            if(!empty($img))
            {
                $result['equipment'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
            }
            else
            {
                $result['equipment'][$i]['image']= '';
            }
            
            $result['equipment'][$i]['type'] = $res['type'];
            // $result['equipment'][$i]['equipment_type'] = $res['type'];
            
            $i++;
            }
          
        $i=0;
               foreach($result['material'] as $material)
               {
                   $id = $material['supplier_mat_id'];
                   $img = $this->Contractor_model->getmaterialimg($id);
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
               
               $i=0;
               foreach($result['tender'] as $tender)
               {
                    $result['tender'][$i]['image'] = base_url('uploads/tenderuser/'.$tender['image']);
                    $result['tender'][$i]['type'] = 'tender';
                $i++;
                   
               }
               
                $i=0;
               foreach($result['sub_contractor'] as $sub_contractor)
               {
                   $result['sub_contractor'][$i]['image'] = base_url('uploads/subcontractorDetails/'.$sub_contractor['image']);
                $i++;
                   
               }
           
          $final = array_merge($result['labour'],$result['equipment'],$result['material'],$result['tender'],$result['sub_contractor']);
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));
      }
      else
      {
          $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Not Found' , 'data' => 'Not Found']));
      }
      }
      
      if($type == 'sub_contractor')
      {
        //   $result['contractors'] = $this->Contractor_model->contractorsearching($field);
          $result['labour'] = $this->Contractor_model->laboursearching($field);
          $result['equipment'] = $this->Contractor_model->equipmentSearch($field);
          $result['material'] = $this->Contractor_model->materialSearch($field);
        //   $result['tender'] = $this->Contractor_model->tenderSearch($field);
        //   $result['sub_contractor'] = $this->Contractor_model->sub_contractorSearch($field);
      
      
      if($result)
      {   $i=0;
          foreach($result['labour'] as $labour)
          {
              $result['labour'][$i]['image'] = base_url('uploads/labour/'.$labour['image']);
                $i++;
          }
          $i=0;
            foreach($result['equipment'] as $res)
            {
               $id = $res['supplier_equip_id'];
               
            $img = $this->Contractor_model->getequipmentimg($id);
            // print_r($img);die;
            if(!empty($img))
            {
                $result['equipment'][$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
            }
            else
            {
                $result['equipment'][$i]['image']= '';
            }
            
            $result['equipment'][$i]['type'] = $res['type'];
            // $result['equipment'][$i]['equipment_type'] = $res['type'];
            
            $i++;
            }
          
        $i=0;
               foreach($result['material'] as $material)
               {
                   $id = $material['supplier_mat_id'];
                   $img = $this->Contractor_model->getmaterialimg($id);
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
          $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Not Found' , 'data' => 'Not Found']));
      }
          
      }
   }
   
   public function contractor_equip_contact()
   {
        $this->output->set_content_type('application/json');
        $market_user_id = $this->input->post('market_user_id');
    $equip_id = $this->input->post('equip_id');
    $title = $this->input->post('title');
    $location = $this->input->post('location_id');
    $startdate = $this->input->post('start_date');
    $enddate = $this->input->post('end_date');
    $desc = $this->input->post('desc');
    
    $result = $this->Contractor_model->contractor_equip_contact($market_user_id,$equip_id,$title,$location,$startdate,$enddate,$desc);
    if($result)
    {
        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
    }
    else
    {
        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
    }
   }
   
   public function contractor_material_contact()
   {
       $this->output->set_content_type('application/json');
       $market_user_id = $this->input->post('market_user_id');
      $material_id = $this->input->post('material_id');
      $title = $this->input->post('title');
      $location = $this->input->post('location_id');
      $desc = $this->input->post('desc');
      $result = $this->Contractor_model->user_material_contact($market_user_id,$material_id,$title,$location,$desc);
      if($result)
      {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
      }
      else
      {
          $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
      }
   }
   
   public function contractor_equip_buy()
   {
      $this->output->set_content_type('application/json');
      $market_user_id = $this->input->post('market_user_id');
      $equip_id = $this->input->post('equip_id');
      $title = $this->input->post('title');
      $location = $this->input->post('location_id');
      $desc = $this->input->post('desc');
      $result = $this->Contractor_model->contractor_equip_buy($market_user_id,$equip_id,$title,$location,$desc);
      if($result)
      {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
      }
      else
      {
          $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
      }
   }
   
   public function reviews()
   {
     $this->output->set_content_type('application/json');
     $sender_id = $this->input->post('sender_id');
     $reciever_id  = $this->input->post('reciever_id');
     $sender_type = $this->input->post('sender_type');
     $reciever_type  = $this->input->post('reciever_type');
     $msg = $this->input->post('review');
     $rating = $this->input->post('rating');
     $result = $this->Contractor_model->reviews($sender_id,$reciever_id,$sender_type,$reciever_type,$msg,$rating);
     if($result)
     {
         $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Review Submitted' , 'data' => 'Review Submitted']));
     }else
     {
        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Submit' , 'data' => 'Failed to Submit'])); 
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
      if($type == 'sub_contractor')
      {
        $result  = $this->Contractor_model->sub_contractor($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter);
        if($result)
        {
             $i=0;
          foreach($result as $res)
          {
               $market_user_id = $res['market_user_id'];
                $rating = $this->Contractor_model->ratings($market_user_id,$type);
                
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
                  $result[$i]['image']=base_url('uploads/subcontractorDetails/'.$res['image']);
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
        }else
        {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not Found' , 'data' => []]));
      return FALSE; 
        }
      }
      if($type == 'labour')
      {
         $result  = $this->Contractor_model->labour_filter($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter);
         if($result)
          {
            $i=0;
          foreach($result as $res)
          {
               $market_user_id = $res['market_user_id'];
                $rating = $this->Contractor_model->ratings($market_user_id,$type);
                
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
         $result  = $this->Contractor_model->equipment_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter);
        if($result)
        {
            $i=0;
            foreach($result as $res)
            {  $market_user_id = $res['market_user_id'];
                $getType = $this->Contractor_model->getType($market_user_id);
                $type = $getType['type'];
                if($type == 'sub_contractor')
                { 
                     $img = $this->Contractor_model->sub_contractorimg($market_user_id);
                     
                     if(!empty($img['image']))
                     {
                         $result[$i]['image']= base_url('uploads/subcontractorDetails/'.$img['image']);
                     }else
                     {
                       $result[$i]['image']= '';  
                     }
                } 
                if($type == 'supplier')
                {
                   $img = $this->Contractor_model->supplierimg($market_user_id);
                     if(!empty($img['image']))
                     {
                         $result[$i]['image']= base_url('uploads/supplier/'.$img['image']);
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
        $result  = $this->Contractor_model->material_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter);
         if($result)
         {
             $i=0;
            foreach($result as $res)
            {
                 $market_user_id = $res['market_user_id'];
                $getType = $this->Contractor_model->getType($market_user_id);
                $type = $getType['type'];
                if($type == 'sub_contractor')
                { 
                     $img = $this->Contractor_model->sub_contractorimg($market_user_id);
                     
                     if(!empty($img['image']))
                     {
                         $result[$i]['image']= base_url('uploads/subcontractorDetails/'.$img['image']);
                     }else
                     {
                       $result[$i]['image']= '';  
                     }
                     
                } 
                if($type == 'supplier')
                {
                   $img = $this->Contractor_model->supplierimg($market_user_id);
                     if(!empty($img['image']))
                     {
                         $result[$i]['image']= base_url('uploads/supplier/'.$img['image']);
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
   
   public function subscriptionPlans()
   {
       $this->output->set_content_type('application/json');
       $contractor_id = $this->input->post('market_user_id');
       $type = $this->input->post('type');
       $result = $this->Contractor_model->subscriptionPlans($type);
       if($result)
       {
           $plan_type = $this->Contractor_model->getPlanType($contractor_id);
           $this->output->set_output(json_encode(['plan_type'=>$plan_type['plan_type'],'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
      return FALSE;
       }else{
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not Found' , 'data' => []]));
      return FALSE;
       }
       
   }
   
   public function projectDetails()
   {
       $this->output->set_content_type('application/json');
       $market_user_id = $this->input->post('market_user_id');
       $project = $this->Contractor_model->getProjectDetails($market_user_id);
    
        if($project)
        {
            
            $i=0;
            foreach($project as $pro)
            {
                $project_id = $pro['project_id'];
                $img = $this->Contractor_model->getprojectimages($project_id);
                // print_r($img);die;
                if(!empty($img))
                {
                    $project[$i]['image'] = base_url('uploads/contractorProject/'.$img['images']);
                    // $project[$i]['images'] = base_url('uploads/contractorProject/'.$img['images']);
                }
              $project[$i]['name'] = $pro['name'];
              $project[$i]['location_id'] = $pro['location_id'];
              $project[$i]['project_id'] = $pro['project_id'];
              $project[$i]['location'] = $pro['location'];
                
                $i++;
            }
            
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $project]));
      return FALSE;
            
        }else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not Found' , 'data' => []]));
      return FALSE;
            
        }
   }
    
    public function forgetPass()
    {
        $this->output->set_content_type('application/json');
        $email = $this->input->post('email');
        $newpass = rand('111111','999999');
        $checkmail = $this->Contractor_model->checkmail($email);
        if($checkmail)
        {
            $updatePass = $this->Contractor_model->updatePass($email,$newpass);
            //email
            if($updatePass)
            {
                $this->load->library('email');
                $this->email->set_mailtype("html");
                $this->email->from('info@build.com');
                $this->email->to($email);
                $this->email->subject('New Password');
                $htmlContent = '<p>Your New Password for Your Account is : '.$newpass.'</p>';
                $this->email->message($htmlContent);
                //Send email
                $res = $this->email->send();
                if ($res) {
                    $this->output->set_output(json_encode(['result' => 1, 'msg' =>'New Password send to your email' , 'data' => 'New Password send to your email']));
                } else {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Error', 'data' => 'Error']));
                }
            }
        }
        else
        {
            $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Email Id not Registered' ,'data' => 'Email Id not Registered']));
            return false;
        }
    }
    
    public function payment()
    {
        $this->output->set_content_type('application/json');
        $market_user_id = $this->input->post('market_user_id');
        $txn_id = $this->input->post('txn_id');
        $type = $this->input->post('type');
        $price = $this->input->post('price');
        $user_type = $this->input->post('user_type');
        $payment = $this->Contractor_model->insertPaymentDetails($market_user_id,$txn_id,$type,$price,$user_type);
        if($payment)
        {
            if($user_type == 'contractor')
            {
              $result = $this->Contractor_model->planupdates($type,$market_user_id);    
            }
            if($user_type == 'supplier')
            {
              $result =  $this->Contractor_model->supplierplanupdate($market_user_id);
            }
            if($user_type == 'sub_contractor')
            {
              $result = $this->Contractor_model->sub_contractorplanupdate($market_user_id); 
            }
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Added' , 'data' => $result]));
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to add', 'data' => 'Failed to add']));
        }
     }
}
