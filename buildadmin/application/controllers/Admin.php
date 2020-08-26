<?php

defined('BASEPATH') OR die('Not Allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Admin_model']);
    }

   public function index()
   {
       $this->load->view('admin/login');
   }
   
   public function checkLogin()
   {
         $this->form_validation->set_rules('email', 'Email', 'required'); 
         $this->form_validation->set_rules('pass', 'Password', 'required');
         if ($this->form_validation->run() == FALSE) { 
            
         $data['error']=$this->form_validation->error_array(); 
         $this->load->view('admin/login',$data);
//         redirect(base_url('login',$data));
         }
         else
         {
             $result = $this->Admin_model->checkLogin();
             if($result)
             {
                 $this->session->set_userdata('email',$result['email']);
                 redirect('Admin/dashboard');
             }
             else
             {
                 $this->session->set_flashdata('error','Invalid Login Credentials');
                 redirect('Admin/index');
             }
         }

         
         
   }
   
   public function Logout()
   {
       $this->session->sess_destroy('email');
       redirect('Admin/index');
   }
   
   public function dashboard()
   {
    //   echo $this->session->userdata('email');die;
       $data['tendercount'] = $this->Admin_model->tenderCount();
       $data['contractorcount'] = $this->Admin_model->contractorcount();
       $data['subcontractorcount'] = $this->Admin_model->subcontractorcount();
       $data['labourcount'] = $this->Admin_model->labourcount();
       $data['suppliercount'] = $this->Admin_model->suppliercount();
       $this->load->view('admin/header');
	   $this->load->view('admin/navbar');
	   $this->load->view('admin/sidebar');
       $this->load->view('admin/index',$data);
	   $this->load->view('admin/footer');
   }
   public function tenderList()
   {
       $data['tenderlist'] = $this->Admin_model->tenderList();
    //   print_r($data['tenderlist']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/tenderList',$data);
       $this->load->view('admin/footer');
   }
   
   public function tenderDetails($id)
   {
       
    $data['tenderDetails'] = $this->Admin_model->tenderDetails($id);
    // print_r($data['tenderDetails']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/tenderDetails',$data);
       $this->load->view('admin/footer');
   }
   
   public function locations()
   {
       $data['locations'] = $this->Admin_model->locations();
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/locations',$data);
       $this->load->view('admin/footer');
   }
   
   public function aoi()
   {
       $data['allaoi'] = $this->Admin_model->allaoi();
       $data['aoi_desc'] = $this->Admin_model->aoisubCategory();
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/allaoi',$data);
       $this->load->view('admin/footer');
   }
   
   public function aoisubCategory($id)
   {
       
       print_r($data['aoi_desc']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/allaoi',$data);
       $this->load->view('admin/footer');
   }
   
   public function doAddSubcategory($aoi_id)
   {
       $sub_category = $this->input->post('sub_category');
       $result = $this->Admin_model->doAddSubcategory($aoi_id,$sub_category);
       if($result)
       {
           $this->session->set_flashdata('sub_category', 'sub_category Added Sucessfully!');
         redirect('Admin/aoi');   
       }
       else
       {
           echo '<script>alert("Something Went Wrong");</script>';
            redirect('Admin/aoi');
       }
   }
   
   public function allcontractors()
   {
       $data['allcontractors'] = $this->Admin_model->allcontractors();
    //   print_r($data['allcontractors']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/allcontractors',$data);
       $this->load->view('admin/footer');
   }
   
   public function contractorDetails($id)
   {
       $data['contractorDetails'] = $this->Admin_model->contractorDetails($id);
    //   print_r($data['contractorDetails']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/contractorDetails',$data);
       $this->load->view('admin/footer');
   }
   
   public function allsub_cont()
   {
       $data['allsub_cont'] = $this->Admin_model->allsub_cont();
    //   print_r($data['allsub_cont']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/allsub_cont',$data);
       $this->load->view('admin/footer');
   }
   
   public function subcontDetails($id)
   {
       $data['subcontDetails'] = $this->Admin_model->subcontDetails($id);
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/subcontDetails',$data);
       $this->load->view('admin/footer');
       
   }
   
   public function allLabours()
   {
       $data['allLabours'] = $this->Admin_model->allLabours();
    //   echo '<pre>';print_r($data['allLabours']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/allLabours',$data);
       $this->load->view('admin/footer');
   }
   
   public function labourDetails($id)
   {
       $data['labourDetails'] = $this->Admin_model->labourDetails($id);
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/labourDetails',$data);
       $this->load->view('admin/footer');
   }
   
   public function allSuppliers()
   {
       $data['allSuppliers'] = $this->Admin_model->allSuppliers();
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/allSuppliers',$data);
       $this->load->view('admin/footer');
   }
   
   public function supplierDetails($id)
   {
       $data['supplierDetails'] = $this->Admin_model->supplierDetails($id);
        $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/supplierDetails',$data);
       $this->load->view('admin/footer');
   }
   
   public function contractorSubscription()
   {
       $data['getcontractorSubscription'] = $this->Admin_model->getcontractorSubscription();
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/contractorSubscription',$data);
       $this->load->view('admin/footer');
   }
   
   public function doeditcontractorsubscription($id)
   {
       $this->output->set_content_type('application/json');
       $price = $this->input->post('price');
       
       $package = $this->input->post('package');
       $bids = $this->input->post('bids');
       $result= $this->Admin_model->doaddcontractorsubscription($price,$package,$id,$bids);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/contractorSubscription'),'msg' => 'Plan Updated']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/contractorSubscription')]));
       }
   }
   
   public function editcontractorplan($id)
   {
	   $data['contractorplanbyid'] = $this->Admin_model->contractorplanbyid($id);
	   $data['getcontractorSubscription'] = $this->Admin_model->getcontractorSubscription();
	   $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/contractorSubscription',$data);
       $this->load->view('admin/footer');
   }
   
   public function supplierSubscription()
   {
       $data['getsupplierSubscription'] = $this->Admin_model->getsupplierSubscription();
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/supplierSubscription',$data);
       $this->load->view('admin/footer');
   }
   
   public function doeditsuppliersubscription($id)
   {
       $this->output->set_content_type('application/json');
       $price = $this->input->post('price');
       $package = $this->input->post('package');
       $result= $this->Admin_model->doaddcontractorsubscription($price,$package,$id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/supplierSubscription'),'msg' => 'Plan Updated']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/supplierSubscription')]));
       }
   }
   
   public function editsuppierplan($id)
   {
	    $data['supplierplanbyid'] = $this->Admin_model->supplierplanbyid($id);
	   $data['getsupplierSubscription'] = $this->Admin_model->getsupplierSubscription();
	   $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/supplierSubscription',$data);
       $this->load->view('admin/footer');
	   
   }
   
   public function subContractorSubscription()
   {
	   $data['getsubContractorSubscription'] = $this->Admin_model->getsubContractorSubscription();
	   $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/subcontSubscription',$data);
       $this->load->view('admin/footer');
   }
   
   public function editsubcontractorplan($id)
   {
	   $data['getsubContractorSubscription'] = $this->Admin_model->getsubContractorSubscription();
	   $data['subcontplanbyid'] = $this->Admin_model->subcontplanbyid($id);
	   $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/subcontSubscription',$data);
       $this->load->view('admin/footer'); 
   }
   
   public function doeditsubcontplan($id)
   {
       $this->output->set_content_type('application/json');
	   $price = $this->input->post('price');
       $package = $this->input->post('package');
       $result= $this->Admin_model->doaddcontractorsubscription($price,$package,$id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/subContractorSubscription'),'msg' => 'Plan Updated']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/subContractorSubscription')]));
       }
	   
   }
   
   public function delcontractorplan($id)
   {
	   $this->output->set_content_type('application/json');
       $result = $this->Admin_model->delcontractorplan($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/contractorSubscription')]));
       }
   }
   
   public function delcontractor($id)
   {
       $this->output->set_content_type('application/json');
       $result = $this->Admin_model->delcont($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/allcontractors')]));
       }
   }
   
   public function delsubcontractor($id)
   {
       $this->output->set_content_type('application/json');
       $result = $this->Admin_model->delsubcontractor($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/allsub_cont')]));
       }
       
   }
   
   public function dellabour($id)
   {
       $this->output->set_content_type('application/json');
       $result = $this->Admin_model->dellabour($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/allLabours')]));
       }
   }
   
   public function deltender($id)
   {
       $this->output->set_content_type('application/json');
       $result = $this->Admin_model->deltender($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/tenderList')]));
       }
   }
   
   public function delsupplier($id)
   {
       $this->output->set_content_type('application/json');
       $result = $this->Admin_model->delsupplier($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/allSuppliers')]));
       }
   }
   
   public function delsupplierplan($id)
   {
	   $this->output->set_content_type('application/json');
        $result = $this->Admin_model->delcontractorplan($id);
       if($result)
       {
          $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/supplierSubscription')]));
       }
   }
   
   public function delsubcontplan($id)
   {
	   $this->output->set_content_type('application/json');
        $result = $this->Admin_model->delsubcontplan($id);
       if($result)
       {
          $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/subContractorSubscription')]));
       }
   }
   
   public function aboutUs()
   {
       $data['getaboutus'] = $this->Admin_model->getaboutus();
    //   print_r($data['getaboutus']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/aboutUs',$data);
       $this->load->view('admin/footer');
   }
   
   public function doaddaboutus($id)
   {
        $this->output->set_content_type('application/json');
       $text = $this->input->post('editordata');
       $result = $this->Admin_model->doaddaboutus($text,$id);
       if($result)
       
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/aboutUs'),'msg'=>'About Us Updated']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/aboutUs')]));
       }
   }
   
   public function tnc()
   {
       $data['gettnc'] = $this->Admin_model->gettnc();
    //   print_r($data['getaboutus']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/tnc',$data);
       $this->load->view('admin/footer');
   }
   
   public function doaddtnc($id)
   {
       $this->output->set_content_type('application/json');
       $text = $this->input->post('editordata');
       $result = $this->Admin_model->doaddaboutus($text,$id);
       if($result)
       
       {
          $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/tnc'),'msg'=>'Terms & Conditions Updated']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/tnc')]));
       } 
   }
   
   public function privacy()
   {
       $data['privacy'] = $this->Admin_model->privacy();
    //   print_r($data['getaboutus']);die;
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/privacy',$data);
       $this->load->view('admin/footer');
   }
   
   public function doaddprivacy($id)
   {
       $this->output->set_content_type('application/json');
       $text = $this->input->post('editordata');
       $result = $this->Admin_model->doaddaboutus($text,$id);
       if($result)
       
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/privacy'),'msg'=>'Privacy Policy Updated']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/privacy')]));
       }
       
   }
   
   public function faq()
   {
       $data['getFaq'] = $this->Admin_model->getFaq();
       $data['faqDesc'] = $this->Admin_model->faqDesc();
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/faq',$data);
       $this->load->view('admin/footer');
   }
   
   public function doaddfaq()
   {
       $this->output->set_content_type('application/json');
       $faq = $this->input->post('faq');
       $result = $this->Admin_model->doaddfaq($faq);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/faq'),'msg'=>'Your Question is Added']));
       }else{
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/faq')]));
       }
   }
   
   public function deleteFaq($id)
   {
       $this->output->set_content_type('application/json');
       $result = $this->Admin_model->deleteFaq($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/faq'),'msg'=>'Your Question is Added']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/faq')]));
       }
   }
   
   public function doAddFaqDescription($id)
   {
       $this->output->set_content_type('application/json');
       $faq_desc = $this->input->post('faq_desc');
       $result = $this->Admin_model->doAddFaqDescription($faq_desc,$id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/faq'),'msg'=>'Your Answere is Added']));
       }else
       {
           $this->output->set_output(json_encode(['result' => -1, 'url' => base_url('Admin/faq')]));
       }
       
       
   }
   
   public function changePassword()
   {
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/changepass');
       $this->load->view('admin/footer');
   }
   
   public function transactions(){
       $data['transaction'] = $this->Admin_model->getTransactions();
       $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/transaction',$data);
       $this->load->view('admin/footer');
       
   }
   
   public function dochangepass(){
        $this->output->set_content_type('application/json');
        $email = $this->session->userdata('email');
        
        $this->form_validation->set_rules('op', 'Old Password', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $this->form_validation->set_rules('np', 'New Password', 'required');
        $this->form_validation->set_rules('cp', 'Confirm Password', 'required|matches[np]');
        $result = $this->Admin_model->do_check_oldpassword($email);
        if(empty($result)){
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Old password did not match Current Password!']));
                return FALSE;
        }else{
            if($this->input->post('op') == $this->input->post('np')){
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Current Password and New Password should not be same!']));
                return FALSE;
            }
            if ($this->form_validation->run() === FALSE) {
                $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
                return FALSE;
            }
        }
        $changed = $this->Admin_model->reset_password($email);
        if ($changed) {
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Admin/dashboard'), 'msg' => 'Password Updated Sucessfully.']));
            return FALSE;
        }
        
   }
   
   
   
   

}
