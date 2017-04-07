<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'core/smarty/libs/Smarty.class.php';

/**
 * Description of Abstract
 *
 * @author root
 */
abstract class AbstractViewModel {
    private $view;
    
    public function __construct($view) {
        $this->view = $view;
    }
    
    public function getView() {
        return $this->view;
    }
    
    protected function sestView($value) {
        $this->view = $value;
    }


    public function display($stream = null) {
        global $smarty;
        
        if ($stream === null) {
            $smarty->display();
        }
    }
}
