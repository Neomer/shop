<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'core/Database.class.php';
require_once 'core/model/User.model.php';
require_once 'core/model/Resource.model.php';

/**
 * Description of engine
 *
 * @author root
 */
class Engine {
    private $user = null;    
    
    public function __construct() {
        $this->user = new User();
    }
    
    public function getVersion()
    {
        return "0.0.1-pre-alpha";
    }
    
    public function getUser() 
    {
        if ($this->user->isValid()) {
            return $this->user;
        }
        
        $ssid = '';
        if (array_key_exists('ssid', $_COOKIE)) {
            $ssid = md5($_COOKIE['ssid']);
        }
        if ($ssid !== '') {
            $this->user->select(array('ssid' => $ssid));
        }
        
        return $this->user;
    }
    
    public function createUrlById($id, $query = array()) {
        $url = $_SERVER['REQUEST_SCHEME']
                . '://'
                . $_SERVER['SERVER_ADDR']
                . (($_SERVER['SERVER_PORT'] != '80')?($_SERVER['SERVER_PORT']):'') 
                . ($_SERVER['SCRIPT_NAME'])
                . "?resource={$id}";
        for ($i = 0; $i < count($query); $i++) {
            $url .= '&'.array_keys($query)[$i].'='.array_values($query)[$i];
        }
        return $url;
    }
    
    public function getResource($id = 0)
    {
        $res_id = 0;
        if ($id == 0) {
            if (array_key_exists('resource', $_GET)) {
                if (is_numeric($_GET['resource'])) {
                    $res_id = $_GET['resource'];
                }
            }
        }
        else {
            $res_id = $id;
        }
        
        $res = null;
        if ($res_id != 0) {
            $res = new Resource($res_id);
        }
        if ($res === null || !$res->isValid()) {
            $res = new Resource();
            $res->select(array('def' => 1));
            if (!$res->isValid()) {
                die('Default template not found!');
            }
        }
        return $res;
    }
    
    public function debug($func, $msg) {
        global $debug;
        
        $debug .= $func . ' - DEBUG ' . $msg;
    }
}
