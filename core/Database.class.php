<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author root
 */
class Database {
    private $db = null;
    
    public function __construct() {
    
        
    }
    
    public function open($host, $port, $dbname, $user, $password) {
        if ($this->db != null)
            pg_close($this->db); 
        $this->db = pg_connect("host={$host} port={$port} dbname={$dbname} user={$user} password={$password}");
    }
    
    public function exec($query) {
        global $dbprefix;
        global $debug;
        global $engine;
        
        
        //if (defined('__DEBUG__'))
        {   
            $st = time();
            $debug .= 'Database::exec() - SQL query: '.$query."\n";
        }        
        $result = pg_query($this->db, $query);

        //if (defined('__DEBUG__'))
        {   
            $debug .= 'Database::exec() - SQL query execution time: '.(time() - $st)."\n";
            $debug .= 'Database::exec() - Result set ' . pg_num_rows($result) . " item(s)\n";
        }
        return $result;
    }
}

$db = new Database();
$db->open($dbhost, $dbport, $dbname, $dbuser, $dbpass);