<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('DBInterface.model.php');

/**
 * Description of User
 *
 * @author root
 */
class User extends DBInterface {
    private $model = array(
        "id" => array(
            "get" => "getUID",
            "set" => "setUID",
            "type" => "int"), 
        "username" => array(
            "get" => "getUsername",
            "set" => "setUsername",
            "type" => "str"), 
        "password" => array(
            "get" => "getPassword",
            "set" => "setPassword",
            "type" => "str"), 
        "last_login" => array(
            "get" => "getLastLogin",
            "set" => "setLastLogin",
            "type" => "dt")
    );
    
    private $user_id;
    private $username;
    private $password;
    private $last_login;
    
    
    public function __construct($id = null) {
        parent::__construct('users');
        
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
        $this->parseModel();
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
    
    public function getUID() {
        return $this->user_id;
    }
    
    public function setUID($value) {
        $this->user_id = $value;
    }

    public function getUsername() {
        return $this->username;     
    }
    
    public function setUsername($value) {
        $this->username = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($value) {
        $this->password = $value;
    }
    
    public function getLastLogin() {
        return $this->last_login;
    }
    
    public function setLastLogin($value) {
        $this->last_login = $value;
    }
    
}
