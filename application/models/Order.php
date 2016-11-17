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
       // constructor
    function __construct($state=null) {
        parent::__construct();
        if (is_array($state)) {
            foreach($state as $key => $value)
                $this->$key = $value;
        } else {
            $this->number = 0;
            $this->datetime = null;
            $this->items = array();
        }
    }
        
    public function addItem($which=null) {
    // ignore empty requests
        if ($which == null) return;

        // add the menu item code to our order if not already there
        if (!isset($this->items[$which]))
            $this->items[$which] = 1;
        else {
            // increment the order quantity
            $this->items[$which]++;
        }
    }
    
    public function receipt() {
        $total = 0;
        $result = $this->data['pagetitle'] . '  ' . PHP_EOL;
        $result .= date(DATE_ATOM) . PHP_EOL;
        $result .= PHP_EOL . 'Your Order:'. PHP_EOL . PHP_EOL;
        foreach($this->items as $key => $value) {
            $menu = $this->menu->get($key);
            $result .= '- ' . $value . ' ' . $menu->name . PHP_EOL;
            $total += $value * $menu->price;
        }
        $result .= PHP_EOL . 'Total: $' . number_format($total, 2) . PHP_EOL;
        return $result;
    }
}
