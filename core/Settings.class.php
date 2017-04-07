<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Database.class.php';

/**
 * Description of Settings
 *
 * @author root
 */
class Settings {
    private $result;
    private $sets;
    private $count;
    
    public function __construct() {
        global $db;
        global $dbprefix;
        
        $this->result = $db->exec(""
                . "select "
                . "s.name as name, "
                . "sr.name as role, "
                . "s.comment as comment, "
                . "st.name as type, "
                . "s.value "
                . "from {$dbprefix}settings as s  "
                . "left join {$dbprefix}settings_role as sr on sr.id=s.role "
                . "left join {$dbprefix}settings_type as st on st.id=s.type "
                . ";");
        $this->sets = pg_fetch_all($this->result);
        $this->count = pg_num_rows($this->result);
   }
   
   public function getValue($role, $name) {
       
       for ($i = 0; $i < $this->count; $i++) {
           if ($this->sets[$i]['role'] == $role && $this->sets[$i]['name'] == $name)
               return $this->sets[$i]['value'];
       }
       return '';
   }
    
    
}
