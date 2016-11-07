<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Crud
 *
 * @author TianyangLiu
 */
class Crud extends Application{
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $role = $this->session->userdata('userrole');
        
        if ($role == 'user'){
            $this->data['content'] = "You are not authorized to access this page!";
            $this->render();
        }else{
            $this->data['content'] = "Admin Entered";
            $this->render();
        }
        
    }
}
