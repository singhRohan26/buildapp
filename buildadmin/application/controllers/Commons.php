<?php

defined('BASEPATH') OR die('Not Allowed');

class Commons extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Tender_model']);
    }

    
   

}