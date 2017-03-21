<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('core/Database.class.php');

/**
 * Description of IDbI
 *
 * @author root
 */
abstract class DBInterface {
    private $tablename = null;
    protected $valid = false;


    //put your code here
    public function __construct($tablename) {
        $this->tablename = $tablename;
    }
    
    protected function load($id)
    {
        global $db;
        global $dbprefix;
        
        $result = $db->exec("select * from {$dbprefix}{$this->tablename} where id={$id} limit 1;");
        $valid = pg_num_rows($result) > 0;

        return $result;
    }
    
    protected function get($filter)
    {
        global $db;
        global $dbprefix;
        
        $keys = array_keys($filter);
        $values = array_values($filter);
        $ff = '';
        
        for ($i = 0; $i < count($keys); $i++)
        {
            if ($i < count($keys) - 1)
                $ff .= $keys[$i]."='".$values[$i]."' and ";
            else
                $ff .= $keys[$i]."='".$values[$i]."'";
        }
        
        $result = $db->exec("select * from {$dbprefix}{$this->tablename} where {$ff} limit 1;");
        $this->valid = pg_num_rows($result) > 0;

        return $result;
    }
    
    public function isValid()
    {
        return $this->valid;
    }
}
