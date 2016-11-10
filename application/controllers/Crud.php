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
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            return $this->render();
        }

        $this->data['pagebody' ] ='mtce';
        $this->data['items'] = $this->menu->all();
        $this->render();
    }
}
