<?php

defined('BASEPATH') OR die('Not Allowed');

class Noti extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Noti_model']);
    }
    
    public function getToken(){
          $this->output->set_content_type('application/json');
          $user_id = $this->input->post('user_id');
          $type = $this->input->post('type');
          $token_id = $this->input->post('token_id');
          $check = $this->Noti_model->checkTokenid($user_id,$token_id);
          if($check){
              $this->output->set_output(json_encode(['result' => 0, 'msg' => 'Token Already Exists', 'data' => 'Token Already Exists']));
               return false;
          }else{
              $getuser = $this->Noti_model->checkUser($user_id,$type);
            //   print_r($getuser);die;
              if($getuser){
                  $result = $this->Noti_model->updateToken($user_id,$type,$token_id);
                  if($result){
                       $this->output->set_output(json_encode(['result' => 2, 'msg' => 'Token Id Updated', 'data' => $result]));
                       return false;
                  }else{
                       $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Fail To Update Token Id', 'data' => 'Fail To Update Token Id']));
                       return false;
                  }
              }else{
                  $result = $this->Noti_model->getToken($user_id,$type,$token_id);
                  if($result){
                       $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Token Id Added', 'data' => $result]));
                       return false;
                  }else{
                      $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Fail To Add Token Id', 'data' => 'Fail To Add Token Id']));
                      return false;
                  }
              }
          }
    }
    
    
    public function index()
    {
        $this->output->set_content_type('application/json');
        $receiver_type = $this->input->post('receiver_type');
        $receiver_id = $this->input->post('receiver_id');
        $sender_type = $this->input->post('sender_type');
        $sender_id = $this->input->post('sender_id');
        $text = $this->input->post('msg');
        
            $result = $this->Noti_model->checkTokenbyid($receiver_type,$receiver_id);
            $name = $result['name'];
            $token = $result['token_id'];
            if($result)
           {
               $msg= array('body'	=> $text ,
    		            'title'	=> $name
    		          //  'click_action' => 'com.designoweb.buildapp'
    		             );
    		             
    		      $data = array('user_id'=>$sender_id,
    		                     'type'=>$sender_type,
    		                     'body' => $text,
    		                     'title' => $name
    		                      //'image'=> $image
    		                     );       
                
                $res = $this->send_notification($token,$msg,$data);
                return $res;
           }
    }
    
    public function allActivities()
    {
        $this->output->set_content_type('application/json');
        $receiver_type = $this->input->post('receiver_type');
        $receiver_id = $this->input->post('receiver_id');
        $sender_type = $this->input->post('sender_type');
        $sender_id = $this->input->post('sender_id');
        $key = $this->input->post('key');
        if($key == 'bidding')
        {   // bidding Notification
            $result = $this->Noti_model->biddingNotification($receiver_id);
            
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
         $this->output->set_output(json_encode(['result' => 1, 'msg' => 'sent', 'notification' => $fields['notification'], 'data'=>$data]));
         return false;
         }
}
    
    
    
