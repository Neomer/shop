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
    private $row_idx = 0;
    private $count = 0;
    
    protected $valid;
    protected $result = null;

    //put your code here
    public function __construct($tablename) {
        $this->tablename = $tablename;
        $this->valid = false;
        $this->row_idx = 0;
        $this->count = 0;
        $this->result = null;
    }
    
    protected function load($id)
    {
        global $db;
        global $dbprefix;
        
        $result = $db->exec("select * from {$dbprefix}{$this->tablename} where id={$id} limit 1;");
        $this->count = pg_num_rows($result);
        $this->valid = $this->count > 0;
        $this->result = $result;

        return $result;
    }
    
    protected function select($filter, $order = '')
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
        
        $result = $db->exec("select * from {$dbprefix}{$this->tablename} where {$ff}" 
                . (($order !== '')?" order by " . implode(',', $order) : '')
                . ";");
        $this->count = pg_num_rows($result);
        $this->valid = $this->count > 0;
        $this->result = $result;

        return $result;
    }
    
    public function isValid()
    {
        return $this->valid;
    }
    
    protected function next()
    {
        $this->row_idx++;
        return $this->row_idx < $this->count;
    }
    
    public function count() 
    {
        return $this->count;
    }
    
    public function rowNumber()
    {
        return $this->row_idx;
    }
    
    protected function resultSet() {
        return $this->result;
    }
}
