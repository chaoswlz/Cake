<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Created by Daniel
 */

class Order extends CI_Model {

        // constructor
        function __construct() {
            parent::__construct();
            $this->number = 0;
            $this->datetime = null;
            $this->items = array();
        }
}
