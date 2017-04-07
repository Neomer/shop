<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('DBInterface.model.php');

/**
 * Description of Delivery
 *
 * @author root
 */
class Delivery extends DBInterface {
    private $model = array(
        "product_id" => array(
            "get" => "getProductId",
            "set" => "setProductId",
            "type" => "int"), 
        "series_id" => array(
            "get" => "getSeriesId",
            "set" => "setSeriesId",
            "type" => "int"), 
        "price" => array(
            "get" => "getPrice",
            "set" => "setPrice",
            "type" => "float"), 
        "quantity" => array(
            "get" => "getQuantity",
            "set" => "setQuantity",
            "type" => "int"), 
    );
    
    private $product_id;
    private $series_id;
    private $price;
    private $quantity;
    
    public function __construct() {
        parent::__construct('delivery');    
    }
    
    public function select($filter, $order = '') {
        $this->parseModel(parent::select($filter, $order));
    }

    public function next() {
        $ret = parent::next();
        if ($ret) {
            $this->parseModel();
        }
        return $ret;
    }

    private function parseModel($result = null) {
        if ($result === null) {
            $result = parent::resultSet();
        }
        $assoc = pg_fetch_row($result, parent::rowNumber());
        for ($i = 0; $i < count($assoc); $i++)
        {
            $field = pg_field_name($result, $i);
            $func = $this->model[$field]['set'];
            $this->$func($assoc[$i]);
        }
    }
    
    public function getProductId() {
        return $this->product_id;
    }
    public function setProductId($value) {
        $this->product_id = $value;
    }

    public function getSeriesId() {
        return $this->series_id;     
    }
    public function setSeriesId($value) {
        $this->series_id = $value;
    }

    public function getPrice() {
        return $this->price;     
    }
    public function setPrice($value) {
        $this->price = $value;
    }

    public function getQuantity() {
        return $this->quantity;     
    }
    public function setQuantity($value) {
        $this->quantity = $value;
    }
}
