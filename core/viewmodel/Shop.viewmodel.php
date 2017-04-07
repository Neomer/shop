<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'core/viewmodel/Abstract.viewmodel.php';
require_once 'core/model/Engine.model.php';
require_once 'core/model/Product.model.php';
require_once 'core/model/Resource.model.php';
require_once 'core/model/Series.model.php';
require_once 'core/model/Delivery.model.php';

/**
 * Description of shop
 *
 * @author root
 */
class Shop extends AbstractViewModel {
    public function __construct() {
        parent::__construct();
    }
    
    public function getProductGroups() {
        
    }
}
