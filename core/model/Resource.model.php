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
class Resource extends DBInterface {
    private $model = array(
        "id" => array(
            "get" => "getId",
            "set" => "setId",
            "type" => "int"), 
        "shortname" => array(
            "get" => "getShortname",
            "set" => "setShortname",
            "type" => "str"), 
        "fullname" => array(
            "get" => "getFullname",
            "set" => "setFullname",
            "type" => "str"), 
        "def" => array(
            "get" => "getIsDefault",
            "set" => "setIsDefault",
            "type" => "int"),
        "template" => array(
            "get" => "getTemplate",
            "set" => "setTemplate",
            "type" => "str"),
        "menu_index" => array(
            "get" => "getMenuIndex",
            "set" => "setMenuIndex",
            "type" => "int"),
        "menu_display" => array(
            "get" => "getIsMenuDisplay",
            "set" => "setIsMenuDisplay",
            "type" => "int"),
        "menu_title" => array(
            "get" => "getMenuTitle",
            "set" => "setMenuTitle",
            "type" => "int"),
        "parent" => array(
            "get" => "getParentId",
            "set" => "setParentId",
            "type" => "int"),
    );
    
    private $res_id;
    private $shortname;
    private $fullname;
    private $default;
    private $template;
    private $menu_index;
    private $menu_display;
    private $menu_title;
    private $parent;
    
    public function __construct($id = null) {
        parent::__construct('resource');
        
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
        return $this->res_id;
    }
    
    public function setId($value) {
        $this->res_id = $value;
    }

    public function getShortname() {
        return $this->shortname;     
    }
    
    public function setShortname($value) {
        $this->shortname = $value;
    }

    public function getFullname() {
        return $this->fullname;
    }
    
    public function setFullname($value) {
        $this->fullname = $value;
    }
    
    public function getIsDefault() {
        return $this->default;
    }
    
    public function setIsDefault($value) {
        $this->default = $value;
    }

    public function getTemplate() {
        return $this->template;
    }
    public function setTemplate($value) {
        $this->template = $value;
    }
    
    public function getMenuIndex() {
        return $this->menu_index;
    }
    public function setMenuIndex($value) {
        $this->menu_index = $value;
    }
    
    public function getIsMenuDisplay() {
        return $this->menu_display;
    }
    public function setIsMenuDisplay($value) {
        $this->menu_display = $value;
    }
    
    public function getMenuTitle() {
        return $this->menu_title;
    }
    public function setMenuTitle($value) {
        $this->menu_title = $value;
    }
    
    public function getParentId() {
        return $this->parent;
    }
    public function setParentId($value) {
        $this->parent = $value;
    }
    
    
    
}
