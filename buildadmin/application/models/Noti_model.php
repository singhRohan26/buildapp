<?php


class Noti_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function checkTokenid($user_id,$token_id)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('user_id',$user_id);
        $this->db->where('token_id',$token_id);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function checkUser($user_id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('user_id',$user_id);
        $this->db->where('type',$type);
        $sel = $this->db->get();
        return $sel->row_array();
    }
    
    public function updateToken($user_id,$type,$token_id)
    {
        $where = array('user_id' => $user_id, 'type' => $type);
        $this->db->where($where);
        $this->db->update('notification',['token_id'=>$token_id]);
        return $this->db->affected_rows();
    }
    
     public function getToken($user_id,$type,$token_id){
        $this->db->insert('notification',['user_id'=>$user_id,'type'=>$type,'token_id'=>$token_id]);
        return $this->db->insert_id();
    }
    
    public function checkTokenbyid($receiver_type,$receiver_id)
    {
        if($receiver_type == 'tender')
        {
        $this->db->select('notification.token_id,notification.user_id,notification.type,tender.name,tender.image');
        $this->db->from('notification');
        $this->db->join('tender','tender.unique_id=notification.user_id');
        
        $this->db->where('notification.user_id',$receiver_id);
        $this->db->where('type',$receiver_type);
        $sel = $this->db->get();
        return $sel->row_array();    
        }
        else
        {
        $this->db->select('notification.*,marketplace.name');
        $this->db->from('notification');
        $this->db->join('marketplace','marketplace.market_user_id=notification.user_id');
        $this->db->where('notification.user_id',$receiver_id);
        $this->db->where('notification.type',$receiver_type);
        $sel = $this->db->get();
        return $sel->row_array(); 
        }
        
        
    }
    
    public function biddingNotification($receiver_id)
    {
        $this->db->select('notification.token_id,notification.user_id,notification.type,contractor_bid.*,tender.name');
        $this->db->from('notification');
        $this->db->join('contractor_bid','contractor_bid.contractor_id=notification.user_id');
        $this->db->join('tender','contractor_bid.user_id=tender.user_id');
        $this->db->where('notification.user_id',$receiver_id);
        $this->db->where('contractor_bid.response','1');
        $sel= $this->db->get();
        return $sel->row_array();
    }
    
    
    
    
    
}