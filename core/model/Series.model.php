<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('DBInterface.model.php');

/**
 * Description of Resource
 *
 * @author root
 */
class Series extends DBInterface {
    private $model = array(
        "id" => array(
            "get" => "getId",
            "set" => "setId",
            "type" => "int"), 
        "datetime" => array(
            "get" => "getDateTime",
            "set" => "setDateTime",
            "type" => "dt"), 
    );
    
    private $id;
    private $datetime;
    
    public function __construct($id = null) {
        parent::__construct('series');
        
        if ($id != null)
        {
            $this->parseModel(parent::load($id));
        }
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
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($value) {
        $this->id = $value;
    }

    public function getDateTime() {
        return $this->datetime;     
    }
    
    public function setDateTime($value) {
        $this->datetime = $value;
    }
}
