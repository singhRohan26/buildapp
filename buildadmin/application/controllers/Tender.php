    <?php

defined('BASEPATH') OR die('Not Allowed');

class Tender extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Tender_model']);
    }

    
    public function Registration()
    {
       $this->output->set_content_type('application/json');
       $key = $this->input->post('key');
       $name = $this->input->post('name');
       $email  = $this->input->post('email');
       $phone  = $this->input->post('phone');
       $pass = $this->input->post('pass');
       $cpass = $this->input->post('c_pass');
       $unique_id = rand('111111','999999');
       if($key == 1)
       {
           //registeration
           
                    $checkmail = $this->Tender_model->checkmail($email);
                    if($checkmail)
                    {
                        $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Email already exist' ,'data' => 'email already exist']));
                        return false;
                        
                    }
                    else
                    {
                        if($pass == $cpass)
                        {
                                    $result = $this->Tender_model->signUp($name,$email,$phone,$pass,$unique_id);
                                if($result)
                                {
                                    $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Registration Sucess' ,'data' => $result]));
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
                            $this->output->set_output(json_encode(['result' => -3, 'msg' => 'Password Mismatched' ,'data' => 'Password Mismatched']));
                                return false;
                        }
                    }
                    }
       else
       {  //login
           $result = $this->Tender_model->Login($email,$pass);
           if($result)
           {
               $img = $result['image'];
               if(!empty($img))
               {
                  $result['image'] = base_url('uploads/tenderuser/'.$result['image']); 
               }
               else
               {
                   $result['image'] = ''; 
               }
               
               
               $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Login Sucess' ,'data' => $result]));
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
       $checkmail = $this->Tender_model->checkmail($email);
       $unique_id = rand('111111','999999');
       if($checkmail)
       {
              $userid = $checkmail['user_id'];
              $image = $this->Tender_model->getprofileimg($userid);
            //   print_r($image);die;
                if(!empty($image['image'])){
                    $checkmail['image'] = base_url('uploads/tenderuser/'.$image['image']);
                }else{
                    $checkmail['image'] = null;
                }
           $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Login Success', 'data' => $checkmail]));
            return false; 
       }
       else
       {
            $result = $this->Tender_model->LoginwithFacebook($name,$email,$unique_id,$phone=null,$password=null);
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
    
    public function forgetPass()
    {
        $this->output->set_content_type('application/json');
        $email = $this->input->post('email');
        $newpass = rand('111111','999999');
        $checkmail = $this->Tender_model->checkmail($email);
        if($checkmail)
        {
            $updatePass = $this->Tender_model->updatePass($email,$newpass);
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
    
    public function updateProfile()
    {
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        
        if(!empty($_FILES['image_url']['name']))
                {
                    $file = $_FILES['image_url']['name'];
                $ext = pathinfo($file,PATHINFO_EXTENSION);
                $fnn = rand().'.'.$ext;
                $config['upload_path'] = './uploads/tenderuser/';
                $config['allowed_types'] = 'gif|jpg|png|mp4|jpeg|';
                $config['file_name']  = $fnn;
                $this->upload->initialize($config);
                if($this->upload->do_upload('image_url'))
               { 
                   $result = $this->Tender_model->doupdateprofileimg($name,$email,$phone,$fnn,$user_id);
                    if($result)
                    {
                        $img = $result['image'];
                        if(!empty($img))
                        {
                        $result['image'] = base_url('uploads/tenderuser/'.$result['image']);    
                        }
                        else
                        {
                            $result['image'] = 'null';
                        }
                        
                        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Profile Updated' , 'data' => $result]));
                    }
                    else
                    {
                        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Update Profile' , 'data' => 'Failed to Update Profile']));
                    }
                    
                }
                   
                }
            else
            {                                                      
                $result = $this->Tender_model->doupdateprofile($name,$email,$phone,$user_id);
              
                if($result)
                    {
                        $img = $result['image'];
                       if(!empty($img))
                        {
                        $result['image'] = base_url('uploads/tenderuser/'.$result['image']);    
                        }
                        else
                        {
                            $result['image'] = null;
                        }
                        
                        
                           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Profile Updated' , 'data' => $result]));        
                    }
                    else
                    {
                        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Update' , 'data' => 'Failed to Update']));
                    }
            } 
    }
    
    public function changePass()
    {
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $old_pass = $this->input->post('old_pass');
        $new_pass  = $this->input->post('new_pass');
        $c_pass  = $this->input->post('c_pass');
        $checkold = $this->Tender_model->checkold($old_pass,$user_id);
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
                  
                  $result = $this->Tender_model->changePass($user_id,$old_pass,$new_pass);
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
    
    
    // user post requirement
    
    public function addPost()
    {
        $this->output->set_content_type('application/json');
        $user_id = $this->input->post('user_id');
        $title = $this->input->post('title');
        $plot_area = $this->input->post('plot_area');
        $cost_to = $this->input->post('cost_to');
        $cost_from = $this->input->post('cost_from');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $quality = $this->input->post('quality');
        $desc = $this->input->post('desc');
        $location = $this->input->post('location_id');
        // $aoi = $this->input->post('aoi');
        $aoi_desc  = $this->input->post('aoi_desc');
        $aoi_desc = explode(',',$aoi_desc);
        $built_up = $this->input->post('built_up');
        // $location = explode(',',$location);
        $status = $this->input->post('status');
        $result = $this->Tender_model->addPost($user_id,$title,$plot_area,$cost_to,$cost_from,$start_date,$end_date,$quality,$desc,$status,$location,$built_up);
        if($result)
        {
            $post_id  = $result;
            foreach($aoi_desc as $aoi)
            {
                $this->Tender_model->postaoi($aoi,$post_id);
            }
            $this->addpostImages($post_id);
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Added Sucessfully' , 'data' => $result]));
        }
        else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Update' , 'data' => 'Failed to Update']));
        }
    }
    
    
    public function addpostImages($post_id)
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
                $this->upload->initialize($this->addpostImagesoptions());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Tender_model->postImages($data['file_name'],$post_id);
            }
            }else if($key == 'media_url'){
                
            for ($s = 0; $s < $count_media; $s++) {
                // echo "hiiqqqi";die;
                $_FILES['media_url']['name'] = $value['name'][$s];
                $_FILES['media_url']['type'] = $value['type'][$s];
                $_FILES['media_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['media_url']['error'] = $value['error'][$s];
                $_FILES['media_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->addpostImagesoptions());
                $this->upload->do_upload('media_url');
                $data = $this->upload->data();
                // echo $data['file_name'];die;
                $this->Tender_model->postImages($data['file_name'],$post_id);
            }
            }
        }
        
        //Multiple Images 
    }
    
    
    private function addpostImagesoptions() {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/userPost/';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|mp4';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);

        return $config;
    }
    // user post requirement
   public function user_contractor_contact()
   {
       $this->output->set_content_type('application/json');
       $user_id = $this->input->post('user_id');
       $contractor_id = $this->input->post('contractor_id');
       $title = $this->input->post('title');
       $plot_area = $this->input->post('plot_area');
       $built_up = $this->input->post('built_up');
       $costTo = $this->input->post('cost_to');
       $costFrom = $this->input->post('cost_from');
       $startdate = $this->input->post('start_date');
       $enddate = $this->input->post('end_date');
       $quality = $this->input->post('quality');
       $location = $this->input->post('location_id');
       $desc = $this->input->post('desc');
    //   $location = explode(',',$location);
       $result = $this->Tender_model->user_contractor_contact($user_id,$contractor_id,$title,$plot_area,$built_up,$costTo,$costFrom,$startdate,$enddate,$quality,$location,$desc);
       if($result)
       {
           $ucc_id = $result;
           
           $this->user_contractor_multiple($ucc_id);
           
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
       } 
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
       }
   }
   
   public function user_contractor_multiple($ucc_id)
    {
        $this->output->set_content_type('application/json');
        //Multiple Images
           $this->load->library('upload');
                 $count = count($_FILES['image_url']['size']);
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
                $this->upload->initialize($this->usercontractor_multipleimages());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Tender_model->user_contractor_multiple($data['file_name'],$ucc_id);
            }
            }
        }
        //Multiple Images 
    }
    
    private function usercontractor_multipleimages()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/user-contractor-contact/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['overwrite'] = TRUE;
        $config['file_name'] = rand(11111, 99999);
        return $config;
    }
   
   public function user_labour_contact()
   {
       $this->output->set_content_type('application/json');
       $user_id = $this->input->post('user_id');
       $labour_id = $this->input->post('labour_id');
       $title = $this->input->post('title');
       $startdate = $this->input->post('start_date');
       $enddate = $this->input->post('end_date');
       $desc = $this->input->post('desc');
       $location = $this->input->post('location_id');
    //   $location = explode(',',$location);
       $result = $this->Tender_model->user_labour_contact($user_id,$labour_id,$title,$startdate,$enddate,$desc,$location);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
       }
       
   }
   
   public function user_equip_contact()
   {
    $this->output->set_content_type('application/json');
    $user_id = $this->input->post('user_id');
    $equip_id = $this->input->post('equip_id');
    $title = $this->input->post('title');
    $location = $this->input->post('location_id');
    $startdate = $this->input->post('start_date');
    $enddate = $this->input->post('end_date');
    $desc = $this->input->post('desc');
    
    $result = $this->Tender_model->user_equip_contact($user_id,$equip_id,$title,$location,$startdate,$enddate,$desc);
    if($result)
    {
        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
    }
    else
    {
        $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
    }
   }
   
   public function user_material_contact(){
      $this->output->set_content_type('application/json');
      $user_id = $this->input->post('user_id');
      $material_id = $this->input->post('material_id');
      $title = $this->input->post('title');
      $location = $this->input->post('location_id');
      $desc = $this->input->post('desc');
      $quantity = $this->input->post('quantity');
      
      $result = $this->Tender_model->user_material_contact($user_id,$material_id,$title,$location,$desc,$quantity);
      if($result)
      {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
      }
      else
      {
          $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
      }
      
   }
   
   public function user_equip_buy()
   {
      $this->output->set_content_type('application/json');
      $user_id = $this->input->post('user_id');
      $equip_id = $this->input->post('equip_id');
      $title = $this->input->post('title');
      $location = $this->input->post('location_id');
      $desc = $this->input->post('desc');
      $result = $this->Tender_model->user_equip_buy($user_id,$equip_id,$title,$location,$desc);
      if($result)
      {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Request Sent Sucessfully' , 'data' => $result]));
      }
      else
      {
          $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Send' , 'data' => 'Failed to Send']));
      }
   }
   
   public function homescreenListing()
   {
       $this->output->set_content_type('application/json');
       $id = $this->input->post('id');
       $type = $this->input->post('type');
       if($type == 'contractor' || $type == 'labour')
       {
          $result = $this->Tender_model->homescreenListing($type,$id);
        //   print_r($result);die;
       $i=0;
       if($result)
       {
            foreach($result as $res)
           {
                $market_user_id = $res['market_user_id'];
                $rating = $this->Tender_model->ratings($market_user_id,$type);
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
           $count = (string)$this->Tender_model->marketplaceCount($type);
          $this->output->set_output(json_encode(['count'=>$count,'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
       }
       else
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not Found' , 'data' => 'Data not Found']));
       }
     }
       else
       {
           if($type == 'equipment')
           {
            $result = $this->Tender_model->getequipmentlists($id);
            $count = (string)$this->Tender_model->supplierequipCount();
            $i=0;
            foreach($result as $res)
            {
               $id = $res['supplier_equip_id'];
               $market_user_id = $res['market_user_id'];
               
               $equipmentRatings = $this->Tender_model->equipmentRatings($market_user_id);
               if(!empty($equipmentRatings)){
                       $result[$i]['rating'] = round($equipmentRatings['rating'],1);
                       $result[$i]['rating_count'] = $equipmentRatings['rating_count'];
               }else{
                   $result[$i]['rating'] = '0';
                   $result[$i]['rating_count'] = '0';
               }
               $type = $res['type'];
               if($type == 'sell')
               {
                   $result[$i]['type'] = 'buy';
               }
            $img = $this->Tender_model->getequipmentimg($id);
            
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
               $result = $this->Tender_model->getmaterialLists($id);
               $count = (string)$this->Tender_model->suppliermatCount();
               $i=0;
               foreach($result as $res)
               {
                   $id = $res['supplier_mat_id'];
                   $img = $this->Tender_model->getmaterialimg($id);
                   if(!empty($img))
                   {
                       $result[$i]['image']=base_url('uploads/supplierPost/'.$img['images']);
                   }
                   else
                   {
                       $result[$i]['image']='';
                   }
                   
                   $result[$i]['type']='material';
                   
                   $i++;
               }
               
               $this->output->set_output(json_encode(['count'=>$count,'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
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
       $result = $this->Tender_model->marketusersDetails($market_user_id,$type);
       if($result)
       {
           if($type == 'contractor'){
                   
                   $uploads = 'contractorDetails';
                   //project starts
                   $project = $this->Tender_model->getProjectDetails($market_user_id);
            $i=0;
            foreach($project as $pro)
            {
                $project_id = $pro['project_id'];
                $img = $this->Tender_model->getprojectimages($project_id);
                
                if(!empty($img))
                {
                    $result['project'][$i]['image'] = base_url('uploads/contractorProject/'.$img['images']);
                   
                }
                $images = $this->Tender_model->getallprojectImages($project_id);
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
              //project ends
              $reviews = $this->Tender_model->contractorReview($market_user_id);
            $i=0;
              foreach($reviews as $review)
              {
               $result['reviews'][$i]['image'] = base_url('uploads/tenderuser/'.$review['image']);
               $result['reviews'][$i]['name'] = $review['name'];
               $result['reviews'][$i]['review'] = $review['msg'];
               $result['reviews'][$i]['rating'] = $review['rating'];
               $result['reviews'][$i]['date'] = '';
              $i++;   
              }
              $qualifications = $this->Tender_model->contractorQualifications($market_user_id);
              $i=1;
            foreach($qualifications as $quali)
            {  
                $result['qualifications'.$i] = $quali['qualification'];
                $i++;
            }
              $result['user_type'] = 'contractor';
              
               }
              else if($type == 'sub_contractor')
              {
                  $uploads = 'subcontractorDetails';
              }
               else if($type == 'labour')
               {
                  $review_tender = $this->Tender_model->LabourReview($market_user_id);
                
                $i=0;
                  foreach($review_tender as $review)
                  {
                      $type = $review['sender_type'];
                      $id= $review['sender_id'];
                    
                      if($type == 'tender')
                      {
                        $tender = $this->Tender_model->getTenderdetails($id);
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
                          $contractor = $this->Tender_model->getContractordetails($id);
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
                        $sub_contractor = $this->Tender_model->getsubcontDetails($id);
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
                  
                  $project = $this->Tender_model->getLabourProjectDetails($market_user_id);
                //   print_r($project);die;
                  $i=0;
                  foreach($project as $pro)
                  {
                      $project_id = $pro['labour_post_id'];
                      $img = $this->Tender_model->getlabourprojectimage($project_id);
                      if(!empty($img))
                        {
                            $result['project'][$i]['image'] = base_url('uploads/labourPost/'.$img['images']);
                         }
                         $images = $this->Tender_model->getallLabourprojectImages($project_id);
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
                   $result['user_type'] = 'labour';
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
              
              $this->output->set_output(json_encode(['plan_type'=>$result['plan_type'],'result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
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
            //   print_r("hello");die;
            $result = $this->Tender_model->getequipmentlistsbyid($market_user_id);
            // print_r($result);die;
            if($result)
            {
                $id = $result['supplier_equip_id'];
               $type = $result['type'];
            
               if($type == 'sell')
               {
                   $result['type'] = 'buy';
               }
            $img = $this->Tender_model->getequipmentimg($id);
            
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
            else{
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found']));
        }
        }
           elseif($type == 'material')
           {
               $result = $this->Tender_model->getmaterialListsbyid($market_user_id);
                
                   $id = $result['supplier_mat_id'];
                   $img = $this->Tender_model->getmaterialimg($id);
                   if(!empty($img))
                   {
                       $result['image']=base_url('uploads/supplierPost/'.$img['images']);
                   }
                   else
                   {
                       $result['image']='';
                   }
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
           }else
           {
               $this->output->set_output(json_encode(['result' => -2, 'msg' =>'Data not found' , 'data' => 'Data not found']));
           }
       }
   }
   
   public function reviews()
   {
       $this->output->set_content_type('application/json');
       $sender_id = $this->input->post('sender_id');
       $market_user_id = $this->input->post('reciever_id');
       $review = $this->input->post('review');
       $rating = $this->input->post('rating');
       $result = $this->Tender_model->review($user_id,$market_user_id,$review,$rating);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Thanks for Your Review' , 'data' => $result]));
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Reviewing Failed' , 'data' => 'Reviewing Failed']));
       }
       
   }
   
   public function allLocations()
   {
       $this->output->set_content_type('application/json');
       $result = $this->Tender_model->allLocations();
       if($result)
       {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result])); 
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'No Data' , 'data' => 'No Data']));
       }
       
   }
   
   public function allAoi()
   {
       $this->output->set_content_type('application/json');
       $result = $this->Tender_model->allAoi();
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result])); 
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'No Data' , 'data' => 'No Data']));
       }
       
   }
   
   public function aoiDescription()
   {
       $this->output->set_content_type('application/json');
       $aoi_id = $this->input->post('aoi_id');
       $result = $this->Tender_model->aoiDescription($aoi_id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result])); 
       }
       else
       {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'No Data' , 'data' => 'No Data'])); 
       }
   }
   
   
   public function messageSection()
   {
      $this->output->set_content_type('application/json');
      $user_id = $this->input->post('user_id');
      $type = $this->input->post('type');
      if($type == 'bid')
      {
          $bid['bids'] = $this->Tender_model->bidRequests($user_id);
          $bid['user_contractor_contact'] = $this->Tender_model->user_contractor_contactbidsRequest($user_id);
          if($bid)
          {   $i=0;
              foreach($bid['bids'] as $res)
              {
                  $id = $res['contractor_id'];
                  $img = $this->Tender_model->contractorImage($id);
                      if(!empty($img))
                      {
                          $bid['bids'][$i]['image']=base_url('uploads/contractorDetails/'.$img['image']);
                      }
                      else
                      {
                          $bid['bids'][$i]['image']='';
                      }
                      $i++;
              }
              $i=0;
              foreach($bid['user_contractor_contact'] as $res)
              {
                  $id = $res['contractor_id'];
                  
                  $img = $this->Tender_model->contractorImage($id);
                      if(!empty($img))
                      {
                          $bid['user_contractor_contact'][$i]['image']=base_url('uploads/contractorDetails/'.$img['image']);
                      }
                      else
                      {
                          $bid['user_contractor_contact'][$i]['image']='';
                      }
                      
                      $i++;
              }
              
              
              $final = array_merge($bid['bids'],$bid['user_contractor_contact']);
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Bid Requests' , 'data' => $final]));
          }
          else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'No Bids Requests Yet' , 'data' => 'No Bids Requests Yet']));
          }
      }
      
      if($type == 'chat')
      {
          $chat['contractor_bid'] = $this->Tender_model->chatList($user_id);
          $chat['contractor'] = $this->Tender_model->contractorchatRequests($user_id);
          $chat['labour'] = $this->Tender_model->labourchatRequests($user_id);
        
          $chat['equipment'] = $this->Tender_model->equipmentchatRequests($user_id);
        //   print_r($chat['equipment']);die;
          $chat['material'] = $this->Tender_model->materialchatRequests($user_id);
        //  print_r($chat['contractor']);die;
          if($chat)
          {
              $i=0;
              foreach($chat['contractor_bid'] as $res)
              {
              $id = $res['market_user_id'];
            
              $img = $this->Tender_model->contractorImage($id);
                  if(!empty($img))
                  {
                      $chat['contractor_bid'][$i]['image']=base_url('uploads/contractorDetails/'.$img['image']);
                  }
                  else
                  {
                      $chat['contractor_bid'][$i]['image']='';
                  }
                  
                  $i++;
              }
              
              $i=0;
        foreach($chat['contractor'] as $contractor)
        {
           $id = $contractor['market_user_id'];
           $img = $this->Tender_model->contractorImage($id);
           if(!empty($img))
           {
               $chat['contractor'][$i]['image'] = base_url('uploads/contractorDetails/'.$img['image']);
           }
           else
           {
               $chat['contractor'][$i]['image'] = '';
           }
            $i++;
        }
        
        $i=0;
        foreach($chat['labour'] as $labour)
        {
           $id = $labour['market_user_id'];
           $img = $this->Tender_model->labourImage($id);
           if(!empty($img))
           {
               $chat['labour'][$i]['image'] = base_url('uploads/labour/'.$img['image']);
           }
           else
           {
               $chat['labour'][$i]['image'] = '';
           }
            $i++;
        }
        
        $i=0;
        foreach($chat['equipment'] as $equipment)
        {
           $img = $equipment['image'];
        //   print_r($img);die;
        //   $img = $this->Tender_model->supplierImage($id);
           if(!empty($img))
           {
               $chat['equipment'][$i]['image'] = base_url('uploads/supplier/'.$img);
           }
           else
           {
               $chat['equipment'][$i]['image'] = '';
           }
            $i++;
        }
        
        $i=0;
        foreach($chat['material'] as $material)
        {
           $img = $material['image'];
        //   $img = $this->Tender_model->supplierImage($id);
           if(!empty($img))
           {
               $chat['material'][$i]['image'] = base_url('uploads/supplier/'.$img);
           }
           else
           {
               $chat['material'][$i]['image'] = '';
           }
            $i++;
        }
             $final_chat = array_merge($chat['contractor_bid'],$chat['contractor'],$chat['labour'],$chat['equipment'],$chat['material']); 
             $tempArr = array_unique(array_column($final_chat, 'market_user_id'));
             $arr = array_intersect_key($final_chat, $tempArr);
             $arr1 = array();$i =0;
             foreach($arr as $arrs){
                 $arr1[$i]['market_user_id'] = $arrs['market_user_id'];
                 $arr1[$i]['name'] = $arrs['name'];
                 $arr1[$i]['unique_id'] = $arrs['unique_id'];
                 $arr1[$i]['image'] = $arrs['image'];
                 $arr1[$i]['type'] = $arrs['type'];
                 $i++;
             }
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Chat List Loaded' , 'data' => $arr1]));
          }
          else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Chat List is Empty' , 'data' => 'Chat List is Empty']));
          }
          
      }
      if($type == 'post')
      {
          $post = $this->Tender_model->usersPost($user_id);
          if($post)
          { 
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded ' , 'data' => $post]));
          }
          else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'No Posts Yet.' , 'data' => 'No Posts Yet.']));
          }
      }
      
      if($type == 'sent')
      {
          $sent['contractor'] = $this->Tender_model->contractorsentRequests($user_id);
          $sent['labour'] = $this->Tender_model->laboursentRequests($user_id);
          $sent['equipment'] = $this->Tender_model->equipmentsentRequests($user_id);
          $sent['material'] = $this->Tender_model->materialsentRequests($user_id);
        $i=0;
        foreach($sent['contractor'] as $contractor)
        {
           $id = $contractor['market_user_id'];
           $img = $this->Tender_model->contractorImage($id);
           if(!empty($img))
           {
               $sent['contractor'][$i]['image'] = base_url('uploads/contractorDetails/'.$img['image']);
           }
           else
           {
               $sent['contractor'][$i]['image'] = '';
           }
            $i++;
        }
        
        $i=0;
        foreach($sent['labour'] as $labour)
        {
           $id = $labour['market_user_id'];
           $img = $this->Tender_model->labourImage($id);
           if(!empty($img))
           {
               $sent['labour'][$i]['image'] = base_url('uploads/labour/'.$img['image']);
           }
           else
           {
               $sent['labour'][$i]['image'] = '';
           }
            $i++;
        }
        
        $i=0;
        foreach($sent['equipment'] as $equipment)
        {
            
           $id = $equipment['market_user_id'];
           $sent['equipment'][$i]['usertype'] = 'equipment';
           $img = $this->Tender_model->supplierImage($id);
           if(!empty($img))
           {
               $sent['equipment'][$i]['image'] = base_url('uploads/supplier/'.$img['image']);
           }
           else
           {
               $sent['equipment'][$i]['image'] = '';
           }
            $i++;
        }
        
        $i=0;
        foreach($sent['material'] as $material)
        {
           $id = $material['market_user_id'];
           $sent['material'][$i]['usertype'] = 'material';
           $img = $this->Tender_model->supplierImage($id);
           if(!empty($img))
           {
               $sent['material'][$i]['image'] = base_url('uploads/supplier/'.$img['image']);
           }
           else
           {
               $sent['material'][$i]['image'] = '';
           }
            $i++;
        }
        if($sent)
          {
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded ' , 'data' => $sent]));
          }
          else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'No Request Found' , 'data' => 'No Request Found']));
          }
       }
     }
   
   public function response()
   {
       $this->output->set_content_type('application/json');
       $bid_id = $this->input->post('bid_id');
       $response = $this->input->post('response');
       if($response == '1')
       {
            $result = $this->Tender_model->accept($bid_id);
              
           if($result)
           {
               // push notification
               $data = $this->Tender_model->getbiddingdata($bid_id);
               $receiver_id = $data['contractor_id'];
               $receiver_type = 'contractor';
               $sender_id = $data['unique_id'];
               $sender_type = 'tender';
               $var = $this->allActivities($receiver_id,$receiver_type,$sender_id,$sender_type);
               //push notification
               $this->output->set_output(json_encode($var));
           }
          else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to Accept' , 'data' => 'Failed to Accept']));
          } 
       }
       else
       {
           
         $result = $this->Tender_model->reject($bid_id);
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
   
   public function messageFilter()
   {
       $this->output->set_content_type('application/json');
       $user_id = $this->input->post('user_id');
       $type = $this->input->post('type');
       $type = explode(',',$type);
       
       foreach($type as $types)
       {
           //filteration
                   if($types == 'contractor')
               {
                   $result = $this->Tender_model->contractorsentRequests($user_id);
                   if($result)
                   {
                       $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data Loaded' , 'data' => $result]));
                   }
                   else
                   {
                       $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));
                   }
               }
               if($types == 'labour')
               {
                   
                   $result = $this->Tender_model->laboursentRequests($user_id);
                   if($result)
                   {
                       $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data Loaded' , 'data' => $result]));
                   }
                   else
                   {
                       $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));
                   }
               }
               if($types == 'equipment')
               {
                   $result = $this->Tender_model->equipmentsentRequests($user_id);
                   if($result)
                   {
                       $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data Loaded' , 'data' => $result]));
                   }
                   else
                   {
                       $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));
                   }
               }
               if($types == 'material')
               {
                   $result = $this->Tender_model->materialsentRequests($user_id);
                   if($result)
                   {
                       $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data Loaded' , 'data' => $result]));
                   }
                   else
                   {
                       $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));
                   }
               }
           
           
       }
       
       
       
   }
   
   
   // Edit Posts
   public function editPosts()
   {
        $this->output->set_content_type('application/json');
        $post_id = $this->input->post('post_id');
        $user_id = $this->input->post('user_id');
        $title = $this->input->post('title');
        $plot_area = $this->input->post('plot_area');
        $cost_to = $this->input->post('cost_to');
        $cost_from = $this->input->post('cost_from');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $quality = $this->input->post('quality');
        $desc = $this->input->post('desc');
        $location = $this->input->post('location_id');
        $aoi = $this->input->post('aoi');
        $aoi_desc  = $this->input->post('aoi_desc');
        $aoi_desc = explode(',',$aoi_desc);
        $built_up = $this->input->post('built_up');
        // $location = explode(',',$location);
        $status = $this->input->post('status');
        $this->Tender_model->delpostaoi($post_id);
        $this->Tender_model->delpostimages($post_id);
        // if(!empty($this->input->post('imageid'))) {
        // $img_id = $this->input->post('imageid');
        // $img_id = explode(',',$img_id);
        
        // foreach($img_id as $img)
        //     {
        //         // print_r($img);die;
        //         $delimg = $this->Tender_model->delpostimages($img);
                
        //     }
            
        // }
        $this->addpostImages($post_id);
        
        
        $result = $this->Tender_model->editPost($post_id,$user_id,$title,$plot_area,$cost_to,$cost_from,$start_date,$end_date,$quality,$desc,$status,$location,$built_up);
        
        if($result)
        {
            foreach($aoi_desc as $aoi)
            {
                $this->Tender_model->postaoi($aoi,$post_id);
                
            }
            
            
             $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Updated' , 'data' => 'Post Updated']));
             
             
        }
        else
        {
            
             $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed to update' , 'data' => 'Failed to update']));
        
            
        }
        
   }
   
   public function editimages($post_id)
    {
        $this->output->set_content_type('application/json');
        //Multiple Images
           $this->load->library('upload');
           if(!empty($_FILES['image_url']['size'])) {
                 $count = count($_FILES['image_url']['size']);
        foreach ($_FILES as $key => $value) {
            // print_r($_FILES['image_url']);die;
            // print_r($key);die;
            if($key == 'image_url'){
            for($s = 0; $s < $count; $s++) {
                $_FILES['image_url']['name'] = $value['name'][$s];
                $_FILES['image_url']['type'] = $value['type'][$s];
                $_FILES['image_url']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['image_url']['error'] = $value['error'][$s];
                $_FILES['image_url']['size'] = $value['size'][$s];
                $this->upload->initialize($this->addpostImagesoptions());
                $this->upload->do_upload('image_url');
                $data = $this->upload->data();
                $this->Tender_model->postImages($data['file_name'],$post_id);
            }
            }
        }
           }
        //Multiple Images 
        
        
    }
    
    // Edit Posts 
   
   public function messagesectionDetails()
   {
      $this->output->set_content_type('application/json');
      $id = $this->input->post('id');
      $type = $this->input->post('type');
      if($type == 'bid')
      {
        
      $bidDetails = $this->Tender_model->bidDetails($id);
          if($bidDetails)
          {      
              $bidImages =  $this->Tender_model->bidImages($id);
              $i=0;
              foreach($bidImages as $bid)
              {
                  $bidDetails['images'][$i] = base_url('uploads/bidding/'.$bid['images']);
                  $i++;
              }
              
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $bidDetails]));
          }
          else
          {
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Not Found' , 'data' => 'Data Not Found']));
          }  
      }
      if($type == 'sent')
      {
          $usertype = $this->input->post('user_type');
          if($usertype == 'contractor')
          {
              $result = $this->Tender_model->contractor_details($id);
              if($result)
              {
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));  
              }
              else
              {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found']));
              }
          }
          if($usertype == 'labour')
          {
              $result = $this->Tender_model->labour_details($id);
              if($result)
              {
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));  
              }
              else
              {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found']));
              }
          }
          if($usertype == 'equipment')
          {
              $result = $this->Tender_model->equipment_details($id);
              if($result)
              {
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));  
              }
              else
              {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found']));
              }
          }
          if($usertype == 'material')
          {
              $result = $this->Tender_model->material_details($id);
              if($result)
              {
                $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));  
              }
              else
              {
                  $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not found' , 'data' => 'Data not found']));
              }
          }
          
      }
      
      if($type == 'post')
      {
        //   $list=[];
          
          $result = $this->Tender_model->post_details($id);
          if($result)
          {
            $post_id = $result['post_id'];
        
            $images = $this->Tender_model->getpostimages($post_id);
            // print_r($images);die;
            $i=0;
            // $image
            foreach($images as $img)
            {  
                $result['images'][$i] = base_url('uploads/userPost/'.$img['images']);
                $i++;
            }
            
            $aoi = $this->Tender_model->getPostaoi($post_id);
            // print_r($aoi);die;
            $i=0;
            // $image
            foreach($aoi as $a)
            {  
                // $result['images'][$i] = base_url('uploads/userPost/'.$img['images']);
                $result['aoi'][$i]['aoi_desc_id'] = $a['aoi_desc_id'];
                $result['aoi'][$i]['aoi_desc'] = $a['aoi_desc'];
                $i++;
            }
              
              $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Updated' , 'data' => $result]));
          }
          else
          {
              $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Not Found' , 'data' => 'Not Found']));
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
          $result = $this->Tender_model->homescreenSearch($field,$type);
           $i=0;
           if($result)
           {
               foreach($result as $res)
               {
                   $market_user_id = $res['market_user_id'];
                $rating = $this->Tender_model->ratings($market_user_id,$type);
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
           $result = $this->Tender_model->equipmentSearch($field);
            $i=0;
            foreach($result as $res)
            {
               $id = $res['supplier_equip_id'];
               $market_user_id = $res['market_user_id'];
               $type = $res['type'];
               $equipmentRatings = $this->Tender_model->equipmentRatings($market_user_id);
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
            $img = $this->Tender_model->getequipmentimg($id);
            
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
           $result = $this->Tender_model->materialSearch($field);
               $i=0;
               foreach($result as $res)
               {
                   $id = $res['supplier_mat_id'];
                   $img = $this->Tender_model->getmaterialimg($id);
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
   
   public function searching()
   {
      $this->output->set_content_type('application/json');
      $field = $this->input->post('field');
      $result['contractors'] = $this->Tender_model->contractorsearching($field);
      $result['labour'] = $this->Tender_model->laboursearching($field);
      $result['equipment'] = $this->Tender_model->equipmentSearch($field);
      $result['material'] = $this->Tender_model->materialSearch($field);
      if($result)
      {
          $i=0;
          foreach($result['contractors'] as $contractor)
          {
              $result['contractors'][$i]['image'] = base_url('uploads/contractorDetails/'.$contractor['image']);
                $i++;
          }
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
               
            $img = $this->Tender_model->getequipmentimg($id);
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
                   $img = $this->Tender_model->getmaterialimg($id);
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
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
      }
      else
      {
          $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Not Found' , 'data' => 'Not Found']));
      }
      
       
   }
   
   public function deletePosts()
   {
      $this->output->set_content_type('application/json');
      $post_id = $this->input->post('post_id');
      $result = $this->Tender_model->deletePosts($post_id);
      if($result)
      {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Deleted Sucessfully' , 'data' => 'Post Deleted Sucessfully']));
      }
      else
      {
               $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Failed To delete' , 'data' => 'Failed To delete']));
      }
   }
   
  public function filter()
  {
    $this->output->set_content_type('application/json');
    // $range  = $this->input->post('range');
    $id = $this->input->post('filter_id');
    // $id = explode(',',$id);
    // foreach($id as $ids){
        $result['contractors'] = $this->Tender_model->contractorfilter($id);
    // }
     
    $result['labour'] = $this->Tender_model->laboursearching($id,$range);
    $result['equipment'] = $this->Tender_model->equipmentSearch($id,$range);
    $result['material'] = $this->Tender_model->materialSearch($id,$range);
    $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Post Deleted Sucessfully' , 'data' => $result]));
    
  }
  
  public function searchLocation()
  {
      
      $this->output->set_content_type('application/json');
      $field = $this->input->post('field');
      $result = $this->Tender_model->searchLocation($field);
      if($result)
      {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
      }
      else
      {
          $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data not found' , 'data' => 'data not found']));
      }
  }
  
  public function searchbyLocation()
  {
     $this->output->set_content_type('application/json');
     $field = $this->input->post('field');
     $result['contractor'] = $this->Tender_model->contractorbyLocation($field);
     $result['labour'] = $this->Tender_model->labourbyLocation($field);
     $result['equipment'] = $this->Tender_model->equipmentbyLocation($field);
     $result['material'] = $this->Tender_model->materialbyLocation($field);
    //  print_r($result['equipment']);die;
     
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
            foreach($result['equipment'] as $res)
            {
               $id = $res['supplier_equip_id'];
               $type = $res['type'];
               if($type == 'sell')
               {
                   $result['equipment'][$i]['type'] = 'buy';
               }
            $img = $this->Tender_model->getequipmentimg($id);
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
                   $img = $this->Tender_model->getmaterialimg($id);
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
         
         
         $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
     }
     else
     {
         $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data not found' , 'data' => 'data not found']));
     }
  }
  
  public function appSettings()
  {
    $this->output->set_content_type('application/json');
    $type = $this->input->post('type');
    $result = $this->Tender_model->appSettings($type);
    if($result)
    {
        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
    }
    else
    {
        $this->output->set_output(json_encode(['result' => 1, 'msg' =>'data not found' , 'data' => 'data not found']));
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
      if($type == 'contractor')
      {
          $result  = $this->Tender_model->contractor_filter($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter,$type);
          $i=0;
          foreach($result as $res)
          {
              $market_user_id = $res['market_user_id'];
                $rating = $this->Tender_model->ratings($market_user_id,$type);
                
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
          
          if($result)
          {
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $final]));
      return FALSE;
          }
          else
          {
               $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data not Found' , 'data' => []]));
      return FALSE;
          }
          
      }
      if($type == 'labour')
      {
         $result  = $this->Tender_model->labour_filter($location_filter,$aoi_filter,$min_price_filter,$max_price_filter,$rating_filter);
         if($result)
          {
            $i=0;
          foreach($result as $res)
          {
               $market_user_id = $res['market_user_id'];
                $rating = $this->Tender_model->ratings($market_user_id,$type);
                
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
        $result  = $this->Tender_model->equipment_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter);
        // print_r($result);die;
        if($result)
        {
            $i=0;
            foreach($result as $res)
            {
                $market_user_id = $res['market_user_id'];
                $getType = $this->Tender_model->getType($market_user_id);
                $type = $getType['type'];
                if($type == 'contractor')
                { 
                     $img = $this->Tender_model->contractorImage($market_user_id);
                     
                     if(!empty($img['image']))
                     {
                         $result[$i]['image']= base_url('uploads/contractorDetails/'.$img['image']);
                     }else
                     {
                       $result[$i]['image']= '';  
                     }
                     
                } 
                if($type == 'supplier')
                {
                   $img = $this->Tender_model->supplierImage($market_user_id);
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
         $result  = $this->Tender_model->material_filter($location_filter,$min_price_filter,$max_price_filter,$rating_filter);
         if($result)
         {
             $i=0;
            foreach($result as $res)
            {
               $market_user_id = $res['market_user_id'];
                $getType = $this->Tender_model->getType($market_user_id);
                $type = $getType['type'];
                if($type == 'contractor')
                { 
                     $img = $this->Tender_model->contractorImage($market_user_id);
                     
                     if(!empty($img['image']))
                     {
                         $result[$i]['image']= base_url('uploads/contractorDetails/'.$img['image']);
                     }else
                     {
                       $result[$i]['image']= '';  
                     }
                     
                } 
                if($type == 'supplier')
                {
                   $img = $this->Tender_model->supplierImage($market_user_id);
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
  
  public function Notifications()
  {
    $this->output->set_content_type('application/json');
    $type = $this->input->post('type');
    if($type == 'tender')
    {
        $result = $this->Tender_model->tenderNotifications();
        if($result)
        {
           $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
      return FALSE; 
        }else
        {
           $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not Found' , 'data' => 'Data not found']));
      return FALSE; 
        }
    }else
    {
        $result = $this->Tender_model->marketplaceNotifications();
        if($result)
        {
            $this->output->set_output(json_encode(['result' => 1, 'msg' =>'Data Loaded' , 'data' => $result]));
      return FALSE;
        }else
        {
            $this->output->set_output(json_encode(['result' => -1, 'msg' =>'Data not Found' , 'data' => 'Data not found']));
      return FALSE; 
        }
    }
  }
  
  public function allActivities($receiver_id,$receiver_type,$sender_id,$sender_type)
    {
        $this->output->set_content_type('application/json');
          // bidding Notification
            $result = $this->Tender_model->biddingNotification($receiver_id);
            
            if($result)
            {
                $name = $result['name'];
                $token = $result['token_id'];
                $msg= array('body'	=> 'Your Request has been Accepted by '.$name ,
		            'title'	=> 'Request Accepted'
		         
		             );
		             
		      $data = array('user_id'=>$sender_id,
		                     'type'=>'tender',
		                     'body' => 'Your Request has been Accepted by '.$name,
		                     'title' => 'Request Accepted'
		                      );       
            
            $res = $this->send_notification($token,$msg,$data);
            return $res;
            }
        
    }
    
    function send_notification($token,$msg,$data)
	{
   define( 'API_ACCESS_KEY', 'AAAAdI2NltY:APA91bEIcseuZ3W38mFzY_oZoFZD8MBt42YYYvjUa5u5soWmnQb3-bczaISkolAUPMTB4heDFgNhHZVuK2NENDG27QN5gyWa07tZBURidAq52ne4mvsD4ABo6nrquLFu4uBKPL9b9Y80');	    
   		$fields = array(
			 'to' => $token,
			 'notification' =>$msg,
			'data' =>$data
		 	);
            $headers = array('Authorization:key = '.API_ACCESS_KEY,
            'Content-Type: application/json'
            );
    	     $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
           curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       
           $result = curl_exec($ch);    
            if ($result === FALSE) {
               die('Curl failed: ' . curl_error($ch));
           }
           curl_close($ch);
         $array = ['result' => 1, 'msg' => 'Request Accepted', 'notification' => $fields['notification'], 'data'=>$data];
         return $array;
         }
   
}
