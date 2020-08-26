<?php

defined('BASEPATH') OR die('Not Allowed');

class Notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Admin_model']);
    }
    
    public function tenderNotification(){
        $data['getTenderNotifications'] = $this->Admin_model->getTenderNotifications();
        // print_r($data['getTenderNotifications']);die;
        $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/tenderNotification',$data);
       $this->load->view('admin/footer');
    }
    
    public function doAddTenderNotification(){
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $result = $this->Admin_model->doAddTenderNotification($title,$text);
        if($result){
            
            return redirect('Notification/tenderNotification');
        }
    }
    
    public function marketplaceNotification(){
        $data['getMarketplaceNotifications'] = $this->Admin_model->getMarketplaceNotifications();
        $this->load->view('admin/header');
       $this->load->view('admin/navbar');
       $this->load->view('admin/sidebar');
       $this->load->view('admin/marketplaceNotifications',$data);
       $this->load->view('admin/footer');
    }
    
    public function doAddMarketplaceNotification(){
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $result = $this->Admin_model->doAddMarketplaceNotification($title,$text);
        if($result){
            
            return redirect('Notification/marketplaceNotification');
        }
    }
    
    public function delmarketplaceNoti($id){
        $this->output->set_content_type('application/json');
       $result = $this->Admin_model->delmarketplaceNoti($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Notification/marketplaceNotification')]));
       }
    }
    
    public function delTenderNoti($id){
        $this->output->set_content_type('application/json');
       $result = $this->Admin_model->delTenderNoti($id);
       if($result)
       {
           $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('Notification/tenderNotification')]));
       }
    }

   
   
   
   
   

}
